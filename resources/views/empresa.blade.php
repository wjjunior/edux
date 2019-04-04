<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Avaliação EDUXE') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="container mt-5">
            <h2>Empresas</h2>
            <div class="row">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <tabela-lista v-bind:titulos="['ID', 'Nome', 'CNPJ']" v-bind:itens="{{json_encode($empresas)}}" ordem="desc" ordemcol="0"
                criar="#criar" editar="/empresa/" detalhe="/empresa/" deletar="/empresa/" token="{{ csrf_token() }}" modal="sim"></tabela-lista>
        </div>
        <modal nome="adicionar" titulo="Adicionar">
            <form id="formAdicionar" action="{{route('empresa.store')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" required class="form-control cnpj" id="cnpj" name="cnpj" placeholder="CNPJ" value="{{old('cnpj')}}">
                    </div>
                    <div class="form-group col-md-7">
                        <label for="razao_social">Razão Social</label>
                        <input type="text" required class="form-control" id="razao_social" name="razao_social" placeholder="Razão Social" value="{{old('razao_social')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nome">Nome Fantasia</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Fantasia" value="{{old('nome')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="cep">CEP</label>
                        <input type="text" required class="form-control cep" name="cep" id="cep" placeholder="CEP" value="{{old('cep')}}">
                    </div>
                    <div class="form-group col-md-9">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" required class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" value="{{old('logradouro')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="numero">Número</label>
                        <input type="text" required class="form-control" name="numero" id="numero" placeholder="Número" value="{{old('numero')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" required class="form-control telefone" name="telefone" id="telefone" placeholder="Telefone" value="{{old('telefone')}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">E-mail</label>
                        <input type="email" required class="form-control" name="email" id="email" placeholder="E-mail" value="{{old('email')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="Complemento">Complemento</label>
                        <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{old('complemento')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bairro">Bairro</label>
                        <input type="text" required class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="{{old('bairro')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Cidade</label>
                        <input type="text" required class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="{{old('cidade')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="estado">Estado</label>
                        <select required name="estado" id="estado" class="form-control">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefone">Segmento</label>
                        <select required name="segmento" id="segmento" class="form-control">
                            <option value="0">Produto</option>
                            <option value="1">Serviço</option>
                            <option value="2">Produto e Serviço</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inscricao_municipal">Insc. Municipal</label>
                        <input required type="text" class="form-control" name="inscricao_municipal" id="inscricao_municipal" placeholder="Inscrição Municipal"
                            value="{{old('inscricao_municipal')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inscricao_estadual">Insc. Estadual</label>
                        <input type="text" class="form-control" name="inscricao_estadual" id="inscricao_estadual" placeholder="Inscrição Estadual"
                            value="{{old('inscricao_estadual')}}">
                    </div>
                </div>

            </form>
            <span slot="botoes">
                <button form="formAdicionar" class="btn btn-info">Adicionar</button>
            </span>
        </modal>
        <modal nome="editar" titulo="Editar">
            <form id="formEditar" :action="'/empresa/' + $store.state.item.id" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" required v-model="$store.state.item.cnpj" class="form-control cnpj" id="cnpj" name="cnpj" placeholder="CNPJ"
                            value="{{old('cnpj')}}">
                    </div>
                    <div class="form-group col-md-7">
                        <label for="razao_social">Razão Social</label>
                        <input type="text" required v-model="$store.state.item.razao_social" class="form-control" id="razao_social" name="razao_social"
                            placeholder="Razão Social" value="{{old('razao_social')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nome">Nome Fantasia</label>
                        <input type="text" class="form-control" v-model="$store.state.item.nome" id="nome" name="nome" placeholder="Nome Fantasia"
                            value="{{old('nome')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="cep">CEP</label>
                        <input type="text" required class="form-control cep" v-model="$store.state.item.cep" name="cep" id="cep" placeholder="CEP"
                            value="{{old('cep')}}">
                    </div>
                    <div class="form-group col-md-9">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" required class="form-control" name="logradouro" v-model="$store.state.item.logradouro" id="logradouro"
                            placeholder="Logradouro" value="{{old('logradouro')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="numero">Número</label>
                        <input type="text" required class="form-control" name="numero" v-model="$store.state.item.numero" id="numero" placeholder="Número"
                            value="{{old('numero')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" required class="form-control telefone" v-model="$store.state.item.telefone" name="telefone" id="telefone"
                            placeholder="Telefone" value="{{old('telefone')}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">E-mail</label>
                        <input type="email" required class="form-control" name="email" v-model="$store.state.item.email" id="email" placeholder="E-mail"
                            value="{{old('email')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="Complemento">Complemento</label>
                        <input type="text" class="form-control" name="complemento" v-model="$store.state.item.complemento" id="complemento" placeholder="Complemento"
                            value="{{old('complemento')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bairro">Bairro</label>
                        <input type="text" required class="form-control" name="bairro" v-model="$store.state.item.bairro" id="bairro" placeholder="Bairro"
                            value="{{old('bairro')}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Cidade</label>
                        <input type="text" required class="form-control" name="cidade" v-model="$store.state.item.cidade" id="cidade" placeholder="Cidade"
                            value="{{old('cidade')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="estado">Estado</label>
                        <select required name="estado" id="estado" class="form-control" v-model="$store.state.item.estado">
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefone">Segmento</label>
                        <select required name="segmento" id="segmento" class="form-control" v-model="$store.state.item.segmento">
                                <option value="0">Produto</option>
                                <option value="1">Serviço</option>
                                <option value="2">Produto e Serviço</option>
                            </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inscricao_municipal">Insc. Municipal</label>
                        <input required type="text" class="form-control" v-model="$store.state.item.inscricao_municipal" name="inscricao_municipal"
                            id="inscricao_municipal" placeholder="Inscrição Municipal" value="{{old('inscricao_municipal')}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inscricao_estadual">Insc. Estadual</label>
                        <input type="text" class="form-control" name="inscricao_estadual" v-model="$store.state.item.inscricao_estadual" id="inscricao_estadual"
                            placeholder="Inscrição Estadual" value="{{old('inscricao_estadual')}}">
                    </div>
                </div>
            </form>
            <span slot="botoes">
                  <button form="formEditar" class="btn btn-info">Atualizar</button>
            </span>
        </modal>
        <modal nome="detalhe" v-bind:titulo="$store.state.item.razao_social">
            <p>@{{$store.state.item.id}}</p>
            <p>@{{$store.state.item.cnpj}}</p>
        </modal>
    </div>
    <script>
        $( document ).ready(function($) {
            $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
            $( "input[name='cnpj']" ).blur(function() {
                let cnpj = $(this).val().replace(/\D+/g, '');
                if (cnpj.length < 14) {
                    alert('CNPJ inválido');
                    return;
                }
                $.get( "buscar/cnpj/"+cnpj, function( data ) {
                    obj = $.parseJSON(data);

                    if(obj.status == 'ERROR') {
                        alert('CNPJ inválido');
                        $( "input[name='cnpj']" ).val('');
                        return;
                    }
                    $( "input[name='razao_social']" ).val(obj.nome);
                    $( "input[name='telefone']" ).val((obj.telefone.replace(/\D+/g, '')));
                    $( "input[name='email']" ).val(obj.email);
                    $( "input[name='bairro']" ).val(obj.bairro);
                    $( "input[name='logradouro']" ).val(obj.logradouro);
                    $( "input[name='numero']" ).val(obj.numero);
                    $( "input[name='cep']" ).val((obj.cep.replace(/\D+/g, '')));
                    $( "input[name='cidade']" ).val(obj.municipio);
                    $( "select[name='estado']" ).val(obj.uf);
                });    
            });
            $( "input[name='cep']" ).blur(function() { 
                let cep = $(this).val().replace(/\D+/g, '');
                if (cep.length < 8) {
                    alert('CEP inválido');
                    return;
                }
                $.get( "buscar/cep/"+cep, function( data ) {
                    obj = $.parseJSON(data);

                    if(obj.status == 'ERROR') {
                        alert('CEP inválido');
                        $( "input[name='cep']" ).val('');
                        return;
                    }
                    $( "input[name='bairro']" ).val(obj.bairro);
                    $( "input[name='logradouro']" ).val(obj.logradouro);
                    $( "input[name='cidade']" ).val(obj.localidade);
                    $( "input[name='complemento']" ).val(obj.complemento);
                    $( "select[name='estado']" ).val(obj.uf);
                });   
            });
        });
    </script>
</body>

</html>