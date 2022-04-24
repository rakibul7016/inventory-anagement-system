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
                                <h3 class="panel-title">Take Attendance</h3>
                            </div>
                            <h3 class="text-info text-center">Today: {{ date('d/m/y') }}</h3>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table  class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Photo</th>
                                                    <th>Attendance</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <form action="{{ route('insert.attendance') }}" method="post">
                                                    @csrf
                                                @foreach ( $employee as $row )
                                                <tr>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->phone }}</td>
                                                    <td ><img src="{{ asset($row->photo) }}" alt=""style="height:80px; width:80px;"></td>
                                                    <input type="hidden" name="user_id[]" value="{{ $row->id }}">
                                                    <td>
                                                        <input type="radio" name="attendance[{{ $row->id }}]" value="Present"> Present
                                                        <input type="radio" name="attendance[{{ $row->id }}]" value="Absence"> Absence

                                                    </td>
                                                    <input type="hidden" name="att_date" value="{{ date('d/m/y') }}">
                                                    <input type="hidden" name="att_year" value="{{ date('Y') }}">
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button class="btn btn-success align-center" name="submit" type="submit">Submit</button>
                                    </form>

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
