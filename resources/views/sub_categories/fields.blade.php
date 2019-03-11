<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::number('category_id', $category_id, ['class' => 'form-control', 'readonly'=> 'true']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 col-lg-6" style="margin-top: 5%;">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', ['class' => 'form-control', 'value' => '']) !!}
</div>

{!! Form::hidden('category_return', $category_id) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.show', [$category_id]) !!}" class="btn btn-default">Cancel</a>
</div>
