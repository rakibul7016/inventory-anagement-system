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
                                <h3 class="panel-title">Edit Customert</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="{{ URL::to('update-customer') }}" method="post"
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
                                        <label for="exampleInputEmail1">Customer Name</label>
                                        <input type="text" class="form-control" id="name" name="customer_name"
                                           value="{{ $edit->customer_name }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                        value="{{ $edit->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ $edit->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address"  value="{{ $edit->address }}"
                                            name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="exprience">Shop Name</label>
                                        <input type="text" class="form-control" id="exprience" name="shop_name"
                                        value="{{ $edit->shop_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Account Holder</label>
                                        <input type="text" class="form-control" id="salary" name="account_holder"
                                        value="{{ $edit->account_holder }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Number</label>
                                        <input type="text" class="form-control" id="vacation" name="account_number"
                                        value="{{ $edit->account_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">Bank Name</label>
                                        <input type="text" class="form-control" id="city" name="bank_name"
                                        value="{{ $edit->bank_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nid_no">Bank Branch</label>
                                        <input type="text" class="form-control" id="nid_no" name="bank_branch"
                                        value="{{ $edit->bank_branch }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nid_no">City</label>
                                        <input type="text" class="form-control" id="nid_no" name="city"
                                        value="{{ $edit->city }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">New Photo</label>
                                        <img src="#" alt="" id="image" />
                                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*"
                                            class="upload" onchange="readURL(this);">
                                    </div>
                                    <div class="form-group">
                                        <img name="old_photo" style="height:80px; width:80px;" src="{{ url($edit->photo) }}" alt="" id="image" />
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
