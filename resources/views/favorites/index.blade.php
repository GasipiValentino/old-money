@extends('layouts.main')

@section('title', 'Favoritos')


@section('content')
<div class="container">
    <h1>Tus Favoritos</h1>

    @if($favorites->isEmpty())
        <p>No tienes productos en tus favoritos.</p>
    @else
        <div class="row">
            @foreach($favorites as $favorite)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $favorite->product->image_url }}" class="card-img-top" alt="{{ $favorite->product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $favorite->product->name }}</h5>
                            <p class="card-text">${{ $favorite->product->price }}</p>
                            <form action="{{ route('favorites.remove', $favorite->product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Eliminar de Favoritos</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
