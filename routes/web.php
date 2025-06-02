<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\GeneralPageController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonyController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Event\Code\Test;

Route::get('/', [GeneralPageController::class, 'homepage'])->name('general.home');

Route::prefix("products")->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('general.products.index');
    Route::get('/{slug}', [ProductController::class, 'show'])->name('general.products.show');
    Route::post("/{slug}/testimonies", [TestimonyController::class, 'store'])->name('customer.testimonies.store');
});

Route::prefix("testimonies")->group(function () {
    Route::get('/', [TestimonyController::class, 'index'])->name('general.testimonies.index');
});

Route::get('/contact', function () {
    return view('pages.general.contact');
})->name('general.contact');

Route::get('/about', function () {
    return view('pages.general.about');
})->name('general.about');

Route::prefix("auth")->group(function () {
    Route::prefix("signin")->group(function () {
        Route::get('/', [SigninController::class, 'showSigninForm'])->name('general.auth.getsignin');
        Route::post('/', [SigninController::class, 'signin'])->name('general.auth.signin');
    });

    Route::prefix("signup")->group(function () {
        Route::get('/', [SignupController::class, 'showSignupForm'])->name('general.auth.getsignup');
        Route::post('/', [SignupController::class, 'signup'])->name('general.auth.signup');
    });

    Route::get("/signout", [SigninController::class, "signout"])->name("general.auth.signout");
});

Route::get("/profile", [ProfileController::class, "index"])->name("general.profile");

Route::prefix("wishlists")->group(function () {
    Route::get("/", [WishlistController::class, "index"])->name("customer.wishlists.index");
    Route::post("/", [WishlistController::class, "store"])->name("customer.wishlists.store");
    Route::delete("/", [WishlistController::class, "destroy"])->name("customer.wishlists.destroy");
});

Route::prefix("admin")->group(function () {
    // Route::get("/", [DashboardController::class, "index"])->name("admin.dashboard");

    // Route::prefix("products")->group(function () {
    //     Route::get("/", [AdminProductController::class, "index"])->name("admin.products.index");
    //     Route::get("/{slug}", [AdminProductController::class, "show"])->name("admin.products.show");
    //     Route::get("/create", [AdminProductController::class, "create"])->name("admin.products.create");
    //     Route::post("/", [AdminProductController::class, "store"])->name("admin.products.store");
    //     Route::get("/{slug}/edit", [AdminProductController::class, "edit"])->name("admin.products.edit");
    //     Route::put("/{slug}", [AdminProductController::class, "update"])->name("admin.products.update");
    //     Route::delete("/{slug}", [AdminProductController::class, "destroy"])->name("admin.products.destroy");
    //     Route::get("/{slug}/grant-permission", [AdminProductController::class, "grantPermission"])->name("admin.products.grant-permission");
    //     Route::post("/{slug}/grant-permission", [AdminProductController::class, "grantPermissionPost"])->name("admin.products.grant-permission.post");
    // });

    // Route::prefix("customer-users")->group(function () {
    //     Route::get("/", [AdminCustomerController::class, "index"])->name("admin.customers.index");
    //     Route::get("/{id}", [AdminCustomerController::class, "show"])->name("admin.customers.show");
    //     Route::get("/create", [AdminCustomerController::class, "create"])->name("admin.customers.create");
    //     Route::post("/", [AdminCustomerController::class, "store"])->name("admin.customers.store");
    //     Route::get("/{id}/edit", [AdminCustomerController::class, "edit"])->name("admin.customers.edit");
    //     Route::put("/{id}", [AdminCustomerController::class, "update"])->name("admin.customers.update");
    //     Route::delete("/{id}", [AdminCustomerController::class, "destroy"])->name("admin.customers.destroy");
    // });
});

