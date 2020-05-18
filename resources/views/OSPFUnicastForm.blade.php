
@extends('layout.master')
@section('content')
    <div class="nk-sidebar">
        <br>
        <h4>ipv6 over ipv4 tunnel</h4><br>
        <div class="content1">

            this lab blablablabla</div>
    </div>
    <style>
        h4{
            font-family: "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-color: #6d53f8;
            text-decoration-color: #6d53f8;
            margin-top: 20px;
            margin-left: 10px;

        }
        .content1{
            margin-left: 10px;


        }


    </style>

    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('OSPFUnicast.create')}}" method="post" id="step-form-horizontal" class="step-form-horizontal">
                        {{ csrf_field() }}
                        <div>
                            <h4>Equipement access</h4>
                            <section>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="password" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="ip_address" class="form-control" placeholder="IP Address" required>
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <h4> eigrp Address</h4>
                            <section>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="network1" class="form-control" placeholder="network1" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="network2" class="form-control" placeholder="network2" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="neighborIp" class="form-control" placeholder="neighborIp" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="interface" class="form-control" placeholder="interface" required>
                                        </div>
                                    </div>


                                </div>
                            </section>

                            <h4>Confirmation</h4>
                            <section>
                                <div class="row h-100">
                                    <div class="col-12 h-100 d-flex flex-column justify-content-center align-items-center">
                                        <h2>You have submitted form successfully!</h2>
                                        <p>Thank you very much for you information. we will procceed accordingly.</p>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>

@endsection