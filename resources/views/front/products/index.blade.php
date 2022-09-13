<x-store-front-layout :title="$title" :categories="$categories">

    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
          <div class="ps-product-action">
            <div class="ps-product__filter">
              <form action="{{ Request::fullUrl() }}" method="get">
                <select class="ps-select selectpicker" name="filter" onchange="this.form.submit()">
                  <option value="">{{ __('SortBy') }}</option>
                  <option value="name" @selected('name' ==  request()->get('filter'))>{{ __('Name') }}</option>
                  <option value="pricea-z" @selected('priceaz' ==  request()->get('filter'))>{{ __('Price (Low to High)') }}</option>
                  <option value="pricez-a" @selected('priceza' ==  request()->get('filter'))>{{ __('Price (High to Low)') }}</option>
                </select>
              </form>
            </div>
            <div class="ps-pagination">
              <ul class="pagination">
                {{ $products->withquerystring()->links('front.pagenation') }}
            </div>
          </div>
            <div class="ps-product__columns">
                @foreach ($products as $product)
                <div class="ps-product__column">
                    <x-product-item :product="$product" />
                    {{-- <div class="ps-shoe mb-30">
                        <div class="ps-shoe__thumbnail">
                            <div class="ps-badge"><span>New</span></div>
                            <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="{{ asset('assets/front/images/shoe/1.jpg') }}" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                        </div>
                        <div class="ps-shoe__content">
                            <div class="ps-shoe__variants">
                                <div class="ps-shoe__variant normal"><img src="{{ asset('assets/front/images/shoe/2.jpg') }}" alt=""><img src="{{ asset('assets/front/images/shoe/3.jpg') }}" alt=""><img src="{{ asset('assets/front/images/shoe/4.jpg') }}" alt=""><img src="{{ asset('assets/front/images/shoe/5.jpg') }}" alt=""></div>
                                <select class="ps-rating ps-shoe__rating">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="2">5</option>
                                </select>
                            </div>
                            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                <p class="ps-shoe__categories"><a href="#">{{ $product->category->name }}</a>
                                </p><span class="ps-shoe__price">$ {{ $product->price }}</span>
                            </div>
                        </div>
                    </div> --}}
                </div>
                @endforeach
                
            </div>
          <div class="ps-product-action">
            <div class="ps-pagination">
              <ul class="pagination">
                {{ $products->withquerystring()->links('front.pagenation') }}
              </ul>
            </div>
          </div>
        </div>
        <div class="ps-sidebar" data-mh="product-listing">
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>{{ __('Categories') }}</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                @foreach ($categories as $category)
                    <form action="" method="get">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="category" value="{{ $category->id }}" @checked($category->id == request()->get('category')) id="flexCheckDefault{{ $category->id }}" onchange="this.form.submit()">
                            <label class="form-check-label" for="flexCheckDefault{{ $category->id }}"><img class="rounded-circle" width="35px" src="{{ $category->image_url }}" alt=""> {{ $category->name }} </label>
                        </div>
                    </form>
                @endforeach
                
              </ul>
            </div>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--filter">
            <div class="ps-widget__header">
              <h3>Category</h3>
            </div>
            <div class="ps-widget__content">
              <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
              <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p><a class="ac-slider__filter ps-btn" href="#">Filter</a>
            </div>
          </aside>
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Sky Brand</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li class="current"><a href="product-listing.html">Nike(521)</a></li>
                <li><a href="product-listing.html">Adidas(76)</a></li>
                <li><a href="product-listing.html">Baseball(69)</a></li>
                <li><a href="product-listing.html">Gucci(36)</a></li>
                <li><a href="product-listing.html">Dior(108)</a></li>
                <li><a href="product-listing.html">B&G(108)</a></li>
                <li><a href="product-listing.html">Louis Vuiton(47)</a></li>
              </ul>
            </div>
          </aside>
        </div>
      </div>

</x-store-front-layout>