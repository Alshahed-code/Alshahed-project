@extends('layouts.app')

@section('content')
<div class="container">
    <h2>خيارات Sendle المتاحة:</h2>

    @if(count($rates) > 0)
        <ul>
            @foreach($rates as $rate)
                <li>
                    شركة: {{ $rate['provider'] }} |
                    خدمة: {{ $rate['servicelevel']['name'] }} |
                    السعر: {{ $rate['amount'] }} {{ $rate['currency'] }} |
                    مدة التوصيل: {{ $rate['estimated_days'] ?? 'غير معروف' }} يوم
                </li>
            @endforeach
        </ul>
    @else
        <p>لا توجد خيارات Sendle متاحة لهذا العنوان.</p>
    @endif
</div>
@endsection