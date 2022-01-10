@extends('layouts.template')

@section('title', 'Shop')

@section('main')
    <h1>Itunes {{ $info['title'] }} - {{ $info['country'] }}</h1>
    <h5>{{ $info['updated'] }}</h5>
    <div class="row">
        @foreach($albums as $album)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{ $album['artworkUrl100'] }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $album['artistName'] }}</h5>
                    <p class="card-text">{{ $album['name'] }}</p>
                    <hr>
                    <p class="card-text">Genre: {{ $album['genres'][0]['name'] }}</p>
                    <p class="card-text">Artist URL: <a href="{{ $album['artistUrl'] }}">  {{ $album['artistName'] }}  </a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
