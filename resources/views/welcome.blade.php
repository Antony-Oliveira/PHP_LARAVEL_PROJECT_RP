@extends('layouts.main')

@section('title', 'Tela inicial')

@section('content')

<div id="items-container" class="col-md-12">
    <div id="cards-container" class="row">
        @foreach($items as $item)
        <div class="card col-md-3">
            <img src="/img/itens/{{ $item->image }}" class="img-fluid" alt="{{$item->item_nome}}">
            <div class="card-body">
                <p class="card-price">R${{$item->item_valor}}</p>
                <h5 class="card-title">{{$item->item_nome}}</h5>
                <p class="card-type">{{$item->type}}</p>
                <a href="/item/{{$item->id}}" class="btn btn-primary">Comprar</a>
            </div>
            
        </div>
        @endforeach
    </div>
    
</div>

@if(isset($user))
@if($user->current_team_id == 1)
<a href="/admin">Aba administrativa</a>
@endif
@endif
@endsection