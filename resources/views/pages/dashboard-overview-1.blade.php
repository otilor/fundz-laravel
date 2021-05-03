@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard | Fundz By Gabriel</title>
@endsection

@section('subcontent')
    <!-- BEGIN: Notification Content -->


    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <h1 class="text-5xl font-bold truncate mr-6">{{ auth()->user()->name }}</h1>
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Hello, wash your hands regularly🧼🧴</h2>
                        <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                            <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                        <div class="ml-auto">
{{--                                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month">--}}
{{--                                                33% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">₦{{ $balance }}</div>
                                    <div class="text-base text-gray-600 mt-1">Total Savings</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <!-- BEGIN: Sales Report -->

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
