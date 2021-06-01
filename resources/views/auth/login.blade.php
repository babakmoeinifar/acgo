@extends('layouts.auth')
@php
    $logo=asset(Storage::url('logo/'));

@endphp
@section('page-title')
    {{__('Login')}}
@endsection
@section('content')
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-4">
                    <div class="changeLanguage float-right mr-1 position-relative">
                        <select name="language" id="language" class="form-control w-25 position-absolute selectric" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            @foreach(Utility::languages() as $language)
                                <option @if($lang == $language) selected @endif value="{{ route('login',$language) }}">{{Str::upper($language)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img class="img-fluid logo-img" src="{{$logo.'/logo.png'}}" alt="image">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>ورود کاربر</h4>
                        </div>
                        <div class="col-12 text-right">
                            <a href="{{route('customer.login')}}" class="btn btn-secondary">ورود مشتری</a>
                            <a href="{{route('vender.login')}}" class="btn btn-secondary m-">ورود خریدار</a>
                        </div>
                        <div class="card-body">
                            {{Form::open(array('route'=>'login','method'=>'post','id'=>'loginForm','class'=> 'login-form' ))}}
                            <div class="form-group">
                                {{Form::label('email','ایمیل')}}
                                {{Form::text('email',null,array('class'=>'form-control','placeholder'=>'ایمیل خود را وارد نمایید'))}}
                                @error('email')
                                <span class="invalid-email text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    {{Form::label('password','رمز عبور')}}
                                    {{Form::password('password',array('class'=>'form-control','placeholder'=>'رمز عبور را وارد نمایید'))}}
                                    @error('password')
                                    <span class="invalid-password text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">مرا به یاد داشته باش</label>
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::submit('ورود',array('class'=>'btn btn-primary btn-lg btn-block','id'=>'saveBtn'))}}
                            </div>
                            {{Form::close()}}
                            <div class="text-center mt-4 mb-3">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        فراموشی رمز عبور
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        حساب کاربری ندارید؟ <a href="{{ route('register') }}">ثبت نام</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
