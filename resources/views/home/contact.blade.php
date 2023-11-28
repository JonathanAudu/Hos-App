@extends('home-layout')

@section('body')
    <!--/breadcrumb-bg-->
    <div class="breadcrumb-bg py-5  w3l-inner-page-breadcrumb">
        <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
            <h2 class="title pt-5">Contact Us</h2>
            <ul class="breadcrumbs-custom-path mt-3 text-center">
                <li><a href="index.html">Home</a></li>
                <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contact </li>
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
    <!--/contact-->
    <section class="w3l-contact-2 py-5" id="contact">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="contact-grids d-grid">
                <div class="contact-left">
                    <h6 class="title-subhny mb-1">Get in Touch</h6>
                    <h3 class="title-w3l mb-2">Contact Us</h3>
                    <p>We have a dedicated support center for all of your support needs. We usually get back to you within
                        12-24 hours.</p>
                    <div class="cont-details">
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Our Address</h6>
                                <p>25 Ouagadougou St, Wuse 900281, Abuja, Federal Capital Territory.</p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Call Us</h6>
                                <p><a href="tel:+2347036651009">+2347036651009</a></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-envelope-o"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Email Us</h6>
                                <p><a href="mailto:doctor@doctoranonymous.ng" class="mail">doctor@doctoranonymous.ng</a></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-life-ring"></span>
                            </div>
                            <div class="cont-right">
                                <h6>Customer Support</h6>
                                <p><a href="mailto:info@prediagnosis.org" class="mail">info@prediagnosis.org</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-right">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <strong>Success!</strong> 
                            You will be contacted shortly.
                        </div>
                    @endif

                    <form action="{{route('submit')}}" method="post" class="signin-form">
                        @csrf
                        <div class="input-grids">
                            <input type="text" name="name" placeholder="Your Name*" class="contact-input" required="" /> 
                            <input type="email" name="email" placeholder="Your Email*" class="contact-input" required="" />
                            <input type="tel" name="phone" placeholder="Your Phone Number*" class="contact-input" required="" />
                            <input type="text" name="subject" placeholder="Subject*" class="contact-input" required="" />
                        </div>
                        <div class="form-input">
                            <textarea name="w3lMessage" id="message" placeholder="Type your message here*" required=""></textarea>
                        </div>
                        <div class="w3l-submit text-lg-right">
                            <button class="btn btn-style btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
    <!-- /map-->
    <div class="map-iframe">
        <iframe src="https://maps.google.com/maps?q=25 Ouagadougou StWuse 900281, Abuja, Federal Capital Territory;t=m&amp;z=17&amp;output=embed&amp;iwloc=near"
        width="100%" height="450" style="border:0;"></iframe>
    </div>
    <!-- //map-->
@endsection
