@include('header')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active"
                    style="background: {{ url(asset('/assets/img/slide/slide_01.png')) }};background-color: #eefff8;background-size: contain !important;background-position: right bottom;background-repeat: no-repeat;">
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item"
                    style="background: {{ url(asset('/assets/img/slide/slide_01.png')) }};background-color: #eefff8;background-size: contain !important;background-position: right bottom;background-repeat: no-repeat;">
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item"
                    style="background: {{ url(asset('/assets/img/slide/slide_01.png')) }};background-color: #eefff8;background-size: contain !important;background-position: right bottom;background-repeat: no-repeat;">
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- ======= Filter Section start ======= -->
    <section id="filter-section">
        <div class="container">
            <?php $category = DB::table('categories')->get(); ?>
            <div class="catergory-section">
                <div class="category-data">
                    <div class="category-carousel owl-carousel">
                        @foreach ($category as $categorys)
                            <div class="category-link cat_01"><a
                                    href="{{ route('category-data', $categorys->id) }}">{{ @$categorys->title }}</a>
                            </div>
                            {{-- <div class="category-link cat_02"><a href="#">Dining</a></div>
                        <div class="category-link cat_03"><a href="#">Entertainment</a></div>
                          <div class="category-link cat_04"><a href="#">Education</a></div>
                            <div class="category-link cat_05"><a href="#">Beauty & Style</a></div>
                              <div class="category-link cat_06"><a href="#">Mo+6re</a></div> --}}
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="home-filter">
                <div class="hf_outer">
                    <div class="hf_inner">
                        <h1>Find the best around town</h1>
                        <form class="hf_form" method="post">
                            <div class="row">
                                <div class="col-md-12 serah_form_field">
                                    <input type="text" class="form-control search_field" id="formGroupExampleInput"
                                        placeholder="Search for activities...">
                                    <button type="button" class="search_btn">Search</button>
                                </div>
                            </div>
                            <div class="row hf_bottom_filter">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option selected="">When</option>
                                            <option>Today</option>
                                            <option>Tomorrow</option>
                                            <option>This Weekend</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <div class='input-group date col-md-6' id='datetimepicker1'>
                                            <input type='date' class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                        <div class='input-group date col-md-6' id='datetimepicker2'>
                                            <input type='date' class="form-control" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option selected="">Age</option>
                                            <option>2-4</option>
                                            <option>5-8</option>
                                            <option>8-10</option>
                                            <option>10-15</option>
                                            <option>15-20</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option selected="">Select City</option>
                                            <option>Dubai</option>
                                            <option>Abu Dhabi</option>
                                            <option>Eastern Province</option>
                                            <option>Riyadh</option>
                                            <option>Jaddah</option>
                                            <option>Manama</option>
                                            <option>Cairo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Filter Section End ======= -->

    <!-- ======= Ad Carousel Section start ======= -->
    <section id="advertisement" class="advertisement">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="ad_banner">
                        <div class="ad_banner_inner">
                            <div class="ad-banner owl-carousel">
                                <div class="ad_image"><a href="#"><img
                                            src="{{ asset('/assets/img/banner-ad/banner_01.jpg') }}" alt="ad_01"></a>
                                </div>
                                <div class="ad_image"><a href="#"><img
                                            src="{{ asset('/assets/img/banner-ad/banner_02.jpg') }}" alt="ad_02"></a>
                                </div>
                                <div class="ad_image"><a href="#"><img
                                            src="{{ asset('/assets/img/banner-ad/banner_03.jpg') }}" alt="ad_03"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ======= Ad Carousel Section End ======= -->

    <!-- ======= Event category Carousel Section start ======= -->
    <section id="event_category" class="event_category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="event_cat_section">
                        <div class="event_cat_section_inner">
                            <div class="events_main_heading">
                                <h1>Get Inspiration For Your Next Outing</h1>
                                <a href="{{ route('inspirations-all-data') }}">See All</a>
                            </div>
                            <?php $inspiration = DB::table('inspirations')->get(); ?>

                            <div class="event_cat_carousel owl-carousel">
                                @foreach ($inspiration as $inspirations)
                                    <div class="event_image"><a
                                            href="{{ route('inspirations-data', $inspirations->id) }}"><img
                                                src="{{ asset('/images/' . @$inspirations->image) }}">
                                            <div class="event_heading yellow_bg">{{ @$inspirations->title }}</div>
                                        </a>
                                    </div>
                                    {{-- <div class="event_image">
                    <a href="#"><img src="{{asset('assets/img/banner-ad/event_cat_02.png')}}" alt="ad_02">
                      <div class="event_heading Purple_bg">EDITOR'S PICKS</div>
                  </a> --}}
                                    {{-- </div>
                  <div class="event_image"><a href="#"><img src="{{asset('assets/img/banner-ad/event_cat_03.png')}}" alt="ad_03">
                    <div class="event_heading blue_bg">TRY SOMETHING NEW IN 2021</div>
                  </a>
                </div>
                 <div class="event_image"><a href="#"><img src="{{asset('assets/img/banner-ad/event_cat_04.png')}}" alt="ad_03">
                    <div class="event_heading red_bg">FREE FUN THIS MONTH</div>
                  </a>
                </div> --}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Event category Carousel Section End ======= -->

    <!-- ======= Events Carousel Section start ======= -->
    <section id="first_event_cat" class="first_event_cat">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="first_events_section">
                        <div class="first_event_section_inner">
                            <div class="events_main_heading">
                                <h1>Most Loved By Parents</h1>
                                <a href="#">See All</a>
                            </div>
                            <div class="first_event_carousel owl-carousel">
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_01.jpg') }}" alt="ad_01">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- second box -->
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_02.jpg') }}" alt="ad_02">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>Kidzania Back to school offer In Dubai</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- third box -->
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('/assets/img/banner-ad/image_03.jpg') }}" alt="ad_03">


                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>Pumpkin cooking party with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fourth box -->
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_04.jpg') }}" alt="ad_04">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>Dubai events in july: DSS D3 Restaurant</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
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

    <!-- ======= Events Carousel Section End ======= -->
    <!-- ======= Second Events Carousel Section start ======= -->
    <section id="second_event_cat" class="first_event_cat">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="second_events_section">
                        <div class="second_event_section_inner">
                            <div class="events_main_heading">
                                <h1>Editor’s Picks This Week</h1>
                                <a href="#">See All</a>
                            </div>
                            <div class="sec_event_carousel owl-carousel">
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_01.jpg') }}" alt="ad_01">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- second box -->
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_02.jpg') }}" alt="ad_02">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- third box -->
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_03.jpg') }}" alt="ad_03">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fourth box -->
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_04.jpg') }}" alt="ad_04">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
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

    <!-- ======= Second Events Carousel Section End ======= -->

    <!-- ======= Third Events Carousel Section start ======= -->
    <section id="third_event_cat" class="third_event_cat">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="third_events_section">
                        <div class="third_event_section_inner">
                            <div class="events_main_heading">
                                <h1>Try Something New in 2021</h1>
                                <a href="#">See All</a>
                            </div>
                            <div class="third_event_carousel owl-carousel">
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_01.jpg') }}" alt="ad_01">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- second box -->
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_02.jpg') }}" alt="ad_02">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- third box -->
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_03.jpg') }}" alt="ad_03">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fourth box -->
                                <div class="event_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/image_04.jpg') }}" alt="ad_04">
                                        <div class="event_code">AED 65</div>
                                    </div>
                                    <div class="event_description">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <button type="button" class="btn bn_btn">Book Now!</button>
                                            </div>
                                            <div class="right_section">
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn rm_btn">Read More</button>
                                            </div>
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

    <!-- ======= Third Events Carousel Section End ======= -->

    <!-- ======= Third Events Carousel Section start ======= -->
    <section id="blog-section" class="blog-section">
        <div class="container">
            <div class="blog_section_outer">
                <div class="blog_section_inner">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="events_main_heading">
                                <h1>More to Explore and Learn</h1>
                                <a href="#">See All</a>
                            </div>
                            <div class="blog-posts-item">
                                <div class="blog-posts-inner">
                                    <div class="blog_image">
                                        <img src="{{ asset('assets/img/banner-ad/blog_01.jpg') }}" alt="blog_01">
                                        <span class="blog_cat">Adventure</span>
                                    </div>
                                    <div class="blog_desc">
                                        <h2>What we learn from cooking together with children</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled</p>
                                        <button type="button" class="btn blog_rm">Read More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="blog-posts-item">
                                <div class="blog-posts-inner">
                                    <div class="blog_image">
                                        <img src="{{ asset('assets/img/banner-ad/blog_01.jpg') }}" alt="blog_01">
                                        <span class="blog_cat">Adventure</span>
                                    </div>
                                    <div class="blog_desc">
                                        <h2>What we learn from cooking together with children</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled</p>
                                        <button type="button" class="btn blog_rm">Read More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="post-tab">
                                <ul id="tabs" class="nav nav-tabs" role="tablist">
                                    <li class="nav-item first_tab">
                                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab"
                                            role="tab">Latest Posts</a>
                                    </li>
                                    <li class="nav-item sec_tab">
                                        <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab"
                                            role="tab">Upcoming Events</a>
                                    </li>
                                </ul>

                                <div id="content" class="tab-content" role="tablist">
                                    <div id="pane-A" class="card tab-pane fade show active" role="tabpanel"
                                        aria-labelledby="tab-A">
                                        <div class="card-header" role="tab" id="heading-A">
                                            <h5 class="mb-0">
                                                <!-- Note: `data-parent` removed from here -->
                                                <a data-toggle="collapse" href="#collapse-A" aria-expanded="true"
                                                    aria-controls="collapse-A">
                                                    Latest Posts
                                                </a>
                                            </h5>
                                        </div>

                                        <!-- Note: New place of `data-parent` -->
                                        <div id="collapse-A" class="collapse show" data-parent="#content"
                                            role="tabpanel" aria-labelledby="heading-A">
                                            <div class="card-body widget_blog">
                                                <div class="blog-posts-item">
                                                    <div class="blog-posts-inner">
                                                        <div class="blog_image">
                                                            <img class="img-responsive"
                                                                src="{{ asset('assets/img/banner-ad/blog_01.jpg') }}"
                                                                alt="blog_01">
                                                        </div>
                                                        <div class="blog_desc">
                                                            <h2>What we learn from cooking together with children</h2>
                                                            <p>20-Jan-2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog-posts-item">
                                                    <div class="blog-posts-inner">
                                                        <div class="blog_image">
                                                            <img class="img-responsive"
                                                                src="{{ asset('assets/img/banner-ad/blog_02.jpg') }}"
                                                                alt="blog_02">
                                                        </div>
                                                        <div class="blog_desc">
                                                            <h2>What we learn from cooking together with children</h2>
                                                            <p>20-Jan-2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog-posts-item">
                                                    <div class="blog-posts-inner">
                                                        <div class="blog_image">
                                                            <img class="img-responsive"
                                                                src="{{ asset('assets/img/banner-ad/blog_01.jpg') }}"
                                                                alt="blog_03">
                                                        </div>
                                                        <div class="blog_desc">
                                                            <h2>What we learn from cooking together with children</h2>
                                                            <p>20-Jan-2020</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="pane-B" class="card tab-pane fade" role="tabpanel"
                                        aria-labelledby="tab-B">
                                        <div class="card-header" role="tab" id="heading-B">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" href="#collapse-B"
                                                    aria-expanded="false" aria-controls="collapse-B">
                                                    Collapsible Group Item B
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse-B" class="collapse" data-parent="#content"
                                            role="tabpanel" aria-labelledby="heading-B">
                                            <div class="card-body">
                                                [Tab content B]
                                            </div>
                                        </div>
                                    </div>

                                    <div id="pane-C" class="card tab-pane fade" role="tabpanel"
                                        aria-labelledby="tab-C">
                                        <div class="card-header" role="tab" id="heading-C">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" href="#collapse-C"
                                                    aria-expanded="false" aria-controls="collapse-C">
                                                    Collapsible Group Item C
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse-C" class="collapse" role="tabpanel"
                                            data-parent="#content" aria-labelledby="heading-C">
                                            <div class="card-body">
                                                [Tab content C]
                                            </div>
                                        </div>
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

    <!-- ======= Third Events Carousel Section End ======= -->
    <!-- ======= Second Events Carousel Section start ======= -->
    <section id="browse_category" class="browse_category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="browse_cat_section">
                        <div class="browse_cat_section_inner">
                            <div class="browse_main_heading center_heading text-center">
                                <h1>Browse By Category</h1>
                                <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy</p>
                            </div>
                            <div class="browse_cat_carousel owl-carousel">
                                <div class="event_box browse_desc_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/bc_img_01.jpg') }}" alt="ad_01">
                                    </div>
                                    <div class="event_description browse_desc">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn browse_rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- second box -->
                                <div class="event_box browse_desc_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/bc_img_02.jpg') }}" alt="ad_02">
                                    </div>
                                    <div class="event_description browse_desc">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn browse_rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- third box -->
                                <div class="event_box browse_desc_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/bc_img_03.jpg') }}" alt="ad_03">
                                    </div>
                                    <div class="event_description browse_desc">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn browse_rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fourth box -->
                                <div class="event_box browse_desc_box">
                                    <div class="events_des_image">
                                        <img src="{{ asset('assets/img/banner-ad/bc_img_01.jpg') }}" alt="ad_04">
                                    </div>
                                    <div class="event_description browse_desc">
                                        <h3>What we learn from cooking together with children</h3>
                                        <div class="event_btm_des">
                                            <div class="left_section">
                                                <span class="small_text">The Dubai Mall</span>
                                                <div class="review">
                                                    <ul>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn browse_rm_btn">Read More</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="reveiw_btn text-center"><button type="button">
                                    <div class="review btn_inner">
                                        <ul>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                    </div> Share with the community your review on an activity
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Second Events Carousel Section End ======= -->
    <!-- ======= advertisement  Section start ======= -->
    <section id="home_ad_section" class="home_ad">
        <div class="container">
            <div class="ad_main">
                <div class="row">
                    <div class="col-md-7">
                        <div class="ad_content">
                            <h1>Travel with kids made easy:<br>best airlines for families | <br><span style="">HoneyKids
                                    Asia</span></h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus </p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="home_ad_image">
                            <img src="assets/img/home_ad.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= advertisement  Section End ======= -->

    <!-- ======= create family  Section Start ======= -->
    <section id="family_section_main">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="family_carousel_main">
                        <img src="assets/img/mobile_screen.png">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="family_content">
                        <h1 class="main-heading-wh">Create family memories</h1>
                        <div class="family_sub_text">Find, plan and book the most kid-friendly activities about town.
                        </div>
                        <div class="family_cont_point">
                            <h3>1. Download QiDZ & Register</h3>
                            <p>It’s easy! Download QiDZ and quickly register to access the best deals, ideas and
                                inspiration on kid’s activities, family activities and things to do in your city.</p>
                            <h3>2. Be In The Know</h3>
                            <p>QiDZ is updated daily with the latest DIY activities, games, online resources and more
                                for kids! You'll also find family entertainment and outings. Get the the best deals,
                                ideas and inspiration all in one place.</p>
                            <h3>3. Create Memories</h3>
                            <p>Give your family brilliant memories that they will cherish. Whether you're looking for
                                ideas for days at home or inspiration for days out, there’s something for everyone.
                                Download QiDZ now.</p>
                            <div class="play_store_buttons d-flex">
                                <a href="#"><img src="assets/img/apple_btn.png"></a>
                                <a href="#"><img src="assets/img/android_btn.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= create family  Section End ======= -->

    <!-- ======= Second Events Carousel Section End ======= -->
    <section id="download_app">
        <div class="container">
            <div class="download_app_main">
                <div class="download_app_inner">
                    <div class="text-center color-wh">
                        <h1 class="main-heading-wh">Download QiDZ Now!</h1>
                        <p>Find Plan and book the most kid-friendly activities about town.</p>
                    </div>
                    <div class="download_buttons">
                        <div class="download_btn first_btn">
                            <img class="down_ic" src="assets/img/apple_ic.png"><br>
                            <a href="#"><img src="assets/img/apple_btn.png"></a>
                        </div>
                        <div class="download_btn">
                            <img class="down_ic" src="assets/img/android_icon.png"><br>
                            <a href="#"><img src="assets/img/android_btn.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@include('footer')
