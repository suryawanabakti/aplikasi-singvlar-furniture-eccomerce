
<x-app-layout>
    

    <section class="section">
       
        <div class="section-header">
            <h1>Products</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Products</div>
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
                                <a href="{{ route('adminsuper.transactions.print') }}" class="btn btn-primary">PRINT</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table  table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Toko</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            
                                            <th>Total bayar</th>
                                            <th>Metode</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $transaction->toko->name }}</td>
                                                <td>{{ $transaction->user->name }}</td>
                                                <td>{{ $transaction->user->alamat }}</td>
                                                
                                                <td>{{ $transaction->total }}</td>
                                                <td>{{ $transaction->metode }}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/buktiPembayaran/' . $transaction->bukti_pembayaran) }}"
                                                        alt="" width="150px" height="150px">
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
      
    </x-slot>
</x-app-layout>
