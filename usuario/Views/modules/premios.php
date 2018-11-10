
<CENTER><h2 class="box-title" style="color: black">| PREMIOS |</h2></CENTER>
            
<a href="index.php?action=inicio"><button class="btn btn-info" ><i class="fa fa-home"></i></button></a></td>

<div class="row">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Id</th>
                  <th>Premio</th>
                  <th>Detalles</th>
                  <th>¿Como obtener?</th>
                </tr>
                <tbody>
		
      <?php 
      //OBJE DE LA CLASE CONTROLLER
        $promo = new Controller();
        // FUNCION DE LA CLASE CONTROLER
				$promo->PremiosController();
			
			?>

		</tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>