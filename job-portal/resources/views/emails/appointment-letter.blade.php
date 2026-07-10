<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Letter</title>
    <style>
        /* Embedded CSS to ensure cross-client email compatibility */
        body {
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f8fafc;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            background-color: #ffffff;
            margin: 0 auto;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }
        .header {
            background-color: #4f46e5;
            padding: 32px;
            text-align: center;
        }
        .header h2 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.5px;
            text-transform: uppercase;
        }
        .content {
            padding: 40px 32px;
            color: #334155;
            line-height: 1.6;
            font-size: 15px;
        }
        .greeting {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 20px;
        }
        .highlight-box {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 12px;
            padding: 20px;
            margin: 24px 0;
            text-align: center;
        }
        .position-title {
            color: #166534;
            font-size: 18px;
            font-weight: 800;
            display: block;
            margin-top: 4px;
        }
        .footer {
            padding: 32px;
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 13px;
        }
        .company-name {
            font-weight: 700;
            color: #334155;
        }
        .contact-info {
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px dashed #e2e8f0;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <div class="container">
            
            <!-- Email Header banner -->
            <div class="header">
                <h2>Appointment Letter</h2>
            </div>

            <!-- Main Body Content -->
            <div class="content">
                <p class="greeting">Dear {{ $application->user->name }},</p>
                
                <p>Congratulations!</p>
                
                <p>We are structuralizing our team expansion and it is an absolute pleasure to extend our formal selection criteria your way.</p>

                <!-- Premium Focus Box for Job Position -->
                <div class="highlight-box">
                    <span style="color: #15803d; font-size: 12px; font-weight: 700; text-transform: uppercase; tracking-wider: 0.1em;">Official Offer</span>
                    <span class="position-title">{{ $application->job->title }}</span>
                </div>

                <p>You have been officially selected to join our organization. Our core operational environment thrives on brilliant minds, and we are confident your skills will drive our values forward.</p>
                
                <p>Please contact us using the communication metrics below for further deployment details and onboarding instructions.</p>
            </div>

            <!-- Email Footer and Sign-off metrics -->
            <div class="footer">
                <p style="margin: 0 0 4px 0;">Best Regards,</p>
                <p class="company-name" style="margin: 0;">{{ $company->company_name ?? config('app.name') }}</p>
                
                <!-- Dynamic Company Phone Integration -->
                @if(!empty($company->company_phone))
                    <div class="contact-info">
                        <span style="color: #4f46e5; font-weight: 700;">Contact Support:</span> {{ $company->company_phone }}
                    </div>
                @endif
            </div>

        </div>
    </div>

</body>
</html>