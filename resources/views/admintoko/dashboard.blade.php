<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Dashboard</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Data Users/Klien</h4>
                    <b>Total User/Klien: {{ $users->count() }}</b>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <th>No.Telepon</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->nama_perusahaan }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->no_telepon }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </section>

    <x-slot name="modal">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            $('#myTable').DataTable()
        </script>
        <script>
            const labels = [
                @foreach ($transactions as $transaction)
                    '{{ $transaction->created_at->format('d M') }}'
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
