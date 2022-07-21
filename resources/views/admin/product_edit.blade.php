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

                                        <form method="post" action="{{ route('product-update') }}"
                                            enctype="multipart/form-data">

                                            @csrf
                                            <input type="hidden" name="id" value="{{ $Product->id }}"
                                                class="form-control ">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name*</label>
                                                <input type="text" id="title" name="product_name"
                                                    value="{{ $Product->product_name }}"
                                                    placeholder="Enter product name" class="form-control product_name">
                                            </div>
                                            <div>
                                                @if ($errors->has('product_name'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('product_name') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="cat_id">Select Category</label>
                                                <select name="cat_id" class="form-control" required>
                                                    <option value="">Select Category</option>
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
                                                    value="{{ $Product->quantity }}" placeholder="Enter quantity"
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
                                                    value="{{ $Product->files }}" name="files" class="form-control">
                                            </div>

                                            <img src="{{ asset('/images/' . @$Product->image) }}" alt="image"
                                                style="height: 30;width: 30px;">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Price*</label>
                                                <input type="text" placeholder="Enter price" id="price"
                                                    value="{{ $Product->price }}" name="price" class="form-control">
                                            </div>
                                            <div>
                                                @if ($errors->has('price'))
                                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Web ID*</label>
                                                <input type="text" placeholder="Enter Web_ID" id="Web_ID"
                                                    value="{{ $Product->Web_ID }}" name="Web_ID"
                                                    class="form-control">
                                            </div>
                                            <div>
                                                @if ($errors->has('Web_ID'))
                                                    <span class="text-danger">{{ $errors->first('Web_ID') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Availability*</label>
                                                <input type="text" placeholder="Enter Availability" id="Availability"
                                                    value="{{ $Product->Availability }}" name="Availability"
                                                    class="form-control">
                                            </div>
                                            <div>
                                                @if ($errors->has('Availability'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('Availability') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Condition*</label>
                                                <input type="text" placeholder="Enter Condition" id="Condition"
                                                    value="{{ $Product->Condition }}" name="Condition"
                                                    class="form-control">
                                            </div>
                                            <div>
                                                @if ($errors->has('Condition'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('Condition') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Brand*</label>
                                                <input type="text" placeholder="Enter Brand" id="Brand"
                                                    value="{{ $Product->Brand }}" name="Brand"
                                                    class="form-control">
                                            </div>
                                            <div>
                                                @if ($errors->has('Brand'))
                                                    <span class="text-danger">{{ $errors->first('Brand') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">details*</label>
                                                <input type="text" placeholder="Enter price" id="details"
                                                    value="{{ $Product->details }}" name="details"
                                                    class="form-control">
                                            </div>
                                            <div>
                                                @if ($errors->has('details'))
                                                    <span class="text-danger">{{ $errors->first('details') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Is-features*</label>
                                                <input type="checkbox" name="is_features"
                                                    @if ($Product->is_features == 1) checked @endif>
                                            </div>
                                            <div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Is-recommanded*</label>
                                                    <input type="checkbox" name="is_recommanded"
                                                        @if ($Product->is_recommanded == 1) checked @endif>
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
