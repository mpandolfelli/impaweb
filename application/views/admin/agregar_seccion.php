<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	tinymce.init({
		relative_urls: false,
		  selector: '#wishiwi',
		  height: 500,
		  
		   image_caption: true,
		   file_browser_callback_types: 'image',
		   automatic_uploads: false,
		    images_upload_url: '<?=base_url();?>admin/uploadImage',
		    
    
  plugins: [
        "advlist autolink lists link image charmap print preview anchor image paste",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code",
  imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
  content_css: [
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
	
</script>
<?php echo add_jscript('jquery.multi-select');?>   
<?php echo add_style('multi-select');?>  
<?php echo add_style('edit');?>
<div class="panel panel-default">
	<div class="panel-heading">
	<div class="row">
		<div class="col-md-10"><h3 class="panel-title">Agregar Página</h3></div>
		<div class="col-md-2 text-right"><a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-default">Volver</a></div>
	</div>
	  
	  
	</div>
	<div class="panel-body">
		<!-- aca contenido de la seccion-->
		<form method="post" action="" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12"><h4>Detalles de la sección</h4>
						<hr>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" id="nombre" name="name" placeholder="Name" required > 
						</div> 						  
					</div>
					<div class="col-md-6">
					<label for=""></label>
						<div class="alert alert-warning" role="alert">El título sera usado como Browser title</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4>Copete</h4>
						
						<textarea class="form-control" name="description"></textarea>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4>Contenido</h4>
						
						<textarea name="text" style="min-height:400px;" id="wishiwi"></textarea>
					</div>
				</div>
				
				 
				  
			
			</div>
			<div class="col-md-3 admin-actions">
				<h4>Template</h4>
				<hr>
				<div class="form-group">
				    <label for="template">Tipo de publicación</label>
				    <select class="form-control" name="template" required>
					    <? foreach ($templates as $template) {?>
					    	<option value="<?=$template->id?>"><?=$template->name?></option>	
					   	<? } ?>
				   	</select>
			  	</div>

			  	<h4>Publicación</h4>
				<hr>
				<div class="form-group">
				    <label for="template">Seleccione</label>
				    <select class="form-control" name="status" required>
					    
					    	<option value="1">Borrador</option>	
					    	<option value="2">Publicar</option>	
					   	
				   	</select>
			  	</div>

			  	<h4>Imagen destacada</h4>
				<hr>
				<div style="margin-bottom:10px;">
					<img src="http://via.placeholder.com/350x150" id="preview-image" class="img-thumbnail add-image" data-toggle="tooltip" data-placement="bottom" title="Click para elegir">
					<input type="hidden" id="preview-image-input" name="preview-image-input" />
				</div>
				
				
				
			</div>
		</div>
		<div class="row" style="margin-top:30px;">
			<div class="col-md-12">
				<button type="submit" class="btn btn-default">Guardar</button>
			</div>
		</div>
	</form>
		<!-- / fin contenido -->
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Elija una imagen</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="images-content"></div>
      	</div>
       
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
	$(document).ready(function(){
		$('.add-image').click(function(){
			$.ajax({
			  url: '<?=base_url();?>admin/getMedia',
			  method: 'get',
			  dataType: 'json',
			  success: function(data){
			  	var c = 0;
			  	$('.images-content').html('');
			  	data.forEach(function(element) {
				     $('.images-content').append('<div class="col-md-3"><div class="select-img" data-img="<?=base_url();?>uploads/'+data[c].file+'" style="background-image:url(<?=base_url();?>uploads/'+data[c].file+');"></div></div>'); 
				     c++;
				});
				
				
			  }
			});
			$('.modal').modal();
		});

		$('.modal-body').on('click', '.select-img', function(){
			var image = $(this).data('img');
			$('#preview-image').attr('src', image);
			$('#preview-image-input').val(image);
			$('.modal').modal('hide');
		});
	});
</script>