@extends('layout')

@section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
               <div class=pull-left>
                    <h2>Visualizar Dados</h2>
                    
                </div>        
                <div class=pull-right>
                    <a class="btn btn-primary"
                    href="{{ route('vaga.index') }}">Voltar</a>
                     
                    
                </div>
                
            </div>
        </div>
            


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
               <div class=form-group>
                    <strong>Nome:</strong>
                    {{ $vaga->nome }}
                </div>        
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
               <div class=form-group>
                    <strong>Sobrenome:</strong>
                    {{ $vaga->sobrenome }}
                </div>        
            </div>

           
        </div>    
        @endsection