<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutorial CRUD Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    {{-- <style>
        .pagination li {
            float: left;
            list-style-type: none;
            margin: 5px;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        table tr th,
        table tr td {
            padding: 5px 10px;
        }
    </style> --}}
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Data Pegawai</h3>

                <div class="form-group">
                    <form action="/pegawai/cari" method="get" class="form-inline">
                        <input type="text" class="form-control" name="cari" placeholder="Cari Nama Pegawai..."
                            value="{{ old('cari') }}">
                        <input type="submit" class="btn btn-primary ml-3" value="Cari">
                    </form>

                </div>
                <a name="" class="btn btn-primary float-right" href="/pegawai/tambah" role="button">(+) Add
                    Data</a><br><br>

                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                    @foreach ($pegawai as $p)
                        <tr>
                            <td>{{ $p->pegawai_nama }}</td>
                            <td>{{ $p->pegawai_jabatan }}</td>
                            <td>{{ $p->pegawai_umur }}</td>
                            <td>{{ $p->pegawai_alamat }}</td>
                            <td>
                                <a href="/pegawai/edit/{{ $p->pegawai_id }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="/pegawai/hapus/{{ $p->pegawai_id }}" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                Halaman : {{ $pegawai->currentPage() }} <br>
                Jumlah Data : {{ $pegawai->total() }} <br>
                Data per Halaman : {{ $pegawai->perPage() }} <br>

                {{ $pegawai->links() }}
            </div>
        </div>
    </div>


</body>

</html>
