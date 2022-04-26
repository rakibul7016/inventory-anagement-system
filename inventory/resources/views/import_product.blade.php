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
                        <div class="panel panel-default ">

                            <div class="panel-heading panel-heading-info ">
                                <h3 class="panel-title">Import Product</h3>
                                <a href="{{ route('export') }}" class="btn btn-info pull-right ">Download File</a>

                            </div>

                            <div class="panel-body">
                                <form role="form" action="{{ route('import')}}" method="post"
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
                                        <label for="address">Import Xlsx File</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1" name="import_file"
                                       required>
                                    </div>
                                    <button type="submit" name="submit"
                                        class="btn btn-purple waves-effect waves-light">Upload</button>
                                </form>
                            </div><!-- panel-body -->
                            <p class="text-danger"> Plase Download the xlsx file clear it| Now write your all product by listing and import it  again |Thank you</p>
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
@endsection
