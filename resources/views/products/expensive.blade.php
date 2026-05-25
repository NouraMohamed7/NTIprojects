<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Expensive Products</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 30px; }
        h1 { color: #333; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        th { background: #e67e22; color: white; padding: 12px 16px; text-align: left; }
        td { padding: 12px 16px; border-bottom: 1px solid #eee; }
        tr:hover { background: #f9f9f9; }
    </style>
</head>
<body>
    <h1> Products over $100</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->desc }}</td>
            <td>${{ $product->price }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
