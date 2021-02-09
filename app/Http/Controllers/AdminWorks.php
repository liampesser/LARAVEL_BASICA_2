<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class AdminWorks extends Controller
{

  /**
   * Liste des works
   * @param  integer $limit [description]
   * @return [type]         [description]
   */
     public function index(int $limit = 15) {
        $works = Work::orderBy('created_at', 'DESC')
                     ->take($limit)
                     ->get();
        return view('admin.works.index', compact('works'));
    }

}
