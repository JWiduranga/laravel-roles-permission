@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-header">
                <h4 class="page-title">User Permission - Create</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {!! Form::open(['route' => 'permissions.store', 'files' => false]) !!}
                        @include('admin.permission.partials.form',
                        [
                            'name'=>null
                        ]
                        )
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right mt-3 mb-3">
                                    <div class="card-action">
                                        <button class="btn btn-success btn-sm">Create</button>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    @include('sweetalert::alert')
@endsection

