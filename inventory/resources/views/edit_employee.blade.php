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
                                <h3 class="panel-title">Edit employee</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="{{ url('/update-employee/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" value="{{ $edit->name }}" class="form-control" id="name" name="name"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" value="{{ $edit->email }}" class="form-control" id="exampleInputEmail1" name="email"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                        <input type="text"value="{{ $edit->phone }}" class="form-control" id="phone" name="phone"
                                            placeholder="Enter phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" value="{{ $edit->address }}" class="form-control" id="address" placeholder="Enter address" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="exprience">Exprience</label>
                                        <input type="text"value="{{ $edit->exprience }}" class="form-control" id="exprience" name="exprience"
                                            placeholder="Enter exprience">
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Salary</label>
                                        <input type="text" value="{{ $edit->salary }}" class="form-control" id="salary" name="salary"
                                            placeholder="Enter salary">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vacation</label>
                                        <input type="text" value="{{ $edit->vacation }}" class="form-control" id="vacation" name="vacation"
                                            placeholder="Enter vacation">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" value="{{ $edit->city }}" class="form-control" id="city" name="city"
                                            placeholder="Enter city">
                                    </div>
                                    <div class="form-group">
                                        <label for="nid_no">Nid No</label>
                                        <input type="text" value="{{ $edit->nid_no }}" class="form-control" id="nid_no" name="nid_no"
                                            placeholder="Enter Nid No">
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
                                    <button type="submit" name="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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
