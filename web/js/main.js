$('#productsinorder-product_id').on('change', function(){
    var product_id = $(this).val();
    $.ajax({
        url: '/product/get-available-count?id='+product_id,
        type:'POST',
        success: function(data) {
            var product = JSON.parse(data)
            $('#productsinorder-count').attr('max', product['count']);
            $('#productsinorder-count').val(1);
        }
    });
});