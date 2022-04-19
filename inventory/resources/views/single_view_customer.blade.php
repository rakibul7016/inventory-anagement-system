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
                                <h3 class="panel-title">View Customer</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Customer Name</label>
                                        <p>{{ $single->customer_name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <p>{{ $single->email }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                        <p>{{ $single->phone }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <p>{{ $single->address }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exprience">Shop Name</label>
                                        <p>{{ $single->shop_name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Account_holder</label>
                                        <p>{{ $single->account_holder }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">account_number</label>
                                        <p>{{ $single->account_number }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">Bank Name</label>
                                        <p>{{ $single->bank_name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="nid_no">bank_branch</label>
                                        <p>{{ $single->bank_branch }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="nid_no">City</label>
                                        <p>{{ $single->city }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Photo</label><br>

                                        <img style="height:80px; width:80px;" src="{{ url($single->photo) }}" alt="" id="image" />
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
