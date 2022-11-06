$(document).ready (function() {
    sendRegistration()
    
});  


function sendRegistration(){
    $('form[name="registration"]').on('submit', function(){
        $(this).validate();
        if(!$(this).valid()) return;
        var ref = $(this),
            method = ref.attr("method"),
            url = ref.attr("action"),
            data = {};
        ref.find('[name]').each(function(index, value) {
            var ref = $(this)
                nm = ref.attr("name"),
                value = ref.val();

            data[nm] = value;
        });

        $.ajax({
            url: url,
            type: method,
            data: data,
            success: function(response) {
                alert("Your waste has been successfully registered.");
            }
        });
        return false;
    });
}