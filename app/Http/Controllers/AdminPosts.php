<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPosts extends Controller
{

  /**
   * Fonction qui retourne la vue de liste des derniers posts ajoutés
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
   * Fonction qui retourne la vue du formulaire de création d'un objet Post
   * @return [type] [description]
   */
     public function create() {
          return view('admin.posts.create');
    }

    /**
     * Fonction de création d'un nouvel objet Post
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
            'image' => 'nullable',
            'categorie_id' => 'required'
        ]);

        if ($request->hasFile('image')):
            // On renomme l'image avec le timestamp UNIX actuel + l'extension
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
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

    /**
     * Fonction qui retourne la vue du formulaire d'édition d'un post
     * @param  Post   $post [description]
     * @return [type]       [description]
     */
    public function edit(Post $post) {
      return view('admin.posts.edit', compact('post'));
    }

    /**
     * Fonction d'édition d'un objet Post
     * @param  Request $request [description]
     * @param  Post    $post    [description]
     * @return [type]           [description]
     */
    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable',
            'categorie_id' => 'required'
        ]);

        if ($request->hasFile('image')):
            // On renomme l'image avec le timestamp UNIX actuel + l'extension
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            // On enregistre l'image dans le dossier storage
            $request->image->storeAs('posts/images', $imageName);
            // On déplace l'image du dossier storage vers le dossier public
            $request->image->move(public_path('assets/img/blog'), $imageName);
            // On utilise $request->only pour récupérer le nom de l'image dans la db
            $post->update($request->only(['title', 'content', 'categorie_id']) + ['image' => $imageName]);
        else:
            $post->update($request->only(['title', 'content', 'categorie_id']));
        endif;

        return redirect()->route('admin.posts.index');
    }

    /**
     * Fonction de suppression d'un Post
     * @param  Post   $post [description]
     * @return [type]       [description]
     */
    public function destroy(Post $post) {
      $post->delete();
      return redirect()->route('admin.posts.index');
    }

}
