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
                        <br>
                        <!-- Create table with 6 rows  -->
                        <table class="table">
         <thead>
             <tr>
                 <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                 <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Safelock ID</th>
                 <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Safelock Name</th>
                 <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Total Amount</th>
                 <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Intrest Amount</th>
                 <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Return Date</th>
                 <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
             </tr>
         </thead>
         <tbody>
             <?php
                $counter = 0;
             ?>
             @foreach($safelocks as $safelock)
             <tr class="hover:bg-gray-200">
                 <td class="border">{{$counter += 1}}</td>
                 <td class="border">{{substr($safelock->safelock_id, 0,10)}}...</td>
                 <td class="border">{{$safelock->name}}</td>
                 <td class="border">{{$safelock->amount}}</td>
                 <td class="border">{{$safelock->interest_amount}}</td>
                 <td class="border">{{$safelock->return_date}}</td>
                 <td class="border">
                     <!-- link to view details -->
                     <form action="/safelock/find" method="post">
                        @csrf
                        <input type="hidden" name="id" value={{$safelock->id}}>
                         <button type="submit" class="btn btn-primary">View</button>
                     </form>

                 </td>
             </tr>
             @endforeach
         </tbody>
     </table>
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
