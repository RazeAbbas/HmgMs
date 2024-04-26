@extends('front-website.layout')
@section('content')


<!-- Parallax Image -->
<div id="home" data-scroll-index="0" class="banner-header full-height valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{asset('front-assets/img/slider/23.jpg')}}">
    <div class="container">
        <div class="row content-justify-center">
            <div class="col-md-12 text-center">
                <div class="v-middle">
                    <h5>Stay sharp, Look good</h5>
                    <h1>SARGODHA'S FAV.<br>BARBER SHOP.</h1>
                    <h5>Shop No.2, Abdullah Centre X-Block, New, Satellite Town, Sargodha, Pakistan</h5> 
                    <a href="{{url('https://calendly.com/hmengrooming/30min')}}" target="_blank" class="button-1 mt-20">Book Appointment<span></span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- arrow down -->
    <div class="arrow bounce text-center">
        <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
    </div>
</div>
<!-- About -->
<section id="about" data-scroll-index="1" class="about section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-30">
                <div class="section-head mb-20">
                    <div class="section-subtitle">Since 2023</div>
                    <div class="section-title">HMG By Salman</div>
                </div>
                <p>Welcome to HMG By Salman, where the art of grooming meets a unique and edgy twist. Our barbershop is more than just a place to get a haircut or trim your beard; it's an experience like no other. Step into our world of style, sophistication, and masculinity, and discover a new level of self-care that transcends the ordinary.</p>
                <p>At HMEN Grooming, we understand that your hair and beard are more than just facial features; they are a statement of your individuality. Our dedicated team of skilled barbers is committed to helping you express your unique style, leaving you looking and feeling your absolute best.</p>
                <p>
                    At HMEN Grooming, we prioritize your comfort and convenience. We know that your time is valuable, so we offer online booking and flexible scheduling to fit your busy lifestyle. Each visit to our shop is an opportunity to disconnect from the outside world and focus on yourself.
                </p>
                <ul class="about-list list-unstyled mb-30">
                    <li>
                        <div class="about-list-icon"> <span class="ti-check"></span> </div>
                        <div class="about-list-text">
                            <p>We're professional and certified barbers</p>
                        </div>
                    </li>
                    <li>
                        <div class="about-list-icon"> <span class="ti-check"></span> </div>
                        <div class="about-list-text">
                            <p>We use quality products to make you look perfect</p>
                        </div>
                    </li>
                    <li>
                        <div class="about-list-icon"> <span class="ti-check"></span> </div>
                        <div class="about-list-text">
                            <p>We care about our customers satisfaction</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp"> <img src="{{asset('front-assets/img/about2.jpg')}}" alt="" class="mt-90 mb-30"> </div>
            <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp"> <img src="{{asset('front-assets/img/about.jpg')}}" alt=""> </div>
        </div>
    </div>
</section>
<!-- Services Box -->
<section class="services-box section-padding pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="item"> <span class="icon icon icon-icon-1-6"></span>
                    <div class="cont">
                        <h5>Cuts</h5>
                        <p>Exquisite, personalized haircuts that match your unique style.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item"> <span class="icon icon-icon-1-3"></span>
                    <div class="cont">
                        <h5>Fades</h5>
                        <p>Seamless fades for a sharp, stylish look.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item"> <span class="icon icon-icon-1-1"></span>
                    <div class="cont">
                        <h5>Shaves</h5>
                        <p>Experience the smoothest, most relaxing shaves.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our History -->
<section class="about section-padding bg-darkbrown">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mb-30 animate-box" data-animate-effect="fadeInLeft"> <img src="{{asset('front-assets/img/about3.jpg')}}" alt=""> </div>
            <div class="col-md-7 valign mb-30 animate-box" data-animate-effect="fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-head mb-20">
                            <div class="section-subtitle">3 Year of Experience</div>
                            <div class="section-title white">Making people look awesome since 2023</div>
                        </div>
                        <p>Experience a unique and edgy barbershop for all your hair and beard needs. We offer expert grooming services to keep you looking sharp and stylish.</p>
                        <div class="about-bottom"> <img src="{{asset('front-assets/img/signature.svg')}}" alt="" class="image about-signature">
                            <div class="about-name-wrapper">
                                <div class="about-rol">Founder</div>
                                <div class="about-name">Salman Sabir</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services -->
<section id="services" data-scroll-index="2" class="barber-services section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-head text-center">
                    <div class="section-subtitle">What we're offering</div>
                    <div class="section-title">Barber Services</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                <a href="services-page.html">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/services/2.jpg')}}" alt=""> </div>
                        <div class="con">
                            <div class="icon icon-icon-1-6"></div>
                            <h5>Hair Cut</h5>
                            <div class="line"></div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="permalink">Hair cut amet ravida haretra nuam the drana miss uctus enec accumsan.</div>
                                    <h6></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                <a href="services-page.html">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/services/1.jpg')}}" alt=""> </div>
                        <div class="con">
                            <div class="icon icon-icon-1-1"></div>
                            <h5>Beard Trim</h5>
                            <div class="line"></div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="permalink">Shaves ons amet ravida haretra nuam the drana miss uctus enec accumsan.</div>
                                    <h6></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                <a href="services-page.html">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/services/3.jpg')}}" alt=""> </div>
                        <div class="con">
                            <div class="icon icon-icon-1-4"></div>
                            <h5>Hair Wash</h5>
                            <div class="line"></div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="permalink">Hair wash amet ravida haretra nuam the drana miss uctus enec accumsan.</div>
                                    <h6></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials -->
<section class="background bg-img bg-fixed section-padding pb-0" data-background="{{asset('front-assets/img/slider/6.jpg')}}" data-overlay-dark="4">
    <div class="container">
        <div class="row">
            <!-- Testimonials -->
            <div class="col-md-8 offset-md-2 text-center">
                <div class="testimonials">
                    <div class="testimonials-box">
                        <div class="owl-carousel owl-theme">
                            <div class="item"> <span>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                                <i class="star-rating"></i>
                            </span>
                            <p>Lorem dapibus asue metus the nec feusiate eraten miss hendreri net ve ante the lemon sanleo nectan feugiat erat hendrerit necuis ve ante viventa miss sapien silver on the duiman lorem ipsum amet silver miss rana duru at finibus viverra neca the sene on satien.</p>
                            <div class="info">
                                <div class="author-img"> <img src="{{asset('front-assets/img/team/1.jpg')}}" alt=""> </div>
                                <div class="cont">
                                    <h6>Andreas Brown</h6> <span>Customer review</span>
                                </div>
                            </div>
                        </div>
                        <div class="item"> <span>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                        </span>
                        <p>Lorem dapibus asue metus the nec feusiate eraten miss hendreri net ve ante the lemon sanleo nectan feugiat erat hendrerit necuis ve ante viventa miss sapien silver on the duiman lorem ipsum amet silver miss rana duru at finibus viverra neca the sene on satien.</p>
                        <div class="info">
                            <div class="author-img"> <img src="{{asset('front-assets/img/team/2.jpg')}}" alt=""> </div>
                            <div class="cont">
                                <h6>Emily White</h6> <span>Customer review</span>
                            </div>
                        </div>
                    </div>
                    <div class="item"> <span>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                    </span>
                    <p>Lorem dapibus asue metus the nec feusiate eraten miss hendreri net ve ante the lemon sanleo nectan feugiat erat hendrerit necuis ve ante viventa miss sapien silver on the duiman lorem ipsum amet silver miss rana duru at finibus viverra neca the sene on satien.</p>
                    <div class="info">
                        <div class="author-img"> <img src="{{asset('front-assets/img/team/3.jpg')}}" alt=""> </div>
                        <div class="cont">
                            <h6>Daniel Martin</h6> <span>Customer review</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<!-- First Class Services -->
<div class="first-class-services section-padding pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-head text-center">
                    <div class="section-subtitle">Firs-Class</div>
                    <div class="section-title white">Our Features</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="square-flip">
                    <div class="square bg-img" data-background="{{asset('front-assets/img/barber.jpg')}}">
                        <div class="square-container d-flex align-items-end justify-content-end">
                            <div class="box-title">
                                <h4>Groom's Shave</h4>
                            </div>
                        </div>
                        <div class="flip-overlay"></div>
                    </div>
                    <div class="square2">
                        <div class="square-container2">
                            <h4>Groom's Shave</h4>
                            <p><i>Lorem nisl miss nestibulum nec odio duru the aucan ula orci varius natoque enatau manis dis arturient monte.</i></p> <a href="#0" class="button-2 mt-15">Appointment<span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="square-flip">
                    <div class="square bg-img" data-background="{{asset('front-assets/img/kids.jpg')}}">
                        <div class="square-container d-flex align-items-end justify-content-end">
                            <div class="box-title">
                                <h4>Kids Cuts</h4>
                            </div>
                        </div>
                        <div class="flip-overlay"></div>
                    </div>
                    <div class="square2">
                        <div class="square-container2">
                            <h4>Kids Cuts</h4>
                            <p><i>Lorem nisl miss nestibulum nec odio duru the aucan ula orci varius natoque enatau manis dis arturient monte.</i></p> <a href="#0" class="button-2 mt-15">Appointment<span></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="square-flip">
                    <div class="square bg-img" data-background="{{asset('front-assets/img/team/b3.jpg')}}">
                        <div class="square-container d-flex align-items-end justify-content-end">
                            <div class="box-title">
                                <h4>Creative Barbers</h4>
                            </div>
                        </div>
                        <div class="flip-overlay"></div>
                    </div>
                    <div class="square2">
                        <div class="square-container2">
                            <h4>Creative Barbers</h4>
                            <p><i>Lorem nisl miss nestibulum nec odio duru the aucan ula orci varius natoque enatau manis dis arturient monte.</i></p> <a href="team.html" class="button-2 mt-15">Our Team<span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pricing -->
<section id="pricing" data-scroll-index="3" class="barber-pricing section-padding position-re">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">Pricing Plan</div>
                        <div class="section-title">Barber Pricing</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Normal Hair Cut (Adult)</div>
                            <div class="dots"></div>
                            <div class="price">300</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Haircut (Extra Volume)</div>
                            <div class="dots"></div>
                            <div class="price">500</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Haircut (Infant) - (1-6 months)</div>
                            <div class="dots"></div>
                            <div class="price">200</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Haircut (6 months - 10 years)</div>
                            <div class="dots"></div>
                            <div class="price">250</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Haircut - Babygirl (1-6 years)</div>
                            <div class="dots"></div>
                            <div class="price">500</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Beard Trimming (Normal Razor)</div>
                            <div class="dots"></div>
                            <div class="price">200</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Beard Trimming (Throwaway Razor)</div>
                            <div class="dots"></div>
                            <div class="price">300</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Face Shave (Normal Razor)</div>
                            <div class="dots"></div>
                            <div class="price">150</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Face Shave (Throwaway Razor)</div>
                            <div class="dots"></div>
                            <div class="price">250</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Head Shave (Adult)</div>
                            <div class="dots"></div>
                            <div class="price">200</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Head Shave (New Born) at HMG</div>
                            <div class="dots"></div>
                            <div class="price">1000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Head Shave (New Bor) at Home</div>
                            <div class="dots"></div>
                            <div class="price">2000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Skin Polish (Classic Touch)</div>
                            <div class="dots"></div>
                            <div class="price">400</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Skin Polish (L'Oreal Paris)</div>
                            <div class="dots"></div>
                            <div class="price">1000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Skin Polish (Thr Body Touch)</div>
                            <div class="dots"></div>
                            <div class="price">2000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Face Massage</div>
                            <div class="dots"></div>
                            <div class="price">200</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Head Kneading</div>
                            <div class="dots"></div>
                            <div class="price">200</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Face Steam</div>
                            <div class="dots"></div>
                            <div class="price">200</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Facial (The Face Place)</div>
                            <div class="dots"></div>
                            <div class="price">1000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                
                
                
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Facial (Wokai)</div>
                            <div class="dots"></div>
                            <div class="price">1500</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Facial (Gold)</div>
                            <div class="dots"></div>
                            <div class="price">2000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Facial (Dermacos)</div>
                            <div class="dots"></div>
                            <div class="price">2500</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Facial (Becute/Bremode)</div>
                            <div class="dots"></div>
                            <div class="price">3000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Facial (Johnson's)</div>
                            <div class="dots"></div>
                            <div class="price">4000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Facial (Janssen)</div>
                            <div class="dots"></div>
                            <div class="price">5000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Hair Polish</div>
                            <div class="dots"></div>
                            <div class="price">300</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Hair Polish (Super Quality)</div>
                            <div class="dots"></div>
                            <div class="price">600</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Hair Color (Color Match)</div>
                            <div class="dots"></div>
                            <div class="price">600</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Hair Color (Bremod)</div>
                            <div class="dots"></div>
                            <div class="price">800</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Hair Color (Keune)</div>
                            <div class="dots"></div>
                            <div class="price">1000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Hair Sticks (Without Fashion Shade)</div>
                            <div class="dots"></div>
                            <div class="price">5000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Hairs Rebonding</div>
                            <div class="dots"></div>
                            <div class="price">?</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Hairstyling (With Spray)</div>
                            <div class="dots"></div>
                            <div class="price">200</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Hairstyling (With Fiber)</div>
                            <div class="dots"></div>
                            <div class="price">400</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
                <div class="menu-list mb-30">
                    <div class="item">
                        <div class="flex">
                            <div class="title">Menicure & Pedicure</div>
                            <div class="dots"></div>
                            <div class="price">4000</div>
                        </div>
                        <p><i></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Video -->
<section class="section-padding video-wrapper video bg-img bg-fixed" data-overlay-dark="4" data-background="{{asset('front-assets/img/slider/5.jpg')}}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="section-head text-center">
                    <div class="section-title white">Watch Our Barbershop Promo Video</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a class="vid" href="{{url('https://youtu.be/e2x0UXVU2yg')}}">
                    <div class="vid-butn"> <span class="icon"><i class="ti-control-play"></i></span> </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio -->
<section id="portfolio" data-scroll-index="4" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-head text-center">
                    <div class="section-subtitle">Gallery</div>
                    <div class="section-title">Portfolio</div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- 3 columns -->
            <div class="col-md-4 gallery-item">
                <a href="{{asset('front-assets/img/slider/DSC_6063.jpg')}}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{asset('front-assets/img/slider/DSC_6063.jpg')}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 gallery-item">
                <a href="{{asset('front-assets/img/slider/DSC_6069.jpg')}}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{asset('front-assets/img/slider/DSC_6069.jpg')}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 gallery-item">
                <a href="{{asset('front-assets/img/slider/DSC_6071.jpg')}}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{asset('front-assets/img/slider/DSC_6071.jpg')}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <!-- 2 columns -->
            <div class="col-md-6 gallery-item">
                <a href="{{asset('front-assets/img/slider/16.jpg')}}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{asset('front-assets/img/slider/16.jpg')}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 gallery-item">
                <a href="{{asset('front-assets/img/slider/14.jpg')}}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{asset('front-assets/img/slider/14.jpg')}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <!-- 3 columns -->
            <div class="col-md-4 gallery-item">
                <a href="{{asset('front-assets/img/slider/8.jpg')}}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{asset('front-assets/img/slider/8.jpg')}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 gallery-item">
                <a href="{{asset('front-assets/img/slider/9.jpg')}}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{asset('front-assets/img/slider/9.jpg')}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 gallery-item">
                <a href="{{asset('front-assets/img/slider/10.jpg')}}" title="" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{asset('front-assets/img/slider/10.jpg')}}" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Team -->
<section id="team" data-scroll-index="5" class="team section-padding pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-head text-center">
                    <div class="section-subtitle">Our Barbers</div>
                    <div class="section-title white">Hair Stylists</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="team-card mb-30">
                        <div class="team-img">
                            <img src="{{asset('front-assets/img/team/b1.jpg')}}" alt="" class="w-100">
                        </div>
                        <div class="team-content">
                            <h3 class="team-title">Upcoming<span>Barber</span></h3>
                            <!-- <p class="team-text">Nulla quis efficitur lacus sulvinar suere ausue in eduis euro vesatien arcuman ontese auctor ac aleuam aretra.</p>
                                <div class="social">
                                    <div class="full-width"> <a href="#"><i class="ti-linkedin"></i></a> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-instagram"></i></a> </div>
                                </div>  -->
                                <a href="team-details.html" class="button-1 mt-15">Team Details<span></span></a>
                            </div>
                            <div class="title-box">
                                <h3 class="mb-0">Upcoming<span>Barber</span></h3>
                            </div>
                        </div>
                        <div class="team-card mb-30">
                            <div class="team-img"><img src="{{asset('front-assets/img/team/b2.jpg')}}" alt="" class="w-100"></div>
                            <div class="team-content">
                                <h3 class="team-title">Naqash<span>Stylist</span></h3>
                                <!-- <p class="team-text">Nulla quis efficitur lacus sulvinar suere ausue in eduis euro vesatien arcuman ontese auctor ac aleuam aretra.</p> -->
                                <!-- <div class="social">
                                    <div class="full-width"> <a href="#"><i class="ti-linkedin"></i></a> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-instagram"></i></a> </div>
                                </div>  -->
                                <a href="team-details.html" class="button-1 mt-15">Team Details<span></span></a>
                            </div>
                            <div class="title-box">
                                <h3 class="mb-0">Naqash<span>Stylist</span></h3>
                            </div>
                        </div>
                        <div class="team-card mb-30">
                            <div class="team-img"><img src="{{asset('front-assets/img/team/b3.jpg')}}" alt="" class="w-100"></div>
                            <div class="team-content">
                                <h3 class="team-title">Abeer<span>Barber</span></h3>
                                <!-- <p class="team-text">Nulla quis efficitur lacus sulvinar suere ausue in eduis euro vesatien arcuman ontese auctor ac aleuam aretra.</p>
                                    <div class="social">
                                        <div class="full-width"> <a href="#"><i class="ti-linkedin"></i></a> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-instagram"></i></a> </div>
                                    </div>  -->
                                    <a href="team-details.html" class="button-1 mt-15">Team Details<span></span></a>
                                </div>
                                <div class="title-box">
                                    <h3 class="mb-0">Abeer<span>Barber</span></h3>
                                </div>
                            </div>
                            <!-- <div class="team-card mb-30">
                                <div class="team-img"><img src="img/team/b4.jpg" alt="" class="w-100"></div>
                                <div class="team-content">
                                    <h3 class="team-title">Helen Brown<span>Barber</span></h3>
                                    <p class="team-text">Nulla quis efficitur lacus sulvinar suere ausue in eduis euro vesatien arcuman ontese auctor ac aleuam aretra.</p>
                                    <div class="social">
                                        <div class="full-width"> <a href="#"><i class="ti-linkedin"></i></a> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-instagram"></i></a> </div>
                                    </div> <a href="team-details.html" class="button-1 mt-15">Team Details<span></span></a>
                                </div>
                                <div class="title-box">
                                    <h3 class="mb-0">Helen Brown<span>Barber</span></h3>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services - We Also Offer -->
        <section class="services-1 section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-head text-center">
                            <div class="section-subtitle">Our Services</div>
                            <div class="section-title">We Also Offer</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="item">
                            <a href="services-page.html"> <span class="icon icon-icon-1-1"></span>
                                <h5>Moustache Trim</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan aliquam sit sapien.</p>
                                <div class="shape"> <span class="icon icon-icon-1-1"></span> </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <a href="services-page.html"> <span class="icon icon-icon-1-9"></span>
                                <h5>Face Shave</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan aliquam sit sapien.</p>
                                <div class="shape"> <span class="icon icon-icon-1-9"></span> </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <a href="services-page.html"> <span class="icon icon-icon-1-3"></span>
                                <h5>Beard Trim</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan aliquam sit sapien.</p>
                                <div class="shape"> <span class="icon icon-icon-1-3"></span> </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <a href="services-page.html"> <span class="icon icon-icon-1-2"></span>
                                <h5>Haircut</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan aliquam sit sapien.</p>
                                <div class="shape"> <span class="icon icon-icon-1-2"></span> </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <a href="services-page.html"> <span class="icon icon-icon-1-6"></span>
                                <h5>Clipper Cut</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan aliquam sit sapien.</p>
                                <div class="shape"> <span class="icon icon-icon-1-6"></span> </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <a href="services-page.html"> <span class="icon icon-icon-1-8"></span>
                                <h5>Facial & Massage</h5>
                                <p>Lorem vulputate massa ons amet ravida haretra nuam the drana miss uctus enec accumsan aliquam sit sapien.</p>
                                <div class="shape"> <span class="icon icon-icon-1-8"></span> </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- News -->
        <section id="blog" data-scroll-index="6" class="news section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-head text-center">
                            <div class="section-subtitle">Latest news</div>
                            <div class="section-title white">News & Blog</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            <!-- <div class="item">
                                <div class="position-re o-hidden"> <img src="img/slider/8.jpg" alt="">
                                    <div class="date">
                                        <a href="{{url('/blog')}}"> <span>Dec</span> <i>29</i> </a>
                                    </div>
                                </div>
                                <div class="con"> <span class="category">
                                    <a href="{{url('/blog')}}">Hair Care</a>
                                </span>
                                <h5><a href="{{url('/blog')}}">Women's Hair Care Routine for Any Hair Type</a></h5>
                            </div>
                        </div> -->
                        <div class="item">
                            <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/9.jpg')}}" alt="">
                                <div class="date">
                                    <a href="{{('/blog')}}"> <span>Dec</span> <i>27</i> </a>
                                </div>
                            </div>
                            <div class="con"> <span class="category">
                                <a href="{{url('/blog')}}">Beard</a>
                            </span>
                            <h5><a href="{{url('/blog')}}">Common Mistakes That Damage Your Beard</a></h5>
                        </div>
                    </div>
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/6.jpg')}}" alt="">
                            <div class="date">
                                <a href="{{url('/blog')}}"> <span>Dec</span> <i>25</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                            <a href="{{url('/blog')}}">Hairstyle</a>
                        </span>
                        <h5><a href="{{url('/blog')}}">5 Most Iconic Men’s Hairstyles Of All Times</a></h5>
                    </div>
                </div>
                <div class="item">
                    <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/4.jpg')}}" alt="">
                        <div class="date">
                            <a href="{{url('/blog')}}"> <span>Dec</span> <i>23</i> </a>
                        </div>
                    </div>
                    <div class="con"> <span class="category">
                        <a href="{{url('/blog')}}">Haircut</a>
                    </span>
                    <h5><a href="{{url('/blog')}}">What Are The Secrets of The Haircut & Moustache Trim?</a></h5>
                </div>
            </div>
            <div class="item">
                <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/16.jpg')}}" alt="">
                    <div class="date">
                        <a href="{{url('/blog')}}"> <span>Dec</span> <i>22</i> </a>
                    </div>
                </div>
                <div class="con"> <span class="category">
                    <a href="{{url('/blog')}}">Wedding</a>
                </span>
                <h5><a href="{{url('/blog')}}">Best Tips for Groom Shaving for Your Wedding</a></h5>
            </div>
        </div>
        <div class="item">
            <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/19.jpg')}}" alt="">
                <div class="date">
                    <a href="{{url('/blog')}}"> <span>Dec</span> <i>20</i> </a>
                </div>
            </div>
            <div class="con"> <span class="category">
                <a href="{{url('/blog')}}">Blog</a>
            </span>
            <h5><a href="{{url('/blog')}}">What We Need to Choose The Fashion Model?</a></h5>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
<!-- Appointment Form -->
<section id="contact" data-scroll-index="7" class="testimonials">
    <div class="background bg-img bg-fixed section-padding pb-0" data-background="{{asset('front-assets/img/slider/20.jpg')}}" data-overlay-dark="6">
        <div class="container">
            <div class="row">
                <!-- Appointment call -->
                <div class="col-md-5 mb-30 mt-60">
                    <p class="mb-0"><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i></p>
                    <h5>We Are Best Barbers & Hair Cutting Salon at Sargodha.</h5>
                    <div class="reservations mb-10">
                        <div class="icon color-1"><span class="icon-icon-1-1"></span></div>
                        <div class="text">
                            <p class="color-1">Appointment</p> <a class="color-1" href="tel:+923141455003">+923141455003</a>
                        </div>
                    </div>
                </div>
                <!-- Appointment form -->
                <div class="col-md-5 offset-md-2">
                    <div class="booking-box">
                        <div class="head-box text-center">
                            <h4>Make An Appointment</h4>
                        </div>
                        <div class="booking-inner clearfix">
                            <form class="form1 clearfix">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input1_wrapper">
                                            <label>Name</label>
                                            <div class="input2_inner">
                                                <input type="text" class="form-control input" placeholder="Name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input1_wrapper">
                                            <label>Phone</label>
                                            <div class="input2_inner">
                                                <input type="text" class="form-control input" placeholder="Phone" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input1_wrapper">
                                            <label>Date</label>
                                            <div class="input1_inner">
                                                <input type="text" class="form-control input datepicker" placeholder="Date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select1_wrapper">
                                            <label>Time</label>
                                            <div class="select1_inner">
                                                <select class="select2 select" style="width: 100%">
                                                    <option value="0">Time</option>
                                                    <option value="1">10:00 am</option>
                                                    <option value="2">11:00 am</option>
                                                    <option value="3">12:00 pm</option>
                                                    <option value="4">14:00 pm</option>
                                                    <option value="5">16:00 pm</option>
                                                    <option value="6">18:00 pm</option>
                                                    <option value="7">20:00 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select1_wrapper">
                                            <label>Services</label>
                                            <div class="select1_inner">
                                                <select class="select2 select" style="width: 100%">
                                                    <option value="0">Services</option>
                                                    <option value="0">Hair Styling</option>
                                                    <option value="1">Face Mask</option>
                                                    <option value="2">Shaving</option>
                                                    <option value="3">Beard Triming</option>
                                                    <option value="4">Hair Wash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select1_wrapper">
                                            <label>Choose Barber</label>
                                            <div class="select1_inner">
                                                <select class="select2 select" style="width: 100%">
                                                    <option value="0">Choose Barber</option>
                                                    <option value="0">Philip</option>
                                                    <option value="1">Stephen</option>
                                                    <option value="2">Dennis</option>
                                                    <option value="3">Helen</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn-form1-submit mt-15">Make Appointment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Clients -->
<section class="clients">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="owl-carousel owl-theme">
                    <div class="clients-logo">
                        <a href="#0"><img src="{{asset('front-assets/img/clients/2.png')}}" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="{{asset('front-assets/img/clients/3.png')}}" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="{{asset('front-assets/img/clients/4.png')}}" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="{{asset('front-assets/img/clients/5.png')}}" alt=""></a>
                    </div>
                    <div class="clients-logo">
                        <a href="#0"><img src="{{asset('front-assets/img/clients/6.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Location for the HMG Sargodha -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="p-3">
                        <h3>HMG Sargodha Branch</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3380.880075002096!2d72.70548787479503!3d32.07249221965824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3921774e02261deb%3A0x3e8d1290e7aad25c!2sHMG%20by%20Salman!5e0!3m2!1sen!2s!4v1711211264365!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat similar structure for other branches -->
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="p-3">
                        <h3>HMG Gujrat Branch</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4854.107661173001!2d74.07413183050177!3d32.57768555952508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391f1b0039cd0cc3%3A0xd619637655d71154!2sHMEN!5e0!3m2!1sen!2s!4v1711224289458!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat similar structure for other branches -->
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="p-3">
                        <h3>HMG Bahawalpur Branch</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3476.4473447158443!2d71.66032787552871!3d29.38646697526158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjnCsDIzJzExLjMiTiA3McKwMzknNDYuNSJF!5e0!3m2!1sen!2s!4v1711224564840!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Repeat similar structure for other branches -->
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-column footer-contact">
                        <h3 class="footer-title">Contact</h3>
                        <p class="footer-contact-text">Shop No.2, Abdullah Centre X-Block, New, Satellite Town
                            <br>Sargodha, Pakistan
                        </p>
                        <div class="footer-contact-info">
                            <p class="footer-contact-phone">314 145 5003</p>
                            <a class="footer-contact-mail" href="mailto:info@hmgbysalman.com">info@hmgbysalman.com</a>
                        </div>
                        <div class="footer-about-social-list"> 
                            <a href="{{url('https://instagram.com/h_mengrooming1')}}"><i class="fab fa-instagram-square"></i></a>
                            <a href="{{url('https://twitter.com/hmengrooming')}}"><i class="fab fa-twitter"></i></a> 
                            <a href="{{url('https://www.tiktok.com/@hmengrooming')}}"><i class="fab fa-tiktok"></i></a> 
                            <a href="{{url('https://www.facebook.com/profile.php?id=61551901886051&mibextid=ZbWKwL')}}"><i class="fab fa-facebook"></i></a>
                            <a href="{{url('https://www.snapchat.com/add/hmg23889?share_id=KoToCXtAhOA&locale=en-PK')}}"><i class="fab fa-snapchat-square"></i></a>
                            <a href="{{url('https://wa.me/+923141455003')}}" target="_blank"><i >Whatsapp me</i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="item opening">
                        <h3 class="footer-title">Work Time</h3>
                        <ul>
                            <li>
                                <div class="tit">Monday</div>
                                <div class="dots"></div> <span>10:00 - 22:00</span>
                            </li>
                            <li>
                                <div class="tit">Tuesday</div>
                                <div class="dots"></div> <span>10:00 - 22:00</span>
                            </li>
                            <li>
                                <div class="tit">Thursday</div>
                                <div class="dots"></div> <span>10:00 - 23:00</span>
                            </li>
                            <li>
                                <div class="tit">Friday</div>
                                <div class="dots"></div> <span>10:00 - 23:00</span>
                            </li>
                            <li>
                                <div class="tit">Saturday</div>
                                <div class="dots"></div> <span>10:00 - 23:00</span>
                            </li>
                            <li>
                                <div class="tit">Weekend</div>
                                <div class="dots"></div> <span>10:00 - 22:00</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 offset-md-1">
                    <div class="footer-column footer-explore clearfix">
                        <h3 class="footer-title">Subscribe</h3>
                        <div class="row subscribe">
                            <div class="col-md-12">
                                <p>Subscribe to take advantage of our campaigns and gift certificates.</p>
                                <form>
                                    <input type="text" name="search" placeholder="Your email" required>
                                    <button>Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection