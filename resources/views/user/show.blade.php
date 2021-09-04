@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent
    <div>Lista użytkowników: <a href="{{ route('get.users') }}">Link</a></div>
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">{{ $user['name'] }}</h5>
        <div class="card-body">
            <ul>
                <li>Id: {{ $user['id'] }}</li>
                <li>Name: {{ $user['firstName'] }}</li>
                <li>LastName: {{ $user['lastName'] }}</li>
                <li>City: {{ $user['city'] }}</li>
                <li>Age: {{ $user['age'] }}</li>
            </ul>

            <a href="{{ route('get.users') }}" class="btn btn-light">Users list</a>
        </div>
    </div>
@endsection
