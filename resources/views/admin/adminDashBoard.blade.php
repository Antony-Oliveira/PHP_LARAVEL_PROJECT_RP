@extends('layouts.main')

@section('title', 'Aba administrativa')

@section('content')

<div class="container">
<div class="row m-3">
<h3>Vendas</h3>
    <table class="table table-striped table-bordered">
        
        <thead class="table-dark">
            <th scope="col">ID da venda</th>
            <th scope="col">ID do comprador</th>
            <th scope="col">Comprador</th>
            <th scope="col">Data da venda</th>
            <th scope="col">Valor</th>
            <th scope="col">Status</th>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr> 
                <th scope="row">{{$sale->id}}</th>
                <td>{{$sale->user_id}}</td>
                <td>{{$sale->user_nome}}</td>
                <td>{{$sale->created_at}}</td>
                <td>{{$sale->item_valor}}</td>
                <td>@if($sale->was_approved == "Pendente")<form action="/admin/approve/{{$sale->id}}" method="POST"> @csrf <input type="submit" class="btn btn-primary" value="Confirmar"> </form> @else {{$sale->was_approved}} @endif</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
        <h3>Registros de contas</h3>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <th scope="col">ID da conta</th>
                <th scope="col">Nome da conta</th>
                <th scope="col">Email da conta</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Numero de usuarios: {{count($users)}}</h3>
    <br>

    <h3>Itens</h3>
    <table class="table table-striped table-bordered">
        
        <thead class="table-dark">
            <th scope="col">ID do item</th>
            <th scope="col">Nome do item</th>
            <th scope="col">Valor do item</th>
            <th scope="col">Tipo do item</th>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr> 
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->item_nome}}</td>
                <td>{{$item->item_valor}}</td>
                <td>{{$item->type}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    <a class="btn btn-outline-primary" href="/admin/addItem">Adicionar item</a>
    </div>
</div>
</div>
    

@endsection