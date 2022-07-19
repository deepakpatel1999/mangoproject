@include('admin.header')
@include('admin.sitebar')
@include('admin.nav')

<!-- page content -->
@if (session('success'))
    <div class=" alert_show alert alert-success col-sm-6 col-md-6 text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center>{{ session('success') }}</center>
    </div>
@elseif(session('failed'))
    <div class="alert_show alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('failed') }}
    </div>
@endif

@if (session('delete-success'))
    <div class="alert_show alert alert-success col-sm-6 col-md-6 text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center>{{ session('delete-success') }}</center>
    </div>
@elseif(session('delete-failed'))
    <div class="alert_show alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('delete-failed') }}
    </div>
@endif

@if (session('update-success'))
    <div class="alert_show alert alert-success col-sm-6 col-md-6 text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center>{{ session('update-success') }}</center>
    </div>
@endif
<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>Tables <small> </small></h3>
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


        <a href="{{ route('add-shop-baner') }}" class="btn btn-primary btn-sm"
            onclick="return confirm('Do you really want to Add List?')"><i class="fa fa-plus"
                aria-hidden="true"></i>Add</a>


        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="clearfix"></div>

            <div class="clearfix"></div>
            @php
                $var = e_shopper_banner();
            @endphp
            @foreach ($var as $value)
                <div class="modal fade" id="editmodel{{ $value->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> Update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form action="{{ url('e-shop-banner-update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" id="" name="id" value="{{ @$value->id }}">
                                    <label for="name"> Title:</label>

                                    <br>
                                    <input type="text" id="" name="title" value="{{ @$value->title }}"
                                        placeholder="Title..">
                                    <div>
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div><br><br>
                                    <label for=""> Discription:</label>

                                    <br>
                                    <input type="text" id="" name="description"
                                        value="{{ @$value->description }}" placeholder="Discription..">
                                    <div>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                    <br>
                                    <label for=""> Image:</label><br>
                                    <input type="file" id="" name="files" value=""
                                        placeholder="Banner.."><br>
                                    <img src="{{ asset('/images/' . @$value->banner) }}" alt="image"
                                        style="height: 30;width: 30px;">
                                    <br>

                                    <br>

                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @php
                $var = e_shopper_banner();
            @endphp
            @foreach ($var as $value)
                <div class="modal fade" id="deletemodel{{ $value->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h2></h2>

                                <form action="{{ url('e-shopper-banner-delete') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="name"> DO YOU WANT TO DELETE :</label><br>
                                    <input type="hidden" id="" name="id"
                                        value="{{ $value->id }}"><br>
                                    <input type="submit" value="confirm">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Product Table <small> </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <p> Product Table<code></code> </p>

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">

                                        <th class="column-title">S.NO. </th>
                                        <th class="column-title"> Category</th>
                                        <th class="column-title">Product </th>
                                        <th class="column-title">Quantity </th>
                                        <th class="column-title">Image </th>
                                        <th class="column-title">Price </th>
                                        <th class="column-title">Is-features </th>
                                        <th class="column-title">Is-recommended </th>
                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>

                                    </tr>
                                </thead>
                                {{-- @php
                $var = e_shopper_banner();
                @endphp --}}

                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($product as $value)
                                        <?php $i++; ?>
                                        <tr class="even pointer">

                                            <td class=" ">{{ $i }}</td>
                                            <td class=" ">{{ @$value->ShopCategory->cat_name }} </td>

                                            <td class=" ">{{ @$value->product_name }}</td>
                                            <td class=" ">{{ @$value->quantity }}</td>


                                            <td class=" "><img src="{{ asset('/images/' . @$value->image) }}"
                                                    alt="image" style="height: 30;width: 30px;"></td>
                                            <td class=" ">{{ @$value->price }}</td>
                                            <td class=" ">
                                                @if ($value->is_features == 1)
                                                    <span style="color:blue">Is Featuerd </span>
                                                @else
                                                    <span style="color:red">Not Featuerd </span>
                                                @endif
                                            </td>
                                            <td class=" ">
                                                @if ($value->is_recommanded == 1)
                                                    <span style="color:blue"> Is Recommanded </span>
                                                @else
                                                    <span style="color:red">Not Recommanded </span>
                                                @endif
                                            </td>

                                            <td class=" last">
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#editmodel{{ $value->id }}"><i
                                                        class="fas fa-edit" style="font-size:20px;color:blue"></i>
                                                    Edit</a>
                                                <a class="dropdown-item"
                                                    onclick="return confirm('Do you really want to Delete?')"
                                                    data-toggle="modal"
                                                    data-target="#deletemodel{{ $value->id }}"><i
                                                        class="fa fa-remove" style="font-size:20px;color:red"></i>
                                                    Delete</a>


                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<script>
    setTimeout(function() {
        $('.alert_show').addClass('hide').removeClass('show').slideUp();
    }, 2000);
</script>
@include('admin.footer')
