@extends('layouts.new')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">Data Tabel Jenis
                <a href="{{route('jenis.create') }}" class="btn btn-outline-primary" style="float: right">Tambah Data</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dimissible fade show" role="alert">
                        {{session('success') }}
                        <button type="button" class="btn-close" data-bs-dimiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <table class="table table-responsive">
                        <thead>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($jenis as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->jenis}}</td>
                                <td>
                                    <div style="display: flex; gap: 6px;">
                                            <a href="{{ route('jenis.edit', $data->id) }}"
                                                style="background-color: #28a745; color: white; padding: 5px 10px; border-radius: 4px; font-size: 13px; text-decoration: none;">Rubah</a>
                                            <a href="{{ route('jenis.show', $data->id) }}"
                                                style="background-color: #b89017; color: white; padding: 5px 10px; border-radius: 4px; font-size: 13px; text-decoration: none;">Tampilkan</a>
                                            <form action="{{ route('jenis.destroy', $data->id) }}" method="POST"
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
</div>
@endsection