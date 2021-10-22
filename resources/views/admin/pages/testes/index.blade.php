@extends('admin.layouts.app') {{--importando o template padrão, teste.blade.php --}}

@section('title', 'Página Inicial')

@section('content')
    <h1>Exibindo os produtos</h1>

    <a href="{{ route('teste.create') }}" class="btn btn-success">Cadastrar</a>
    <hr>

    <form action="{{ route('teste.search') }}" method="post" class="form form-inline">
        @csrf
        <div class="form-group">
            <input type="text" name="filter" placeholder="Filtrar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Pesquisar</button>
        </div>
    </form>

    <hr>

    <table class="table table-striped ">
        <thead>
            <tr>
                <th width="100">Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th width="100">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $produto)
                <tr>
                    <td>@if ($produto->image)                        
                        <img src="{{ url("storage/$produto->image") }}" alt="{{ $produto->name }}" style="max-width: 100px;">
                    @endif
                </td>
                    <td>{{ $produto->name }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>
                        <a href="{{ route('teste.edit', $produto->id) }}">Editar</a>
                        <a href="{{ route('teste.show', $produto->id) }}">Detalhes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- appends($filters) -> É para deixar a paginação funcionando no search  --}}
    @if (isset($filters))
        {{ $products->appends($filters)->links() }}
    @else
        {{ $products->links() }}
    @endif

    {{-- {{ $products->links() }}  --}}
    {{-- Importante usar {!! para exibir conteudo html --}}

    {{--
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
    --}}

    {{-- Retorna false --}}
    {{-- 
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
    --}}

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