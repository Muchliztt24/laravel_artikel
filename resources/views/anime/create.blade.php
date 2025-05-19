@extends('layouts.new')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18">
                <div class="card">
                    <div class="card-header">Tambah data Artikel</div>

                    <div class="card-body">



                        <form action="{{ route('anime.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-5 mt-3">
                                <label>Judul Artikel</label>
                                <input type="text" class="form-control" name="judul" required>
                            </div>

                            <div class="form-group mb-5 mt-5">
                                <label>Jenis Artikel</label>
                                <select class="form-control mt-2 mb-3" name="id_jenis">
                                    @foreach ($jenis as $data)
                                        <option value="{{ $data->id }}">{{ $data->jenis }}</option>
                                    @endforeach
                                </select>
                                @error('id_jenis')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-5 mt-3">
                                <label>Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto">
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-5 mt-3">
                                <label>Deskripsi Artikel</label>
                                <textarea class="form-control" name="desk" cols="30" rows="15" id="editor"></textarea>
                            </div>
                            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor'))
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>

                            <div class="form-group mb-5 mt-3">
                                <label>Penulis Artikel</label>
                                <input type="text" class="form-control" name="penulis" required>
                            </div>

                            <button type="submit" class="btn btn-primary mb-3 mt-2">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
