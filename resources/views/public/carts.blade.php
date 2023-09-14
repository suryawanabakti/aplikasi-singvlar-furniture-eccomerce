@extends('public.layouts.app')

@section('content')
    <style>
        input[type=number] {
            width: 50px;
        }
    </style>
    <div class="container">
        <div class="row mt-3">
            {{-- Breadcrumb --}}
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Keranjang saya</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/checkout">
                                    @foreach ($carts as $cart)
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="checkbox" value="{{ $cart->product->toko->id }}"
                                                    name="toko_id[]" class="toko_id">
                                                <img src="{{ asset('uploads/image/' . $cart->product->image) }}"
                                                    alt="" width="200px">
                                            </div>
                                            <div class="col-md-9">

                                                <b>{{ $cart->product->toko->name }}</b>
                                                <a href="{{ route('carts.destroy', $cart->id) }}"
                                                    class="float-end text-decoration-none text-danger"
                                                    onclick="return confirm('Apakah anda yaking menghapus product ini dari keranjang?')">Hapus</a>
                                                <p>{{ Str::limit($cart->product->toko->description, 70, $end = '.......') }}
                                                </p>

                                                <hr>
                                                <b>{{ $cart->product->name }}</b>
                                                <p>{{ $cart->product->description }}</p>
                                                <p>{{ $cart->product->price }} * <input type="number" readonly
                                                        min="1" value="{{ $cart->jumlah }}"
                                                        onchange="updateJumlah({{ $cart->id }})"
                                                        id="jumlah{{ $cart->id }}"> =

                                                    <b id="total{{ $cart->id }}">{{ number_format($cart->total) }}</b>


                                                </p>
                                                <p><b>Catatan : </b> {{ $cart->catatan ?? '-' }}</p>

                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-md-10"> Total Bayar : <b>Rp.</b><b
                                                id="totalBayar">{{ number_format($carts->sum('total')) }}</b> </div>
                                        <div class="col-md-2"> <button type="submit" class="btn btn-primary">Check
                                                out</button> </div>
                                    </div>
                                </form>
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
        function updateJumlah(id) {
            let jumlah = $('#jumlah' + id).val()

            $.ajax({
                type: "GET",
                url: "/carts/update-jumlah/" + id,
                data: {
                    jumlah: jumlah
                },
                success: function(tekst) {
                    $('#total' + id).html(new Intl.NumberFormat().format(tekst.total_harga))
                    $('#totalBayar').html(new Intl.NumberFormat().format(tekst.total_bayar))
                },
                error: function(request, error) {
                    console.log(request, error)
                }
            });
        }
        // $('.cart_id').on('change', () => {
        //     $('input[name="cart_id"]:checked').each(function() {
        // console.log(this.value); 
        // });
        // })
    </script>
@endpush
