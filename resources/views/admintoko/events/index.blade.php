<x-app-layout>


    <section class="section">

        <div class="section-header">
            <h1>Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Event</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <x-auth-validation-errors>

                </x-auth-validation-errors>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Event</h4>
                            <div class="card-header-action">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">+ Add Event</button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Event</th>
                                            <th>Nama Produk</th>
                                            <th>Diskon</th>
                                            <th>Tanggal Promo</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $event->title }}</td>
                                                <td>{{ $event->product->name }}</td>
                                                <td>{{ $event->diskon }} % </td>
                                                <td>{{ $event->tgl_mulai }} s/d {{ $event->tgl_selesai }}</td>
                                                <td>{{ $event->deskripsi }}</td>
                                                <td>
                                                    <a href="{{ route('admintoko.events.destroy', $event->id) }}"
                                                        onclick="return confirm('Apakah Anda Yakin ?')"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admintoko.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama Event</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" required id="deskripsi" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Diskon (%)</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Diskon" aria-label="Diskon"
                                        name="diskon" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">%</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Produk</label>
                                <select name="product_id" id="product_id" required class="form-control">
                                    <option value="">Pilih Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Mulai</label>
                                    <input type="date" name="tgl_mulai" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Sampai</label>
                                    <input type="date" name="tgl_selesai" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}">
                                </div>
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

    @push('js')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable()
            })
        </script>
    @endpush

</x-app-layout>
