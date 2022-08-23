@extends('public.layouts.app')


@section('content')
    <div class="container">

        <div class="row mt-3 mb-4 button-group filter-button-group">
            <div class="col d-flex justify-content-center">
                <button type="button" data-filter="*" class="btn btn-primary mx-1 text-white">All</button>
                <button type="button" data-filter=".electronic" class="btn btn-primary mx-1 text-white">Electronic</button>
                <button type="button" data-filter=".clothing" class="btn btn-primary mx-1 text-white">Clothing</button>
                <button type="button" data-filter=".furniture" class="btn btn-primary mx-1 text-white">Furniture</button>
            </div>
        </div>

        <div class="row justify-content-center g-4" id="product-list">

            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 {{ $product->category_name }}">
                <div class="product-item">
                    <div class="product-img">
                        <img src="images/product_img_2.jpg" class="img-fluid d-block mx-auto">
                    </div>
                    <div class="product-content text-center py-3">
                        <span class="d-block text-uppercase fw-bold">{{ $product->name }}</span>
                        <span class="d-block">$ {{ $product->price }}</span>
                    </div>
                </div>
            </div>
            @endforeach

            {{ $products->links() }}
            

            
        </div>
    </div>
@endsection


@section('modal')

@endsection