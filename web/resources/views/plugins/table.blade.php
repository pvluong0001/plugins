<div class="table-responsive-sm">
    <table class="table table-striped" id="plugins-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Author</th>
        <th>Enabled</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($plugins as $plugin)
            <tr>
                <td>{{ $plugin->name }}</td>
            <td>{{ $plugin->author }}</td>
            <td>{{ $plugin->enabled }}</td>
                <td>
                    {!! Form::open(['route' => ['plugins.destroy', $plugin->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('plugins.show', [$plugin->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('plugins.edit', [$plugin->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>