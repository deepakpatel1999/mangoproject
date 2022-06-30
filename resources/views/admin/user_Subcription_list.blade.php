@include('admin.header')
@include('admin.sitebar')
@include('admin.nav')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<style>
    body {
        background: #ececec;
    }

    /*Hidden class for adding and removing*/
    .lds-dual-ring.hidden {
        display: none;
    }

    /*Add an overlay to the entire page blocking any further presses to buttons or other elements.*/
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, .8);
        z-index: 999;
        opacity: 1;
        transition: all 0.5s;
    }

    /*Spinner Styles*/
    .lds-dual-ring {
        display: inline-block;
        width: 80px;
        height: 80px;
    }

    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 5% auto;
        border-radius: 50%;
        border: 6px solid #fff;
        border-color: #fff transparent #fff transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
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
        <div class="container">
            <form action="#">
                <label for="gsearch"></label>
                <input type="search" class="search" name="search" placeholder="Search....">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <button type="button" id="search" class="btn btn-light">Search</button>
            </form>
            <form action="#">

                <label for="">Choose Status:</label>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                <select name="status" id="status">
                    <option value="#">Select</option>
                    <br>
                    <option value="active">Active</option>
                    <br>
                    <option value="cancelled">Cancelled</option>
                    <br>
                    <option value="all">All</option>

                </select>


            </form>

        </div>
        <div class="clearfix"></div>

        <div class="row" style="display: block;">

            <div class="clearfix"></div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>subscription User List <small> </small></h2>
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

                        <p> subscription Table </p>
                        <div id="richList"></div>

                        <div id="loader" class="lds-dual-ring hidden overlay"></div>
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">

                                        <th class="column-title">S.NO. </th>
                                        <th class="column-title"> First Name</th>
                                        <th class="column-title"> Last Name</th>
                                        <th class="column-title">Email</th>
                                        <th class="column-title">Plane Name </th>
                                        <th class="column-title">Status</th>
                                        <th class="column-title">End Date</th>
                                        <th class="column-title">Create Date</th>


                                    </tr>
                                </thead>
                                <tbody class="bodyData">
                                    {{-- <?php// $i = 0; ?>  --}}
                                    {{-- @foreach ($Subcription_list as $Subcription_lists)
                                        <?php ///$i++;
                                        ?>
                                        <tr class="even pointer">

                                            <td class=" ">{{ $i }}</td>
                                            <td class=" ">{{ @$Subcription_lists['user']['name'] }}</td>

                                            <td class=" ">{{ @$Subcription_lists['user']['email'] }}</td>

                                            <td class=" ">{{ @$Subcription_lists['name'] }}</td>

                                            <td class=" ">{{ @$Subcription_lists['stripe_status'] }}</td>

                                        </tr>
                                    @endforeach --}}

                                </tbody>
                            </table>

                            {{ $Subcription_list->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        $('.alert_show').addClass('hide').removeClass('show').slideUp();
    }, 2000);
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $('select').on('change', function() {
        var status = $('#status').val();
        var token = $('#token').val();

        $.ajax({
            type: 'POST',
            url: "{{ route('filterdata') }}",
            data: {
                "status": status,
                "_token": token
            },
            dataType: 'json',
            beforeSend: function() { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                $('#loader').removeClass('hidden')
            },
            cache: false,
            success: function(dataResult) {

                console.log(dataResult);
                var resultData = dataResult.data;
                if (resultData) {
                    var bodyData = '';
                    var i = 1;
                    $.each(resultData, function(index, row) {
                        bodyData += "<tr>"
                        bodyData += "<td>" + i++ + "</td><td>" + row.user.first_name +
                            "</td><td>" + row.user.last_name +
                            "</td><td>" +
                            row.user.email + "</td><td>" + row.name + "</td><td>" + row
                            .stripe_status + "</td><td>" + row
                            .ends_at + "</td><td>" + row
                            .created_at + "</td>"
                        bodyData += "</tr>";

                    })
                    $(".bodyData").empty();
                    $(".bodyData").append(bodyData);
                    console.log(bodyData);
                }

                $('#loader').addClass('hidden')

            },
        });

    });

    $(window).on("load", function() {

        $.ajax({
            type: 'POST',
            url: "{{ route('filterdata') }}",
            data: {
                "status": 'onload',
                "_token": '{{ csrf_token() }}'
            },
            dataType: 'json',
            cache: false,
            success: function(dataResult) {

                console.log(dataResult);
                var resultData = dataResult.data;
                var bodyData = '';
                var i = 1;
                $.each(resultData, function(index, row) {
                  bodyData += "<tr>"
                        bodyData += "<td>" + i++ + "</td><td>" + row.user.first_name +
                            "</td><td>" + row.user.last_name +
                            "</td><td>" +
                            row.user.email + "</td><td>" + row.name + "</td><td>" + row
                            .stripe_status + "</td><td>" + row
                            .ends_at + "</td><td>" + row
                            .created_at + "</td>"
                        bodyData += "</tr>";

                })
                $(".bodyData").empty();
                $(".bodyData").append(bodyData);
                console.log(bodyData);
            },
        });
    });

    $('#search').on('click', function() {
        var status = $('.search').val();
        var token = $('#token').val();

        $.ajax({
            type: 'POST',
            url: "{{ route('filterdata') }}",
            data: {
                "status": status,
                "_token": token
            },
            dataType: 'json',
            beforeSend: function() { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                $('#loader').removeClass('hidden')
            },
            cache: false,
            success: function(dataResult) {

                console.log(dataResult);
                var resultData = dataResult.data;
                if (resultData) {
                    var bodyData = '';
                    var i = 1;
                    $.each(resultData, function(index, row) {
                      bodyData += "<tr>"
                        bodyData += "<td>" + i++ + "</td><td>" + row.user.first_name +
                            "</td><td>" + row.user.last_name +
                            "</td><td>" +
                            row.user.email + "</td><td>" + row.name + "</td><td>" + row
                            .stripe_status + "</td><td>" + row
                            .ends_at + "</td><td>" + row
                            .created_at + "</td>"
                        bodyData += "</tr>";

                    })
                    $(".bodyData").empty();
                    $(".bodyData").append(bodyData);
                    console.log(bodyData);
                }

                $('#loader').addClass('hidden')

            },
        });

    });
</script>

@include('admin.footer')
