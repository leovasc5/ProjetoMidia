
        <?php
            $destroy = 1;
            if($destruir = 1){
                session_destroy();
                header("Location:index.php");
            }
       ?>
