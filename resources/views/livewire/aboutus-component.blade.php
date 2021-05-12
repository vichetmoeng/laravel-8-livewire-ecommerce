<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>About Us</span></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="our-team-info">
            <h4 class="title-box">Our Instructor</h4>
            <div class="our-staff">
                <div>
                    <div class="team-member equal-elem" style="text-align: center;">
                        <div class="media">
                            <figure><img src="{{ asset('assets/images/chimbunthoeurn.jpg')}}" style="width: 350px ; height: 350px;" alt="CHIM_BUNTHOEURN"></figure>
                        </div>
                        <div class="info">
                            <b class="name">CHIM BUNTHOEURN</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="our-team-info">
            <h4 class="title-box">Our teams</h4>
            <div class="our-staff">
                <div
                    class="slide-carousel owl-carousel style-nav-1 equal-container"
                    data-items="5"
                    data-loop="false"
                    data-nav="true"
                    data-dots="false"
                    data-margin="30"
                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"4"},"100":{"items":"5"}}' >

                    <div class="team-member equal-elem">
                        <div class="media">
                            <a href="#" title="LEONA">
                                <figure><img src="{{ asset('assets/images/moeng-vichet.png')}}" style="width: 300px ; height: 350px;" alt="LEONA"></figure>
                            </a>
                        </div>
                        <div class="info">
                            <b class="name">MOENG VICHET</b>
                        </div>
                    </div>

                    <div class="team-member equal-elem">
                        <div class="media">
                            <figure><img src="{{ asset('assets/images/lengchhinghor.jpg')}}" style="width: 300px ; height: 350px;" alt="LENG_CHHINGHOR"></figure>
                        </div>
                        <div class="info">
                            <b class="name">LENG CHHINGHOR</b>
                        </div>
                    </div>

                    <div class="team-member equal-elem">
                        <div class="media">
                            <figure><img src="{{ asset('assets/images/pengchhaihuo.jpg')}}" style="width: 300px ; height: 350px;" alt="PENG_CHAIHUO"></figure>
                        </div>
                        <div class="info">
                            <b class="name">PENG CHAIHUO</b>
                        </div>
                    </div>

                    <div class="team-member equal-elem">
                        <div class="media">
                            <figure><img src="{{ asset('assets/images/tangseakly.jpg')}}" style="width: 300px ; height: 350px;" alt="TANG_SEAKLY"></figure>
                        </div>
                        <div class="info">
                            <b class="name">TANG SEAKLY</b>
                        </div>
                    </div>

                    <div class="team-member equal-elem">
                        <div class="media">
                            <figure><img src="{{ asset('assets/images/somrithsokhoun.jpg')}}" style="width: 300px ; height: 350px;" alt="SOMRITH_SOKHOUN"></figure>
                        </div>
                        <div class="info">
                            <b class="name">SOMRITH SOKHOUN</b>
                        </div>
                    </div>

                    <div class="team-member equal-elem">
                        <div class="media">
                            <figure><img src="{{ asset('assets/images/sornpathlavy.jpg')}}" style="width: 300px ; height: 350px;" alt="SORN_PATHLAVY"></figure>
                        </div>
                        <div class="info">
                            <b class="name">SORN PATHLAVY</b>
                        </div>
                    </div>

                    <div class="team-member equal-elem">
                        <div class="media">
                            <figure><img src="{{ asset('assets/images/omvannak.jpg')}}" style="width: 300px ; height: 350px;" alt="OM_VANNAK"></figure>
                        </div>
                        <div class="info">
                            <b class="name">OM VANNAK</b>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="aboutus-info style-center">
            <b class="box-title">Interesting Facts</b>
            <p class="txt-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text ever since the 1500s, when an unknown printer took a galley of type</p>
        </div>

        <div class="row equal-container">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="aboutus-box-score equal-elem ">
                    <b class="box-score-title">{{ $itemsInStore }}</b>
                    <span class="sub-title">Items in Store</span>
                    <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text ever since the 1500s...</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="aboutus-box-score equal-elem ">
                    <b class="box-score-title">99%</b>
                    <span class="sub-title">Our Customers comeback</span>
                    <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text ever since the 1500s...</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="aboutus-box-score equal-elem ">
                    <b class="box-score-title">{{ $countUsers }}</b>
                    <span class="sub-title">User of the site</span>
                    <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text ever since the 1500s...</p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="aboutus-info style-small-left">
                    <b class="box-title">What we really do?</b>
                    <p class="txt-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                </div>
                <div class="aboutus-info style-small-left">
                    <b class="box-title">History of the Company</b>
                    <p class="txt-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="aboutus-info style-small-left">
                    <b class="box-title">Our Vision</b>
                    <p class="txt-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                </div>
                <div class="aboutus-info style-small-left">
                    <b class="box-title">Cooperate with Us!</b>
                    <p class="txt-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="aboutus-info style-small-left">
                    <b class="box-title">Cooperate with Us!</b>
                    <div class="list-showups">
                        <label>
                            <input type="radio" class="hidden" name="showup" id="shoup1" value="shoup1" checked="checked">
                            <span class="check-box"></span>
                            <span class='function-name'>Support 24/7</span>
                            <span class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</span>
                        </label>
                        <label>
                            <input type="radio" class="hidden" name="showup" id="shoup2" value="shoup2">
                            <span class="check-box"></span>
                            <span class='function-name'>Best Quanlity</span>
                            <span class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</span>
                        </label>
                        <label>
                            <input type="radio" class="hidden" name="showup" id="shoup3" value="shoup3">
                            <span class="check-box"></span>
                            <span class='function-name'>Fastest Delivery</span>
                            <span class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</span>
                        </label>
                        <label>
                            <input type="radio" class="hidden" name="showup" id="shoup4" value="shoup4">
                            <span class="check-box"></span>
                            <span class='function-name'>Customer Care</span>
                            <span class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- </div> -->


    </div><!--end container-->

</main>
