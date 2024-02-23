document.addEventListener("DOMContentLoaded", function() {
    var produtoIdElement = document.getElementById('produto_id');
    var quantidadeElement = document.getElementById('quantidade');

    produtoIdElement.addEventListener('change', function() {
        var produtoId = produtoIdElement.value;
        var quantidade = quantidadeElement.value;
        var precoOption = produtoIdElement.querySelector('option:checked');
        var preco = precoOption ? parseFloat(precoOption.getAttribute('data-preco')) : null;

        if (produtoId && quantidade && preco) {
            var valorTotal = quantidade * preco;
            document.getElementById('valor_total').value = valorTotal.toFixed(2);
        }
    });

    quantidadeElement.addEventListener('change', function() {
        var produtoId = produtoIdElement.value;
        var quantidade = quantidadeElement.value;
        var precoOption = produtoIdElement.querySelector('option:checked');
        var preco = precoOption ? parseFloat(precoOption.getAttribute('data-preco')) : null;

        if (produtoId && quantidade && preco) {
            var valorTotal = quantidade * preco;
            document.getElementById('valor_total').value = valorTotal.toFixed(2);
        }
    });
});
