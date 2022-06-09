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

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong"><span
                class="ti-plus"></span>
            Add
        </button>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-12 text-center">

                        </div>
                        <div class="col-sm-12 col-md-12 text-center">
                            <span style="display: none">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div><br />
                                @endif
                            </span>
                            <form method="POST" action="{{ route('add-catagory') }}" class="form-inline"
                                enctype="multipart/form-data" id="imageUpload">

                                @csrf
                                <div class="form-group">

                                    <label for="exampleInputName2">Title</label><br>
                                    <input type="text" class="form-control title" id="title" name="title"
                                        value="{{ old('title') }}" placeholder="Enter Title" required>

                                </div>
                                @error('title')
                                    <div class="alert alert-danger ">{{ $error }}</div>
                                @enderror
                                <br>
                                <br>
                                <div class="form-group">
                                    <label for="exampleInputName2">Discription</label><br>
                                    <input type="text" class="form-control description" id="description"
                                        name="description" value="{{ old('description') }}"
                                        placeholder="Enter Discription" required>


                                </div>
                                @error('description')
                                    <div class="alert alert-danger ">{{ $error }}</div>
                                @enderror
                                <br>
                                <br>
                                <div>

                                    <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                                </div>
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
        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="clearfix"></div>

            <div class="clearfix"></div>
            @foreach ($category as $categories)
                <div class="modal fade" id="editmodel{{ $categories->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Category Update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">


                                <form action="{{ url('category-update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" id="" name="id" value="{{ @$categories->id }}">
                                    <label for="name"> Title:</label><br>
                                    <input type="text" id="" name="title" value="{{ @$categories->title }}"
                                        placeholder="Title.."><br><br>
                                    <label for="email"> Discription:</label><br>
                                    <input type="text" id="" name="description"
                                        value="{{ @$categories->description }}" placeholder="Discription.."><br><br>

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

            @foreach ($category as $categories)
                <div class="modal fade" id="deletemodel{{ $categories->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">category delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h2></h2>

                                <form action="{{ url('categories-delete') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="name"> DO YOU WANT TO DELETE CATEGORY:</label><br>
                                    <input type="hidden" id="" name="id" value="{{ $categories->id }}"><br>
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
                        <h2>Category List Table <small> </small></h2>
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

                        <p> Category Table<code></code> </p>

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">

                                        <th class="column-title">S.NO. </th>
                                        <th class="column-title"> Title</th>
                                        <th class="column-title">Discription </th>

                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($category as $categories)
                                        <?php $i++; ?>
                                        <tr class="even pointer">

                                            <td class=" ">{{ $i }}</td>
                                            <td class=" ">{{ @$categories->title }} </td>

                                            <td class=" ">{{ @$categories->description }}</td>


                                            <td class=" last">
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#editmodel{{ $categories->id }}"><i
                                                        class="fas fa-edit" style="font-size:20px;color:blue"></i>
                                                    Edit</a>
                                                <a class="dropdown-item"
                                                    onclick="return confirm('Do you really want to Delete?')"
                                                    data-toggle="modal"
                                                    data-target="#deletemodel{{ $categories->id }}"><i
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
<script type="text/javascript">
    //function validatessForm(){
    $('#imageUpload').on('submit', (function(e) {
        e.preventDefault(e);
        alert('ok');
        var title = $('.title').val();
        var description = $('#description').val();
        var title_error = '';

        var description_error = '';
        if (title == '') {
            title_error = 'Name is required*';
        }
        if (description == '') {
            description_error = 'Email is required*';
        }

        $('.title_error').html(title_error);
        $('.description_error').html(description_error);

        if (title_error || description_error) {
            return false;
        } else {
            true;

        }
    }));
</script>
<script>
    setTimeout(function() {
        $('.alert_show').addClass('hide').removeClass('show').slideUp();
    }, 2000);
</script>
@include('admin.footer')
