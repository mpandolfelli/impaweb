<div class="container-flud banner-principal">
      <h1><?=$section->page_title;?></h1>
</div>
<? if($section->image != ''){ ?>
	<div class="post-image" style="background-image:url(<?=$section->image;?>)"></div>
<? } ?>
<div><?=$section->page_content;?></div>


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

