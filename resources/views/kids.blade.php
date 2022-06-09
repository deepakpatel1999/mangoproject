@include('header') 
<!-- ======= breadcrumb ======= -->
<section id="breadcrumb">
 <div class="container">
  <div class="breadcrumb_inner">
   <Span><a href="javascript:void(0)">Home&nbsp;&nbsp;>>&nbsp;&nbsp;</a>Search Results</Span>
 </div>
</div>
</section>
<section id="page_heading">
 <div class="page_head_inner">
   <h1>User Profile</h1>
 </div>
</section>
<main id="main">
 <!-- ======= Filter Section start ======= -->
 <div id="page">
  <div class="container bootstrap snippets bootdey">
    <div class="row">
      <div class="profile-nav col-md-3">
        <div class="panel">
          <div class="user-heading round">
            <a href="#">
              <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
            </a>
            <h1>Preet Kumar</h1>
            <p>Fun Explorer!</p>
            <button class="btn edit_profile_btn btn_custom"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit Profile</button>
          </div>

          <ul class="nav nav-pills nav-stacked">
            <li>
             <div class="dropdown">
               <a href="#" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Information</a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                 <a class="dropdown-item" href="#!">- Edit Profile</a>
               </div>
             </div>
           </li>
           <li><a href="#"> <i class="fa fa-heart" aria-hidden="true"></i> Favourite</a></li>
           <li>
             <div class="dropdown">
               <a href="#" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"> <i class="fa fa-users" aria-hidden="true"></i> Community</a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                 <a class="dropdown-item" href="#!">- How to Score Points</a>
                 <a class="dropdown-item" href="#!">- Invite Friends</a>
                 <a class="dropdown-item" href="#!">- About Us</a>
                 <a class="dropdown-item" href="#!">- Sell Your Activity With Us</a>
                 <a class="dropdown-item" href="#!">- Leave a Review</a>
                 <a class="dropdown-item" href="#!">- Contact Us</a>
                 <a class="dropdown-item" href="#!">- Terms & Conditions</a>
                 <a class="dropdown-item" href="#!">- Privacy Policy</a>
               </div>
             </div>
           </li>
           <li><a href="#"> <i class="fa fa-child" aria-hidden="true"></i> Kids</a></li>
           <li><a href="#"> <i class="fa fa-power-off" aria-hidden="true"></i> Log out</a></li>
         </ul>
       </div>
     </div>
     <div class="profile-info col-md-9">
      
      <div>
        <div class="row">
          <div class="col-md-6">
            <div class="panel">
              <div class="panel-body">
                <div class="bio-chart">
                 <div class="widget_icn">
                  <i class="fa fa-credit-card" aria-hidden="true"></i>
                </div>
                <div class="widget_info">
                 <p>Balance</p>
                 <h4 class="red">AED 20</h4>
               </div>
             </div>
             <div class="bio-desk">
               <a href="#">My Wallet<i class="fa fa-chevron-right" aria-hidden="true"></i></a> 
             </div>
           </div>
         </div>
       </div>
       <div class="col-md-6">
        <div class="panel">
          <div class="panel-body">
            <div class="bio-chart fun_star">
             <div class="widget_icn">
              <i class="fa fa-trophy" aria-hidden="true"></i>
            </div>
            <div class="widget_info">
              <p>Next Rank</p>
              <h4 class="red">Fun Superstar</h4>
            </div>
          </div>
          <div class="bio-desk red_cl">
           <a href="#">Progress<i class="fa fa-chevron-right" aria-hidden="true"></i></a> 
         </div>
       </div>
     </div>
   </div>
   <div class="col-md-12">
    <div class="panel">
      <div class="bio-graph-heading">
        Aliquam ac magna metus. Nam sed arcu non tellus fringilla fringilla ut vel ispum. Aliquam ac magna metus.
      </div>
      <div class="panel-body bio-graph-info">
        <h2>Kids</h2>
        <div class="kids_main_heading">
          <div class="kids_heading"><h3>Age of Your Kids</h3></div>
          <p>Select Your Children's age so that we can suggest the best activities for them. Select as many ages as you need!</p>
        </div>
        <div class="kids_age_main col-md-6">
          <label>Select Age</label>
          <select>
            <option>All Ages</option>
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
            <option>11</option>
          </select>
        </div>
      </div>
      <div class="panel-body bio-graph-info">
        <div class="kids_main_heading">
          <div class="kids_heading"><h3>Add Your Kids</h3></div>
          <span class="addition_kids_text">A bit about your kids</span>
          <p>We need to know some information about your kids for better recommendations.</p>
        </div>
        <div class="kids_age_main col-md-6">
          <label>How many childrens do you have</label>
          <select>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
          </select>
        </div>
        <div class="full_row">
          <button class="btn update_btn btn_custom">Save</button>
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
<!-- ======= Filter Section End ======= -->
<!-- ======= Ad Carousel Section start ======= -->
</main>
<!-- End #main -->
<!-- ======= Footer start ======= -->
@include('footer') 