@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name"
                                       type="text"
                                       class="form-control
                                    @error('name') is-invalid @enderror"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required autocomplete="name"
                                       autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label
                             for="username"
                             class="col-md-4 col-form-label text-md-right">{{ __('Username') }}
                             </label>

                            <div class="col-md-6">
                                <input id="username"
                                       type="text"
                                        class="form-control
                                     @error('name')
                                     is-invalid @enderror"
                                 name="username"
                                 value="{{ old('username') }}"
                                 required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email"
                                       type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class="form-group row">
                             <label for="gender"
                                    class="col-md-4 col-form-label text-md-right">
                                 {{ __('Gender') }}
                             </label>
                             <div class="col-md-3">
                                 <div class="input-group mb-3">
                                     <select class="custom-select" id="gender" name="gender">
                                         <option selected>Choose...</option>
                                         <option value="male">Male</option>
                                         <option value="female">Female</option>
                                         <option value="others">Others</option>
                                     </select>
                                 </div>
                             </div>
                         </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">
                                {{ __('Password') }}
                            </label>
                            <div class="col-md-6">
                                <input id="password"
                                       type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback"
                                          role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">
                                {{ __('Confirm Password') }}
                            </label>
                            <div class="col-md-6">
                                <input id="password-confirm"
                                       type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4  offset-md-4">
                                <button type="submit"
                                        class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                       <a class="btn btn-primary" href="{{ route('firstpage') }}" role="button">Cancel</a>
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
