@extends('admin.layouts.app')

@section('content')
    <h1>Cadastrar Novo Produto</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {{-- enctype="multipart/form-data" >> Permite fazer upload de arquivos --}}
    <form action="{{ route('teste.store') }}" method="post" enctype="multipart/form-data">
        @csrf {{-- Cria um campo com token para validar a requisição e evitar ataque --}}
        <input type="text" name="name" placeholder="Nome: " value="{{ old('name') }}">
        <input type="text" name="description" placeholder="Descrição: " value="{{ old('description') }}">
        <input type="file" name="photo">
        <br><br>
        <button type="submit">Cadastrar</button>
    </form>

    {{-- value="{{ old('name') }} => Esse método deixa os campos preenchidos após um erro ao preencher o form --}}

@endsection
