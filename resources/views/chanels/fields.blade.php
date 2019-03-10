<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_category_id', 'Sub Category Id:') !!}
    {!! Form::number('sub_category_id', $sub_category_id, ['class' => 'form-control', 'readonly'=> 'true']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Video Url Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('video_url', 'Video Url:') !!}
    {!! Form::textarea('video_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('image', 'Image:') !!}
{{--    {!! Form::text('image', null, ['class' => 'form-control']) !!}--}}
    {!! Form::file('image', ['class' => 'form-control']) !!}
</div>

{!! Form::hidden('category_return', $sub_category_id) !!}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('subCategories.show', [$sub_category_id]) !!}" class="btn btn-default">Cancel</a>
</div>