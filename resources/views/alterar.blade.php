@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Painel de Controle</div>
                <form method="post" action="{{url('updateProfile')}}" enctype="multipart/form-data">
                  {!! csrf_field() !!} 
                  @if (session('msg'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! session('msg') !!}</li>
                            </ul>
                        </div>
                  @endif  
                  
                  @php
                            if(isset($errors) && count($errors) > 0){
                                    foreach($errors->all() as $linha){
                                    echo "<div class='alert alert-danger' role='alert'>".$linha."</div>";
                                }
                            }
                    @endphp 
                <div>
                    <img src='{{url("http://localhost/rundmc/storage/app/public/avatar/$alterar->image")}}' style="border-radius: 10%; width: 150px; margin-left: 20em; margin-top: 10px;">
                     <p style="text-align: center; font-weight: bold;">{{$alterar->nome}}</p>
                     <p style="text-align: center; font-size: 12px; margin-top: -15px;">{{$alterar->email}}</p>
                     <div class="input-group mb-3" style="font-size: 12px; color: black; padding: 5px; border-radius: 5px; margin-left: 30%;">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Avatar</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01" style="width: 20em;">Escolha uma foto</label>
                          </div>
                        </div>
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
                        <td><input type="text" name="cidade" class="form-control" value="{{$alterar->cidade}}"></td>
                        <td><input type="text" name="endereco" class="form-control" value="{{$alterar->endereco}}"></td>
                        <td><input type="text" name="estado_civil" class="form-control" value="{{$alterar->estado_civil}}"></td>
                        <td><input type="text" name="sexo" class="form-control" value="{{$alterar->sexo}}"></td>
                        <td><input type="text" name="escolaridade" class="form-control" value="{{$alterar->escolaridade}}"></td>
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
                        <td><input type="text" name="identidade" class="form-control" value="{{$alterar->identidade}}"></td>
                        <td><input type="text" name="cpf" class="form-control" value="{{$alterar->cpf}}"></td>
                        <td><input type="text" name="telefone" class="form-control" value="{{$alterar->telefone}}"></td>
                      </tr>
                    </tbody>
               </table>

               <div style="text-align: center;">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required="required">
                  <label class="form-check-label" for="defaultCheck1">
                    Confirmo as alterações
                  </label>
                </div>
                 <input type="hidden" name="id" value="{{$alterar->id}}">
                 <input type="submit" class="btn btn-outline-primary" value="Salvar">
               </form>
               </div>
             </div>

            </div>
        </div>
    </div>
</div>
@endsection
