<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $chanel->id !!}</p>
</div>

<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <div>
        <img src="{!! asset('images/' . $chanel->image) !!}" alt="images" style="height: 200px; width: 200px;">
    </div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $chanel->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $chanel->description !!}</p>
</div>

<!-- Video Url Field -->
<div class="form-group">
    {!! Form::label('video_url', 'Video Url:') !!}
    <p>{!! $chanel->video_url !!}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{!! $chanel->created_by !!}</p>
</div>

<!-- Updated By Field -->
<div class="form-group">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{!! $chanel->updated_by !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $chanel->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $chanel->updated_at !!}</p>
</div>

