@extends('layout.master')
@section('content')

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
              { click: function(){ return window.location.replace("http://localhost:8000/loopbackform"); } })
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
  { key: "1",              name: "192.168.3.5",   source: "./images/router.png" , loc: "650 150" },
  { key: "2", parent: "1", name: "",    source: "http://cliparts.co/cliparts/Aib/jRR/AibjRRBzT.png", loc: "500 300"  },
  
  
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