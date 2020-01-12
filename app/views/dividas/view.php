<?php
namespace App\Views\Dividas;

use App\Controllers\DividasController;

require('app/views/template/header.php');
$ctrl = new DividasController();
$devedores = array();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['id'])){
        echo "oi";
    }
}
?>
<?php
require(BASE_PATH . '/app/views/template/footer.php');
?>
