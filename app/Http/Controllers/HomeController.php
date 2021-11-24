<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;
use App\Models\Produtos;
use App\Models\Produtos_Teste;
use App\Mail\SendMailRepetido;
use App\Mail\SendMailDelete;
use App\Mail\SendMailAdd;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
	
	public function find_prod(Request $request){
		
		if($request->input('name') != '#')
		{
			$produtos = Produtos::select(["nome", "fabricante", "ingredientes", "foto"])
			 ->where("nome", "LIKE", "%{$request->input('name')}%")
			 ->orWhere("fabricante", "LIKE", "%{$request->input('name')}%")
			 ->orderBy("nome", "ASC")
			 ->get();
		 }
		 else
		 {
			$produtos = Produtos::select(["nome", "fabricante", "ingredientes", "foto"])
			 ->orderBy("nome", "ASC")
			 ->get();
		 }
		 
		 foreach($produtos as $produto){
			if(!empty($produto->foto))
			{
				 $produto->foto = base64_encode($produto->foto);
			}
		}

		 return view('product_detail', ['produtos' => $produtos]);
	}
	
	public function store(Request $request){

		$produto = new Produtos_Teste();

		$produto->nome = request('nome');
		$produto->fabricante = request('fabricante');
		$produto->ingredientes = request('ingredientes');
		$produto->email = request('email');
		
		if ($request->hasFile('foto')) {

            $file = $request->file('foto');
			$imageType = $file->getClientOriginalExtension();
			$image_resize = Image::make($file)->resize(null, 200, function ( $constraint ) {	$constraint->aspectRatio(); })->encode($imageType);
			$produto->foto = $image_resize;
        }
		
		$produto->save();
		return redirect('/');
	}
	
	public function suporte(){
		$produtos = Produtos_Teste::select(["id", "nome", "fabricante", "ingredientes", "foto", "email", "created_at"])->orderBy("nome", "ASC")->get();
		 
		 foreach($produtos as $produto){
			if(!empty($produto->foto))
			{
				$produto->foto = base64_encode($produto->foto);
			}
		}

		 return view('suporte', ['produtos' => $produtos]);
	}
	
	public function validacao(){
		$produtos = Produtos::select(["nome", "fabricante"])->orderBy("nome", "ASC")->get();
		$produtosTeste = Produtos_Teste::select(["nome", "fabricante", "email"])->orderBy("nome", "ASC")->get();
		$prodDelete = [];
		$i = 0;
		$j = 0;
		
		foreach($produtos as $prod){
			foreach($produtosTeste as $prodT){
				if(($prod->nome == $prodT->nome) && ($prod->fabricante == $prodT->fabricante))
				{
					$prodDelete[$i][$j] = $prodT->nome;
					$prodDelete[$i][$j+1] = $prodT->fabricante;
					Mail::to($prodT->email)->send(new SendMailRepetido($prodT->nome, $prodT->fabricante));
					$i++;
				}
			}
		}

		for($i = 0; $i < sizeof($prodDelete); $i++){
			Produtos_Teste::where("nome", "LIKE", $prodDelete[$i][$j])
							->where("fabricante", "LIKE", $prodDelete[$i][$j+1])->delete();
		}
		
		return redirect('/suporte');
	}
	
	public function addProduto(int $id){
		$produtoTeste = Produtos_Teste::where("id", $id)->get();

		foreach($produtoTeste as $prodT)
		{
			$produto = new Produtos();
			$produto->nome = $prodT->nome;
			$produto->fabricante = $prodT->fabricante;
			$produto->ingredientes = $prodT->ingredientes;
			$produto->foto = $prodT->foto;
			$produto->save();
			Mail::to($prodT->email)->send(new SendMailAdd($prodT->nome, $prodT->fabricante));
		}

		Produtos_Teste::where("id", $id)->delete();
		return redirect('/suporte');
	}
	
	public function delProduto(int $id){
		$produtoTeste = Produtos_Teste::where("id", $id)->get();
		
		foreach($produtoTeste as $prodT)
		{
			Mail::to($prodT->email)->send(new SendMailDelete($prodT->nome, $prodT->fabricante));
		}
		
		Produtos_Teste::where("id", $id)->delete();
		return redirect('/suporte');
	}
	
	public function logout()
	{
		session()->flush();
		return redirect('/');
	}
}
