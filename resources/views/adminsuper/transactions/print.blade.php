
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  </head>
  <body>
    
    <div class="container mt-5">
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
                                <ul>
                                    @foreach ($transaction->carts as $cart)
                                        <li class="text-danger">{{ $cart->product->name ?? 'Produk di hapus' }} , {{ $cart->jumlah }} pcs.</li>
                                    @endforeach
                                </ul>
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
                                <a href="{{ route('admintoko.transactions.terima', $transaction->id) }}" onclick="return confirm('apakah anda yakin menerima ini?')"> Terima</a>
        
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


<script>
    window.print()
</script>
  </body>
</html>


