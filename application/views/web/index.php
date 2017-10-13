<div class="container-flud banner-principal">
      <h1>Polo Educativo IMPA</h1>
</div>


<div class="container section">
    <div class="row separador">
          <div class="col-md-6">
            <div class="box-principal box-big">
              <div class="box-img-principal-1 box-img"></div>
              <div class="box-principal-texto">
                <h2>Los profesorados de IMPA</h2>
                <p>Acá podes encontrar información sobre cada profesorado, datos de contacto, plan de carrera, etc. </p>
       			<hr>
              </div>
             
              <div class="box-principal-mas">

                 <div class="box-principal-mas">

                    <div class="pull-left">
                       <a href="<?=base_url();?>profesorados" class="" >Ver más</a>    
                    </div>
                    <div class="pull-right">
                       <a href="<?=base_url();?>profesorados" class="" ><span class="glyphicon glyphicon-chevron-right"></span></a>   
                    </div>

                    </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                 <div class="box-principal box-small">
                    <div class="box-img-principal-2 box-img"></div>
                    <div class="box-principal-texto">
                      <p>Calendario académico. Enterate de todas las novedades</p>
                      <hr>
                    </div>
                    
                    <div class="box-principal-mas">

                      <div class="pull-left">
                         <a href="<?=base_url();?>" class="" >Ver más</a>    
                      </div>
                      <div class="pull-right">
                         <a href="<?=base_url();?>" class="" ><span class="glyphicon glyphicon-chevron-right"></span></a>   
                      </div>

                      </div>
                  </div>
              </div>
               <div class="col-md-6">
                 <div class="box-principal box-rojo box-small">
                    <div class="box-principal-texto">
                      	<h4>Bienvenidos a</h4>
                      	<h3>El polo educativo IMPA</h3>
						<p>El espacio nació desde
						la lucha el trabajo colectivo.
						Exposición de los Es esa nuestra filosofía</p>
                      	<hr>
                    </div>
                   
                    <div class="box-principal-mas">

                      <div class="pull-left">
                         <a href="<?=base_url();?>" style="color:#fff" >Ver más</a>    
                      </div>
                      <div class="pull-right">
                         <a href="<?=base_url();?>" style="color:#fff" ><span class="glyphicon glyphicon-chevron-right"></span></a>   
                      </div>

                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              	<div class="box-principal box-separador box-small">
                    <div class="box-img-principal-3 box-img"></div>
                    <div class="box-principal-texto">
                      <p>Conocé todos los eventos academicos, novedades y noticias del polo educativo IMPA.</p>
                      <hr>
                    </div>
                   
                    <div class="box-principal-mas">
                      <div class="pull-left">
                         <a href="<?=base_url();?>" class="" >Ver más</a>    
                      </div>
                      <div class="pull-right">
                         <a href="<?=base_url();?>" class="" ><span class="glyphicon glyphicon-chevron-right"></span></a>   
                      </div>
                    </div>
                  </div>
                 
              </div>
              
            </div>
          </div>
        </div>
    </div>
 <div class="separador"></div>

<div class="container-fluid bg-blanco">
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
            <div class="pull-left">
               <a href="<?=$post->url;?>" class="" >ver más</a>    
            </div>
            <div class="pull-right">
  					   <a href="<?=$post->url;?>" class="" ><span class="glyphicon glyphicon-chevron-right"></span></a>		
            </div>

  				</div>
  			</div>
  		<? } ?>
  	</div>
  </div>
</div>

<div class="container-fluid bg-gris">

  <div class="container section">
    <div class="row">
      <div class="col-md-12">
        <h2>Inscribite</h2>
        <img src="http://via.placeholder.com/920x150" width="100%"></div>
    </div>
  </div>
</div>
   

<!--
<div class="container">
	<div class="main">
		<h2>Ultimos artículos</h2>

		<div id="posts">
			<?php foreach($posts as $post){ ?>
				<div class="post">
					<h3><?=$post->name;?></h3>
					<? if($post->image != ''){ ?>
						<div class="list-post-image" style="background-image:url(<?=$post->image;?>)"></div>
					<? } ?>
					<p><?=$post->description;?></p>	
					<div class="post-info">
					<p><a href="<?=$post->url;?>" class="btn-mas">ver más</a></p>
					<p><strong>Creado el <?=$post->registered;?></strong></p>		
					</div>
				</div>
			<? } ?>
		</div>

	</div>
</div>

-->