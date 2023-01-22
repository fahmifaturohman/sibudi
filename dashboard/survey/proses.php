<?php 
 require '../../configuration/dbcon.php';

  //$id_tamu = $_GET['id'];
  $_GET['id'];
 


if (isset($_POST['setuju'])) {
  

  $sql = mysqli_query($db,"INSERT into survey (`id_tamu`,`id_survey`,`nilai`) 
              values('$id_tamu,null, 3)");

    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Terima kasih telah mengisi quisioner");
          // window.location.href="../tamu/data.php";
           window.location.href="../index.php?action=datatamu";
       </script>
       <?php
   }
} //end if

if (isset($_POST['puas'])) {
 

  $sql = mysqli_query($db,"INSERT into survey (`no`,`id_tamu`,`id_survey`,`nilai`) 
              values(null,'$id_tamu','$id_survey',2)");

    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Terima kasih telah mengisi quisioner");
          window.location.href="../index.php?action=datatamu";
       </script>
       <?php
   }
} //end if

if (isset($_POST['tidak'])) {
  
  $sql = mysqli_query($db,"INSERT into survey (`no`,`id_tamu`,`id_survey`,`nilai`) 
              values(null,'$id_tamu','$id_survey',1)");

    if ($sql) {
      ?>
      <script type="text/javascript">
        alert("Terima kasih telah mengisi quisioner");
          window.location.href="../index.php?action=datatamu";
       </script>
       <?php
   }
}


