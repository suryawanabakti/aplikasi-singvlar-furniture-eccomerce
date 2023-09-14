@extends('public.layouts.app')


@section('content')
    <div class="container">
        @if ($banners->isNotEmpty())
            <div class="row justify-content-center mt-2">
                <div class="col-md-11">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="{{ asset('uploads/image/' . $banners[0]->image ?? null) }}" class="d-block w-100"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $banners[0]->name ?? null }}</h5>
                                    <p>{{ $banners[0]->description ?? null }}</p>
                                </div>
                            </div>

                            @foreach ($banners->skip(1) as $banner)
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="{{ asset('uploads/image/' . $banner->image) }}" class="d-block w-100"
                                        alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ $banner->name }}</h5>
                                        <p>{{ $banner->description }}</p>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <form class="d-flex text-center justify-content-center mt-2" method="get" action="">
            <input class="form-control me-2" type="search" placeholder="Cari produk . . . . . . . . ." aria-label="Search"
                style="width: 500px;" name="search">
        </form>
        <div class="row mt-3 mb-4 button-group filter-button-group">
            <div class="col">
                <a href="/" class="btn {{ Request::is('/') ? 'btn-primary' : 'btn-secondary' }} mx-1 text-white">All
                    Category</a>
                @foreach ($categories as $category)
                    <a href="{{ route('home.category', $category->id) }}"
                        class="btn {{ Request::is('home/' . $category->id) ? 'btn-primary' : 'btn-secondary' }} mx-1 text-white text-capitalize">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>


        <div class="row justify-content-center" id="product-list">

            @forelse ($products as $product)
                @if ($product->toko)
                    <div class="col-lg-3  mb-3 {{ $product->category->name }}">
                        <a href="{{ route('public.products.show', $product->id) }}" class="text-decoration-none text-dark">
                            <div class="product-item">
                                <div class="product-img">
                                    <b class="m-2 text-uppercase">{{ $product->toko->name }}</b>
                                    <img src="{{ asset('uploads/image/' . $product->image) }}" class="img img-fluid"
                                        style="height: 250px;">
                                </div>
                                <div class="product-content text-center py-3">
                                    <span class="d-block text-uppercase fw-bold">{{ $product->name }}</span>
                                    <span class="d-block">Rp. {{ number_format($product->price) }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @empty
                <h1>Produk tidak ada !!!</h1>
            @endforelse

            {{ $products->links() }}



        </div>
    </div>
@endsection


@section('modal')
@endsection
