<div>

    <div class="ps-cart"><a class="ps-cart__toggle" href="{{ route('cart') }}"><span><i>{{ $cart->quantity() }}</i></span><i
                class="ps-icon-shopping-cart"></i></a>
        <div class="ps-cart__listing">
            <div class="ps-cart__content">
                @foreach ($cart->all() as $item)
                <div class="ps-cart-item">
                    <form action="{{ route('cart.clear') }}" method="post" id="clear{{ $item->id }}">
                    @csrf
                    <input class="form-control" type="hidden" name="product_id" value="{{ $item->product_id }}">
                        <a class="ps-cart-item__close" href="#" onclick="event.preventDefault(); document.getElementById('clear{{ $item->id }}').submit()"></a>
                    </form>
                    <div class="ps-cart-item__thumbnail"><a href="{{ $item->product->premalink }}"></a><img src="{{ $item->product->image_url }}" alt=""></div>
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="{{ $item->product->premalink }}">{{ $item->product->name }}</a>
                        <p><span>{{ __('Quantity') }}:<i>{{ $item->quantity }}</i></span><span>{{ __('Total') }}:<i>£{{ $item->quantity * $item->product->price }}</i></span></p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="ps-cart__total">
                <p>{{ __('Number of items') }}:<span>{{ $cart->quantity() }}</span></p>
                <p>{{ __('Total Price') }}:<span>£{{ $cart->total() }}</span></p>
            </div>
            <div class="ps-cart__footer"><a class="ps-btn" href="{{ route('checkout') }}">{{ __('Check out') }}<i
                        class="ps-icon-arrow-left"></i></a></div>
        </div>
    </div>

</div>
