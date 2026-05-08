<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar PDV</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f7f7f7; }
        form { background: white; padding: 24px; border-radius: 8px; max-width: 800px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 10px; margin-top: 4px; box-sizing: border-box; }
        .item { border: 1px solid #ddd; padding: 16px; margin-top: 16px; border-radius: 6px; }
        button { margin-top: 16px; padding: 10px 16px; cursor: pointer; }
        .error { color: #b00020; }
    </style>
</head>
<body>

<h1>Cadastrar Ponto de Venda</h1>

@if ($errors->any())
    <div class="error">
        <strong>Corrija os erros abaixo:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('pdvs.store') }}">
    @csrf

    <label>Nome do PDV</label>
    <input type="text" name="nome" value="{{ old('nome') }}" required>

    <label>Testeira</label>
    <input type="text" name="testeira" value="{{ old('testeira') }}" required>

    <label>Nome do responsável</label>
    <input type="text" name="responsavel_nome" value="{{ old('responsavel_nome') }}" required>

    <label>Email do responsável</label>
    <input type="email" name="responsavel_email" value="{{ old('responsavel_email') }}" required>

    <h2>Cardápio</h2>

    <div id="cardapio">
        <div class="item">
            <label>Categoria</label>
            <input type="text" name="cardapio[0][categoria]" required>

            <label>Produto</label>
            <input type="text" name="cardapio[0][produto]" required>

            <label>Preço</label>
            <input type="number" step="0.01" name="cardapio[0][preco]" required>
        </div>
    </div>

    <button type="button" onclick="adicionarItem()">Adicionar produto</button>
    <button type="submit">Salvar PDV</button>
</form>

<script>
    let index = 1;

    function adicionarItem() {
        const cardapio = document.getElementById('cardapio');

        const div = document.createElement('div');
        div.classList.add('item');

        div.innerHTML = `
            <label>Categoria</label>
            <input type="text" name="cardapio[${index}][categoria]" required>

            <label>Produto</label>
            <input type="text" name="cardapio[${index}][produto]" required>

            <label>Preço</label>
            <input type="number" step="0.01" name="cardapio[${index}][preco]" required>
        `;

        cardapio.appendChild(div);
        index++;
    }
</script>

</body>
</html>