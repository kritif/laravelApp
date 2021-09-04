@extends('layout.main')

@section('content')
    <div class="card">
        @if (!empty($game))
        <h5 class="card-header">{{ $game->title }}</h5>
        <div class="card-body">
            <ul>
                <li>Id: {{ $game->title }}</li>
                <li>Title: {{ $game->title }}</li>
                <li>Score: {{ $game->score }}</li>
                <li>Publisher: {{ $game->publisher }}</li>
                <li>Published: {{ $game->published }}</li>
                <li>Category: {{ $game->genre }}</li>
                <li>Description:
                    <div> {{ $game->description }} </div>
                </li>
            </ul>
            <a href="{{ route('games.index') }}" class="btn btn-light">List</a>
        </div>
        @else
            <h5 class="card_header">No data to dispaly</h5>
        @endif
    </div>
@endsection
