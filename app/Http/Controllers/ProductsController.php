<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    #https://laravel.com/docs/11.x/eloquent#retrieving-models
    public function getAvailableProducts()
    {
        return view('welcome', ['products' => Product::where('quantity', '>', 0)->where('price', '>', 0)->get()]);
    }

    public function index()
    {
        $products = Product::with('type')->get();
        return view('products.index', ['products' => $products]);
    }
    public function indexDashboard()
    {
        $products = Product::with('type')->get();
        return view('dashboard', ['products' => $products,]);
    }

    //abre o formulário vazio para um novo registro
    public function create()
    {
        return view('products.create', ['types' => Type::all()]);
    }

    //função chamada no submit do form..será um POST com os dados
    public function store(Request $request)
    {
        //dd($request->all());return;
        //não esquecer import do Product model.

        $request->validate([
            'name' => 'required|min:2|max:20',
            'description' => 'max:200',
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id
        ]);
        #return ' <p> Produto salvo com sucesso! </p> ';
        return redirect('/products')->with('success', 'Produto salvo com sucesso!');
    }

    public function edit($id)
    {
        //find é o método que faz select * from products where id= ?
        $product = Product::find($id);
        //retornamos a view passando a TUPLA de produto consultado
        return view('products.edit', ['product' => $product, 'types' => Type::all()]);
    }

    public function update(Request $request)
    {
        //dd($request->all());return;
        $product = Product::find($request->id);
        //método update faz um update product set name = ? etc...
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id
        ]);
        return redirect('/products')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        //select * from product where id = ?
        $product = Product::find($id);
        //deleta o produto no banco
        $product->delete();
        return redirect('/products')->with('deleted', 'Produto excluído!');
    }
}
