
<x-app-layout>
    

    <section class="section">
       
        <div class="section-header">
            <h1>Toko</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Toko</div>
            </div>
        </div>

        <div class="section-body">
           
            <div class="row">
                <x-auth-validation-errors>
    
                </x-auth-validation-errors>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Toko</h4>
                           
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Toko</th>
                                            <th>Logo Toko</th>
                                            <th>Aksi</th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        @foreach ($tokos as $toko)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $toko->name }}</td>
                                                <td><img src="{{ asset('uploads/logo/'.$toko->logo) }}" width="100px" alt=""></td>
                                                <td> 
                                                    <button type="button" class="btn btn-link border-0 p-0 text-secondary"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                    <div class="dropdown-menu">
                                                    <h6 class="dropdown-header text-left">Action</h6>

                                                    
                                                    <a href="{{ route('adminsuper.tokos.destroy',$toko->id) }}" class="dropdown-item btn-hapus" onclick="return confirm('Apakah anda yakin menghapus category ' + '{{ $toko->name }}')">
                                                        <i class="far fa-trash-alt fa-fw mr-2"></i> Delete
                                                    </a>

                                                </div></td>
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
