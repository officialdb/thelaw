<p><strong>New website inquiry</strong></p>

<p>
    Name: {{ $data['name'] }}<br>
    Email: {{ $data['email'] }}<br>
    Phone: {{ $data['phone'] ?? 'Not provided' }}
</p>

<p>{{ $data['message'] }}</p>
