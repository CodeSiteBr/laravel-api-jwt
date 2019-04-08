@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                        <div class="card-header">Cadastro de produtos</div>

                        <div class="card-body">
                            <form action="{{ route('produtos.update', $data->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <div class="form-group row">
                                    <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo</label>
                                    <div class="col-md-6">
                                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $data->titulo }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>
                                    <div class="col-md-6">
                                        <textarea name="descricao" id="descricao" rows="5" class="form-control">{{ $data->descricao }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <input type="submit" name="add" id="add" class="btn btn-success" value="Adicionar">

                                        <a href="{{ route('produtos.index') }}" class="btn btn-dark">Voltar</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                </div>
        </div>
    </div>
</div>
@endsection
