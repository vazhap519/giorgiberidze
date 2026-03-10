<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>New Contact Message</title>
</head>

<body style="margin:0;padding:0;background:#f1f5f9;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
<tr>
<td align="center">

<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 5px 20px rgba(0,0,0,0.08);">

<tr>
<td style="background:#2563eb;color:#ffffff;padding:20px 30px;font-size:20px;font-weight:bold;">
📩 New Contact Message
</td>
</tr>

<tr>
<td style="padding:30px;">

<table width="100%" cellpadding="8">

<tr>
<td style="font-weight:bold;width:140px;">Name</td>
<td>{{ $data['name'] ?? '' }}</td>
</tr>

<tr>
<td style="font-weight:bold;">Email</td>
<td>{{ $data['email'] ?? '' }}</td>
</tr>

<tr>
<td style="font-weight:bold;">Phone</td>
<td>{{ $data['phone'] ?? '' }}</td>
</tr>

@if(!empty($data['service']))
<tr>
<td style="font-weight:bold;">Service</td>
<td>{{ $data['service'] }}</td>
</tr>
@endif

@if(!empty($data['address']))
<tr>
<td style="font-weight:bold;">Address</td>
<td>{{ $data['address'] }}</td>
</tr>
@endif

@if(!empty($data['message']))
<tr>
<td style="font-weight:bold;vertical-align:top;">Message</td>
<td>{{ $data['message'] }}</td>
</tr>
@endif

</table>

</td>
</tr>

<tr>
<td style="background:#f8fafc;padding:15px;text-align:center;font-size:12px;color:#64748b;">
Message sent from <strong>eyenet.ge</strong>
</td>
</tr>

</table>

</td>
</tr>
</table>

</body>
</html>