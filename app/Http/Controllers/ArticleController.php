<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("isAdminWebmaster");
        $articles = Article::all();
        return view('admin.article.main', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize("isAdminWebmaster");
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize("isAdminWebmaster");
        request()->validate([
            "titre" => ["required"],            
            "auteur" => ["required"],            
            "description" => ["required"],            
            // "src" => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],    
        ]);
        $article = new Article();
        $article->titre = $request->titre;
        $article->auteur = $request->auteur;
        $article->description = $request->description;
        //Condition pour vérifier si le request vient d'input FILE ou un input URL (priorité à l'input FILE)
        if ($request->src) {
            $request->file('src')->storePublicly('img/','public');
            $article->src = $request->file('src')->hashName();
        }else{
            $fichierURL = file_get_contents($request->srcURL);
            $lien = $request->srcURL;
            $token = substr($lien, strrpos($lien, '/') + 1);
            Storage::disk('public')->put('img/'.$token , $fichierURL);
            $article->src = $token;
        }

        $article->save();
        return redirect()->route('article.index')->with('success', 'Article bien modifié !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize("isAdminWebmaster");
        return view('admin.article.edit', compact('article'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize("isAdminWebmaster");
        request()->validate([
            "titre" => ["required"],            
            "auteur" => ["required"],            
            "description" => ["required"],            
            // "src" => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],    
        ]);

        $article->titre = $request->titre;
        $article->auteur = $request->auteur;
        $article->description = $request->description;
        //Condition pour verifier si les champs sont vide ou pas
        if ($request->src || $request->srcURL) {
            //Condition pour vérifier si le request vient d'input FILE ou un input URL (priorité à l'input FILE)
            if ($request->src) {
                $request->file('src')->storePublicly('img/','public');
                $article->src = $request->file('src')->hashName();
            }else{
                $fichierURL = file_get_contents($request->srcURL);
                $lien = $request->srcURL;
                $token = substr($lien, strrpos($lien, '/') + 1);
                Storage::disk('public')->put('img/'.$token , $fichierURL);
                $article->src = $token;
            }
        }
        $article->save();
        return redirect()->route('article.index')->with('success', 'Article bien ajouté !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize("isAdminWebmaster");
        // Storage::disk('public')->delete('img/' . $article->src);
        $article->delete();
        return redirect()->route('article.index')->with('warning', 'Article bien supprimé');

    }

    public function blog()
    {
        $articles = Article::all();
        return view('admin.blog.main', compact('articles'));
    }
}
