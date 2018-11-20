<table class="table table-striped">
    <form action="?" method="GET" class="form-inline">
        <thead>
        <tr>

            <th width="5px">ID</th>
            <th width="80px">Код</th>
            <th width="40px">Картинка</th>
            <th width="600px">Навание</th>
            <th>
                <label for="stk" class="col-form-label" style="margin: 0; cursor: pointer;">Кол-во</label>
                <button style="padding: 0;" type="submit" id="stk" class="btn btn-xs btn-box-tool" name="stk" value="{{ request('stk') === 'desc' ? 'asc' : 'desc' }}"><i class="fa fa-sort-numeric-{{ request('stk') === 'desc' ? 'desc' : 'asc' }}" aria-hidden="true"></i></button>
            </th>
            <th>MSK</th>
            <th>
                <label for="price_base" class="col-form-label" style="margin: 0; cursor: pointer;">Цена</label>
                <button style="padding: 0;" type="submit" id="price_base" class="btn btn-xs btn-box-tool" name="price_base" value="{{ request('price_base') === 'desc' ? 'asc' : 'desc' }}"><i class="fa fa-sort-numeric-{{ request('price_base') === 'desc' ? 'desc' : 'asc' }}" aria-hidden="true"></i></button>
            </th>
            <th>Кат-я</th>
            <th>
                <label for="date_update" class="col-form-label" style="margin: 0; cursor: pointer;">Date Update</label>
                <button style="padding: 0;" type="submit" id="date_update" class="btn btn-xs btn-box-tool" name="date_update" value="{{ request('date_update') === 'desc' ? 'asc' : 'desc' }}"><i class="fa fa-sort-numeric-{{ request('date_update') === 'desc' ? 'desc' : 'asc' }}" aria-hidden="true"></i></button>
            </th>
        </tr>
        </thead>
    </form>
    <tbody>

    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td><a href="https://www.galacentre.ru/catalog/all/?q={{ $product->article }}" target="_blank">{{ $product->article }}</a></td>
        <td><img src="{{ $product->image }}" alt="" width="40px"><i class="fa fa-circle {{ $product->status === 'Y' ? 'text-success' : 'text-denger' }}"></i></td>
        <td><a href="{{ route('admin.products.products.show', $product) }}" target="_blank">{{ $product->name_original }}</a></td>
        <td>{{ $product->stk }} </td>
        <td>{{ $product->store_msk }} </td>
        <td>{{ $product->price_base }} </td>
        <td>{{ $product->category->id }}</td>
        <td class="{{ $product->statusDate($product->date_update) }}">{{ $product->gDateF($product->date_update) }}</td>


        <td>
            {{--@if ($advert->isDraft())--}}
            {{--<span class="badge badge-secondary">Draft</span>--}}
            {{--@elseif ($advert->isOnModeration())--}}
            {{--<span class="badge badge-primary">Moderation</span>--}}
            {{--@elseif ($advert->isActive())--}}
            {{--<span class="badge badge-primary">Active</span>--}}
            {{--@elseif ($advert->isClosed())--}}
            {{--<span class="badge badge-secondary">Closed</span>--}}
            {{--@endif--}}
        </td>
    </tr>
    @endforeach

    </tbody>
</table>