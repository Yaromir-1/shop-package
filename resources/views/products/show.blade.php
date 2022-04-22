<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product</h2>
        </div>
    </div>
</div>

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category_id</th>
    </tr>
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->category_id}}</td>
    </tr>
</table>
</body>
</html>
