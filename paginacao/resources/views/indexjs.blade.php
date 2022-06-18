<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Paginação</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">        
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="card text-center">
                <div class="card-header">Tabela de Cliente</div>
                <div class="card-body">
                    <div class="card-title" id="cardTitle"></div>
                    <table class="table table-hoover" id="Table_Clientes">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">E-Mail</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <nav id="paginator">
                        <ul class="pagination"></ul>
                    </nav>
                </div>
            </div>
        </div>        
        <script type="text/javascript">

            // cria uma nova linha na tabela
            function addRow_Clientes(p_Cliente) {
                $("#Table_Clientes>tbody").append (
                    '<tr>'+
                    '<td>'+ p_Cliente.id +'</td>'+
                    '<td>'+ p_Cliente.nome +'</td>'+
                    '<td>'+ p_Cliente.sobrenome +'</td>'+
                    '<td>'+ p_Cliente.email +'</td>'+
                    '</tr>'
                );
            }

            function getRows_Clientes(p_jsonData) {
                for(i = 0; i < p_jsonData.length; i++)
                {
                    // rotina responsávavel por incluir uma linha
                    addRow_Clientes(p_jsonData[i]);
                }
            }

            // cria uma nova linha na tabela
            function addItem_Pagination(p_ItemPagina,index) {

                let strRetorno = '<li class="page-item">';

                if ( p_ItemPagina.current_page == index ) {
                    strRetorno = '<li class="page-item active" aria-current="page">';
                }

                return strRetorno + '<a class="page-link" pagina="' + index + '" href="#">' + index + '</a></li>';
            }

            // cria uma nova linha na tabela
            function addAnterior_Pagination(p_ItemPagina) {

                let strRetorno = '';

                if ( p_ItemPagina.current_page == 1 ) {
                    strRetorno += '<li class="page-item" disabled="disabled">';
                }
                else {
                    strRetorno += '<li class="page-item">';
                }

                strRetorno += '<a class="page-link" pagina="'+(p_ItemPagina.current_page-1)+'" href="#">Anterior</a></li>';

                return strRetorno;

            }

            // cria uma nova linha na tabela
            function addProximo_Pagination(p_ItemPagina) {

                let strRetorno = '';

                if ( p_ItemPagina.current_page == p_ItemPagina.last_page ) {
                    strRetorno += '<li class="page-item" disabled="disabled">';
                }
                else {
                    strRetorno += '<li class="page-item">';
                }

                if (  p_ItemPagina.current_page < p_ItemPagina.last_page )
                    strRetorno += '<a class="page-link" pagina="'+(p_ItemPagina.current_page+1)+'" href="#">Próximo</a></li>'
                else
                strRetorno += '<a class="page-link" pagina="0" href="#">Próximo</a></li>';

                return strRetorno;

            }

            function getComponentPaginaton(p_jsonData) {

                let paginaINI = 1; // pagina inicial
                let paginaMAX = p_jsonData.last_page; // quantidade de paginas
                let paginaFIN = paginaMAX; // pagina final
                let maxItems = 10; // quantidade de items
                let medItems = 5;  // metade do maximo de itens

                if ( paginaMAX > maxItems ) {

                    if ( p_jsonData.current_page > medItems  ) {

                        paginaINI = p_jsonData.current_page-medItems;
                        paginaFIN = p_jsonData.current_page+medItems;

                        // limitar até o máximo de páginas
                        if ( paginaFIN > paginaMAX ) {

                            // ultima página // last_page
                            paginaFIN = paginaMAX;

                            // a pagina inicial sera a quantidade maxima de itens na tela + 1
                            paginaINI = paginaFIN-maxItems+1;
                        }

                    }
                    else {
                        paginaFIN = maxItems;
                    }
                }

                // limpar lista
                $("#paginator>ul>li").remove();

                // botão anterior
                $("#paginator>ul").append(addAnterior_Pagination(p_jsonData));

                for ( i = paginaINI; i <= paginaFIN; i++ ) {
                    $("#paginator>ul").append (addItem_Pagination(p_jsonData, i));
                }

                // botão proximo
                $("#paginator>ul").append(addProximo_Pagination(p_jsonData));

                // barra de titulo
                $("#cardTitle").html('Exibindo ' + p_jsonData.per_page + ' Clientes de ' + p_jsonData.total + ' (' + p_jsonData.from + ' a ' + p_jsonData.to + ')');

            }

            // procedure: montar a tabela com os clientes cadastrados no banco
            function getData_Clientes(pagina) {

                // só faz a busca se a página for > 0
                if ( pagina != 0 ) {

                    // inicializar tabela
                    $("#Table_Clientes>tbody>tr").remove();
                    
                    // consulta AJAX
                    $.get('/indexJSON',{page: pagina}, function(jsonData) {

                        //console.log(p_jsonData);

                        // chamar a rotina que monta as linhas
                        getRows_Clientes(jsonData.data);

                        // rotina para montar o componente de paginação
                        getComponentPaginaton(jsonData);

                        // adicionar click ao componente Paginator
                        $("#paginator>ul>li>a").click(function() {                         
                            getData_Clientes( $(this).attr('pagina'))
                        });

                    });

                }
            }

            // função main()
            $(() => {
                getData_Clientes(1); //  arregar a primeira página

                /*                 
                Para funcionar estas rotinas foi necessário instalar o JQuery no projeto,
                no laravel por padrão ele não instala.
                Para instalar entre na página do projeto pelo console ou terminal e digite o seguinte comando:

                npm install jquery-ui --save-dev

                depois vá em : resource/js/app.js e incluir as seguintes linhas:

                import $ from 'jquery';
                window.$ = window.jQuery = $;

                após isso, salve o projeto e volte ao console, digite o seguinte comando:

                npm install && npm run dev

                quando finalizar de compilar incluir o app.js no projeto

                {{asset('js/app.js')}}

                projeto concluido

                 */

            });
        </script>
    </body>
</html>
