<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Reply From Ecommerce</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #F4F4F4;">
    <div style="max-width: 600px; margin: auto; background-color: #FFFFFF; border: 1px solid #DDDDDD;">
        <div style="background-color: #007BFF; color: white; padding: 20px; text-align: center;">
            <h2> E-Commerce Notification</h2>
        </div>
        <div style="padding: 20px;">
            <h2 style="color: #333333;">Hi {{ $data['full_name'] ?? 'Customer' }}</h2>
            <p style="color: #555555;">We have received a new message from your contact query.</p>

            <p style="color: #555555;">
                Details:<br>
                <b>Phone Number:</b> {{ $data['phone_number'] ?? 'N/A' }}<br>
                <b>Email Address:</b> {{ $data['email_address'] ?? 'N/A' }}<br>
                <b>Order Number:</b> {{ $data['order_number'] ?? 'N/A' }}<br>
                <b>Company Name:</b> {{ $data['company_name'] ?? 'N/A' }}<br>
                <b>RMA Number:</b> {{ $data['rma_number'] ?? 'N/A' }}<br>
                <b>Comment:</b> {{ $data['comment'] ?? 'N/A' }}<br>
                <b>Reply:</b> {{ $data['reply'] ?? 'N/A' }}<br>
                <b>Reply at:</b> {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}<br>
                {{-- @if (isset($data['status']) && $data['status'] !== '')
                <b>Status:</b> {{ $data['status'] == 1 ? 'Active' : 'Inactive' }}<br>
                @endif --}}
            </p>

            <p style="color: #555555;">Best regards,<br> Team @ {{ url('/') }}</p>
        </div>

        <div style="background-color: #F4F4F4; padding: 10px; text-align: center; color: #999999;">
            &copy; 2024 Ecommerce.com. All rights reserved.
        </div>
    </div>
</body>

</html>