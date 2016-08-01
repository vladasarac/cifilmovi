<!DOCTYPE html>
<html lang="en">
<head>
<!--skinuto sa http://stackoverflow.com/questions/16378887/simple-ajax-codeigniter-request radi testiranja-->
<script src="<?=base_url()?>bootstrap/js/jquery.js"></script>
<style type="text/css">
#number {
display: block;
text-align: center;
width: 100px;
height: 30px;
margin: 50px auto;
line-height: 30px;
border: 1px solid #999;
border-radius: 5px;
}
body{
cursor: default;
}
</style>
</head>
<script>
/* function increase(){
var number = parseInt($('#number').html());
url = '<?php echo base_url()?>film/samp_data'
console.log(url);
$.ajax({
  type: 'POST',
  url: '<?php echo base_url()?>film/samp_data',
  data: { increase:number },
  success:function(response){
     alert(url);
     $('#number').html(response);
  }
  });
 } */
</script>
<body>
 <span id="number" onclick="increase()">0</span> 
 
<?php
  //echo $pozicija;
  echo '<br>pozcijarating: '.$pozcijarating;
  //echo '<br>pozicijaposter2: '.$pozicijaposter2;
  //echo '<br>Naslov: '.$naslov;
  echo '<br>Rating: '.$rating;
  echo '<br>PosterLink: '.$poster;
  echo '<br>'.$linkuradnji;
  echo '<br>Radnja: '.$radnja;
  //$imdbarr[0] = $imdb;
  /* echo '<pre>';
  print_r($imdbarr);
  echo '</pre>'; */
  //echo base_url();
?>
</body>
</html>



























