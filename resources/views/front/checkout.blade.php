<x-store-front-layout :title="__('Checkout')" :categories="$categories">

    <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            <form class="ps-checkout__form" action="{{ route('checkout') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__billing">
                            <h3>{{ __('Billing Detail') }}</h3>
                            <div class="form-group form-group--inline">
                                <x-form-input name="billing_name" :label="__('Name')"/>
                            </div>
                            <div class="form-group form-group--inline">
                                <x-form-input name="billing_email" type="email" :label="__('Email')"/>
                            </div>
                            <div class="form-group form-group--inline">
                                <x-form-input name="billing_phone" :label="__('Phone')"/>
                            </div>
                            <div class="form-group form-group--inline">
                                <x-form-input name="billing_address" :label="__('Address')"/>
                            </div>
                            <div class="form-group form-group--inline">
                                <x-form-input name="billing_city" :label="__('City')"/>
                            </div>
                            <div class="form-group form-group--inline">
                                <label for="{{ 'billing_country' }}">{{ __('Country') }}</label>
                                <select name="{{ 'billing_country' }}" id="{{ $id ?? 'billing_country' }}" class="form-control @error('billing_country') is-invalid @enderror">
                                    <option value=""></option>
                                    @foreach ($countries as $value => $text)
                                        <option value="{{ $text }}" @if($value == 'PS') selected @endif>{{ $text }}</option>
                                    @endforeach
                                </select>
                                @error('billing_country')
                                    <p class="invalid-feedback">{{ __($message) }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" name="create_account" value="1" id="cb01">
                                    <label for="cb01">{{ __('Create an account?') }}</label>
                                </div>
                            </div>
                            <h3 class="mt-40"> {{ __('Addition information') }}</h3>
                            <div class="form-group form-group--inline textarea">
                                <label>{{ __('Order Notes') }}</label>
                                <textarea class="form-control" rows="5" name="notes" placeholder="{{ __('Notes about your order, e.g. special notes for delivery.') }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__order">
                            <header>
                                <h3>{{ __('Your Order') }}</h3>
                            </header>
                            <div class="content">
                                <table class="table ps-checkout__products">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">{{ __('Product') }}</th>
                                            <th class="text-uppercase">{{ __('Total') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart->all() as $item)
                                        <tr>
                                            <td>{{ $item->product->name }} x {{ $item->quantity }}</td>
                                            <td>{{ App\Helpers\Currency::format($item->product->price) }} X {{ $item->quantity }} = {{ App\Helpers\Currency::format($item->product->price * $item->quantity) }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>{{ __('Order Total') }}</td>
                                            <td>{{ App\Helpers\Currency::format($cart->total()) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <footer>
                                <h3>{{ __('Payment Method') }}</h3>
                                <div class="form-group paypal">
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment" id="rdo02" checked>
                                        <label for="rdo02">{{ __('PayPal') }}</label>
                                    </div>
                                    <ul class="ps-payment-method">
                                        <li><a href="#"><img src="{{ asset('assets/front/images/payment/1.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('assets/front/images/payment/2.png') }}" alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('assets/front/images/payment/3.png') }}" alt=""></a></li>
                                    </ul>
                                    <button type="submit" class="ps-btn ps-btn--fullwidth">{{ __('Place Order') }}<i
                                            class="ps-icon-next"></i></button>
                                </div>
                            </footer>
                        </div>
                        <div class="ps-shipping">
                            <h3>FREE SHIPPING</h3>
                            <p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.<br> <a href="#"> Singup </a> for free shipping on
                                every order, every time.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-store-front-layout>
