<?php

namespace App\Http\Controllers;

use App\Services\SmartShippingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    protected $shippingService;

    public function __construct(SmartShippingService $shippingService)
    {
        $this->shippingService = $shippingService;
    }



    public function showCalculator(Request $request)
    {
        $count = 0;
        $weight = 0;
        $orderValue = 0;

        if (Auth::check()) {
            $count = DB::table('carts')
                ->where('user_id', Auth::id())
                ->count();

            // Get cart items with product details
            $cartItems = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', Auth::id())
                ->select('products.Weight as weight', 'products.price')
                ->get();

            // Calculate total weight and value
            foreach ($cartItems as $item) {
                $weight += floatval($item->weight);
                $orderValue += floatval($item->price);
            }
        }

        // Validate URL parameters if provided
        if ($request->has('weight') || $request->has('order_value')) {
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Please login to continue.');
            }

            // Compare URL values with calculated values
            if (abs(floatval($request->weight) - $weight) > 0.01 || 
                abs(floatval($request->order_value) - $orderValue) > 0.01) {
                return redirect()->route('shipping.calculator')
                    ->with('error', 'Invalid shipping parameters detected.');
            }
        }
        
        return view('shipping.calculator', compact('count', 'weight', 'orderValue'));
    }

    public function calculate(Request $request)
    {
        $count = 0;
        if (Auth::check()) {
            $count = DB::table('carts')
                ->where('user_id', Auth::id())
                ->count();

        }

        try {
            // Validate the request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'country_code' => 'required|string|size:2|in:CA,US',
                'address1' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'province_code' => 'required|string|max:10',
                'postal_code' => 'required|string|max:10',
                'weight' => 'required|numeric|min:0.1',
                'order_value' => 'required|numeric|min:0',
            ]);

            // Determine currency based on country
            $currency = $validated['country_code'] === 'CA' ? 'CAD' : 'USD';

            // Create shipment array
            $shipment = [
                "to_address" => [
                    "name" => $validated['name'],
                    "address1" => $validated['address1'],
                    "city" => $validated['city'],
                    "province_code" => $validated['province_code'],
           
                    "postal_code" => $validated['postal_code'],
                    "country_code" => $validated['country_code'],
                    "is_residential" => true,
                    "phone" => $validated['phone'],
                    "email" => $validated['email']
                ],
                "weight" => $validated['weight'],
                "weight_unit" => "kg",
                "length" => 30,
                "width" => 25,
                "height" => 10,
                "size_unit" => "cm",
                "package_type" => "Parcel",
                "package_contents" => "Merchandise",
                "region" => "ON"
            ];

            // Get shipping rates
            $rate = $this->shippingService->getSmartRate(
                $shipment,
                $validated['order_value'],
                $currency
            );

            if (isset($rate['error'])) {
                return back()->withErrors(['shipping' => $rate['error']]);
            }

            // Ensure rate is an array
            if (!is_array($rate)) {
                $rate = [
                    'carrier' => 'Standard',
                    'service' => 'Standard',
                    'delivery_time' => '3-5 days',
                    'cost' => 0,
                    'currency' => $currency,
                    'is_free_shipping' => false
                ];
            }

            // Store shipping data in session for order processing
            session([
                'shipping_data' => $rate,
                'shipping_address' => $validated
            ]);

            return view('shipping.rates', [
                'rate' => $rate,
                'address' => $validated
            ], compact('count'));

        } catch (\Exception $e) {
            Log::error('Shipping calculation failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred while calculating shipping rates. Please try again.']);
        }
    }
}
