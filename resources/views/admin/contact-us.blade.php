@extends('layouts.admin')

@section('title')
    <div class="ml-5 justify-content-between">
        <h2 class="font-weight-bold">{{ __($title) }}</h2>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item font-weight-bold"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item font-weight-bold">{{ __('Contact-Us') }}</li>
    </ol>
@endsection

@section('content')
    <div class="card">
        <div class="card-body row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                <div class="">
                    <h2><strong>TDS</strong> Store</h2>
                    <p class="lead mb-5">Palestine, Gaza, 1234<br>
                        {{ __('Email') }}: saberaldda@gmail.com<br>
                        {{ __('Phone') }}: +970592105521
                    </p>
                </div>
            </div>
            <div class="col-7">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li> {{ __($message) }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <div class="form-group">
                        <label for="inputName">{{ __('Name') }}</label>
                        <input type="text" name="name" id="inputName" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label for="inputEmail">{{ __('E-Mail') }}</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label for="inputPhone">{{ __('Phone Number') }}</label>
                        <input type="number" name="phone_number" id="inputPhone" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="inputSubject">{{ __('Subject') }}</label>
                        <input type="text" name="subject" id="inputSubject" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">{{ __('Message') }}</label>
                        <textarea name="message" id="inputMessage" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="{{ __('Send message') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection