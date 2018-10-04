@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">           
            <div class="card-header">Validação com Laravel</div>
                <div class="painel-body"> 
                    <form action="{{ route('clientes.store')}}" method="post">
                        {{ csrf_field() }}
                        <input type="text" name="nome">
                        <button type="submit" class="btn btn-info">Salvar </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection