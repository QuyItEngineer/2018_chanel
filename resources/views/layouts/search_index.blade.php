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