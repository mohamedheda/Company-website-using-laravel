<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogCategoryController as HomeBlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\FooterControlller;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\Portfolio;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| ber assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AdminController::class)->middleware('auth')->group(function(){
        Route::get('logout','destroy')->name('admin.logout');
        Route::get('admin/profile','Profile')->name('admin.profile');
        Route::get('profile/edit','ProfileEdit')->name('profile.edit');
        Route::post('profile/store','ProfileStore')->name('profile.store');
        Route::get('change/password','ChangePassword')->name('change.password');
        Route::post('update/password','UpdatePassword')->name('update.password');
});
//home slider routes
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('home/slider','HomeSlider')->name('home.slider.edit');
    Route::post('update/slider','UpdateSlider')->name('slider.update');
});
//blog category routes
Route::controller(HomeBlogCategoryController::class)->group(function(){
    Route::get('blog/category/all','AllCategory')->name('all.category');
    Route::get('add/blog/category','AddBlogCategory')->name('add.blog.category');
    Route::post('store/blog/category','StoreBlogCategory')->name('store.blog.category');
    Route::get('edit/blog/category/{id}','EditBlogCategory')->name('edit.blog.category');
    Route::post('update/blog/category','UpdateBlogCategory')->name('update.blog.category');
    Route::get('delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');

});
//blog routes
Route::controller(BlogController::class)->group(function(){
    Route::get('blog/all','AllBlogs')->name('all.blogs');
    Route::get('blog/','HomeBlog')->name('home.blog');
    Route::get('blog/add','AddBlogs')->name('add.blog');
    Route::post('blog/store','StoreBlogs')->name('store.blog');
    Route::get('blog/edit/{id}','EditBlog')->name('edit.blog');
    Route::post('blog/update','UpdateBlogs')->name('update.blog');
    Route::get('blog/delete/{id}','DeleteBlog')->name('delete.blog');
    Route::get('blog/details/{id}','BlogDetails')->name('blog.details');
    Route::get('category/blogs/{id}','CategoryBlogs')->name('category.blogs');
    

});
//about slider routes
Route::controller(AboutController::class)->group(function(){
    Route::get('about/slider','AboutSlider')->name('about.edit');
    Route::post('about/update','UpdateAbout')->name('about.update');
    Route::get('/about','About')->name('about');
    
    Route::get('/about/multi/image','MultiImage')->name('about.multi.image');
    Route::post('/store/multi/image','StoreImages')->name('store.multi.images');
    
    Route::get('multi/image/all','AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}','EditImage')->name('edit.multi.image');
    Route::post('/edit/multi/image','UpdateImage')->name('update.image');
    Route::get('/delete/multi/image/{id}','DeleteImage')->name('delete.multi.image');
    
});

//Portfolio  routes
Route::controller(PortfolioController::class)->group(function(){
    Route::get('add/portfolio','AddPortfolio')->name('add.portfolio');
    Route::get('portfolio/all','AllPortfolio')->name('all.portfolio');
    Route::post('store/portfolio','StorePortfolio')->name('store.portfolio');
    Route::get('portfolio/edit/{id}','EditPortfolio')->name('edit.portfolio');
    Route::post('update/portfolio','UpdatePortfolio')->name('update.portfolio');
    Route::get('portfolio/delete/{id}','DeletePortfolio')->name('delete.portfolio');
    Route::get('portfolio/details/{id}','PortfolioDetails')->name('portfolio.details');

});
//Footer  routes
Route::controller(FooterControlller::class)->group(function(){
    Route::get('footer/setup','FooterSetup')->name('footer.setup');
    Route::post('footer/update','UpdateFooter')->name('footer.update');
});
//Contact  routes
Route::controller(ContactController::class)->group(function(){
    Route::get('/contact','Contact')->name('contact.me');
    Route::post('/store/message','StoreMessage')->name('store.message');
    Route::get('/contact/messages','ContactMessages')->name('contact.message');
    Route::get('/delete/message/{id}','DeleteMessage')->name('delete.message');
    Route::get('/show/message/{id}','ShowMessage')->name('show.message');
});



Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
