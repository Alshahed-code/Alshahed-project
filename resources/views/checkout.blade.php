@extends('layouts.app')

@section('content')
<div class="container">
    <h2>صفحة الشحن والدفع</h2>

    <form action="{{ route('checkout.getRates') }}" method="POST">
        @csrf
        
        <div>
            <label>الاسم الكامل:</label>
            <input type="text" name="name"  required>
        </div>

        <div>
            <label>البريد الإلكتروني:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>رقم الهاتف:</label>
            <input type="text" name="phone" required>
        </div>

        <div>
            <label>العنوان (شارع):</label>
            <input type="text" name="street1" required>
        </div>

        <div>
            <label>مدينة:</label>
            <input type="text" name="city" required>
        </div>

        <div>
            <label>ولاية/إقليم:</label>
            <input type="text" name="state" required>
        </div>

        <div>
            <label>رمز بريدي:</label>
            <input type="text" name="zip" required>
        </div>

        <div>
            <label>دولة:</label>
            <input type="text" name="country" required>
        </div>

        <!-- وزن السلة يمرر كمعلومة مخفية -->
        <input type="hidden" name="weight" value="{{ $totalWeight }}">

        <button type="submit">حساب أسعار الشحن</button>
        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>
@endsection