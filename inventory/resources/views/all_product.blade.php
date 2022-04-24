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
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Datatable</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Selling Price</th>
                                                    <th>Image</th>
                                                    <th>Garage</th>
                                                    <th>Route</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach (  $product as $row )
                                                <tr>
                                                    <td>{{ $row->product_name }}</td>
                                                    <td>{{ $row->product_code }}</td>
                                                    <td>{{ $row->selling_price }}</td>

                                                    <td ><img src="{{ asset($row->product_image) }}" alt=""style="height:80px; width:80px;"></td>
                                                    <td>{{ $row->product_garage }}</td>
                                                    <td>
                                                        <td>{{ $row->product_route }}</td>
                                                    <td>
                                                        <a href="{{ url('/edit-employee/'.$row->id) }}" class="btn btn-primary">Edit</a>
                                                        <a href="{{ url('/delete-product/'.$row->id) }}" class="btn btn-danger">Delete</a>
                                                        <a href="{{ url('/view-product/'.$row->id) }}" class="btn btn-success">View</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row-->

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2015 © Moltran.
        </footer>

    </div>

@endsection
