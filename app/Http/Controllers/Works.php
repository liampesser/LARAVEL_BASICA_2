<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class Works extends Controller
{

  /**
   * Index des works
   * @param  integer $limit [description]
   * @return [type]         [description]
   */
  public function index(int $limit = 6) {
      $works = Work::orderBy('created_at', 'DESC')
                  ->take($limit)
                  ->get();
      return view('works.index', compact('works'));
  }

  /**
   * Détails d'un work
   * @param  Work   $work [description]
   * @return [type]       [description]
   */
  public function show(Work $work) {
        return view('works.show', compact('work'));
    }

}
