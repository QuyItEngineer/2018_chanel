@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Users</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-header">
                <div class="box-tools pull-right">
                    <div class="has-feedback">
                        {!! Form::open(['method' => 'get']) !!}
                        <input type="text" name="search" class="form-control input-sm" placeholder="Search..." value="{!! Request::get('search') !!}">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="box-body">
                    @include('users.table')
            </div>
        </div>
        <div class="text-center">
            @include('adminlte-templates::common.paginate', ['records' => $users])
        </div>
    </div>
@endsection

