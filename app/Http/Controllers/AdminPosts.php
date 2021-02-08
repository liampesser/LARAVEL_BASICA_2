<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPosts extends Controller
{

  /**
   * Index des posts
   * @param  integer $limit [description]
   * @return [type]         [description]
   */
     public function index(int $limit = 15) {
           $posts = Post::orderBy('created_at', 'DESC')
                        ->take($limit)
                        ->get();
           return view('admin.posts.index', compact('posts'));
    }

  /**
   * Formulaire d'édition d'un post
   * @return [type] [description]
   */
     public function create() {
          return view('admin.posts.create');
    }

    /**
     * Création d'un nouvel objet Post
     * https://codimth.com/blog/web/laravel/how-upload-files-laravel-8
     * https://www.remotestack.io/how-to-upload-file-in-laravel-with-validation/
     * https://www.itsolutionstuff.com/post/laravel-8-image-upload-tutorial-exampleexample.html
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categorie_id' => 'required'
        ]);

        if ($request->hasFile('image')):
            // On renomme l'image avec le timestamp UNIX actuel + l'extension
            $imageName = time().'.'.$request->image->extension();
            // On enregistre l'image dans le dossier storage
            $request->image->storeAs('posts/images', $imageName);
            // On déplace l'image du dossier storage vers le dossier public
            $request->image->move(public_path('assets/img/blog'), $imageName);

        else:
            $imageName = '';
        endif;

        // On utilise $request->only pour récupérer le nom de l'image dans la db
        Post::create($request->only(['title', 'content', 'categorie_id']) + ['image' => $imageName]);
        return redirect()->route('admin.posts.index');
    }

}
