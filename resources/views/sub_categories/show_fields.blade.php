<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $subCategory->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $subCategory->title !!}</p>
</div>

<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <div>
        <img src="{!! asset('images/' . $subCategory->image) !!}" alt="images" style="height: 200px; width: 200px;">
    </div>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $subCategory->description !!}</p>
</div>
