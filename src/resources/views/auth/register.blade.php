@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="alert__content">
    @if (session('error'))
    <div class="alert__content--error">
        {{ session('error') }}
    </div>
    @endif
</div>
<div class="register__content">
    <p class="register__title">Registration</p>
    <div class="register__form">
        <form class="form" action="/register" method="post" novalidate>
            @csrf
            <div class="form__group">
                <div class="form__group--icon">
                    <img class="icon-name" src="img/person.png" alt="Name">
                </div>
                <div class="form__group--content">
                    <div class="form__input--text">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Username" />
                    </div>
                    <div class="form__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--icon">
                    <img class="icon-mail" src="img/mail.png" alt="Mail">
                </div>
                <div class="form__group--content">
                    <div class="form__input--text">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group--icon">
                    <img class="icon-key" src="img/key.png" alt="Pass">
                </div>
                <div class="form__group--content">
                    <div class="form__input--text">
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button--submit" type="submit">
                    <p class="form__button--text">ログイン</p>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection