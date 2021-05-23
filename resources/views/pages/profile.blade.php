@extends('../layout/' . $layout)

@section('subhead')
    <title>Profile - Fundz</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Profile Layout</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5 lg:mt-0">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        <img alt="Picture" class="rounded-full" src="{{asset('storage/image/'.$user->photo) ?? 'dist/images/profile-15.jpg'}}">
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{ $user->name }}</div>
                        <div class="text-gray-600">Your Story</div>
                    </div>
                </div>
                <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                    <a class="flex items-center text-theme-1 dark:text-theme-10 font-medium" href="">
                        <i data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information
                    </a>
                    <a class="flex items-center mt-5" href="">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password
                    </a>
                    <a class="flex items-center mt-5" href="">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i> Social Networks
                    </a>
                </div>
                <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                    <a class="flex items-center mt-5" href="">
                        <i data-feather="box" class="w-4 h-4 mr-2"></i> Saved Credit Cards
                    </a>
                </div>
                <div class="p-5 border-t border-gray-200 dark:border-dark-5 flex">
                    <button type="button" class="btn btn-primary py-1 px-2">New Group</button>
                    <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto">New Quick Link</button>
                </div>
            </div>

        </div>
        <!-- END: Profile Menu -->


        <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
            <!-- END: Display Information -->
            <!-- BEGIN: Personal Information -->
            <div class="intro-y box mt-5">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Personal Information
                    </h2>
                </div>
                <div class="p-5">
                    <form action="/PersonalInfomation" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div>
                                    <label for="update-profile-form-6" class="form-label">Email</label>
                                    <input id="update-profile-form-6" name="email" type="email" class="form-control" placeholder="Input text" value="{{$user->email}}" disabled="">
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-7" class="form-label">Name</label>
                                    <input id="update-profile-form-7" name="name" type="text" class="form-control" placeholder="Input text" value="{{$user->name}}" disabled="">
                                </div>
                                <div class="mt-3 xl:mt-0">
                                    <label for="update-profile-form-10" class="form-label">Phone Number</label>
                                    <input id="update-profile-form-10" name="phone_number" type="number" class="form-control" placeholder="Phone Number" value="{{$user->phone_number ?? ''}}">
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <img class="rounded-md" alt="{{$user->name. ' picture'}}" src="{{asset('storage/image/'.$user->photo) ?? 'dist/images/profile-15.jpg'}}">
                                    <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </div>
                                </div>
                                <div class="mx-auto cursor-pointer relative mt-5">
                                    <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                    <input type="file" name="photo" class="w-full h-full top-0 left-0 absolute opacity-0">
                                </div>

                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="btn btn-primary w-20 mr-auto">Save</button>
                            <a href="" class="text-theme-6 flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete Account </a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Change password --}}

            <!-- BEGIN: Change Password -->
            <div class="intro-y box lg:mt-5" id="changePassword">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Change Password
                    </h2>
                </div>
                <form action="/changePassword" method="POST">
                    @csrf
                    <div class="p-5">
                        @error('old_pass')
                            <span style="color: red">Old password Incorrect</span>
                        @enderror
                        <div>
                            <label for="change-password-form-1" class="form-label">Old Password</label>
                            <input id="change-password-form-1" type="password" name="old_pass" class="form-control" placeholder="Old Password" required>
                        </div>
                        @error('new_pass')
                            <span style="color: red">Password Does not match</span>
                        @enderror
                        <div class="mt-3">
                            <label for="change-password-form-2" class="form-label">New Password</label>
                            <input id="change-password-form-2" type="password" name="new_pass" class="form-control" placeholder="New Password" required>
                        </div>
                        <div class="mt-3">
                            <label for="change-password-form-3" class="form-label">Confirm New Password</label>
                            <input id="change-password-form-3" type="password" name="confirm_new_pass" class="form-control" placeholder="Confirm new password" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Change Password</button>
                    </div>
                </form>
            </div>
            <!-- END: Change Password -->


            <!-- END: Personal Information -->
        </div>

    </div>
@endsection
