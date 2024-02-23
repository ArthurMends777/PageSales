$(document).ready(function() {
    $('#produto_id, #quantidade').change(function() {
        var produtoId = $('#produto_id').val();
        var quantidade = $('#quantidade').val();
        var preco = $('#produto_id option:selected').data('preco');
        
        if (produtoId && quantidade && preco) {
            var valorTotal = quantidade * preco;
            $('#valor_total').val(valorTotal.toFixed(2));
        }
    });

    $('#parcelado').change(function() {
        if ($(this).val() == '1') {
            $('#dados_parcelamento').show();
        } else {
            $('#dados_parcelamento').hide();
        }
    });

    $('#quantidade_parcelas').change(function() {
        var quantidadeParcelas = $(this).val();
        var valorTotal = parseFloat($('#valor_total').val());
        var valorPrimeiraParcela = valorTotal / quantidadeParcelas;
        $('#valor_primeira_parcela').val(valorPrimeiraParcela.toFixed(2));

        var valorParcelaHtml = '';
        for (var i = 1; i <= quantidadeParcelas; i++) {
            valorParcelaHtml += '<li>Parcela ' + i + ': R$ ' + valorPrimeiraParcela.toFixed(2) + '</li>';
        }
        $('#valor_parcelas').html(valorParcelaHtml);
        $('#valor_parcelas_div').show();
    });

    $('#modificar_primeira_parcela').click(function() {
        var novoValor = prompt('Informe o novo valor da primeira parcela:');
        if (novoValor !== null) {
            novoValor = parseFloat(novoValor);
            if (!isNaN(novoValor)) {
                $('#valor_primeira_parcela').val(novoValor.toFixed(2));
                $('#quantidade_parcelas').trigger('change');
            } else {
                alert('Valor inválido. Por favor, insira um valor numérico.');
            }
        }
    });
});