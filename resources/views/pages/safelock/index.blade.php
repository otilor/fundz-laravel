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
                    <a href="" class="btn btn-primary"> Top Up</a>
                </div>
                <div>
                    @if (($safelock->return_date) <= date('Y-m-d'))
                        <a href="" class="btn btn-primary"> Cash Out</a>
                    @else
                        <a  class="btn btn-primary">
                            Return Date is {{$safelock->return_date}}
                        </a>
                    @endif
                   
                </div>
            </div>
            <div>

            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
    </div>
    
               
@endsection
