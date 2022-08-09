@section('search')
<li class="nav-item">
    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
    </a>
    <div class="navbar-search-block">
        <form class="form-inline">
            <div class="input-group input-group-sm">
                <x-form-input name="name" placeholder="{{ __('Search') }} ..." :value="request('name')" class="form-control form-control-navbar" type="search" aria-label="Search"/>
                <select name="status" class="form-control">
                    <option value="" selected>{{ __('All') }}</option>
                    @foreach($options as $option)
                    <option value="{{ $option }}" @selected(request('status') == $option)>{{ ucfirst(__($option)) }}</option>
                    @endforeach
                </select>
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