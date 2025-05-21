@extends('layouts.new')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Anime</h5>
                <a href="{{ route('anime.create') }}" class="btn btn-outline-primary" style="float: left">Tambah Data</a>
            </div>
            

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="custom-table">
                    <table style="width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px;">
                        <thead>
                            <tr style="background-color: #f0f0f0;">
                                <th>No</th>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Foto</th>
                                <th>Deskripsi Artikel</th>
                                <th>Penulis Artikel</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($anime as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->judul }}</td>
                                    <td>{{ $data->jenis->jenis }}</td>
                                    <td>
                                        <img src="{{ asset('storage/anim/' . $data->foto) }}" alt="Foto"
                                            style="width: 200px; height: 110px; object-fit: cover;">
                                    </td>
                                    <td title="{{ $data->desk }}">
                                        {!! \Illuminate\Support\Str::limit($data->desk, 20) !!}
                                    </td>
                                    <td>{{ $data->penulis }}</td>
                                    <td>
                                        <div style="display: flex; gap: 6px;">
                                            <a href="{{ route('anime.edit', $data->id) }}"
                                                style="background-color: #28a745; color: white; padding: 5px 10px; border-radius: 4px; font-size: 13px; text-decoration: none;">Rubah</a>
                                            <a href="{{ route('anime.show', $data->id) }}"
                                                style="background-color: #b89017; color: white; padding: 5px 10px; border-radius: 4px; font-size: 13px; text-decoration: none;">Tampilkan</a>
                                            <form action="{{ route('anime.destroy', $data->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah anda yakin?')" style="margin: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 4px; font-size: 13px; cursor: pointer;">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
