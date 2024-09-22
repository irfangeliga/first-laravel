<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/category/{id}', function (Category $id) {
    $post = $id->load('Post');
    return view('category', [
        "title" => "category",
        "name" => "category",
        "category" =>  $post
    ]);
});

Route::get('/writer/{id:username}', function (User $id) {
    dd($id->category);
    dd($id->post);
    $data = array_merge($category, $post);
    return view('writer', [
        "title" => "writer",
        "name" => "writer",
        "penulis" =>  $id->paginate(6)->toArray()
    ]);
});

Route::get('/artikel/{id}', function (Post $id) {
    return view('artikel', [
        "title" => "artikel",
        "name" => "artikel",
        "post" =>  $id
    ]);
});

Route::get('/blog', function () {
    $data = [];
    if (request('search')) {

        $penulis = Post::penulisid()->latest()->paginate(6)->withQueryString();
        if ($penulis->toArray()['data']) $data = $penulis;


        if (empty($data)) {
            $category = Post::categoryid()->latest()->paginate(6)->withQueryString();
            if ($category->toArray()['data']) $data = $category;
        }

        if (empty($data)) {
            dd("okok");

            $artikel = Post::judul(request())->latest()->paginate(6)->withQueryString();
            if ($artikel->toArray()['data']) $data = $artikel;
        }
    } else {
        $data = Post::latest()->paginate(6);
    };
    return view("blog", [
        "name" => "blog",
        "title" => "blog",
        "posts" =>  $data
    ]);
});

Route::get('/{name}', function ($name) {
    return view($name, [
        "name" => $name,
        "title" => $name
    ]);
});
