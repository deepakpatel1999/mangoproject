@include('admin.header')
@include('admin.sitebar')
@include('admin.nav')

<style>
    .error {
        color: #FF0000;
    }
</style>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Form <small></small></h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" style="display:none"></div>
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12  ">
                <div class="content-wrapper">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title"></h3>
                                        </div>

                                        <form method="post" action="{{ route('categrory-store') }}"
                                            enctype="multipart/form-data">

                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name*</label>
                                                <input type="text" id="cat_name" name="cat_name"
                                                    value="{{ old('cat_name') }}" placeholder="Enter Category name"
                                                    class="form-control">
                                            </div>
                                            <div>
                                              @if ($errors->has('cat_name'))
                                                  <span class="text-danger">{{ $errors->first('cat_name') }}</span>
                                              @endif
                                          </div>

                                          <div>
                                            <br>
                                            <button type="submit" class="btn btn-primary"
                                                value="submit">Submit</button>
                                        </form>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')
