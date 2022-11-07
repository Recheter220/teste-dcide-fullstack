<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="/js/veiculo.js"></script>
    @if (isset($veiculo)) <title>Editar Veículo</title>
    @else <title>Cadastrar Veículo</title>
    @endif
</head>

<body>
    <div class="container my-5">
        @if (isset($veiculo))
            <h4>
                Editar Veículo
                <a role="button" href="/" class="btn btn-secondary float-end">Voltar</a>
            </h4>
        @else
            <h4>
                Cadastrar Veículo
                <a role="button" href="/" class="btn btn-secondary float-end">Voltar</a>
            </h4>
        @endif
        <form action="/veiculos/salvar" method="POST" onsubmit="salvar(event)">
            @isset($veiculo)
                <input type="hidden" name="id" id="id" value="{{ $veiculo->id }}">
            @endisset
            <div class="row my-3">
                <div class="col-6">
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control" value="{{ $veiculo->marca ?? '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="veiculo">Modelo</label>
                        <input type="text" name="veiculo" id="veiculo" class="form-control" value="{{ $veiculo->veiculo ?? '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="ano">Ano</label>
                        <input type="number" name="ano" id="ano" class="form-control" 
                            min="1900" max="{{ date('Y') + 1 }}" value="{{ $veiculo->ano ?? date('Y') }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="vendido">Vendido</label>
                        <select name="vendido" id="vendido" class="form-control">
                            <option value="0" @if (isset($veiculo) && $veiculo->vendido == 0) @endif>Não</option>
                            <option value="1" @if (isset($veiculo) && $veiculo->vendido == 1) @endif>Sim</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" class="form-control">{{ $veiculo->descricao ?? '' }}</textarea>
                </div>
            </div>
            <div class="d-grid gap-2 col-4 mx-auto">
                <button type="submit" class="btn btn-primary">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</body>

</html>
