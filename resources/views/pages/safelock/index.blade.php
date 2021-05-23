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
                    <h1 class="text-3xl font-bold truncate mr-6">Safelock</h1>
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Lock away your funds in a personalized wallet.🙏</h2>
                        <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                            <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>
                        <a href="{{ route('safelock.create') }}" type="submit" class="btn btn-primary w-27 text-xl">Create a safelock</a>

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
