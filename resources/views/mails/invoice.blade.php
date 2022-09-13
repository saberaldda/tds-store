<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Invoice #{{ $order->number }}</h3>
    <table style="align-items: center">
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price * $item->quantity }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>{{ $order->total }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>