@extends('home-layout')

@section('body')
    <!--/breadcrumb-bg-->
    <div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
        <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
            <h2 class="title pt-5">About</h2>
            <ul class="breadcrumbs-custom-path mt-3 text-center">
                <li><a href="">Home</a></li>
                <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> About </li>
            </ul>
        </div>
    </div>
    <!--//breadcrumb-bg-->
    <!-- banner bottom shape -->
    <div class="position-relative">
        <div class="shape overflow-hidden">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- banner bottom shape -->
    <!-- //w3l-inner-page-breadcrumb-->
    <section class="w3l-about-ab" id="about">
        <div class="midd-w3 py-5">
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="row">
                    <div class="col-lg-5 left-wthree-img">
                        <h6 class="title-subhny">About Us</h6>
                        <h2>A product of <br> PreDiagnosis International</h2>
                        <h3 class="title-w3l mb-4">The Best Medics, Doctors & Nurses</h3>

                    </div>
                    <div class="col-lg-7 pl-lg-5 align-self">
                        <p class="" style="font-size: 25px">Many youths like you and I have always found it a bit challenging walking into
                            clinics and hospitals, explaining to a doctor or a nurse about certain personal health
                            challenges. Asides the usual malaria or typhoid, issues like vaginal discharge, pain, growth or
                            itching in the groin after a one-night stand, painful urination, offensive odours in the pubic
                            region, depression, drug dependency or addiction are not usually easy to discuss for many of us.
                        </p>
                        <p class="mt-4" style="font-size: 25px">But what if I tell you, you can now personally ACCESS and RETAIN services of
                            trained doctors, twenty-four/seven, all-year-round. They are professional and they are discreet
                            doctors. Now you can call, chat or video call anytime, as many times, as you like.</p>
                        <p class="mt-4" style="font-size: 25px">When you click below and sign up, you would have automatically acquired the
                            services of a team of trained expensive private doctors for just ₦900.00 (Nine Hundred Naira
                            only), per month. Our mission is to handle all of your intimate health
                            challenges for the next twelve calendar months, discreetly and satisfactorily. We handle all of
                            your private healthcare challenges in the following areas, among other things. </p>
                            <a href="{{ route('getsignup') }}" class="btn btn-style btn-primary mt-lg-5 mt-4">Sign Up Now</a>
                        </div>
                        
                    </div>
                </div>
                <div class="imgw3l-ab mb-md-5 mb-3">
                    <img src="assets/images/4img.jpg" style="width: 100%; height: 800px;" alt="" class="radius-image img-fluid">
                </div>
        </div>
    </section>
    <!-- /w3l-content-2-->
    <!-- /bottom-grids-->
    <section class="w3l-bottom-grids-6 py-5" id="services1">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-content text-center">
                <h6 class="title-subhny text-center">Dr. Anonymous and the future</h6>
                <h3 class="title-w3l mb-sm-5 mb-4 pb-sm-o pb-2 text-center">Our Core Values</h3>
            </div>
            <div class="grids-area-hny text-center row mt-lg-4">
                <div class="col-lg-4 col-md-6 grids-feature">
                    <div class="area-box icon-blue">
                        <span class="fa fa-lightbulb-o"></span>


                        <h4><a href="#feature" class="title-head">Our Mission</a></h4>
                        <p>To use the Nigerian Youth Health Private Healthcare Platform (NYPHP) to meet the needs of the
                            Nigerian youths.</p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 grids-feature mt-md-0 mt-4">
                    <div class="area-box icon-pink">
                        <span class="fa fa-handshake-o"></span>
                        <h4><a href="#feature" class="title-head">Our Vision</a></h4>
                        <p>To be the most-preferred health platform for youths nationwide.</p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 grids-feature mt-lg-0 mt-4">
                    <div class="area-box icon-yellow">
                        <span class="fa fa-podcast"></span>
                        <h4><a href="#feature" class="title-head">Our Objective</a></h4>
                        <p>To provide high-quality and customized healthcare services for adolescents and youths.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //bottom-grids-->
    <!-- home page block grids -->
    <section class="w3l-two-servicses py-5" id="services2">
        <div class="container py-lg-5 py-md-4 py-2">

            <div class="row bottom-ab-grids">
                <div class="col-lg-6 bottom-ab-left align-self">
                    <h6 class="title-subhny">What We Offer</h6>
                    <h3 class="title-w3l mb-4">Quick Check</h3>
                    <p class="">The discreet healthcare platform specifically set up to manage “intimate” personal
                        Healthcare needs and challenges of Nigerian YOUTHS, Nationwide!</p>
                    <div class="row">
                        <ul class="col-6 w3l-right-book mt-4">
                            For Females
                            <li><span class="fa fa-check"></span>Unusual vaginal discharge </li>
                            <li><span class="fa fa-check"></span>Genital rash and Itching </li>
                            <li><span class="fa fa-check"></span>Foul Vaginal Smell</li>
                            <li><span class="fa fa-check"></span>Frequent Urination</li>
                            <li><span class="fa fa-check"></span>Urinary Urgency</li>
                            <li><span class="fa fa-check"></span>Pain during sexual intercourse </li>
                            <li><span class="fa fa-check"></span>Delayed menstruation </li>
                            <li><span class="fa fa-check"></span>Spotting within menstrual cycle </li>
                            <li><span class="fa fa-check"></span>Heavy menstruation</li>
                            <li><span class="fa fa-check"></span>Absent menstruation </li>
                            <li><span class="fa fa-check"></span>Nipple discharge </li>
                            <li><span class="fa fa-check"></span>Lower abdominal pain </li>
                        </ul>
                        <ul class="col-6 w3l-right-book mt-4">
                            For Males
                            <li><span class="fa fa-check"></span>Penile discharge </li>
                            <li><span class="fa fa-check"></span>Genital Itching </li>
                            <li><span class="fa fa-check"></span>Penile rash/penile warts </li>
                            <li><span class="fa fa-check"></span>Premature ejaculation </li>
                            <li><span class="fa fa-check"></span>Painful urination </li>
                            <li><span class="fa fa-check"></span>Weak erection </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 bottom-right-grids pl-lg-5 mt-lg-0 mt-5">
                    <img src="assets/images/10img.jpg" alt="" class="radius-image img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- //home page block grids -->
    <!-- /w3l-content-5-->
    <section class="w3l-content-5 py-5">
        <div class="content-4-main py-lg-5 py-md-4">
            <div class="container pb-5">
                <div class="title-content text-left">
                    <h6 class="title-subhny">Here & Now, Every Day</h6>
                    <h3 class="title-w3l two mb-sm-5 mb-4">Everyday Healthcare Advisory <br> All The Time</h3>
                </div>
                <div class="content-info-in row">
                    <div class="content-left col-lg-6">
                        <h4 style="color: white"> In addition, Doctor Anonymous is always available to give you listening
                            ears. Are you worried about what tomorrow brings, have you ever thought of just letting go of
                            the pain and taking your own life? Have you felt like nothing is working for you? Are you always
                            in a low mood? </h4>
                        <a href="{{ route('contact') }}" class="btn btn-style btn-primary mt-md-5 mt-4">Get in touch</a>
                    </div>
                    <div class="content-right col-lg-6 mt-lg-0 mt-5">
                        <h4 style="color: white">Do you find it hard to stay away from recreational drugs? Have you
                            discovered that you cannot function in a day without taking a particular medication? Is there
                            any form of addiction that you are struggling with? Help is here, Dr. Anonymous is here for you!
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /w3l-content-5-->
    <!--/team-sec-->
    <section class="w3l-team">
        <div class="team py-5">
            <div class="container py-lg-5 py-md-4">
                <div class="title-content text-center">
                    <h6 class="title-subhny text-center">Leading Team</h6>
                    <h3 class="title-w3l mb-sm-3 text-center">Meet Our Executives</h3>
                </div>
                <div class="row team-row">
                    <div class="col-lg-6 col-6 team-wrap mt-4 pt-lg-2">
                        <div class="team-info">
                            <div class="column position-relative img-circle">
                                <a href="https://prediagnosis.org/member/mgmt/1"> <img src="assets/images/1.png" style="height: 700px" alt="" class="img-fluid" /></a>
                            </div>
                            <div class="column-btm">
                                <h3 class="name-pos"><a href="#url">Dr. Elliott Omose </a></h3>
                                <p>Founder, PreDiagnosis International</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-6 team-wrap mt-4 pt-lg-2">
                        <div class="team-info">
                            <div class="column position-relative img-circle">
                                <a href="https://prediagnosis.org/member/mgmt/2"><img src="assets/images/2.png" style="height: 700px" alt="" class="img-fluid" /></a>
                            </div>
                            <div class="column-btm">
                                <h3 class="name-pos"><a href="#url">Dr. John Ade-Iguve</a></h3>
                                <p>Project Director</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//team-sec-->
@endsection
