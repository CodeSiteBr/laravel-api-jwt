@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                <div class="card-header">Produto - {{ $data->titulo }}</div>

                        <div class="card-body">
                            <form action="{{ route('produtos.store') }}" method="post">
                                @csrf

                                <div class="form-group row">
                                    <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo</label>
                                    <div class="col-md-6">
                                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $data->titulo }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>
                                    <div class="col-md-6">
                                        <textarea name="descricao" id="descricao" rows="5" class="form-control" readonly>{{ $data->descricao }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
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
