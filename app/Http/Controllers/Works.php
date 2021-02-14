<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class Works extends Controller
{

  /**
   * Fonction qui retourne la vue index des works
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
   * Fonction qui retourne la vue du détail d'un work
   * @param  Work   $work [description]
   * @return [type]       [description]
   */
  public function show(Work $work) {
        return view('works.show', compact('work'));
    }

    /**
     * Fonction qui retourne la vue more works
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function more(Request $request) {
      $limit = (isset($request->limit)) ? $request->limit : 10;

      $works = Work::orderBy('created_at', 'DESC')
                      ->take($limit)
                      ->offset($request->offset)
                      ->get();
      return view('works._list', compact('works'));
    }

}
