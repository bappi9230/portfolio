<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Home all route
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/','Home')->name('home');

    Route::get('/home/slide','HomeSlider')->name('home.slide');
    Route::post('/update/slide','UpdateSlide')->name('update.slide');

});
// admin all route
Route::middleware(['auth'])->group(function () {
    
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/logout','destroy')->name('admin.logout');
        Route::get('/admin/profile','profile')->name('admin.profile');
        Route::get('/edit/profile','editProfile')->name('edit.profile');
        Route::post('/store/profile','storeProfile')->name('store.profile');

        Route::get('/change/password','changePassword')->name('change.password');
        Route::post('/update/password','updatePassword')->name('update.password');
    });
});


//about page
Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page','AboutPage')->name('about.page');
    Route::post('/update/page','UpdateAbout')->name('update.about');
    Route::get('/about','HomeAbout')->name('home.about');

    Route::get('about/multi/image','AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image','StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image','AllMultiImage')->name('all.multi.image');

    Route::get('/edit/multi/image/{id}','EditMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image','UpdateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}','DeleteMultiImage')->name('delete.multi.image');

});


// portfolio all route
Route::controller(PortfolioController::class)->group(function(){
    Route::get('/all/portfolio','AllPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio','AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio','StorePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/{id}','EditPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio','UpdatePortfolio')->name('update.portfolio');
    Route::get('/delete/portfolio/{id}','DeletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}','PortfolioDetails')->name('portfolio.details');

    //home
    Route::get('/portfolio','HomePortfolio')->name('home.portfolio');

});

//all blog category route
Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/all/blog/category','AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category','AddBlogCategory')->name('add.blog.category');
    Route::post('/store/blog/category','StoreBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}','EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category','UpdateBlogCategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');

});

// Blog all route
Route::controller(BlogController::class)->group(function(){
    Route::get('/all/blog','AllBlog')->name('all.blog');
    Route::get('/add/blog','AddBlog')->name('add.blog');
    Route::post('/store/blog','StoreBlog')->name('store.blog');
    Route::get('/edit/blog/{id}','EditBlog')->name('edit.blog');
    Route::post('/update/blog','UpdateBlog')->name('update.blog');
    Route::get('/update/blog/{id}','DeleteBlog')->name('delete.blog');

     Route::get('/blog/details/{id}','BlogDetails')->name('blog.details');
     Route::get('/category/blog/{id}','CategoryBlog')->name('category.blog');

     Route::get('/blog','HomeBlog')->name('home.blog');

});


// Footer all route
Route::controller(FooterController::class)->group(function(){
    Route::get('/footer/setup','FooterSetup')->name('footer.setup');
    Route::post('/update/footer','UpdateFooter')->name('update.footer');

});
// Contact all route
Route::controller(ContactController::class)->group(function(){
    Route::get('/contact','ContactMe')->name('contact.me');
    Route::post('/store/message','ContactStore')->name('contact.store');
    Route::get('/contact/message','ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}','DeleteMessage')->name('delete.contact');

});






















// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



require __DIR__.'/auth.php';