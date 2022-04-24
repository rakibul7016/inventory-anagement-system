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
                            <div class="panel-heading bg-info">
                                <h3 class="panel-title">Add Advance Salary</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="{{URL::to('insert-advance-salary')}}" method="post"
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
                                        <label for="address">Employee</label>
                                        <select name="type" id="" class="form-control">
                                            @foreach ( $salary as $row )
                                            <option >Enter type</option>
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Month</label>
                                        <select name="month" id="" class="form-control">
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">Jun</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Advance Salary</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="advance_salary"
                                            placeholder="Enter Advance salary">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Year</label>
                                        <input type="text" class="form-control" id="phone" name="year"
                                            placeholder="Enter phone">
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
@endsection
