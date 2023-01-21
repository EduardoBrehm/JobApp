@extends('layout')

@section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
               <div class=pull-left>
                    <h2>Editar Dados</h2>
                    
                </div>        
                <div class=pull-right>
                    <a class="btn btn-primary"
                    href="{{ route('vaga.index') }}">Voltar</a>
                     
                    
                </div>
                
            </div>
        </div>

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

        <form action="{{ route('vaga.update', $vaga->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
               <div class=form-group>
                    <label for="campo-nome"
                        class="form-label">Nome:</label>
                    <input type="text" id="campo-nome" name="nome"
                        class="form-control" placeholder="Nome"
                        value="{{ $vaga->nome }}">
                </div>        
            </div> 

            <div class="col-xs-12 col-sm-12 col-md-12">
               <div class=form-group>
                    <label for="campo-sobrenome"
                        class="form-label">Sobrenome:</label>
                    <input type="text" id="campo-sobrenome" name="sobrenome"
                        class="form-control" placeholder="Sobrenome"
                        value="{{ $vaga->sobrenome }}">
                </div>        
            </div> 

                 
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    Salvar</button>
                       
            </div>

        </form>

        @endsection