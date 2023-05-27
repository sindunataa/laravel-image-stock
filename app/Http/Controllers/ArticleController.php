<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $authors =Author::all();
        $articles = Article::with('author')->latest()->get();

        return view('pages.articles.index', compact('articles','authors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $articles = Article::all();
        $authors = Author::all();
    
        return view('pages.articles.create', compact('articles','authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' =>'required',
            'content' =>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'author_id'=> 'required'
        ]);

        $data_articles = [
            'title'=> $request->title,
            'status'=> $request->status,
            'content'=> $request->content,
            'author_id'=> $request->author_id,
        ];

        if ($request->has('image')){
            $image = Storage::disk('uploads')->put('articles', $request->image);
            $data_articles['image'] = $image;
        }
        Article::create($data_articles);
        return redirect()->route('articles.index');
    }
   

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article, $id)
    {
        $author = Author::get();
        $article = Article::with('author')->get();
        $edit = Article::where('id', $id)->first();
        
        return view('pages.articles.edit', compact('article','author','edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' =>'required',
            'content' =>'required',
            'author_id'=> 'required',
        ]);

        $article = Article::findorfail($id);

        $data_articles = [
            'title'=> $request->title,
            'status'=> $request->status,
            'content'=> $request->content,
            'author_id'=> $request->author_id,
        ];

        if($request->has('image')){
            $image = Storage::disk('uploads')->put('articles', $request->image);
            $data_articles['image']= $image;
            
            if ($article->image){
                FacadesFile::delete('./uploads/' . $article->image);
            }
        }

        $article->update($data_articles);

        return redirect()->route('articles.index')
        ->with('success', 'Product updated succes sfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $article
        ->image);
        $article->DELETE();

        return redirect()->route('articles.index')
            ->with('success', 'Product deleted successfully');
    }
}
