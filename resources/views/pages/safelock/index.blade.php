@extends('../layout/' . $layout)

@section('subhead')
    <title>Safelock | Fundz</title>
@endsection

@section('subcontent')
    <!-- BEGIN: Header -->
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Intro -->
                <div class="col-span-12 mt-8">
                    <h1 class="text-3xl font-bold truncate mr-6">Safelock</h1>
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Lock away your funds in a personalized wallet.🙏</h2>
                        <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                            <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('safelock.create') }}" type="submit" class="btn btn-primary w-27 text-xl">Create a safelock</a>
                    </div>
                    <br>
                    <div class="alert alert-dismissible show box bg-theme-3 text-white flex items-center mb-6" role="alert">
                        <span>👇👇👇👇👇 </span> All available safe locks 👇👇👇👇👇👇</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                </div>
                <!-- END: Intro -->
            </div>
        </div>
    </div>
    <!-- END: Header-->

    <!-- Begin Card to display safelocks -->
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Blog Layout -->
        @if($safelocks->isEmpty())
            <div class="col-span-12">
                <div class="alert alert-warning">
                    <span>No safelocks available!</span>
                </div>
            </div>
        @else
        @foreach ($safelocks as $safelock)
            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
            <div class="flex items-center border-b border-gray-200 dark:border-dark-5 px-5 py-4">
                <div class="ml-3 mr-auto">
                    <a class="font-medium">{{$safelock->name}}</a> 
                    <div class="flex text-gray-600 truncate text-xs mt-0.5"> {{($safelock->created_at->diffForHumans())}}</div>
                </div>
            </div>
            <div class="p-5">
                <a href="" class="block font-bold text-base mt-5">Amount : ₦{{ number_format($safelock->amount,0,'.',',') }}</a> 
                <a href="" class="block font-bold text-base mt-5">Interest Amount : ₦ {{number_format($safelock->interest_amount,0,'.',',') }}</a>
                <a href="" class="block font-bold text-base mt-5">Total Amount : ₦ {{number_format(($safelock->interest_amount + $safelock->amount),0,'.',',') }}</a>
                <Br>
                <h4 class="block font-bold truncate mr-6">Description:</h4>
                <div class="block text-gray-700 dark:text-gray-600 mt-2">{{$safelock->description}}</div>
            </div>
            <div class="flex justify-around">
                <div class="">
                    <a data-toggle="modal" data-target="#topup-slide-over-{{$safelock->id}}" class="btn btn-primary"> Top Up</a>
                </div>
                <div>
                    @if (($safelock->return_date) <= date('Y-m-d'))
                    <form method="post" action="/safelock/cashout">
                    @csrf
                        <input type="hidden" name="amount" value="{{$safelock->interest_amount + $safelock->amount}}">
                        <input type="hidden" name="safelock_id" value="{{$safelock->id}}">
                        <button type="submit" class="btn btn-success">Cash Out</button>  
                    </form>
                    @else
                        <a  class="btn btn-primary">
                            Due Date is {{$safelock->return_date}}
                        </a>
                    @endif
                   
                </div>
            </div>
            <div>

            </div>
        </div>
                    <!-- BEGIN: top up modal -->
            <div id="topup-slide-over-{{$safelock->id}}" class="modal modal-slide-over" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header p-5">
                            <h2 class="font-medium text-base mr-auto">Top-Up Safelock ({{$safelock->name}})</h2>
                        </div>
                        <div class="modal-body">
                        <form action="/safelock/topup" method="post">
                            @csrf
                            <div class="mt-3"> 
                                <input type="hidden" name="safelock_id" value="{{$safelock->id}}">
                                <label for="regular-form-2" class="form-label">Amount:</label> 
                                <input id="regular-form" type="number" name="amount" class="form-control form-control" placeholder="E.g 15,000">
                            </div>
                                <div class="mt-3"> <label for="regular-form-3" class="form-label">Source: </label> 
                                    <div class="input-group">
                                        <label for="fundz_source"></label>
                                        <select id="fundz_source" name="source" class="form-control w-full" required>
                                            <option value="" active><--- Where you keep 'em Fundz?----></option>
                                            <option value="main_wallet">Your main wallet balance ₦{{ number_format(auth()->user()->balance,0,'.',',') }}</option>
                                        </select>
                                    </div>
                                <br>
                                <div class="flex justify-center">
                                    <button type="submit" class="btn btn-primary">Top Up now</button>
                                </div>
                            
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>
    </div>

               
@endsection
