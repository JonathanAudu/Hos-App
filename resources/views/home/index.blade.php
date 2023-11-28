@extends('home-layout')

@section('body')
    <div class="banner-w3l-main">
        <div class="w3l-banner-content">
            <div class="container">
                <div class="bannerhny-info text-center">
                    <h4 class=""  style="font-size: 50px; height:">State University of Medical and Applied Sciences Teaching Hospital
                     <br> (SUMASTH) </h4>
                    <h4 style="color: white pt-5" class="mt-5">Your Trusted Healthcare Partner.
                        Caring for Your Health, Every Step of the Way.
                    </h4>
                    {{-- <a class="btn btn-style btn-white mt-sm-5 mt-4" style="margin-bottom: 70px" href="{{route('about')}}">
                        About Dr. Anonymous</a> --}}
                </div>
            </div>
        </div>
        <!-- home page block1 -->
        <section class="home-services pt-lg-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="box-wrap">
                            <div class="box-wrap-grid">
                                <div class="icon">
                                    <span class="fa fa-users"></span>
                                </div>
                                <div class="info">
                                    <h4><a href="">Qualified Team</a></h4>
                                </div>
                            </div>
                            <p class="mt-3">Our team of doctors, nurses and community health experts at our call center are ready to assist you.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-4">
                        <div class="box-wrap">
                            <div class="box-wrap-grid">
                                <div class="icon">
                                    <span class="fa fa-shield"></span>
                                </div>
                                <div class="info">
                                    <h4><a href=""">Quality Service</a></h4>
                                </div>
                            </div>
                            <p class="mt-3">Highly trained healthcare workers are hired to ensure high quality consultations.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-4">
                        <div class="box-wrap">
                            <div class="box-wrap-grid">
                                <div class="icon">
                                    <span class="fa fa-globe"></span>
                                </div>
                                <div class="info">
                                    <h4><a href="">Emergency Care</a></h4>
                                </div>
                            </div>
                            <p class="mt-3">24/7 Emergency Services - We're Here When You Need Us Most.Urgent Care That Never Compromises on Quality.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //home page block1 -->
    </div>
    <!--//w3l-banner-content-->

    <!-- banner bottom shape -->
    <div class="position-relative">
        <div class="shape overflow-hidden">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- banner bottom shape -->

    <!--/w3l-content-1-->
    <div class="w3l-content-1 py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            {{-- <div class="row w3l-content-inf mt-lg-5 pt-lg-5">
                <div class="col-lg-5 w3l-content-left mt-lg-4">
                    <h6 class="title-subhny mb-2">Sexual and Reproductive Health</h6>
                    <h3 class="title-w3l mb-4">Changing the way you receive healthcare.</h3>
                </div>
                <div class="col-lg-7 w3l-content-right pl-lg-5 mt-lg-4">
                    <p class="para-sub pr-lg-5 mt-md-4 mt-3 mx-auto" style="font-size: 25px">
                        Do you have these symptons?
                        <ol style="font-size: 25px">
                            <li>An unusual discharge from the vagina, penis or anus.</li>
                            <li>Pains when peeing.</li>
                            <li>Lumps or skin growths around the genitals or anus.</li>
                            <li>A rash.</li>
                            <li>Unusual vaginal bleeding.</li>
                            <li>Itchy genitals or anus.</li>
                            <li>Blisters and sores around your genitals or anus.</li>
                            <li>Warts around your genitals or anus.</li>
                        </ol>
                    </p>
                    <p class="para-sub pr-lg-5 mt-md-4 mt-3 mx-auto" style="font-size: 25px">
                        Sign up and contact us for healthcare assistance
                    </p>
                    <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="{{ route('getsignup') }}">
                        Sign Up Here</a>
                </div>
            </div> --}}
        </div>
    </div>
    <!--//w3l-content-1-->
    <!-- /w3l-content-2-->
    <div class="w3l-content-2 py-5">
        <div class="container py-md-5 py-2">
            <div class="row whybox-wrap">
                <div class="col-lg-6 whybox-wrap-left">
                    <div class="title-content text-left">
                        <h6 class="title-subhny">Extraordinary Services</h6>
                        <h3 class="title-w3l mb-sm-5 mb-4 pb-2">Why You Should Choose SUMAS</h3>
                    </div>

                    <div class="whybox-wrap-grid mb-4">
                        <div class="icon">
                            <span class="fa fa-calendar"></span>
                        </div>
                        <div class="info">
                            <h4><a href="#url">Years Of Experience</a></h4>
                            <p class="mt-3">We have been attending to healthcare needs succesfully under SUMAS. </p>
                        </div>
                    </div>
                    {{-- <div class="whybox-wrap-grid mb-4">
                        <div class="icon">
                            <span class="fa fa-pencil-square-o"></span>
                        </div>
                        <div class="info">
                            <h4><a href="#url">Discounted Consultation</a></h4>
                            <p class="mt-3">Due to external funding from the founder of PreDiagnosis International, Dr. Elliot Omose, we are able to reduce cost of consultations. </p>
                        </div>
                    </div> --}}
                    <div class="whybox-wrap-grid mb-4">
                        <div class="icon">
                            <span class="fa fa-shield"></span>
                        </div>
                        <div class="info">
                            <h4><a href="#url">99% Guranteed</a></h4>
                            <p class="mt-3">Our consultations, prescriptions and diagnosis have been proven to assist in healthcare recovery. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 whybox-wrap-right pl-lg-5 position-relative mt-lg-0 mt-1">
                    <img src="assets/images/Esut2.jpg" alt="" class="img-fluid radius-image">

                </div>
            </div>

        </div>
    </div>
    <!-- //w3l-content-2-->
    <!-- /w3l-content-4-->
    <section class="w3l-content-4 py-5" id="features">
        <div class="content-4-main py-lg-5 py-md-4">
            <div class="container">
                <div class="title-content text-center">
                    <h6 class="title-subhny">Extraordinary Services</h6>
                    <h3 class="title-w3l mb-sm-5 mb-4 pb-lg-2">Our Services.</h3>
                </div>
                <div class="content-info-in row">
                    <div class="content-left col-lg-6">
                        <div class="row content4-right-grids mb-sm-5 mb-4">
                            <div class="col-lg-2 col-3 content4-right-icon">
                                <div class="content4-icon icon-clr1">
                                    <span class="fa fa-american-sign-language-interpreting"></span>
                                </div>
                            </div>
                            <div class="col-lg-10 col-9 content4-right-info pl-4">
                                <h6><a href="#url">Clinical Services</a></h6>
                                <p>This includes medical and healthcare services related to sexual and reproductive health,
                                    such as providing contraception, conducting screenings and tests, offering prenatal and
                                    postnatal care, diagnosing and treating sexually transmitted infections (STIs), and
                                    providing abortion services where legal.</p>
                            </div>
                        </div>
                        {{-- <div class="row content4-right-grids mb-sm-5 mb-4">
                            <div class="col-lg-2 col-3 content4-right-icon">
                                <div class="content4-icon icon-clr2">
                                    <span class="fa fa-superpowers"></span>
                                </div>
                            </div>
                            <div class="col-lg-10 col-9 content4-right-info pl-4">
                                <h6><a href="#url">Education and Counseling</a></h6>
                                <p>Sexual and reproductive health workers often engage in educational initiatives to raise
                                    awareness and provide information on topics such as contraception, safe sex practices,
                                    family planning, puberty, menstruation, and STI prevention. They may also provide
                                    counseling services to individuals and couples regarding sexual health, relationship
                                    issues, fertility, and pregnancy options..</p>
                            </div>
                        </div> --}}
                        <div class="row content4-right-grids mb-sm-5 mb-4">
                            <div class="col-lg-2 col-3 content4-right-icon">
                                <div class="content4-icon icon-clr2">
                                    <span class="fa fa-snowflake-o"></span>
                                </div>
                            </div>
                            <div class="col-lg-10 col-9 content4-right-info pl-4">
                                <h6><a href="#url">Advocacy and Policy</a></h6>
                                <p>Sexual and reproductive health workers engage in advocacy efforts to promote access to
                                    comprehensive sexual and reproductive health services, eliminate barriers, and address
                                    social and systemic issues. They work towards influencing policies related to sexual and
                                    reproductive health, advocating for the rights of individuals and communities, and
                                    fighting against stigma and discrimination.</p>
                            </div>
                        </div>
                    </div>
                    <div class="content-right col-lg-6 pl-lg-4 mt-lg-0 mt-2">
                        <div class="row content4-right-grids mb-sm-5 mb-4">
                            <div class="col-lg-2 col-3 content4-right-icon">
                                <div class="content4-icon icon-clr3">
                                    <span class="fa fa-building-o"></span>
                                </div>
                            </div>
                            <div class="col-lg-10 col-9 content4-right-info pl-4">
                                <h6><a href="#url">Maternal and Child Health</a></h6>
                                <p>This involves supporting the health and well-being of pregnant women and their children.
                                    Workers in this field provide prenatal care, monitor pregnancy progression, offer advice
                                    on nutrition and lifestyle, conduct childbirth education, and provide postnatal care for
                                    both the mother and the newborn.</p>
                            </div>
                        </div>
                        {{-- <div class="row content4-right-grids mb-sm-5 mb-4">
                            <div class="col-lg-2 col-3 content4-right-icon">
                                <div class="content4-icon icon-clr4">
                                    <span class="fa fa-heartbeat"></span>
                                </div>
                            </div>
                            <div class="col-lg-10 col-9 content4-right-info pl-4">
                                <h6><a href="#url">Family Planning and Reproductive Health</a></h6>
                                <p>Workers in this area help individuals and couples make informed choices about
                                    contraception and plan their families based on their desired number of children, timing,
                                    and spacing. They provide information on different contraceptive methods, offer
                                    counseling, and assist with contraceptive device insertion or prescription.</p>
                            </div>
                        </div>
                        <div class="row content4-right-grids">
                            <div class="col-lg-2 col-3 content4-right-icon">
                                <div class="content4-icon icon-clr4">
                                    <span class="fa fa-eye"></span>
                                </div>
                            </div>
                            <div class="col-lg-10 col-9 content4-right-info pl-4">
                                <h6><a href="#url">STI Prevention and Treatment</a></h6>
                                <p>Sexual and reproductive health workers play a crucial role in preventing and managing
                                    sexually transmitted infections. They conduct screenings, diagnose infections, provide
                                    treatment or referrals, and offer guidance on safe sex practices, risk reduction, and
                                    partner notification..</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //w3l-content-4-->

    {{-- <!-- stats -->
    <section class="w3l-stats py-lg-0 py-5" id="stats">
        <div class="gallery-inner container py-lg-0 py-3">
            <div class="row stats-con">
                <div class="col-lg-3 col-6 stats_info counter_grid">
                    <span class="fa fa-users"></span>
                    <p class="counter">20</p>
                    <h4>Expert Professionals</h4>
                </div>
                <div class="col-lg-3 col-6 stats_info counter_grid1">
                    <span class="fa fa-laptop"></span>
                    <p class="counter">24</p>
                    <h4>Health Programs</h4>
                </div>
                <div class="col-lg-3 col-6 stats_info counter_grid mt-lg-0 mt-5">
                    <span class="fa fa-smile-o"></span>
                    <p class="counter">60117</p>
                    <h4>Happy Clients</h4>
                </div>
                <div class="col-lg-3 col-6 stats_info counter_grid2 mt-lg-0 mt-5">
                    <span class="fa fa-trophy"></span>
                    <p class="counter">1167</p>
                    <h4>Outreachs</h4>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- //stats -->
    <!--/Blog-Posts-->
    {{-- <section class="w3l-blog py-5" id="blog">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-content text-center">
                <h6 class="title-subhny text-center">Latest News</h6>
                <h3 class="title-w3l pb-sm-o pb-2 text-center">Blog Posts</h3>
            </div>
            <div class="row inner-sec-w3ls">
                <!--/services-grids-->
                <div class="col-lg-4 col-md-6 about-in blog-grid-info text-left mt-5">
                    <div class="card img">
                        <div class="card-body img">
                            <a href="blog-single.html" class="d-block">
                                <img src="assets/images/g7.jpg" alt="" class="img-fluid radius-image">
                            </a>
                            <div class="blog-des mt-4">
                                <h6 class="card-cap mb-2"><a href="blog-single.html">Investigations</a></h6>
                                <h5 class="card-title mb-2"><a href="blog-single.html">The Right Choice For Your Health
                                        Care Needs.</a>
                                </h5>
                                <ul class="admin-post mb-3">
                                    <li>
                                        <span class="fa fa-user-o"></span><a href="#admin"> by Admin</a>
                                    </li>
                                    <li>
                                        <p><span class="fa fa-clock-o"></span> Jan 22,2021</p>
                                    </li>
                                    <li>
                                        <a href="#comments"><span class="fa fa-comments-o"></span> 3</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 about-in blog-grid-info text-left mt-5">
                    <div class="card img">
                        <div class="card-body img">
                            <a href="blog-single.html" class="d-block">
                                <img src="assets/images/g5.jpg" alt="" class="img-fluid radius-image">
                            </a>
                            <div class="blog-des mt-4">
                                <h6 class="card-cap mb-2"><a href="blog-single.html">Researches</a></h6>
                                <h5 class="card-title mb-2"><a href="blog-single.html">The Right Choice For Your Health
                                        Care Needs.</a>
                                </h5>
                                <ul class="admin-post mb-3">
                                    <li>
                                        <span class="fa fa-user-o"></span><a href="#admin"> by Admin</a>
                                    </li>
                                    <li>
                                        <p><span class="fa fa-clock-o"></span> Jan 24,2021</p>
                                    </li>
                                    <li>
                                        <a href="#comments"><span class="fa fa-comments-o"></span> 3</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 about-in blog-grid-info text-left mt-5">
                    <div class="card img">
                        <div class="card-body img">
                            <a href="blog-single.html" class="d-block">
                                <img src="assets/images/g3.jpg" alt="" class="img-fluid radius-image">
                            </a>
                            <div class="blog-des mt-4">
                                <h6 class="card-cap mb-2"><a href="blog-single.html">Your Health </a></h6>
                                <h5 class="card-title mb-2"><a href="blog-single.html">The Right Choice For Your Health
                                        Care Needs.</a>
                                </h5>
                                <ul class="admin-post mb-3">
                                    <li>
                                        <span class="fa fa-user-o"></span><a href="#admin"> by Admin</a>
                                    </li>
                                    <li>
                                        <p><span class="fa fa-clock-o"></span> Jan 28,2021</p>
                                    </li>
                                    <li>
                                        <a href="#comments"><span class="fa fa-comments-o"></span> 3</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> --}}
    <!--//Blog-Posts-->
    <!-- /w3l-content-3-->
    {{-- <section class="w3l-content-3 py-5">
        <!-- /content-6-section -->
        <div class="content-3-info py-3">
            <div class="container py-lg-4">
                <div class="row appointment-formw3">
                    <div class="col-lg-6 welcome-left">
                        <h6 class="title-subhny mb-2">Free Appointment</h6>
                        <h3 class="title-w3l two mb-3">Make an Appointment</h3>
                        <p class="mb-3">
                            We believe in providing the best possible care to all our existing patients and welcomenew
                            patients to
                            sample.</p>
                        <p>Lorem ipsum dolor sit amet,Ea consequuntur illum facere aperiam sequi optio adipisicing.</p>
                        <a class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2" href="#">
                            Contact Us</a>
                    </div>
                    <div class="col-lg-6 free-appointment pl-lg-5 mt-5">
                        <div class="appointment-form">
                            <form action="#" method="post">
                                <div class="fields-grid">
                                    <div class="styled-input">

                                        <div class="appointment-form-field">

                                            <input type="text" name="fullname" placeholder="Full Name"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="styled-input">

                                        <div class="appointment-form-field">

                                            <input type="email" name="email" placeholder="Enter Email"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="styled-input">

                                        <div class="appointment-form-field">

                                            <input type="text" name="phone" placeholder="Enter Number"
                                                required="">
                                        </div>
                                    </div>

                                    <div class="styled-input">

                                        <div class="appointment-form-field">

                                            <input type="date" name="date" placeholder="Set a Date"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="styled-input">

                                        <div class="appointment-form-field">

                                            <select id="department" required="Specialization">
                                                <option value="">Specialization*</option>
                                                <option value="">Cardiology</option>
                                                <option value="">Heart Surgery</option>
                                                <option value="">Skin Care</option>
                                                <option value="">Body Check-up</option>
                                                <option value="">Numerology</option>
                                                <option value="">Diagnosis</option>
                                                <option value="">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="styled-input">

                                        <div class="appointment-form-field">

                                            <select id="doctor" required="Select Doctor">
                                                <option value="">Select Doctor</option>
                                                <option value="">Doctor 1</option>
                                                <option value="">Doctor 2</option>
                                                <option value="">Doctor 3</option>
                                                <option value="">Doctor 4</option>
                                                <option value="">Doctor 5</option>
                                                <option value="">Doctor 6</option>
                                                <option value="">Doctor 7</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="appointment-btn text-lg-right">
                                    <button type="submit" class="btn btn-style btn-primary mt-4">Book
                                        Appointment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- //w3l-content-3-->
@endsection
