<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            @if($sku->product->isNew())
                <span class="badge badge-success">@lang('main.properties.new')</span>
            @endif

            @if($sku->product->isRecommend())
                <span class="badge badge-warning">@lang('main.properties.recommend')</span>
            @endif

            @if($sku->product->isHit())
                <span class="badge badge-danger">@lang('main.properties.hit')</span>
            @endif
        </div>
        <img src="{{ Storage::url($sku->product->image) }}" alt="{{ $sku->product->__('name') }}">
        <p class="caption">
            <h3>{{ $sku->product->__('name') }}</h3>
            @isset($sku->product->properties)
                @foreach ($sku->propertyOptions as $propertyOption)
                    <h4>{{ $propertyOption->property->__('name') }}: {{ $propertyOption->__('name') }}</h4>
                @endforeach
            @endisset
            <p>{{ $sku->price }} {{ $currencySymbol }}</p>
            <p>
                <form action="{{ route('basket-add', $sku) }}" method="POST">
                    @csrf
                        <div class="row centered">
                            <div class="col-xs-6 col-sm-8 col-md-8">

                                @if($sku->isAvailable())
                                    <button type="submit" class="btn  btn-primary btn-sm btn-block" role="button">@lang('main.add_to_basket')</button>
                                @else
                                    @lang('main.not_available')
                                @endif
                                <a href="{{ route('sku',
                                [isset($category) ? $category->code :
                                $sku->product->category->code, $sku->product->code, $sku->id]) }}"
                                   class="btn btn-default btn-sm btn-block"
                                   role="button">@lang('main.more')</a>

                                @if(!in_array($sku->id, Auth::user()->getFavoritesSkuIds()))
                                    <a href="{{ route('personal.favorites.skus.add', [$sku->id]) }}"
                                       class="btn btn-success btn-sm btn-block"
                                       role="button">@lang('main.add_to_favorites')</a>
                                @else
                                    <a href="{{ route('personal.favorites.skus.remove', [$sku->id]) }}"
                                       class="btn btn-danger btn-sm btn-block"
                                       role="button">@lang('main.delete_from_favorites')</a>
                                @endif

                            </div>
                        </div>
                </form>
            </p>
        </p>
    </div>
</div>
