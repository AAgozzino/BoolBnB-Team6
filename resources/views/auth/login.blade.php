@extends('layouts.main')

@section('main-section')
<div class="container">
    <div class="row justify-content-center login_form">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header login_title">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mail_row">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Hai inserito dati non validi.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row psw_row">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Hai inserito dati non validi.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group rememb_check">
                            <div class="d_flex jst_cont_rem">
                                <div class="form-check check_if">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                        <a class="btn btn-link restore_psw" href="{{ route('password.request') }}">
                                            {{ __('Hai dimenticato la password?') }}
                                        </a>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group btn_login">
                            <button type="submit" class="btn_log_log">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
