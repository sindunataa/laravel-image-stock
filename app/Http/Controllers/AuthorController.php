<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::latest()->simplePaginate(10);

        return view('pages.authors.index',compact('authors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
    
        return view('pages.authors.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
            'address' => 'required',

        ]);

        $data_authors = [
            'name' => $request->name,
            'address' => $request->address,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('authors', $request->image);
            $data_authors['image'] = $image;
        }

        Author::create($data_authors);

        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('pages.authors.show' ,compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $authors, $id)
    {
        $authors = Author::all();
        $edit = Author::where('id', $id)->first();

        return view('pages.authors.edit', compact('authors', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $authors, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',

        ]);

        $authors = Author::findorfail($id);

        $data_authors = [
            'name' => $request->name,
            'address' => $request->address,
        ];

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('authors', $request->image);
            $data_authors['image'] = $image;
            // dd($object['avatar']);
            if ($authors->image) {
                FacadesFile::delete('./uploads/' . $authors->image);
            }
        }

        $authors->update($data_authors);

        return redirect()->route('authors.index')
        ->with('success', 'Product updated succes sfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::where('id', $id)->firstOrFail();
        FacadesFile::delete('./uploads/' . $author->image);
        $author->DELETE();

        return redirect()->route('authors.index')
            ->with('success', 'Product deleted successfully');
    }
}