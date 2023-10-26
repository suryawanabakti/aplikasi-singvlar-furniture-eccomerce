<x-app-layout>


    <section class="section">

        <div class="section-header">
            <h1>Transactions</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Transactions</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <x-auth-validation-errors>

                </x-auth-validation-errors>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Transaksi</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admintoko.transactions.print') }}" class="btn btn-primary">PRINT</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Daftar Produk</th>
                                            <th>Total bayar</th>
                                            <th>Metode</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $transaction->user->name }}</td>
                                                <td>{{ $transaction->user->alamat }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-info"
                                                        data-toggle="modal"
                                                        data-target="#myModal{{ $transaction->id }}"><i
                                                            class="fas fa-eye"></i></a>

                                                </td>
                                                <td>{{ $transaction->total }}</td>
                                                <td>{{ $transaction->metode }}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/buktiPembayaran/' . $transaction->bukti_pembayaran) }}"
                                                        alt="" width="150px">
                                                </td>
                                                <td>
                                                    @if ($transaction->status == 'process')
                                                        <span class=" badge badge-warning"> process </span>
                                                    @endif
                                                    @if ($transaction->status == 'success')
                                                        <span class=" badge badge-success"> success </span>
                                                    @endif
                                                    @if ($transaction->status == 'decline')
                                                        <span class=" badge badge-danger"> decline </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admintoko.transactions.terima', $transaction->id) }}"
                                                        onclick="return confirm('apakah anda yakin menerima ini?')">
                                                        Terima</a> <br>

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
    </section>

    <x-slot name="modal">
        <!-- Modal -->
        @foreach ($transactions as $tran)
            <div class="modal fade" id="myModal{{ $tran->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Daftar Transaksi </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                @foreach ($tran->carts as $cart)
                                    <li>{{ $cart->product->name ?? 'Produk Di Hapus' }} , {{ $cart->jumlah }} <br>
                                        catatan
                                        :{{ $cart->catatan ?? 'tidak ada' }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </x-slot>
</x-app-layout>
