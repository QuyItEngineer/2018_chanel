<div class="col-sm-6">
    <div class="form-group text-center">
        @if(isset($user))
            <img width="100" src="{{ get_avatar($user) }}" alt="" class="img-circle">
        @endif
        {!! Form::file('avatar_file', ['class' => 'form-control', 'style' => 'margin-top: 40px']) !!}
    </div>
</div>
<div class="col-sm-6">
    <!-- Username Field -->
    <div class="form-group">
        {!! Form::label('username', 'Username:') !!}
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Phone Field -->
    <div class="form-group">
        {!! Form::label('phone', 'Phone:') !!}
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Full Name Field -->
    <div class="form-group">
        {!! Form::label('full_name', 'Full Name:') !!}
        {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Address Field -->
    <div class="form-group">
        {!! Form::label('address', 'Address:') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Password Field -->
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!-- Roles Field -->
    <div class="form-group">
        {!! Form::label('roles', 'Roles:') !!}
        {!! Form::select('roles[]', $roleList, $roles , ['class' => 'form-control', 'multiple' => true]) !!}
    </div>
</div>
<!-- Submit Field -->
@if(Request::is('*edit') && count($user->stores) == 1)
    <div class="form-group col-sm-12">
        <a href="{!! route('stores.edit',$user->stores[0]->id) !!}" class="btn btn-success">Update Store</a>
    </div>
@endif
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
