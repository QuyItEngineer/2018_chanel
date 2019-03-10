@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sub Category
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/chanels/create/{!! $subCategory->id !!}">New Channel</a>
            <a class="btn btn-default pull-right" style="margin-top: -10px;margin-bottom: 5px; margin-right: 10px" href="{!! route('categories.show', ['id' => $category_id]) !!}">Back</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('sub_categories.show_fields')
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('chanels.table_relation')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
