<?php

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\Admin\About\AdminAboutComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DetailComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\UserPasswordComponent;
use App\Http\Livewire\Admin\Tag\AdminTagComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserOrderDetailComponent;
use App\Http\Livewire\Admin\Tag\AdminAddTagComponent;
use App\Http\Livewire\Admin\Order\AdminOrderComponent;
use App\Http\Livewire\Admin\Tag\AdminEditTagComponent;
use App\Http\Livewire\Admin\Coupon\AdminCouponComponent;
use App\Http\Livewire\Admin\Slider\AdminSliderComponent;
use App\Http\Livewire\Admin\Product\AdminProductComponent;
use App\Http\Livewire\Admin\Profile\AdminProfileComponent;
use App\Http\Livewire\Admin\Coupon\AdminAddCouponComponent;
use App\Http\Livewire\Admin\Slider\AdminAddSliderComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Coupon\AdminEditCouponComponent;
use App\Http\Livewire\Admin\Order\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\Product\AdminAddProductComponent;
use App\Http\Livewire\Admin\Attribute\AdminAttributeComponent;
use App\Http\Livewire\Admin\Product\AdminEditProductComponent;
use App\Http\Livewire\Admin\Category\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\Attribute\AdminAddAttributeComponent;
use App\Http\Livewire\Admin\Attribute\AdminEditAttributeComponent;
use App\Http\Livewire\Admin\Contact\AdminContactComponent;
use App\Http\Livewire\Admin\Notification\AdminNotificationComponent;
use App\Http\Livewire\Admin\Profile\AdminPasswordComponent;
use App\Http\Livewire\PrivacyComponent;
use App\Http\Livewire\TermsComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeComponent::class)->name('home');
Route::get('/about-us', AboutComponent::class)->name('about');
Route::get('/contact-us', ContactComponent::class)->name('contact');
Route::get('product/{slug}', DetailComponent::class)->name('detail');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('checkout',CheckoutComponent::class)->name('checkout');
Route::get('/category/{category_slug}',CategoryComponent::class)->name('category');
Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');
Route::get('/privacy-policy', PrivacyComponent::class)->name('privacy');
Route::get('/terms-conditions',TermsComponent::class)->name('terms');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/profile', UserProfileComponent::class)->name('user.profile');
    Route::get('/user/change-password', UserPasswordComponent::class)->name('user.password');
    Route::get('/user/orders', UserOrderComponent::class)->name('user.order');
    Route::get('/user/orders/{order_id}', UserOrderDetailComponent::class)->name('user.order.detail');
    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
});


//For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {


    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/profile', AdminProfileComponent::class)->name('admin.profile');
    Route::get('admin/change-password',AdminPasswordComponent::class)->name('admin.password');


    //Category Route
    Route::get('/admin/category', AdminCategoryComponent::class)->name('admin.category');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/category/edit/{category_slug?}/{sub_category_slug?}/{child_category_slug?}', AdminEditCategoryComponent::class)->name('admin.category.edit');

    //Tag Route
    Route::get('/admin/tag', AdminTagComponent::class)->name('admin.tag');
    Route::get('/admin/tag/add', AdminAddTagComponent::class)->name('admin.tag.add');
    Route::get('/admin/tag/edit/{tag_slug}', AdminEditTagComponent::class)->name('admin.tag.edit');

    //Product Route
    Route::get('/admin/product', AdminProductComponent::class)->name('admin.product');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.product.edit');

    //Coupon Route
    Route::get('/admin/coupon', AdminCouponComponent::class)->name('admin.coupon');
    Route::get('admin/coupon/add', AdminAddCouponComponent::class)->name('admin.coupon.add');
    Route::get('/admin/coupon/edit/{coupon_id}', AdminEditCouponComponent::class)->name('admin.coupon.edit');

    //Orders Route
    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('admin/orders/show/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orders.show');

    //Product Attribute Routes
    Route::get('/admin/attribute', AdminAttributeComponent::class)->name('admin.attribute');
    Route::get('admin/attribute/add', AdminAddAttributeComponent::class)->name('admin.attribute.add');
    Route::get('/admin/attribute/edit/{attribute_id}', AdminEditAttributeComponent::class)->name('admin.attribute.edit');

    //Slider Route
    Route::get('/admin/sliders', AdminSliderComponent::class)->name('admin.slider');
    Route::get('/admin/sliders/add', AdminAddSliderComponent::class)->name('admin.slider.add');

    //About Route
    Route::get('/admin/about', AdminAboutComponent::class)->name('admin.about');

    //Contact Route
    Route::get('/admin/contact', AdminContactComponent::class)->name('admin.contact');

    //Notification Route
    Route::get('/admin/notification', AdminNotificationComponent::class)->name('admin.notification');
});
