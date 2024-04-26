@extends('front-website.layout')
@section('content')

    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="6" data-background="img/slider/8.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center caption mt-60">
                    <h2>Women's Hair Care Routine for Any Hair Type</h2>
                    <div class="post">
                        <div class="author"> <img src="img/team/3.jpg" alt="" class="avatar"> <span>Andreas Brown</span> </div>
                        <div class="date-comment"> <i class="ti-calendar"></i> 29 Dec 2023 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <img src="img/slider/8.jpg" class="mb-30" alt="">
                    <h3>Women's Hair Care Routine for Any Hair Type</h3>
                    <p>Quisque pretium fermentum quam, sit amet cursus ante sollicitudin vel. Morbi consequat risus consequat, porttitor orci sit amet, iaculis nisl. Integer quis sapien neceli ultrices euismod sit amet id lacus. Sed a imperdiet erat. Duis eu est dignissim lacus dictum hendrerit quis vitae mi. Fusce eu nulla ac nisi cursus tincidun. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer tristique sem eget leo faucibus porttitor.</p>
                    <p>Nulla vitae metus tincidunt, varius nunc quis, porta nulla. Pellentesque vel dui nec libero auctor pretium id sed arcu. Nunc consequat diam id nisl blani dinisim. Etiam commodo diam dolor, at scelerisque sem finibus sit amet. Curabitur id lectus eget purus finibus laoreet.</p>
                    <blockquote>
                        <p>Nulla facilisi. Sedeuter nunc vouta miss mollis sapien vel, conseyer tureution yer vintane in libero semper. Quisque ravida eros ut turpis interdum ornare. Inter miss they adama seder a imerdie fames ac ante ipsum primis in faucibus.</p> <cite>Ropert Martin</cite>
                    </blockquote>
                    <div class="row">
                        <div class="col-md-6"> <img src="img/news/post1.jpg" class="mb-30" alt=""> </div>
                        <div class="col-md-6"> <img src="img/news/post2.jpg" class="mb-30" alt=""> </div>
                    </div>
                    <p>Design pretium fermentum quam, sit amet cursus ante sollicitudin vel. Morbi consequat risus consequat, porttitor orci sit amet, iaculis nisl. Integer quis sapien neceli ultrices euismod sit amet id lacus. Sed a imperdiet erat. Duis eu est dignissim lacus dictum hendrerit quis vitae mi. Fusce eu nulla ac nisi cursus tincidun. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer tristique sem eget leo faucibus porttitor.</p>
                </div>
            </div>
            <div class="post-comment-section">
                <div class="row">
                    <!-- Comment -->
                    <div class="col-md-6">
                        <div class="news-post-comment-wrap">
                            <div class="post-user-comment"> <img src="img/team/5.jpg" alt=""> </div>
                            <div class="post-user-content">
                                <h3>Emma Emily<span> 30 Dec 2022</span></h3>
                                <p>Lorem ultricies nibh non dolor maximus sceleue inte molliser rana neque nec tempor. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p> <a class="post-repay" href="#">Reply<i class="ti-back-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Form -->
                    <div class="col-md-5 offset-md-1 mb-30">
                        <h3 class="mb-30">Leave a Reply</h3>
                        <form method="post" class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" placeholder="Name *" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" placeholder="E-mail *" required="">
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" id="message" cols="40" rows="4" placeholder="Comment *" required=""></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="button-4"><a href="#0"><span>Send Comment</span></a></button>
                            </div>
                        </form>
                    </div>
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