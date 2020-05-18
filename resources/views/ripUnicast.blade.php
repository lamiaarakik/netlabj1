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
    

    <head>
        <meta charset="UTF-8">

        <script src="https://unpkg.com/gojs/release/go-debug.js"></script>
        <script>
            function init(){
                var $ = go.GraphObject.make;
                var myDiagram =
                    $(go.Diagram, "myDiagramDiv",
                        {
                            "undoManager.isEnabled": true // enable Ctrl-Z to undo and Ctrl-Y to redo
                        });

// the template we defined earlier
                myDiagram.nodeTemplate =
                    $(go.Node, "Horizontal", { locationSpot: go.Spot.Center },
                        new go.Binding("location", "loc", go.Point.parse),
                        {},
                        $(go.Picture,
                            { margin: 20, width: 70, height: 70 },
                            new go.Binding("source")),
                        $(go.TextBlock, "Default Text",
                            {  stroke: "black", font: "bold 16px sans-serif" },
                            new go.Binding("text", "name")),
                        {
                            contextMenu:     // define a context menu for each node
                                $("ContextMenu",  // that has one button
                                    $("ContextMenuButton",
                                        $(go.TextBlock, "Configurer"),
                                        { click: function(){ return window.location.replace("http://localhost:8000/RipUnicastForm"); } })
                                    // more ContextMenuButtons would go here
                                )  // end Adornment
                        }
                    );
                myDiagram.contextMenu =
                    $("ContextMenu",
                        $("ContextMenuButton",
                            $(go.TextBlock, "Undo"),
                            { click: function(e, obj) { e.diagram.commandHandler.undo(); } },
                            new go.Binding("visible", "", function(o) {
                                return o.diagram.commandHandler.canUndo();
                            }).ofObject()),
                        $("ContextMenuButton",
                            $(go.TextBlock, "Redo"),
                            { click: function(e, obj) { e.diagram.commandHandler.redo(); } },
                            new go.Binding("visible", "", function(o) {
                                return o.diagram.commandHandler.canRedo();
                            }).ofObject()),
                        // no binding, always visible button:
                        $("ContextMenuButton",
                            $(go.TextBlock, "New Node"),
                            { click: function(e, obj) {
                                    e.diagram.commit(function(d) {
                                        var data = {};
                                        d.model.addNodeData(data);
                                        part = d.findPartForData(data);  // must be same data reference, not a new {}
                                        // set location to saved mouseDownPoint in ContextMenuTool
                                        part.location = d.toolManager.contextMenuTool.mouseDownPoint;
                                    }, 'new node');
                                } })
                    );
                myDiagram.linkTemplate =
                    $(go.Link,
                        { routing: go.Link.Orthogonal, corner: 5 },
                        $(go.Shape, { strokeWidth: 3, stroke: "#555" })); // the link shape
                var model = $(go.TreeModel);
                model.nodeDataArray =
                    [ // the "key" and "parent" property names are required,
                        // but you can add whatever data properties you need for your app
                        { key: "1",              name: "game",   source: "./images/router.png" , loc: "400 300" },
                        { key: "2", parent: "1", name: "over",    source: "./images/router.png", loc: "100 300"  },


                    ];
                myDiagram.model = model;

                myDiagram.undoManager.isEnabled = true;

            } </script>




        <title>Loopback Topology</title>
    </head>
    <body onload="init()">
    <div id="myDiagramDiv"
         style="width:1500px; height:500px; background-color: white;"></div>
    </body>

@endsection