<!DOCTYPE html>
<html>
<head>
    <title>New Appointment Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            margin: 8px 0;
        }
        .content strong {
            color: #007BFF;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #666;
            border-top: 1px solid #ddd;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>PhysioFitness Clinic</h1>
            <p>Your trusted partner in physical therapy and wellness</p>
        </div>
        <div class="content">
            <h2>New Appointment Created</h2>
            <p><strong>Name:</strong> {{ $appointment->name }}</p>
            <p><strong>Email:</strong> {{ $appointment->email }}</p>
            <p><strong>Phone:</strong> {{ $appointment->phone }}</p>
            <p><strong>Age:</strong> {{ $appointment->age }}</p>
            <p><strong>Message:</strong> {{ $appointment->message ?? 'No message provided' }}</p>
            <p>Thank you for choosing <strong>PhysioFitness</strong> for your therapy needs. We look forward to providing excellent care.</p>
        </div>
        <div class="footer">
            <p>PhysioFitness Clinic, Rajkot</p>
            <p><a href="mailto:info@physiofitnessrajkot.com">info@physiofitnessrajkot.com</a> | <a href="tel:+911234567890">+91 12345 67890</a></p>
            <p>&copy; {{ date('Y') }} PhysioFitness. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
