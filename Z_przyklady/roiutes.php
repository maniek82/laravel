<?php

Route::get('/about', function () {
    return "THis is about page";
});
Route::get('/contact/me', function () {
    return "Im here in contact directory";
});
Route::get('/post/{id}', function ($id) {
    return "Im here in contact directory with id: $id";
});
Route::get("admin/posts/example",array("as"=>"admin.home",function() {
    $url = route("admin.home");
    return  "this url is ". $url;
    
}));

//php artisan make:controller --resource PostsController

Route::get('/contact', "PostsController@contact");

Route::get("post/{id}/{name}/{password}", "PostsController@show_post");



    public function show_post($id,$name,$password) {
        // return view("post")->with("id", $id);
     return view("post",compact("id","name","password"));
        
    }