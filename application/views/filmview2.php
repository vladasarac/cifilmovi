<div id="forma">
 <div id="forma1">
  <h3 id="h3id">Pretrazite Filmove</h3>
  <!--<form class="form-horizontal" action="sve">-->
   	<?php
      echo '<p id="baseurl" hidden>'.base_url().'</p>';
    ?>
	
   <?php 
     $attributes = array('class' => 'form-horizontal', 'id' => 'formapretraga');
     echo form_open('film/jqsve', $attributes); //otvori formu
	 echo form_hidden('vju', $vju); // kontrolna varijabla za vju
	 ?>
	  <div class="control-group">
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
	   <select name="zanr" id="zanr">
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
	
      <div id="godina1filma">
	  <label for="godina1" class="col-sm-2 control-label">Godina Do : </label>
	  <div class="col-sm-10">
	   <input name="godina1" type="text" class="form-control" id="godina1"><br><br>
	  </div>
	  </div>
	
    <?php if($vju != 'bioskop'){ ?>
	<div id="lokacijafilma">
	  <label for="lokacija" class="col-sm-2 control-label">Lokacija : </label>
	  <div class="col-sm-10">
	   <input name="lokacija" type="text" class="form-control" id="lokacija"><br><br>
	  </div>
	</div>
	<?php } ?>
	
	<div id="linkfilma">
	  <label for="link" class="col-sm-2 control-label">Link: </label>
	  <div class="col-sm-10">
	   <input name="link" type="text" class="form-control" id="link"><br><br>
	  </div>
	</div>
	
	  <label for="poznati" class="col-sm-2 control-label">Poznati : </label>
	  <div class="col-sm-10">
	   <input name="poznati" type="text" class="form-control" id="poznati"><br><br>
	  </div>
	
    <input type="submit" id="pretrazi" class="btn btn-primary" value="Pretrazi!">
    </div>
	<?php  echo form_close(); //zatvori formu ?>
  </div>
</div>
<div>
<?php
if(isset($ime)){
  echo '<p>'.$ime.'</p><br>';
  echo '<p>'.$zanr.'</p><br>';
}
?>
<div>
<div id="output">

  
</div>
<br><div id="paginacijadiv" class="light-theme"></div><br><br>
</div><!--kraj diva sve-->



































