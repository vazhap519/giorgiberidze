<h2>New Contact Message</h2>

<p><strong>Name:</strong> {{ $data['name'] ?? '' }}</p>

<p><strong>Email:</strong> {{ $data['email'] ?? '' }}</p>

<p><strong>Phone:</strong> {{ $data['phone'] ?? '' }}</p>

<p><strong>Service:</strong> {{ $data['service'] ?? '' }}</p>

<p><strong>Address:</strong> {{ $data['address'] ?? '' }}</p>

<p><strong>Message:</strong></p>

<p>{{ $data['message'] ?? '' }}</p>
