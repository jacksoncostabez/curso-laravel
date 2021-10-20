@include('admin.includes.alerts')
@csrf {{-- Cria um campo com token para validar a requisição e evitar ataque --}}
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Nome: " value="{{ $product->name ?? old('name') }}">
</div>
<br>
<div class="form-group">
    <input type="text" class="form-control" name="preco" placeholder="Preço: " value="{{ $product->preco ?? old('preco') }}">
</div>
<br>
<div class="form-group">
    <input type="text" class="form-control" name="description" placeholder="Descrição: " value="{{ $product->description ?? old('description') }}">
</div>
<br>
<div class="form-group">
    <input type="file" name="image" class="form-control">
</div>

<br><br>
<button type="submit" class="btn btn-success">Enviar</button>

{{-- value="{{ old('name') }} => Esse método deixa os campos preenchidos após um erro ao preencher o form --}}