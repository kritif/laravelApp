@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Users list</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Lp</th>
                            <th>Id</th>
                            <th>Nick</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Lp</th>
                            <th>Id</th>
                            <th>Nick</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td><a href="{{ route('get.user.show', ['userId' => $user['id']]) }}">Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
