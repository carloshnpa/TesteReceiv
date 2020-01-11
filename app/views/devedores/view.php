<?php
namespace App\View\Devedores;
use App\Controllers\DevedoresController;

require(BASE_PATH . '/app/views/template/header.php');
$ctrl = new DevedoresController();
// $devedores = $ctrl->all();
?>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

}else{
    echo "oi";
}
?>

<?php
require(BASE_PATH . '/app/views/template/footer.php');
?>
