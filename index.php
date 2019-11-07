<?php 
require 'conf/conf_requiere.php';
session_start();
if(isset($_SESSION['user'])){
   
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
<?php include"assets/css/css.php"; ?>
    </head>
    <body style="background: #418bcc;">
        <!-- Menu-->
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.png"/></a>
            <span class="navbar-text"><a href="salir.php"><img src="assets/img/salir.png"></a></span>
            
        </nav>
        <!--Fin Menu-->
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="" id="home-tab" data-toggle="tab" href="#listaalumnos" role="tab" aria-controls="home" aria-selected="true">Lista</a>
                </li>
                <li class="nav-item">
                    <a class="" id="profile-tab" data-toggle="tab" href="#nuevocurso" role="tab" aria-controls="profile" aria-selected="false">Nuevo Curso</a>
                </li>     

                <li class="nav-item">
                    <a class="" href="modulos"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</a>
                </li>                   
            </ul> 
         
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="listaalumnos" role="tabpanel" aria-labelledby="home-tab">                    
                          
                        <div id="curso_establecimiento_selec"></div>        
                  
                </div>
                <div class="tab-pane fade" id="nuevocurso" role="tabpanel" aria-labelledby="profile-tab">
               
   <?php 
   $id_sostenedor = sostenedor_colegio($_SESSION["identificador_estable"]); 
  if($id_sostenedor <=  0){
    echo ' <div class="alert alert-danger mt-5" role="alert">Para realizar una carga masiva, necesita registrar un sostenedor</div>';
  }
  else if($id_sostenedor >=  1){
   
      }

      $id_docente = docentes_colegio($_SESSION["identificador_estable"]); 
      if($id_docente <=  0){
        echo ' <div class="alert alert-danger mt-2" role="alert">Para realizar una carga masiva, necesita registrar un Docente</div>';
      }
      else if($id_docente >=  1){
      
          }
  ?>
          
                    <div class="borexcel">
                    
                    <form class="formulario" enctype="multipart/form-data" id="formulario_excel" method="post">
                    <div class="row">
                     <div class="col-md-6">
                     <div class="col-8">
                      <label for="" class="text-white">Profesor(a):</label>
                      <select name="id_profesor" id="id_profesor" class="form-control">
                      <?php  echo select_establecimiento($_SESSION["identificador_estable"]);?>
                      </select>
                      </div>
                     </div>
                     <div class="col-md-6">
                     <div class="col-8">
                      <label for="" class="text-white">Cursos:</label>
                      <select name="id_curso" id="id_curso" class="form-control">    
                      <option value="" disabled selected>Seleccione un docente</option>                 
                      </select>
                      </div>
                     </div>
                    </div>
                        <div class="row mt-5">
                            <div class="col-md-5">
                             
                                    <label class="text-white">Seleccionar Archivo XLSX</label>
                                    <div class="input-group">
                                        <input type="file" name="file" id="file" class="form-control" required>
                                        <span class="input-group-addon"></span>

                                        <input type="submit" id="boton_subir_excel" value="Cargar" name="Cargar" class="btn btn-danger ml-3">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <div class="excel">
                                    <a href="descarga_archivo.php" class="text-white">Descargar Excel de Ejemplo</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="excel">
                                    <a href="descarga_archivo_llenar.php" class="text-white">Descargar Excel Recepción de Datos</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row  pt-5">
                      <div class="col text-center text-white" id="dowload"></div>
                    </div>
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="pasos">
                                <h4>Paso 1</h4>
                                <p>-Descargar Archivo Excel de Ejemplo</p>
                                <p>-Descargar Archivo Excel recepción de datos</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="pasos">
                                <h4>Paso 2</h4>
                                <p>-Completar el archivo Excel Para llenar </p>
                                <p>-</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="pasos">
                                <h4>Paso 3</h4>
                                <p>- Subimos el archivo completado con el boton 'Seleccionar archivo'</p>
                                <p>-Presionamos el Boton 'Cargar'</p>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
            </div>
             
        </div>

<?php include "assets/js/js.php"; ?>
<script>
    $("#curso_establecimiento_selec").load("lista_curso_establecimientos.php");
carga_excel();
llena_profesores();


</script>
    </body>
</html>
<?php 
}else{
  //header("location:reportes/login.php");
  header("location:index2.php");
}
