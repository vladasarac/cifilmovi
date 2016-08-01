<div id="forma">
 <div id="forma1">
<?php //echo 'pozdrav iz prepravkaview-a'; 
  /* echo '<pre>';
  print_r($film);
  echo '</pre>';
  echo $film[0]['ime'].'<br>';
  echo $film[0]['id'].'<br>';
  echo $film[0]['lokacija'].'<br>';
  echo $film[0]['zanr'].'<br>'; */
  if(isset($film)):
  echo '<h4>Prepravite Podatke Filma id: '.$film[0]['id'].'</h4>';
  $attributes = array('class' => 'form-horizontal');
  echo form_open('film/upisprepravke', $attributes);
  echo form_hidden('id', $film[0]['id']);
?>
  <label for="ime" class="col-sm-2 control-label">Ime Filma: </label>
	  <div class="col-sm-10">
	   <input name="ime" type="text" class="input-xxlarge" id="ime" value="<?php echo $film[0]['ime']; ?>"><br><br>
	  </div>
  
  <label for="zanr" class="col-sm-2 control-label">Zanr: </label>
	  <div class="col-sm-10">
	   <input name="zanr" type="text" class="input-xxlarge" id="zanr" value="<?php echo $film[0]['zanr']; ?>"><br><br>
	  </div>
	  
  <label for="godina" class="col-sm-2 control-label">Proizveden: </label>
	  <div class="col-sm-10">
	   <input name="godina" type="text" class="input-xxlarge" id="godina" value="<?php echo $film[0]['godina']; ?>"><br><br>
	  </div>
	  
  <label for="lokacija" class="col-sm-2 control-label">Lokacija: </label>
	  <div class="col-sm-10">
	   <input name="lokacija" type="text" class="input-xxlarge" id="lokacija" value="<?php echo $film[0]['lokacija']; ?>"><br><br>
	  </div>
	  
  <label for="poznati" class="col-sm-2 control-label">Poznati: </label>
	  <div class="col-sm-10">
	   <input name="poznati" type="text" class="input-xxlarge" id="poznati" value="<?php echo $film[0]['poznati']; ?>"><br><br>
	  </div>
	  
  <label for="link" class="col-sm-2 control-label">Link: </label>
	  <div class="col-sm-10">
	   <input name="link" type="text" class="input-xxlarge" id="link" value="<?php echo $film[0]['link']; ?>"><br><br>
	  </div>
	  
  <input type="submit" class="btn btn-primary" value="Prepravi Film!">
  <?php echo form_close(); 
          echo form_open('film/brisanjefilma', $attributes);//dugme za brisanje filma
		  echo form_hidden('id', $film[0]['id']);?>
		   <input type="submit" class="btn btn-danger" value="Obrisi     Film!">
  <?php echo form_close();
          endif; ?>
  <?php if(isset($uspeh)): ?>
   <?php  echo $uspeh; ?>
  <?php endif; ?>		  
  <?php if(isset($ispravljen)): ?>
   <?php //echo '<pre>'; print_r($ispravljen); echo '</pre>'; 
           echo '<h3 class="text-info">Film je uspesno prepravljen:</h3>';
		   echo "<p>Ime Filma: <h4 class='text-success'>".$ispravljen[0]['ime']."</h4></p>";
		   echo "<p>Lokacija Filma:  <h4 class='text-success'>".$ispravljen[0]['lokacija']."</h4></p>";
		   echo "<p>Godina Proizvodnje:  <h4 class='text-success'>".$ispravljen[0]['godina']."</h4></p>";
		   echo "<p>Poznati:  <h4 class='text-success'>".$ispravljen[0]['poznati']."</h4></p>";
		   echo "<p>Zanr:  <h4 class='text-success'>".$ispravljen[0]['zanr']."</h4></p>";
		   echo "<p>Link:  <h4 class='text-success'>".$ispravljen[0]['link']."</h4></p>";
   ?>
          <a href="<?=site_url("film/prepravke")?>"><h4><i class="icon-backward"></i> Nazad</h4></a>
  <?php endif; ?>
  <?php if(isset($uspehbrisanje)): ?>
    <?php  echo "<h3 class='text-info'>$uspehbrisanje</h3>"?>
	         <a href="<?=site_url("film/prepravke")?>"><h4><i class="icon-backward"></i> Nazad</h4></a>
  <?php endif; ?>
 </div> 
</div> 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  