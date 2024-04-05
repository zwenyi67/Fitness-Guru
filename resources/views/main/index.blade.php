<x-layout>

    <!-- end banner -->
    <!-- about -->
    <section class="banner_main">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button style="border: 3px solid; padding: 6px 20px;" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button style="border: 3px solid; padding: 6px 20px;"  type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button style="border: 3px solid; padding: 6px 20px;" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/images/banner1.jpg') }}" class="d-block w-100" alt="...">
                    
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/images/banner2.jpg') }}" class="d-block w-100" alt="...">
                    
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/images/banner3.jpg') }}" class="d-block w-100" alt="...">
                    
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        

        <div class="banner_text">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="stewart">
                            <span>Try to get <b>Fit</b> with us</span>
                            <h1><b>Fitness Guru</b></h1>
                            <p><b>Fitness Guru aims to make everyone Fit, Strong And Healty.</b> </p>
                            <a class="read_more" href="/contact">Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="about">
        <div class="container">
            <div class="row d_flex">
                <div class="col-md-5">
                    <div class="titlepage">
                        <h2>About Fitness Guru</h2>
                        <p>Fitness Guru is an e-commerce and we sell protein and gym accessories. It is also a platform
                            for those looking for a gym trainer to find and hire a trainer. Lorem ipsum dolor sit amet
                            elit. Doloremque impedit ullam nihil? Dolor similique non totam sequi labore dignissimos.
                        </p>
                        <a class="read_more" href="/about">Raed More</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about_img">
                        <figure><img src="images/about1.jpg" alt="#" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->
    <!-- services -->
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Services</h2>
                        <p>The point of using Lorem Ipsum is that it has a more-or-less </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <div style="min-height: 314px; max-height: 314px;"  class="se_img">
                        <figure><img style="min-height: 314px; max-height: 314px;" src="images/service5.jpg" alt="#" /></figure>
                        <div class="fs-5 text-white mt-2 fw-semibold">PERSAONAL TRAINER</div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div style="min-height: 314px; max-height: 314px;" class="se_img">
                        <figure><img style="min-height: 314px; max-height: 314px;" src="images/service4.jpg" alt="#" /></figure>
                        <div class="fs-5 text-white mt-2 fw-semibold">COURSE OR PROGRAM</div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div style="min-height: 314px; max-height: 314px;" class="se_img">
                        <figure><img style="min-height: 314px; max-height: 314px;" src="images/protein1.jpg" alt="#" /></figure>
                        <div class="fs-5 text-white mt-2 fw-semibold">SELLING PRODUCTS</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end services -->
    <!-- latest news -->
    <div class="latest">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Latest News</h2>
                        <p>The point of using Lorem Ipsum is that it has a more-or-less</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="news_img">
                        <figure><img src="images/nes.jpg" alt="#" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end latest news -->
    <!-- trainers -->
    <div class="trainers mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>What We Train</h2>
                        <p class="mt-4">Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($types as $type)
                    <div class="col-md-4">
                        <div id="trai" class="trainer_box">
                            <div class="trainer_img">
                                <figure><img src="/uploads/{{ $type->image }}" alt="#" /></figure>
                            </div>
                            <div class="trainer">
                                <h3>{{ $type->type }}</h3>
                                <p>{{ $type->description }}</p>
                                {{-- <p>a great way to keep yourself balanced, giving your body proportion, shaping and helping general fitness</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-md-4">
                  <div id="trai" class="trainer_box">
                     <div class="trainer_img">
                        <figure><img src="images/Calisthenics.jpg" alt="#"/></figure>
                     </div>
                     <div class="trainer">
                        <h3>Calisthenics</h3>
                        <p>improves functional strength, low-resistance exercises use your body weight rather than other equipment</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div id="trai" class="trainer_box">
                     <div class="trainer_img">
                        <figure><img src="images/martials.jpg" alt="#"/></figure>
                     </div>
                     <div class="trainer">
                        <h3>Martial Art</h3>
                        <p>codified systems and traditions of combat practiced for a number of reasons such as developing awareness, self-defense</p>
                     </div>
                  </div>
               </div> --}}
            </div>
            {{-- <div class="row">
               <div class="col-md-4">
                  <div id="trai" class="trainer_box">
                     <div class="trainer_img">
                        <figure><img src="images/Zumba.jpg" alt="#"/></figure>
                     </div>
                     <div class="trainer">
                        <h3>Zumba</h3>
                        <p>lots of different muscle groups at once for total body toning that help you maintain a good respiratory system.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div id="trai" class="trainer_box">
                     <div class="trainer_img">
                        <figure><img src="images/Cardio1.jpg" alt="#"/></figure>
                     </div>
                     <div class="trainer">
                        <h3>Cardio</h3>
                        <p>cardiovascular training, and it encompasses any exercise—such as running, cycling elevates your heart rate</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div id="trai" class="trainer_box">
                     <div class="trainer_img">
                        <figure><img src="images/Yoga.jpg" alt="#"/></figure>
                     </div>
                     <div class="trainer">
                        <h3>Yoga</h3>
                        <p> various positions in order to become more fit or flexible, to improve your breathing, and to relax your mind</p>
                     </div>
                  </div>
               </div>
            </div> --}}
        </div>
    </div>
    <!-- end trainers -->
    <!-- gallery -->
    <div class="gallery mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2 class="text-black">Gallery</h2>
                        <p>The point of using Lorem Ipsum is that it has a more-or-less</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tz-gallery">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <a class="gallery_img" href="images/gallery1.jpg">
                                    <img src="images/gallery1.jpg" alt="Bridge">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <a class="gallery_img" href="images/gallery2.jpg">
                                    <img src="images/gallery2.jpg" alt="Bridge">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <a class="gallery_img" href="images/gallery3.jpg">
                                    <img src="images/gallery3.jpg" alt="Bridge">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <a class="gallery_img" href="images/gallery4.jpg">
                                    <img src="images/gallery4.jpg" alt="Bridge">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <a class="gallery_img" href="images/gallery5.jpg">
                                    <img src="images/gallery5.jpg" alt="Bridge">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <a class="gallery_img" href="images/gallery6.jpg">
                                    <img src="images/gallery6.jpg" alt="Bridge">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end gallery -->
    <!--  contact -->
    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Requst A call for You</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form id="request" class="main_form">
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Your Name" type="type" name="Your Name">
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Email" type="type" name="Email">
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Phone Number" type="type"
                                    name="Phone Number">
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Subject" type="type" name="Subject">
                            </div>
                            <div class="col-md-12">
                                <textarea class="textarea" placeholder="Message" type="type" Message="Name">Message</textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="send_btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="map_main">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30550.073469651656!2d96.16745791562498!3d16.838298699999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c193f407545a0d%3A0xc47f325afd5b5bdb!2sFITNESS%20HUB%20GYM!5e0!3m2!1smy!2smm!4v1692109011010!5m2!1smy!2smm"
                                width="600" height="425" frameborder="0" style="border:0; width: 100%;"
                                allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->
</x-layout>
