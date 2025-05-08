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
                                <th style="border: 1px solid #ccc; padding: 10px;">No</th>
                                <th style="border: 1px solid #ccc; padding: 10px;">Judul</th>
                                <th style="border: 1px solid #ccc; padding: 10px;">Jenis</th>
                                <th style="border: 1px solid #ccc; padding: 10px;">Foto</th>
                                <th style="border: 1px solid #ccc; padding: 10px;">Deskripsi Artikel</th>
                                <th style="border: 1px solid #ccc; padding: 10px;">Penulis Artikel</th>
                                <th style="border: 1px solid #ccc; padding: 10px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($anime as $data)
                                <tr>
                                    <td style="border: 1px solid #ccc; padding: 10px;">{{ $no++ }}</td>
                                    <td style="border: 1px solid #ccc; padding: 10px;">{{ $data->judul }}</td>
                                    <td style="border: 1px solid #ccc; padding: 10px;">{{ $data->jenis->jenis }}</td>
                                    <td style="border: 1px solid #ccc; padding: 10px;">
                                        <img src="{{ asset('storage/anim/' . $data->foto) }}" alt="Foto"
                                            style="width: 200px; height: 110px; object-fit: cover;">
                                    </td>
                                    <td style="border: 1px solid #ccc; padding: 10px;" title="{{ $data->desk }}">
                                        {{ \Illuminate\Support\Str::limit($data->desk, 50) }}
                                    </td>
                                    <td style="border: 1px solid #ccc; padding: 10px;">{{ $data->penulis }}</td>
                                    <td style="border: 1px solid #ccc; padding: 10px;">
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
