
<div class="container">

     
      <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
            <li><a href="input">Input Aduan</a></li>
            <li class="active"><a href="aduan">Daftar Aduan</a></li>
          </ul>
        </nav>
      </div>

      
      <div class="col-md-6">
      	<img src="assets/img/aduhay-logo.png" alt="logo" id="logoHome">
	  </div>

      <div class="col-md-6">
      <div class="jumbotron">
        <h1>Daftar Aduan</h1>
      </div>
      <form>
	    <div class="form-group">
	      	<div class="row">
		      	<select class="form-control span6" id="namataman">
		      		<option>--Pilih nama taman--</option>
		      		<option>Taman Jomblo</option>
		      		<option>Taman Film</option>
		      		<option>Taman Musik</option>
		      	</select>
			</div>
			<div class="row" id="plugin_datatable">
				<table id="data_aduan" class="table table-striped table-bordered" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>No</th>
			                <th>Deskripsi Aduan</th>
			                <th>Kategori</th>
			                <th>Status</th>
			            </tr>
			        </thead>
			 
			        <tbody>
			            <tr>
			                <td>1</td>
			                <td>Sampah berserakan, daun nggak disapu, bau, jelek</td>
			                <th>Kebersihan</th>
			                <td>On progress</td>
			            </tr>
			            <tr>
			                <td>2</td>
			                <td>Toilet mampet</td>
			                <th>Infrastruktur</th>
			                <td>TBC</td>
			            </tr>
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
		    <div class="radio"><label>
		      <input type="radio" name="optradio1">Template 1: Laporan aduan per taman</br><img src="assets/img/temp1.png" id="ss_temp1" alt="temp1">
		    </label></div>
		    <div class="radio"><label>
		      <input type="radio" name="optradio2">Template 2: Laporan aduan berdasarkan status</br><img src="assets/img/temp2.png" id="ss_temp2" alt="temp2">
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
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
	// For demo to fit into DataTables site builder...
		$('#data_aduan')
			.removeClass( 'display' )
			.addClass('table table-striped table-bordered');
	</script>