<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index(): View
    {
        if (request('search')) {

            $penulis = Post::penulisid()->latest()->paginate(6)->withQueryString();
            if ($penulis->toArray()['data']) $data = $penulis;


            if (empty($data)) {
                $category = Post::categoryid()->latest()->paginate(6)->withQueryString();
                if ($category->toArray()['data']) $data = $category;
            }

            if (empty($data)) {

                $artikel = Post::judul(request())->latest()->paginate(6)->withQueryString();
                if ($artikel->toArray()['data']) $data = $artikel;
            }
        } else {
            $data = Post::where("penulis_id", auth()->user()->id)->latest()->paginate(6);
        };
        return view('blog', ["posts" => $data, "title" => "blog", "name" => "Blog"]);
    }

    public function category(Category $id): View
    {
        $posts = $id->load('Post');
        return view('category', ["category" => $posts, "title" => "Article In " . $id->name, "name" => "Article In " . $id->name]);
    }

    public function penulis(User $id): View
    {
        $posts = $id->load('Post');
        return view('writer', ["penulis" => $posts, "title" => "Article By " . $id->name, "name" => "Article By " . $id->name]);
    }

    public function artikel(Post $id): View
    {
        $posts = $id;
        return view('artikel', ["post" => $posts, "title" => "Article", "name" => "Article"]);
    }

    public function dashboard(): View
    {
        $post = Post::latest()->paginate(10);
        $category = Category::all();
        $penulis = User::all();
        return view('admin/home', ["user" => $penulis, "category" => $category, "posts" => $post, "title" => "Dashboard", "name" => "Dashboard"]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'max:100|min:10',
            'waktu' => '',
            'sinopsis' => 'min:50',
            'penulis_id' => '',
            'category_id' => '',
        ]);

        if ($request->file('file_input') && $request->file('file_input')->store('post-images')) {
            $validated['image'] = $request->file('file_input')->getClientOriginalName();
        }

        $create = Post::create($validated);
        if ($create) {
            return redirect('/dashboard')->with('notification', ['Berhasil', 'Tulisan Berhasil diposting', 'success']);
        } else {
            return redirect('/dashboard')->with('notification', ['Gagal', 'Tulisan Gagal diposting', 'error']);
        }
    }

    public function create()
    {
        dd("okok");
    }

    public function edit(Post $id)
    {
        return view("admin/artikel-update", ["post" => $id, "users" => User::all(), "categories" => Category::all(), "title" => "Update Article", "name" => "Update Article"]);
    }

    public function update(request $request)
    {
        $validated = $request->validate([
            'judul' => 'max:100|min:10',
            'waktu' => '',
            'sinopsis' => 'min:50',
            'penulis_id' => '',
            'category_id' => '',
        ]);
        // $validated['sinopsis'] = e($validated['sinopsis']);
        $update = Post::where("id", $request->id)->update($validated);
        if ($update) {
            return redirect('/dashboard')->with('notification', ['Berhasil', 'Tulisan Berhasil diperbarui', 'success']);
        } else {
            return redirect('/dashboard')->with('notification', ['Gagal', 'Tulisan Gagal diperbarui', 'error']);
        }
    }

    public function destroy($id)
    {
        $delete = Post::where("id", $id)->delete();
        if ($delete) {
            return redirect('/dashboard')->with('notification', ['Berhasil', 'Tulisan Berhasil dihapus', 'success']);
        } else {
            return redirect('/dashboard')->with('notification', ['Gagal', 'Tulisan Gagal dihapus', 'error']);
        }
    }

    public function upload(Request $request) {}
}
