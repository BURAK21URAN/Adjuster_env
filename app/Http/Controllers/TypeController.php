<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required',
            'type_description' => 'required',
        ]);
        \Log::info('Request Data:', $request->all());

        /*Type::create([
            'type_name' => $request->type_name,
            'type_description' => $request->type_description,
        ]);*/
        Type::create($request->all());
        

        return redirect()->route('types.index')->with('success', 'Type created successfully.');
    }
    /*public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required',
            'type_description' => 'nullable',
        ]);

        Type::create([
            'type_name' => $request->type_name,
            'type_description' => $request->type_description,
        ]);

        return redirect()->route('types.index')->with('success', 'Type added successfully');
    }*/
}
