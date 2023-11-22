<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <div class="login-brand">
                    <img src="../assets/img/stisla-fill.svg" alt="logo" width="100"
                        class="shadow-light rounded-circle">
                </div>
            </a>
        </x-slot>

        <!-- Session Status -->
        {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="card card-primary">
            <div class="card-header">
                <h4>Masuk</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                            autofocus>
                        <div class="invalid-feedback">
                            Please fill in your email
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">Password</label>
                            <div class="float-right">
                                {{-- <a href="/forgot-password" class="text-small">
                                    Forgot Password?
                                </a> --}}
                            </div>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2"
                            required>
                        <div class="invalid-feedback">
                            please fill in your password
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Masuk
                        </button>
                    </div>
                </form>



            </div>
        </div>

        <div class="text-muted text-center">
            Belum punya akun? <a href="{{ route('register') }}">Buat Akun</a>
        </div>

    </x-auth-card>
</x-guest-layout>
