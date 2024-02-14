@extends('template.painel_pessoa')
@section('title', 'Listagem de Pessoa')
@section('content')
<div class="row mb-3">
    <div class="col-lg-2">
        <a href="{{route('pessoa.cadastro')}}" class="btn btn-primary">Cadastrar</a>
    </div>
</div>

<?php
$recebe_codigo = "";
?>

@if(!empty($codigo_recebido))
<h4>{{$codigo_recebido}}</h4>
@else
echo "nada"
@endif

<script src="{{URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Pessoas</h5>

        <!-- Default Table -->
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Cidade</th>
                    <th scope="col" colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $pessoas)
                <tr>
                    <td>{{$pessoas->nome}}</td>
                    <td>{{$pessoas->idade}}</td>
                    <td>{{$pessoas->cidade}} - {{$pessoas->id}} - $recebe_codigo</td>
                    <td>
                        <a href="{{route('pessoa.exibi_edicao',$pessoas->id)}}"><i class="bi bi-pencil-square fs-3" title="Editar Pessoa" style="margin-inline-end: 10%;"></i></a>
                        <a href="{{route('pessoa.deletar',$pessoas->id)}}"><i class="bi bi-trash fs-3" title="Excluir Pessoa"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Default Table Example -->
    </div>
</div>



@if(!empty($codigo_recebido))

<div class="modal fade" id="deletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja realmente excluir esse registro?

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                
                <form method="POST" action="{{route('pessoas.excluir',$codigo_recebido)}}">
                
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(e) {
        $("#deletar").modal("show");
    });
</script>
@endif