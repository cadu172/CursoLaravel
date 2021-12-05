@extends('layouts.app',['current_navbar' => 'produto'])
@section('content')
<div class="card border">
    <div class="card-header">
        <h5 class="card-title">Relação de Produtos Cadastrados</h5>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Produto</th>
                    <th>Estoque</th>
                    <th>Preço</th>                    
                    <th>Categoria</th>
                    <th>-</th>
                </tr>                
            </thead>
            <tbody id="tbProdutos">
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary btn-sm" onClick="novoProduto()">Incluir Produto</a>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formProduto">
                <div class="modal-header">
                    <h5 class="modal-title">Inclusão de Novo Produto</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="nome" class="control-label">Nome do Produto</label>
                        <div class="input-group">
                            <input type="text"
                            class="form-control"
                            id="nome"
                            placeholder="Nome do Produto" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="estoque" class="control-label">Estoque</label>
                        <div class="input-group">
                            <input type="number"
                            class="form-control"
                            id="estoque"
                            placeholder="Estoque em Quantidade" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="preco" class="control-label">Preço</label>
                        <div class="input-group">
                            <input type="text"
                            class="form-control"
                            id="preco"
                            placeholder="Preço" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categoria_id" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select id="categoria_id" class="form-control">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="submit"
                        class="btn btn-primary">Salvar</button>
                    <button
                        type="cancel"
                        class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

    function novoProduto() {
        $("#nome").val("");
        $("#estoque").val("0");
        $("#preco").val("0.00");
        $("#dlgProdutos").modal("show");
    }

    function carregarCategoria() {
        var strOption;
        $.getJSON('/api/categorias', function(data) {
            for(var i=0; i<data.length; i++) {
                strOption = '<option value="'+data[i].id+'">'+data[i].nome+'</option>';
                $("#categoria_id").append(strOption);    
            }
        });
    }

    function gravarProduto() {
        
        var prod;

        // informações do formulário
        prod = {
            nome: $("#nome").val(),
            estoque: $("#estoque").val(),
            preco: $("#preco").val(),
            categoria_id: $("#categoria_id").val()           
        };

        // executar post para API
        $.post('/api/produtos', prod, function(data) { 
            
            // obter o retorno do produto gravado na API
            var produto = JSON.parse(data);           
            
            // incluir linha na tabela
            $("#tbProdutos").append(addTableRow(produto));
            
            // confirmação de gravação
            console.log("Gravado com sucesso");
            
            // imprimir log
            console.log(data);
        
        });

    }

    function gravarUpdateProduto() {

        produto = {
            id: $("#id").val(),
            nome: $("#nome").val(),
            estoque: $("#estoque").val(),
            preco: $("#preco").val(),
            categoria_id: $("#categoria_id").val()
        }

        $.ajax({
            type: 'PUT',
            url: '/api/produtos/' + produto.id,
            context: this,
            data: produto,
            success: function(data) {
                
                // tem que ser convertido porque não faz parte do mesmo contexto da função anonima
                produto = JSON.parse(data);
                
                objeto = $("#tbProdutos>tr").filter( 
                    function(index, elemento) { 
                        return elemento.cells[0].textContent==produto.id; 
                        } );
                
                if (objeto) {
                    objeto[0].cells[1].textContent = produto.nome;
                    objeto[0].cells[2].textContent = produto.estoque;
                    objeto[0].cells[3].textContent = produto.preco;
                    objeto[0].cells[4].textContent = produto.categoria_id;
                }              
                console.log("Alterado com sucesso");
            },
            error: function(errorData) {
                console.log("Erro ao alterar produto " + errorData);
            },
        });                
    }
    

    function carregaListaProduto() {
        
        $.getJSON('/api/produtos', function(data) {

            for(var i=0; i<data.length; i++) {
                $("#tbProdutos").append(addTableRow(data[i]));
            }

        });
    }

    function addTableRow(data) {
        var strLinha;
        // montar a linha com os dados
        strLinha = '<tr>' +
            '<td>' + data.id + '</td>' +  
            '<td>' + data.nome + '</td>' +  
            '<td>' + data.estoque + '</td>' +  
            '<td>' + data.preco + '</td>' +  
            '<td>' + data.categoria_id + '</td>' +  
            '<td>'+
                '<button type="button" class="btn btn-sm btn-primary" onclick="editarProduto('+ data.id +')">Editar</button> '+
                '<button type="button" class="btn btn-sm btn-danger" onclick="deleteProduto('+ data.id +')">Excluir</button> '+
            '</td>'+
            '</tr>';
        // acrescentar linha na tabela
        return(strLinha);
    }

    function deleteProduto(id) {
        
        $.ajax({
            type: 'DELETE',
            url: '/api/produtos/' + id,
            context: this,
            success: function() {                
                objeto = $("#tbProdutos>tr").filter( 
                    function(index, elemento) { 
                        return elemento.cells[0].textContent==id; 
                        } );
                
                if (objeto) {
                    objeto.remove();                
                }
                console.log("Excluido com sucesso");
            },
            error: function(errorData) {
                console.log("Erro ao excluir produto " + errorData);
            },
        });

    }

    function editarProduto(id) {
        $.getJSON('/api/produtos/' + id, function(data) {
            $("#id").val(data.id);
            $("#nome").val(data.nome);
            $("#estoque").val(data.estoque);
            $("#preco").val(data.preco);
            $("#categoria_id").val(data.categoria_id);
            $("#dlgProdutos").modal("show");
            console.log(data);
        });        
    }

    // main function
    $(function() { 
        
        // incluir o token csrf
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        // não permitir o submit do formulário
        $("#formProduto").submit(function(event){
            event.preventDefault(); // não permitir o submit do formulário

            if ( $("#id").val()=='' )
            {
                // gravar os dados
                gravarProduto();
            }
            else {
                gravarUpdateProduto();
            }            

            // ocultar formulário
            $("#dlgProdutos").modal("hide");
        });
        
        // executa a API que obtem a relação de categorias
        carregarCategoria();
        
        // carrega a tabela com a lista de produtos cadastrados
        carregaListaProduto()
    });

</script>
@endsection
