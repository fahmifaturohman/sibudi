<?php 
 require '../../configuration/dbcon.php';

  $id_tamu = $_POST['id_tamu'];
  $id_survey = $_POST['id_survey'];


if (isset($_POST['setuju'])) {
  $idtamu = $_POST['id_tamu'];
  $idsurvey = $_POST['id_survey'];

  $sql = mysqli_query($db,"INSERT into survey (`no`,`id_tamu`,`id_survey`,`nilai`) 
              values(null,'$id_tamu','$id_survey',3)");

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
  $idtamu = $_POST['id_tamu'];
  $idsurvey = $_POST['id_survey'];

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
  $idtamu = $_POST['id_tamu'];
  $idsurvey = $_POST['id_survey'];

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


