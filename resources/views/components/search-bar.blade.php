@section('search')
<li class="nav-item">
    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
    </a>
    <div class="navbar-search-block">
        <form class="form-inline">
            <div class="input-group input-group-sm">
                <x-form-input name="name" placeholder="{{ __('Name') }} ..." :value="request('name')" class="form-control form-control-navbar" type="search" aria-label="Search"/>
                
                @if (@$code)
                <x-form-input name="code" placeholder="{{ __('Code') }} ..." :value="request('code')" class="form-control form-control-navbar" type="search" aria-label="Search"/>
                @endif

                @if (@$email)
                <x-form-input name="email" placeholder="{{ __('Email') }} ..." :value="request('email')" class="form-control form-control-navbar" type="search" aria-label="Search"/>
                @endif
                
                @if (@$options)
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="" selected>{{ __('All') }}</option>
                        @foreach($options as $option)
                        <option value="{{ $option }}" @selected(request('status') == $option)>{{ ucfirst(__($option)) }}</option>
                        @endforeach
                    </select>
                @endif

                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</li>
@endsection