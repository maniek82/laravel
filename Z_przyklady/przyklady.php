<?php
 Route::resource("posts","PostsController");
 
 
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
/*
|--------------------------------------------------------------------------
|DATABASE ROW QUERIES
|-------------------------------------------------------------------------
*/
Route::get("/insert",function() {
    DB::insert("insert into posts (title,content) values(?,?)",['PHP with Lavarel','Laravel is the best framework']);
    
});

Route::get("/read", function() {
   $results = DB::select('select * from posts where id=?',[1]);
   foreach($results as $post) {
       return $post->title;
   }
   
});

Route::get("/update",function() {
    $updated = DB::update("update posts set title='Updated PHP titles' where id=?",[1]);
    return $updated;
});

Route::get("/delete",function() {
    $deleted = DB::delete("delete from posts where id=?",[1]);
    return $deleted;
});

|--------------------------------------------------------------------------
|DATABASE ELEOQUENT - ORM
|-------------------------------------------------------------------------
*/

Route::get("/read",function() {
    $posts = Post::orderBy("content","desc")->get();
    foreach($posts as $post) {
        echo $post->title."----> ".$post->content."<br>";
    }
});

Route::get("/find/{id}",function($id) {
    $post = Post::find($id);
 
        return $post->content;
   
});

Route::get("/where",function() {
    $posts = Post::where("id",7)->orderBy("id","desc")->take(1)->get();
   return $posts;
    
});

Route::get("/findMore",function() {
    $posts = Post::findOrFail(6);
    return $posts;
});

Route::get("/basicInsert",function() {
    $post = new Post;
    $post->title = "Laravel framework";
    $post->content = "Excellent tool for web development";
    $post->save();
});

Route::get("/basicUpdate",function() {
    $post = Post::find(11);
    // $post->title = "Ruby";
    $post->content = "Sample example content 2";
    $post->save();
});

//mass assaiment create data w klasie zmienne by zapisac
Route::get("/create",function() {
    Post::create(['title'=>'sample title 2', 'content'=>'Some example content 2']);
});

Route::get("/update",function() {
    Post::where('id',11)->where('is_admin',0)->update(['title'=>'Php OOP','content'=>'Object Oriented Programmig']);
});

Route::get("/delete",function() {
    $post = Post::find(10);
    $post->delete();
});

Route::get("/delete2/{id}",function($id) {
    Post::destroy($id);
});

Route::get("/softDeletes",function() {
    Post::find(1)->delete();
    //in post new data migration and new table;
});
//query deleted SOFTDELETE posts
Route::get("/readsoftDeletes",function() {
  $post = Post::withTrashed()->get();
  echo $post;
// $post = Post::onlyTrashed()->get();
// echo $post;
});

Route::get("/restore",function() {
    Post::withTrashed()->restore();
    
});

// DELETE ITEM PERMANENTLY
Route::get("/forcedelete",function() {
  Post::onlyTrashed()->forceDelete();  
});


/*
|--------------------------------------------------------------------------
|DATABASE ELEOQUENT - ORM
|-------------------------------------------------------------------------
*/

Route::get("/read",function() {
    $posts = Post::orderBy("content","desc")->get();
    foreach($posts as $post) {
        echo $post->title."----> ".$post->content."<br>";
    }
});

Route::get("/find/{id}",function($id) {
    $post = Post::find($id);
 
        return $post->content;
   
});

Route::get("/where",function() {
    $posts = Post::where("id",7)->orderBy("id","desc")->take(1)->get();
   return $posts;
    
});

Route::get("/findMore",function() {
    $posts = Post::findOrFail(6);
    return $posts;
});

Route::get("/basicInsert",function() {
    $post = new Post;
    // $post->user_id = 1;
    $post->title = "jQuery";
    $post->content = "Javascript programming library";
    $post->save();
});
Route::get("/basicInsert2",function() {
    $user = new User;
    $user->name = "Maniek";
    $user->email = "maniek@gmail.com";
    $user->password = "pass123";
    $user->save();
});
Route::get("/basicInsert3",function() {
    $country = new Country;
    $country->name = "England";
   
    $country->save();
});
Route::get("/basicInsert4",function() {
    $video = new Video;
    // $role->name = "administrator";
   $video->name = "Laravel .mp4";
    $video->save();
});
Route::get("/basicInsert6",function() {
    $tag = new Tag;
    // $role->name = "administrator";
   $tag->name = "jquery";
    $tag->save();
});
Route::get("/basicInsert5",function() {
    $role = new Role;
    // $role->name = "administrator";
   $role->name = "subcriber";
    $role->save();
});

Route::get("/basicUpdate",function() {
    $post = Post::find(11);
    // $post->title = "Ruby";
    $post->content = "Sample example content 2";
    $post->save();
});

Route::get("/basicUpdate2",function() {
    $user = User::find(2);
    // $post->title = "Ruby";
    $user->country_id= 5;
    $user->save();
});

//mass assaiment create data w klasie zmienne by zapisac
Route::get("/create",function() {
    Post::create(['title'=>'sample title 2', 'content'=>'Some example content 2']);
});

Route::get("/update",function() {
    Post::where('id',11)->where('is_admin',0)->update(['title'=>'Php OOP','content'=>'Object Oriented Programmig']);
});

Route::get("/delete",function() {
    $post = Post::find(10);
    $post->delete();
});

Route::get("/delete2/{id}",function($id) {
    Post::destroy($id);
});

Route::get("/softDeletes",function() {
    Post::find(1)->delete();
    //in post new data migration and new table;
});
//query deleted SOFTDELETE posts
Route::get("/readsoftDeletes",function() {
  $post = Post::withTrashed()->get();
  echo $post;
// $post = Post::onlyTrashed()->get();
// echo $post;
});

Route::get("/restore",function() {
    Post::withTrashed()->restore();
    
});

// DELETE ITEM PERMANENTLY
Route::get("/forcedelete",function() {
  Post::onlyTrashed()->forceDelete();  
});
/*
|---------------------------------------------
| ELOQUENT RELATONSHIPS
|---------------------------------------------

*/
//ONE TO ONE RELATONSHIP
Route::get("/user/{id}/post",function($id) {
   $posttitle=  User::find($id)->post->title = " Web Development"; //post jest metoda z klasy user wskazujaca relacje
   $postcontent=  User::find($id)->post->content = "Web technologies";
   return $posttitle." ----> ".$postcontent;
});

Route::get("/post/{id}/user", function($id) {
    return Post::find($id)->user->name;//user jest metoda z klasy post (relationship)
});

//ONE TO MANY RELATIONSHIP

Route::get("/posts/{id}", function($id) {
   $user = User::find($id);
   foreach ($user->posts as $post) {//posts metoda z user klasy
     echo $post->title. "---> ".$post->content."<br>";
   }
});



//MANY TO MANY RELATIONSHIP - PIVOT

Route::get("/user/{id}/role",function($id) {
    
    // $user = User::find($id)->roles()->orderBy('name','desc')->get();
    // echo $user;

    $user = User::find($id);
    foreach ($user->roles as $role) {
      echo $role->name;
    }
    });
    
    Route::get("/role/{id}/user",function($id) {


    $role = Role::find($id);
    foreach ($role->users as $user) {
      echo $user->name;
    }
    });
    
//   ACCESSING INTERMEDIATE TABLE - PIVOT 

    Route::get("/user/pivot",function() {
     $user = User::find(1);
      foreach ($user->roles as $role) {
      return $role->pivot->created_at;
      }
  
});

//HAS MANY THROUGH RELATIONSHIP

Route::get("/user/country",function() {
   $country = Country::find(3);
   foreach ($country->posts as $post) {
     echo $post->title.' <br>';
   }
});

//POLYMORPHIC RELATIONS

Route::get("/user/photos",function() {
    $user = User::find(2);
    foreach ($user->photos as $photo) {
    echo $photo->path."<br>";
    }

});

Route::get("/post/photos",function() {
    $post = Post::find(1);
    foreach ($post->photos as $post) {
    echo $post;
    }

});

//POLIMORHIC INVERSE
Route::get("/photo/{id}/post",function($id) {
    $photo = Photo::findOrFail($id);
    echo $photo->imageable;
    
});


Route::get("/photos", function() {
    $photo = Photo::find(2);
    echo $photo->imageable_type;
});

//POLIMORPHIC MANY TO MANY
Route::get("/post/tags", function() {
    $post = Post::find(3);
    foreach ($post->tags as $tag) {
        echo $tag->name."<br>";
    }
});

//owner of tags

Route::get("/tag/post",function() {
  $tag = Tag::find(1);
 foreach ($tag->posts as $post) {
     echo $post->title;
 }
   
  
});

