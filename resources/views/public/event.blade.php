@extends('public.layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row ">
            {{-- Breadcrumb --}}
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Event</li>

                </ol>
            </nav>


            <div class="row  mt-2">
                @foreach ($events as $event)
                    <div class="col-md-4">
                        <a href="{{ route('public.products.show', $event->product->id) }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-header text-capitalize">
                                    <h4>{{ $event->title }}</h4>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('uploads/image/' . $event->product->image) }}" class="img img-fluid"
                                        style="height: 250px;">
                                    <p> {{ $event->deskripsi }}</p>
                                    <b>Diskon, {{ $event->diskon }} % </b> <br>
                                    <small>{{ $event->tgl_mulai }} s/d {{ $event->tgl_selesai }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
