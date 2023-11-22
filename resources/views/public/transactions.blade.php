@extends('public.layouts.app')

@section('content')
    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reversed;
            justify-content: flex-end;
        }

        .radio-input {
            position: fixed;
            opacity: 0;
            pointer-events: none;
        }

        .radio-label {
            cursor: pointer;
            font-size: 0;
            color: rgba(0, 0, 0, 0.2);
            transition: color 0.1s ease-in-out;
        }

        .radio-label:before {
            content: "★";
            display: inline-block;
            font-size: 32px;
        }

        .radio-input:checked~.radio-label {
            color: #ffc700;
            color: gold;
        }

        .radio-label:hover,
        .radio-label:hover~.radio-label {
            color: goldenrod;
        }

        .radio-input:checked+.radio-label:hover,
        .radio-input:checked+.radio-label:hover~.radio-label,
        .radio-input:checked~.radio-label:hover,
        .radio-input:checked~.radio-label:hover~.radio-label,
        .radio-label:hover~.radio-input:checked~.radio-label {
            color: darkgoldenrod;
        }
    </style>
    <div class="container">
        <div class="row mt-3">
            {{-- Breadcrumb --}}
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                </ol>
            </nav>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Transactions</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Daftar Produk</th>
                                        <th>Toko</th>
                                        <th>Total bayar</th>
                                        <th>Metode</th>
                                        <th>Ongkir</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($transaction->carts as $cart)
                                                        <li>{{ $cart->product->name }} , {{ $cart->jumlah }} pcs.
                                                            <br>{{ $cart->catatan }}
                                                            @if ($transaction->status == 'success')
                                                                <br>
                                                                <a href="javascript:void(0)"
                                                                    onclick="showModal('{{ $cart->product }}')"><small>beri
                                                                        rate</small></a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $transaction->toko->name }}</td>
                                            <td>{{ $transaction->total }}</td>
                                            <td>{{ $transaction->metode }}</td>
                                            <td>{{ $transaction->ongkir }}</td>
                                            <td>
                                                @if ($transaction->bukti_pembayaran)
                                                    <img src="{{ asset('uploads/buktiPembayaran/' . $transaction->bukti_pembayaran) }}"
                                                        alt="" width="150px">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($transaction->status == 'process')
                                                    <span class=" badge bg-warning"> process </span>
                                                @endif
                                                @if ($transaction->status == 'success')
                                                    <span class=" badge bg-success"> success </span>
                                                @endif
                                                @if ($transaction->status == 'decline')
                                                    <span class=" badge bg-danger"> decline </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Beri Rating</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formRating" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <img src="" id="imgProduct" class="img-fluid d-block mx-auto p-2">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Rating</label>
                                    <div class="star-rating">
                                        <input class="radio-input" type="radio" id="star5" name="star"
                                            value="5" />
                                        <label class="radio-label" class for="star5" title="5 stars">5 stars</label>

                                        <input class="radio-input" type="radio" id="star4" name="star"
                                            value="4" />
                                        <label class="radio-label" for="star4" title="4 stars">4 stars</label>

                                        <input class="radio-input" type="radio" id="star3" name="star"
                                            value="3" />
                                        <label class="radio-label" for="star3" title="3 stars">3 stars</label>

                                        <input class="radio-input" type="radio" id="star2" name="star"
                                            value="2" />
                                        <label class="radio-label" for="star2" title="2 stars">2 stars</label>

                                        <input class="radio-input" type="radio" id="star1" name="star"
                                            value="1" />
                                        <label class="radio-label" for="star1" title="1 star">1 star</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Komentar</label>
                                    <textarea type="text" class="form-control" name="komentar"> </textarea>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Beri Rate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function showModal(product) {
            var data = JSON.parse(product)
            $('#product_id').val(data.id)
            $('#imgProduct').attr('src', '/uploads/image/' + data.image)
            $('#formRating').attr('action', `/product/${data.id}/beri-rating`)
            $('#exampleModal').modal('show')
        }
    </script>
@endpush
