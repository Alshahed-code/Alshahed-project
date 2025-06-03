<h2>Select a Shipping Method</h2>
<form method="POST" action="/checkout">
    @csrf
    @foreach ($rates as $rate)
    <div style="margin-bottom: 15px;">
    <input type="radio" name="rate_id" value="{{ $rate['object_id'] }}" required>
    <strong>{{ $rate['provider'] }}</strong> - {{ $rate['servicelevel']['name'] }}
    (${{ $rate['amount'] }})
    Est. Delivery: {{ $rate['estimated_days'] ?? 'N/A' }} days
    </div>
    @endforeach
    <button type="submit">Generate Shipping Label</button>
</form>
