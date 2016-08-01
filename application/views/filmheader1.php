<!DOCTYPE html>
<html>
 <!--ovaj je za verziju bez javascripta-->
  <head>

    <title>Filmovi</title>   
    <meta  charset="UTF-8">
	<link rel="stylesheet" href="<?=base_url()?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>css/style.css">
	
	<script src="<?=base_url()?>bootstrap/js/jquery.js"></script>
    <script src="<?=base_url()?>bootstrap/js/bootstrap.js"></script>
	<script src="<?=base_url()?>js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/flaviusmatis-simplePagination.js-307b5c6/jquery.simplePagination.js"></script>
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>js/flaviusmatis-simplePagination.js-307b5c6/simplePagination.css"/>
    <script src="<?=base_url()?>jw/jwplayer-7.2.2/jwplayer.js"></script>
    <script>jwplayer.key="hcEhyajFb8AW5ESAE/fkznqy/zBDBYDSDIj+og==";</script>
	<script src="<?=base_url()?>js/film1.js">
     //var template = new Template();
	 
    </script>
	<script>
	  $(document).ready (function(){
	  /* var jq = 1;
	  if(jq == 1){
	    window.location="http://localhost/cifilmovi2/film/jq";
	    jq = 0;
	  }*/
	  /* jq = 1; 
	  $.post(url, jq, function(o){
	  alert(o.rezultat);
	    if(o.rezultat == 0){
		  window.location="http://localhost/cifilmovi2/film/jq";
		}
	  }); */
	    //var baseurl = <?=base_url();?>;  //<p>#baseurl je skriveni paragraf koji echo-uje baseurl()
	    /* var url = 'http://localhost/cifilmovi2/film/jq';
		$.get(url); */
	  	   
		$('.link').hover(function(){ // kad se hoveruje nad linkovima u link tabeli -
		  $(this).css('font-size', '18px'); // kad se udje misem povecaj slova na 18px
		  $(this).children().addClass('plavaslova');
		}, function(){
		  $(this).css('font-size', '12px'); // kad se izadje misem vrati slova na 12px
		  $(this).children().removeClass('plavaslova');
		});
		
		$('.sajtlink').hover(function(){ // kad se hoveruje nad linkovima u link tabeli -
		  $(this).addClass('sajtlink1'); // kad se udje misem povecaj slova na 18px
		  $(this).children().addClass('plavaslova'); // dodaj linku koji je dete <li> .sajtlink klasu plavaslova
		}, function(){
		  $(this).removeClass('sajtlink1'); // kad se izadje misem vrati slova na 12px
		  $(this).children().removeClass('plavaslova'); // skini linku koji je dete <li> .sajtlink klasu plavaslova 
		});
		
		$('.tabelarow').hover(function(){
		  $(this).children().addClass('hovertabele');
		}, function(){
		  $(this).children().removeClass('hovertabele');
		});
		
		//instanciraj Template() funkciju koja je u film.js fajlu u njoj je AJAX i ostala sranja...
		var template = new Template();
		
		if($('#linkfilma').is(':visible')){// ako je vidljiv unos za link 
	      $("#linkfilma").hide(); // sakrij u formi input (tj div) za linkfilma
	    }
		
	  });
	</script>
  </head>
  <body>
   <div class="navbar">
    <div class="navbar-inner">
	<div class="container">
	  <div class="jumbotron">
	    <h1 id="naslov"><img src="<?=base_url()?>images/PirateIconvelika.png"> FILMOVI.com</h1>
	  </div>
	  <ul class="nav">
	  <!--ako je varijabla $vju == trenutnoj stranici dodaj linku vjunavigacija klasu da promeni boju texta i pozadine-->
	    <li id="filmovicom" <?php if($vju == 'filmovicom'){ echo "class='sajtlink vjunavigacija'";}else{ echo "class='sajtlink'";} ?>><a href="<?=site_url("film")?>"><img src="<?=base_url()?>images/PirateIconmala.png"> Filmovi.com</a></li>
		<li id="unos" <?php if($vju == 'unos'){ echo "class='sajtlink vjunavigacija'";}else{ echo "class='sajtlink'";} ?>><a href="<?=site_url("film/unosfilma")?>"><img src="<?=base_url()?>images/PirateIconmala.png"> Unos Filmova</a></li>
		<li id="prepravke" <?php if($vju == 'prepravke'){ echo "class='sajtlink vjunavigacija'";}else{ echo "class='sajtlink'";} ?>><a href="<?=site_url("film/prepravke")?>"><img src="<?=base_url()?>images/PirateIconmala.png"> Prepravke</a></li>
		<li id="bioskop" <?php if($vju == 'bioskop'){ echo "class='sajtlink vjunavigacija'";}else{ echo "class='sajtlink'";} ?>><a href="<?=site_url("film/bioskop")?>"><img src="<?=base_url()?>images/PirateIconmala.png"> Bioskop</a></li>
	  </ul>
	</div>
	</div>
   </div>
   
   <div class="navbar linktabela">
    <div class="navbar-inner">
	<div class="container">
	  <ul class="nav">
	    <li class="link"><a href="http://www.imdb.com/" target="blank" title="IMDB"><img src="<?=base_url()?>images/imdblogo.jpg"> <strong>IMDB</strong></a></li>
		<li class="link"><a href="http://www.rottentomatoes.com/" target="blank" title="RT"><img src="<?=base_url()?>images/rottentomatoeslogo.png"> <strong>RT</strong></a></li>
		<li class="link"><a href="https://thepiratebay.se/top/201" target="blank" title="Pirate Bay"><img src="<?=base_url()?>images/piratebay.jpg"> <strong>Pirate Bay</strong></a></li>
		<li class="link"><a href="https://kickass.unblocked.la/" target="blank" title="KickAss"><img src="<?=base_url()?>images/kickass.png"> <strong>Kick Ass</strong></a></li>
	    <li class="link"><a href="http://yify-movie.com/search" target="blank" title="YIFY"><img src="<?=base_url()?>images/yify.png"> <strong>YIFY</strong></a></li>
		<li class="link"><a href="http://extratorrent.cc/" target="blank" title="ExtraTorrent"><img src="<?=base_url()?>images/ETlogo.gif"> <strong>ExtraTorr</strong></a></li>
		<li class="link"><a href="http://rarbg.com/torrents.php?category=movies" target="blank" title="RABG"><img src="<?=base_url()?>images/rabglogo.png"> <strong>RABG</strong></a></li>
		<li class="link"><a href="https://isohunt.to/" target="blank" title="Iso Hunt"><img src="<?=base_url()?>images/isohunt1.png"> <strong>IsoHunt</strong></a></li>
		<li class="link"><a href="https://www.limetorrents.cc/" target="blank" title="Lime Torrents"><img src="<?=base_url()?>images/limelogo.jpg"> <strong>LimeTorr</strong></a></li>
		<li class="link"><a href="http://rs.titlovi.com/" target="blank" title="rs.Titlovi"><img src="<?=base_url()?>images/titlovi.png"> <strong>rs.Titlovi</strong></a></li>	  
	    <li class="link"><a href="http://www.podnapisi.net/" target="blank" title="Podnapisi"><img src="<?=base_url()?>images/podnapisilogo.png"> <strong>Podnapisi</strong></a></li>
	 </ul>
	</div>
	</div>
   </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	