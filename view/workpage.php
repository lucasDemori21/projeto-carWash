<?php
require_once '../config/conexao.php';
require_once 'header.php';
if ($_SESSION['permissao'] == 1){
?>
<div class="container-detail-table">
    <h1 class="title">GERENCIADOR DE AGENDAMENTOS</h1>
<table id="tableServ" class="table table-responsive" style="width:100%; color: white;">
        <thead>
            
            <tr>
                <th>Cliente</th>
                <th>Responsavel</th>
                <th>Modelo</th>
                <th>Serviço</th>
                <th>Data</th>
                <th>Horario</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $sql = 'SELECT id_agendamento, u.username, f.nome_func, c.modelo, s.servico, a.data_agen, hora_disp, a.status FROM agendamento AS a
            INNER JOIN funcionarios AS f
            ON a.id_func = f.id_func
            INNER JOIN usuarios AS u
            ON a.id_user = u.id_user
            INNER JOIN servicos AS s
            ON a.id_servico = s.id_servico
            INNER JOIN carros AS c
            ON a.id_car = c.id_car;';
            $result = mysqli_query($conn, $sql);
            while($ag = mysqli_fetch_array($result)){
                
                if($ag[7] == 1){
                    echo '<tr style="background-color: rgba(163, 0, 0, 0.3);">';
                }else{
                    echo '<tr id="line-'. $i .'">';
                }
                ?>
                <input type="hidden" id='user-<?php echo $i;?>' value="<?php echo $ag[0];?>">
                <td><?php echo $ag[1];?></td>
                <td><?php echo $ag[2];?></td>
                <td><?php echo $ag[3];?></td>
                <td><?php echo $ag[4];?></td>
                <td><?php echo date('d/m/Y', strtotime($ag[5]));?></td>
                <td><?php echo $ag[6]; ?></td>
                <td>
                    <?php
                    if($ag[7] == 1){
                    ?>
                    <div class="form-check form-switch">
                        <input class="form-check-input" style="width:60px; height: 30px; margin-right: 1rem;" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                        <label class="form-check-label" for="flexSwitchCheckCheckedDisabled"></label>
                    </div>
                    <?php
                    }else{
                    ?>
                    <div class="form-check form-switch">
                        <input class="form-check-input" style="width:60px; height: 30px; margin-right: 1rem;" type="checkbox" id="status_<?php echo $i; ?>" name="status">
                        <label class="form-check-label" style="margin-top:3%;" for="flexSwitchCheckDefault"></label>
                    </div>
                    <?php
                    }
                
                ?>
                   
                </div>
                </td>
                
                <?php
            echo '</tr>';
            $i++;
            }
            ?>
        </tfoot>
    </table>
</div>
</body>

</html>

<script>
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
</script>


    <?php
    }
    ?>