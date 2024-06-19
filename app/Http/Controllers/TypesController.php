<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    #https://laravel.com/docs/11.x/eloquent#retrieving-models
    public function index()
    {
        $types = Type::all();
        return view('types.index', ['types' => $types]);
    }

    //abre o formulário vazio para um novo registro
    public function create()
    {
        return view('types.create');
    }

    //função chamada no submit do form..será um POST com os dados
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:2|max:20',
        ]);

        Type::create([
            'name' => $request->name,
        ]);
        return redirect('/types')->with('success', 'Tipo criado com sucesso!');
    }

    public function edit($id)
    {
        $type = Type::find($id);
        return view('types.edit', ['type' => $type, 'types' => Type::all()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:20',
        ]);
        $type = Type::find($request->id);
        $type->update([
            'name' => $request->name,
        ]);
        return redirect('/types')->with('success', 'Tipo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $type = Type::find($id);
        $type->products()->delete();
        $type->delete();
        return redirect('/types')->with('deleted', 'Tipo excluído!');
    }
}
