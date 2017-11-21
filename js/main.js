(function(){


    $(document).ready(function(){
        var display = $('.display');
        var form = $('#calc-form');
        var pushed = $('#pushed');
        var category = $('#category');

        $('.btn').click(function(){
            category.val(this.dataset.category);
//            alert(this.dataset.category);
            pushed.val( $(this).text() );
            form.submit();
        });
    });
})();