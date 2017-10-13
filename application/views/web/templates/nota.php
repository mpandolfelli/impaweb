<div class="container-fluid bg-blanco">
	<div class="container nota">
		
		<div class="row border-nota-title hidden-sm hidden-xs visible-md visible-lg">
			<div class="col-md-1"><img src="<?=base_url();?>uploads/<?=$section->avatar;?>" alt="" class="img-circle" width="80" height="80"></div>
			<div class="col-md-10">
				<h2><?=$section->page_title;?></h2>
				<p class="nota-info">Publicado el <?=$section->registered;?> por  <?=$section->username;?></p>
			</div>
		</div>

		<div class="row border-nota-title hidden-lg hidden-md visible-sm visible-xs">
			
			<div class="col-md-12">
				<h2><?=$section->page_title;?></h2>
				<p class="nota-info" style="margin-top:20px"><img src="<?=base_url();?>uploads/<?=$section->avatar;?>" alt="" class="img-circle" width="30" height="30"> Publicado el <?=$section->registered;?> por  <?=$section->username;?></p>
			</div>
		</div>
		<div class="row breadcrumbs">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="<?=base_url();?>">Inicio</a></li>
				  <li><a href="<?=base_url();?>notas">Notas</a></li>
				  <li class="active"><?=$section->page_title;?></li>
				</ol>
			</div>
		</div>
		
		<? if($section->image != ''){ ?>
			<div class="post-image" style="background-image:url(<?=$section->image;?>)"></div>
		<? } ?>
		<div class="nota-contenido"><?=$section->page_content;?></div>
	</div>


</div>
<div class="container">
	
	<div class="row related-posts">
		<div class="col-md-12"><h2>Últimas novedades</h2></div>
		<?php foreach($related as $post){?>
			<div class="col-md-3 related-post">
				<h4><?=substr($post->name, 0, 28);?>...</h4>
				<? if($post->image != ''){ ?>
					<div class="related-post-image" style="background-image:url(<?=$post->image;?>)"></div>
				<? } ?>
				<div class="related-post-content"><?=substr($post->description, 0, 200);?>...</div>	
				<div class="post-info">
					<a href="<?=$post->url;?>" class="btn-mas" >ver más</a>		
				</div>
			</div>
		<? } ?>
	</div>
</div>

