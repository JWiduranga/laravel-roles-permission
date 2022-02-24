@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-header">
                <h4 class="page-title">User - List</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="user-datatables" class="display table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @foreach ($user->roles()->pluck('name') as $role)
                                                    <span class="label label-info label-many">{{ $role }}</span>
                                                @endforeach
                                            </td>
                                            <td>

                                                <a
                                                    href="{{route('users.edit',$user->id)}}"
                                                    class="btn btn-xs btn-primary">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                    Edit
                                                </a>
                                                <a href="javascript:void(0)" onclick="deleteItem({{$user->id}})"
                                                   class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.3/dist/sweetalert2.all.min.js"></script>
    <script src="{{url('js/commern.js')}}"></script>
    <script type="text/javascript">
        function deleteItem(id) {
            deleted('user/' + id + '/delete');
        }
    </script
@endsection
