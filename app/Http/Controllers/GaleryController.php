<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Author;
use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        $galeries = Galery::with('album', 'author')->latest()->simplePaginate(10);

        return view('pages.galeries.index', compact('galeries', 'albums'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();
        $authors = Author::all();
        
        return view('pages.galeries.create', compact('albums', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'description' => 'required',
            'album_id' => 'required',
            'author_id' => 'required',
        ]);

        $data_galeries = [
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description,
            'album_id' => $request->album_id,
            'author_id' => $request->author_id,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('galeries', $request->image);
            $data_galeries['image'] = $image;
        }

        Galery::create($data_galeries);

        return redirect()->route('galeries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::all();
        $author = Author::all();
        $edit = Galery::where('id', $id)->first();

        return view('pages.galeries.edit', compact('album','author', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galery $galery, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'album_id' => 'required',
            'author_id' => 'required',
        ]);

        $galery = Galery::findorfail($id);

        $data_galeries = [
            'title' => $request->title,
            'status' => $request->status,
            'description' => $request->description,
            'album_id' => $request->album_id,
            'author_id' => $request->author_id,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('galeries', $request->image);
            $data_galeries['image'] = $image;
            // dd($object['avatar']);
            if ($galery->image) {
                FacadesFile::delete('./uploads/' . $galery->image);
            }
        }

        $galery->update($data_galeries);

        return redirect()->route('galeries.index')
        ->with('success', 'Product updated succes sfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $galery = Galery::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $galery->image);
        $galery->DELETE();

        return redirect()->route('galeries.index')
            ->with('success', 'Product deleted successfully');
    }
}
