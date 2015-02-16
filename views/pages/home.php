<div class="container">

      <div class="masthead">
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="input">Input Aduan</a></li>
            <li><a href="aduan">Daftar Aduan</a></li>
          </ul>
        </nav>
      </div>
      
      <div class="col-md-6">
      	<img src="assets/img/aduhay-logo.png" alt="logo" id="logoHome">
      </div>

      <div class="col-md-6">
      <div class="jumbotron">
        <h1>Input Aduan</h1>
      </div>
      <form method="post" action="home">
	    <div class="form-group">
	      	<div class="row" id="dd_forminput">
		      	<select class="form-control span3" id="namataman" name="namataman">
		      		<option value = "0">--Pilih taman--</option>
		      		<?php
		      			// include 'models/taman.php';
		      			// $taman = new Taman();
		      			foreach ($namaTaman as $row)
						{
							echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
						}
		      		?>
		      	</select>
		      	<select class="form-control span2" id="kategori" name="kategori">
		      		<option value = "0">--Pilih kategori--</option>
		      		<?php
		      			// include 'models/taman.php';
		      			// $taman = new Taman();
		      			foreach ($namaKategori as $row)
						{
							echo '<option value="'.$row['id'].'">'.$row['nama_kategori'].'</option>';
						}
		      		?>
		      	</select>
			</div>
			<div class="row">
				<textarea class="form-control" rows="5" id="deskripsi" name="deskripsi" placeholder="Deskripsi aduan"></textarea> 
			</div>
			<div class="row" id="btnGrp">
				<button class="btn btn-default span2" value="submit" id="btn_foto">Tautkan Foto</button>	
				<button class="btn btn-success span2" name="submit" value="submit" id="btn_adukan">Adukan</button>
			</div>
		</div>
      </form>
      </div>
</div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
