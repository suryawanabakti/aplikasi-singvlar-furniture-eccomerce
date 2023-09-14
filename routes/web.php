<?php

// use App\Http\Controllers\Public\CartController;

use App\Http\Controllers\AdminLiveChatController;
use App\Http\Controllers\AdminSuper\BannerController;
use App\Http\Controllers\AdminSuper\CategoryController;
use App\Http\Controllers\AdminSuper\TokoController;
use App\Http\Controllers\AdminSuper\TransactionController as AdminSuperTransactionController;
use App\Http\Controllers\AdminSuper\UsersController;
use App\Http\Controllers\AdminToko\EventController;
use App\Http\Controllers\AdminToko\ProductController;
use App\Http\Controllers\AdminToko\ProfileController;
use App\Http\Controllers\AdminToko\TransactionController as AdminTokoTransactionController;
use App\Http\Controllers\LiveChatController;
use App\Http\Controllers\Public\KontakController;
use App\Http\Controllers\Public\ProductController as PublicProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\TransactionController;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Event;
use App\Models\Product;
use App\Models\Toko;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    $title = 'Home';
    $products = Product::paginate(12);
    if ($request->search) {
        $products = Product::where('name', 'LIKE', "%{$request->search}%")->paginate(12);
    }

    $categories = Category::all();
    $carts = Cart::where('user_id', auth()->user()->id ?? 0)
        ->where('status', 'process')
        ->orderBy('created_at', 'desc')
        ->get() ?? null;
    $banners = Banner::all();
    return view('public.home', compact('products', 'title', 'categories', 'carts', 'banners'));
})->name('home');

Route::get('/kontak', function (Request $request) {
    $carts = Cart::where('user_id', auth()->user()->id ?? 0)
        ->where('status', 'process')
        ->orderBy('created_at', 'desc')
        ->get() ?? null;
    return view('public.kontak', compact('carts'));
})->name('kontak');

Route::get('/event', function (Request $request) {
    $carts = Cart::where('user_id', auth()->user()->id ?? 0)
        ->where('status', 'process')
        ->orderBy('created_at', 'desc')
        ->get() ?? null;
    $events = Event::all();
    return view('public.event', compact('carts', 'events'));
})->name('event');

Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::get('/products', [PublicProductController::class, 'index'])->name('products');
Route::post('/product/{id}/beri-rating', [PublicProductController::class, 'beriRating'])->name('transactions.beri-rating');

Route::get('/home/{category}', function (Request $request, $category) {

    $title = 'Home';


    $products = Product::where('category_id', $category)->paginate(12);
    if ($request->search) {
        $products = Product::where('category_id', $category)->where('name', 'LIKE', "%{$request->search}%")->paginate(12);
    }

    $categories = Category::all();
    $carts = Cart::where('user_id', auth()->user()->id ?? 0)
        ->where('status', 'process')
        ->orderBy('created_at', 'desc')
        ->get() ?? null;
    $banners = Banner::all();
    return view('public.home', compact('products', 'title', 'categories', 'carts', 'banners'));
})->name('home.category');



Route::get('/checkout', function (Request $request) {

    if ($request->has('toko_id')) {
        $carts = Cart::where('user_id', auth()->user()->id ?? 0)
            ->where('status', 'process')
            ->orderBy('created_at', 'desc')
            ->get() ?? null;

        $x = 0;
        foreach ($request->toko_id as $toko_id) {
            if ($x == 0) {
            } else {

                if ($request->toko_id[$x] !== $request->toko_id[$x - 1]) {
                    Alert::error('Terjadi Kesalahan', "Tidak bisa checkout dengan beda toko, harap centang produk dengan toko yang sama");
                    return back();
                }
            }

            $x++;
        }


        //  $checkouts =  DB::select('select *,products.name AS nama_produk ,tokos.id AS toko_id,products.user_id AS product_user_id,carts.user_id as carts_user_id from carts  inner join products on carts.product_id = products.id inner join tokos on tokos.user_id = products.user_id where carts.user_id = '. auth()->user()->id . ' AND tokos.id = '. $toko_id);\

        $checkouts = Cart::with('product', 'toko')->where('toko_id', $toko_id)->where('user_id', auth()->id())->where('status', 'process')->get();
        return view('public.checkout', compact('checkouts', 'carts'));
    } else {
        Alert::error('Gagal Checkout', 'tolong ceklist setidaknya SATU produk satu produk');
        return back();
    }
});

Route::get('/products/{product}', function (Product $product) {
    $carts = Cart::where('user_id', auth()->user()->id ?? 0)
        ->where('status', 'process')
        ->orderBy('created_at', 'desc')
        ->get() ?? null;

    return view('public.detail-product', compact('product', 'carts'));
})->name('public.products.show');

Route::get('/tokos/{toko}', function (Toko $toko) {
    $carts = Cart::where('user_id', auth()->user()->id ?? 0)
        ->where('status', 'process')
        ->orderBy('created_at', 'desc')
        ->get() ?? null;
    $products = Product::where('user_id', $toko->user_id)->get();
    return view('public.detail-toko', compact('toko', 'carts', 'products'));
})->name('public.tokos.show');

Route::group(['middleware' => ['auth']], function () {
    Route::controller(CartController::class)->group(function () {
        Route::get('/carts', 'index')->name('carts.index');
        Route::get('/carts/destroy/{cart}', 'destroy')->name('carts.destroy');
        Route::get('/carts/update-jumlah/{cart}', 'updateJumlah')->name('carts.updateJumlah');
        Route::post('/carts', 'store')->name('carts.store');
    });

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/transactions', 'index')->name('transactions.index');

        Route::post('/transactions', 'store')->name('transactions.store');
    });
});

Route::group(['middleware' => ['role:super-admin|admintoko']], function () {
    Route::get('/dashboardsuperadmin', function () {
        return view('adminsuper.dashboard');
    })->name('dashboardsuperadmin');

    Route::controller(UsersController::class)->group(function () {
        Route::get('/adminsuper/users', 'index')->name('adminsuper.users.index');
        Route::get('/adminsuper/users/destroy/{id}', 'destroy')->name('adminsuper.users.destroy');
        Route::put('/adminsuper/users/updatepassword/{id}', 'updatepassword')->name('adminsuper.users.updatepassword');
    });

    Route::controller(AdminSuperTransactionController::class)->group(function () {
        Route::get('/adminsuper/transactions', 'index')->name('adminsuper.transactions.index');
        Route::get('/adminsuper/transactions/print', 'print')->name('adminsuper.transactions.print');
    });

    Route::controller(TokoController::class)->group(function () {
        Route::get('/adminsuper/tokos', 'index')->name('adminsuper.tokos.index');
        Route::get('/adminsuper/tokos/destroy/{toko}', 'destroy')->name('adminsuper.tokos.destroy');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/adminsuper/categories', 'index')->name('adminsuper.categories.index');
        Route::put('/adminsuper/categories/{id}', 'update')->name('adminsuper.categories.update');
        Route::post('/adminsuper/categories', 'store')->name('adminsuper.categories.store');
        Route::get('/adminsuper/categories/destroy/{id}', 'destroy')->name('adminsuper.categories.destroy');
    });

    Route::controller(BannerController::class)->group(function () {
        Route::get('/adminsuper/banners', 'index')->name('adminsuper.banners.index');
        Route::post('/adminsuper/banners', 'store')->name('adminsuper.banners.store');
        Route::get('/adminsuper/banners/destroy/{id}', 'destroy')->name('adminsuper.banners.destroy');
    });
});

Route::group(['middleware' => ['role:admintoko']], function () {

    Route::get('/dashboard', function () {
        if (!auth()->user()->toko) {
            Alert::info('Toko Belum Ada', 'silakan mengupdate toko terlebih dahulu');
            return view('admintoko.profile.index');
        }

        $transactions = Transaction::where('toko_id', auth()->user()->toko->id ?? 0)->get();
        return view('admintoko.dashboard', compact('transactions'));
    })->name('dashboard');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/admintoko/profile', 'index')->name('admintoko.profile.index');
        Route::patch('/admintoko/profile/{user}', 'update')->name('admintoko.profile.update');
        Route::patch('/admintoko/profile/{user}/toko', 'updatetoko')->name('admintoko.profile.updatetoko');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/admintoko/products', 'index')->name('admintoko.products.index');

        Route::post('/admintoko/products', 'store')->name('admintoko.products.store');
        Route::get('/admintoko/products/create', 'create')->name('admintoko.products.create');
        Route::get('/admintoko/products/{product}', 'destroy')->name('admintoko.products.destroy');
        Route::put('/admintoko/products/{product}', 'update')->name('admintoko.products.update');
    });


    Route::controller(EventController::class)->group(function () {
        Route::get('/admintoko/events', 'index')->name('admintoko.events.index');

        Route::post('/admintoko/events', 'store')->name('admintoko.events.store');
        Route::get('/admintoko/events/create', 'create')->name('admintoko.events.create');
        Route::get('/admintoko/events/{product}', 'destroy')->name('admintoko.events.destroy');
    });

    Route::controller(AdminTokoTransactionController::class)->group(function () {
        Route::get('/admintoko/transactions', 'index')->name('admintoko.transactions.index');
        Route::get('/admintoko/transactions/print', 'print')->name('admintoko.transactions.print');
        Route::get('/admintoko/transactions/{id}', 'terima')->name('admintoko.transactions.terima');
    });

    Route::get('/admintoko/live-chat', [AdminLiveChatController::class, 'index'])->name('admintoko.live-chat.index');
});


Route::get('/live-chat', [LiveChatController::class, 'index']);
Route::post('/live-chat', [LiveChatController::class, 'store']);


require __DIR__ . '/auth.php';
