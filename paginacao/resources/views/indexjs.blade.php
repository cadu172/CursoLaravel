<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Paginação</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="card text-center">
                <div class="card-header">Tabela de Cliente</div>
                <div class="card-body">
                    <div class="card-title">
                        Exibindo 10 clientes de 10000 (10 a 10000)
                    </div>
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
                    <nav id="pagination">
                        <ul class="pagination">
                          <!--li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li-->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
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

                return strRetorno + '<a class="page-link" href="#">' + index + '</a></li>';
            }

            // cria uma nova linha na tabela
            function addAnterior_Pagination(p_ItemPagina) {

                let strRetorno = '';

                if ( p_ItemPagina.current_page == 1 ) {
                    strRetorno += '<li class="page-item" disabled>';
                }
                else {
                    strRetorno += '<li class="page-item">';
                }

                return strRetorno += '<a class="page-link" href="#">Anterior</a></li>';

            }

            // cria uma nova linha na tabela
            function addProximo_Pagination(p_ItemPagina) {

                let strRetorno = '';

                if ( p_ItemPagina.current_page == p_ItemPagina.last_page ) {
                    strRetorno += '<li class="page-item" disabled>';
                }
                else {
                    strRetorno += '<li class="page-item">';
                }

                return strRetorno += '<a class="page-link" href="#">Próximo</a></li>'

            }

            function getComponentPaginaton(p_jsonData) {

                let paginaINI = 1; // pagina inicial
                let paginaMAX = p_jsonData.last_page; // quantidade de paginas
                let paginaFIN = paginaMAX; // pagina final
                let maxItems = 14; // quantidade de items
                let medItems = 7;  // metade do maximo de itens

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
                $("#pagination>ul>li").remove();

                // botão anterior
                $("#pagination>ul").append(addAnterior_Pagination(p_jsonData));

                for ( i = paginaINI; i <= paginaFIN; i++ ) {
                    $("#pagination>ul").append(addItem_Pagination(p_jsonData, i));
                }

                // botão proximo
                $("#pagination>ul").append(addProximo_Pagination(p_jsonData));

            }

            // procedure: montar a tabela com os clientes cadastrados no banco
            function getData_Clientes(pagina) {

                // inicializar tabela
                $("#Table_Clientes>tbody>tr").remove();

                // consulta AJAX
                $.get('/indexJSON',{page: pagina}, function(jsonData) {

                    // chamar a rotina que monta as linhas
                    getRows_Clientes(jsonData.data);

                    // rotina para montar o componente de paginação
                    getComponentPaginaton(jsonData);
                });
            }

            // função main()
            $(() => {
                getData_Clientes(6);
            });
        </script>
    </body>
</html>
