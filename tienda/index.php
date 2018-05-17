<?php
session_start();
if(isset($_SESSION['trabajador']))
{
  include_once "header4.php";
  require_once "../Models/personal.class.php";
  $idpersonal = $_SESSION['trabajador'];

  $per = new Personal();
  $dat = $per->NombreTrabajador($idpersonal);
?>

          <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                <h1 class="page-title">
                  Dashboard - Area del Personal
                </h1>
              </div>
              
            </div>
          </div>



<?php 
 include "footer4.html";
}
else{
  echo "Error: 404.  Consulte al administrador del sistema";
  header("Location: ../index.html");
} 
?>