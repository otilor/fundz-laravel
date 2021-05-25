@extends('../layout/' . $layout)

@section('head')
    <title>Fundz</title>
@endsection

@section('content')

<div class="block xl:grid grid-cols-2 gap-4">
    <!-- BEGIN: Register Info -->
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
    <!-- END: Register Info -->
    <!-- BEGIN: Register Form -->
   <form action="/register" method="post">
    @csrf
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                Sign Up
            </h2>
            <div class="intro-x mt-2 text-gray-500 dark:text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
            <div class="intro-x mt-8">
                @error('name')
                    <span style="color: red">Enter a Valid name</span>
                @enderror
                <input type="text" name="name" class="intro-x login__input form-control py-3 px-4 border-gray-300 block" placeholder="Enter your full name" value="{{old('name')}}" required>
                @error('email')
                    <span style="color: red">Enter a Valid Email Address</span>
                @enderror
                <input type="text" name="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Email" value="{{old('email')}}" required>
                <small style="color: blueviolet">Email verification required*</small>
                @error('phone_number')
                    <span style="color: red">Enter a Valid Phone number</span>
                @enderror
                <input type="text" min="11" max="11" name="phone_number" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Phone Number E.g 08139576890" value="{{old('phone_number')}}" required>
                @error('gender')
                    <span style="color: red">Select a Gender</span>
                @enderror
                <select name="gender" id="" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" required>
                    <option value="" selected><--- Select Gender---></option>
                    <option value="male" {{old('gender') == 'male' ? 'selected': ''}}>Male</option>
                    <option value="female" {{old('gender') == 'female' ? 'selected': ''}}>Female</option>
                </select>
                @error('password')
                    <span style="color: red">Password Do not match</span>
                @enderror
                <input type="password" name="password" value="{{old('password')}}" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Password" required>

                <input type="password" name="confirm_password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4" placeholder="Password Confirmation" required>
            </div>
            <div class="intro-x flex items-center text-gray-700 dark:text-gray-600 mt-4 text-xs sm:text-sm">
                <input id="remember-me" type="checkbox" class="form-check-input border mr-2" name="PrivacyPolicy" required>
                <label class="cursor-pointer select-none" for="remember-me">I agree to the Fundz</label>
                <a class="text-theme-1 dark:text-theme-10 ml-1" href="">Privacy Policy</a>.
            </div>
            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" type="submit">Register</button>
                <a href="/login" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Sign In</a>
            </div>
        </div>
    </div>
   </form>
    <!-- END: Register Form -->
</div>

@endsection
