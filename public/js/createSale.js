document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('produto_id').addEventListener('change', function() {
        var produtoId = document.getElementById('produto_id').value;
        var quantidade = document.getElementById('quantidade').value;
        var precoOption = document.querySelector('#produto_id option:checked');
        var preco = precoOption ? parseFloat(precoOption.dataset.preco) : null;

        if (produtoId && quantidade && preco) {
            var valorTotal = quantidade * preco;
            document.getElementById('valor_total').value = valorTotal.toFixed(2);
        }
    });

    document.getElementById('quantidade').addEventListener('change', function() {
        var produtoId = document.getElementById('produto_id').value;
        var quantidade = document.getElementById('quantidade').value;
        var precoOption = document.querySelector('#produto_id option:checked');
        var preco = precoOption ? parseFloat(precoOption.dataset.preco) : null;

        if (produtoId && quantidade && preco) {
            var valorTotal = quantidade * preco;
            document.getElementById('valor_total').value = valorTotal.toFixed(2);
        }
    });

    document.getElementById('parcelado').addEventListener('change', function() {
        if (this.value === '1') {
            document.getElementById('dados_parcelamento').style.display = 'block';
        } else {
            document.getElementById('dados_parcelamento').style.display = 'none';
        }
    });

    document.getElementById('quantidade_parcelas').addEventListener('change', function() {
        var quantidadeParcelas = parseInt(this.value);
        var valorTotal = parseFloat(document.getElementById('valor_total').value);
        var valorPrimeiraParcela = valorTotal / quantidadeParcelas;
        document.getElementById('valor_primeira_parcela').value = valorPrimeiraParcela.toFixed(2);

        var valorParcelaHtml = '';
        for (var i = 1; i <= quantidadeParcelas; i++) {
            valorParcelaHtml += '<li>Parcela ' + i + ': R$ ' + valorPrimeiraParcela.toFixed(2) + '</li>';
        }
        document.getElementById('valor_parcelas').innerHTML = valorParcelaHtml;
        document.getElementById('valor_parcelas_div').style.display = 'block';
    });

    document.getElementById('modificar_primeira_parcela').addEventListener('click', function() {
        var novoValor = prompt('Informe o novo valor da primeira parcela:');
        if (novoValor !== null) {
            novoValor = parseFloat(novoValor);
            if (!isNaN(novoValor)) {
                document.getElementById('valor_primeira_parcela').value = novoValor.toFixed(2);
                document.getElementById('quantidade_parcelas').dispatchEvent(new Event('change'));
            } else {
                alert('Valor inválido. Por favor, insira um valor numérico.');
            }
        }
    });
});
