@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Painel de Controle</div>
                <div>
                    <img src='{{url("http://localhost/rundmc/storage/app/public/avatar/$user->image")}}' style="border-radius: 10%; width: 150px; margin-left: 20em; margin-top: 10px;">
                     <p style="text-align: center; font-weight: bold;">{{$user->nome}}</p>
                     <p style="text-align: center; font-size: 12px; margin-top: -15px;">{{$user->email}}</p>
                  </div>
                <table class="table table-hover" style="text-align: center;">
                    <thead>
                      <tr>
                        <th scope="col">Cidade</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Estado Civil</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Escolaridade</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$user->cidade}}</td>
                        <td>{{$user->endereco}}</td>
                        <td>{{$user->estado_civil}}</td>
                        <td>{{$user->sexo}}</td>
                        <td>{{$user->escolaridade}}</td>
                      </tr>
                    </tbody>
                    </table>
                    <table class="table table-hover" style="text-align: center;">
                    <thead>
                      <tr>
                        <th scope="col">Identidade</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$user->identidade}}</td>
                        <td>{{$user->cpf}}</td>
                        <td>{{$user->telefone}}</td>
                      </tr>
                    </tbody>
               </table>
            </div>
        </div>
    </div>
</div>
@endsection
