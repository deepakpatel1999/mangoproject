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

                                        <form method="post" action="{{ route('create-editor') }}"
                                            enctype="multipart/form-data">

                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title*</label>
                                                <input type="text" id="title" name="title"
                                                    value="{{ old('title') }}" placeholder="Enter title"
                                                    class="form-control title">
                                            </div>
                                            <div>
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Discription*</label>
                                                <input type="text" id="description" name="description"
                                                    value="{{ old('description') }}" placeholder="Enter Description"
                                                    class="form-control description">
                                            </div>
                                            <div>
                                                @if ($errors->has('description'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Image*</label>
                                                <input type="file" placeholder="Enter file" id="file"
                                                    value="{{ old('file') }}" name="files" class="form-control">
                                            </div>
                                            <div>
                                                @if ($errors->has('files'))
                                                    <span class="text-danger">{{ $errors->first('files') }}</span>
                                                @endif
                                            </div>

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
