@extends('layouts.new')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit data Jenis</div>

                <div class="card-body">

                    <form action="{{ route('jenis.update',$jenis->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Jenis</label>
                            <input type="text" class="form-control mt-2 mb-3" name="jenis"  value="{{$jenis->jenis}}" required>
                        </div><r>
                            <button type="submit" class="btn btn-success mb-3">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection