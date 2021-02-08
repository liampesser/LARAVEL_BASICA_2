<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Posts extends Controller
{

  /**
   * Index des posts
   * @param  integer $limit [description]
   * @return [type]         [description]
   */
  public function index(int $limit = 4) {
      $posts = Post::orderBy('created_at', 'DESC')
                   ->take($limit)
                   ->get();
      return view('posts.index', compact('posts'));
  }

  /**
   * Détails d'un post
   * @param  Post   $post [description]
   * @return [type]       [description]
   */
  public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

}
