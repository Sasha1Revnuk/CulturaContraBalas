@extends('auth.layout')
@section('title')
    {{__('auth.title_reset')}}
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-primary p-4 text-center">
                                <h5 class="text-primary">{{__('auth.title_reset')}}</h5>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body pt-0">
                    <div>
                        <a href="/">
                            <div class="avatar-md profile-user-wid mb-4">
                                            <span
                                                class="avatar-title rounded-circle bg-light ">
                                                <img
                                                    src="/adm/custom/logo.svg"
                                                    alt="" class="rounded-circle" height="34">
                                            </span>
                            </div>
                        </a>
                    </div>
                    <div class="p-2">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="needs-validation" novalidate method="POST"
                              action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ $email ?? old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('auth.new_password_field') }}</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm"
                                       class="form-label">{{ __('auth.password_confirm') }}</label>
                                <input id="password-confirm" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password_confirmation" required autocomplete="new-password">
                                @error('password-confirm')
                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-4 d-grid">
                                <button class="btn btn-primary waves-effect waves-light"
                                        type="submit">{{__('auth.title_reset_button')}}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="mt-5 text-center">

                <div>
                    <p>{{__('admin.auth.already_have_account')}} <a href="/login"
                                                                    class="fw-medium text-primary"> {{__('admin.auth.login')}}</a>
                    </p>
                    <p>©
                        <script>document.write(new Date().getFullYear())</script>
                        <a href="https://isitlab.com/en">ISITLab</a> .
                </div>
            </div>

        </div>
    </div>
@endsection
