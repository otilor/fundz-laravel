@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard | Fundz</title>
@endsection

@section('subcontent')
    <!-- BEGIN: Notification Content -->
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Welcome, {{ auth()->user()->name }}</h2>
                        <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                            <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>
                    <div class="alert alert-dismissible show box bg-theme-3 text-white flex items-center mb-6" role="alert">
                        <span>A new feature is coming in the next couple of days! 🎁🎁</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-3 sm:col-span-3 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="box" class="report-box__icon text-theme-11"></i>
                                        <div class="ml-auto">
{{--                                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month">--}}
{{--                                                33% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">₦{{ number_format($balance,0,'.',',') }}</div>
                                    <div class="text-base text-gray-600 mt-1">Save Fundz</div>
                                </div>
                            </div>
                        </div>


                        <a class="col-span-3 sm:col-span-3 xl:col-span-3 intro-y" href="/safelock">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="lock" class="report-box__icon text-theme-11"></i>
                                            <div class="ml-auto">
{{--                                                <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month">--}}
{{--                                                    33% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">₦{{ number_format($Safelockbalance,0,'.',',') }}</div>
                                        <div class="text-base text-gray-600 mt-1">Lock Fundz</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a class="col-span-3 sm:col-span-3 xl:col-span-3 intro-y" href="/investments">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="percent" class="report-box__icon text-theme-11"></i>
                                            <div class="ml-auto">
{{--                                                <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month">--}}
{{--                                                    33% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">₦{{ number_format($Safelockbalance,0,'.',',') }}</div>
                                        <div class="text-base text-gray-600 mt-1">Invest Fundz</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a class="col-span-3 sm:col-span-3 xl:col-span-3 intro-y" href="/referral">
                            <div>
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-credit-card report-box__icon text-theme-11">
                                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                <line x1="1" y1="10" x2="23" y2="10"></line>
                                            </svg>
                                            <div class="ml-auto">
                                                {{--                                                <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer"--}}
                                                {{--                                                     title="Percentage increase">--}}
                                                {{--                                                    2%--}}
                                                {{--                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
                                                {{--                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
                                                {{--                                                         stroke-width="1.5" stroke-linecap="round"--}}
                                                {{--                                                         stroke-linejoin="round"--}}
                                                {{--                                                         class="feather feather-chevron-down w-4 h-4 ml-0.5">--}}
                                                {{--                                                        <polyline points="6 9 12 15 18 9"></polyline>--}}
                                                {{--                                                    </svg>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <div class="text-3xl break-all font-bold leading-8 mt-6">
                                            ₦{{ number_format(auth()->user()->referral_earning, 0, '.', ',')}}</div>
                                        <div class="text-base text-gray-600 mt-1">Referral Earnings</div>
                                    </div>
                                </div>
                                {{--                        </div><div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">--}}
                                {{--                            <div class="report-box zoom-in">--}}
                                {{--                                <div class="box p-5">--}}
                                {{--                                    <div class="flex">--}}
                                {{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card report-box__icon text-theme-11"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>--}}
                                {{--                                        <div class="ml-auto">--}}
                                {{--                                            <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer">--}}
                                {{--                                                2% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-4 h-4 ml-0.5"><polyline points="6 9 12 15 18 9"></polyline></svg>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="text-3xl font-bold leading-8 mt-6">$0.00</div>--}}
                                {{--                                    <div class="text-base text-gray-600 mt-1">Fundz dollar</div>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                                {{--                        </div>--}}
                            </div>
                        </a>
                </div>

                <!-- END: General Report -->
                <!-- BEGIN: Sales Report -->

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: Input -->
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                                    <h2 class="font-medium text-xl text-base mr-auto">
                                        Recent Activities 🗓
                                    </h2>
                                </div>

                                @foreach($activities as $activity)
                                <div class="box px-5 py-3 mb-3 flex items-center">
{{--                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">--}}
{{--                                        <img alt="Fundz" src="http://fundz-laravel.test/dist/images/profile-7.jpg">--}}
{{--                                    </div>--}}
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">{{ $activity->description }}</div>
                                        <div class="text-gray-600 text-xs mt-0.5">{{ $activity->created_at->toDayDateTimeString() }}</div>
                                    </div>
{{--                                    <div class="text-info">{{ $activity->created_at }}</div>--}}
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                <!-- END: Sales Report -->
                <!-- BEGIN: Weekly Top Seller -->
                <!-- END: Weekly Top Seller -->
                <!-- BEGIN: Sales Report -->
                <!-- END: Sales Report -->
                <!-- BEGIN: Official Store -->
                <!-- END: Official Store -->
                <!-- BEGIN: Weekly Best Sellers -->
                <!-- END: Weekly Best Sellers -->
                <!-- BEGIN: General Report -->
                <!-- END: General Report -->
                <!-- BEGIN: Weekly Top Products -->

                <!-- END: Weekly Top Products -->
            </div>
        </div>

    </div>
@endsection
