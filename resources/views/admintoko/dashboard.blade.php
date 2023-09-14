<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Dashboard</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                          <a href="{{ route('admintoko.products.index') }}">  <i class="fas fa-box"></i></a>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Total Produk</h4>
                        </div>
                        <div class="card-body">
                          {{ DB::table('products')->where('user_id', auth()->id())->count() }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                          <a href="{{ route('admintoko.products.index') }}">  <i class="fas fa-exchange-alt"></i></a>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Total Transaksi</h4>
                        </div>
                        <div class="card-body">
                          {{ DB::table('transactions')->where('toko_id', auth()->user()->toko->toko_id ?? 0)->count() }}
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <canvas id="myChart"></canvas>
                              </div>
                               
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
       

    </section>

    <x-slot name="modal">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const labels = [
              @foreach ($transactions as $transaction)
                  '{{ $transaction->created_at->format("d M") }}'
              @endforeach
            ];
          
            const data = {
              labels: labels,
              datasets: [{
                label: 'Pemasukan (IDR)',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    @foreach ($transactions as $transaction)
                        '{{ $transaction->total }}'
                    @endforeach
                ],
              }]
            };
          
            const config = {
              type: 'line',
              data: data,
              options: {}
            };

            const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
          </script>
           
    </x-slot>
</x-app-layout>
