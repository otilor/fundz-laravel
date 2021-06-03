@extends('../layout/' . $layout)

@section('subhead')
    <title>Referral | Fundz</title>
@endsection

@section('subcontent')
    <!-- BEGIN: Referral Content -->


<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Referral
    </h2>
    <p class="mb-4 text-bold text-blue-600 text-xl">Referral Earnings: ₦{{ auth()->user()->referral_earning }}</p>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Input -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Referral Link
                </h2>
            </div>
            <div id="input" class="p-5">
                <div class="preview">
                    <div>
                        <label for="regular-form-1" class="form-label">Click to copy</label>
                        <h6 style="color: green" id="linkCopySuccessMessage"></h6>
                        <input id="referralLink" type="text" class="form-control" placeholder="Referral Link" value="{{auth()->user()->getReferralLink()}}">
                        <div class="text-right mt-5">
                            <button type="submit" class="btn btn-primary w-24" onclick="copyReferralLink()">Copy</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Input -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Share Referal Link
                </h2>
            </div>
            <div id="input" class="p-5">
                <div class="preview">
                    <div>
                        <label for="regular-form-1" class="form-label">Share Via</label>
                    </div>
                    <style type="text/css">
                        #button{
                            cursor:pointer;
                            border: none;
                            width: 50px;
                            height: 50px;
                            margin: 20px;
                        }
                        button.Whatsappbutton {
                            background: url('{{asset("dist/images/whatsapp.png")}}') no-repeat;
                        }
                        button.twitterbutton {
                            background: url('{{asset("dist/images/twitter.png")}}') no-repeat;
                        }
                        button.instagrambutton {
                            background: url('{{asset("dist/images/instagram.png")}}') no-repeat;
                        }
                        button.facebookbutton {
                            background: url('{{asset("dist/images/facebook.png")}}') no-repeat;
                        }

                    </style>
                </head>
                <div>
                    <?php
                        $message = "Save and Manage all your fundz in one place with Fundz, Click the link below to join.".' '. auth()->user()->getReferralLink();
                    ?>
                    <a href="https://api.whatsapp.com/send?text={{$message}}" data-action="share/whatsapp/share" target="_blank"><button id="button" value="Search" class="Whatsappbutton"></button></a>
                    <a href="https://twitter.com/intent/tweet?text={{$message}}" target="_blank"><button id="button" value="Search" class="twitterbutton"></button></a>
                    <a href="#"><button id="button" value="Search" class="instagrambutton"></button></a>
                    <a href="#"><button id="button" value="Search" class="facebookbutton"></button></a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Input -->
<div>
    <h1></h1>
</div>

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        People you've referred
    </h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Input -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Referred Users
                </h2>
            </div>
            <div id="input" class="p-5">
                <div class="preview">
                    <div>
                        <table class="table">
                            <thead>
                                @if ($referrals->isEmpty())
                                    <div class="intro-y flex items-center mt-8">
                                        <h2 class="text-lg font-medium mr-auto">
                                            You have no referrals
                                        </h2>
                                    </div>
                                @else
                                <tr>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Name</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Email Address</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Date Joined</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Pay out</th>
                                    <?php
                                        $SerialNumberCounter = 0;
                                    ?>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($referrals as $referral)
                                        <tr>
                                            <td class="border-b dark:border-dark-5">{{$SerialNumberCounter += 1}}</td>
                                            <td class="border-b dark:border-dark-5">{{$referral->name}}</td>
                                            <td class="border-b dark:border-dark-5">{{$referral->email}}</td>
                                            <td class="border-b dark:border-dark-5">{{$referral->created_at}}</td>
                                            @if ($referral->paid)
                                            <td class="border-b dark:border-dark-5">
                                                <button class="btn btn-success w-24">Paid</button>
                                            </td>
                                            @else
                                            <td class="border-b dark:border-dark-5">
                                                <a href="/request-payment/{{$referral->affiliate_id}}" class="btn btn-secondary w-24">Request Payment</a>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

</div>
{{-- Copy code script --}}
<script>
    function copyReferralLink() {
        var copyLink = document.getElementById("referralLink");
        copyLink.select();
        copyLink.setSelectionRange(0, 99999)
        document.execCommand("copy");
        // alert("Referral code copied!!");
        document.getElementById('linkCopySuccessMessage').innerText = "Referral Link Copied!!";
    }

    function SubmitRequestPaymentForm(e)
    {

    }
    </script>

@endsection
