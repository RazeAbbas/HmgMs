@extends('front-website.layout')
@section('content')

    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="img/slider/3.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>About Me</h5>
                    <h1>Aman Gill</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Details -->
    <section class="team-box section-padding pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30"> <img src="img/team/team-detail.jpg" class="img-fluid mb-30" alt="">
                    <div class="section-head mb-20">
                        <div class="section-subtitle">About Me</div>
                        <div class="section-title mb-15">Aman Gill</div>
                        <p>Barber utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan justo aliquam sit amet auctor orci done vitae risus duise nisan sapien silver on the accumsan id mauris apien. Brown haretra nuam enim mi obortis eset uctus enec accumsan alisuame amet auctor orci vitae vehicula risus duise nun sapien.</p>
                        <ul class="about-list list-unstyled mb-30">
                            <li>
                                <div class="about-list-icon"> <span class="ti-check"></span> </div>
                                <div class="about-list-text">
                                    <p>I'm a professional and certified barber.</p>
                                </div>
                            </li>
                            <li>
                                <div class="about-list-icon"> <span class="ti-check"></span> </div>
                                <div class="about-list-text">
                                    <p>I care about the satisfaction of my customers.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav nav-tabs simpl-bord mt-60" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation"> <span class="nav-link active cursor-pointer" id="vision-tab" data-bs-toggle="tab" data-bs-target="#biography">Biography</span> </li>
                        <li class="nav-item" role="presentation"> <span class="nav-link cursor-pointer" id="mission-tab" data-bs-toggle="tab" data-bs-target="#education">Education</span> </li>
                        <li class="nav-item" role="presentation"> <span class="nav-link cursor-pointer" id="mission-tab" data-bs-toggle="tab" data-bs-target="#awards">Awards</span> </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="biography" role="tabpanel" aria-labelledby="vision-tab">
                            <p>Biography utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan justo aliquam sit amet auctor orci done vitae risus duise nisan sapien silver on the accumsan id mauris apien.</p>
                            <p>Brown haretra nuam enim mi obortis eset uctus enec accumsan alisuame amet auctor orci vitae vehicula risus duise nun sapien.</p>
                        </div>
                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="mission-tab">
                            <p>Education utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan justo aliquam sit amet auctor orci done vitae risus duise nisan sapien silver on the accumsan id mauris apien.</p>
                            <p>Brown haretra nuam enim mi obortis eset uctus enec accumsan alisuame amet auctor orci vitae vehicula risus duise nun sapien.</p>
                        </div>
                        <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="mission-tab">
                            <p>Awards utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan justo aliquam sit amet auctor orci done vitae risus duise nisan sapien silver on the accumsan id mauris apien.</p>
                            <p>Brown haretra nuam enim mi obortis eset uctus enec accumsan alisuame amet auctor orci vitae vehicula risus duise nun sapien.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="wrap">
                        <div class="desc">
                            <div class="section-title mb-15">Contact Me</div>
                            <p>Barber utate ons amet ravida haretra nuam the duru miss uctus the drana accumsan aliquam auctor orci vitae risus in the duise nisan sapien.</p>
                        </div>
                        <div class="cont">
                            <div class="coll">
                                <h6>Email Us Directly</h6>
                            </div>
                            <div class="coll">
                                <h5>philip@barber.com</h5>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="coll">
                                <h6>Call Us Directly</h6>
                            </div>
                            <div class="coll">
                                <h5>314 145 5003</h5>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="coll">
                                <div class="social-icon"> <a href="index.html"><i class="ti-facebook"></i></a> <a href="index.html"><i class="ti-twitter"></i></a> <a href="index.html"><i class="ti-instagram"></i></a> <a href="index.html"><i class="ti-pinterest"></i></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Image Gallery -->
    <section class="section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-0">Our Works</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 gallery-item">
                    <a href="img/slider/3.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="img/slider/3.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 gallery-item">
                    <a href="img/slider/4.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="img/slider/4.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 gallery-item">
                    <a href="img/slider/5.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="img/slider/5.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 gallery-item">
                    <a href="img/slider/14.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="img/slider/14.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
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
                                <a class="footer-contact-mail" href="mailto:hmengrooming@gmail.com">info@hmengrooming.com</a>
                            </div>
                            <div class="footer-about-social-list"> 
                                <a href="https://instagram.com/h_mengrooming1"><i class="fab fa-instagram-square"></i></a>
                                <a href="https://twitter.com/hmengrooming"><i class="fab fa-twitter"></i></a> 
                                <a href="https://www.tiktok.com/@hmengrooming"><i class="fab fa-tiktok"></i></a> 
                                <a href="https://www.facebook.com/profile.php?id=61551901886051&mibextid=ZbWKwL"><i class="fab fa-facebook"></i></a>
                                 <a href="https://www.snapchat.com/add/hmg23889?share_id=KoToCXtAhOA&locale=en-PK"><i class="fab fa-snapchat-square"></i></a>
                                  <a href="https://wa.me/+923141455003" target="_blank"><i >Whatsapp me</i></a>
                                  </div>
                        </div>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <div class="item opening">
                            <h3 class="footer-title">Work Time</h3>
                            <ul>
                                <li>
                                    <div class="tit">Monday</div>
                                    <div class="dots"></div> <span>10:00 - 21:00</span>
                                </li>
                                <li>
                                    <div class="tit">Tuesday</div>
                                    <div class="dots"></div> <span>10:00 - 21:00</span>
                                </li>
                                <li>
                                    <div class="tit">Thursday</div>
                                    <div class="dots"></div> <span>10:00 - 21:00</span>
                                </li>
                                <li>
                                    <div class="tit">Friday</div>
                                    <div class="dots"></div> <span>10:00 - 22:00</span>
                                </li>
                                <li>
                                    <div class="tit">Saturday</div>
                                    <div class="dots"></div> <span>10:00 - 22:00</span>
                                </li>
                                <li>
                                    <div class="tit">Weekend</div>
                                    <div class="dots"></div> <span>10:00 - 23:00</span>
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