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
            <h2>Orders</h2>
        </div>
        <a class="btn btn-success" href="orders/create" title="Create order">Add Order</a>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Paid_at</th>
        <th>Paid_amount</th>
        <th>Client_id</th>
        <th></th>
    </tr>
    @foreach ($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->paid_at}}</td>
            <td>{{$order->paid_amount}}</td>
            <td>{{$order->client_id}}</td>
            <td>
                <a href="orders/{{$order->id}}/edit">
                    Update
                </a>
                <form action="{{ route('orders.destroy',['order' => $order]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="delete" style="border: none; background-color:transparent;">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
