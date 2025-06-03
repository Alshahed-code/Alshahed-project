<h2>Enter Shipping Address</h2>
<form method="POST" action="{{ route('shipping.rates') }}">
 @csrf
 <label>Name:</label><br>
 <input type="text" name="name" required><br><br>
 <label>Street Address:</label><br>
 <input type="text" name="street" required><br><br>
 <label>City:</label><br>
 <input type="text" name="city" required><br><br>
 <label>Province:</label><br>
 <input type="text" name="province" required><br><br>
 <label>Postal Code:</label><br>
 <input type="text" name="postal_code" required><br><br>
 <label>Email:</label><br>
 <input type="email" name="email" required><br><br>
 <label>Phone:</label><br>
 <input type="text" name="phone" required><br><br>
 <button type="submit">Get Shipping Rates</button>
</form>