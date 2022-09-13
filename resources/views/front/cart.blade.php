<x-store-front-layout :title="__('Cart')" :categories="$categories">

    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing">
                <h2 class="mega-heading text-center"><b>{{ __('CART') }}</b></h2><b>
                <table class="table ps-cart__table">
                    <thead>
                        <tr>
                            <th>{{ __('All Products') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Total') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                        <tr>
                            <td><a class="ps-product__preview" href="{{ $item->product->permalink }}"><img class="mr-15"
                                        width="120" src="{{ $item->product->image_url }}" alt=""> {{ $item->product->name }}</a></td>
                            <td>{{ App\Helpers\Currency::format($item->product->price) }}</td>
                            <td>
                                <div class="form-group--number">
                                    <form action="{{ route('cart.quantity') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        <button type="submit" name="quantity" value="-1" class="minus"><span>-</span></button>
                                        <input class="form-control" type="text" value="{{ $item->quantity }}" readonly>
                                        <button type="submit" name="quantity" value="1" class="plus"><span>+</span></button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ App\Helpers\Currency::format($item->product->price * $item->quantity) }}</td>
                            <td>
                                <form action="{{ route('cart.clear') }}" method="post">
                                    @csrf
                                    <input class="form-control" type="hidden" name="product_id" value="{{ $item->product_id }}">
                                    <button class="ps-remove" type="submit"></button>
                                    {{-- <div class="ps-remove" onclick="this.form.submit()"></div> --}}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="ps-cart__actions">
                    <div class="ps-cart__promotion">
                        <div class="form-group">
                            <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                                <input class="form-control" type="text" placeholder="Promo Code">
                            </div>
                        </div>
                        <div class="form-group">
                            <a class="ps-btn ps-btn--gray" href="{{ route('products') }}">{{ __('Continue Shopping') }}</a>
                        </div>
                    </div>
                    <div class="ps-cart__total">
                        <h3>{{__('Total Price')}}: <span> {{App\Helpers\Currency::format($total)}} </span></h3>
                        <a class="ps-btn" href="{{ route('checkout') }}">{{ __('Process to Checkout') }}<i class="ps-icon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-store-front-layout>
