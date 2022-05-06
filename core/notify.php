<?php
    if(!empty($_SESSION['notifysucces'])){
        echo "<script>
        Swal.fire(
            'Thông báo',
            '".$_SESSION['notifysucces']."',
            'success'
          )
        </script>";
        unset($_SESSION['notifysucces']);
    }
    
    if(!empty($_SESSION['notifyerror'])){
        echo "<script>
        Swal.fire(
            'Thông báo',
            '".$_SESSION['notifyerror']."',
            'error'
          )
        </script>";
        unset($_SESSION['notifyerror']);
    }
?>