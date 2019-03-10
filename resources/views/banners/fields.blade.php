<!-- Url Banner Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('url_banner', 'Upload Banner:') !!}
    {!! Form::file('url_banner', ['class' => 'form-control', 'value' => '']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('banners.index') !!}" class="btn btn-default">Cancel</a>
</div>
