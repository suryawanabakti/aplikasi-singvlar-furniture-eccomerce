
<x-app-layout>
    

    <section class="section">
       
        <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Category</div>
            </div>
        </div>

        <div class="section-body">
           
            <div class="row">
                <x-auth-validation-errors>
    
                </x-auth-validation-errors>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar kategori</h4>
                            <div class="card-header-action">
                               <button type="button" class="btn btn-primary" data-toggle="modal"
                               data-target="#exampleModal">+ Add Category</button>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td> 
                                                    <button type="button" class="btn btn-link border-0 p-0 text-secondary"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                    <div class="dropdown-menu">
                                                    <h6 class="dropdown-header text-left">Action</h6>

                                                    <a href="javascript:void(0)" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{ $category->id }}" >
                                                        <i class="far fa-edit fa-fw mr-2"></i> Edit
                                                    </a>

                                                    
                                                    <a href="{{ route('adminsuper.categories.destroy',$category->id) }}" class="dropdown-item btn-hapus" onclick="return confirm('Apakah anda yakin menghapus category ' + '{{ $category->name }}')">
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
  <!-- Modal -->
  @foreach ($categories as $category)
  <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('adminsuper.categories.update', $category->id) }}" method="post">
        @csrf
        @method('put')
     
        <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
</div>
</div>
@endforeach

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('adminsuper.categories.store') }}" method="POST" >
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>
