<!DOCTYPE html>
<html>
<head>
    <title>Order PDF</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        td, th { padding: 10px; border: 1px solid #ccc; text-align: left; }
    </style>
</head>
<body>
    <h2>Order Details</h2>
    <table>
        <tr>
            <th>Name</th>
            <td>{{ $order->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $order->email }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $order->address }}</td>
        </tr>
        <tr>
            <th>Product</th>
            <td>{{ $order->product_title }}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{ $order->quantity }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $order->price }}</td>
        </tr>
        <tr>
            <th>Payment Status</th>
            <td>{{ $order->payment_status }}</td>
        </tr>
        <tr>
            <th>Delivery Status</th>
            <td>{{ $order->delivery_status }}</td>
        </tr>
    </table>
</body>
</html>
