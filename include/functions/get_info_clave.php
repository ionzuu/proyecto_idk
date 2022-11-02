<?php 
include "../include/private/conn.php";
$user = new Database();
session_start();
if($_SESSION['geti'] == 1){
    $optionselect = "clavemateria";
}else
if($_SESSION['geti'] == 2){
    $resultado=$user->search("dia","");
}else
if($_SESSION['geti'] == 3){
    $resultado=$user->search("grupo","");
}else
if($_SESSION['geti'] == 4){
    $resultado=$user->search("hora","");
}else
if($_SESSION['geti'] == 5){
    $resultado=$user->search("materia","");
}else
if($_SESSION['geti'] == 6){
    $resultado=$user->search("plan","");
}else
if($_SESSION['geti'] == 7){
    $resultado=$user->search("salon","");
}else
if($_SESSION['geti'] == 8){
    $resultado=$user->search("semestre","");
}else
if($_SESSION['geti'] == 9){
    $resultado=$user->search("distribucion","");
}
$count=$user->searchcount($optionselect);

$totalcount = $count - 1;
$totalperpag = 3;
$total_page = $totalcount/3;
$total_page = ceil($total_page);
$init = ($_GET['page']-1)*$totalperpag;
if($_GET['page']>$total_page || $_GET['page']<=0){
    header('Location: clavedemateria.php?page=1');
}                      /* Cambia location y la sentencias */
$resultado=$user->search($optionselect,"id_clavemateria != 0 LIMIT $init,$totalperpag");
?>
<div class="table">
    <table class="table">
        <thead>
            <tr>
                <th class="sh">Clave</th>
                <th class="sh">Descripción</th>
                <th class="sh"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($resultado as $row){
            ?>
            <tr class="tr"><!-- Cambia name e id -->
                <td class="td"><p class="value"><?php echo $row['nombre_clave']; ?></p></td>
                <td class="td"><p class="value"><?php echo $row['descripcion']; ?></p></td>
                <td class="td"><a id="edit" name="edit" class="btn_action" href="editclave.php?inf=<?php echo $row['id_clavemateria']; ?>">Editar</a><a id="delete" name="delete" class="btn_action" href="../include/functions/process_clave.php?inf=<?php echo $row['id_clavemateria']; ?>">Eliminar</a></td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <form action="processclave.php" method="post">
                <td class="td data"><input type="text" name="addnombreclave" id="addnombreclave" placeholder="clave"></td>
                <td class="td data"><input type="text" name="adddescripcion"  id="adddescripcion" placeholder="descripcion"></td>
                <td class="td"><button id="add" name="add" class="btn_action">Agregar</button></td>
                </form>
            </tr>
            </form>
        </tbody>
    </table>
</div>
<div>
    <nav class="pagination div_nav">
        <ul class="pagination">                                                                                <!-- Cambia direcciones -->
            <li class="page-item pos <?php echo $_GET['page']<=1 ? 'disable' : ''?>"><a class="btn_option siz" href='clavedemateria.php?page=<?php echo $_GET['page']-1; ?>'>Anterior</a></li>
                    
            <?php for($i=0; $i<$total_page; $i++){ ?>
                        
                <li class="page-item pos">                                                  <!-- Cambia direcciones -->
                <a class="btn_option siz <?php echo $_GET['page']==$i+1 ? 'active' : '' ?>" href="clavedemateria.php?page=<?php echo $i+1;?>"><?php echo$i+1; ?></a></li>
            <?php } ?>
                                                                                            <!-- Cambia direcciones -->
            <li class="page-item pos <?php echo $_GET['page']>=$total_page ? 'disable' : '' ?>"><a class="btn_option siz" href='clavedemateria.php?page=<?php echo $_GET['page']+1; ?>'>Siguiente</a></li>
        </ul>
    </nav>
</div>
