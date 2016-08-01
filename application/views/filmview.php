<div id="forma">
 <div id="forma1">
  <h3>Pretrazite FIlmove:</h3>
  <!--<form class="form-horizontal" action="sve">-->
   <?php 
     $attributes = array('class' => 'form-horizontal');
     echo form_open('film/sve', $attributes); //otvori formu
	 echo form_hidden('vju', $vju); // kontrolna varijabla za vju
	 ?>
	  
	  <label for="ime" class="col-sm-2 control-label">Ime Filma : </label>
	  <div class="col-sm-10">
	   <input name="ime" type="text" class="form-control" id="ime"><br><br>
	  </div>
	
	
	
	 <!-- <label for="zanr" class="col-sm-2 control-label">Zanr: </label>
	  <div class="col-sm-10">
	   <input name="zanr" type="text" class="form-control" id="zanr"  placeholder="Zanr"><br><br>
	  </div> -->
	  
	  <label for="zanr" class="col-sm-2 control-label">Zanr : </label>
	  <div class="col-sm-10">
	   <select name="zanr">
		  <option value="" selected="selected"></option>
		  <option value="N/A">N/A</option>
		  <option value="Akcija">Akcija</option>
		  <option value="Apokalipsa">Apokalipsa</option>
		  <option value="Avantura">Avantura</option>
		  <option value="Bajka">Bajka</option>
		  <option value="Biografija">Biografija</option>
		  <option value="Crtani">Crtani</option>
		  <option value="Dokumentarac">Dokumentarac</option>
		  <option value="Domaci">Domaci</option>
          <option value="Drama">Drama</option>
		  <option value="Horor">Horor</option>
		  <option value="Istorija">Istorija</option>
		  <option value="Kaubojac">Kaubojac</option>	
		  <option value="Komedija">Komedija</option>
          <option value="Krimi">Krimi</option>
		  <option value="Ljubavni">Ljubavni</option>
		  <option value="Misterija">Misterija</option>	
		  <option value="Mjuzikl">Mjuzikl</option>	
		  <option value="Politika">Politika</option>
		  <option value="Ratni">Ratni</option>
          <option value="SciFi">SciFi</option>          
		  <option value="Triler">Triler</option>		  	  	  	 
        </select><br><br>
	  </div>
	
	
	  <label for="godina" class="col-sm-2 control-label">Godina : </label>
	  <div class="col-sm-10">
	   <input name="godina" type="text" class="form-control" id="godina"><br><br>
	  </div>
	
    
	  <label for="godina1" class="col-sm-2 control-label">Godina Do : </label>
	  <div class="col-sm-10">
	   <input name="godina1" type="text" class="form-control" id="godina1"><br><br>
	  </div>
	
    <?php if($vju != 'bioskop'){ ?>
	<div id="lokacijafilma">
	  <label for="lokacija" class="col-sm-2 control-label">Lokacija : </label>
	  <div class="col-sm-10">
	   <input name="lokacija" type="text" class="form-control" id="lokacija"><br><br>
	  </div>
	</div>
	<?php } ?>
	
	  <label for="poznati" class="col-sm-2 control-label">Poznati : </label>
	  <div class="col-sm-10">
	   <input name="poznati" type="text" class="form-control" id="poznati"><br><br>
	  </div>
	
    <input type="submit" class="btn btn-primary" value="Pretrazi!">
	<?php  echo form_close(); //zatvori formu ?>
  </div>
  <?php 
  //ako je kontroler poslao $data['sve'], posto kad se prvi put ucita nema tog array-a -
    if(isset($sve) && !empty($sve)): // -  dok se ne uradsi neki query pa kontroler vrati $data['filmovi']    
	  echo '<div class="hovertabele">Pronadjeno Filmova: <strong>'.$num_results.'</strong><br>';
	  
      if(isset($ime) && !empty($ime)){ echo ' Ime: <strong>'.$ime.'</strong>';}
	  if(isset($zanr) && !empty($zanr)){ echo ' Zanr: <strong>'.$zanr.'</strong>';}
	  if(isset($godina) && !empty($godina)){ echo ' Godina: <strong>'.$godina.'</strong>';}
	  if(isset($godina1) && !empty($godina1)){ echo ' Godina Do: <strong>'.$godina1.'</strong>';}
	  if(isset($lokacija) && !empty($lokacija)){ echo ' Lokacija: <strong>'.$lokacija.'</strong>';}
	  if(isset($poznati) && !empty($poznati)){ echo ' Poznati: <strong>'.$poznati.'</strong>';} 
	  echo '</div>';
	 /* 
	 );
	 $podatci = http_build_query($podatci1); */
  ?>
    <!--tabela za prikaz rezultata pretrage-->
	<table class="table table-border"><!--headeri tabele-->
	  <tr>
	    <?php 
		  $url_prefix = "film/sve/$vju/$ime/$zanr/$godina/$godina1/$lokacija/$poznati";
		  if($num_results > 1):
		?>
	    <th>Lokacija<a href="<?=site_url("$url_prefix/lokacija/asc")?>"><img src="<?=base_url()?>images/up.png"></a><a href="<?=site_url("$url_prefix/lokacija/desc")?>"><img src="<?=base_url()?>images/down.png"></a></th>
		<th>Ime<a href="<?=site_url("$url_prefix/ime/asc")?>"><img src="<?=base_url()?>images/up.png"></a><a href="<?=site_url("$url_prefix/ime/desc")?>"><img src="<?=base_url()?>images/down.png"></a></th>
        <th>Godina<a href="<?=site_url("$url_prefix/godina/asc")?>"><img src="<?=base_url()?>images/up.png"></a><a href="<?=site_url("$url_prefix/godina/desc")?>"><img src="<?=base_url()?>images/down.png"></a></th>
		<th>Zanr<a href="<?=site_url("$url_prefix/zanr/asc")?>"><img src="<?=base_url()?>images/up.png"></a><a href="<?=site_url("$url_prefix/zanr/desc")?>"><img src="<?=base_url()?>images/down.png"></a></th>
	    <th>Poznati</th>
		<th>Link</th>
		<!-- svaki <th> je link za sortiranje tabele 'asc' ili 'desc' po toj koloni -->
	 <?php //echo anchor("film/sve/$field_name/".(($sort_order=='asc' && $sort_by==$field_name) ? 'desc' : 'asc'),$field_display);?>
	   <!--</th>-->
	  <?php endif; 
	    if($num_results <= 1):
	  ?>
	    <th>Lokacija</th>
		<th>Ime</th>
        <th>Godina</th>
		<th>Zanr</th>
	    <th>Poznati</th>
		<th>Link</th>
	   <?php endif; ?>
	  </tr>
	  <?php foreach($sve as $film): ?><!--redovi tabele-->
		<tr class="tabelarow">
		 <td><?php echo $film->lokacija; ?></td>
		 <td><?php echo $film->ime; ?></td>
		 <td><?php echo $film->godina; ?></td>
		 <td><?php echo $film->zanr; ?></td>
		 <td><?php echo $film->poznati; ?></td>
		 <td>
		 <?php 
		        if($vju == 'filmovicom'){ 
				  echo "<a href='$film->link' target='blank'><img src='".site_url()."images/imdblogo.png'></a>";
		        }
				if($vju == 'prepravke'){
				  $id = $film->id;
				  echo "<a class='prepavke' href='".site_url()."film/prepravkafilma/$id' target='blank'><h5 class='text-warning prepavke'>Prepravi</h5></a>";
				} 
				if($vju == 'bioskop'){
				  $ime = $film->ime;
				  $godina = $film->godina;
				  echo "<a class='prepavke' href='".site_url()."film/bioskop2/$ime/$godina' target='blank'><h5 class='text-warning prepavke'>Gledaj</h5></a>";
				} 
		 ?>
		 </td>
		</tr>
	  <?php endforeach; ?>
	</table>
	
	<?php if(strlen($pagination)): ?>
	  <div id="paginacija">
		Pages: <?php echo $pagination; ?>
	  </div>
	  <?php endif; ?>
	
  <?php endif; ?>
  <?php if(isset($sve) && empty($sve)): //print_r($sve);?>
	  <h1>Vasa Pretraga Nema Rezultata</h1>
	<?php endif; ?>
</div>




































