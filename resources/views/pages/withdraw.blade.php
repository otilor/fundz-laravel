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
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">₦</div>
                            <input name="amount" id="crud-form-1" type="text" class="form-control w-full" placeholder="Example 2000">
                        </div>
                        <br>
                        <label for="crud-form-1" class="form-label">Bank Name</label>
                        <div class="input-group">
                            <input name="bankName" id="crud-form-1" type="text" class="form-control w-full" list="bankList">
                            <datalist id="bankList">
                                <option value="First Bank of Nigeria Limited">
                                <option value="Access Bank Plc">
                                <option value="Fidelity Bank Plc">
                                <option value="First City Monument Bank Limited">
                                <option value="Guaranty Trust Bank Plc">
                                <option value="Union Bank of Nigeria Plc">
                                <option value="United Bank for Africa Plc">
                                <option value="Zenith Bank Plc">
                                <option value="Citibank Nigeria Limited">
                                <option value="Ecobank Nigeria">
                                <option value="Heritage Bank Plc">
                                <option value="Keystone Bank Limited">
                                <option value="Polaris Bank Limited">
                                <option value="Stanbic IBTC Bank Plc">
                                <option value="Standard Chartered">
                                <option value="Sterling Bank Plc">
                                <option value="Titan Trust Bank Limited">
                                <option value="Unity Bank Plc">
                                <option value="Wema Bank Plc">
                            </datalist>
                        </div>
                        <br>
                        <label for="crud-form-1" class="form-label">Account Number</label>
                        <div class="input-group">
                            <input name="accountNumber" id="crud-form-1" type="text" class="form-control w-full" placeholder="3324245342">
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
                            <textarea name="comment" id="crud-form-1" type="text" class="form-control w-full" placeholder="Thank you for helping my save....."></textarea>
                        </div>
                        <br>
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
