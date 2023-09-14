@extends('public.layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row ">
            {{-- Breadcrumb --}}
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                </ol>
            </nav>
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">{{ $toko->name }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('uploads/logo/' . $toko->logo) }}" alt="" width="250px">
                            </div>
                            <div class="col-md-8">
                                <p>{{ $toko->description }}</p>
                                <p>{{ $toko->address }}</p>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.764481425814!2d119.48220917377294!3d-5.141575894835629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee32a48f63467%3A0x3d78bbc520587e7b!2sUNITAMA!5e0!3m2!1sid!2sid!4v1691684114326!5m2!1sid!2sid"
                                    width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
