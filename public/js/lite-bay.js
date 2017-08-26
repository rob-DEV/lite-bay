/**
 * Created by Robert Gray on 20/08/2017.
 */

function copyToClipboard(elementId) {
    var aux = document.createElement("input");
    aux.setAttribute("value", document.getElementById(elementId).innerHTML);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");

    document.body.removeChild(aux);

}
$('#generate-wallet-push').on('click', function () {
    $('#generate-wallet-push').attr("disabled", true);
    $.ajax({
            method: 'POST',
            url: gen_url,
            data: { _token: token}
        })
        .done(function () {
            $('#no-ltc-wallet-holder').html(
                "<div class=\"row text-center\">" +
                "<div class=\"col-md-4\"></div><div class=\"col-md-4\">  <img src=\""+ img +"\"> " +
                "<h3>Your LTC wallet has been created successfully!</h3>" +
                "<h3>The page will now reload.</h3>" +
                "</div> <div class=\"col-md-4\"></div>" +

                "</div>"
            );
            setTimeout(function(){
                $(location).attr('href', comp_url);
            }, 3000);
        });
});

$('#lb_list_button').on('click', function () {
    $('#lb_list_button').attr("disabled", true);
    $.ajax({
            method: 'POST',
            url: list_item_url,
            data: {
                item_title: $('#item_title').val(),
                item_condition: $('#item_condition').val(),
                item_price: $('#item_price').val(),
                item_details: $('#item_details').val(),
                item_postage_service: $('#item_postage_service').val(),
                item_postage_price: $('#item_postage_price').val(),
                _token: token
            },

            success: function(data){
                setTimeout(function(){
                    $(location).attr('href', comp_url);
                }, 500);
            },
            error: function(data){
            var errors = data.responseJSON;
            console.log(errors);
            // Render the errors with js ...
            }

        });
});

