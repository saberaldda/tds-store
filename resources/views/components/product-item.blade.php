<div class="ps-shoe mb-30">
    <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#" onclick="event.preventDefault(); document.getElementById('wish{{ $product->id }}').submit()"><i class="ps-icon-heart"></i></a width="500" height="600"><img src="{{ $product->image_url }}" loading="lazy" alt=""><a class="ps-shoe__overlay" width="760" height="760" href="{{ route('product.details', $product->slug) }}"></a>
    </div>
    <form action="{{ route('wishlist') }}" method="post" id="wish{{ $product->id }}">
      @csrf
      <input type="hidden" name="product_id" value="{{ $product->id }}">
    </form>
    <div class="ps-shoe__content">
      <form action="{{ route('home.rate', 'product') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="ps-shoe__variants">
          <div class="ps-shoe__variant normal"><img src="{{ $product->image_url }}" alt="">
                                              <img src="{{ $product->image_url }}" alt=""></div>
          <select name="rating" class="ps-rating ps-shoe__rating" onchange="this.form.submit()">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
      </form>
      <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
        <p class="ps-shoe__categories"> {{ $product->category->name }}</p>
        <span class="ps-shoe__price" style="margin-top: 20px; color: #2AC37D"><b>{{ App\Helpers\Currency::format($product->price) }}</b> </span>
      </div>
    </div>
  </div> 