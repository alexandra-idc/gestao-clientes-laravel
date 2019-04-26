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

                 <div id="direito">
                    <p class="h2">Cadastrar Cliente</p>
                    
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

                    <form method="post" action="{{url('CadastroApply')}}" enctype="multipart/form-data">
                      {!! csrf_field() !!}      
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputAddress">Nome</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Nome do Cliente" name="nome">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputAddress">Telefone</label>
                            <input type="number" class="form-control" id="inputAddress" placeholder="Telefone" name="telefone">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">CPF</label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="CPF" name="cpf">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputAddress">Identidade</label>
                            <input type="number" class="form-control" id="inputAddress" placeholder="Número da Identidade" name="identidade">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputAddress">Endereço</label>
                          <input type="text" class="form-control" id="inputAddress" placeholder="Endereço" name="endereco">
                        </div>
                        <div class="form-group">
                          <label for="inputAddress">E-mail</label>
                          <input type="text" class="form-control" id="inputAddress" placeholder="email@email" name="email">
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputCity">Cidade</label>
                            <input type="text" class="form-control" id="inputCity" placeholder="Cidade" name="cidade">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="inputState">Estado Civil</label>
                            <select id="inputState" class="form-control" name="estado_civil">
                              <option selected>Escolher</option>
                              <option value="Solteiro">Solteiro(a)</option>
                              <option value="Casado">Casado(a)</option>
                              <option value="Divorciado">Divorciado(a)</option>
                              <option value="Viuvo">Viuvo(a)</option>
                            </select>
                          </div>
                          <div class="form-group col-md-2">
                            <label for="inputZip">Sexo</label>
                            <select id="inputState" class="form-control" name="sexo">
                              <option selected>Escolher</option>
                              <option value="Homem">Homem</option>
                              <option value="Mulher">Mulher</option>
                              <option value="Homem Trans">Homem trans</option>
                              <option value="Mulher Trans">Mulher trans</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="inputState">Escolaridade</label>
                            <select id="inputState" class="form-control" name="escolaridade">
                              <option selected>Escolher</option>
                              <option value="Ensino Fundamental incompleto">Ensino Fundamental incompleto</option>
                              <option value="Ensino Fundamental completo">Ensino Fundamental completo</option>
                              <option value="Ensino Médio incompleto">Ensino Médio incompleto</option>
                              <option value="Ensino Médio incompleto">Ensino Médio completo</option>
                              <option value="Ensino Superior incompleto">Ensino Superior incompleto</option>
                              <option value="Ensino Superior completo">Ensino Superior completo</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Avatar</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01" style="width: 20em;">Escolha uma foto</label>
                          </div>
                        </div>
                      </div>  
                        <button type="submit" class="btn btn-primary">Cadatrar</button>
                      </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
