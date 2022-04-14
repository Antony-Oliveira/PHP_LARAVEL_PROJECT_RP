<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Server;
use App\Models\User;

class RpController extends Controller
{
    public function index() {

        $user = auth()->user();
        if (isset($user->id) AND $user->id == 1 AND $user->current_team_id != 1) {
            $user->current_team_id = 1;
            $user->save();
        }else{
        
        $items = Item::all();        
        return view('welcome',['items' => $items, 'user' => $user]);
        }
    }
    
    public function addItem(Request $request){
    
        $user = auth()->user();
        if ($user->current_team_id != 1) {
            return redirect('/')->with('msg', 'Rota não acessivel');
        }else {
        
        $item = new Item();
        
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/itens'), $imageName);

            $item->image = $imageName;

        }

        $item->item_nome = $request->item_nome;
        $item->item_valor = $request->item_valor;
        $item->type = $request->type;
        $item->save();

        return redirect('/admin')->with('msg', 'Item adicionado com sucesso!');
}

    }
    public function itemShow($id){
        
        $server = Server::all();
        $item = Item::findOrFail($id);
        return view('item.show', ['item' => $item, 'servers' => $server]);
    }

    public function sale(Request $request){
        
        $user = auth()->user();
        
        $server = new Sale();
        $item = Item::findOrFail($request->item_id);
        $server = Server::findOrFail($request->server_id);

        $sale = new Sale();
        $sale->item_id = $request->item_id;
        $sale->user_id = $user->id;
        $sale->server_id = $request->server_id;
        $sale->server_nome = $server->server_nome;
        $sale->user_nome = $user->name;
        $sale->item_nome = $item->item_nome;
        $sale->item_valor = $item->item_valor;
        $sale->was_approved = "Pendente";
        $sale->save();
        return redirect('/')->with("msg", "Compra efetuada com sucesso! Aguarde a aprovação de um administrador.");
        //
    }

    public function dashboard(){
        $user = auth()->user();
        $sale = Sale::where([
            ['user_id', '=', $user->id]
        ])->get();
        return view('dashboard', ['sales' => $sale]);
    }

    public function adminInfo(){
        $user = auth()->user();
        if($user->current_team_id != 1){
            return redirect('/')->with('msg', 'Rota não acessivel.');
        }else{
            $users = User::all();
            $items = Item::all();
            $sales = Sale::all();

            return view('admin.adminDashboard', ['users' => $users, 'items' => $items, 'sales' => $sales]);
        }
    }

    public function add(){
        $user = auth()->user();
        if ($user->current_team_id != 1){
            return redirect('/')->with('msg', 'Rota não acessivel');
        }else{
        return view('admin.add');
        }
    }

    public function approve($id){
        $user = auth()->user();
        if ($user->current_team_id != 1){
            return redirect('/')->with('msg', 'Rota não acessivel');
        }else{
            $sale = Sale::findOrFail($id);
            $sale->was_approved = "Aprovada";
            $sale->save();
            return redirect('/admin')->with('msg', 'A venda foi confirmada!');
        }
    }
}
