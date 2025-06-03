<form action="{{ route('checkout.getRates') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="الاسم الكامل" required>
    <input type="email" name="email" placeholder="البريد" required>
    <input type="text" name="phone" placeholder="الهاتف" required>
    <input type="text" name="street1" placeholder="الشارع" required>
    <input type="text" name="city" placeholder="المدينة" required>
    <input type="text" name="state" placeholder="الولاية" required>
    <input type="text" name="zip" placeholder="الرمز البريدي" required>
    <input type="text" name="country" value="US" required>

    <button type="submit">عرض أسعار الشحن</button>
</form>