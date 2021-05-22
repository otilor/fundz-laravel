@extends('../layout/' . $layout)

@section('subhead')
    <title>Withdraw - Fundz by Gabriel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Withdraw money 🤑</h2>
    </div>
    <form method="post" action="/withdraw">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Amount(minimum of ₦{{$balance}})</label>
                        @error('amount')
                            <span style="color: red">Enter a valid amount</span>
                        @enderror
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">₦</div>
                            <input name="amount" id="crud-form-1" type="number" class="form-control w-full" placeholder="Example 2000" value="{{old('amount')}}">
                        </div>
                        <br>
                        <label for="crud-form-1" class="form-label">Bank Name</label>
                        <div class="input-group">
                            <select name="bank_code" id="" class="form-control w-full">
                                <option value="" active><--- Select Your Bank ----></option>
                                <option value="011" {{ old('bank_code') == '011' ? 'selected' : '' }}>First Bank of Nigeria Limited</option>
                                <option value="044" {{ old('bank_code') == '044' ? 'selected' : '' }}>Access Bank Plc</option>
                                <option value="070" {{ old('bank_code') == '070' ? 'selected' : '' }}>Fidelity Bank Plc</option>
                                <option value="058" {{ old('bank_code') == '058' ? 'selected' : '' }}>Guaranty Trust Bank Plc</option>
                                <option value="032" {{ old('bank_code') == '032' ? 'selected' : '' }}>Union Bank of Nigeria Plc</option>
                                <option value="033" {{ old('bank_code') == '033' ? 'selected' : '' }}>United Bank for Africa Plc</option>
                                <option value="057" {{ old('bank_code') == '057' ? 'selected' : '' }}>Zenith Bank Plc</option>
                                <option value="023" {{ old('bank_code') == '023' ? 'selected' : '' }}>Citibank Nigeria Limited</option>
                                <option value="050" {{ old('bank_code') == '050' ? 'selected' : '' }}>Ecobank Nigeria</option>
                                <option value="221" {{ old('bank_code') == '221' ? 'selected' : '' }}>Stanbic IBTC Bank Plc</option>
                                <option value="068" {{ old('bank_code') == '068' ? 'selected' : '' }}>Standard Chartered Bank</option>
                                <option value="232" {{ old('bank_code') == '232' ? 'selected' : '' }}>Sterling Bank Plc</option>
                                <option value="057" {{ old('bank_code') == '057' ? 'selected' : '' }}>Unity Bank Plc</option>
                                <option value="035" {{ old('bank_code') == '035' ? 'selected' : '' }}>Wema Bank Plc </option>
                            </select>
                        </div>
                        <br>
                        <label for="crud-form-1" class="form-label">Account Number</label>
                        @error('account_number')
                            <span style="color: red">Enter a valid Account Number</span>
                        @enderror
                        <div class="input-group">
                            <input minlength="10" maxlength="10" name="account_number" id="crud-form-1" type="text" class="form-control w-full" placeholder="3324245342" value="{{old('account_number')}}">
                        </div>
                        <br>
                        <div hidden id="accountName">
                            <label for="crud-form-1" class="form-label">Account Name</label>
                            <div class="input-group">
                                <input name="accountName" id="crud-form-1" type="text" class="form-control w-full" placeholder="Samuel Okon">
                            </div>
                        </div>
                        <br>
                        <label for="crud-form-1" class="form-label">Comment (Optional)</label>
                        <div class="input-group">
                            <textarea name="comment" id="crud-form-1" type="text" class="form-control w-full" placeholder="Thank you for helping my save.....">{{old('comment')}}</textarea>
                        </div>
                        <br>
                        @error('password')
                            <span style="color: red">Password Incorrect</span>
                        @enderror
                        <label for="crud-form-1" class="form-label">For Security reasons, Kindly enter your password</label>
                        <div class="input-group">
                            <input name="password" id="crud-form-1" type="password" class="form-control w-full" placeholder="************">
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-27">Withdraw Now</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>

@endsection
