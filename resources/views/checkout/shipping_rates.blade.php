<h2>أسعار الشحن:</h2>

@foreach($rates as $rate)
    <div>
        شركة الشحن: {{ $rate['provider'] }}<br>
        الخدمة: {{ $rate['servicelevel']['name'] }}<br>
        السعر: ${{ $rate['amount'] }} {{ $rate['currency'] }}<br>
        المدة: {{ $rate['estimated_days'] ?? 'غير معروف' }} يوم<br><br>
    </div>
@endforeach