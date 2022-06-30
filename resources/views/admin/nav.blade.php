 <div class="top_nav">
 	<div class="modal fade" id="ditmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
 <div class="modal-dialog" role="document">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="exampleModalLongTitle"> Admin Details</h5>
 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
 </button>
 </div>
 <div class="modal-body">
 <div class="col-sm-12 col-md-12 text-center">
 <h1>Admin Profile </h1>
 </div>
 <div class="col-sm-12 col-md-12 text-center">

 <form method="POST" action="{{route('admin.edit_profile')}}" class="form-inline" enctype="multipart/form-data">
 @csrf
 <div class="form-group">
 <label for="exampleInputName2">Name</label>
 <input type="hidden" class="form-control" id="exampleInputName2" name="id" placeholder="Enter Name" value="{{ Auth::user()->id }}" required>
 <input type="text" class="form-control" id="exampleInputName2" name="name" placeholder="Enter Name" value="{{ Auth::user()->name }}" required>
 
 </div>
 <br>
 <br>
 <div class="form-group">
 <label for="exampleInputName2">Email</label>
 <input type="text" class="form-control" id="exampleInputName2" name="email" placeholder="Enter Email" value="{{ Auth::user()->email; }}" required>
 
 </div>
 <br>
 <br>
 <div class="form-group">
 <label for="exampleInputName2">Password</label>
 <input type="text" class="form-control" id="exampleInputName2" name="password" placeholder="Enter password" value="{{ Auth::user()->password }}" required>
 
 </div>
 
 <br>
 <br>
 <br>
 <br>
 <br>
 <button type="submit" class="btn btn-success">Submit</button>
 </form>
 </div> 
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <!--<button type="button" class="btn btn-primary">Save changes</button>-->
 </div>
 </div>
 </div>
 </div>
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{asset('/assets/assets/assets/production/images/img.jpg')}}" alt="">Admin
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    	<a class="dropdown-item"data-toggle="modal" data-target="#ditmodel"> Profile</a>
                    
                       <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                      
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    
                  </li>
                </ul>
              </nav>
            </div>
          </div>