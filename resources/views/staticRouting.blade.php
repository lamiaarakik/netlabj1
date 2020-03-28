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
      
      new go.Binding("source")),
      $(go.TextBlock,
      { height: 90, verticalAlignment: go.Spot.Top, stroke: "black", font: "bold 10px sans-serif" ,margin: 2  },
      new go.Binding("text", "name",),{verticalAlignment: go.Spot.Top, stroke: "black", font: "bold 16px sans-serif" ,margin: 10 }),
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
    $(go.Link,       // the whole link panel
      $(go.Shape)  // the link shape, default black stroke
    ); // the link shape

var model = $(go.TreeModel);
model.nodeDataArray =
[ // the "key" and "parent" property names are required,
  // but you can add whatever data properties you need for your app
  { key: "1", parent:"5"  ,      name: "192.168.3.5",   source: "./images/router.png" , loc: "800 150" },
  { key: "2", name: "",    source: "./images/serial.png", loc: "550 150"  },
  { key: "3", name: "",    source: "./images/serial.png", loc: "550 145"  },
  { key: "4",parent:"5" ,          name: "192.168.3.4",   source: "./images/router.png" , loc: "370 150" },
  { key: "5", name: "",   source: "./images/switch.png" , loc: "550 250" },

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