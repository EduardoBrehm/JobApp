@extends('layout')

@section('content')
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Status</th>
                
            </tr>
            @foreach ($listaVagas as $vaga)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $vaga->nome }}</td>
                    <td>{{ $vaga->sobrenome }}</td>
                    
                    <td>

                        <a
                            class="btn btn-info"
                            href="{{ route('vaga.show',$vaga->id) }}"

                        >
                            Visualizar
                        </a>

                        <a
                            class="btn btn-info"
                            href="{{ route('vaga.edit',$vaga->id) }}"

                        >
                            Editar
                        </a>

                        <form
                            action="{{ route('vaga.destroy' ,$vaga->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')
                        
                            <button
                            type="submit"
                            class="btn btn-danger">
                            Apagar
                            </button>
                        </form>
                    
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a
                class="btn btn-info"
                href="{{ route('vaga.create',$vaga->id) }}"

            >
                Cadastre-se
            </a>
        </div>                

        {!! $listaVagas->links() !!}
  
@endsection