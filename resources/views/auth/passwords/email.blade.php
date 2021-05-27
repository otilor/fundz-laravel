@extends('../../layout/login')

@section('head')
    <title>Reset Password</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3">
                        Fu<span class="font-medium">ndz</span>
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Rubick Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">A few more clicks to <br> sign in to your account.</div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Manage all your fundz in one place</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Password Reset</h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                    <div class="intro-x mt-8">
                        @if (session()->has('ResetLinkSent'))
                            <div>
                                <p style="color: green"><i><b>{{session('ResetLinkSent')}}</b></i></p>
                            </div>
                            <br>
                        @elseif (session()->has('ResetLinkFail'))
                            <div>
                                <p style="color: red"><i><b>{{session('ResetLinkFail')}}</b></i></p>
                            </div>
                            <br>
                        @endif
                        <form id="login-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <label for="email">Kindly Enter your Email Address</label><br>
                            <small style="color: purple">**If the email is registered, we will send you a reset link.**</small><br>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{session()->flash('error',$message)}}
                                </span>
                            @enderror
                            <br>
                            <input id="email" type="email" name="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Email">
                            <div id="error-email" class="login__input-error w-5/6 text-theme-6 mt-2"></div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button type="submit" id="btn-login" class="btn btn-primary py-3 px-4 w-full xl:w-39 xl:mr-3 align-top">Send Password Reset Link</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
@endsection

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
