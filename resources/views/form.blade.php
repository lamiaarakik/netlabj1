<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=2.0, minimum-scale=2.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
  body {
    margin:50px 50px; padding:0px;
    text-align:center;
    align:center;
}
label,input {
 display: block;
 width: 150px;
 float: left;
 margin-bottom: 10px;
}
br {
 clear: left;
}
    </style>
    
    <title>Loopback configuration</title>
    </head>
    <body>
    <h1> Loopback configuration</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-nd-6">
                <form action="{{route('loopback.create')}}" method="post">
                {{ csrf_field() }}
                <div class="row form-group"> 
                    <div class="col-nd-12">
                        <label for=""> name: </label>
                        <input type="text" name="name" class="form-control" required> <br>
                    </div>
                </div>
                <div class="row form-group"> 
                    <div class="col-nd-12">
                        <label for=""> password: </label>
                        <input type="password" name="password" class="form-control" required><br>
                    </div>
                </div>
                <div class="row form-group"> 
                    <div class="col-nd-12">
                        <label for=""> ip address: </label>
                        <input type="text" name="ip_address" class="form-control" required><br>
                    </div>
                </div>
                <div class="row form-group"> 
                    <div class="col-nd-12">
                        <label for=""> loopback address: </label>
                        <input type="text" name="loopback_address" class="form-control" required><br>
                    </div>
                </div>
                <div class="row form-group"> 
                    <div class="col-nd-12">
                        <label for=""> Loopback mask </label>
                        <input type="text" name="loopback_mask" class="form-control" required><br>
                    </div>
                </div>
                <div class="row form-group">
                <div class="col-nd-12">
                <button type="submit" class="btn btn-success W-50  "> Confirmer</button>
                </div>
                </div>
                </form>
            </div>
         
    </div>


    </body>
    </html>
