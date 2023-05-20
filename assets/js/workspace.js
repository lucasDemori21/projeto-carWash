$('#tableServ').dataTable( {
    "processing": true
});

$(document).ready(function(){
    $('input[type="checkbox"]').on('change', function(){
        var switch_id = $(this).attr('id');
        var line_id = switch_id.split('_')[1];
        var status = $(this).is(':checked') ? 1 : 0;
        if (status == 1) {
            Toastify({
                text: "Iniciando serviço!",
                offset: {
                    x: 12,
                    y: 12
                },
                duration: 3000,
                destination: "https://github.com/apvarun/toastify-js",
                gravity: "top",
                position: "right",
                style: {
                    background: "green",
                    borderRadius: "5px",
                    width: "15%",
                    textAlign: "center",
                    fontSize: "18px"
                },
                onClick: function(){}
            }).showToast();
            verifica = 1
        } else if((status == 0) && (verifica == 1)){
            $("#line-"+line_id).css("background-color", "rgba(163, 0, 0, 0.3)");
            $("#status_"+line_id).attr('disabled', 'disabled');
            var id_agendamento = document.getElementById('user-'+line_id).value;  
            $.ajax({
                method: "POST",
                url: "../assets/ajax/processa_status_ajax.php",
                data: 
                    { 
                    status: verifica,
                    id_agen: id_agendamento
                    }
            })
            .done(function( msg ) {
                Toastify({
                    text: "Serviço encerrado!",
                    offset: {
                        x: 12,
                        y: 12
                    },
                    duration: 3000,
                    destination: "https://github.com/apvarun/toastify-js",
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "red",
                        borderRadius: "5px",
                        width: "15%",
                        textAlign: "center",
                        fontSize: "18px"
                    },
                    onClick: function(){}
                }).showToast();
            });
        }
    });
});