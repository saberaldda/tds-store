<x-store-front-layout :title="__('Wishlist')" :categories="$categories">
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing ps-table--whishlist">
                <h2 class="mega-heading text-center"><b>{{ __('WISHLIST') }}</b></h2><b>
                <table class="table ps-cart__table">
                    <thead>
                        <tr>
                            <th>{{ __('All Products') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Wish Date') }}</th>
                            <th>{{ __('View') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlist as $item)
                            <tr>
                                <td style="width: 40%"><a class="ps-product__preview" href="{{ route('product.details', $item->product->slug) }}">
                                    <img class="mr-15" width="120px" src="{{ $item->product->image_url }}" alt=""> {{ $item->product->name }}</a></td>
                                <td>{{ App\Helpers\Currency::format($item->product->price) }}</td>
                                <td> {{ $item->updated_at->diffForHumans() }} </td>
                                <td><a class="ps-product-link" href="{{ route('product.details', $item->product->slug) }}">{{ __('View Product') }}</a></td>
                                <form action="{{ route('wishlist.delete') }}" method="post" id="wishlist">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                    <td><button class="ps-remove" type="submit"></button></td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-store-front-layout>
