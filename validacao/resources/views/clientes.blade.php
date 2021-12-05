<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relação de Clientes Cadastrados</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" >
</head>
<body>
    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2">
                <div class="card border">
                    <div class="card-header bg-secondary">
                        <div class="card-title text-white">Relação de Clientes Cadastrados</div>
                    </div>                    
                    <div class="card-body">
                    
                    <table class="table table-bordered table-hover" id="tbclientes">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>IDADE</th>
                            <th>ENDERECO</th>
                            <th>E-MAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cli)
                            <tr>
                                <td>{{$cli->id}}</td>
                                <td>{{$cli->nome}}</td>
                                <td>{{$cli->idade}}</td>
                                <td>{{$cli->endereco}}</td>
                                <td>{{$cli->email}}</td>
                            </tr>
                        @endforeach                    
                    </tbody>
                    
                    </table>

                    <a href="/create_cliente" class="btn btn-primary btn-sm">Novo Cliente</a>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>
