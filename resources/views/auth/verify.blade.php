@extends('../layout/' . $layout)

@section('subhead')
    <title>Referral | Fundz</title>
@endsection

@section('subcontent')
    <!-- BEGIN: Referral Content -->

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Email Verification 📨</h2>
    </div>


    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label mb-4 text-bold text-black-600 text-xl">Verify Your Email Address</label>
                    <p class="mb-4 text-bold text-blue-600">Before proceeding, please check your email for a verification link.</p>

                    <h2 class="mb-4 text-bold text-blue-600">If you did not receive the email. <br>👇👇👇👇👇👇👇</h2>
                    <div class="input-group">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            {{-- <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>. --}}
                            <div class="text-right mt-5">
                                <button type="submit" class="btn btn-primary w-29">Click here to Resend</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
