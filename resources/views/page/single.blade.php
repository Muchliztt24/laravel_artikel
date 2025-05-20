@extends('layouts.user')
@section('content')
    <div class="container mt-5 text-dark">
        <h2>{{ $anime->judul }}</h2>
        <img src="{{ asset('storage/anim/' . $anime->foto) }}" width="1000">
        <p class="mt-3 text-dark" style="color: black">{!! $anime->desk !!}</p>
    </div>
@endsection
