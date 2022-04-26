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
                    <div class="col-sm-12 bg-info text-white">
                        <h4 class="pull-left page-title ">Pos (Point OF Sell)</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Echolae</a></li>
                            <li class="active">{{ date('d/m/y') }}</li>
                        </ol>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="portfolioFilter">
                            @foreach ($catagory as $row)
                                <a href="#" data-filter="*" class="current">{{ $row->cat_name }}</a>
                            @endforeach


                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">

                        <div class="price_card text-center">
                            <ul class="price-features">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Single price</th>
                                            <th>Sub Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    @php
                                        $Cart_product = Cart::content();
                                    @endphp
                                    <tbody>
                                        @foreach ($Cart_product as $pord )
                                        <tr>
                                            <td>{{ $pord->name }}</td>
                                            <td>
                                                <form action="{{ url('/cart-update/'.$pord->rowId) }}" method="post">
                                                    @csrf
                                                    <input type="text" style="width:30px;" value="{{ $pord->qty  }}" name="qty">
                                                    <button style="margin-top:-6px" class="btn btn-success" type="submit"><i
                                                            class="fa fa-check " ></i></button>
                                                </form>
                                            </td>
                                            <td>{{ $pord->price }}</td>
                                            <td>{{ $pord->qty*$pord->price }}</td>
                                            <td><a href=" {{ url('/cart-remove/'.$pord->rowId) }} "><i class="fa fa-trash"></i></a></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </ul>
                            <div class="pricing-header bg-primary">
                                <p class="h3">Quantity:{{ cart::count(); }}</p>
                                <p class="h3">Sub Total:{{ cart::subtotal(); }}</p>
                                <p >Vat:{{ cart::tax(); }}</p>
                                <hr>
                                <h3>Total:</h3>
                                <h2>{{ cart::total() }}</h2>

                            </div>
                            <form action="{{ url('/creat-invoice') }}">
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
                                <div class="panel ">
                                    <h4 class="text-info shadow "> Customer
                                        <a href="" class="btn btn-primary pull-right waves-effect waves-light" data-toggle="modal"
                                            data-target="#con-close-modal">Add New</a>
                                    </h4>
                                    <select name="cus_id" id="" class="form-control">
                                        @foreach ($customer as $cus)
                                            <option value="{{ $cus->id }}">{{ $cus->customer_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Creat
                                Invoice</button>
                        </div>
                    </div>
                </form>
                    <div class="col-md-6">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Catagories</th>
                                    <th>Product Code</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($product as $row)
                                    <tr>
                                        <form action="{{ route('add.cart') }} " method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                            <input type="hidden" name="name" value="{{ $row->product_name }}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="price" value="{{ $row->selling_price }}">
                                        <td>
                                            {{-- <a href="" class="f-3"><i class="fa fa-plus"></i></a> --}}
                                            <img src="{{ asset($row->product_image) }}" alt=""
                                                style="height:60px; width:60px;">
                                        </td>
                                        <td>{{ $row->product_name }}</td>
                                        <td>{{ $row->cat_name }}</td>
                                        <td>{{ $row->product_code }}</td>
                                        <td><button type="submit" class="btn btn-info"><i class="fa fa-plus"></i></button></td>
                                    </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2015 © Moltran.
        </footer>

    </div>
    {{-- Modal --}}
    <form action="{{ route('insert.customer') }}" method="post" enctype="multipart/form-data">
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
        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add Customer</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Customer Name</label>
                                    <input type="text" class="form-control" id="field-4" name="customer_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Email</label>
                                    <input type="email" class="form-control" id="field-5" name="email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Phone</label>
                                    <input type="text" class="form-control" id="field-6" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Shop Name</label>
                                    <input type="text" class="form-control" id="field-4" name="shop_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Account Holdder</label>
                                    <input type="text" class="form-control" id="field-5" name="account_holder">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Account Number</label>
                                    <input type="text" class="form-control" id="field-6" name="account_number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Bank Name</label>
                                    <input type="text" class="form-control" id="field-4" name="bank_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Bank Branch</label>
                                    <input type="text" class="form-control" id="field-5" name="bank_branch">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">City</label>
                                    <input type="text" class="form-control" id="field-6" name="city">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Address</label>
                                    <input type="text" class="form-control" id="field-4" name="address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Photo</label>
                                    <img src="#" alt="" id="image" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="photo">Photo</label>

                                <input type="file" class="" id="photo" name="photo" accept="image/*"
                                    class="upload" onchange="readURL(this);">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Submite</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
    </script><!-- /.modal -->
@endsection
