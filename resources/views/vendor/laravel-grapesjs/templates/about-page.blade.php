@extends('layouts.web.page-editor')
@section('content')
    <div class="main-container"><!-- Main-container section -->
        <div class="about-us"> <!--  About section -->
            <div class="container">
                <div class="about-blk"><!-- about-blk start -->
                    <div class="row ">
                        <div class="col-md-offset-2 col-md-8">
                            <div class="title">
                                <h1>Our vision is help child</h1>
                                <p class="lead-font">Vivamus sollicitudin massa non liber blandit sem condimentum
                                    celerisque massa necere tortor.</p>
                            </div>
                            <div class="pic"><a href=""><img src="{{asset('assets/images/ab_pic-1.jpg')}}"
                                                             class="img-responsive" alt=""></a></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="blk">
                                <h2>Who We Are</h2>
                                <p>Vivamus sollicitudin massa non libero egestas, eget blandit sem condimentum. Nulla
                                    scelerisque massa nec tellus condimentum sodales. </p>
                                <p>Nullam sapien eros, porta non rhoncus ac, aliquet at tortor. Integer non libero id
                                    tellus pretium fermentuest vitae ullamcorper.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="blk">
                                <h2>Our History</h2>
                                <p>Morbi fermentum sapien sed porta pretium. Etiam at pharetra tellus. Donec mattis nibh
                                    vel lorem gravida consectetur. </p>
                                <p>Sed ullamcorper enim vitae erat fermentum sagittis. Mauris in lorem mauris. Nunc
                                    placerat mauris in venenatis viverra. </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="blk">
                                <h2>Philosophy</h2>
                                <p>Suspendisse aliquam ullamcorper nisl, at congue risus commodo eu. Phasellus ac
                                    pulvinar erat, vel pulvinar lorem.</p>
                                <p>Maecenas scelerisque setis quam sed metus posuere, rper nisl placerat. Donec nisl
                                    quam, varius non sem consequat, venenatis eleifend nunc.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- about-blk close -->
            </div>
            <div class=" core-blk"><!-- about-blk start -->
                <div class="container ">
                    <div class="row title">
                        <div class="col-md-offset-2 col-md-8">
                            <h1>Our Core Values</h1>
                            <p class="lead-font">Vivamus sollicitudin massa non liber blandit sem condimentum celerisque
                                massa necere tortor.</p>
                        </div>
                    </div>
                    <div class="row margin-space">
                        <div class="col-md-4">
                            <div class="">
                                <i class="pe pe-li-help pe-4x pe-icon"></i>
                                <h2>Heading title</h2>
                                <p>Vivamus sollicitudin massa non libero egestas, eget blandit sem condimentum. Nulla
                                    scelerisque massa nec tellus condimentum sodales. </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <i class="pe pe-li-book pe-4x pe-icon"></i>
                                <h2>Heading title</h2>
                                <p>Sed ullamcorper enim vitae erat fermentum sagittis. Mauris in lorem mauris. Nunc
                                    placerat mauris in venenatis viverra. </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <i class="pe pe-li-love pe-4x pe-icon"></i>
                                <h2>Heading title</h2>
                                <p>Maecenas scelerisque setis quam sed metus posuere, rper nisl placerat. Donec nisl
                                    quam, varius non sem consequat, venenatis eleifend nunc.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- about-blk close -->
                <hr>
            </div>

            <div class="container margin-space"><!-- Team start -->
                <div class="row title">
                    <div class="col-md-offset-2 col-md-8">
                        <h1>Meet the Virtue Team</h1>
                        <p class="lead-font">Nullam sapien eros porta non rhoncus ac aliquet at tortor nteger nonlibero
                            idst simple dummy vitae ullamcorper.</p>
                    </div>
                </div>
                <div class="row blk">
                    <div class="col-md-2 team-profile">
                        <div class="pic">
                            <img src="{{asset('assets/images/a_pic-1.jpg')}}" class="img-responsive destaurate" alt="">
                        </div>
                        <h4><a>Bradley Grosh</a></h4>
                        <span class="positions">Executive Director</span>
                        <div class="yellow-line"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscin elit .</p>
                    </div>
                    <div class="col-md-2 team-profile">
                        <div class="pic">
                            <img src="{{asset('assets/images/a_pic-2.jpg')}}" class="img-responsive destaurate" alt="">
                        </div>
                        <h4><a>April Smith</a></h4>
                        <span class="positions">Technical Director</span>
                        <div class="yellow-line"></div>
                        <p>Duis pretium est in ipsum euismod mollis am accumsan .</p>
                    </div>
                    <div class="col-md-2 team-profile">
                        <div class="pic">
                            <img src="{{asset('assets/images/a_pic-3.jpg')}}" class="img-responsive destaurate" alt="">
                        </div>
                        <h4><a>Sara Conor</a></h4>
                        <span class="positions">Program Officer</span>
                        <div class="yellow-line"></div>
                        <p>Maecenas bibendum fermentum tortorin tempus sapien auctor .</p>
                    </div>
                    <div class="col-md-2 team-profile">
                        <div class="pic">
                            <img src="{{asset('assets/images/a_pic-4.jpg')}}" class="img-responsive destaurate" alt="">
                        </div>
                        <h4><a>John Nelson</a></h4>
                        <span class="positions">Director of Development </span>
                        <div class="yellow-line"></div>
                        <p>Vestibulum velit purus, dignissim nec ante blandit.</p>
                    </div>
                    <div class="col-md-2 team-profile">
                        <div class="pic">
                            <img src="{{asset('assets/images/a_pic-5.jpg')}}" class="img-responsive destaurate" alt="">
                        </div>
                        <h4><a>Sam Kromstain</a></h4>
                        <span class="positions">Director of Development </span>
                        <div class="yellow-line"></div>
                        <p>Vestibulum velit purus, dignissim nec ante blandit.</p>
                    </div>
                    <div class="col-md-2 team-profile">
                        <div class="pic">
                            <img src="{{asset('assets/images/a_pic-6.jpg')}}" class="img-responsive destaurate" alt="">
                        </div>
                        <h4><a>Bradley Grosh</a></h4>
                        <span class="positions">Director of Development </span>
                        <div class="yellow-line"></div>
                        <p>Vestibulum velit purus, dignissim nec ante blandit.</p>
                    </div>
                </div>
            </div><!-- Team close -->
        </div>  <!-- about close -->
    </div><!-- Main-container end -->
@endsection