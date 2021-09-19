@extends('layout.main')

@section('content')
    <div class="row mt-3">
        <div class="col-x col-xl-3 col-md-6 mb-4">
            <div class="card border-left shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no_gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary">Number of games</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $stats['count'] }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gamepad fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-x col-xl-3 col-md-6 mb-4">
            <div class="card border-left shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no_gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary">Games with score 70+</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $stats['countScoreGtFive'] }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star-half-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-x col-xl-3 col-md-6 mb-4">
            <div class="card border-left shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no_gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary">Average score</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $stats['avg'] }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-thermometer-half fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-x col-xl-3 col-md-6 mb-4">
            <div class="card border-left shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no_gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary">Best score</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $stats['max'] }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-thermometer-full fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-x col-xl-3 col-md-6 mb-4">
            <div class="card border-left shadow-sm py-2 h-100">
                <div class="card-body">
                    <div class="row no_gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary">Lowest score</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $stats['min'] }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-thermometer-empty fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Best of the best</div>
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
                            @foreach ($bestGames ?? [] as $bestGame)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bestGame->title }}</td>
                                    <td>{{ $bestGame->score }}</td>
                                    <td>{{ $bestGame->genre }}</td>
                                    <td>
                                        <a href="{{ route('games.b.show', ['game' => $bestGame->id])}}">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
