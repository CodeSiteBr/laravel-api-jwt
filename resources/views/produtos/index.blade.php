@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div align="right" class="form-group">
        <a href="{{ route('produtos.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a>
    </div>

    <table class="table table-bordered table-striped">
        <tr>
            <th width=10%>Código</th>
            <th width=30%>Produto</th>
            <th width=30%>Descriçao</th>
            <th width=30%>Ação</th>
        </tr>
        @forelse ($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->titulo }}</td>
                <td>{{ $row->descricao }}</td>
                <td>
                    <a href="{{ route('produtos.show', $row->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Exibir</a>
                    <a href="{{ route('produtos.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pen"></i> Editar</a>
                    <form id="delete-form-{{ $row->id }}" action="{{ route('produtos.destroy', $row->id) }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>

                    <a class="btn btn-sm btn-danger"
                    onclick="
                    if(confirm('Você tem certeza?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $row->id }}').submit();
                    } else {
                        event.preventDefault();
                    }">
                        <i class="fa fa-trash"></i> Deletar
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    Não há produtos cadastrado
                </td>
            </tr>
        @endforelse
    </table>
    <div class="row justify-content-center">
        {!! $data->links() !!}
    </div>
</div>
@endsection
