<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
  
                <div class="col-md-6">
                                  
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Data diri</h4>
                        </div>
                        <form action="{{ route('admintoko.profile.update', auth()->id()) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ auth()->user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ auth()->user()->alamat }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control"
                                        value="{{ auth()->user()->email }}" >
                                </div>
                                <div class="form-group">
                                    <label for="">Password Baru *isi jika ingin mengganti password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan Data Diri</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h4>Data Toko</h4>
                        </div>
                        <form action="{{ route('admintoko.profile.updatetoko', auth()->id()) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nama Toko</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ auth()->user()->toko->name ?? null }}">

                            </div>
                            <div class="form-group">
                                <label for="">Rekening Toko</label>
                                <input type="text" name="no_rekening" class="form-control"
                                    value="{{ auth()->user()->toko->no_rekening ?? null }}">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Bank</label>
                                <input type="text" name="bank" class="form-control"
                                    value="{{ auth()->user()->toko->bank ?? null }}">
                            </div>

                            <div class="form-group">
                                <label for="">Alamat Toko</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ auth()->user()->toko->address ?? null }}">
                            </div>
                         
                            <div class="form-group">
                                <label for="">Tentang toko</label>
                                <input type="text" name="description" class="form-control"
                                    value="{{ auth()->user()->toko->description ?? null }}">
                            </div>
                             <div class="form-group">
                                <label for="">Logo</label>
                                @if (auth()->user()->toko->logo ?? null)
                                <img src="{{ asset('uploads/logo/'.auth()->user()->toko->logo ?? null) }}" alt="" width="200px">
                                @endif
                                <input type="file" name="logo" class="form-control">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan Data Toko</button>
                        </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <x-slot name="modal"></x-slot>
</x-app-layout>
