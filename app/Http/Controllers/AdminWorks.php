<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class AdminWorks extends Controller
{

  /**
   * Fonction qui retourne la liste des derniers works ajoutés
   * @param  integer $limit [description]
   * @return [type]         [description]
   */
     public function index(int $limit = 15) {
        $works = Work::orderBy('created_at', 'DESC')
                     ->take($limit)
                     ->get();
        return view('admin.works.index', compact('works'));
    }

    /**
     * Fonction qui retourne la vue du formulaire de création d'un post
     * @return [type] [description]
     */
       public function create() {
            return view('admin.works.create');
      }

      /**
       * Fonction de création d'un nouvel objet Work
       * https://codimth.com/blog/web/laravel/how-upload-files-laravel-8
       * https://www.remotestack.io/how-to-upload-file-in-laravel-with-validation/
       * https://www.itsolutionstuff.com/work/laravel-8-image-upload-tutorial-exampleexample.html
       * @param  Request $request [description]
       * @return [type]           [description]
       */
      public function store(Request $request) {
          $request->validate([
              'title' => 'required',
              'content' => 'required',
              'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
              'inSlider' => 'required',
              'client_id' => 'required'
          ]);

          if ($request->hasFile('image')):
              // On renomme l'image avec le timestamp UNIX actuel + l'extension
              $imageName = time().'.'.$request->image->extension();
              // On enregistre l'image dans le dossier storage
              $request->image->storeAs('works/images', $imageName);
              // On déplace l'image du dossier storage vers le dossier public
              $request->image->move(public_path('assets/img/portfolio'), $imageName);

          else:
              $imageName = '';
          endif;

          // On utilise $request->only pour récupérer le nom de l'image dans la db
          // Attacher un tag : https://stackoverflow.com/questions/41396270/laravel-sync-attach-tags
          Work::create($request->only(['title', 'content', 'inSlider', 'client_id']) + ['image' => $imageName])->tags()->attach($request->tags);
          return redirect()->route('admin.works.index');
      }

}
