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
        $types = Type::all();
        $searching = (isset($request->searching) ? $request->searching : '');
        $filter = $this->getTypes($request);
        $filtering = [];

        for ($i = 1; $i <= count($types); $i++) {
            if (in_array($i, $filter)) {
                array_push($filtering, 1);
            } else {
                array_push($filtering, 0);
            }
        }

        if (empty($request->searching)) {
            /** If searching was empty, we will response with the six latest resources added */
            $recursos = DB::table('resources')
                ->join('types', 'types.id', '=', 'resources.type_id')
                ->select('resources.*', 'types.name as tipo', 'types.icon', 'types.class')
                ->whereIn('resources.type_id', (empty($filter) ? [1, 2, 3, 4, 5, 6] : $filter))
                ->latest()
                ->limit(6)
                ->paginate(10);
            $searching = 'Últimos recursos agregados';
            return view('buscador', compact('recursos', 'types', 'searching', 'filtering'));
        } else {
            $recursos = DB::table('resources')
                ->join('types', 'types.id', '=', 'resources.type_id')
                ->select('resources.*', 'types.name as tipo', 'types.icon', 'types.class')
                ->where([
                    ['resources.name', 'like', "%{$request->searching}%"]
                    //['resources.type_id', '=', '1']
                ])
                ->whereIn('resources.type_id', (empty($filter) ? [1, 2, 3, 4, 5, 6] : $filter))
                //->get();
                ->paginate(10);

            //$recursos->withPath('?searching=PHP');

            return view('buscador', compact('recursos', 'types', 'searching', 'filtering'));
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

        return $filtro;
    }
}
