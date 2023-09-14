<x-app-layout>


    <section class="section">

        <div class="section-header">
            <h1>Products</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Products</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <x-auth-validation-errors>

                </x-auth-validation-errors>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Produk</h4>
                            <div class="card-header-action">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Tambah Produk
                                </button>

                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($products as $product)
                                    <li class="media">
                                        <a href="#">
                                            @if ($product->image)
                                                <img class="mr-3 rounded" width="100"
                                                    src="{{ asset('uploads/image/' . $product->image) }}"
                                                    alt="product">
                                            @endif

                                        </a>
                                        <div class="media-body">
                                            <div class="media-right">
                                                <button type="button" class="btn btn-link border-0 p-0 text-secondary"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>

                                                <div class="dropdown-menu">
                                                    <h6 class="dropdown-header text-left">Action</h6>
                                                    <a href="javascript:void(0)" class="dropdown-item"
                                                        data-toggle="modal"
                                                        data-target="#exampleModalEdt{{ $product->id }}">
                                                        <i class="fas fa-pen fa-fw mr-2"></i> Edit
                                                    </a>


                                                    <a href="{{ route('admintoko.products.destroy', $product->id) }}"
                                                        class="dropdown-item btn-hapus"
                                                        onclick="return confirm('Apakah anda yakin menghapus produk ' + '{{ $product->name }}')">
                                                        <i class="far fa-trash-alt fa-fw mr-2"></i> Delete
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="media-title"><a href="#">{{ $product->name }}</a></div>
                                            {{ $product->description }} <br>
                                            Stok: {{ $product->stock }} , Harga: Rp.{{ number_format($product->price) }}


                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <x-slot name="modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admintoko.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Stok</label>
                                <input type="number" class="form-control" name="stock">
                            </div>
                            <div class="form-group">
                                <label for="name">Harga</label>
                                <input type="number" class="form-control" name="price">
                            </div>
                            <div class="form-group">
                                <label for="name">Deskripsi</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($products as $product)
            <div class="modal fade" id="exampleModalEdt{{ $product->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalEdtLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalEdtLabel">Edit Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admintoko.products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nama Produk</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $product->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option @selected($category->id == $product->category_id) value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Stok</label>
                                    <input type="number" class="form-control" name="stock"
                                        value="{{ $product->stock }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Harga</label>
                                    <input type="number" class="form-control" name="price"
                                        value="{{ $product->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Deskripsi</label>
                                    <input type="text" class="form-control" name="description"
                                        value="{{ $product->description }}">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </x-slot>
</x-app-layout>
