@extends('admin.layouts.app')

@section('content')
    <h1>Cadastrar Novo Produto</h1>

    <form action="{{ route('teste.store') }}" method="post">
        @csrf {{-- Cria um campo com token para validar a requisição e evitar ataque --}}
        <input type="text" name="name" placeholder="Nome: ">
        <input type="text" name="description" placeholder="Descrição: ">
        <button type="submit">Cadastrar</button>
    </form>
@endsection
