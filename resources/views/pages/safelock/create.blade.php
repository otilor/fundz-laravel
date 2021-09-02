@extends('../layout/' . $layout)

@section('subhead')
    <title>Safelock - Fundz</title>
@endsection

@section('subcontent')
<div>
    <form action="{{route('safelock.lock')}}" method="post">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    <div>
                        <p class="mb-4 text-bold text-blue-600 text-xl">Create a safelock</p>
                        <label for="safelock_amount" class="form-label">Name Of Safelock</label>
                        @error('name')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                        <div class="input-group">
                            <input name="name" id="safelock_name" type="text" class="form-control w-full" placeholder="E.g School fees 💰💰💰💰" value="{{old('name')}}">
                        </div>
                        <label for="safelock_amount" class="form-label">How long do you wanna lock your fundz?</label>
                        @error('duration')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                        <div class="input-group">
                            <select name="duration" id="duration" class="form-select form-select-sm mt-2" aria-label=".form-select-sm example">
                                <option value="10" selected>10 days 3.5%</option>
                                <option value="30">30 days (1 Month) 7%</option>
                                <option value="60">60 days(2 Months) at 12%</option>
                                <option value="180">180 days (6 Months) 25% </option>
                                <option value="365">1 year (12 Months) at 50% per annum</option>
                                <option value="730">2 year (24 Months) at 55% per annum</option>
                                <option value="1095">over 2 years 60% per annum</option>
                            </select>
                        </div>
                        <label for="safelock_amount" class="form-label">Enter an amount (Minimum of ₦1000)</label>
                        @error('amount')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">₦</div>
                            <input name="amount" id="safelock_amount" type="number" class="form-control w-full" placeholder="Example 2000" value="{{old('amount')}}">
                        </div>
                        <label for="crud-form-1" class="mt-2 form-label">Source of fundz</label>
                        <div class="input-group">
                            <label for="fundz_source"></label>
                            <select id="fundz_source" name="source" class="form-control w-full">
                                <option value="" active><--- Where you keep 'em Fundz?----></option>
                                <option value="main_wallet">Your main wallet balance ₦{{ number_format(auth()->user()->balance,0,'.',',') }}</option>
                            </select>
                        </div>
                        @error('description')
                            <span style="color: red">{{$message}}</span>
                        @enderror
                        <label for="crud-form-1" class="mt-2 form-label">Description (Optional)</label>
                        <div class="input-group">
                            <textarea name="description" id="crud-form-1" type="text" class="form-control w-full"
                                      placeholder="Some Christmas fundz🎄🎅🏽">{{old('description')}}</textarea>
                        </div>
                        <br>
                    </div>
                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-27">Lock Fundz</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>
</div>

@endsection
