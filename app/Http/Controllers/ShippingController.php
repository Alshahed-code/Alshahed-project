<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ShippingController extends Controller
{
    public function showShippingForm()
    {
        return view('shipping.form');
    }

    public function getShippingRates(Request $request)
    {
        $fromAddress = [
            'name' => 'Your Store',
            'street1' => '123 Main St',
            'city' => 'Toronto',
            'state' => 'ON',
            'zip' => 'M5H 2N2',
            'country' => 'CA',
            'phone' => '1234567890',
            'email' => 'you@example.com',
        ];

        $toAddress = [
            'name' => $request->name ?? 'Test User',
            'street1' => $request->street ?? '456 Customer Rd',
            'city' => $request->city ?? 'Ottawa',
            'state' => $request->province ?? 'ON',
            'zip' => $request->postal_code ?? 'K1A0B1',
            'country' => 'CA',
            'phone' => $request->phone ?? '0987654321',
            'email' => $request->email ?? 'customer@example.com',
        ];

        $parcel = [
            'length' => '10',
            'width' => '7',
            'height' => '4',
            'distance_unit' => 'in',
            'weight' => '2',
            'mass_unit' => 'lb',
        ];

        $response = Http::withToken(config('services.shippo.key'))
            ->post('https://api.goshippo.com/shipments/', [
                'address_from' => $fromAddress,
                'address_to' => $toAddress,
                'parcels' => [$parcel],
                'async' => false,
            ]);

        $rates = $response->json()['rates'] ?? [];

        return view('shipping.rates', compact('rates'));
    }

    public function buyShippingLabel(Request $request)
    {
        $response = Http::withToken(config('services.shippo.key'))
            ->post('https://api.goshippo.com/transactions/', [
                'rate' => $request->rate_id,
                'label_file_type' => 'PDF',
                'async' => false,
            ]);

        $rates = $response->json()['rates'] ?? [];

        $labelUrl = $response->json()['label_url'] ?? '#';
        $trackingUrl = $response->json()['tracking_url_provider'] ?? '#';
        DB::table('orders')->insert([
            'customer_name' => 'John Doe', // Replace with real values
            'email' => 'customer@example.com',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'city' => 'Ottawa',
            'province' => 'ON',
            'postal_code' => 'K1A0B1',
            'carrier' => $rates['provider'],
            'service' => $rates['servicelevel']['name'],
            'amount' => $rates['amount'],
            'tracking_url' => $trackingUrl,
            'label_url' => $labelUrl,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return view('shipping.confirmation', compact('labelUrl', 'trackingUrl', 'rate'));
    }
}
