@extends('layout.master')
@section('content')
<div class="nk-sidebar">
        <br>
        <h4>Le Routage Dynamique</h4><br>
        <div class="content1">
          <h5>Scenario</h5>
          Pendant la journée, vous travaillez en tant qu'ingénieur réseau junior étudiant CCNA. Pendant la nuit, vous êtes actif en tant que combattant respectable et bon nombre de vos matchs sont enregistrés sur vidéo. Certains de vos fans ont demandé vos vidéos et vous voulez vous assurer de pouvoir les diffuser sur le réseau. Vous allez configurer OSPF pour une connectivité complète… gardez vos fans heureux, livrez les vidéos et étudiez pour CCNA en même temps! Voyez si vous pouvez vous frayer un chemin à travers celui-ci…
          <h5>l'objectif</h5>
          aite une clique droite sur la topologie et accédez au formulaire :
          <ul><li>Toutes les adresses IPv4 ont été préconfigurées pour vous.


</li>
          <li>
          Chaque routeur possède une interface loopback0.</li>
          <li>Configurez la zone OSPF 0 sur le routeur Durden, Paulson et Chesler. Annoncez les interfaces loopback0 et assurez-vous d'avoir une connectivité.</li>
          <li>Configurez la zone OSPF 1 sur le routeur Singer, Bird et Dent. Annoncez les interfaces loopback0</li>
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
    myDiagram.add(
    $(go.Part, "Vertical",
      { position: new go.Point(0, 0), background: "CornflowerBlue", width: 400, height:450},
     
    ));
    myDiagram.add(
    $(go.Part, "Vertical",
      { position: new go.Point(400, 100), background: "AntiqueWhite", width: 650, height:350},
     
    ));
// the template we defined earlier
myDiagram.nodeTemplate =
  $(go.Node, "Horizontal", { locationSpot: go.Spot.Center },
          new go.Binding("location", "loc", go.Point.parse),
    {},
    $(go.Picture,
      
      new go.Binding("source")),
      $(go.TextBlock,
      { height: 40, verticalAlignment: go.Spot.Top, stroke: "black", font: "bold 16px sans-serif"  },
      new go.Binding("text", "name")),
      {
        contextMenu:     // define a context menu for each node
          $("ContextMenu",  // that has one button
            $("ContextMenuButton",
              $(go.TextBlock, "Configurer"),
              { click: function(){ return window.location.replace("http://localhost:8000/dynamicform"); } })
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
    $(go.Link,       // the whole link panel
      $(go.Shape,{strokeWidth: 3}),  // the link shape, default black stroke
    ); // the link shape

var model = $(go.TreeModel);
model.nodeDataArray =
[ // the "key" and "parent" property names are required,
  // but you can add whatever data properties you need for your app
  { key: "1" ,       source: "./images/router.png" , loc: "600 350" },
  { key: "2", parent:"1"  ,       source: "./images/router.png" , loc: "1000 350" },
  { key: "3", name: "",    source: "./images/serial.png", loc: "780 350"  },
  { key: "4", name: "",parent:"1" ,  source: "./images/switch.png" , loc: "600 150" },
  { key: "5", parent:"4"  ,       source: "./images/router.png" , loc: "800 150" },
  { key: "6", parent:"4"  ,       source: "./images/router.png" , loc: "400 150" },
  { key: "7", name: "",parent:"6"  , source: "./images/switch.png" , loc: "200 150" },
  { key: "8", parent:"7"  ,       source: "./images/router.png" , loc: "200 350" },
  { key: "9", parent:"7"  ,       source: "./images/router.png" , loc: "200 50" },
  { key: "10", name:"OSPF area 1" ,loc: "1000 150" },
  { key: "11", name:"OSPF area 0" ,loc: "290 47" },
];
myDiagram.model = model;
      
myDiagram.undoManager.isEnabled = true;

    } </script>
   
  
    
    
    <title>CCNA OSPF Topology</title>
    </head>
    <body onload="init()">
    <div id="myDiagramDiv"
     style="width:1500px; height:500px; background-color: white;"></div>
    </body>

@endsection