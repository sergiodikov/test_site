{{--<div class="col-sm-6 col-md-3">
    <label for="price_from">Цена от                    <input type="text" name="price_from" id="price_from" size="6" value="">
    </label>
    <label for="price_to">до                    <input type="text" name="price_to" id="price_to" size="6"  value="">
    </label>
</div>--}}
<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} руб.</p>
            <p>
            <form action="{{route('basket-add',$product)}}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                <a href="{{route('product',[$product-> category->code, $product-> code])}}" class="btn btn-default"
                   role="button">Подробнее
                </a>
                @csrf
            </form>
            </p>
        </div>
    </div>
</div>
