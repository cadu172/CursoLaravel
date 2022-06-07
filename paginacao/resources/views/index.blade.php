<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Paginação</title>        
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />
    </head>
    <body>        
        <div class="container">
            <div class="card text-center">
                <div class="card-header">Tabela de Cliente</div>
                <div class="card-body">
                    <table class="table table-hoover">
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
                        <tfoot></tfoot>
                    </table>
                </div>
                <div class="card-footer">Paginação</div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>
