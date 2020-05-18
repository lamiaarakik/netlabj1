@extends('layout.master')
@section('content')
<div class="nk-sidebar">
        <br>
        <h4>Ipv6 over Ipv4 Tunnels</h4><br>
        <div class="content1">
          <h5>Scenario</h5>
          Vous êtes le concepteur de réseau senior pour une grande entreprise spécialisée dans l'exportation de fruits. L'entreprise prévoit de mettre à niveau son réseau et de s'assurer qu'elle est prête pour l'avenir qu'elle souhaite mettre en œuvre IPv6. L'épine dorsale du réseau est cependant toujours basée sur IPv4 et vous n'êtes pas autorisé à apporter des modifications… voyons si vous pouvez atteindre la connectivité par tunneling…
          <h5>l'objectif</h5>
          faite une clique droite sur la topologie et accédez au formulaire :
          <ul><li>
Toutes les adresses IPv4 et IPv6 ont été préconfigurées pour vous.


</li>
          <li>
          Vous n'êtes pas autorisé à apporter des modifications au routeur Fruity.</li>
          <li>
OSPFv2 a été configuré dans le domaine IPv4 pour la connectivité entre les routeurs.</li>
          <li>
Configurez un tunnel IPv6 sur IPv4 entre le routeur Banana et Apple. Vous êtes autorisé à utiliser le préfixe 3000 :: / 64 pour l'interface du tunnel.</li>
<li>
        
Activez RIPNG sur le routeur Melon, Banana, Apple et Kiwi.</li> 
<li>

Assurez-vous d'avoir une connectivité complète entre le réseau 2000 :: / 64 et 4000 :: / 64.</li>  </ul></div>
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
                                        { click: function(){ return window.location.replace("http://localhost:8000/Ip6OverIp4Form"); } })
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
                        { key: "1",              name: "Fruity",   source: "./images/router.png" , loc: "300 100" },
                        { key: "2", parent: "1", name: "Banana",    source: "./images/router.png", loc: "100 300"  },
                        { key: "3", parent: "1", name: "Apple",    source: "./images/router.png", loc: "400 300"  },
                        { key: "4", parent: "3", name: "kiwi",    source: "./images/router.png", loc: "400 400"  },
                        { key: "5", parent: "2", name: "melon",    source: "./images/router.png", loc: "100 400"  },


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