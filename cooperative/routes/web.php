<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdvertisingController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\premium\AdvertisingController as PremiumAdvertisingController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\web\UserController as WebUserController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\premium\TransactionController as PremiumTransactionController;
use App\Http\Controllers\premium\OrdersController;
use App\Http\Controllers\premium\PremiumController;
use App\Http\Controllers\web\WebController;
use App\Models\Advertising;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

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


Route::group([],function (){
    Route::get('register',[WebController::class,'register'])->name('web.register')->middleware('guest');
    Route::post('register',[WebUserController::class,'registerUser'])->name('web.register_post');
    Route::get('login',[WebController::class,'login'])->name('web.login')->middleware('guest');
    Route::post('login',[WebUserController::class,'loginUser'])->name('web.login_post');
    Route::get('/',[WebController::class,'home'])->name('web.index');
    Route::get('index',[WebController::class,'index'])->name('index.web');
    Route::get('postDetails/{id}',[WebController::class,'postDetails'])->name('web.post_details');
    Route::get('advertisingDetails/{id}',[WebController::class,'advertisingDetails'])->name('web.advertising_details');
    Route::get('advertisings',[WebController::class,'advertisings'])->name('web.advertisings');
    Route::post('advertisingsByCategory',[WebController::class,'advertisingsByCategory'])->name('web.advertisings_by_category');
    Route::get('aboutUs',[WebController::class,'aboutUs'])->name('web.about_us');
    Route::get('profile',[WebController::class,'profile'])->name('web.profile');
    Route::get('logout',[\App\Http\Controllers\web\UserController::class,'logout'])->name('web.logout');
    Route::get('posts',[WebController::class,'posts'])->name('web.posts');

});

Route::group(['prefix'=>'admin',
    'middleware'=>'admin.unauthenticated'
    ],function (){
    Route::get('/dashboard',[AdminController::class,'index'])->name('index.admin');
    Route::get('/aboutUs',[AdminController::class,'aboutUs'])->name('about_us.admin');
    Route::post('/updateAboutUs',[AdminController::class,'updateAboutUs'])->name('update_about_us.admin');
    Route::get('/CreateUsers',[UserController::class,'CreateUsers'])->name('create_users.admin');
    Route::post('/registerUser',[UserController::class,'registerUser'])->name('register_user.admin');
    Route::get('/users',[UserController::class,'users'])->name('users.admin');
    Route::get('/userDetails/{id}',[UserController::class,'userDetails'])->name('user_details.admin');
    Route::post('/updateRole',[UserController::class,'updateRole'])->name('update_role.admin');
    Route::get('/deleteUser/{id}',[UserController::class,'deleteUser'])->name('delete_user.admin');
    Route::get('/usual_users',[UserController::class,'usualUsers'])->name('usual_users.admin');
    Route::get('/premium',[UserController::class,'premium'])->name('premium.admin');
    Route::get('/advertisings',[AdvertisingController::class,'advertisings'])->name('advertisings.admin');
    Route::get('/myAdvertisings',[AdvertisingController::class,'myAdvertisings'])->name('my_advertisings.admin');
    Route::get('/advertisingDetails/{id}',[AdvertisingController::class,'advertisingDetails'])->name('advertising_details.admin');
    Route::get('/deleteAdvertising/{id}',[AdvertisingController::class,'deleteAdvertising'])->name('delete_advertising.admin');
    Route::get('/verifyAdvertising/{id}',[AdvertisingController::class,'verifyAdvertising'])->name('verify_advertising.admin');
    Route::get('/create_advertising',[AdvertisingController::class,'CreateAdvertisings'])->name('create_advertising.admin');
    Route::post('/create_advertising',[AdvertisingController::class,'storeAdvertising'])->name('store_advertising.admin');
    Route::get('/posts',[PostController::class,'posts'])->name('posts.admin');
    Route::get('/postDetails/{id}',[PostController::class,'postDetails'])->name('post_details.admin');
    Route::get('/create_post',[PostController::class,'createPost'])->name('create_post.admin');
    Route::post('/store_post',[PostController::class,'storePost'])->name('store_post.admin');
    Route::post('/updatePostStatus',[PostController::class,'updatePostStatus'])->name('update_post_status.admin');
    Route::get('/delete_post/{id}',[PostController::class,'deletePost'])->name('delete_post.admin');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout.admin');
    Route::get('/create_category',[CategoryController::class,'createCategory'])->name('create_category.admin');
    Route::post('/store_category',[CategoryController::class,'storeCategory'])->name('store_category.admin');
    Route::get('/categories',[CategoryController::class,'Categories'])->name('Categories.admin');
    Route::get('/delete_category/{id}',[CategoryController::class,'deleteCategory'])->name('delete_category.admin');
    Route::get('/branches',[\App\Http\Controllers\admin\BranchController::class,'branches'])->name('branches.admin');
    Route::get('/create_branch',[\App\Http\Controllers\admin\BranchController::class,'createBranch'])->name('create_branch.admin');
    Route::post('/store_branch',[\App\Http\Controllers\admin\BranchController::class,'storeBranch'])->name('store_branch.admin');
    Route::get('/delete_branch/{id}',[\App\Http\Controllers\admin\BranchController::class,'deleteBranch'])->name('delete_branch.admin');

});
Route::group(['prefix'=>'premium',
        'middleware'=>'premium.unauthenticated'
    ],function (){
    Route::get('/',[PremiumController::class,'premium'])->name('index.premium');
    Route::get('/advertisings',[PremiumAdvertisingController::class,'Advertisings'])->name('advertisings.premium');
    Route::get('/create_advertisings',[PremiumAdvertisingController::class,'CreateAdvertisings'])->name('create_advertisings.premium');
    Route::get('/advertisingDetails/{id}',[PremiumAdvertisingController::class,'advertisingDetails'])->name('advertisingDetails.premium');
    Route::post('/create_advertisings',[PremiumAdvertisingController::class,'storeAdvertising'])->name('store_advertising.premium');
    Route::get('/deleteAdvertising/{id}',[PremiumAdvertisingController::class,'deleteAdvertising'])->name('delete_advertising.premium');
    Route::get('logout',[PremiumController::class,'logout'])->name('logout.premium');

});

