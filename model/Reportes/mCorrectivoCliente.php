<?php


session_start();
$usuario = $_SESSION['razon'];

if(isset($_SESSION['razon']))
{
}else{ header("Location: index.php");}

    //declaramos uma variavel para monstarmos a tabela
    $dadosXls  = "";
    $dadosXls .= "  <table border='1' >";
$dadosXls .= "          <tr>";
    $dadosXls .= "          <th>Razon Social</th>";
    $dadosXls .= "          <th>Equipo</th>";
     $dadosXls .= "          <th>Modelo</th>";
    $dadosXls .= "          <th>Tecnico Encargado</th>";
    $dadosXls .= "          <th>Orden de Servicio</th>";
    $dadosXls .= "          <th>Autorizado Por</th>";
    $dadosXls .= "          <th>Horometro</th>";
    $dadosXls .= "          <th>Fecha Entrega</th>";
    $dadosXls .= "          <th>Actividad</th>";
    $dadosXls .= "          <th>Insumos</th>";
    $dadosXls .= "      </tr>";
    //incluimos nossa conexão
    include_once('Conexao.class.php');
    //instanciamos
    $pdo = new Conexao();
    //mandamos nossa query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $pdo->select("SELECT T2.razon, T3.descripcion, T3.modelo, T4.nombre, T1.ordenTrabajo, T1.autorizado, T1.horometro, T1.fechasolicitud, 
  T1.fechaatencion, T1.fechainicio, T1.fechaentrega, T1.tiempoatencion, T1.tiempoimpro, T1.reporcliente, T1.actividad, T1.insumos
FROM mantecorre T1
inner join usuario T2 ON T1.usuario_id = T2.id
inner join equipo T3 ON T1.equipo_id = T3.id
inner join empleado T4 ON T1.empleado_id = T4.id

WHERE razon = '$usuario';");
    //varremos o array com o foreach para pegar os dados
    foreach($result as $res){
        $dadosXls .= "      <tr>";
        $dadosXls .= "          <td>".$res['razon']."</td>";
        $dadosXls .= "          <td>".$res['descripcion']."</td>";
        $dadosXls .= "          <td>".$res['modelo']."</td>";
        $dadosXls .= "          <td>".$res['nombre']."</td>";
        $dadosXls .= "          <td>".$res['ordenTrabajo']."</td>";
        $dadosXls .= "          <td>".$res['autorizado']."</td>";
        $dadosXls .= "          <td>".$res['horometro']."</td>";
        $dadosXls .= "          <td>".$res['fechaentrega']."</td>";
        $dadosXls .= "          <td>".$res['actividad']."</td>";
        $dadosXls .= "          <td>".$res['insumos']."</td>";
        $dadosXls .= "      </tr>";
    }
    $dadosXls .= "  </table>";
 
    // Definimos o nome do arquivo que será exportado  
    $arquivo = "MtoCorrectivos.xls";  
    // Configurações header para forçar o download  
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0');
    // Se for o IE9, isso talvez seja necessário
    header('Cache-Control: max-age=1');
       
    // Envia o conteúdo do arquivo  
    echo $dadosXls;  
    exit;
?>