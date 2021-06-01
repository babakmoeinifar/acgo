@extends('layouts.auth')
@php
    $logo=asset(Storage::url('logo/'));
@endphp
@section('page-title')
    {{__('Register')}}
@endsection
@section('content')
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-4">
                    <div class="changeLanguage float-right mr-1 position-relative">
                        <select name="language" id="language" class="form-control w-25 position-absolute selectric" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            @foreach(Utility::languages() as $language)
                                <option @if($lang == $language) selected @endif value="{{ route('register',$language) }}">{{Str::upper($language)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 text-right">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img class="img-fluid logo-img" src="{{$logo.'/logo.png'}} " alt="">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>ثبت نام رایگان</h4></div>

                        <div class="card-body">
                            {{Form::open(array('route'=>'register','method'=>'post','id'=>'loginForm'))}}
                            <div class="row">
                                <div class="form-group col-6">
                                    {{Form::label('name','نام')}}
                                    {{Form::text('name',null,array('class'=>'form-control','placeholder'=>'نام و نام خانوادگی خود را وارد نمایید'))}}
                                    @error('name')
                                    <span class="invalid-name text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    {{Form::label('email','ایمیل')}}
                                    {{Form::text('email',null,array('class'=>'form-control','placeholder'=>'ایمیل خود را وارد نمایید'))}}
                                    @error('email')
                                    <span class="invalid-email text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    {{Form::label('password','رمز عبور')}}
                                    {{Form::password('password',array('class'=>'form-control','placeholder'=>'رمز عبور را وارد نمایید'))}}
                                    @error('password')
                                    <span class="invalid-password text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    {{Form::label('password_confirmation','تکرار رمز عبور')}}
                                    {{Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>__('Enter Your Password')))}}
                                    @error('password')
                                    <span class="invalid-password_confirmation text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                    <label class="custom-control-label" for="agree">با مقررات سایت موافق هستم</label>
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::submit('ثبت عضویت',array('class'=>'btn btn-primary btn-lg btn-block','id'=>'saveBtn'))}}
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        حساب دارید؟ <a href="{{ route('login') }}">ورود</a>
                    </div>
                    <div class="simple-footer">
                        {{(Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright AccountGo') }} {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
