@extends('../layout/' . $layout)

@section('subhead')
    <title>Savings - Fundz by Gabriel</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Deposit money 🤑</h2>
    </div>
    <form method="post" action="/savings">
        @csrf
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Amount</label>
                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">₦</div>
                            <input name="amount" id="crud-form-1" type="text" class="form-control w-full" placeholder="Example 2000">
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
                <!-- END: Form Layout -->
            </div>
        </div>
    </form>

@endsection
