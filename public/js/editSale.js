$(document).ready(function() {
    $('#produto_id, #quantidade').on('change', function() {
        var produtoId = $('#produto_id').val();
        var quantidade = $('#quantidade').val();
        var preco = $('#produto_id option:selected').data('preco');
        
        if (produtoId && quantidade && preco) {
            var valorTotal = quantidade * preco;
            $('#valor_total').val(valorTotal.toFixed(2));
        }
    });
});