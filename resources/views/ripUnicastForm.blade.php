@extends('layout.master')
@section('content')
<div class="nk-sidebar">
        <br>
        <h4>RIP Unicast</h4><br>
        <div class="content1">
          <h5>Scenario</h5>
          Vous êtes l'ingénieur réseau junior d'une entreprise vendant des jeux vidéo. La société dispose d'un petit réseau exécutant RIP entre ses routeurs. Il semble que quelque chose ne va pas avec le trafic de multidiffusion RIP. Pensez-vous pouvoir résoudre ce jeu?
          <h5>l'objectif</h5>
          faite une clique droite sur la topologie et accédez au formulaire :
          <ul><li>Toutes les adresses IP ont été préconfigurées pour vous.


</li>
          <li>
          Les deux routeurs ont une interface de bouclage comme suit:
Jeu: 1.1.1.1/24
Plus de: 2.2.2.2/24</li>
          <li>Configurez RIP version 2 sur les deux routeurs, obtenez une connectivité complète pour tous les réseaux (y compris les bouclages).</li>
          <li>Vous n'êtes pas autorisé à envoyer des paquets RIP par multidiffusion ou diffusion.</li>
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
                <form action="{{route('ripUnicast.create')}}" method="post" id="step-form-horizontal" class="step-form-horizontal">
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
                        <h4>Rip Unicast</h4>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="network" class="form-control" placeholder="network" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="version" class="form-control" placeholder="version" required>
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