<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'ID:') !!}
    <p>{!! $category->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $category->title !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $category->description !!}</p>
</div>
