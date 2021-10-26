<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Produtos_Teste;
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
		$produtos = Produtos::select(["nome", "fabricante", "ingredientes", "foto"])
		 ->where("nome", "LIKE", "%{$request->input('name')}%")
		 ->orWhere("fabricante", "LIKE", "%{$request->input('name')}%")
		 ->get();
		 
		 foreach($produtos as $produto){
			if(!empty($produto->foto))
			{
				 $image = imagecreatefromstring($produto->foto); 

				 ob_start();
				 imagejpeg($image, null, 80);
				 $produto->foto = ob_get_contents();
				 ob_end_clean();
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

		dd($request->all(), $request->has('photo'));

		if ($request->hasFile('foto')) {

            $file = $request->file('foto');
			$imageType = $file->getClientOriginalExtension();
			
			$image_resize = Image::make($file)->resize( null, 90, function ( $constraint ) {
																	$constraint->aspectRatio();
																})->encode( $imageType );            
			$produto->foto = $image_resize;
			
			echo $produto; die();
            $produto->save();
        }

		return redirect('/');
	}
}
