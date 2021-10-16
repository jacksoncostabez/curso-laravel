@extends('admin.layouts.app') {{--importando o template padrão, teste.blade.php --}}

@section('title', 'Página Inicial')

@section('content')
    <h1>Exibindo os produtos</h1>

    <a href="{{route('teste.create')}}">Cadastrar</a>

    <hr>

    @component('admin.components.card')
        @slot('title')
            <h2>Titulo Card</h2>
        @endslot
        Um card de exemplo.
    @endcomponent

    <hr>

    @include('admin.includes.alerts', ['content' => 'Alerta de preços de produtos'])

    <hr>

    @if (isset($produtosTeste))
        @foreach ($produtosTeste as $produto)
            <p class="@if($loop->last) last @endif">{{$produto}}</p>
        @endforeach
    @endif

    <hr>

    @forelse ($produtosTeste as $produto)
        <p class="@if($loop->first) last @endif">{{$produto}}</p>
    @empty
        <p>Lista vazia!</p>
    @endforelse

    <hr>

    @if ($teste === '123')
        <p>É igual '123'</p>
    @elseif($teste == 123)
        <p>É igual a 123</p>
    @else
        <p>É diferente!</p>
    @endif

    {{-- Retorna false --}}
    @unless ($teste === '123')
        <p>Primeira condition</p>
    @else
        <p>Segunda condittion.</p>
    @endunless

    @isset($teste2)
        <p>Existe! {{$teste2}}</p>
    @endisset

    @empty($teste3)
        <p>Vazia!</p>
    @endempty

    @auth
        <p>Autenticado</p>
    @else
        <p>Não autenticado</p>
    @endauth

    @guest
        <p>Não autenticado</p>
    @endguest

    @switch($teste)
        @case(1)
            <p>Igual 1</p>
            @break
        @case(2)
            <p>Igual 2</p>
        @break
        @case(3)
            <p>Igual 3</p>
        @break
        @case(123)
            <p>Igual 123</p>
        @break
        @default
        <p>default</p>
    @endswitch

@endsection

@push('styles')
    <style>
        .last{background-color: #ccc;}
    </style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef';
    </script>
@endpush