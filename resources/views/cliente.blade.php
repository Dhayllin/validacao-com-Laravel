@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">           
            <div class="card-header">Validação com Laravel</div>
                <div class="painel-body"> 
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error}} </li>
                                @endforeach 
                            </ul>
                        </div>                       
                    @endif
                    <form id="meuForm" class="form-horizontal" onsubmit="return validaForm()" action="{{ route('clientes.store') }}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <div  class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nome" value="{{old('nome')}}">
                                @if($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome')}}</strong>
                                    </span>
                                    <span id="erro_nome"  class="help-block"></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">E-mail</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email')}}</strong>
                                    </span>
                                @endif
                                <span id="erro_email"  class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('imagem') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">Imagem</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="imagem">
                                @if($errors->has('imagem'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imagem')}}</strong>
                                    </span>
                                @endif
                                <span id="erro_imagem"  class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                            <label class="col-md-4 control-label">Número</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="numero" value="{{old('numero')}}">
                                @if($errors->has('numero'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numero')}}</strong>
                                    </span>
                                    <span id="erro_numero"  class="help-block"></span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                             <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-info">Salvar</button>
                             </div>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.js"></script>
<script type="text/javascript">

    function validaForm(){
        $.ajax({
            type:'POST',
            url:'/clientes',
            data:$('#meuForm').serialize(),
            success: function(res){
                console.log(res);
            },    
            error:function(erro){
                console.log(erro.responseJSON);
                var data = erro.responseJSON;
                $.each(data, function(index,value){
                    $('#erro_'+index).html('<strong>'+value[0]+'</strong>');
                })
            }    
        });
        return false;
    }
</script>
@endsection