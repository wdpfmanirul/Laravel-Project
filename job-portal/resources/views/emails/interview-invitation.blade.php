<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Interview Invitation</title>
</head>

<body style="margin:0; padding:0; background:#f4f5f7; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f5f7; padding:40px 0;">
    <tr>
        <td align="center">

            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 4px 25px rgba(0,0,0,0.05);">

                <tr>
                    
                    <td style="background:#4f46e5; padding:24px 40px; color:#ffffff;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="vertical-align: middle;">
                                    @php
                                        $company = $application->job->user->companyProfile ?? null;
                                    @endphp

                                    @if($company && $company->company_logo)

                                        <img src="{{ asset('storage/' . $company->company_logo) }}"
                                            alt="{{ $company->company_name }}"
                                            style="height:50px;width:50px;object-fit:cover;border-radius:8px;">

                                    @else

                                        <div style="background:rgba(255,255,255,0.2);width:45px;height:45px;border-radius:10px;text-align:center;line-height:45px;font-size:22px;">
                                            🏢
                                        </div>

                                    @endif
                                </td>
                                <td align="right" style="vertical-align: middle; color:#ffffff;">
                                    <h2 style="margin:0; font-size:20px; font-weight:800; line-height:1.2; letter-spacing: -0.5px;">
                                        {{ $company->company_name ?? 'Company Name' }}
                                    </h2>
                                    <p style="margin:4px 0 0 0; font-size:11px; opacity:0.85; letter-spacing: 1px; text-transform: uppercase; font-weight: 600;">
                                        Interview Invitation
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:40px; color:#1f2937;">
                        
                        <h3 style="margin-top:0; font-size:18px; font-weight:700; color:#111827;">Hello {{ $application->user->name }},</h3>

                        <p style="font-size:15px; line-height:1.6; color:#4b5563; margin-bottom:20px;">
                            We are pleased to inform you that you have been shortlisted for the following position:
                        </p>

                        <h2 style="color:#4f46e5; margin:0 0 30px 0; font-size:24px; font-weight:800; letter-spacing:-1px;">
                            {{ $application->job->title }}
                        </h2>

                        {{-- ইন্টারভিউ ডিটেইলস কার্ড --}}
                        <div style="background:#f8fafc; border:1px solid #e2e8f0; padding:24px; border-radius:16px; margin-bottom:30px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding-bottom:12px; font-size:14px; color:#64748b;" width="110">
                                        <strong>📅 Date</strong>
                                    </td>
                                    <td style="padding-bottom:12px; font-size:15px; color:#0f172a; font-weight:700;">
                                        {{ \Carbon\Carbon::parse($application->interview_date)->format('d M, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom:12px; font-size:14px; color:#64748b;">
                                        <strong>⏰ Time</strong>
                                    </td>
                                    <td style="padding-bottom:12px; font-size:15px; color:#0f172a; font-weight:700;">
                                        {{ \Carbon\Carbon::parse($application->interview_time)->format('h:i A') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px; color:#64748b; vertical-align:top;">
                                        <strong>📍 Location</strong>
                                    </td>
                                    <td style="font-size:15px; color:#4f46e5; font-weight:700; line-height:1.5;">
                                        @if(filter_var($application->interview_location, FILTER_VALIDATE_URL))
                                            <a href="{{ $application->interview_location }}" target="_blank" style="color:#4f46e5; text-decoration:none; border-bottom: 2px solid #4f46e5;">Join Online Meeting</a>
                                        @else
                                            <span style="color:#0f172a;">{{ $application->interview_location }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>

                        {{-- এমপ্লয়ার মেসেজ --}}
                        @if($application->interview_message)
                            <div style="margin-bottom:30px;">
                                <h4 style="margin:0 0 10px 0; font-size:12px; color:#94a3b8; font-weight:800; text-transform:uppercase; letter-spacing:1px;">Instructions:</h4>
                                <div style="font-size:14px; line-height:1.6; color:#475569; background:#fff7ed; padding:20px; border-radius:12px; border-left:5px solid #f97316; font-style:italic;">
                                    "{{ $application->interview_message }}"
                                </div>
                            </div>
                        @endif

                        <p style="font-size:15px; line-height:1.6; color:#4b5563; margin-bottom:30px;">
                            Please confirm your availability by replying to this email or through our portal. We look forward to meeting you.
                        </p>

                        {{-- ফুটার সাইন-অফ --}}
                        <table width="100%" cellpadding="0" cellspacing="0" style="border-top:1px solid #f1f5f9; padding-top:24px;">
                            <tr>
                                <td>
                                    <p style="margin:0; font-size:13px; color:#94a3b8; font-weight: 600; text-transform: uppercase;">Best regards,</p>
                                    <p style="margin:6px 0 0 0; font-size:18px; color:#1e293b; font-weight:800;">
                                        {{ $company->company_name ?? 'HR Department' }}
                                    </p>
                                    <p style="margin:2px 0 0 0; font-size:13px; color:#64748b;">
                                        {{ $company->industry_type ?? 'Company' }}
                                    </p>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                {{-- ইমেইল ফুটার --}}
                <tr>
                    <td style="background:#f8fafc; color:#94a3b8; text-align:center; padding:30px; font-size:12px; border-top: 1px solid #f1f5f9;">
                        <p style="margin:0 0 10px 0;">This is an automated email from JobPortal system.</p>
                        <p style="margin:0; font-weight: 700;">© {{ date('Y') }} {{ $company->company_name ?? 'JobPortal' }}. All rights reserved.</p>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>