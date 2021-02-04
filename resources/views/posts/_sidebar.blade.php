<!-- Sidebar -->
<div class="col-sm-4 blog-sidebar">

  @include('posts._recent', ['posts' => \App\Models\Post::orderBy('created_at', 'DESC')->take(4)->get()])

  @include('categories.index', ['categories' => \App\Models\Categorie::orderBy('name', 'ASC')->get()])


</div>
<!-- End Sidebar -->
