@include('admin.header')
@include('admin.sitebar')
@include('admin.nav')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">


    <div class="page-title">

      <div class="title_left">
        @if (Session::has('success'))
        <div class="alert alert-success" style="height: 10;width: 25;">
          <ul>
            <li>{{ Session::get('success') }}</li>
          </ul>
        </div>
        @endif
        <h3>wellcome <small>Admin	</small></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    
    
  </div>
</div>
<!-- /page content -->
<script>
  setTimeout( function(){
    $('.alert').addClass('hide').removeClass('show').slideUp();
  }  , 2000 );
</script>
@include('admin.footer')
