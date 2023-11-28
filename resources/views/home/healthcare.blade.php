@extends('home-layout')

@section('body')
    <!--/breadcrumb-bg-->
    <div class="breadcrumb-bg w3l-inner-page-breadcrumb py-5">
        <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3 my-lg-3">
            <h2 class="title pt-5">Healthcare</h2>
            <ul class="breadcrumbs-custom-path mt-3 text-center">
                <li><a href="index.html">Home</a></li>
                <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Healthcare </li>
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

    <!-- home page block grids -->
    <section class="w3l-two-servicses py-5" id="services2">
        <div class="container py-lg-5 py-md-4 py-2">

            <div class="row bottom-ab-grids">
                <div class="col-lg-6 bottom-ab-left align-self">
                    <h6 class="title-subhny">Virus</h6>
                    <h3 class="title-w3l mb-4">Herpes Simplex Virus</h3>
                    <p class="" style="text-align: justify; font-size: 20px">
                        Herpes simplex virus commonly causes recurrent infection affecting the skin, mouth, lips, eyes and genitals.
                        Common severe infections include encephalitis, meningitis, neonatal herpes, and disseminate infection (in immuno-compromised patients).
                        Mucocutaneous infections cause clusters of small painful vesicles on an erythematous base.
                        Disgnosis is clinical, laboratory confirmation by culture, PCR, direct immunofluorescence, or serologic testing can be done.
                        Treatment is symptomatic, antiviral therapy is helpful for severe infections and, if begun early, for recuurent and primary infections.
                    </p>
                </div>
                <div class="col-lg-6 bottom-right-grids pl-lg-5 mt-lg-0 mt-5" style="margin-bottom: 100px !important">
                    <img src="assets/images/herpes-simplex.jpg" alt="" class="radius-image img-fluid">
                </div>

                <div class="col-lg-6 bottom-right-grids pl-lg-5 mt-lg-0 mt-5">
                    <img src="assets/images/genital-herpes.jpg" alt="" class="radius-image img-fluid" style="margin-bottom: 100px !important">
                </div>
                <div class="col-lg-6 bottom-ab-left align-self">
                    <h6 class="title-subhny">Virus</h6>
                    <h3 class="title-w3l mb-4">Genital Herpes</h3>
                    <p class="" style="text-align: justify; font-size: 20px">
                        This is the most ulcerative sexually transmitted disease in developed countries. It is also becoming a common place even in developing countries.
                        It is usually caused by HSV-2, although 10% - 30% of cases involve HSV-1.
                        Primary lessions develop 4 to 7 days after contact. The vesicles usually erode to form ulcers that may coalesce. Lessions may occur on the prepuce, glans penis and penile shaft in men, and on the labia, clitoris, perineum, vagina and cervix in women.
                        They may occur arround the anus and in the rectum in men and women who engage in receptive rectal intercourse. Genital HSV infection may cause urinary hesitancy, dysuria, urinary retention or constipation.
                        Severe sacral neuralgia may occur. Scarring may follow healing and recurrences occur in 80% of patients with HSV-2 and in 50% with HSV-1.
                        Primary genital lessions are usually more painful, prolonged, and widespread and are more likely to be bilateral and involve regional adenopathy and constitutional symptoms than recurrent genital lessions.
                        Recurrent lesions may have severe prodromal symptoms and may involve the buttocks, groin, or thigh.
                    </p>
                </div>

                <div class="col-lg-6 bottom-ab-left align-self">
                    <h6 class="title-subhny">Bacteria</h6>
                    <h3 class="title-w3l mb-4">Bacterial Vaginosis and Candida Albican (Thrush)</h3>
                    <p class="" style="text-align: justify; font-size: 20px">
                        Bacterial Vaginosis is an offensive vaginal discharge with fishy odour. Vaginal pH is >5.5. The vagina is not inflammed and pruritus is uncommon. There is increased risk of preterm labout and intraaminiotic infectin in pregnancy.
                        Diagnosis is by culture. Treatment can be prescribed by Dr. Anonymous.
                        Candida Albican (Thrush) is the commonest cause of vaginal discharge which is classically white curds. The vulva and vagina may be red, fissured and sore, especially if there is allergic component.
                        Pregnancy, contraceptives and other steroids immunodeficiencies, antibiotics and diabetes are risk factors.
                        Diagnosis is by microscopy which reveals strings of mycelium or typical oval spores culture.
                        Treatment can be prescribed by Dr. Anonymous.
                    </p>
                </div>
                <div class="col-lg-6 bottom-right-grids pl-lg-5 mt-lg-0 mt-5">
                    <img src="assets/images/bv.jpg" alt="" class="radius-image img-fluid" style="margin-bottom: 100px !important">
                </div>
            </div>

            {{-- <div class="row bottom-ab-grids">
                <div class="col-lg-6 bottom-right-grids pl-lg-5 mt-lg-0 mt-5">
                    <img src="assets/images/g4.jpg" alt="" class="radius-image img-fluid">
                </div>
                <div class="col-lg-6 bottom-ab-left align-self">
                    <h6 class="title-subhny">Virus</h6>
                    <h3 class="title-w3l mb-4">Genital Herpes</h3>
                    <p class="">

                    </p>
                </div>
            </div> --}}


        </div>
    </section>
    <!-- //home page block grids -->
    <!-- /w3l-content-5-->
    <section class="w3l-content-5 py-5">
        <div class="content-4-main py-lg-5 py-md-4">
            <div class="container pb-5">
                <div class="title-content text-left">
                    <h6 class="title-subhny">Here & Now, Every Day</h6>
                    <h3 class="title-w3l two mb-sm-5 mb-4">Healing Experiences- For Everyone <br> All The Time</h3>
                </div>
                <div class="content-info-in row">
                    <div class="content-left col-lg-6">
                        <p class=""> We focus on the needs of every small to middle market businesses to improve and
                            grow
                            their return. lacinia id erat eu
                            ullam corper. Nunc id ipsum fringilla, gravida felis vitae. lacinia id, sunt in
                            culpa quis lacinia. Lorem ipsum dolor, sit amet init elit. Eos,
                            debitis doler et in.lacinia id, sunt in culpa quis. </p>
                    </div>
                    <div class="content-right col-lg-6 mt-lg-0 mt-5">
                        <p> We focus on the needs of every small to middle market businesses to improve and grow
                            their return. lacinia id erat eu
                            ullam corper. Nunc id ipsum fringilla, gravida felis vitae. lacinia id, sunt in
                            culpa quis lacinia. Lorem ipsum dolor, sit amet init elit. Eos,
                            debitis. gravida felis vitae. lacinia id, sunt in
                            culpa quis. Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
