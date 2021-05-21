<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("isAdmin");
        $images = Image::all();
        return view('admin.image.main', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.image.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize("isAdmin");
        request()->validate([
            "nom" => ["required"],
            // "src" => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],    
        ]);
        $image = new Image();
        $image->nom = $request->nom;
        $image->categorie_id = $request->categorie_id;
        //Condition pour vérifier si le request vient d'input FILE ou un input URL (priorité à l'input FILE)
        if ($request->src) {
            $request->file('src')->storePublicly('img/','public');
            $image->src = $request->file('src')->hashName();
        }else{
            $fichierURL = file_get_contents($request->srcURL);
            $lien = $request->srcURL;
            $token = substr($lien, strrpos($lien, '/') + 1);
            Storage::disk('public')->put('img/'.$token , $fichierURL);
            $image->src = $token;
        }

        $image->save();
        return redirect()->route('image.index')->with('success', $request->nom . ' bien ajouté !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $this->authorize("isAdmin");
        // Storage::disk('public')->delete('img/' . $image->src);
        $image->delete();
        return redirect()->route('image.index')->with('warning', 'Image bien supprimé');
    }

    //Function en plus qui est autorisé au role 'Membre'
    public function gallerie()
    {
        $images = Image::all();
        return view('admin.gallerie.main', compact("images"));
    }
    public function download(Image $image)
    {
        return Storage::disk('public')->download('img/' .$image->src );
    }
}
