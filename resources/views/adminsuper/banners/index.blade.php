
<x-app-layout>
    

    <section class="section">
       
        <div class="section-header">
            <h1>banners</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">banners</div>
            </div>
        </div>

        <div class="section-body">
           
            <div class="row">
                <x-auth-validation-errors>
    
                </x-auth-validation-errors>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Banner</h4>
                            <div class="card-header-action">
                               <button type="button" class="btn btn-primary" data-toggle="modal"
                               data-target="#exampleModal">+ Add Banner</button>

                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($banners as $banner)
                                    <li class="media">
                                        <a href="#">
                                            @if ($banner->image)
                                            <img class="mr-3 rounded" width="100"
                                            src="{{ asset('uploads/image/'.$banner->image) }}" alt="banner">
                                            @endif

                                         
                                        </a>
                                        <div class="media-body">
                                            <div class="media-right">
                                                <button type="button" class="btn btn-link border-0 p-0 text-secondary"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>

                                                <div class="dropdown-menu">
                                                    <h6 class="dropdown-header text-left">Action</h6>

                                                    <a href="#" class="dropdown-item">
                                                        <i class="far fa-edit fa-fw mr-2"></i> Edit
                                                    </a>

                                                    
                                                    <a href="{{ route('adminsuper.banners.destroy',$banner->id) }}" class="dropdown-item btn-hapus" onclick="return confirm('Apakah anda yakin menghapus produk ' + '{{ $banner->name }}')">
                                                        <i class="far fa-trash-alt fa-fw mr-2"></i> Delete
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="media-title"><a href="#">{{ $banner->name }}</a></div>
                                            <span>{{ $banner->description }}</span> 
                                          


                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <x-slot name="modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('adminsuper.banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Banner</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Deskripsi</label> 
                            <input type="text" class="form-control" name="description" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" class="form-control" name="image" required>
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
