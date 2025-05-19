@extends('layouts.user')
@section('content')
    <div class="container-fluid feature position-relative p-5 pb-0 mt-5">
        <div class="row g-5 gb-5">
            @foreach ($anime as $data)
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item rounded text-center p-5">
                    <img class="img-fluid bg-white " src="{{ asset('storage/anim/' . $data->foto) }}"
                        style="width: 150px; height: 150px;">
                    <h3 class="my-4">{{$data->judul}}</h3>
                    <p class="text-light">{!! \Illuminate\Support\Str::limit($data->desk, 80) !!}</p>
                    <a class="font-body" style="letter-spacing: 1px;" href="">Read More <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
