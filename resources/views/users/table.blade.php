<table class="table table-responsive" id="users-table">
    <thead>
    <tr>
        <th>Avatar</th>
        <th>Username</th>
        <th>Email</th>
        <th>Store Name</th>
        <th>Full Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Date</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td><img width="40" height="40" src="{!! get_avatar($user) !!}" alt="" class="img-circle"></td>
            <td>{!! $user->username !!} @foreach($user->getRoleNames() as $roleName) <span class="label label-primary">{!! $roleName !!}</span> @endforeach</td>
            <td>{!! $user->email !!}</td>
            <td>{!! count($user->stores) == 1?$user->stores[0]->name:'' !!}</td>
            <td>{!! $user->full_name !!}</td>
            <td>{!! $user->phone !!}</td>
            <td>{!! $user->address !!}</td>
            <td>{!! $user->created_at->format('d/m/Y') !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{--<a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    @if(!$user->hasRole('admin'))
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>