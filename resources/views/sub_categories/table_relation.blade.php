<table class="table table-responsive" id="chanels-table">
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sub_categories as $sub_category)
    <tr>
        <td>{!! $sub_category->title !!}</td>
        <td>{!! $sub_category->description !!}</td>
        <td style="min-width: 100px">
            {!! Form::open(['route' => ['sub-categories.destroy', $sub_category->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('subCategories.show', [$sub_category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('subCategories.edit', [$sub_category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::hidden('category_id', $category->id) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>