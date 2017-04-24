<?php

namespace App\Http\Controllers;

use App\Language;
use App\Resource;
use App\Type;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::all();
        $languages = Language::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $method = 'POST';
        $url = '/resource';
        return view('recursos', compact('resources', 'languages', 'types', 'method', 'url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);

        $resource = new Resource;
        $resource->name = $request->name;
        $resource->type_id = $request->type_id;
        if (isset($request->has_cost) && $request->has_cost != null) {
            $resource->has_cost = 1;
        }
        $resource->language_id = $request->language_id;
        $resource->link = $request->link;
        $resource->description = $request->description;
        $resource->tags = '';

        $resource->save();

        //return view('recursos'); //This will cause errors if the view expects data
        //return url('/recursos'); url() prints the url passed as a parameter
        //return redirect('/recursos'); //Make a redirect instead of a view
        return back()->with('success', 'Recurso creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resource = Resource::find($id);
        dd($resource);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resources = Resource::all();
        $languages = Language::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $method = 'PATCH';

        $recurso = Resource::find($id);
        $url = "/resource/$recurso->id";

        return view('recursos', compact('resources', 'languages', 'types', 'method', 'url', 'recurso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);

        $resource = Resource::find($id);
        $resource->name = $request->name;
        $resource->type_id = $request->type_id;
        if (isset($request->has_cost) && $request->has_cost != null) {
            $resource->has_cost = 1;
        }
        $resource->language_id = $request->language_id;
        $resource->link = $request->link;
        $resource->description = $request->description;
        $resource->tags = '';

        $resource->save();
        //return back()->with('success', 'Recurso actualizado satisfactoriamente');
        return redirect('/recursos')->with('success', 'Recurso actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resource::destroy($id);
        return back()->with('success', 'Registro eliminado satisfactoriamente');
    }
}
