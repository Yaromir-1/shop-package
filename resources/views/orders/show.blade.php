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
            <h2>Order</h2>
        </div>
    </div>
</div>

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Paid_at</th>
        <th>Paid_amount</th>
        <th>Client_id</th>
    </tr>
    <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->paid_at}}</td>
        <td>{{$order->paid_amount}}</td>
        <td>{{$order->client_id}}</td>
    </tr>
</table>
</body>
</html>
