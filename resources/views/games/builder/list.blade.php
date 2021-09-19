@extends('layout.main')

@section('content')
    <div class="row mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Games</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tadaTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Lp</th>
                                <th>Title</th>
                                <th>Score</th>
                                <th>Category</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Lp</th>
                                <th>Title</th>
                                <th>Score</th>
                                <th>Category</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($games ?? [] as $game)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $game->title }}</td>
                                    <td>{{ $game->score }}</td>
                                    <td>{{ $game->genre }}</td>
                                    <td>
                                        <a href="{{ route('games.b.show', ['game' => $game->id])}}">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $games->links()}}
            </div>
        </div>
    </div>
@endsection
