@extends('layout')

@section('content')

@if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whopps!</strong> Ocorrem erros!<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
                     
                    
                </div>
<form action="{{ route('vaga.store') }}" method="POST" enctype="multipart/form-data>
@csrf
<div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Informe seu nome</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="campo-nome" class="form-label">Nome</label>
              <input type="text" class="form-control" name="nome" id="campo-nome" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
          


            <div class="col-sm-6">
            
              <label for="campo-sobrenome" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" name="sobrenome" id="campo-sobrenome" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              
                <input class="btn btn-primary" type="arquivo" name="arquivo" id="campo-arquivo"></input><br> 
                
            </div>
</form>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    Salvar</button>
            </div>
</form>        

@endsection