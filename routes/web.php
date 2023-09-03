<?php

use Inertia\Inertia;
use App\Models\about;
use App\Models\Recipes;
use App\Models\Products;
use App\Models\BackGroundPages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\about\AboutController;
use App\Http\Controllers\admin\BackGroundPagesController;
use App\Http\Controllers\admin\contact\ContactController;
use App\Http\Controllers\admin\recipes\RecipesController;
use App\Http\Controllers\admin\products\CategoryController;
use App\Http\Controllers\admin\products\ProductsController;
use App\Models\category;



Route::get('/admin',function(){
    return "asdasd";
    if(Auth::user()!=null)
        return view('admin.index');
    else
        return view('front.login');
    });
Route::get("/login",function(){
    if(Auth::user() != null){
        return view('admin.index');
    }
    return view('front.login');
})->name("login");
Route::get("/Login",function(){
    if(Auth::user() != null){
        return view('admin.index');
    }
    return view('front.login');
});

Route::post("/Login",[LoginController::class,"Login"]);

Route::get('/',function () {
    $home=BackGroundPages::find(1);
    $products=category::orderBy("id","DESC")
    ->take(4)
    ->get()
    ;
    $recipes=Recipes::orderBy("id","DESC")
    ->take(3)
    ->get()
    ;
    $map=BackGroundPages::find(9);
    return view('front.home')
    ->with("home",$home)
    ->with("products",$products)
    ->with("recipes",$recipes)
    ->with("map",$map)
    ;
});
Route::get('/index',function () {
    $home=BackGroundPages::find(1);
    $products=category::orderBy("id","DESC")
    ->take(4)
    ->get()
    ;
    $recipes=Recipes::orderBy("id","DESC")
    ->take(3)
    ->get()
    ;
    $map=BackGroundPages::find(9);
    return view('front.home')
    ->with("home",$home)
    ->with("products",$products)
    ->with("recipes",$recipes)
    ->with("map",$map)
    ;
});

Route::get('Contact',function () {
    return view('front.contact');
});
Route::get('Career',function () {
    return view('front.careers');
});
Route::post('Contact',[ContactUsController::class,"SendMessage"]);

Route::get('Product',function () {
    $products=category::all();
    return view('front.products.categories')
    ->with("products",$products)
    ;
});
Route::get('Products/{id}',function ($id) {
    $products=Products::where("category_id",$id)->get();
    $category=category::find($id);
    return view('front.products.products')
    ->with("products",$products)
    ->with("category",$category)
    ;
});
Route::get('Product/{id}',function ($id) {
    $product=Products::find($id);
    return view('front.products.show')
    ->with("product",$product)
    ;
});
Route::get('Recipes',function () {

    $products=Recipes::all();
    return view('front.recipes')
    ->with("products",$products)
    ;
});
Route::get('Recipes/{id}',function ($id) {

    $recipe=Recipes::find($id);
    return view('front.carrots_recipes')
    ->with("recipe",$recipe)
    ;
});
Route::get('carrots-recipes',function () {
    return view('front.carrots_recipes');
});
Route::get('Careers',function () {
    return view('front.careers');
});
Route::get('About',function () {
    $about=about::all();
    return view('front.about')
    ->with("about",$about)
    ;

});
Route::get('About Us',function () {
    $about=about::all();
    return view('front.about')
    ->with("about",$about)
    ;

});



Route::group(["middleware"=>"auth"],function(){
    Route::get("/admin",function(){
        if(Auth::user()==null)
            return view('front.login');
        return view('admin.index');
    });
    
// home page
Route::get("/admin/home-backgound",[BackGroundPagesController::class,"HomePage"]);

Route::post("/admin/home-backgound",[BackGroundPagesController::class,"UpdateHomePage"]);
Route::get("/admin/home-products",[BackGroundPagesController::class,"products"]);
Route::get("/admin/home-map",[BackGroundPagesController::class,"map"]);
Route::post("/admin/home-map",[BackGroundPagesController::class,"UpdateMap"]);
Route::get("/admin/home-recipes",[BackGroundPagesController::class,"recipes"]);
Route::get("/admin/home-products/{id}",[BackGroundPagesController::class,"showProduct"]);
Route::post("/admin/update-home-product",[BackGroundPagesController::class,"updateProduct"]);

// products
Route::get('admin/categories',[CategoryController::class,"index"]);
Route::get('admin/category/{ud}',[CategoryController::class,"show"]);
Route::get('admin/add-category',[CategoryController::class,"create"]);
Route::post('admin/delete-category',[CategoryController::class,"destroy"]);
Route::post('admin/add-category',[CategoryController::class,"store"]);
Route::post('admin/update-category',[CategoryController::class,"update"]);

Route::get('/admin/products',[ProductsController::class,"index"]);
Route::get('/admin/products/{id}',[ProductsController::class,"edit"]);
Route::get('/admin/add-product',[ProductsController::class,"create"]);
Route::post('/admin/add-product',[ProductsController::class,"AddProduct"]);
Route::post('/admin/update-product',[ProductsController::class,"update"]);
Route::post('/admin/delete-product',[ProductsController::class,"destroy"]);
Route::get('/admin/products',[ProductsController::class,"index"]);

// recipes
Route::get('/admin/recipes',[RecipesController::class,"index"]);
Route::get('/admin/recipes/{id}',[RecipesController::class,"edit"]);
Route::get('/admin/add-recipes',[RecipesController::class,"create"]);
Route::post('/admin/add-recipes',[RecipesController::class,"store"]);
Route::post('/admin/update-recipes',[RecipesController::class,"update"]);
Route::post('/admin/delete-recipes',[RecipesController::class,"destroy"]);

// about
Route::get('/admin/about-us',[AboutController::class,"index1"]);
Route::post('/admin/update-about1',[AboutController::class,"update1"]);
Route::get('/admin/aboutus',[AboutController::class,"index2"]);
Route::post('/admin/aboutus',[AboutController::class,"update2"]);

Route::get('/admin/user',[LoginController::class,'index']);
Route::get('/admin/create-user',[LoginController::class,'create']);
Route::post('/admin/create-user',[LoginController::class,'Register']);


Route::get('/admin/contact',[ContactController::class,'index']);
Route::get('/admin/contact/{id}',[ContactController::class,'show']);

});
