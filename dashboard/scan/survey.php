<style type="text/css">
  /* FontAwesome for working BootSnippet :> */

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
#team {
    background: #eee !important;
}

.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
}

.btn-primary {
    color: #fff;
    background-color: #007b5e;
    border-color: #007b5e;
}

section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}

#team .card {
    border: none;
    background: #ffffff;
}



.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
    margin-bottom: 30px;
}

.backside {
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}



.frontside .card,
.backside .card {
    min-height: 312px;
}

.backside .card a {
    font-size: 18px;
    color: #007b5e !important;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}

</style>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Team -->
<section id="team" class="pb-5" style="margin-top: -100px;">
    <div class="container">
        <h5 class="section-title h1">SURVEY</h5>
        
      <form action="" method="POST">


         <div class="row">
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                  <img src="../survey/sangat-puas.png">
                                    <B><h4 class="card-title">SANGAT PUAS</h4></B>
                                    <button type="submit" class="btn btn-primary btn-block" name="setuju" value="3">PILIH</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="../survey/puas.png">
                                    <B><h4 class="card-title">PUAS</h4></B>
                                  <button type="submit" class="btn btn-primary btn-block" name="puas" value="2">PILIH</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                   <img src="../survey/tidak-puas.png">
                                    <B><h4 class="card-title">TIDAK PUAS</h4></B>
                                   <button type="submit" class="btn btn-primary btn-block" name="tidak" value="1">PILIH</button>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <blockquote cite="#">
                <b>Note:</b> Survey ini hanya dapat dilakukan 1 kali saja, jika terjadi duplikasi data, maka tombol pilih tidak akan merespon.
            </blockquote>
            <!-- ./Team member -->
           

        </div>
        
      </form>
    </div>
  </div>
</section>
<!-- Team -->

<?php 
    $id = $_GET['id'];

    if (isset($_POST['setuju'])) {
        $sql = mysqli_query($db,"INSERT into survey (`id_tamu`,`sangat_puas`,`puas`,`tidak`)
        values('$id',3,0,0)");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Terima kasih telah mengisi survey");
                window.location.href="index.php?action=bukutamu";
               
          </script>
          <?php
      }
      } //end if

      if (isset($_POST['puas'])) {
        $sql = mysqli_query($db,"INSERT into survey (`id_tamu`,`sangat_puas`,`puas`,`tidak`)
        values('$id',0,2,0)");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Terima kasih telah mengisi survey");
               window.location.href="index.php?action=bukutamu";
          </script>
          <?php
      }
      } //end if

      if (isset($_POST['tidak'])) {
         $sql = mysqli_query($db,"INSERT into survey (`id_tamu`,`sangat_puas`,`puas`,`tidak`)
        values('$id',0,0, 1)");

        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Terima kasih telah mengisi survey");
               window.location.href="index.php?action=bukutamu";
          </script>
          <?php
      }
      } //end if


?>    

