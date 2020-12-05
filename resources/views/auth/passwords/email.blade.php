@extends('layouts.main')

@section('main-section')
<div class="container">
    <div class="row justify-content-center reset_form">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header reset_title">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row rst_row">

                            <div class="col-md-12">
                                <p class="desc_input">Hai dimenticato la password? Inserisci la tua mail e riceverai un link per la reimpostazione della password</p>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Hai inserito dati non validi.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group btn_reset">
                            <button type="submit" class="btn_reset_psw">
                                {{ __('Invia reset') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
