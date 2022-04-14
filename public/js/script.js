if (document.title == "Criar item") {
    let form = document.getElementById("addItemForm");
    form.onsubmit = function(e) {
        e.preventDefault();
        if (document.getElementById("image").value != '' && document.getElementById("item_valor").value.length == 2 && document.getElementById("item_nome").value != "") {
            form.submit();            form.submit();
        }

    //elses

    if (document.getElementById("image").value == '') {
        $("#image").notify("O campo imagem não pode estar vazio!" , {position: "right"});
    }
    if (document.getElementById("item_valor").value == '' || document.getElementById("item_valor").value.length < 1) {
        $("#item_valor").notify("Digite o valor corretamente", {position: "right"});
    }
    if (document.getElementById("item_nome").value == '') {
        $("#item_nome").notify("O campo nome não pode estar vazío!", {position: "left"});
    }
    }
}

if(document.title == "Informações"){
    let form = document.getElementById("saleForm");
    
    form.onsubmit = function(e){
        e.preventDefault();
        if (document.getElementById("server_id").value == '') {
            $("#server_id").notify("Escolha uma opção válida.", {position: "right"});
        }else{
            form.submit();
        }
    }
}