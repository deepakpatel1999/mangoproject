@include('header')       <!-- ======= breadcrumb ======= -->
      <section id="breadcrumb">
         <div class="container">
            <div class="breadcrumb_inner">
               <Span><a href="javascript:void(0)">Home&nbsp;&nbsp;>>&nbsp;&nbsp;</a>Search Results</Span>
            </div>
         </div>
      </section>
      <main id="main">
         <!-- ======= Filter Section start ======= -->
         <div id="page">
            <div class="container">
               <div class="row">
                  <div class="col-md-3">
                     <div class="filter-widget-sidebar-left">
                        <div class="filter-widget-inner">
                           <div class="widget_heading widget_head_red">
                              <h3>Filter By</h3>
                           </div>
                           <div class="search-filters">
                              <div class="search-filters-inner">
                                 <div class="first-field field-area">
                                    <label>Search</label>
                                    <input type="text" name="" placeholder="Halloween">
                                 </div>
                                 <div class="first-field field-area">
                                    <label>Select City</label>
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
                                 <!-- check area first start -->
                                 <div class="first-field field-area check_area">
                                    <label>Looking For</label>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultChecked" checked="">
                                       <label class="custom-control-label" for="defaultChecked">Halloween</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Entertainment</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Travel</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Dining</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Education</label>
                                    </div>
                                 </div>
                                 <!-- check area first End -->
                                 <!-- check area second start -->
                                 <div class="first-field field-area check_area">
                                    <label>Activity Type</label>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultChecked" checked="">
                                       <label class="custom-control-label" for="defaultChecked">Halloween Recepies</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Fun Zone</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Halloween Decoration</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Dining</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Pumpkin Party</label>
                                    </div>
                                 </div>
                                 <!-- check area second end -->
                                 <!-- check area second start -->
                                 <div class="first-field field-area check_area">
                                    <label>More Options</label>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultChecked" checked="">
                                       <label class="custom-control-label" for="defaultChecked">Halloween Exhibition</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Under Age Party</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Travel</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Dining</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                       <label class="custom-control-label" for="defaultUnchecked">Education</label>
                                    </div>
                                 </div>
                                 <!-- check area second end -->
                                 <!-- Date picker Start -->
                                 <div class="first-field field-area date_picker">
                                    <label>Pick a Date</label>
                                    <div id="datetimepicker1">
                                       <input type='date' class="form-control" />
                                    </div>
                                 </div>
                                 <!-- Date picker End -->
                                 <!-- Distance filter start -->
                                 <div class="row distance_field">
                                    <div class="first-field field-area col-md-6">
                                       <label>Distance</label>
                                       <button type='button' class="btn near_me">Near Me</button>
                                    </div>
                                    <div class="first-field field-area col-md-6">
                                       <label>Location</label>
                                       <select class="form-control">
                                          <option selected="">Location</option>
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
                                 <!-- Distance filter End -->
                                 <!-- age range filter start -->
                                 <div class="row distance_field">
                                    <div class="first-field field-area col-md-6">
                                       <label>Age From</label>
                                       <select class="form-control">
                                          <option selected="">From</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                          <option>6</option>
                                          <option>7</option>
                                          <option>8</option>
                                          <option>9</option>
                                          <option>10</option>
                                       </select>
                                    </div>
                                    <div class="first-field field-area col-md-6">
                                       <label>Age To</label>
                                       <select class="form-control">
                                          <option selected="">To</option>
                                          <option>1</option>
                                          <option>2</option>
                                          <option>3</option>
                                          <option>4</option>
                                          <option>5</option>
                                          <option>6</option>
                                          <option>7</option>
                                          <option>8</option>
                                          <option>9</option>
                                          <option>10</option>
                                       </select>
                                    </div>
                                 </div>
                                 <!-- age range filter End -->
                                 <!-- Sort By filter Start -->
                                 <div class="sort-by-filter">
                                    <div class="first-field field-area">
                                       <label>Sort By</label>
                                    </div>
                                    <div class="row">
                                       <div class="first-field field-area col-md-4">
                                          <button type="button">Free</button>
                                       </div>
                                       <div class="first-field field-area col-md-4 active">
                                          <button type="button">Deals</button>
                                       </div>
                                       <div class="first-field field-area col-md-4">
                                          <button type="button">Buy Now</button>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Sort By filter End -->
                                 <!-- What else filter Start -->
                                 <div class="sort-by-filter else_filter">
                                    <div class="first-field field-area">
                                       <label>What else are you Looking for?</label>
                                    </div>
                                    <div class="row">
                                       <div class="first-field field-area col-md-4">
                                          <button type="button">Indoor</button>
                                       </div>
                                       <div class="first-field field-area col-md-4 active">
                                          <button type="button">Outdoor</button>
                                       </div>
                                       <div class="first-field field-area col-md-4">
                                          <button type="button">Both</button>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- What else filter End -->
                                 <div class="submit-filter-btn">
                                    <button type="button" class="search_btn_filter">Search</button>
                                    <button type="button" class="clear_btn_filter">Clear All</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="search-area">
                        <div class="search-area-inner">
                           <div class="widget_heading widget_head_blue">
                              <h3>Search Results</h3>
                           </div>
                           <!-- keyword filter start -->
                           <div class="search-keyword-area">
                              <div class="search-key-heading">
                                 <h3>Filter</h3>
                                 <a href="javascript:void(0);">Clear Filter</a>
                              </div>
                              <div class="keywaord-tag">
                                 <ul>
                                    <li><a href="javascript:void(0);">Halloween</a><button class="close_btn"></button></li>
                                    <li><a href="javascript:void(0);">Action</a><button class="close_btn"></button></li>
                                    <li><a href="javascript:void(0);">Abu Dhabi</a><button class="close_btn"></button></li>
                                    <li><a href="javascript:void(0);">Fun Club</a><button class="close_btn"></button></li>
                                 </ul>
                              </div>
                           </div>
                           <!-- keyword filter End -->
                           <!-- ad banner start -->
                           <div class="ad_category_banner">
                              <div class="ad_category_img">
                                 <img class="img-fluid" src="assets/img/search/search_ad_01.png">
                              </div>
                              <div class="ad_category_img">
                                 <img class="img-fluid" src="assets/img/search/search_ad_02.png">
                              </div>
                           </div>
                           <!-- ad banner end -->
                           <!-- search listing start -->
                           <div class="search_listing_sec">
                              <div class="search_list_item">
                                 <div class="search_event_img">
                                    <img src="assets/img/search/search_event_img.jpg">
                                 </div>
                                 <div class="serch_event_detail">
                                    <h3>Kidzania Back to school offer in Dubai</h3>
                                    <div class="search_cat_area">
                                       <div class="search_cat">The Dubai Mall</div>
                                       <div class="review">
                                          <ul>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="search_price"><span class="dis_price">AED 100</span><span class="main_price">AED 75</span></div>
                                    <div class="search_book_btns">
                                       <button type="button" class="bn_btn">Book Now!</button>
                                       <button type="button" class="rm_btn">Read More</button>
                                    </div>
                                 </div>
                              </div>
                              <div class="search_list_item">
                                 <div class="search_event_img">
                                    <img src="assets/img/search/search_event_img.jpg">
                                 </div>
                                 <div class="serch_event_detail">
                                    <h3>Kidzania Back to school offer in Dubai</h3>
                                    <div class="search_cat_area">
                                       <div class="search_cat">The Dubai Mall</div>
                                       <div class="review">
                                          <ul>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="search_price"><span class="dis_price">AED 100</span><span class="main_price">AED 75</span></div>
                                    <div class="search_book_btns">
                                       <button type="button" class="bn_btn">Book Now!</button>
                                       <button type="button" class="rm_btn">Read More</button>
                                    </div>
                                 </div>
                              </div>
                              <div class="search_list_item">
                                 <div class="search_event_img">
                                    <img src="assets/img/search/search_event_img.jpg">
                                 </div>
                                 <div class="serch_event_detail">
                                    <h3>Kidzania Back to school offer in Dubai</h3>
                                    <div class="search_cat_area">
                                       <div class="search_cat">The Dubai Mall</div>
                                       <div class="review">
                                          <ul>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="search_price"><span class="dis_price">AED 100</span><span class="main_price">AED 75</span></div>
                                    <div class="search_book_btns">
                                       <button type="button" class="bn_btn">Book Now!</button>
                                       <button type="button" class="rm_btn">Read More</button>
                                    </div>
                                 </div>
                              </div>
                              <div class="search_list_item">
                                 <div class="search_event_img">
                                    <img src="assets/img/search/search_event_img.jpg">
                                 </div>
                                 <div class="serch_event_detail">
                                    <h3>Kidzania Back to school offer in Dubai</h3>
                                    <div class="search_cat_area">
                                       <div class="search_cat">The Dubai Mall</div>
                                       <div class="review">
                                          <ul>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="search_price"><span class="dis_price">AED 100</span><span class="main_price">AED 75</span></div>
                                    <div class="search_book_btns">
                                       <button type="button" class="bn_btn">Book Now!</button>
                                       <button type="button" class="rm_btn">Read More</button>
                                    </div>
                                 </div>
                              </div>
                              <div class="search_list_item">
                                 <div class="search_event_img">
                                    <img src="assets/img/search/search_event_img.jpg">
                                 </div>
                                 <div class="serch_event_detail">
                                    <h3>Kidzania Back to school offer in Dubai</h3>
                                    <div class="search_cat_area">
                                       <div class="search_cat">The Dubai Mall</div>
                                       <div class="review">
                                          <ul>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                             <li><i class="fas fa-star"></i></li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="search_price"><span class="dis_price">AED 100</span><span class="main_price">AED 75</span></div>
                                    <div class="search_book_btns">
                                       <button type="button" class="bn_btn">Book Now!</button>
                                       <button type="button" class="rm_btn">Read More</button>
                                    </div>
                                 </div>
                              </div>
                              <div class="show_more_btn">
                                <button type="button" class="see_more_btn">See More</button>
                              </div>
                           </div>
                           <!-- search listing End -->
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="featured-widget-sidebar-right">
                        <div class="filter-widget-inner">
                           <div class="widget_heading widget_head_red">
                              <h3>Featured</h3>
                           </div>
                            <div class="featured_events_list">
                              <div class="featured_events">
                                <img src="assets/img/search/first_event_img.png">
                                <div class="feat_details">
                                  <h4>Kids World Nursery @ Al Nahda</h4>
                                  <a href="javascript:void(0)">Sharjah, Al Nahda</a>
                                </div>
                              </div>
                              <div class="featured_events">
                                <img src="assets/img/search/first_event_img.png">
                                <div class="feat_details">
                                  <h4>Kids World Nursery @ Al Nahda</h4>
                                  <a href="javascript:void(0)">Sharjah, Al Nahda</a>
                                </div>
                              </div>
                              <div class="featured_events">
                                <img src="assets/img/search/first_event_img.png">
                                <div class="feat_details">
                                  <h4>Kids World Nursery @ Al Nahda</h4>
                                  <a href="javascript:void(0)">Sharjah, Al Nahda</a>
                                </div>
                              </div>
                              <div class="featured_events">
                                <img src="assets/img/search/first_event_img.png">
                                <div class="feat_details">
                                  <h4>Kids World Nursery @ Al Nahda</h4>
                                  <a href="javascript:void(0)">Sharjah, Al Nahda</a>
                                </div>
                              </div>
                              <div class="featured_events">
                                <img src="assets/img/search/first_event_img.png">
                                <div class="feat_details">
                                  <h4>Kids World Nursery @ Al Nahda</h4>
                                  <a href="javascript:void(0)">Sharjah, Al Nahda</a>
                                </div>
                              </div>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- ======= Filter Section End ======= -->
         <!-- ======= Ad Carousel Section start ======= -->
      </main>
      <!-- End #main -->
      <!-- ======= Footer start ======= -->
@include('footer') 