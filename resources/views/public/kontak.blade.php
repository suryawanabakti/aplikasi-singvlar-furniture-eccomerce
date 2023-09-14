@extends('public.layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row ">
            {{-- Breadcrumb --}}
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                </ol>
            </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Kontak Kami</div>
                    <form action="kontak" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 col-md-4">
                                <label for="" class="form-label">Email : </label>
                                <input required type="text" placeholder="Masukkan Email Anda" class="form-control"
                                    name="no_wa">
                            </div>
                            <div class="mb-3">
                                <label for="">Pesan : </label>
                                <textarea required placeholder="Masukkan Pesan Anda ...." name="message" id="message" class="form-control"
                                    cols="30" rows="8"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            Kontak Lain:
                            <div class="float-right">
                                <a href="" class="text-success me-2" title="WhatsApp"> <i
                                        class="fa-brands fa-whatsapp"></i></a>
                                <a href="" class="text-danger" title="Instagram"> <i
                                        class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
