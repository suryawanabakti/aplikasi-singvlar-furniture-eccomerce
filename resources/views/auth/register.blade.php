<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <div class="login-brand">
                    <img src="/assets/img/stisla-fill.svg" alt="logo" width="100"
                        class="shadow-light rounded-circle">
                </div>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <div class="card card-primary">
            <div class="card-header">
                <h4>Register</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input id="name" type="text" class="form-control" name="name" tabindex="1" required
                            autofocus>
                        <div class="invalid-feedback">
                            Please fill in your name
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat </label>
                        <input id="alamat" type="text" class="form-control" name="alamat" tabindex="1" required
                            autofocus>
                        <div class="invalid-feedback">
                            Please fill in your alamat
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Kabupaten/Kota</label>
                        <select name="kabupatenkota" id="kabupatenkota" class="form-control select2">
                            @foreach ($daftarKota as $kota)
                                <option value="{{ $kota['city_id'] }}">{{ $kota['city_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">No.Telpon / WhatsApp</label>
                        <input id="name" type="text" class="form-control" name="no_telepon" tabindex="1"
                            required autofocus>
                        <div class="invalid-feedback">
                            Please fill in your no telepon
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Perusahaan</label>
                        <input id="name" type="text" class="form-control" name="nama_perusahaan" tabindex="1"
                            required autofocus>
                        <div class="invalid-feedback">
                            Please fill in your nama perusahaan
                        </div>
                    </div>




                    <div class="form-group" hidden>
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="customer">Customer</option>
                            <option value="admintoko">Admin Toko</option>
                        </select>
                        <div class="invalid-feedback">
                            Please fill in your role
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                            autofocus>
                        <div class="invalid-feedback">
                            Please fill in your email
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                                <div class="float-right">

                                </div>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                required>
                            <div class="invalid-feedback">
                                please fill in your password
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input id="password_confirmation" type="password" class="form-control"
                                name="password_confirmation" tabindex="2" required>
                            <div class="invalid-feedback">
                                please fill in your password confirmation
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" required class="custom-control-input" tabindex="3"
                                id="remember-me">
                            <label class="custom-control-label" for="remember-me">Saya setuju untuk menerima
                                pemberitahuan melalui email setiap kali ada pembaruan produk, diskon, dan lain
                                lain</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Register
                        </button>
                    </div>
                </form>



            </div>
        </div>

        <div class="mt-5 text-muted text-center">
            Apakah kamu sudah punya akun? <a href="{{ route('login') }}">Masuk disini</a>
        </div>
    </x-auth-card>

</x-guest-layout>
