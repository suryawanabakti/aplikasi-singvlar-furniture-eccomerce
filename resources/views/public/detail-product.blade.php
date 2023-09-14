@extends('public.layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row ">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Product</li>
                </ol>
            </nav>
            <div class="col-md-12 ">
                {{-- Breadcrumb --}}

                <div class="card">
                    <div class="card-header fw-bold">{{ $product->name }}</div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-4">
                                <img src="{{ asset('uploads/image/' . $product->image) }}" alt="" width="250px">
                            </div>
                            <div class="col-md-8">
                                <p>{{ $product->description }}</p>
                                <p>Harga : Rp.{{ number_format($product->price) }} @if ($product->event)
                                        <b>Diskon {{ $product->event->diskon }} % </b>
                                        :
                                        Rp.{{ number_format($product->price - ($product->event->diskon / 100) * $product->price) }}
                                    @endif
                                </p>
                                <p>Jumlah Produk : {{ $product->stock }}</p>
                                <form action="{{ route('carts.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="price" id="price" value="{{ $product->price }}">
                                    <input type="hidden" name="toko_id" value="{{ $product->toko->id }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" placeholder="Jumlah Produk Minimal 5" name="jumlah" required>
                                    <br> <br>
                                    <textarea name="catatan" id="catatan" cols="30" rows="1" class="form-control" placeholder="catatan ... "></textarea> <br>
                                    <button type="submit" class="btn btn-primary btn-sm">+ Keranjang</button>
                                </form>
                                <hr>
                                <h5>Rating</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{ $product->rating->sum('star') }} Star
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <b class="mb-3">Komentar : </b>
                            @foreach ($product->rating as $rating)
                                <div class="col-md-12">
                                    <b> {{ $rating->user->name }} , {{ $rating->star }} star.</b>
                                    <p>{{ $rating->komentar }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
