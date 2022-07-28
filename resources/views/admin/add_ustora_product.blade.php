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

                                        <form method="post" action="{{ route('utoraproduct-store') }}"
                                            enctype="multipart/form-data">

                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name*</label>
                                                <input type="text" id="" name="product_name"
                                                    value="{{ old('product_name') }}" placeholder="Enter product name"
                                                    class="form-control product_name">
                                            </div>
                                            <div>
                                                @if ($errors->has('product_name'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('product_name') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="cat_id">Select Brand</label>
                                                <select name="cat_id" class="form-control">
                                                    <option value="">Select brand</option>
                                                    @foreach ($ShopCategory as $value)
                                                        <option value="{{ @$value->id }}">{{ @$value->cat_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div>
                                                @if ($errors->has('cat_id'))
                                                    <span class="text-danger">{{ $errors->first('cat_id') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Quantity*</label>
                                                <input type="number" id="quantity" name="quantity"
                                                    value="{{ old('quantity') }}" placeholder="Enter quantity"
                                                    class="form-control quantity">
                                            </div>
                                            <div>
                                                @if ($errors->has('quantity'))
                                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Image*</label>
                                                <input type="file" placeholder="Enter image" id="file"
                                                    value="{{ old('file') }}" name="files" class="form-control">
                                            </div>
                                            <div>
                                                @if ($errors->has('files'))
                                                    <span class="text-danger">{{ $errors->first('files') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Discount Price*</label>
                                                <input type="text" placeholder="Enter discount_price"
                                                    id="discount_price" value="{{ old('discount_price') }}"
                                                    name="discount_price" class="form-control">
                                            </div>

                                            <div>
                                                @if ($errors->has('discount_price'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('discount_price') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Price*</label>
                                                <input type="text" placeholder="Enter price" id="price"
                                                    value="{{ old('price') }}" name="price" class="form-control">
                                            </div>

                                            <div>
                                                @if ($errors->has('price'))
                                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">details*</label>
                                                <input type="text" placeholder="Enter details" id="details"
                                                    value="{{ old('details') }}" name="details" class="form-control">
                                            </div>
                                            <div>
                                                @if ($errors->has('details'))
                                                    <span class="text-danger">{{ $errors->first('details') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Is-top seller*</label>
                                                <input type="checkbox" name="top_seller" class="">
                                            </div>
                                            <div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Is-recently view*</label>
                                                    <input type="checkbox" name="recently_view" class="">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Is-top new*</label>
                                                <input type="checkbox" name="top_new" class="">
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
