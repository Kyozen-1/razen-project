<footer id="footer" class="footer-1">
    <!-- Contact Bar
    ============================================= -->
    <div class="container footer-widgtes">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="widgets-contact">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 widget">
                            <div class="widget-contact-icon pull-left">
                                <i class="lnr lnr-map"></i>
                            </div>
                            <div class="widget-contact-info">
                                <p class="text-capitalize text-white">kunjungi kami</p>
                                <p class="text-capitalize font-heading">{{$profil->alamat}}</p>
                            </div>
                        </div>
                        <!-- .widget end -->
                        <div class="col-xs-12 col-sm-12 col-md-4 widget">
                            <div class="widget-contact-icon pull-left">
                                <i class="lnr lnr-envelope"></i>
                            </div>
                            <div class="widget-contact-info">
                                <p class="text-capitalize text-white">email kami</p>
                                <p class="text-capitalize font-heading">{{$profil->email}}</p>
                            </div>
                        </div>
                        <!-- .widget end -->
                        <div class="col-xs-12 col-sm-12 col-md-4 widget">
                            <div class="widget-contact-icon pull-left">
                                <i class="lnr lnr-phone"></i>
                            </div>
                            <div class="widget-contact-info">
                                <p class="text-capitalize text-white">telpon kami</p>
                                <p class="text-capitalize font-heading">{{$profil->no_hp}}</p>
                            </div>
                        </div>
                        <!-- .widget end -->
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .widget-contact end -->
            </div>
            <!-- .col-md-12 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->

    <!-- Widget Section
    ============================================= -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 widgets-links">
                <div class="col-xs-12 col-sm-12 col-md-4 widget-about text-center-xs mb-30-xs">
                    <div class="widget-about-logo pull-left pull-none-xs">
                        <img src="{{ asset('razen-project/assets/images/footer-logo.png') }}" alt="logo"/>
                    </div>
                    <div class="widget-about-info">
                        <h5 class="text-capitalize text-white">Razen Project</h5>
                        <p class="mb-0">Razen Project is a leading of A-grade commercial, industrial and residential projects in USA. Since its foundation the company has doubled its turnover year on year, with its staff numbers swelling accordingly.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 widget-navigation text-center-xs mb-30-xs">
                    <h5 class="text-capitalize text-white">navigation</h5>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <ul class="list-unstyled text-capitalize">
                                <li>
                                    <a href="#"> about us</a>
                                </li>
                                <li>
                                    <a href="#"> careers</a>
                                </li>
                                <li>
                                    <a href="#"> pricing plans</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <ul class="list-unstyled text-capitalize">
                                <li>
                                    <a href="#"> team</a>
                                </li>
                                <li>
                                    <a href="#"> projects</a>
                                </li>
                                <li>
                                    <a href="#"> FAQs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-5 widget-services text-center-xs">
                    <h5 class="text-capitalize text-white">services</h5>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <ul class="list-unstyled text-capitalize">
                                <li>
                                    <a href="#"> design &amp; build</a>
                                </li>
                                <li>
                                    <a href="#"> tiling &amp; painting</a>
                                </li>
                                <li>
                                    <a href="#"> revonations</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <ul class="list-unstyled text-capitalize">
                                <li>
                                    <a href="#"> management</a>
                                </li>
                                <li>
                                    <a href="#"> wood flooring</a>
                                </li>
                                <li>
                                    <a href="#"> work consulting</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <ul class="list-unstyled text-capitalize">
                                <li>
                                    <a href="#"> wood flooring</a>
                                </li>
                                <li>
                                    <a href="#"> green building</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Social bar
    ============================================= -->
    <div class="widget-social">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 mb-30-xs mb-30-sm">
                    <div class="widget-social-info pull-left text-capitalize pull-none-xs mb-15-xs">
                        <p class="mb-0">follow us<br>
                            on social networks</p>
                    </div>
                    <div class="widget-social-icon pull-right text-right pull-none-xs">
                        <a href="#">
                            <i class="fa fa-facebook"></i><i class="fa fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-instagram"></i><i class="fa fa-instagram"></i>
                        </a>
                        <a href="#" >
                            <i class="fa fa-youtube"></i><i class="fa fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="widget-newsletter-info pull-left text-capitalize pull-none-xs mb-15-xs">
                        <p class="mb-0">subsribe<br>
                            on our newsletter</p>
                    </div>
                    <div class="widget-newsletter-form pull-right text-right">

                        <!-- Mailchimp Form
                        =============================================-->
                        <form class="mailchimp">
                            <div class="subscribe-alert">
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type Your Email Account">
                                <span class="input-group-btn">
                                <button class="btn text-capitalize" type="button">join</button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </form>
                        <!--Mailchimp Form End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyrights
    ============================================= -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 copyrights text-center">
                <p class="text-capitalize">© 2022 PT Razen Teknologi Indonesia</p>
            </div>
        </div>
    </div>
</footer>
