<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cairo Customers</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 30px; }
        h1 { color: #333; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        th { background: #9b59b6; color: white; padding: 12px 16px; text-align: left; }
        td { padding: 12px 16px; border-bottom: 1px solid #eee; }
        tr:hover { background: #f9f9f9; }
    </style>
</head>
<body>
    <h1> Customers from Cairo</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
        </tr>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $customer->customerName }}</td>
            <td>{{ $customer->customerEmail }}</td>
            <td>{{ $customer->customerPhone }}</td>
            <td>{{ $customer->customerCity }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
