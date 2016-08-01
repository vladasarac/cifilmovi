<!DOCTYPE html> 
<html> 
<body> 
  
  <script src="<?=base_url()?>bootstrap/js/jquery.js"></script>
  <script src="<?=base_url()?>jw/jwplayer-7.2.2/jwplayer.js"></script>
  <script>jwplayer.key="hcEhyajFb8AW5ESAE/fkznqy/zBDBYDSDIj+og==";</script>
  <div id="imefilma">
    <h3>Film: <?php echo $ime; ?></h3>
  </div>
  <div id="mediaspace1">
  <div id="plejer1" width="850" height="420" controls>
	<video id="plejer1" width="850" height="420" controls>
      <source src="<?php echo base_url()."Film1/".$podfolder."/".$filmfolder[0]; ?>" type="video/mp4">
      <source src="mov_bbb.ogg" type="video/ogg">
    </video>';
  </div>
  </div>
  <script type="text/javascript">
    /* jwplayer('mediaspace1').setup({
	  'flashplayer' : '/jwplayer/player.swf',
	  'controlbar' : 'bottom',
	  'width' : '940',
	  'height' : '360',
      'file' : '<?php echo base_url()."Film1/".$podfolder."/".$filmfolder[0]; ?>',
      'title' : '300' 	  
	}); */
  </script>

</body> 
</html>





















































