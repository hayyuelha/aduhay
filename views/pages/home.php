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
			    <li class="active"><a href="home">Input Aduan</a></li>
		        <li><a href="aduan">Daftar Aduan</a></li>
	    	</ul>
	    </div><!--/.nav-collapse -->
	</div>
</nav>

<div class="container" id="bg">
    <div class="col-md-6 col-md-offset-3">
        <div class="jumbotron">
        	<h1>Input Aduan</h1>
        </div>

        <form method="post" action="home">
		    <div class="form-group">
		      	<div class="row" id="dd_forminput">
			      	<select class="form-control span3" id="namataman" name="namataman">
			      		<option value = "0">--Pilih taman--</option>
			      		<?php
			      			foreach ($namaTaman as $row)
							{
								echo '<option value="'.$row['id'].'">'.$row['nama'].'</option>';
							}
			      		?>
			      	</select>
			      	<select class="form-control span2" id="kategori" name="kategori">
			      		<option value = "0">--Pilih kategori--</option>
			      		<?php
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
					<button class="btn btn-success span2" name="submit" value="submit" id="btn_adukan">Adukan</button>
				</div>
			</div>
        </form>
    </div>
</div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>