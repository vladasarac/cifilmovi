<div id="forma">
 <div id="forma1">
  <h3>Unesite Podatke Filma:</h3>
  <?php 
     // forma za unos filma
     //if(!isset($uspeh) && empty($uspeh)):
     $attributes = array('class' => 'form-horizontal');
     echo form_open('film/unos', $attributes); ?>
	  
	  <label for="ime" class="col-sm-2 control-label">Ime Filma: </label>
	  <div class="col-sm-10">
	   <input name="ime" type="text" class="form-control" id="ime"><br><br>
	  </div>
		
	  <label for="zanr" class="col-sm-2 control-label">Zanr: </label>
	  <div class="col-sm-10">
	   <select name="zanr">
		  <option value=""></option>
		  <option value="N/A" selected="selected">N/A</option>
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
	
	
	  <label for="godina" class="col-sm-2 control-label">Proizveden: </label>
	  <div class="col-sm-10">
	   <input name="godina" type="text" class="form-control" id="godina"><br><br>
	  </div>
	
    
	  <label for="lokacija" class="col-sm-2 control-label">Lokacija: </label>
	  <div class="col-sm-10">
	   <input name="lokacija" type="text" class="form-control" id="lokacija"><br><br>
	  </div>
	
	  <label for="link" class="col-sm-2 control-label">Link: </label>
	  <div class="col-sm-10">
	   <input name="link" type="text" class="form-control" id="link"><br><br>
	  </div>
	
	  <label for="poznati" class="col-sm-2 control-label">Poznati: </label>
	  <div class="col-sm-10">
	   <input name="poznati" type="text" class="form-control" id="poznati"><br><br>
	  </div>
	
    <input type="submit" class="btn btn-primary" value="Unesi Film!">
	<?php  //echo form_close();
	  // ako je iz film.php/unos stigla varijabla $uspeh u kojoj pise da film nije unet prikazi tu poruku 
	  if(isset($uspeh) && !empty($uspeh) && $uspeh == "Sva Polja Moraju Biti Popunjena, U Polje 'Godina' Mora Se Uneti Broj!"):  ?>
	     <div class="porukazaunos">
	     <h3 class="text-danger1"> <?php echo $uspeh; ?> </h3>
	  <?php endif; ?>   
	  <!-- ako iz film.php/unos stigne varijabla $unetfilm znaci da je film upisan i onda se prikazuju njegovi podatci -->
	  <?php if(isset($unetfilm)): ?>
		  <div class="uspesnounet">
	       <h3 class="text-info"><?php echo $unetfilm; ?></h3>
		   <h4 class="text-info"><i>Ime Filma: </i><?php echo $unetoime; ?>, <i>Godina: </i><?php echo $unetagodina; ?>
		      , <i>Zanr: </i><?php echo $unetizanr;  ?></h4>		
          </div>			  
	  <?php endif; ?>
	  <!-- ako iz film.php/unos stigne varijabla $vecunet znaci da je film vec u bazi i prikazi tu poruku -->
	  <?php if(isset($vecunet)): ?>
	    <div class="vecunet">
	     <h3 class="text-danger1"><?php echo $vecunet; ?></h3>
		</div>
	  <?php endif; ?>
	  <?php  echo form_close(); // zatvori formu ?>
    </div>
	</div>
</div>



































