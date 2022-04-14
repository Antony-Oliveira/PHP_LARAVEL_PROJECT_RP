@extends('layouts.main')

@section('title', 'Informações')

@section('content')
<div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/itens/{{ $item->image }}" class="img-fluid" alt="{{ $item->item_nome }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $item->item_nome }}</h1>
        <h3>Preço: R${{ $item->item_valor}}</h3>
        <h3>Item do tipo: {{$item->type}}</h3>
        <form id ="saleForm" action="/item" method="POST">
            @csrf
            <input type="hidden" name="item_id" id="item_id" value="{{$item->id}}">
            <select id="server_id" name="server_id" class="form-select">
            <option disabled value ='' selected>Para qual servidor deseja comprar?</option>
            @foreach($servers as $server)
            <option id="server" value="{{$server->id}}"name="server">{{$server->server_nome}}</option>
            @endforeach
            </select>
            <input type="submit" class="btn btn-success"  style="margin-top: 10px"value="Finalizar compra">
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="/js/notify.min.js"></script>
        <script src="/js/script.js"></script>
        </ul>
      </div>
    </div>
  </div>


@endsection