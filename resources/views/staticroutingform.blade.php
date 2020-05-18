@extends('layout.master')
@section('content')
<div class="nk-sidebar">
        <br>
        <h4>Le Routage Staique</h4><br>
        <div class="content1">
          <h5>Scenario</h5>
          Vous travaillez en tant que spécialiste du réseautage dans une entreprise appelée «ENSAJNETWORK». Un de leurs clients dispose de 2 liens dédiés pour connecter leur site de Casablanca au site d'Eljadida'. Vous n'êtes pas autorisé à utiliser des protocoles de routage, car ils paient pour chaque bit envoyé sur ces liens. Vous devez utiliser le routage statique pour faire le travail et garder le client satisfait..
          <h5>l'objectif</h5>
          aite une clique droite sur la topologie et accédez au formulaire :
          <ul><li>Toutes les adresses IP sont préconfigurées comme indiqué dans l'image de la topologie.</li>
          <li>
Il existe une interface Loopback0 sur le routeur Eljadida: adresse IP 2.2.2.2/30.
Il y a une interface Loopback0 sur le routeur de Casablanca: Adresse IP 1.1.1.1/30..</li>
          <li></li>
          <li></li>
          </ul></div>
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
            <form action="{{route('static.create')}}" method="post" id="step-form-horizontal" class="step-form-horizontal">
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
                    <h4>Loopback  Address</h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="loopback_address" class="form-control" placeholder="Loopback address" required>
                                </div>
                            </div>
                           
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="loopback_mask" class="form-control" placeholder="Loopback mask" required>
                                </div>
                            </div>
                           
                         
                        </div>
                    </section>
                    <h4>Serial0/0 Address</h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="serial0_address" class="form-control" placeholder="Serial0/0 ip address" required>
                                </div>
                            </div>
                           
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="serial0_mask" class="form-control" placeholder="Serial0/0 mask" required>
                                </div>
                            </div>
                           
                         
                        </div>
                    </section>
                    <h4>Serial1/0 Address</h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="serial1_address" class="form-control" placeholder="Serial1/0 ip address" required>
                                </div>
                            </div>
                           
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="serial1_mask" class="form-control" placeholder="Serial1/0 mask" required>
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