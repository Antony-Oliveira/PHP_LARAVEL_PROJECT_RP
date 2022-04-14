@extends('layouts.main')

@section('title', 'Criar item')

@section('content')

<div class="col-md-6 offset-md-3">
  <h1>Criação de itens</h1>
  <form id="addItemForm" action="/admin/add" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
    <div class="mb-3">
  <label for="image" class="form-label">Ilustração do item</label>
  <input class="form-control" type="file" id="image" name="image">
</div>

  <div class="col">
    <input type="text" class="form-control" placeholder="Nome do item" id="item_nome"name="item_nome" >
  </div>
  <div class="col">
    <input type="number" class="form-control" placeholder="Valor do item" id="item_valor" name="item_valor">
  </div>

  <div class="select">
      <select id="type" name="type" class="form-control">
      <option disabled selected>Selecione o tipo de item</option>
      <option value="Veículo de inventário">Veículo de inventário</option>
      <option value="Acessorio">Acessorio</option>
      <option value="Assinatura">Assinatura</option>
   </select>
  </div>

  <input type="submit" class="btn btn-primary" value="Adicionar item ao banco">
</div>
    
  </form>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="/js/notify.min.js"></script>

  <script src="/js/script.js"></script>

</div>

@endsection