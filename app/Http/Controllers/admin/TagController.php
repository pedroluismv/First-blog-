<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }


    public function create()
    {
        $colors = [
            'red' => 'Color rojo',
            'green' => 'Color verde',
            'yellow' => 'Color amarillo',
            'purple' => 'Color indigo',
            'blue' => 'Color azul',
            'pink' => 'Color rosado',
        ];
        return view('admin.tags.create', compact('colors'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

        Tag::create($request->all());
        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se creó con exito');
    }


    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Color rojo',
            'green' => 'Color verde',
            'yellow' => 'Color amarillo',
            'purple' => 'Color indigo',
            'blue' => 'Color azul',
            'pink' => 'Color rosado',
        ];
        return view('admin.tags.edit', compact('tag', 'colors'));
    }


    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);

        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actualizó con exito');
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se eliminó con exito');
    }
}
