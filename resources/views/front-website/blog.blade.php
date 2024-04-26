@extends('front-website.layout')
@section('content')

    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{asset('front-assets/img/slider/9.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Our Blog</h5>
                    <h1>Latest News</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- News  -->
    <section class="blog section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/8.jpg')}}" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>29</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="blog.html">Hair Care</a>
                            </span>
                            <h5><a href="post.html">Women's Hair Care Routine for Any Hair Type</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/9.jpg')}}" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>27</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="blog.html">Beard</a>
                            </span>
                            <h5><a href="post.html">Common Mistakes That Damage Your Beard</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/6.jpg')}}" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>25</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="blog.html">Hairstyle</a>
                            </span>
                            <h5><a href="post.html">5 Most Iconic Men’s Hairstyles Of All Times</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/4.jpg')}}" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>23</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="blog.html">Haircut</a>
                            </span>
                            <h5><a href="post.html">What Are The Secrets of The Haircut & Moustache Trim?</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/16.jpg')}}" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>22</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category"><a href="blog.html">Wedding</a></span>
                            <h5><a href="post.html">Best Tips for Groom Shaving for Your Wedding</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="{{asset('front-assets/img/slider/19.jpg')}}" alt="">
                            <div class="date">
                                <a href="post.html"> <span>Dec</span> <i>20</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="blog.html">Model</a>
                            </span>
                            <h5><a href="post.html">What We Need to Choose The Fashion Model?</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- Pagination -->
                    <ul class="news-pagination-wrap align-center mb-30 mt-30">
                        <li><a href="blog.html#"><i class="ti-angle-left"></i></a></li>
                        <li><a href="blog.html#">1</a></li>
                        <li><a href="blog.html#" class="active">2</a></li>
                        <li><a href="blog.html#">3</a></li>
                        <li><a href="blog.html#"><i class="ti-angle-right"></i></a></li>
                    </ul>
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
                                <a href="{{url('https://instagram.com/h_mengrooming1')}}"><i class="fab fa-instagram-square"></i></a>
                                <a href="{{url('https://twitter.com/hmengrooming')}}"><i class="fab fa-twitter"></i></a> 
                                <a href="{{url('https://www.tiktok.com/@hmengrooming')}}"><i class="fab fa-tiktok"></i></a> 
                                <a href="{{url('https://www.facebook.com/profile.php?id=61551901886051&mibextid=ZbWKwL')}}"><i class="fab fa-facebook"></i></a>
                                 <a href="{{url('https://www.snapchat.com/add/hmg23889?share_id=KoToCXtAhOA&locale=en-PK')}}"><i class="fab fa-snapchat-square"></i></a>
                                  <a href="{{url('https://wa.me/+923141455003" target="_blank')}}"><i >Whatsapp me</i></a>
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