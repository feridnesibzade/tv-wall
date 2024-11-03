<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #2a9df4;
        }

        .section {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Order Details</h2>

        <!-- Customer Information -->
        <div class="section">
            <h3>Customer Information</h3>
            <p><span class="label">Full Name:</span> {{ $data['fullname'] }}</p>
            <p><span class="label">Phone:</span> {{ $data['phone'] }}</p>
            <p><span class="label">Email:</span> {{ $data['email'] }}</p>
            <p><span class="label">Address:</span> {{ $data['address'] }}<br>
                {{ $data['address_detail'] }}</p>
            <p><span class="label">City:</span> {{ $data['city']['title'] }}</p>
            <p><span class="label">Zip Code:</span> {{ $data['zip_code'] }}</p>
        </div>

        <!-- Order Details -->
        <div class="section">
            <h3>Order Details</h3>
            <p><span class="label">Order Date:</span> {{ $data['date'] }}</p>
            <p><span class="label">Preferred Time:</span> {{ implode(', ', json_decode($data['time'], true)) }}</p>
            <p><span class="label">Lift Assistance:</span> {{ $data['lift_assistance_title'] }}</p>
        </div>

        <!-- TV and Wall Specifications -->
        <div class="section">
            <h3>TV and Wall Specifications</h3>
            <p><span class="label">TV Size:</span> {{ $data['tv_size']['title'] }} inches</p>
            <p><span class="label">Wall Mount:</span> {{ $data['wall_mount']['title'] }}</p>
            <p><span class="label">Wall Type:</span> {{ $data['wall_type']['title'] }}</p>
            <p><span class="label">Extra Service:</span> {{ $data['extra_service']['title'] }}</p>
        </div>

        <!-- Pricing (if needed) -->
        <div class="section">
            <h3>Pricing Summary</h3>
            <p><span class="label">TV Size Price:</span> ${{ $data['tv_size']['price'] }}</p>
            <p><span class="label">Wall Mount Price:</span> ${{ $data['wall_mount']['price'] }}</p>
            <p><span class="label">Wall Type Price:</span> ${{ $data['wall_type']['price'] }}</p>
            <p><span class="label">Extra Service Price:</span> ${{ $data['extra_service']['price'] }}</p>
            <p><strong>Total Price:</strong>
                ${{ $data['tv_size']['price'] + $data['wall_mount']['price'] + $data['wall_type']['price'] + $data['extra_service']['price'] }}
            </p>
        </div>
    </div>
</body>

</html>
