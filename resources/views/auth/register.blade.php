@extends('auth.layout')
@section('title')
    {{__('admin.auth.register')}}
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-primary p-4 text-center">
                                <h5 class="text-primary">{{__('admin.auth.register')}}</h5>
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
                        <form class="needs-validation" novalidate method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{old('email')}}" required>
                                @error('email')
                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">{{__('admin.auth.name')}}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{old('name')}}" required>
                                @error('name')
                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="surname" class="form-label">{{__('admin.auth.surname')}}</label>
                                <input type="text" class="form-control @error('surname') is-invalid @enderror"
                                       id="surname" name="surname" value="{{old('surname')}}" required>
                                @error('surname')
                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="father_name" class="form-label">{{__('admin.auth.father_name')}}</label>
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                       id="father_name" name="father_name" value="{{old('father_name')}}">
                                @error('father_name')
                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">{{__('admin.auth.phone')}}</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                       id="phone" name="phone" value="{{old('phone')}}">
                                @error('phone')
                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{__('admin.auth.password')}}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" required>
                                @error('password')
                                <span class="invalid-feedback">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation"
                                       class="form-label">{{__('admin.auth.password_confirmation')}}</label>
                                <input type="password"
                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                       id="password_confirmation" name="password_confirmation" required>
                            </div>


                            <div class="mt-4 d-grid">
                                <button class="btn btn-primary waves-effect waves-light"
                                        type="submit">{{__('admin.auth.make_register')}}</button>
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
