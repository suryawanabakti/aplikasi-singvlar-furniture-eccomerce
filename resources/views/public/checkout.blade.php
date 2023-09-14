@extends('public.layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            {{-- Breadcrumb --}}
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page"><a href="/carts">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Check out</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <h4>{{ $checkouts[0]->product->toko->name }}</h4>
                                    <p class="text-uppercase">{{ $checkouts[0]->product->toko->bank }} :
                                        {{ $checkouts[0]->product->toko->no_rekening }}</p>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                        @foreach ($checkouts as $cart)
                                            <tr>
                                                <td>{{ $cart->product->name }}</td>
                                                <td>{{ $cart->product->price }}</td>
                                                <td>{{ $cart->jumlah }}</td>
                                                <td>{{ $cart->total }}</td>
                                            </tr>
                                        @endforeach
                                    </thead>
                                </table>
                                <div class="row">
                                    <form action="/transactions" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="toko_id" value="{{$checkouts[0]->product->toko->id }}">
                                        <input type="hidden" name="total" value="{{ $checkouts->sum('total') }}">
                                        <div class="mb-3">
                                            <label for="">Metode Pembayaran</label>
                                            <select name="metode" id="metode" class="form-select">
                                                <option value="cod">Cash On Delievery (COD)</option>
                                                <option value="transfer">Transfer</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Bukti Pembayaran</label>
                                            <input type="file" class="form-control" name="bukti_pembayaran">
                                        </div>
                                        <div class="col-md-12 mt-2"> Total Bayar : IDR
                                            {{ number_format($checkouts->sum('total')) }}</div>
                                        <div class="col-md-2 mt-4"> <button type="submit" class="btn btn-primary">Bayar
                                            </button> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // $('.cart_id').on('change', () => {
        //     $('input[name="cart_id"]:checked').each(function() {
        // console.log(this.value); 
        // });
        // })
    </script>
@endpush
