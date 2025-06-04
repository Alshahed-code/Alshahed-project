<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\CheckoutController;
use App\Services\SmartShippingService;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', [HomeController::class, 'login_home'])
->middleware(['auth', 'verified'])->name('dashboard');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->
        middleware(['auth', 'admin']);

route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin'] );

route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin'] );

route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin'] );

route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin'] );

route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin'] );


route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin'] );

route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin'] );


route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth', 'admin'] );

route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin'] );


route::get('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin'] );

route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin'] );

route::get('product_search/', [AdminController::class, 'product_search'])->middleware(['auth', 'admin'] );

route::get('our_shop', [HomeController::class, 'our_shop']);

route::get('category/{id}', [HomeController::class, 'category_products']);

route::get('product_details/{id}', [HomeController::class, 'product_details']);

route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified'] );

route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->middleware(['auth', 'verified'] );

route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified'] );


Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});


Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');
Route::post('/checkout/rates', [CheckoutController::class, 'getRates'])->name('checkout.getRates');
Route::post('/checkout/confirm', [CheckoutController::class, 'confirmShipment'])->name('checkout.confirm');

Route::get('/test-shipping', function (SmartShippingService $shippingService) {
    $orderValue = 165.00;
    $currency = 'CAD';

    $shipment = [
        "to_address" => [
            "name" => "Jane Smith",
            "address1" => "701 W Georgia St",
            "city" => "Vancouver",
            "province_code" => "BC",
            "postal_code" => "V7Y 1G5",
            "country_code" => "CA",
            "is_residential" => true
        ],
        "weight" => 2.0,
        "weight_unit" => "kg",
        "length" => 30,
        "width" => 25,
        "height" => 10,
        "size_unit" => "cm",
        "package_type" => "Parcel",
        "package_contents" => "Merchandise",
        "items" => [
            [
                "description" => "Winter jacket",
                "quantity" => 1,
                "value" => $orderValue,
                "currency" => $currency,
                "country_of_origin" => "CA"
            ]
        ]
    ];

    // ✅ Force correct fulfillment region
    $shipment['region'] = 'ON';

    $rate = $shippingService->getSmartRate($shipment, $orderValue, $currency);

    return response()->json($rate);
});
