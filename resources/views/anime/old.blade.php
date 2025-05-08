old view
<div class="card-header">Data Anime
    <a href="{{ route('anime.create') }}" class="btn btn-outline-primary" style="float: right">Tambah
        Data</a>
</div>
<div class="card-body">
    @if (session('success'))
        <div class="alert alert-success alert-dimissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dimiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-responsive">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Jenis</th>
            <th>Deskripsi Artikel</th>
            <th>Foto</th>
            <th>Penulis Artikel</th>
            <th style="width: 180px;">Aksi</th>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach ($anime as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->jenis->jenis }}</td>
                    <td>{{ $data->desk }}</td>
                    <td><img src="{{ asset('storage/anim/' . $data->foto) }}" alt=""
                            style="width: 210px; height: 110px;"></td>
                    <td>{{ $data->penulis }}</td>
                    <td>
                        <form action="{{ route('anime.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('anime.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{ route('anime.show', $data->id) }}" class="btn btn-sm btn-warning">Show</a>
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Apakah anda Yakin')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
theme gagal
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-18">
                <div class="card">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Desk</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Penulis</th>
                                            <th scope="col" style="width: 100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($anime as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->judul }}</td>
                                                <td>{{ $data->jenis->jenis }}</td>
                                                <td
                                                    style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $data->desk }}</td>
                                                <td><img src="{{ asset('storage/anim/' . $data->foto) }}" alt=""
                                                        style="max-width: 100%; height: auto; width: 210px; height: 110px;">
                                                </td>
                                                <td>{{ $data->penulis }}</td>
                                                <td style="width: 180px">
                                                    <form action="{{ route('anime.destroy', $data->id) }}" method="POST"
                                                        class="d-grid gap-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('anime.edit', $data->id) }}"
                                                            class="btn btn-sm btn-success">Edit</a>
                                                        <a href="{{ route('anime.show', $data->id) }}"
                                                            class="btn btn-sm btn-warning">Show</a>
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah anda Yakin')">Hapus</button>
                                                    </form>
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
    </div>