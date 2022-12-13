@extends('layouts.web.page-editor')
@section('content')
    <!-- banner start -->

    <div class="banner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active"><img src="{{asset('assets/images/bnr-2.jpg')}}" alt="Charity template">
                    <div class="carousel-caption col-md-3"><!--banner caption start-->
                        <h1>Save the <br>
                            Children<br>
                            invests in <br>
                            childhood </h1>
                        <p>Many desktop publishing packages <br>
                            and web page editors now <br>
                            use Lorem Ipsum as uncover . </p>
                        <a href="#" class="btn btn-default btn-yellow">Donate vie paypal</a> <a href="#"
                                                                                                class="btn btn-default btn-yellow">Learn
                            more</a></div>
                </div>
            </div>
        </div>
        <!-- Controls -->
    </div>
    <!-- banner close -->

    <!-- about start -->
    <div class="about">
        <div class="container">
            <div class="donate-info">
                <div class="row">
                    <div class="col-md-4">
                        <div class="donate-box"><!-- donate box start-->
                            <h2>SERVED OVER </h2>
                            <strong>760,000</strong>
                            <h2>CHILDREN</h2>
                            <h2>IN 23 COUNTRIES.</h2>
                            <a href="#" class="btn btn-default btn-donate">View Our Programs</a></div>
                        <!-- donate box close-->
                    </div>
                    <div class="col-md-offset-1 col-md-7"><!-- about info-->
                        <h1>Who we are ? <br>
                            Organization You Can Trust</h1>
                        <p class="lead-font">Nullam velit metus tristique id purus eget consequat congue loreml orem
                            ipsum
                            dolor sit amet consectetur adipiscing elit. Praesent vestibulum aenean noummy endrerit
                            mauris. </p>
                        <p>Nullam velit metus tristique id purus eget consequat congue loreml orem ipsum dolor sit amet
                            consectetur adipiscing elit. Praesent vesti Cum sociis natoque penatibus et magnis dis
                            parturient montes ascetur ridiculus mus. </p>
                        <a href="about-us.html" class="btn btn-default btn-yellow">Learn more</a></div>
                    <!--about info close-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="blk"><i class="fa fa-bell  icon-size"></i>
                        <h2 class="item-title">Our Mission</h2>
                        <p> Donec vel sollicitudin nisl, quis dignissim elit. Nunc laoreet nisi non odio tempus, at
                            .</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blk"><i class="fa fa-file-text icon-size"></i>
                        <h2 class="item-title">Education</h2>
                        <p>Sed mattis dui ut ultrices sodales. Integer lacinia lectus quis nnon accumsan dui
                            molestie</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blk"><i class="fa fa-life-ring icon-size"></i>
                        <h2 class="item-title">Help &amp; support</h2>
                        <p>The arrangement of type involves the selection of typefaces point size line length
                            leading. </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blk"><i class="fa fa-money icon-size"></i>
                        <h2 class="item-title">Make Donations</h2>
                        <p>Typography is the art and technique of arranging type in order to make language visible.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about close -->

    <!-- Service start -->
    <div class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>Helps children around the world</h1>
                    <p class="lead-font">Nullam velit metus tristique id purus eget consequat congue loreml orem ipsum
                        dolor
                        sit amet consectetur adipiscing elit. Praesent vestibulum aenean noummy endrerit mauris. </p>
                </div>
            </div>
            <div class=" service-blk">
                <div class="row">
                    <div class="col-md-4">
                        <div class="blk">
                            <h2><a href="#">Adopt a Child</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nulla orci, laoreet id
                                condimentum vitae.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blk">
                            <h2><a href="#">Children in Care</a></h2>
                            <p>Donec ac adipiscing lorem. Praesent sit amet ipsum quam suspendisse consectetur euismod
                                lacus.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blk">
                            <h2><a href="#">Disabled Children</a></h2>
                            <p> Integer accumsan fermentum leo, ac vehicula magna imperdiet vel. Vestibulum adipiscing
                                aliquet imperdiet.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="blk">
                            <h2><a href="#">Young People</a></h2>
                            <p>Donec mollis sem massa, nec posuere nisl convallis sed. Vestibulum ornare massa id diam
                                imperdiet dapibus</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blk">
                            <h2><a href="#">Family Support</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nulla orci, laoreet id
                                condimentum vitae.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blk">
                            <h2><a href="#">Our Schools</a></h2>
                            <p>Donec ac adipiscing lorem. Praesent sit amet ipsum quam suspendisse consectetur euismod
                                lacus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service close -->

    <!--  things section start -->
    <div class="things">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="blk">
                        <h1>Things thats
                            make us
                            different.</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nulla ndimentum
                            vitae. </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blk text-center">
                        <div class="yellow-blk">
                            <h2 class="heading">We are <br>
                                the charity <br>
                                World.</h2>
                            <i class="pe pe-li-web pe-4x pe-icon"></i></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blk text-center">
                        <div class="yellow-blk">
                            <h2 class="heading">97% Our <br>
                                Promise <br>
                                complete</h2>
                            <i class="pe pe-li-graph pe-4x pe-icon"></i></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="blk text-center">
                        <div class="yellow-blk">
                            <h2 class="heading">129 Million <br>
                                Children <br>
                                saves life</h2>
                            <i class="pe pe-li-user pe-4x pe-icon"></i> <i class="pe pe-li-user pe-4x pe-icon"></i> <i
                                    class="pe pe-li-user pe-4x pe-icon"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  things section cose -->


    <!--  testimonials section -->
    <div class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <h1>Success Story</h1>
                    testimonials_placeholder
                </div>
            </div>
        </div>
    </div>
    <!--  testimonials section close -->
@endsection