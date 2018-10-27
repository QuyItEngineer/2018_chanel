<div class="col-sm-6">
    <div class="form-group text-center">
        <img width="100" src="{{ get_avatar($user) }}" alt="" class="img-circle">
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
        {!! Form::label('name', 'Full Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
