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
            function addItem_Pagination(p_ItemPagina) {
                $("#pagination>ul").append ('<li class="page-item"><a class="page-link" href="#">' + p_ItemPagina + '</a></li>');
            }

            function getComponentPaginaton(p_jsonData) {

                for ( i = 0; i < p_jsonData.total; i++ ) {
                    addItem_Pagination(p_jsonData.current_page);
                }

            }

            // procedure: montar a tabela com os clientes cadastrados no banco
            function getData_Clientes(pagina) {

                // inicializar tabela
                $("#Table_Clientes>tbody>tr").remove();

                // consulta AJAX
                $.get('/indexJSON',{page: pagina}, function(jsonData) {

                    console.log(jsonData);

                    // chamar a rotina que monta as linhas
                    getRows_Clientes(jsonData.data);

                    // rotina para montar o componente de paginação
                    getComponentPaginaton(jsonData);
                });
            }

            // função main()
            $(() => {
                getData_Clientes(1);
            });
        </script>
    </body>
</html>
