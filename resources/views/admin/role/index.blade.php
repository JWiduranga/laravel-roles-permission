@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-header">
                <h4 class="page-title">User Role - List</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="user-role-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->guard_name }}</td>
                                            <td>
                                                @foreach ($role->permissions()->pluck('name') as $permission)
                                                    <span class="badge badge-count">{{ $permission }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a
                                                    href="{{route('roles.edit',$role->id)}}"
                                                    class="btn btn-xs btn-primary">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                    Edit
                                                </a>
                                                <a href="javascript:void(0)" onclick="deleteItem({{$role->id}})"
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
            deleted('user-role/' + id + '/delete');
        }
    </script>
@endsection
