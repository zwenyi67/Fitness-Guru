<?php

use App\Http\Controllers\AddtocartController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMessageController;
use App\Http\Controllers\CourseTopicController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TrainerProfileController;
use App\Http\Controllers\TrainerRegisterController;
use App\Http\Controllers\TrainerReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\WishlistController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseMessage;
use App\Models\CourseTopic;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Region;
use App\Models\Sport;
use App\Models\TrainerMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

/*
Route::prefix('admin')->group(function () {
    
   // Route::post('logout', 'AdminController@logout')->name('admin.logout');

    // Add other admin routes as needed
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', 'AdminController@dashboard');
        // Add other admin routes that require authentication
    });
}); */



//testing

Route::get('/image', function () {

    return view('user.test.index');
});

Route::post('/image/store',[UserController::class , 'imageStore' ]);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register-success' , function() {
    return view('auth.register-success');
});



Route::get('/6704/fitnessguru/admin/login', function() {
    return view('admin.login.index');
});

Route::post('/6704/fitnessguru/admin/login',[UserController::class , 'adminLogin' ]);

// admin section start

Route::middleware(["web","admin"])->group(function () {

Route::get('/admin', [ChartController::class ,'index']);

//Admin members section

Route::get('/admin/members', [ MemberController::class, 'index']);

Route::get('/admin/members/{id}/detail', [ MemberController::class, 'show']);

Route::delete('/admin/members/{id}/delete', [ MemberController::class,'destroy']);

//Admin trainers section

Route::get('/admin/trainers', [ TrainerController::class, 'request']);

Route::get('/admin/trainers/approve', [ TrainerController::class, 'approve']);

Route::patch('/admin/trainers/{id}/approve', [ TrainerController::class, 'approved']);

Route::get('/admin/trainers/{id}/detail', [ TrainerController::class, 'show']);

Route::delete('/admin/trainers/{id}/delete', [ TrainerController::class,'destroy']);

Route::get('/downloadcv/{filename}', [ TrainerController::class, 'download']);


//Admin courses section

Route::get('/admin/courses', [ CourseController::class, 'index']);

Route::get('/admin/courses/{id}/detail', [ CourseController::class, 'show']);

//Admin topics section

Route::get('/admin/topics', [ CourseTopicController::class, 'index']);

Route::get('/admin/topics/create', [ CourseTopicController::class, 'create']);

Route::post('/admin/topics/create', [ CourseTopicController::class, 'store']);

Route::get('/admin/topics/{id}/edit', [ CourseTopicController::class, 'edit']);

Route::post('/admin/topics/{id}/edit', [ CourseTopicController::class, 'update']);

Route::delete('/admin/topics/{id}/delete', [ CourseTopicController::class, 'destroy']);

//Admin regions section

Route::get('/admin/regions', [ RegionController::class, 'index']);

Route::get('/admin/regions/create', [ RegionController::class, 'create']);

Route::post('/admin/regions/create', [ RegionController::class, 'store']);

Route::get('/admin/regions/{id}/edit', [ RegionController::class, 'edit']);

Route::post('/admin/regions/{id}/edit', [ RegionController::class, 'update']);

Route::delete('/admin/regions/{id}/delete', [ RegionController::class, 'destroy']);

//Admin sports section

Route::get('/admin/sports', [ SportController::class, 'index']);

Route::get('/admin/sports/create', [ SportController::class, 'create']);

Route::post('/admin/sports/create', [ SportController::class, 'store']);

Route::get('/admin/sports/{id}/edit', [ SportController::class, 'edit']);

Route::post('/admin/sports/{id}/edit', [ SportController::class, 'update']);

Route::post('/admin/sports/{id}/edit/image', [ SportController::class, 'imageChange']);

Route::delete('/admin/sports/{id}/delete', [ SportController::class, 'destroy']);


//Admin products section

Route::get('/admin/products', [ ProductController::class, 'index']);

Route::get('/admin/products/create', [ ProductController::class, 'create']);

Route::post('/admin/products/create', [ ProductController::class, 'store']);

Route::delete('/admin/products/{id}/delete', [ ProductController::class, 'destroy']);

Route::get('/admin/products/{id}/edit', [ ProductController::class, 'edit']);

Route::post('/admin/products/{id}/edit', [ ProductController::class, 'update']);

Route::post('/admin/products/{id}/edit/image', [ ProductController::class, 'imageChange']);

//Admin categories section

Route::get('/admin/categories', [ CategoryController::class, 'index']);

Route::get('/admin/categories/create', [ CategoryController::class, 'create']);

Route::post('/admin/categories/create', [ CategoryController::class, 'store']);

Route::delete('/admin/categories/{id}/delete', [ CategoryController::class, 'destroy']);

Route::get('/admin/categories/{id}/edit', [ CategoryController::class, 'edit']);

Route::post('/admin/categories/{id}/edit', [ CategoryController::class, 'update']);


//Admin orders section

Route::get('/admin/orders', [ OrderController::class, 'index']);

Route::get('/admin/orders/adddelivery', [ OrderController::class,'addDeliver']);

Route::get('/admin/orders/delivered', [ OrderController::class,'delivered']);

Route::patch('/admin/orders/{id}/add', [ OrderController::class,'add']);

Route::patch('/admin/orders/{id}/deliver', [ OrderController::class,'deliver']);

Route::get('/admin/orders/{id}/detail',[ OrderController::class, 'show']);

Route::delete('/admin/orders/{id}/delete', [ OrderController::class,'destroy']);

//blog section

Route::get('/admin/blogs', [ BlogController::class, 'index']);

Route::get('/admin/blogs/create', [ BlogController::class,'create']);

Route::post('/admin/blogs/create', [ BlogController::class,'store']);

Route::get('/admin/blogs/{id}/edit', [BlogController::class,'edit']);

Route::post('/admin/blogs/{id}/edit', [BlogController::class,'update']);

Route::post('/admin/blogs/{id}/imagechange', [BlogController::class,'imageChange']);

Route::get('/admin/blogs/{id}/detail', [BlogController::class,'show']);

Route::delete('/admin/blogs/{id}/delete', [BlogController::class,'destroy']);

Route::delete('/admin/blogs/{id}/comment/delete', [CommentController::class, 'destroy']);

//gallery section

Route::get('/admin/galleries', [ GalleryController::class, 'index']);

Route::get('/admin/galleries/create', [ GalleryController::class,'create']);

Route::post('/admin/galleries/create', [ GalleryController::class,'store']);

Route::get('/admin/galleries/{id}/edit', [GalleryController::class,'edit']);

Route::post('/admin/galleries/{id}/edit', [GalleryController::class,'update']);

Route::delete('/admin/galleries/{id}/delete', [GalleryController::class,'destroy']);


});




// admin section end






// user display section start

Route::middleware(["auth"])->group(function () {


    //message display section

    Route::post('/trainers/{id}/detail/sendmessage', [TrainerController::class,"sendMessage"]);


//course display section

Route::post('/courses/{id}/join', [CourseController::class, 'join']);

Route::post('/courses/{id}/detail/sendmessage', [CourseMessageController::class,"sendMessage"]);


//blog display section


Route::post('/blogs/{id}/detail/comment', [CommentController::class,'store']);

Route::patch('/blogs/{id}/comment/update', [CommentController::class, 'update']);

Route::delete('/blogs/{id}/comment/remove', [CommentController::class, 'delete']);

Route::get('/blogs/{id}/detail/like', [LikeController::class,'store']);

Route::get('/blogs/{id}/like/remove', [LikeController::class,'destroy']);


//add to cart and checkout section

Route::get('/products/{id}/addtocart', [AddtocartController::class, 'add']);

Route::get('/products/{id}/detailaddtocart', [AddtocartController::class, 'detailAdd']);

Route::get('/products/cart', [AddtocartController::class, 'cart']);

Route::delete('/products/cart/remove', [AddtocartController::class, 'removeProduct']);

Route::patch('/products/cart/decrease', [AddtocartController::class, 'decrease']);

Route::patch('/products/cart/increase', [AddtocartController::class, 'increase']);

Route::get('/products/cart/checkout', [AddtocartController::class, 'checkout']);

Route::post('/products/cart/checkout', [OrderController::class, 'store']);


//product review section

Route::post('/products/{id}/detail/review', [ProductReviewController::class, 'store']);

Route::patch('/products/{id}/review/update', [ProductReviewController::class, 'update']);

Route::delete('/products/{id}/review/delete', [ProductReviewController::class, 'destroy']);


//trainer review section

Route::post('/trainers/{id}/detail/review', [TrainerReviewController::class, 'store']);

Route::patch('/trainers/{id}/review/update', [TrainerReviewController::class, 'update']);

Route::delete('/trainers/{id}/review/delete', [TrainerReviewController::class, 'destroy']); 


//wishlist section

Route::get('/wishlist', [WishlistController::class, 'index']);

Route::get('/products/{id}/wishlist', [WishlistController::class, 'wishAdd']);

Route::get('/products/{id}/wishlist/remove', [WishlistController::class, 'wishRemove']);

});

//order section

Route::get('/order', [UserOrderController::class, 'index']);

Route::delete('/order/{id}/delete', [UserOrderController::class,'destroy']);

Route::delete('/order/{order_id}/product/{product_id}/delete', [UserOrderController::class,'productDestroy']);



// user display section end



//trainer profile section start

Route::middleware(["auth","trainer"])->group(function () {

Route::get('/trainer/{id}/dashboard' , [TrainerController::class,"dashboard"]);


Route::get('/trainer/courses' , function(){
        return view('user.trainers.course', [
            'courses' => Course::where('trainer_id', auth()->id())->latest()->get(),
        ]);
});


Route::delete('/trainer/courses/messages/{id}/remove', [CourseMessageController::class,'destroy']);

Route::get('/trainer/{id}/profile', [TrainerProfileController::class, 'index']);

Route::post('/trainer/{id}/profile/changedetail', [TrainerProfileController::class, 'updateDetail']);

Route::post('/trainer/{id}/profile/changedesc', [TrainerProfileController::class, 'updateDesc']);

Route::post('/trainer/{id}/profile/changeimage', [TrainerProfileController::class, 'updateImage']);

Route::get('/trainer/{id}/profile/changeemail', [TrainerProfileController::class, 'editEmail']);

Route::post('/trainer/{id}/profile/changeemail', [TrainerProfileController::class, 'updateEmail']);

Route::post('/trainer/{id}/profile/changestatus', [TrainerProfileController::class, 'updateStatus']);

Route::post('/trainer/{id}/profile/changefacebook', [TrainerProfileController::class, 'changeFacebook']);

Route::post('/trainer/{id}/profile/changeinstagram', [TrainerProfileController::class, 'changeInstagram']);

Route::get('/trainer/{id}/profile/changepassword', [TrainerProfileController::class, 'editPassword']);

Route::post('/trainer/{id}/profile/changepassword', [TrainerProfileController::class, 'updatePassword']);

Route::delete('/trainer/{id}/profile/delete', [TrainerProfileController::class,'destroy']);


// course section start

Route::get('/trainer/courses/{id}/edit', [CourseController::class, 'edit']);

Route::get('/trainer/courses/{id}/detail', [CourseController::class, 'trainer_courseDetail']);

Route::get('/trainer/courses/{id}/detail/messages', [CourseMessageController::class, 'index']);

Route::get('/trainer/courses/create', [CourseController::class, 'create']);

Route::post('/trainer/courses/create', [CourseController::class, 'store']);

Route::post('/trainer/courses/{id}/detail/changestatus', [CourseController::class, 'updateStatus']);


//  course section end


});

//trainer profile section end



//member profile section start

Route::middleware(["auth","member"])->group(function () {

Route::get('/member/{id}/profile', [MemberProfileController::class, 'index']);

Route::post('/member/{id}/profile/changedetail', [MemberProfileController::class, 'updateDetail']);

Route::post('/member/{id}/profile/changedesc', [MemberProfileController::class, 'updateDesc']);

Route::post('/member/{id}/profile/changeimage', [MemberProfileController::class, 'updateImage']);

Route::get('/member/{id}/profile/changeemail', [MemberProfileController::class, 'editEmail']);

Route::post('/member/{id}/profile/changeemail', [MemberProfileController::class, 'updateEmail']);

Route::get('/member/{id}/profile/changepassword', [MemberProfileController::class, 'editPassword']);

Route::post('/member/{id}/profile/changepassword', [MemberProfileController::class, 'updatePassword']);

Route::delete('member/{id}/profile/delete', [MemberProfileController::class,'destroy']);

});

//member profile section end


//no auth user section start

Route::middleware(['web'])->group(function () {

Route::get('/about', function(){
    return view('main.about');
});

Route::get('/contact', function(){
    return view('main.contact');
});

Route::get('/gallery', function(){
    return view('main.gallery', [
        'galleries' => Gallery::latest()->paginate(6),
    ]);
});

Route::get('/bmicalc', function(){
    return view('main.bmicalc');
});

Route::get('/blogs', function(){
    return view('main.blogs', [
        'blogs'=> Blog::latest()->get(),
    ]);
});

Route::get('/service', function(){
    return view('main.service');
});

Route::get('/trainers', function(){
    return view('main.trainer',[
        'trainerscount' => User::where('status', 1)->where('pending_status', 1)->where('available_status', 1)->latest()->filter(request(['search','sport','gender','ex-1', 'ex-2','hour-1','hour-2', 'region','age-1', 'age-2' ]))->get(),
        'trainers' => User::where('status', 1)->where('pending_status', 1)->where('available_status', 1)->latest()->filter(request(['search','sport','gender','ex-1', 'ex-2','hour-1','hour-2', 'region','age-1', 'age-2' ]))->paginate(9)->withQueryString(),
        'sports' => Sport::latest()->get(),
        'regions' => Region::latest()->get(),
    ]);
});

Route::get('/courses', function(){
    return view('main.course',[
        'coursescount' => Course::where('status', 1)->latest()->filter(request(['search','fee-1','fee-2', 'topic', 'method']))->get(),
        'courses' => Course::where('status', 1)->latest()->filter(request(['search','fee-1','fee-2', 'topic', 'method']))->paginate(9)->withQueryString(),
        'topics' => CourseTopic::latest()->get(),
        'trainers' => User::where('status',1)->where('pending_status', 1 )->where('available_status', 1 )->latest()->get(),
    ]);
});

Route::get('/products', function(){
    return view('main.product',[
        'products' => Product::latest()->filter(request(['search','category']))->paginate(6)->fragment('foryou'),
        'bests' => Product::join('order_product', 'products.id', '=', 'order_product.product_id')
        ->join('orders', 'order_product.order_id', '=', 'orders.id')
        ->select('products.*', DB::raw('SUM(order_product.quantity) as total_quantity'))
        ->groupBy('products.id')
        ->orderByDesc('total_quantity')
        ->limit(4)
        ->get(),
        
        'arrivals' => Product::latest()->paginate(4)->withQueryString(),
        'categories' => Category::latest()->get(),
    ]);
});

Route::get('/blogs/{id}/detail', [BlogController::class,'detail']);

Route::get('/trainers/{id}/detail', [TrainerController::class, 'trainerDetail']);

Route::get('/courses/{id}/detail', [CourseController::class, 'detail']);

Route::get('/products/{id}/detail', [ProductController::class, 'productDetail']);

Route::post('/bmicalc/imperial', [BmiController::class,'imperial']);

Route::post('/bmicalc/metric', [BmiController::class,'metric']);

Route::post('/bmicalc/imperial', [BmiController::class,'imperial']);

});




//no auth user section end












