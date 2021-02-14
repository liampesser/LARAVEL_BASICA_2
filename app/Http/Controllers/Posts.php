<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

//https://www.positronx.io/laravel-pagination-example-with-bootstrap-tutorial/#:~:text=Implementing%20pagination%20in%20laravel%20is,be%20shown%20to%20the%20user.
use Illuminate\Support\Facades\DB;

class Posts extends Controller
{

  /**
   * Fonction qui retourne la vue index des posts
   * @param  integer $limit [description]
   * @return [type]         [description]
   */
  public function index(int $limit = 4) {
      $posts = Post::orderBy('created_at', 'DESC')
                  // Pagination automatique de Laravel
                   ->paginate($limit);
      return view('posts.index', compact('posts'));
  }

  /**
   * Fonction qui retourne la vue du détail d'un post
   * @param  Post   $post [description]
   * @return [type]       [description]
   */
  public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

}
