<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-12"><h3 class="panel-title fix-title">Configuración</h3></div>
        </div>   
    </div>

    <div class="panel-body">
        <div>

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#menu" aria-controls="menu" role="tab" data-toggle="tab">Menú</a></li>
		    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
		    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
		    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="menu">
		    	<div class="row box-config">
			    	<div class="col-md-6">
			    		<h4>Páginas del menu</h4>
			    		<span class="help-block">Arrastre para reordenar</span>
				    	<table class="table table-hover">
				    		<thead>
				    			<tr>
				    				<td>Página</td>
				    				<td>Url</td>
				    				<td>Orden</td>
				    				<td>Activar</td>
				    			</tr>
				    		</thead>
				    		<tbody>
				    			<?foreach ($pages as $page) { ?>
				    				<tr class="sortable-item" rel="<?=$page->id;?>" id="<?=$page->id;?>">
					    				<td><?=$page->name;?></td>
					    				<td><?=$page->url;?></td>
					    				<td><?=$page->position;?></td>
					    				<td>
					    					<?if($page->menu == 0){ ?>
					    						<a href="javascript:void(0);" class="menu" data-id="<?=$page->id;?>" data-active="1"><span class="glyphicon glyphicon-ok"></span></a>
					    					<? }else{ ?>
					    						<a href="javascript:void(0);" class="menu" data-id="<?=$page->id;?>" data-active="0"><span class="glyphicon glyphicon-remove"></span></a>
					    					<? } ?>
					    				</td>	
					    			</tr>
				    			<? } ?>
				    		</tbody>
				    	</table>
			    	</div>
		    	</div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="profile">...</div>
		    <div role="tabpanel" class="tab-pane" id="messages">...</div>
		    <div role="tabpanel" class="tab-pane" id="settings">...</div>
		  </div>

		</div>
     
    </div>
</div>    

<script type="text/javascript">
	$(document).ready(function(){
		$('.menu').click(function(){
			var active = $(this).data('active'); 
			var page_id = $(this).data('id'); 

			if(active == 1){
				$(this).find('.glyphicon').removeClass('glyphicon-ok');
				$(this).find('.glyphicon').addClass('glyphicon-remove');
				$(this).data('active', 0); 
			}else{
				$(this).find('.glyphicon').addClass('glyphicon-ok');
				$(this).find('.glyphicon').removeClass('glyphicon-remove');
				$(this).data('active', 1);
			}

			

			$.ajax({
			  type: "POST",
			  url: '<?=base_url();?>admin/activeMenu',
			  dataType: 'json',
			  data: {page_id: page_id, active: active},
			  success: function(data){
			  }
			
			});
			
		});
		$('tbody').sortable({
            axis: 'y',
            update: function (event, ui) {
               
                $.ajax({
                    data: {positions: $(this).sortable('toArray'), table: 'sections'},
                    type: 'POST',
                    url: '<?=base_url();?>admin/updatePosition',
                    success: function(){
                    	//TO DO: pasar todo esto a ajax para no tener que recargar la pagina asi
                        location.reload();
                    }
                });
            }
        });
	});
</script>
