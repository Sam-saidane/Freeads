<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Response;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\Storage;
use App\Models\article;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $article = article::all();

        return view('indexx', compact('article'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'nom' => 'required|max:55',
        'description' => 'required|max:255',
        'prix' => 'required|int',
        'lieu' => 'required|max:255',
        ]);
        $all = $request->all();
        $name = Storage::put('uploads/',$request->file('image'));
        $path = 'storage'.substr($name,strrpos($name,'/'));
        //var_dump($request->file('image'));

        $article = article::create(['nom' =>$validatedData['nom'],
        'description' => $validatedData['description'],
        'prix' => $validatedData['prix'],
        'lieu' => $validatedData['lieu'],
        'image' => $path
        
        ]);

        return redirect('/article')->with('success', 'Article créer avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $article = article::findOrFail($id);

        return view('edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:55',
            'description' => 'required|max:255',
            'prix' => 'required',
            'lieu' => 'required|max:255',
        ]);
        $name = Storage::put('uploads/',$request->file('image'));
        $path = 'storage'.substr($name,strrpos($name,'/'));
        
        $article = article::whereId($id)->update(['nom' =>$validatedData['nom'],
        'description' => $validatedData['description'],
        'prix' => $validatedData['prix'],
        'lieu' => $validatedData['lieu'] ,
        'image'=> $path
        ]);
        return redirect('/article')->with('success', 'Article mis a jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = article::findOrFail($id);
        $article->delete();

        return redirect('/article')->with('success', 'suprimer avec succèss');
    }

}
