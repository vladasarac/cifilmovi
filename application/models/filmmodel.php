<?php

  class filmmodel extends CI_Model{
    
	//-------------------------------------------------------------------------------------------------
	// kad se klikne button 'Prikazi Sve! poziva film/sve koji poziva ovaj metod(filmmodel/sve)
	function sve($vju, $ime, $zanr, $godina, $godina1, $lokacija, $poznati, $limit, $offset, $sort_by, $sort_order){ // $offset je po difoltu 0 $limit kako kad(za paginaciju)
      // napravi where uslov za upit u bazu
	  $where = 'godina > 1000'; // ako su svi parametri stigli prazni radi upit gde je where godina>1000 posto tako vraca sve filmove
	  if(empty($ime) && empty($zanr) && empty($godina) && empty($godina1) && empty($lokacija) && empty($poznati)){
        $where .= "";
	  }
	  // string escape
	  $ime = $this->db->escape_str($ime);
	  $zanr = $this->db->escape_str($zanr);
	  $godina = $this->db->escape_str($godina);
	  $godina1 = $this->db->escape_str($godina1);
	  $lokacija = $this->db->escape_str($lokacija);
	  $poznati = $this->db->escape_str($poznati);
	  //u zavisnosti od toga koje su varijable pune dodaj AND na pocetni WHERE(godina>1000) 
	  if(!empty($ime)){
	    $where .= " AND ime LIKE '%$ime%'";
	  }
      if(!empty($zanr)){
	    $where .= " AND zanr = '$zanr'";
	  }
	  if(!empty($lokacija)){
	    $where .= " AND lokacija = '$lokacija'";
	  }
	  if(!empty($poznati)){
	    $where .= " AND poznati LIKE '%$poznati%'";
	  }
	  if(!empty($godina) && empty($godina1)){
	    $where .= " AND godina = '$godina'";
	  }
	  if(empty($godina) && !empty($godina1)){
	    $where .= " AND godina <= '$godina1'";
	  }
	  if(!empty($godina) && !empty($godina1)){
	    $where .= " AND godina BETWEEN '$godina' AND '$godina1'";
	  } 
	  if($vju == 'bioskop'){
	    $where .= " AND lokacija = 'HD Veliki'";
	  }
	  
	 // $q = $this->db->query($query)->limit($limit, $offset)->order_by($sort_by, $sort_order);
	 $q = $this->db->select('id, lokacija, ime, godina, poznati, link, zanr')//izvuci podatke iz baze
	               ->from('filmovi')->where($where)->limit($limit, $offset)
				   ->order_by($sort_by, $sort_order);
	  //if($q->get()->num_rows() > 0){
	    $rez['row'] = $q->get()->result();
		//$rez['nista'] = 1;
      //}else{
	    //$rez['nista'] = 2;
	  ///}	  
	  
	  $q1 = $this->db->select('COUNT(*) as count', FALSE)->from('filmovi')->where($where);//izvuci ukupan broj rezultata
	  $tmp = $q1->get()->result();
	  $rez['num_rows'] = $tmp[0]->count;
	  
	  return $rez; //vrati rezultat u kontroler
	}
	
	//-------------------------------------------------------------------------------------------------
	
	// metod za unos filma u bazu, poziva ga metod unos iz kontrolera film.php ako unos u formu iz fajla unos.php prodje validaciju
	function unos(){
	  $novifilm = array( // prikupi podatke koje je korisnik uneo u formu
	    'ime' => $this->input->post('ime'),
		'zanr' => $this->input->post('zanr'),
		'godina' => $this->input->post('godina'),
		'lokacija' => $this->input->post('lokacija'),
		'link' => $this->input->post('link'),
		'poznati' => $this->input->post('poznati')
	  );
	  $ime = $this->db->escape_str($novifilm['ime']);//prvo se radi provera u bazi da li je film vec unet ranije po kolonama ime i godina
	  $godina = $novifilm['godina'];
	  $where = "ime = '$ime' AND godina = '$godina'";
	  $this->db->select('ime, godina');
	  $this->db->from('filmovi');
	  $this->db->where($where);
	  $query = $this->db->get();
	  if($query->num_rows() > 0){ // ako vrati neki red tj vec ima film tog imena iz te godine
	  // podesi rez['vecunet'] da bi kontroler znao da film postoji u bazi i poslao tu poruku u view unos.php
	    $rez['vecunet'] = 'Film je vec unet!'; 
	  }else{ // ako nema tog filma u bazi, unesi ga i vrati kontroleru ime zanr i godinu da posalje u view unos.php za prikaz
	    $insert = $this->db->insert('filmovi', $novifilm);
		$rez['unetfilm'] = $novifilm;
		$rez['unetoime'] = $novifilm['ime'];
		$rez['unetagodina'] = $novifilm['godina'];
		$rez['unetizanr'] = $novifilm['zanr'];
	  }
	  return $rez; // vrati u kontroler $rez array
	}
	
	//-------------------------------------------------------------------------------------------------
	
	function prepravkafilma($id){//nadji film koji treba da bude prepravljen - 
	  $q = $this->db->select('id, lokacija, ime, godina, poznati, link, zanr')// - izvuci podatke iz baze
	               ->from('filmovi')->where('id', $id); // po id-ju koji je stigao iz kontrolera tj pre toga iz view-a
	  $rez['film'] = $q->get()->result_array(); // vrati kontroleru podatke filma za prepravku
	  return $rez;
	}
	function upisprepravke(){//metod koji upisuje nove podatke u bazu
	 $ime = $this->input->post('ime');//primi input iz forme u prepravkaview
	 $zanr = $this->input->post('zanr');
	 $godina = $this->input->post('godina');
	 $lokacija = $this->input->post('lokacija');
	 $link = $this->input->post('link');
	 $poznati = $this->input->post('poznati');
	 $id = $this->input->post('id');
	 $this->db->where('id', $id); // update-uj podatke u bazi po id-ju
     $this->db->update('filmovi', array('ime' => $ime, 'zanr' => $zanr, 'godina' => $godina, 'lokacija' => $lokacija, 'link' => $link, 'poznati' => $poznati)); 
	 
	 $where = "id = $id";//posle upisa novih podataka izvuci iste iz baze da se vrate u kontroler pa u view
	 $q = $this->db->select('id, lokacija, ime, godina, poznati, link, zanr')
	               ->from('filmovi')->where($where);
	 $rez['ispravljen'] = $q->get()->result_array();//vrati nove podatke u kontroler pa dalje u view
	 return $rez;
	}
	
	function brisanjefilma($id){
	  $q = $this->db->delete('filmovi', array('id' => $id)); 
	  /* if($q){
	    return 'Uspesno';
	  }else{
	    return 'Neuspesno';
	  } */
	  if($this->db->affected_rows() > 0){
	    return 'Uspesno';
	  }else{
	    return 'Neuspesno';
	  }
	}
	
	//-----------------------------------------------------------------------------------------------------------------------
	
	
	
	
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  