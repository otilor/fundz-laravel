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
                        <h2 class="text-lg font-medium truncate mr-5">Invest Fundz</h2>
                        <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                            <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <a class="col-span-3 sm:col-span-3 xl:col-span-3 intro-y" href="/referral">
                            <button class="btn btn-primary w-32 mr-2 mb-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity w-4 h-4 mr-2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> My Portfolio </button>
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

                                    <div class="box px-5 py-3 mb-3 flex items-center">
                                        {{--                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">--}}
                                        {{--                                        <img alt="Fundz" src="http://fundz-laravel.test/dist/images/profile-7.jpg">--}}
                                        {{--                                    </div>--}}
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">{{ $activity ?? '' }}</div>
                                            <div class="text-gray-600 text-xs mt-0.5">{{ $activity ?? '' }}</div>
                                        </div>
                                        {{--                                    <div class="text-info">{{ $activity ?? ''->created_at }}</div>--}}
                                    </div>
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
