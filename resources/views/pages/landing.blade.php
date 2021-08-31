@extends('layouts.app')

@section('content')
<div class="section overlay-container">
    <div class="background-page overlay-container" style='background-image:url({{asset("landing/images/hd-4.jpg")}})'> </div>
    <div class="container content box-middle">
        <div class="row vertical-row " data-anima="fade-in" data-time="2000">
            <div class="col-md-6 col-sm-12 text-center-sm">
                <h1 class="text-color">Manage all your</h1>
                <h1>Fundz in one place with Fundz</h1>
            </div>
            <div class="col-md-6 col-sm-12 text-center-sm">
                <p>
                    Fundz is a platform that allows you to manage all your fundz in one place. You can easily track your fundz and make sure you are not losing any money.
                </p>
                <hr class="space m" />
                
            </div>
        </div>
    </div>
</div>
<!-- Contact begin -->
<div class="section overlay-container" id="contact">
    <div class="background-page overlay-container" style='background-image:url({{asset("landing/images/hd-5.jpg")}})'> </div>
    <div class="container content box-middle">
        <div class="row proporzional-row">
            <div class="col-md-12 boxed-inverse shadow-1">
                <!-- Check session -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                
                @endif
                <h2>Contact us now</h2>
                <p>If you have any question, feel free to send us a message. </p>
                <hr class="space m" />
                <!-- contact from -->
                <div class="contact-form">
                    <form id="contact-form" method="post" action="/contact">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required="required" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="4" placeholder="Message" required="required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            <!-- <div class="col-md-7 col-sm-12">
                <div class="google-map" data-coords="6.603971395224222, 3.241965054470596"></div>
            </div> -->
        </div>
    </div>
</div>
<!-- Contact end -->
<!-- Crazy team begin -->
<div class="section overlay-container" id="team">
    <div class="background-page overlay-container" style='background-image:url({{asset("landing/images/hd-5.jpg")}})'> </div>
    <div class="container content box-middle">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h1>Crazy team</h1>
                <p>
                    Fundz is not a one man Job, It was a team effort. Here are the list of our valuable team members.
                </p>
            </div>
            <div class="col-md-6 col-sm-12">
                <table class="grid-table grid-table-xs-12">
                    <tbody>
                        <tr>
                            <td>
                                <div class="icon-box counter-box-icon">
                                    <div class="icon-box-cell">
                                        <i class="fa fa-circle-o text-xl"></i>
                                    </div>
                                    <div class="icon-box-cell">
                                        <label class="counter text-l" data-speed="3000" data-to="20">20</label>
                                        <p class="text-s">Members</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box counter-box-icon">
                                    <div class="icon-box-cell">
                                        <i class="fa fa-circle-o text-xl"></i>
                                    </div>
                                    <div class="icon-box-cell">
                                        <label class="counter text-l" data-speed="3000" data-to="35">35</label>
                                        <p class="text-s">Collaborators</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="icon-box counter-box-icon ">
                                    <div class="icon-box-cell">
                                        <i class="fa fa-circle-o text-xl"></i>
                                    </div>
                                    <div class="icon-box-cell">
                                        <label class="counter text-l" data-speed="3000" data-to="12">12</label>
                                        <p class="text-s">Offices</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr class="space" />
        <div class="flexslider carousel outer-navs" data-options="minWidth:200,itemMargin:15,numItems:3,controlNav:false,directionNav:true">
            <ul class="slides">
                <li>
                    <a class="img-box lightbox shadow-1" href="{{asset('/landing/images/gallery/gabriel.jpeg')}}" data-lightbox-anima="fade-right">
                        <img src="{{asset('/landing/images/gallery/gabriel.jpeg')}}" alt="">
                    </a>
                    <hr class="space s" />
                    <p class="text-color text-s">Gabriel Akinyosoye (<a href="https://github.com/humaneguy" target="_blank">Humaneguy</a>)</p>
                    <p class="text-normal text-xs">CEO and Founder of Fundz</p>
                </li>
                <li>
                    <a class="img-box lightbox shadow-1" href="{{asset('/landing/images/gallery/timothy.jpeg')}}" data-lightbox-anima="fade-right">
                        <img src="{{asset('/landing/images/gallery/timothy.jpeg')}}" alt="">
                    </a>
                    <hr class="space s" />
                    <p class="text-color text-s">Timothy Akiode (<a href="https://github.com/timbaron" target="_blank">Timbaron</a>)</p>
                    <p class="text-normal text-xs">CTO and Co-Founder of Fundz</p>
                </li>
                <li>
                    <a class="img-box lightbox shadow-1" href="{{asset('/landing/images/gallery/emma.jpg')}}" data-lightbox-anima="fade-right">
                        <img src="{{asset('/landing/images/gallery/emma.jpg')}}" alt="">
                    </a>
                    <hr class="space s" />
                    <p class="text-color text-s">Oyekale Emmanuel (<a href="https://www.linkedin.com/in/emmanuel-oyekale/?originalSubdomain=ng" target="_blank">Emmanuel</a>)</p>
                    <p class="text-normal text-xs">Lead strategy and Partnership</p>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Crazy team end -->
<!-- Services Begin -->
<div class="section overlay-container" id="service">
    <div class="background-page overlay-container" style="background-image:url('../images/hd-7.jpg');"> </div>
    <div class="container content box-middle">
        <div class="row proporzional-row">
            <div class="col-md-12 col-sm-12">
                <h2>Services</h2>
                <hr class="space l" />
                <h3 class="text-m">Security</h3>
                <div class="progress">
                    <div class="progress-bar" data-progress="99">
                        <span><span class="counter" data-to="99">99</span> %</span>
                    </div>
                </div>
                <hr class="space s" />
                <h3 class="text-m">Saving</h3>
                <div class="progress">
                    <div class="progress-bar" data-progress="95">
                        <span><span class="counter" data-to="95">75</span> %</span>
                    </div>
                </div>
                <hr class="space s" />
                <h3 class="text-m">Safelock</h3>
                <div class="progress">
                    <div class="progress-bar" data-progress="90">
                        <span><span class="counter" data-to="90">90</span> %</span>
                    </div>
                </div>
                <hr class="space l" />
                <hr class="space visible-sm" />
            </div>
            
        </div>
    </div>
</div>
<!-- Services End -->



@endsection
