@extends('layouts.new')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18">
                <div class="card">
                    <div class="card-header">Menampilkan data Artikel</div>

                    <div class="card-body">

                        <form action="{{ route('anime.update', $anime->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group mb-5 mt-3">
                                <label>Judul Artikel</label>
                                <input type="text" class="form-control" name="judul" value="{{ $anime->judul }}"
                                    disabled>
                            </div>
                            <div class="form-group mb-5 mt-5">
                                <label>Jenis Artikel</label>
                                <input type="text" class="form-control mt-2 mb-3" name="id_jenis" id=""
                                    value="{{ $anime->jenis->jenis }}" disabled>
                            </div>
                            <div class="form-group mb-5 mt-3">
                                <label class="mb-2">Foto </label>
                                <br>
                                <img src="{{ asset('storage/anim/' . $anime->foto) }}" alt=""
                                    style="width: 310px; height: 210px;">
                            </div>
                            <div class="form-group mb-5 mt-3">
                                <label>Deskripsi Artikel</label>
                                <p>{!! $anime->desk ?? '' !!}</p>
                            </div>
                            
                    </div>
                    <div class="form-group mb-5 mt-3">
                        <label>Penulis Artikel</label>
                        <input type="text" class="form-control mt-2 mb-3" name="penulis" value="{{ $anime->penulis }}" readonly>
                    </div>
                    <r>
                        <a href="{{ route('anime.index') }}"
                            style="background-color: #b89017; color: white; padding: 5px 10px; border-radius: 4px; font-size: 13px; text-decoration: none;"
                            class="btn btn-warning">Kembali Ke Beranda</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
