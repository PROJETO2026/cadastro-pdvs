<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>PDVs cadastrados</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f7f7f7; }
        .pdv { background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        a { display: inline-block; margin-bottom: 20px; }
        .success { color: green; }
    </style>
</head>
<body>

<h1>PDVs cadastrados</h1>

<a href="{{ route('pdvs.create') }}">Cadastrar novo PDV</a>

@if (session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

@foreach ($pdvs as $pdv)
    <div class="pdv">
        <h2>{{ $pdv->nome }}</h2>

        <p><strong>Testeira:</strong> {{ $pdv->testeira }}</p>
        <p><strong>Responsável:</strong> {{ $pdv->responsavel_nome }}</p>
        <p><strong>Email:</strong> {{ $pdv->responsavel_email }}</p>

        <h3>Cardápio</h3>

        <table>
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Produto</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pdv->menuItems as $item)
                    <tr>
                        <td>{{ $item->categoria }}</td>
                        <td>{{ $item->produto }}</td>
                        <td>R$ {{ number_format($item->preco, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endforeach

</body>
</html>