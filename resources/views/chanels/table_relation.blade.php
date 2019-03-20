<table class="table table-responsive" id="chanels-table">
    <thead>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Video Url</th>
        <th>Created At</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($chanels as $chanel)
        <tr>
            <td>
                <img src="{!! asset('images/' . $chanel->image) !!}" alt="images"  style="height: 50px; width: 50px;">
                {{--{!! $chanel->image !!}--}}
            </td>
            <td>{!! $chanel->name !!}</td>
            <td>{!! $chanel->description !!}</td>
            <td>{!! $chanel->video_url !!}</td>
            <td>{!! $chanel->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['channel.destroy', $chanel->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('chanels.show', [$chanel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('chanels.edit', [$chanel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::hidden('sub_category_id', $subCategory->id) !!}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    <is-video-status channel_id="{!! $chanel->id !!}"
                                     is_status="{!! trans('labels.template.video_status')[$chanel->is_show_video_url] !!}"></is-video-status>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{--<script src="http://code.jquery.com/jquery-3.3.1.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}
{{--<script type="application/javascript">--}}
    {{--$(document).ready(function () {--}}
        {{--$('input.checkbox_channels').change(function () {--}}
            {{--if($(this).is(":checked")) {--}}
                {{--alert('checked');--}}
                {{--// $.ajax({--}}
                {{--//     url: 'on_off.aspx',--}}
                {{--//     type: 'POST',--}}
                {{--//     data: { strID:$(this).attr("id"), strState:"1" }--}}
                {{--// });--}}
            {{--} else {--}}
                {{--alert('no');--}}
                {{--// $.ajax({--}}
                {{--//     url: 'on_off.aspx',--}}
                {{--//     type: 'POST',--}}
                {{--//     data: { strID:$(this).attr("id"), strState:"0" }--}}
                {{--// });--}}
            {{--}--}}

        {{--});--}}
    {{--});--}}
{{--</script>--}}
