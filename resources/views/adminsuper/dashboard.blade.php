<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Dashboard Super Admin</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <a href="{{ route('adminsuper.tokos.index') }}">  <i class="fas fa-store"></i></a>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Total Toko</h4>
                      </div>
                      <div class="card-body">
                        {{ DB::table('tokos')->count() }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                          <a href="{{ route('adminsuper.users.index') }}">  <i class="fas fa-users"></i></a>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                          {{ DB::table('users')->count() }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                          <a href="{{ route('adminsuper.transactions.index') }}">  <i class="fas fa-exchange-alt"></i></a>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Total Transaksi</h4>
                        </div>
                        <div class="card-body">
                          {{ DB::table('transactions')->count() }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-primary">
                          <a href="{{ route('adminsuper.categories.index') }}">  <i class="fas fa-box"></i></a>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Total Kategori</h4>
                        </div>
                        <div class="card-body">
                          {{ DB::table('categories')->count() }}
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        <x-slot name="modal"></x-slot>
    </section>
</x-app-layout>
