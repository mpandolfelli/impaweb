<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12"><h3 class="panel-title fix-title">Mi perfil</h3></div>
        </div>   
    </div>

    <div class="panel-body">
        <form method="post" action="" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nombre de usuario</label>
		    <input type="text" class="form-control" id="username" name="username" value="<?=$username;?>">
		  </div>
		 
		  <div class="form-group">
		    <label for="exampleInputFile">Avatar</label>
		    <input type="file" id="userfile" name="userfile[]">
		    <p class="help-block">JPG o PNG</p>
		  </div>
		  
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
     
    </div>
</div>    
