
<x-app-layout>
    

    <section class="section">
       
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Users</div>
            </div>
        </div>

        <div class="section-body">
           
            <div class="row">
                <x-auth-validation-errors>
    
                </x-auth-validation-errors>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Pengguna</h4>
                            <div class="card-header-action">
                               

                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($users as $user)
                                    <li class="media">
                                        <a href="#">
                                            @if ($user->image)
                                            <img class="mr-3 rounded" width="100"
                                            src="{{ asset('uploads/image/'.$user->image) }}" alt="product">
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


                                                    <a class="dropdown-item btn-hapus" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">
                                                        <i class="fas fa-edit fa-fw mr-2"></i>  Edit
                                                    </a>

                                                    <a href="{{ route('adminsuper.users.destroy',$user->id) }}" class="dropdown-item btn-hapus" onclick="return confirm('Apakah anda yakin menghapus produk ' + '{{ $user->name }}')">
                                                        <i class="far fa-trash-alt fa-fw mr-2"></i> Delete
                                                    </a>

                                                  

                                                </div>
                                            </div>
                                            <div class="media-title"><a href="#">{{ $user->name }}</a></div>
                                            <span>{{ $user->email }}</span> . <span>{{ $user->roles[0]->name }}</span>
                                            <p>{{ $user->alamat }}</p>
                                          


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
      <!-- Modal -->
      @foreach ($users as $user)
<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ganti Password {{ $user->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('adminsuper.users.updatepassword', $user->id) }}" method="post">
        @csrf
    @method('put')
        <div class="modal-body">
          <div class="form-group">
            <label for="">Password Baru</label>
            <input type="password" name="password" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ganti Password</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  @endforeach
    </x-slot>
</x-app-layout>
