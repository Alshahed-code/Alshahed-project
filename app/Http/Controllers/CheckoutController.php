<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\ShippoService;

class CheckoutController extends Controller
{

    public function showCheckout()
    {
        return view('checkout.checkout');
    }

    public function getRates(Request $request)
    {
        \Shippo::setApiKey(env('SHIPPO_API_KEY'));

        // عنوان المتجر (مطلوب أن يكون عنوان أمريكي حقيقي)
        $fromAddress = [
            'name' => 'Store Sender',
            'street1' => '965 Mission St',
            'city' => 'San Francisco',
            'state' => 'CA',
            'zip' => '94103',
            'country' => 'US',
            'phone' => '5555555555',
            'email' => 'store@example.com'
        ];

        // عنوان الزبون
        $toAddress = [
            'name' => $request->input('name'),
            'street1' => $request->input('street1'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip' => $request->input('zip'),
            'country' => strtoupper($request->input('country')), // تأكد أنها 'US'
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ];

        // مواصفات الطرد
        $parcel = [
            'length' => '20',
            'width' => '20',
            'height' => '10',
            'distance_unit' => 'cm',
            'weight' => 2,
            'mass_unit' => 'kg',
        ];

        try {
            $shipment = \Shippo_Shipment::create([
                'address_from' => $fromAddress,
                'address_to' => $toAddress,
                'parcels' => [$parcel],
                'async' => false
            ]);

            if (isset($shipment['rates']) && count($shipment['rates']) > 0) {
                $rates = $shipment['rates'];
                return view('checkout.shipping_rates', compact('rates'));
            } else {
                return back()->withErrors(['message' => 'لا توجد أسعار متاحة من Sendle أو من شركات أخرى.']);
            }

        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'حدث خطأ: ' . $e->getMessage()]);
        }
    }
    }





