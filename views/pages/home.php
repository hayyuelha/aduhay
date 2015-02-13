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
      <form>
	    <div class="form-group">
	      	<div class="row" id="dd_forminput">
		      	<select class="form-control span3" id="namataman">
		      		<option>--Pilih taman--</option>
		      		<option>Taman Jomblo</option>
		      		<option>Taman Film</option>
		      		<option>Taman Musik</option>
		      	</select>
		      	<select class="form-control span2" id="kategori">
		      		<option>--Pilih kategori--</option>
		      		<option>Kebersihan</option>
		      		<option>Keamanan</option>
		      		<option>Infrastruktur</option>
		      	</select>
			</div>
			<div class="row">
				<textarea class="form-control" rows="5" id="deskripsi" placeholder="Deskripsi aduan"></textarea> 
			</div>
			<div class="row" id="btnGrp">
				<button class="btn btn-default span2" value="submit" id="btn_foto">Tautkan Foto</button>	
				<button class="btn btn-success span2" value="submit" id="btn_adukan">Adukan</button>
			</div>
		</div>
      </form>
      </div>
</div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>