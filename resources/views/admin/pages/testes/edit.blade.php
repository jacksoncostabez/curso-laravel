@extends('admin.layouts.app')

@section('content')
    <h1>Editar Produto {{ $id }}</h1>

    <form action="{{ route('teste.update', $id) }}" method="post">
        @method('PUT') {{-- o method só recebe GET/POST! Para alteração é preciso enviar o PUT --}}
        @csrf {{-- Cria um campo com token para validar a requisição e evitar ataque --}}
        <input type="text" name="name" placeholder="Nome: ">
        <input type="text" name="description" placeholder="Descrição: ">
        <button type="submit">Editar</button>
    </form>
@endsection
