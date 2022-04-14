@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

@if(count($sales) == 0)
<p>Você ainda não solicitou compras! Veja a <a href="/">Lista de itens</a> </p>
@else

<div name="userDashboard">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Item comprado</th>
      <th scope="col">Valor da compra</th>
      <th scope="col">Data</th>
      <th scope="col">Servidor</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
     @foreach($sales as $sale)
    <tr>
      <td scope="row">{{$sale->item_nome}}</td>
      <td>{{$sale->item_valor}}</td>
      <td>{{$sale->created_at}}</td>
      <td>{{$sale->server_nome}}</td>
      <td>{{$sale->was_approved}}</td>
      
    </tr>
    @endforeach
    @endif
  </tbody>
</table>
</div>
@endsection