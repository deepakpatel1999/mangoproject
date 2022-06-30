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
                <h3>Update Form <small></small></h3>
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

                                        <form method="" action="javascript:void(0)" enctype="multipart/form-data"
                                            id="imageUpload">
                                            <input type="hidden" id="id" name="id" value="{{ @$data->id }}"
                                                class="form-control title">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title*</label>
                                                <input type="text" id="title" name="title" value="{{ @$data->title }}"
                                                    placeholder="Enter title" class="form-control title">
                                            </div>
                                            <span class="title_error" style="color: red;"></span>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Image*</label>
                                                <input type="file" placeholder="Enter file" id="file"
                                                    value="{{ @$data->image }}" name="files" class="form-control">
                                            </div>
                                            <span class="file_error" style="color: red;"></span>
                                            <br>
                                            <img src="{{ asset('/images/' . @$data->image) }}" alt="image"
                                                style="height: 40;width: 40px;">

                                            <br>

                                            <br>
                                            <button type="submit" class="btn btn-primary" value="submit">Submit</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    //function validatessForm(){
    $('#imageUpload').on('submit', (function(e) {
        e.preventDefault(e);

        var title = $('#title').val();
        var file = $('#file').val();

        var title_err = '';
        //var file_err = '';

        if (title == '') {
            title_err = 'Title is required*';
        }
        // if (file == '') {
        //     file_err = 'Image is required*';
        // }

        $('.title_error').html(title_err);
        //$('.file_error').html(file_err);

        if (title_err) {
            return false;
        } else {
            true;
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('update-data') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(dataResult) {
                    console.log(dataResult);
                    var dataResult = JSON.parse(dataResult);
                    alert('update Succssfully');
                    window.location = "{{ url('inspiration') }}";
                },
            });
        }
    }));
</script>
@include('admin.footer')
