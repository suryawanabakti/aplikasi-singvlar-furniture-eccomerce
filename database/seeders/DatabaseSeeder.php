<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Toko;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $rolesuperadmin = Role::create(['name' => 'super-admin']);
        $roleadmintoko = Role::create(['name' => 'admintoko']);
        $rolecustomer = Role::create(['name' => 'customer']);

        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('qwerty123'),
        ]);

        $superadmin->assignRole($rolesuperadmin);

        $category1 = Category::create([
            'name' => 'cake'
        ]);

        $category2 = Category::create([
            'name' => 'clothing'
        ]);
    }
}
