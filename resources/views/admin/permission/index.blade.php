@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-header">
                <h4 class="page-title">User Permission - List</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="user-role-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{$permission->id}}</td>
                                            <td>{{$permission->name}}</td>
                                            <td>{{$permission->guard_name}}</td>
                                            <td><a class="btn btn-outline-secondary btn-sm" href="{{ route('permissions.edit',$permission->id) }}">Edit</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="row justify-content-center">
                                {{ $permissions->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.3/dist/sweetalert2.all.min.js"></script>
{{--    <script src="{{url('js/commern.js')}}"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}

{{--            var table = $('#user-role-datatables').DataTable({--}}
{{--                processing: true,--}}
{{--                serverSide: true,--}}
{{--                ajax: "{{ route('user-permission.json-list') }}",--}}
{{--                columns: [--}}
{{--                    {--}}
{{--                        data: 'DT_RowIndex',--}}
{{--                        name: 'DT_RowIndex',--}}
{{--                        orderable: false,--}}
{{--                        searchable: false--}}
{{--                    },--}}
{{--                    {data: 'name', name: 'name'},--}}
{{--                    {data: 'guard_name', name: 'guard_name'},--}}
{{--                    {--}}
{{--                        data: 'action',--}}
{{--                        name: 'action',--}}
{{--                        orderable: false,--}}
{{--                        searchable: false--}}
{{--                    },--}}
{{--                ]--}}
{{--            });--}}

{{--        });--}}

{{--        function deleteItem(id) {--}}
{{--            deleted('user-permission/' + id + '/delete');--}}
{{--        }--}}
{{--    </script>--}}
@endsection
