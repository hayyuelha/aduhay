<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<img src="assets/img/aduhay-logo.png" style="width: 22%; height: auto; padding-left: 97px; margin-top: -5px; z-index: 100; position: relative;">
<nav class="navbar navbar-default navbar-static-top" style="margin-top: -72px; z-index:0;">     
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
            </button>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right" id="navbarBtn">
            <?php if(isset( $_SESSION['user_id'] ))
				{
					echo '<li><a href="login">Logout</a></li>';
					echo '<li class="active"><a href="aduan">Daftar Aduan
             		<span class="badge">'.$numOfAduan.'</span> </a></li>';				
             	}
				else 
				{
					echo '<li><a href="home">Input Aduan</a></li>';
					echo '<li class="active"><a href="aduan">Daftar Aduan</a></li>';
				}
			?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container" id="bg">
    <div class="col-md-10 col-md-offset-1">
        <div class="jumbotron">
        	<h1>Daftar Aduan</h1>
      	</div>
      	<form>
	    	<div class="form-group">
	      		<div class="row">
		      		<select class="form-control span4" id="namataman">
			      		<option value = "0">--Pilih taman--</option>
			      		<?php
			      			foreach ($namaTaman as $row)
							{
								echo '<option value="' . $row['id'] . '">'.$row['nama'].'</option>';
							}
			      		?>
		      		</select>
		      		
		      		<select class="form-control span4" id="namakategori">
			      		<option value = "0">--Pilih kategori--</option>
			      		<?php
			      			foreach ($namaKategori as $row)
							{
								echo '<option value="' . $row['id'] . '">'.$row['nama_kategori'].'</option>';
							}
			      		?>
		      		</select>
		    	</div>

			<div class="row" id="plugin_datatable">
				<table id="data_aduan" class="table table-striped table-bordered" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>Id</th>
			                <th>Taman</th>
			                <th>Deskripsi Aduan</th>
			                <th>Kategori</th>
			                <th>Waktu</th>
			                <th>Status</th>
			                <th></th>
			            </tr>
			        </thead>
			 
			        <tbody>
			        <?php
			        	foreach ($allAduan as $aduan) { ?>
			            <tr>
			                <td><?php echo $aduan['id']?></td>
			                <td><?php echo $aduan['taman']?></td>
			                <td><?php echo $aduan['deskripsi']?></td>
			                <td><?php echo $aduan['kategori']?></td>
			                <td><?php echo $aduan['waktu']?></td>
			                <td><?php echo $aduan['status']?></td>
			                <td>
			                	<?php if(isset($_SESSION['user_id'])):?>
			                		<a href="#" data-toggle="modal" data-target="#ubah-status-modal" class="ubah-status">
			                		<span class='fa fa-pencil'></span>
			                	<?php endif?>	
			                </td>
			            </tr>			        		
			        <?php } ?>
			        </tbody>
			    </table>
		    </div>

		    <?php if(isset($_SESSION['user_id'])):?>
			    <div class="row" id="btnGenerateLap">
			    	<button type="button" class="btn btn-success" value="" data-toggle="modal" data-target="#opsi-laporan-modal">Buat Laporan</button>
			    </div>
		    <?php endif?>
		</div>
      </form>
      </div>
</div> <!-- /container -->

<div class="modal fade" id="opsi-laporan-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	    <div class="modal-content">
        	<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Pilih Template Laporan</h4>
      		</div>
      		
      		<form action="laporan" target="_blank" role="form" method="post">
	      		<div class="modal-body">
		    		<div class="row">
				      	<select class="form-control span2" id="bulan" name="bulan">
				      		<option value="0">--Pilih Bulan--</option>
				      		<option value="1">Januari</option>
				      		<option value="2">Februari</option>
				      		<option value="3">Maret</option>
				      		<option value="4">April</option>
				      		<option value="5">Mei</option>
				      		<option value="6">Juni</option>
				      		<option value="7">Juli</option>
				      		<option value="8">Agustus</option>
				      		<option value="9">September</option>
				      		<option value="10">Oktober</option>
				      		<option value="11">November</option>
				      		<option value="12">Desember</option>
				      	</select>

				      	<select class="form-control span2" id="tahun" name="tahun">
				      		<option value="0">--Pilih Tahun--</option>
				      		<option value="2015">2015</option>
				      	</select>
		    		</div>
			    	<div class="radio">
			    		<label>
			    			<input type="radio" value="1" name="optradio">Template 1: Laporan aduan per taman</br><img src="assets/img/temp1.png" id="ss_temp1" alt="temp1">
			    		</label>
			    	</div>
				    
				    <div class="radio">
				    	<label>
				      		<input type="radio" value="2" name="optradio">Template 2: Laporan aduan berdasarkan status</br><img src="assets/img/temp2.png" id="ss_temp2" alt="temp2">
				    	</label>
				    </div>

				    <div class="radio">
				    	<label>
				      		<input type="radio" value="3" name="optradio">Template 3: Laporan aduan berdasarkan kategori aduan</br><img src="assets/img/temp3.png" id="ss_temp3" alt="temp3">
				    	</label>
				    </div>
      			</div>

	      		<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			        <button name="submit" type="submit" class="btn btn-primary">Buat laporan</button>
	      		</div>
      		</form>
    	</div>
	</div>
</div>

<div class="modal fade" id="ubah-status-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">Ubah Status</h4>
      		</div>
      		
      		<form action="" role="form" method="post">
      			<div class="modal-body">
      				<table border="0" style="width:100%">
						<tr>
						    <td width="140">ID Aduan</td>
						    <td width="15" align="left">:</td>
						    <td id="id_aduan"></td> 
						</tr>

						<tr>
						    <td width="140">Deskripsi Aduan</td>
						    <td width="15" align="left">:</td>
						    <td id="deskripsi"></td> 
						</tr>

						<tr>
						    <td width="140">Taman</td>
						    <td width="15" align="left">:</td>
						    <td id="taman"></td> 
						</tr>

						<tr>
						    <td width="140">Status Sekarang</td>
						    <td width="15" align="left">:</td>
						    <td id="status"></td> 
						</tr>
						<tr>
						    <td width="140">Ubah status</td>
						    <td width="15" align="left">:</td>
						    <td>
						    	<input type="hidden" id="id_aduan2" name="id_aduan">
						      	<select class="form-control span4" id="status_baru" name="status">
						      		<?php
						      			foreach ($namaStatus as $row)
										{
											echo '<option value="' . $row['id'] . '">'.$row['nama_status'].'</option>';
										}
						      		?>
						      	</select>
						    </td> 
						</tr>
					</table>
      			</div>

			    <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			        <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
			    </div>
      		</form>
        </div>
    </div>
</div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" language="javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
		$(document).ready(function() {
			datatable = $('#data_aduan').DataTable();
			// For demo to fit into DataTables site builder...
			$('#data_aduan')
				.removeClass( 'display' )
				.addClass('table table-striped table-bordered');

			// change namataman
			$('#namataman').on('change', function() {
				var selected = $(this).val() > 0 ? $(this).find(":selected").text() : '';
				datatable
					.column(1)
					.search(selected)
					.draw();
			});
			// change namakategori
			$('#namakategori').on('change', function() {
				var selected = $(this).val() > 0 ? $(this).find(":selected").text() : '';
				datatable
					.column(3)
					.search(selected)
					.draw();
			});
			$('.ubah-status').on('click', function() {
				// get id and data
				id = datatable.row($(this).closest("tr")).index();
				id_aduan = datatable.cell(id, 0).data();
				taman = datatable.cell(id, 1).data();
				deskripsi = datatable.cell(id, 2).data();
				kategori = datatable.cell(id, 3).data();
				waktu = datatable.cell(id, 4).data();
				status = datatable.cell(id, 5).data();

				// set data
				$('#id_aduan').html(id_aduan);
				$('#id_aduan2').val(id_aduan);
				$('#taman').html(taman);
				$('#deskripsi').html(deskripsi);
				$('#kategori').html(kategori);
				$('#waktu').html(waktu);
				$('#status').html(status);
			});
		});
	</script>