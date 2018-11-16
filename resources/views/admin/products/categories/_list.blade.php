<div class="table-responsive">

    @if(count($categories) != null)
    <table class="table no-margin">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Name Оригинал</th>
            <th>Slug</th>
            <th width="200px">Position</th>
            <th>Status</th>
            <th class="text-right">Edit</th>
            <th class="text-right">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                    @if($category->name)
                    @for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                    <a href="{{ route('admin.products.categories.show', $category) }}">{{ $category->name }}</a>
                    @endif
                </td>
                <td>@for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                    <a href="{{ route('admin.products.categories.show', $category) }}">{{ $category->name_original }}</a></td>
                <td><span class="text-muted">{{ $category->slug }}</span></td>
                <td>
                    <div class="" style="margin: 0 -10px;">
                        <form method="POST" action="{{ route('admin.products.categories.first', $category) }}">
                            @csrf
                            <button class="btn btn-xs btn-box-tool" style="padding: 0px !important;"><i class="fa fa-angle-double-up"></i></button>
                        </form>
                        <form method="POST" action="{{ route('admin.products.categories.up', $category) }}">
                            @csrf
                            <button class="btn btn-xs btn-box-tool" style="padding: 0px !important;"><i class="fa fa-angle-up"></i></button>
                        </form>
                        <form method="POST" action="{{ route('admin.products.categories.down', $category) }}">
                            @csrf
                            <button class="btn btn-xs btn-box-tool" style="padding: 0px !important;"><i class="fa fa-angle-down"></i></button>
                        </form>
                        <form method="POST" action="{{ route('admin.products.categories.last', $category) }}">
                            @csrf
                            <button class="btn btn-xs btn-box-tool" style="padding: 0px !important;"><i class="fa fa-angle-double-down"></i></button>
                        </form>
                    </div>
                </td>
                <td><span class="label label-{{ $category->status == 'Y' ? 'success' : 'danger' }}">{{ $category->status == 'Y' ? 'Active' : 'Откллючен' }}</span></td>
                <td><a href="{{ route('admin.products.categories.edit', $category->id) }}" class="btn btn-box-tool  btn-xs pull-right" style="padding: 0px !important;"><i class="fa  fa-edit"></i></a></td>
                <td>
                    <form method="POST" action="{{ route('admin.products.categories.destroy', $category) }}" class="form-inline pull-right">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Удалить Категорию?')" class="btn btn-box-tool btn-xs text-red" style="padding: 0px !important;"><i class="fa fa-trash-o"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach



        </tbody>
    </table>

    @else
        <div class="text-center">
            <h1 class="text-muted" style="padding-bottom: 40px">
                Пусто
            </h1>
        </div>
    @endif

</div>
<!-- /.table-responsive -->