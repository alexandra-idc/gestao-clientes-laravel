@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Painel de Controle</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="esquerdo">
                    <p class="h2">Registros</p> <a href="{{url('Cadastro')}}"><button type="button" class="btn btn-primary" style="margin-bottom: 5px; float: left;"><i class="fa fa-plus" style="margin-right: 2px;"></i> Cadastrar</button></a>
                        @if(isset($enviar))
                          {{dd($enviar)}}
                        @endif

                    @if (Session::has('msg'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! Session::get('msg') !!}</li>
                        </ul>
                    </div>
                @endif
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Cliente</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Sobre</th>
                          <th scope="col">Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($lista_tudo as $lista)
                        <tr>
                       
                          <th scope="row">{{$lista->id}}</th>
                          <td><img src='{{url("http://localhost/rundmc/storage/app/public/avatar/$lista->image")}}' style="border-radius: 50%; width: 24px;"></td>
                          <td>{{$lista->nome}}</td>
                          <td><a href='{{url("Detalhes/{$lista->id}")}}'>Ver detalhes</a></td>
                          <td><a href='{{url("Alterar/{$lista->id}")}}'><i class="fa fa-edit" style="font-size: 22px; color: white; background-color: orange; padding: 2px; margin-right: 10px;"></i></a>
                          <a href='{{url("Deletar/{$lista->id}")}}'><i class="fa fa-trash" style="font-size: 22px; color: white; background-color: red; padding: 2px;"></i></a></td>
                        
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                    {!! $lista_tudo->links() !!}
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
