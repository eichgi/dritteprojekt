<?php

namespace App\Http\Controllers;

use App\Language;
use App\Resource;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function recursos()
    {
        $resources = Resource::all();
        $languages = Language::pluck('name', 'id');
        $types = Type::pluck('name', 'id');
        $method = 'POST';
        $url = '/resource';
        return view('recursos', compact('resources', 'languages', 'types', 'method', 'url'));
    }

    public function buscador(Request $request)
    {
        //dd($request->query);
        $types = Type::all();
        $searching = (isset($request->searching) ? $request->searching : '');
        $recursos = [];

        if (empty($request->searching)) {
            return view('buscador', compact('recursos', 'types', 'searching'));
        } else {
            $filter = $this->getTypes($request);
            //dd($filter);

            /*$recursos = Resource::where([
                ['name', 'like', "%{$request->searching}%"]
            ])->get();*/

            $recursos = DB::table('resources')
                ->join('types', 'types.id', '=', 'resources.type_id')
                //->select('resources.name as recurso', 'types.name as tipo')
                ->select('resources.*', 'types.name as tipo', 'types.icon')
                ->where([
                    ['resources.name', 'like', "%{$request->searching}%"]
                    //['resources.type_id', '=', '1']
                ])
                ->whereIn('resources.type_id', (empty($filter) ? [1, 2, 3, 4, 5, 6] : $filter))
                //->where('resources.type_id', 'in', '(1)')
                //->get();
                ->paginate(1);

            //$recursos->withPath('?searching=PHP');

            //dd($recursos);

            return view('buscador', compact('recursos', 'types', 'searching'));
        }
    }

    public function getTypes($request)
    {
        $types = Type::pluck('name');
        $tipos = [];
        $busqueda = [];
        $filtro = [];

        foreach ($request->request as $key => $value) {
            $key = str_replace('_', ' ', $key);
            array_push($busqueda, $key);
        }

        foreach ($types as $type) {
            array_push($tipos, $type);
        }
        //dd($request->request);
        //dd(array_search('Canales de Youtub', $tipos));
        $filtro = [];
        for ($i = 0; $i < count($busqueda); $i++) {
            $index = array_search($busqueda[$i], $tipos);
            if (is_int($index)) {
                array_push($filtro, $index + 1);
            }
        }

        //dd($filtro);
        return $filtro;
    }
}
