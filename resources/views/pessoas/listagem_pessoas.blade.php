@extends('template.painel_pessoa')
@section('title', 'Listagem de Pessoa')
@section('content')
<div class="row mb-3">
    <div class="col-lg-2">
        <a href="{{route('pessoa.cadastro')}}" class="btn btn-primary">Cadastrar</a>
    </div>
</div>

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
                    <td>{{$pessoas->cidade}} - {{$pessoas->id}}</td>
                    <td>
                        <a href="{{route('pessoa.exibi_edicao',$pessoas->id)}}"><i class="bi bi-pencil-square fs-3" title="Editar Pessoa" style="margin-inline-end: 10%;"></i></a>
                        <a href=""><i class="bi bi-trash fs-3" title="Excluir Pessoa"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Default Table Example -->
    </div>
</div>
@endsection