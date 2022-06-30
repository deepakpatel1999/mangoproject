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

        <a href="{{ route('create') }}" class="btn btn-primary btn-sm"
            onclick="return confirm('Do you really want to Add List?')">Add</a>
        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="clearfix"></div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Inspiration List Table <small> </small></h2>
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

                        <p> Inspiration Table<code></code> </p>

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">

                                        <th class="column-title">S.NO. </th>
                                        <th class="column-title"> Title</th>
                                        <th class="column-title">Imaage </th>

                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($Inspiration as $Inspirations)
                                        <?php $i++; ?>
                                        <tr class="even pointer">

                                            <td class=" ">{{ $i }}</td>
                                            <td class=" ">{{ @$Inspirations->title }} </td>
                                            {{-- <td class=" ">{{ @$Inspirations->image }}</td> --}}
                                            <td><img src="{{ asset('/images/' . @$Inspirations->image) }}" alt="image"
                                                    style="height: 30;width: 30px;"></td>

                                            <td class=" last">


                                                <a href="{{ route('edit-data', $Inspirations->id) }}"
                                                    class="btn btn-primary btn-sm"
                                                    onclick="return confirm('Do you really want to Edit List?')">Edit</a>
                                                <button type="submit" class="btn btn-danger butdelete"
                                                    onclick="return confirm('Do you really want to Delete List?')"
                                                    value="{{ $Inspirations->id }}" id="butdelete"><i
                                                        class="fa fa-remove"
                                                        style="font-size:20px;color:red"></i>Delete</button>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('.butdelete').on('click', function() {
            var id = $('#butdelete').val();

            $.ajax({
                url: "{{ route('delete-data') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                cache: false,
                success: function(dataResult) {
                    alert('Delete successffuly');
                    window.location = "{{ url('inspiration') }}";

                }
            });

        });
    });
</script>
<script>
    setTimeout(function() {
        $('.alert_show').addClass('hide').removeClass('show').slideUp();
    }, 2000);
</script>
@include('admin.footer')
