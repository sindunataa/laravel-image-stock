<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::latest()->paginate(5);
        
        return view('pages.albums.index',compact('albums'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();

        Album::create($input);

        return redirect()->route('albums.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('pages.albums.show',compact('album'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $albums = Album::get();
        $edit = Album::where('id', $id)->first();
        return view('pages.albums.edit',compact('albums', 'edit'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
        
        ]);
        $input = $request->all();

        $albums = Album::findorfail($id);

        $albums->update($input);

        return redirect()->route('albums.index')    
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->galery()->delete();
        $album->DELETE();
     
        return redirect()->route('albums.index')
                        ->with('success','Product deleted successfully');
    }
}
