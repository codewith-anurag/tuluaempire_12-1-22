<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Ourservice;
use App\Models\Package;
use App\Models\PremiumActivity;
use App\Models\Theme;
use App\Models\SubTheme;
use App\Models\ContactSetting;
use App\Models\Setting;



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

/** Fornt Side Router */
Route::get('/',[App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('about_us',[App\Http\Controllers\FrontController::class, 'about'])->name('about_us');
Route::get('contact_us',[App\Http\Controllers\FrontController::class, 'contact'])->name('contact_us');
View::composer(['front.layouts.header'], function ($data) {
    $data['ourservices'] = Ourservice::where('status',1)->get();
    $data['packages']    = Package::where('status',1)->get();
    $data['premium_activity']    = PremiumActivity::where('status',1)->get();
    $data['theme']    = Theme::where('status',1)->get();
    $data['setting_detail'] = Setting::first();
});
View::composer(['front.layouts.footer'], function ($data) {
    $data['contact_detail'] = ContactSetting::all();
    $data['setting_detail'] = Setting::first();
});

Route::get('ourservices',[App\Http\Controllers\FrontController::class, 'ourservices'])->name('frontourservices');
Route::get('themes/{slug?}',[App\Http\Controllers\FrontController::class, 'themes_detail'])->name('frontthemes');
Route::get('premiumactivity',[App\Http\Controllers\FrontController::class, 'premium_activity'])->name('frontpremiumactivity');
Route::get('packages/{slug?}/{id?}',[App\Http\Controllers\FrontController::class, 'packages_detail'])->name('frontpackages');
Route::get('subcategory/{slug?}',[App\Http\Controllers\FrontController::class, 'aboutdubai_subcategory'])->name('subcategory');

Route::post('send_inquiry',[App\Http\Controllers\FrontController::class, 'send_inquiry'])->name('send_inquiry');
Route::post('send_contactus',[App\Http\Controllers\FrontController::class, 'send_contactus'])->name('send_contactus');

/******************************************************************************************************************************************************* */
Auth::routes();
Route::get('/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'forgotpassword'])->name('reset');
Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'index'])->middleware('guest')->name('password.request');
Route::group(['middleware' => ['auth']], function() {
/** Dashboard Route */
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::prefix('admin')->group(function () {

        /** Slider Routes */
        Route::get('/slider_list', [App\Http\Controllers\SliderController::class, 'index'])->name('slider')->middleware('auth');
        Route::get('/create_slider', [App\Http\Controllers\SliderController::class, 'create_slider'])->name('create-slider')->middleware('auth');
        Route::post('/store_slider', [App\Http\Controllers\SliderController::class, 'store_slider'])->name('store-slider')->middleware('auth');
        Route::get('/edit_slider/{id}', [App\Http\Controllers\SliderController::class, 'edit_slider'])->name('edit-slider')->middleware('auth');
        Route::post('/update_slider', [App\Http\Controllers\SliderController::class, 'update_slider'])->name('update-slider')->middleware('auth');
        Route::get('/delete_slider/{id}', [App\Http\Controllers\SliderController::class, 'delete_slider'])->name('delete-slider')->middleware('auth');
        Route::post('/slider_change_status', [App\Http\Controllers\SliderController::class, 'change_status'])->name('sliderchangestatus');


        /** About  Dubai Category Routes */
        Route::get('/about_dubai_category',[App\Http\Controllers\About_dubaicategoryController::class, 'index'])->name('about-dubai-category')->middleware('auth');
        Route::get('/create_about_dubai',[App\Http\Controllers\About_dubaicategoryController::class, 'create_category'])->name('create-aboutdubai-category')->middleware('auth');
        Route::post('/store_aboutdubai-category', [App\Http\Controllers\About_dubaicategoryController::class, 'store_category'])->name('store-aboutdubai-category')->middleware('auth');
        Route::get('/edit_aboutdubai-category/{id}', [App\Http\Controllers\About_dubaicategoryController::class, 'edit_category'])->name('edit-aboutdubai-category')->middleware('auth');
        Route::post('/update_aboutdubai-category', [App\Http\Controllers\About_dubaicategoryController::class, 'update_category'])->name('update-aboutdubai-category')->middleware('auth');
        Route::get('/delete_aboutdubai-category/{id}', [App\Http\Controllers\About_dubaicategoryController::class, 'delete_category'])->name('delete-aboutdubai-category');
        Route::post('/aboutdubai_changestatus', [App\Http\Controllers\About_dubaicategoryController::class, 'change_status'])->name('aboutdubai-change-status');

        /** About  Dubai Sub Category Routes */
        Route::get('/about_dubai_subcategory',[App\Http\Controllers\About_dubaisubcategoryController::class, 'index'])->name('about-dubai-subcategory')->middleware('auth');
        Route::get('/create_subabout_dubai',[App\Http\Controllers\About_dubaisubcategoryController::class, 'create_subcategory'])->name('create-aboutdubai-subcategory')->middleware('auth');
        Route::post('/store_subaboutdubai-category', [App\Http\Controllers\About_dubaisubcategoryController::class, 'store_subcategory'])->name('store-aboutdubai-subcategory')->middleware('auth');
        Route::get('/edit_subaboutdubai-category/{id}', [App\Http\Controllers\About_dubaisubcategoryController::class, 'edit_subcategory'])->name('edit-aboutdubai-subcategory')->middleware('auth');
        Route::post('/update_subaboutdubai-category', [App\Http\Controllers\About_dubaisubcategoryController::class, 'update_subcategory'])->name('update-aboutdubai-subcategory')->middleware('auth');
        Route::get('/delete_subaboutdubai-category/{id}', [App\Http\Controllers\About_dubaisubcategoryController::class, 'delete_subcategory'])->name('delete-aboutdubai-subcategory');
        Route::post('/subaboutdubai_changestatus', [App\Http\Controllers\About_dubaisubcategoryController::class, 'change_status'])->name('subaboutdubai-change-status');

        /** Local Restaurants Routes */
        Route::get('/local-restaurants',[App\Http\Controllers\Local_restaurantController::class, 'index'])->name('local-restaurants')->middleware('auth');
        Route::get('/edit_local-restaurants/{id}', [App\Http\Controllers\Local_restaurantController::class, 'edit_restaurant'])->name('edit-local-restaurants')->middleware('auth');
        Route::post('/update_local-restaurants', [App\Http\Controllers\Local_restaurantController::class, 'update_restaurant'])->name('update-local-restaurants')->middleware('auth');
        Route::get('/delete_local-restaurants/{id}', [App\Http\Controllers\Local_restaurantController::class, 'delete_restaurant'])->name('delete-local-restaurants')->middleware('auth');
        Route::post('/local-restaurants_changestatus', [App\Http\Controllers\Local_restaurantController::class, 'change_status'])->name('local-restaurants-change-status');


        /** Rivews Routes */
        Route::get('/reviews',[App\Http\Controllers\ReviewController::class, 'index'])->name('reviews')->middleware('auth');
        Route::get('/create_reviews',[App\Http\Controllers\ReviewController::class, 'create_reviews'])->name('create-reviews')->middleware('auth');
        Route::post('/store_reviews', [App\Http\Controllers\ReviewController::class, 'store_reviews'])->name('store-reviews')->middleware('auth');
        Route::get('/edit_reviews/{id}', [App\Http\Controllers\ReviewController::class, 'edit_reviews'])->name('edit-reviews')->middleware('auth');
        Route::post('/update_reviews', [App\Http\Controllers\ReviewController::class, 'update_reviews'])->name('update-reviews')->middleware('auth');
        Route::get('/delete_reviews/{id}', [App\Http\Controllers\ReviewController::class, 'delete_reviews'])->name('delete-reviews');
        Route::post('/reviews_changestatus', [App\Http\Controllers\ReviewController::class, 'change_status'])->name('reviews-change-status');

        /** Our Services Routes */
        Route::get('/ourservices',[App\Http\Controllers\OurserviceController::class, 'index'])->name('ourservices')->middleware('auth');
        Route::get('/create_ourservices',[App\Http\Controllers\OurserviceController::class, 'create_ourservices'])->name('create-ourservices')->middleware('auth');
        Route::post('/store_ourservices', [App\Http\Controllers\OurserviceController::class, 'store_ourservices'])->name('store-ourservices')->middleware('auth');
        Route::get('/edit_ourservices/{id}', [App\Http\Controllers\OurserviceController::class, 'edit_ourservices'])->name('edit-ourservices')->middleware('auth');
        Route::post('/update_ourservices', [App\Http\Controllers\OurserviceController::class, 'update_ourservices'])->name('update-ourservices')->middleware('auth');
        Route::get('/delete_ourservices/{id}', [App\Http\Controllers\OurserviceController::class, 'delete_ourservices'])->name('delete-ourservices');
        Route::post('/ourservices_changestatus', [App\Http\Controllers\OurserviceController::class, 'change_status'])->name('ourservices-change-status');

        /** Packages Routes */
        Route::get('/packages',[App\Http\Controllers\PackageController::class, 'index'])->name('packages')->middleware('auth');
        Route::get('/create_packages',[App\Http\Controllers\PackageController::class, 'create_packages'])->name('create-packages')->middleware('auth');
        Route::post('/store_packages', [App\Http\Controllers\PackageController::class, 'store_packages'])->name('store-packages')->middleware('auth');
        Route::get('/edit_packages/{id}', [App\Http\Controllers\PackageController::class, 'edit_packages'])->name('edit-packages')->middleware('auth');
        Route::post('/update_packages', [App\Http\Controllers\PackageController::class, 'update_packages'])->name('update-packages')->middleware('auth');
        Route::get('/delete_packages/{id}', [App\Http\Controllers\PackageController::class, 'delete_packages'])->name('delete-packages');
        Route::post('/packages_changestatus', [App\Http\Controllers\PackageController::class, 'change_status'])->name('packages-change-status');

        /** Sub Packages Routes */
        Route::get('/subpackages/{package_id?}',[App\Http\Controllers\SubPackageController::class, 'index'])->name('subpackages')->middleware('auth');
        Route::get('/create_subpackages/{package_id?}',[App\Http\Controllers\SubPackageController::class, 'create_subpackages'])->name('create-subpackages')->middleware('auth');
        Route::post('/store_subpackages', [App\Http\Controllers\SubPackageController::class, 'store_subpackages'])->name('store-subpackages')->middleware('auth');
        Route::get('/edit_subpackages/{id}/{package_id?}', [App\Http\Controllers\SubPackageController::class, 'edit_subpackages'])->name('edit-subpackages')->middleware('auth');
        Route::post('/update_subpackages', [App\Http\Controllers\SubPackageController::class, 'update_subpackages'])->name('update-subpackages')->middleware('auth');
        Route::get('/delete_subpackages/{id}/{package_id?}', [App\Http\Controllers\SubPackageController::class, 'delete_subpackages'])->name('delete-subpackages');
        Route::post('/subpackages-change-status', [App\Http\Controllers\SubPackageController::class, 'change_status'])->name('subpackages-change-status');

        /** Sub Package Slider Router */
        Route::get('/subpackages_slider/{subpackage_id?}',[App\Http\Controllers\SubPackageSliderController::class, 'index'])->name('subpackages-slider')->middleware('auth');
        Route::get('/create_subpackages_slider/{subpackage_id?}',[App\Http\Controllers\SubPackageSliderController::class, 'create_subpackages_slider'])->name('create-subpackages-slider')->middleware('auth');
        Route::post('/store_subpackages_slider', [App\Http\Controllers\SubPackageSliderController::class, 'store_subpackages_slider'])->name('store-subpackages-slider')->middleware('auth');
        Route::get('/edit_subpackages_slider/{id}', [App\Http\Controllers\SubPackageSliderController::class, 'edit_subpackages_slider'])->name('edit-subpackages-slider')->middleware('auth');
        Route::post('/update_subpackages_slider', [App\Http\Controllers\SubPackageSliderController::class, 'update_subpackages_slider'])->name('update-subpackages-sldier');
        Route::get('/delete_subpackages_slider/{id}/{subpackage_id?}', [App\Http\Controllers\SubPackageSliderController::class, 'delete_subpackages_slider'])->name('delete-subpackages-slider');

        /** Premium Activity Router */

        Route::get('/premium_activity',[App\Http\Controllers\PremiumActivityController::class, 'index'])->name('premiumactivity')->middleware('auth');
        Route::get('/create_premium_activity',[App\Http\Controllers\PremiumActivityController::class, 'create_premium_activity'])->name('create-premium-activity')->middleware('auth');
        Route::post('/store_premium_activity', [App\Http\Controllers\PremiumActivityController::class, 'store_premium_activity'])->name('store-premium-activity')->middleware('auth');
        Route::get('/edit_premium_activity/{id}', [App\Http\Controllers\PremiumActivityController::class, 'edit_premium_activity'])->name('edit-premium-activity')->middleware('auth');
        Route::post('/update_premium_activity', [App\Http\Controllers\PremiumActivityController::class, 'update_premium_activity'])->name('update-premium-activity')->middleware('auth');
        Route::get('/delete_premium_activity/{id}', [App\Http\Controllers\PremiumActivityController::class, 'delete_premium_activity'])->name('delete-premium-activity');
        Route::post('/premium-activity-change-status', [App\Http\Controllers\PremiumActivityController::class, 'change_status'])->name('premium-activity-change-status');

        /** Main Themes Router */
        Route::get('/themes',[App\Http\Controllers\ThemeController::class, 'index'])->name('themes')->middleware('auth');
        Route::get('/create_themes',[App\Http\Controllers\ThemeController::class, 'create_themes'])->name('create-themes')->middleware('auth');
        Route::post('/store_themes', [App\Http\Controllers\ThemeController::class, 'store_themes'])->name('store-themes')->middleware('auth');
        Route::get('/edit_themes/{id}', [App\Http\Controllers\ThemeController::class, 'edit_themes'])->name('edit-themes')->middleware('auth');
        Route::post('/update_themes', [App\Http\Controllers\ThemeController::class, 'update_themes'])->name('update-themes')->middleware('auth');
        Route::get('/delete_themes/{id}', [App\Http\Controllers\ThemeController::class, 'delete_themes'])->name('delete-themes');
        Route::post('/themes-change-status', [App\Http\Controllers\ThemeController::class, 'change_status'])->name('themes-change-status');

        /** Sub Themes Router */
        Route::get('/subthemes/{theme_id}',[App\Http\Controllers\SubThemeController::class, 'index'])->name('subthemes')->middleware('auth');
        Route::get('/create_subthemes/{theme_id}',[App\Http\Controllers\SubThemeController::class, 'create_subthemes'])->name('create-subthemes')->middleware('auth');
        Route::post('/store_subthemes', [App\Http\Controllers\SubThemeController::class, 'store_subthemes'])->name('store-subthemes')->middleware('auth');
        Route::get('/edit_subthemes/{id}', [App\Http\Controllers\SubThemeController::class, 'edit_subthemes'])->name('edit-subthemes')->middleware('auth');
        Route::post('/update_subthemes', [App\Http\Controllers\SubThemeController::class, 'update_subthemes'])->name('update-subthemes')->middleware('auth');
        Route::get('/delete_subthemes/{id}/{theme_id?}', [App\Http\Controllers\SubThemeController::class, 'delete_subthemes'])->name('delete-subthemes');
        Route::post('/subthemes-change-status', [App\Http\Controllers\SubThemeController::class, 'change_status'])->name('subthemes-change-status');


        /** Inquiry Router */
        Route::get('/inquiry',[App\Http\Controllers\InquiryController::class, 'index'])->name('inquiry')->middleware('auth');
        Route::get('/delete_inquiry/{id}', [App\Http\Controllers\InquiryController::class, 'delete_inquiry'])->name('delete-inquiry')->middleware('auth');

        /** Contact Us Router */
        Route::get('/contact',[App\Http\Controllers\ContactController::class, 'index'])->name('contact')->middleware('auth');
        Route::get('/delete_contact/{id}', [App\Http\Controllers\ContactController::class, 'delete_contact'])->name('delete-contact')->middleware('auth');

        /** Settings Router */
        Route::get('/generalsetting',[App\Http\Controllers\GeneralsettingController::class, 'index'])->name('generalsetting')->middleware('auth');
        Route::post('/store_generalsetting',[App\Http\Controllers\GeneralsettingController::class, 'store'])->name('store_generalsetting')->middleware('auth');

        Route::get('/contactssetting',[App\Http\Controllers\ContactSettingController::class, 'index'])->name('contactssetting')->middleware('auth');
        Route::get('/createcontactsetting',[App\Http\Controllers\ContactSettingController::class, 'create'])->name('createcontactsetting')->middleware('auth');
        Route::post('/store_contactsetting',[App\Http\Controllers\ContactSettingController::class, 'store'])->name('store_contactsetting')->middleware('auth');
        Route::get('/edit_contactsetting/{id}', [App\Http\Controllers\ContactSettingController::class, 'edit_contactsetting'])->name('edit_contactsetting')->middleware('auth');
        Route::post('/update_contactsetting', [App\Http\Controllers\ContactSettingController::class, 'update_contactsetting'])->name('update_contactsetting')->middleware('auth');
        Route::get('/delete_contactsetting/{id}', [App\Http\Controllers\ContactSettingController::class, 'delete_contactsetting'])->name('delete_contactsetting');
    });

});
