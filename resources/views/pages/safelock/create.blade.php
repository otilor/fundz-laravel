@extends('../layout/' . $layout)

@section('subhead')
    <title>Withdraw - Fundz by Gabriel</title>
@endsection

@section('subcontent')
<div>
    <form method="post" action="/withdraw">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    <div>
                        <p class="mb-4 text-bold text-blue-600 text-xl">Create a safelock</p>
                        <label for="crud-form-1" class="form-label">Amount(minimum of ₦1000)</label>
                        @error('amount')
                        <span style="color: red">Enter a valid amount</span>
                        @enderror
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">₦</div>
                            <input name="amount" id="crud-form-1" type="number" class="form-control w-full"
                                   placeholder="Example 2000" value="{{old('amount')}}">
                        </div>
                        <label for="crud-form-1" class="mt-2 form-label">Source of fundz</label>
                        <div class="input-group">
                            <select name="bank_code" id="" class="form-control w-full">
                                <option value="" active><--- Select Your Bank ----></option>
                                <option value="011" {{ old('bank_code') == '011' ? 'selected' : '' }}>Your main wallet balance {{ auth()->user()->balance }}</option>
                            </select>
                        </div>

                        <label for="crud-form-1" class="mt-2 form-label">Comment (Optional)</label>
                        <div class="input-group">
                            <textarea name="comment" id="crud-form-1" type="text" class="form-control w-full"
                                      placeholder="Thank you for helping my save.....">{{old('comment')}}</textarea>
                        </div>
                        <br>
                    </div>
                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-27">Withdraw Now</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>
</div>

@endsection
