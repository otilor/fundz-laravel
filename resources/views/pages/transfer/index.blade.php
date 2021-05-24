@extends('../layout/' . $layout)

@section('subhead')
    <title>Transfer - Fundz</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Tranfer Fundz 🤑</h2>
</div>
<form method="post" action="/transfer">
    @csrf
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>

                    @error('email')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                    <br>
                    <label for="crud-form-1" class="form-label">Email Address of Recipient</label>
                    <div class="input-group">
                        <div id="input-group-3" class="input-group-text">✉</div>
                        <input name="email" id="crud-form-1" type="email" class="form-control w-full" placeholder="example@email.com" value="{{old('email')}}" required>
                    </div>
                    <br>
                    @error('amount')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                    <br>
                    <label for="crud-form-1" class="form-label">Amount</label>
                    <div class="input-group">
                        <div id="input-group-3" class="input-group-text">₦</div>
                        <input name="amount" id="crud-form-1" type="text" class="form-control w-full" placeholder="Example 2000" value="{{old('amount')}}" required>
                    </div>
                    <br>
                    @error('password')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                    <br>
                    <label for="crud-form-1" class="form-label">For Security Reasons, Kindly enter your Password</label>
                    <div class="input-group">
                        <div id="input-group-3" class="input-group-text">#</div>
                        <input name="password" id="crud-form-1" type="password" class="form-control w-full" placeholder="**************"  required>

                    <label for="crud-form-1" class="form-label">Email Address of Reciever</label>
                    <div class="input-group">
                        <div id="input-group-3" class="input-group-text">✉</div>
                        <input name="email" id="crud-form-1" type="email" class="form-control w-full" placeholder="example@email.com" required>
                    </div>
                    <br>
                    <label for="crud-form-1" class="form-label">Amount</label>
                    <div class="input-group">
                        <div id="input-group-3" class="input-group-text">₦</div>
                        <input name="amount" id="crud-form-1" type="text" class="form-control w-full" placeholder="Example 2000" required>
                    </div>
                    <br>
                    <label for="crud-form-1" class="form-label">For Security Reasons, Kindly enter your Password</label>
                    <div class="input-group">
                        <div id="input-group-3" class="input-group-text">#</div>
                        <input name="password" id="crud-form-1" type="password" class="form-control w-full" placeholder="**************" required>

                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Send</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
</form>
@endsection
