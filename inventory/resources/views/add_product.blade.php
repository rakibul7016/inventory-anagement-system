@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Moltran</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Product</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="{{ URL::to('insert-product') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="product_name"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Code</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            name="product_code" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Catagories</label>
                                        @php
                                            $cat = DB::table('catagories')->get();
                                        @endphp
                                        <select name="cat_type" id="" class="form-control">
                                            @foreach ($cat as $row)
                                                <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Supplier</label>
                                        @php
                                            $sup = DB::table('suppliers')->get();
                                        @endphp
                                        <select name="sup_type" id="" class="form-control">
                                            @foreach ($sup as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Ware House</label>
                                        <input type="text" class="form-control" id="address" placeholder="Enter address"
                                            name="Ware_house">
                                    </div>
                                    <div class="form-group">
                                        <label for="exprience">Product Route</label>
                                        <input type="text" class="form-control" id="exprience" name="product_route"
                                            placeholder="Enter Shop Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Buy Date</label>
                                        <input type="date" class="form-control" id="salary" name="buy_date"
                                            placeholder="Enter Account Holder">
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Expire Date</label>
                                        <input type="date" class="form-control" id="salary" name="date"
                                            placeholder="Enter Account Holder">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">Buying Pice</label>
                                        <input type="text" class="form-control" id="city" name="buying_price"
                                            placeholder="Enter Bank Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="nid_no">Sellign Price</label>
                                        <input type="text" class="form-control" id="nid_no" name="selling_price"
                                            placeholder="Enter Bank Branch">
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <img src="#" alt="" id="image" />
                                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*"
                                            class="upload" onchange="readURL(this);">
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit"
                                        class="btn btn-purple waves-effect waves-light">Submit</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->

                </div>
                <!-- End row-->

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2015 © Moltran.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#image")
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
