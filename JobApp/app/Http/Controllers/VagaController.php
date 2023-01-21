<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga as Vaga;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quantidadeDeItensAExibir = 5;
        $listaVagas = Vaga::latest()->paginate($quantidadeDeItensAExibir);


        return view( 'vaga/listar',  compact('listaVagas') )
                ->with('i', (request()->input('page', 1) - 1) * $quantidadeDeItensAExibir );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaga/create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request){
        $storeData = $request->validate(
            [
                'nome' => 'required|max:25',
                'sobrenome' => 'required|max:25',
                'arquivo' => 'required|max:255'
            ]
        );
        
        Vaga::create($storeData);

        $storeData = $request->all();

        if ($arquivo = $request->file('arquivo')) {
            $destino = 'JobApp/public';
            $profile = date('YmdHis') . "." . $arquivo->getClientOriginalExtension();
            $arquivo->move($destino, $profile);
            $storeData['arquivo'] = "$profile";
        }
        Product::create($storeData);
     
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    

        return redirect('vaga');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vaga $vaga)
    { 
        return view ('vaga/show', compact('vaga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaga $vaga)
    { 
        return view('vaga.edit', compact('vaga'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaga $vaga)
    {
        $storeData = $request->validate(
            [
                'nome' => 'required|max:25',
                'sobrenome' => 'required|max:25',
                'arquivo' => 'required|max:255'
            ]
            );
    
            $vaga->update($storeData);

            $storeData = $request->all();
  
        if ($arquivo = $request->file('arquivo')) {
            $destino = 'JobApp/public';
            $profile = date('YmdHis') . "." . $arquivo->getClientOriginalExtension();
            $arquivo->move($destino, $profile);
            $storeData['arquivo'] = "$profile";
        }else{
            unset($storeData['arquivo']);
        }
          
        $product->update($storeData);
    
            return redirect('/vaga')->with('success' , 'Dados Editados com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaga $vaga)
    {
        $vaga->delete($vaga);
        return redirect('/vaga')->with('succes' ,'Dado apagada com sucesso');
    }
}
