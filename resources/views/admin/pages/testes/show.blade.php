@extends('admin.layouts.app') {{--importando o template padrão, teste.blade.php --}}

@section('title', "Detalhes do Produto {{ $product->name }}")

@section('content')
    <h1>Produto {{ $product->name }} <a href="{{ route('teste.index') }}"><<</a></h1>

    <ul>
        <li><strong>Nome: </strong>{{ $product->name }}</li>
        <li><strong>Preço: </strong>{{ $product->preco }}</li>
        <li><strong>Descrição: </strong>{{ $product->description }}</li>
    </ul>

    <form action=" {{route('teste.destroy', $product->id)}} " method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Deletar Produto: {{ $product->name }}</button>
    </form>

@endsection
