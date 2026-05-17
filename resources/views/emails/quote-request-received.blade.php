<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New quote request</title>
</head>
<body style="font-family: Arial, sans-serif; color: #061c45; line-height: 1.6;">
    <h1 style="font-size: 24px; margin-bottom: 8px;">New Crestwell Facilities quote request</h1>
    <p style="margin-top: 0;">A new enquiry has been submitted from the website.</p>

    <table cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 680px;">
        <tr>
            <td style="border: 1px solid #d8e1ec; font-weight: bold; width: 180px;">Name</td>
            <td style="border: 1px solid #d8e1ec;">{{ $lead->name }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #d8e1ec; font-weight: bold;">Company / property</td>
            <td style="border: 1px solid #d8e1ec;">{{ $lead->company ?: 'Not provided' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #d8e1ec; font-weight: bold;">Email</td>
            <td style="border: 1px solid #d8e1ec;"><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></td>
        </tr>
        <tr>
            <td style="border: 1px solid #d8e1ec; font-weight: bold;">Phone</td>
            <td style="border: 1px solid #d8e1ec;"><a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a></td>
        </tr>
        <tr>
            <td style="border: 1px solid #d8e1ec; font-weight: bold;">Service</td>
            <td style="border: 1px solid #d8e1ec;">{{ $lead->service }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #d8e1ec; font-weight: bold;">Property type</td>
            <td style="border: 1px solid #d8e1ec;">{{ $lead->propertyType ?: 'Not provided' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #d8e1ec; font-weight: bold;">Postcode / area</td>
            <td style="border: 1px solid #d8e1ec;">{{ $lead->postcode ?: 'Not provided' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #d8e1ec; font-weight: bold;">Message</td>
            <td style="border: 1px solid #d8e1ec;">{{ $lead->message ?: 'Not provided' }}</td>
        </tr>
    </table>
</body>
</html>
