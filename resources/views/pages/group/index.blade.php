@extends('../layout/' . $layout)

@section('subhead')
    <title>Group | Fundz</title>
@endsection
@section('subcontent')
    <!-- BEGIN: Referral Content -->
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Intro -->
                <div class="col-span-12 mt-8">
                    <h1 class="text-3xl font-bold truncate mr-6">Group</h1>
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Save with your friends and family in one place. 👪</h2>
                        <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                            <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>
                    <div>
                        <a href="javascript:;"  data-toggle="modal" data-target="#large-slide-over-size-preview" type="submit" class="btn btn-primary w-27 text-xl">Create a new Group</a>
                    </div>
                    <br>
                    <div class="alert alert-dismissible show box bg-theme-3 text-white flex items-center mb-6" role="alert">
                        <span>👇👇👇👇👇 </span> All groups you are in 👇👇👇👇👇👇</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                </div>
                <!-- END: Intro -->
                <!-- Begin: Card to display groups -->
                <div class="col-span-12">
                    <div class="grid grid-cols-12 gap-6">
                    @foreach ($groups as $group)
            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
            <div class="flex items-center border-b border-gray-200 dark:border-dark-5 px-5 py-4">
                <div class="ml-3 mr-auto">
                    <a class="font-medium">{{$group['name']}}</a> 
                    <div class="flex text-gray-600 truncate text-xs mt-0.5"> {{$group['created_at']}}</div>
                </div>
            </div>
            <div class="p-5">
                <a href="" class="block font-bold text-base mt-5">Target : ₦{{ number_format($group['target'],0,'.',',') }}</a>
                <Br>
                <h4 class="block font-bold truncate mr-6">Description:</h4>
                <div class="block text-gray-700 dark:text-gray-600 mt-2">{{$group['description']}}</div>
            </div>
            
            <div>

            </div>
        </div>
                    <!-- BEGIN: top up modal -->
            
        @endforeach
            </div>
        </div>
    </div>
    <!-- END: Header-->
      <!-- BEGIN: Create Group Modal -->
 <div id="large-slide-over-size-preview" class="modal modal-slide-over" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header p-5">
                 <h2 class="font-medium text-base mr-auto">Create New group</h2>
             </div>
             <div class="modal-body"> 
                <form action="/group/store" method="get">
                <div class="input-form"> 
                    <label for="nameValidator" class="form-label w-full flex flex-col sm:flex-row"> Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">Required, at least 6 characters</span> </label> 
                    <input id="nameValidator" type="text" name="name" class="form-control" placeholder="Camp Savings" minlength="6" required>
                </div>
                <br>
                <div class="input-form">
                    <label for="visibilityValidator" class="form-label w-full flex flex-col sm:flex-row">Visibility</label> <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">Select a visibility</span></label>
                    <select id="visibilityValidator" name="visibility"class="form-select mt-2 sm:mr-2" aria-label="Default select example" required>\
                        <option id="visibility" value="" onclick="emailform('')" active><-- select a visibility --></option>
                        <option id="visibility" onclick="emailform('public')" value="public" >Public</option>
                        <option id="visibility" onclick="emailform('private')" value="private">Private</option>
                    </select> 
                </div>
                <br>
                <div class="input-form" id="privateMails" hidden>
                    <label for="privateMail" class="form-label w-full flex flex-col sm:flex-row">Email of Participants<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">Seperate emails with a comma '<b>,</b>'</span></label>
                    <input id="privateMail" type="text" name="privateMails" class="form-control" placeholder="first@mail.com,second@mail.com" required multiple>
                </div>
                <br>
                <div class="input-form"> 
                    <label for="descriptionValidator" class="form-label w-full flex flex-col sm:flex-row"> Description</label> <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">Required, minimun of 50 and Maximum of 500 characters</span> </label> 
                    <textarea id="descriptionValidator" type="text" name="description" class="form-control" placeholder="We are saving for december camp out" minlength="50" maxlength="500" required></textarea>
                </div>
                <br>
                <div class="input-form">
                    <label for="targetValidator" class="form-label w-full flex flex-col sm:flex-row">Target</label> <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">Required, Enter Group target</span></label>
                    <input id="targetValidator" type="number" name="target" class="form-control" placeholder="Enter Group target" min="1000" required>
                </div>
                <br>
                <!-- Submit button -->
                <div class="input-form">
                    <button type="submit" class="btn btn-primary w-full">Create Group</button>
                </div>                
                </div>
                </form>

             </div>
         </div>
     </div>
 </div> <!-- END: Create Group Modal -->

<!-- Js function emailform -->
<script>
    // if document is ready
        function emailform(value) {
        // if the select option is public
        // console.log(value);
            if (value == 'private') {
                document.getElementById('privateMails').hidden = false;
            } else {
                document.getElementById('privateMails').hidden = true;
            }
        
        }
</script>
    
</script>

@endsection