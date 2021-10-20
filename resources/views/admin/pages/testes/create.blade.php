@extends('admin.layouts.app')

@section('content')
    <h1>Cadastrar Novo Produto</h1>

    {{-- enctype="multipart/form-data" >> Permite fazer upload de arquivos --}}
    <form action="{{ route('teste.store') }}" method="post" enctype="multipart/form-data" class="form">
        @include('admin.pages.testes._partials.form')
    </form>

@endsection
