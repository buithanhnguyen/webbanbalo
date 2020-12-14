<?php
    include "../includes/connect.php";
    session_start();

    if(isset($_SESSION['Username']) && $_SESSION['Username'] != NULL){
        unset($_SESSION['Username']);
        echo 'Bạn đã đăng xuất thành công.';
        echo '<script type="text/javascript">
           window.location = "index.php"
      		</script>';
    }

?>