@extends('layout.master')
@section('content')
    <div class="nk-sidebar">
<br>
        <h4>ipv6 over ipv4 tunnel</h4><br>
        <div class="content1">

        this lab blablablabla</div>
    </div>
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
             <!--<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>-->
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('Ip6Tunnel.create')}}" method="post" id="step-form-horizontal" class="step-form-vertical">
                    {{ csrf_field() }}
                    <div>
                        <h4>Equipement access</h4>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control" placeholder="name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="password" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="ip_address4" class="form-control" placeholder="IP Address version 4" required>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <h4>Configuration</h4>
                        <section>
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" name="ip_address6" class="form-control" placeholder="IP Address version 4" required>
                                </div>
                            </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="interface" class="form-control" placeholder="interface" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="tunnel_source" class="form-control" placeholder="Tunnel source" required>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="tunnelMode" class="form-control" placeholder="Tunnel mode" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name=" tunnelDestinsation" class="form-control" placeholder=" Tunnel Destinsation" required>
                                    </div>
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
