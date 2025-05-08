@extends('layouts.new')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18">
                <div class="card">
                    <div class="card-header">Mengubah data Artikel</div>

                    <div class="card-body">

                        <form action="{{ route('anime.update',$anime->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group mb-5 mt-3">
                                <label>Judul Artikel</label>
                                <input type="text" class="form-control" name="judul" value="{{$anime->judul}}" required>
                            </div>
                            <div class="form-group mb-5 mt-5">
                                <label>Jenis Artikel</label>
                                <select class="form-control mt-2 mb-3" name="id_jenis" id="">
                                    @foreach ($jenis as $data)
                                        <option value="{{ $data->id }}">{{ $data->jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-5 mt-3">
                                <label class="mb-2">Foto </label>
                            <img src="{{ asset('storage/anim/'.$anime->foto) }}" alt="" style="width: 210px; height: 110px;" class="form-control">
                            <input type="file" class="form-control mt-5 mb-5 @error('foto') is-invalid @enderror" name="foto" id="" value="{{$anime->foto}}">
                            {{-- @if($buku->photo)
                                <div class="mb-2">
                                    <img src="{{ Storage::url('buku/' . $buku->photo)}}" alt="Foto Buku" 
                                    class="img-thumbnail" width="150">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{$buku->photo}}" >
                            @error('photo')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror --}}
                            </div>
                            <div class="form-group mb-5 mt-3">
                                <label>Deskripsi Artikel</label>
                                <textarea class="form-control" name="desk" id="" cols="30" rows="15">{{$anime->desk}}</textarea>
                            </div>
                            <div class="form-group mb-5 mt-3">
                                <label>Penulis Artikel</label>
                                <input type="text" class="form-control" name="penulis" value="{{$anime->penulis}}" required>
                            </div>
                            <r>
                                <button type="submit" class="btn btn-success mb-3 mt-2">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection