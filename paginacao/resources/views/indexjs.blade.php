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
                                <td>1</td>
                                <td>Carlos Eduardo</td>
                                <td>dos Santos Roberto</td>
                                <td>cadu172@gmail.com</td>
                            </tr>                            
                            <tr>
                                <td>1</td>
                                <td>Carlos Eduardo</td>
                                <td>dos Santos Roberto</td>
                                <td>cadu172@gmail.com</td>
                            </tr>                            
                            <tr>
                                <td>1</td>
                                <td>Carlos Eduardo</td>
                                <td>dos Santos Roberto</td>
                                <td>cadu172@gmail.com</td>
                            </tr>                            

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">footer</div>
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
            
            // procedure: montar a tabela com os clientes cadastrados no banco
            function getTable_Clientes(pagina) {

                // inicializar tabela
                $("#Table_Clientes>tbody>tr").remove();

                // consulta AJAX
                $.get('/indexJSON',{page: pagina}, function(jsonData) {                                        
                    // chamar a rotina que monta as linhas
                    getRows_Clientes(jsonData.data);
                });
            }
            
            // função main()
            $(() => {                
                getTable_Clientes(3);                
            });
        </script>
    </body>
</html>
