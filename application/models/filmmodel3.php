<?php

  class filmmodel3 extends CI_Model{

    public function jq($ime, $zanr, $godina, $godina1, $lokacija, $poznati, $limit, $offset, $sort){
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
	  $q = $this->db->select('id, lokacija, ime, godina, poznati, link, zanr')//izvuci podatke iz baze
	               ->from('filmovi')->where($where)->limit($limit, $offset)->order_by($sort);
	  $rez[0] = $q->get()->result();
	  $rez[2] = $this->db->last_query();
	  $q1 = $this->db->select('COUNT(*) as count', FALSE)->from('filmovi')->where($where);//izvuci ukupan broj rezultata
	  $tmp = $q1->get()->result();
	  $rez[1] = $tmp[0]->count;
	  
	  return $rez;
	}
	
	//---------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------
	
	//metod za unos filma
	function unos(){
	  $novifilm = array( // prikupi podatke koje je korisnik uneo u formu
	    'ime' => $this->input->post('ime'),
		'zanr' => $this->input->post('zanr'),
		'godina' => $this->input->post('godina'),
		'lokacija' => $this->input->post('lokacija'),
		'link' => $this->input->post('link'),
		'poznati' => $this->input->post('poznati')
	  );
	  // proveri da li je film vec upisan u bazu
	  $ime = $this->db->escape_str($novifilm['ime']);
	  $godina = $novifilm['godina'];
	  $where = "ime = '$ime' AND godina = '$godina'";
	  $this->db->select('ime, godina');
	  $this->db->from('filmovi');
	  $this->db->where($where);
	  $query = $this->db->get();
	  if($query->num_rows() > 0){ // ako vrati neki red tj vec ima film tog imena iz te godine
	  // podesi rez na 1 da bi kontroler znao da film postoji u bazi i poslao tu poruku u view
	    $rez = 1; 
	  }else{ // ako nema tog filma u bazi, unesi ga
	    $insert = $this->db->insert('filmovi', $novifilm); // radi insert u bazu
		$upisanoredova = $this->db->affected_rows();//proveri broj upisanih redova
		if($upisanoredova > 0){ // ako je broj upisanoredova > 0 znaci da je upisan film vrati 2 u kontroler
		  $rez = 2;
		}else{ // ako broj upisanoredova nije veci od 0 znaci da je doslo do neke greske sa bazom i vrati 3 kontroleru
		  $rez = 3;
		}
	  }
	  return $rez; // vrati $rez kontroleru (tj 1 ili 2 ili 3)
	}
	
	//---------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------
	
	public function upisprepravke($id, $ime, $zanr, $godina, $lokacija, $poznati, $link){
	  
	  $this->db->where('id', $id); // update-uj podatke u bazi po id-ju
      $this->db->update('filmovi', array(
	                       'ime' => $ime, 
						   'zanr' => $zanr, 
						   'godina' => $godina,
						   'lokacija' => $lokacija, 
						   'link' => $link, 
						   'poznati' => $poznati
						   )); 
	  return $this->db->affected_rows();//koliko redova je promenjeno
	}
	
	//---------------------------------------------------------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------
	
	//
	function brisanjefilma($id){
	  $q = $this->db->delete('filmovi', array('id' => $id));
	  if($this->db->affected_rows() > 0){
	    return 1;
	  }else{
	    return 0;
	  }
	}//KRAJ metoda brisanjefilma()
	
  }	//KRAJ KLASE
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	