
<div class="container">

     
      <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
            <li><a href="home">Input Aduan</a></li>
            <li class="active"><a href="aduan">Daftar Aduan</a></li>
          </ul>
        </nav>
      </div>
      
      <div class="col-md-4">
      	<img src="assets/img/aduhay-logo.png" alt="logo" id="logoHome">
	  </div>

      <div class="col-md-8">
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
			            </tr>
			        </thead>
			 
			        <tbody>
			        <?php
			        	foreach ($allAduan as $aduan) { ?>
			            <tr>
			                <td><?php echo $aduan['id']?></td>
			                <td><?php echo $aduan['taman']?></td>
			                <td><?php echo $aduan['deskripsi']?></td>
			                <th><?php echo $aduan['kategori']?></th>
			                <th><?php echo $aduan['waktu']?></th>
			                <td><?php echo $aduan['status']?></td>
			            </tr>			        		
			        <?php } ?>
			        </tbody>
			    </table>
		    </div>
		    <div class="row" id="btnGenerateLap">
		    	<button type="button" class="btn btn-success" value="" data-toggle="modal" data-target="#opsi-laporan-modal">Buat Laporan</button>
		    </div>
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
		    <div class="radio"><label>
		      <input type="radio" value="1" name="optradio">Template 1: Laporan aduan per taman</br><img src="assets/img/temp1.png" id="ss_temp1" alt="temp1">
		    </label></div>
		    <div class="radio"><label>
		      <input type="radio" value="2" name="optradio">Template 2: Laporan aduan berdasarkan status</br><img src="assets/img/temp2.png" id="ss_temp2" alt="temp2">
		    </label></div>
		    <div class="radio"><label>
		      <input type="radio" value="3" name="optradio">Template 3: Laporan aduan berdasarkan kategori aduan</br><img src="assets/img/temp3.png" id="ss_temp3" alt="temp3">
		    </label></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button name="submit" type="submit" class="btn btn-primary">Buat laporan</button>
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
		});
	</script>