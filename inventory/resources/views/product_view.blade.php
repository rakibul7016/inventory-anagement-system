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
                                <h3 class="panel-title">View Product</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <p>{{ $single->product_name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Code</label>
                                        <p>{{ $single->product_code }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Catagories</label>
                                        <p>{{ $single->cat_name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Suppliers</label>
                                        <p>{{ $single->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Product Ware House</label>
                                        <p>{{ $single->product_garage }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Product Route</label>
                                        <p>{{ $single->product_route }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Buy Date</label>
                                        <p>{{ $single->buy_date }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Expire Date</label>
                                        <p>{{ $single->expire }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Buying Price</label>
                                        <p>{{ $single->buying_price }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Selling price</label>
                                        <p>{{ $single->selling_price }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Product Image</label><br>

                                        <img style="height:80px; width:80px;" src="{{ url($single->product_image) }}" alt="" id="image" />
                                    </div>
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
