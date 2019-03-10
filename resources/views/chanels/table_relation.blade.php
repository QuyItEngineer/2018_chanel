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
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>