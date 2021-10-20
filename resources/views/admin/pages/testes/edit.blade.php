@extends('admin.layouts.app')

@section('title', "Editar Produto {{ $product->name }}")

@section('content')
    <h1>Editar Produto {{ $product->name }} <a href="{{ route('teste.index') }}"><<</a></h1>
    <hr>
    <form action="{{ route('teste.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT') {{-- o method só recebe GET/POST! Para alteração é preciso enviar o PUT --}}
        @include('admin.pages.testes._partials.form')
    </form>
@endsection
