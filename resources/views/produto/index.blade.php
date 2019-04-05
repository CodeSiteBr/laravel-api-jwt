@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $$message }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div align="right" class="form-group">
        <a href="{{ route('produtos.create') }}" class="btn btn-success">Add</a>
    </div>

    <table class="table table-bordered table-striped">
        <tr>
            <th width=10%>Código</th>
            <th width=30%>Produto</th>
            <th width=30%>Descriçao</th>
            <th width=30%>Ação</th>
        </tr>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->titulo }}</td>
                <td>{{ $row->descricao }}</td>
                <td>

                </td>
            </tr>
        @endforeach
    </table>

    {!! $data->links() !!}
</div>
@endsection
