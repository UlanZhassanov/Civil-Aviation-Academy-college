@extends('admin.inc.header-login')
@section('content')
    <section id="login">
        <div class="login">
            <div class="login__logo">
                <img src="/assets/images/logo.png" height="90px" />
            </div>
            <h1>Авторизация</h1>
            @error('iin_or_passport_number')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: orangered; font-size: calc(100vw / (1690 / 18));">Введённые данные неверны,
                        попробуйте ещё раз</strong>
                </span>
            @enderror
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="iin">{{ __('Введите ИИН') }}</label>
                    <input id="iin" type="text" name="iin"
                        value="{{ old('iin') }}" required autocomplete="iin"
                        autofocus>
                </div>
                <div>
                    <label for="password">{{ __('Введите пароль') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <button type="submit" id="button">Войти</button>
                </div>
                {{-- <div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div> --}}
            </form>
        </div>
    </section>
@endsection
