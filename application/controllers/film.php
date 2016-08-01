<?php

//

  class film extends CI_Controller{
    
	public function __construct()
    {
        parent::__construct();
		//$this->output->enable_profiler(TRUE);
    }
	//-------------------------------------------------------------------------------------------------
	
	function index(){
	  $data['vju'] = 'filmovicom';//varijabla za kontrolu view-a
	  $this->load->view('filmheader', $data);
	  $this->load->view('filmview2');
	  $this->load->view('footer');
	}
	function index1(){
	  $data['vju'] = 'filmovicom';//varijabla za kontrolu view-a
	  $this->load->view('filmheader1', $data);
	  $this->load->view('filmview');
	}
	
	//-------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------------------

	function sve($vju = 'filmovicom', $ime = '', $zanr = '', $godina = '', $godina1 = '', $lokacija = '', $poznati = '', $sort_by = 'ime', $sort_order = 'asc', $offset = 0){ // poziva se kad se klikne button 'Prikazi Sve!'
	  $limit = 150; // limit za paginaciju (rezultata po str)
	  $this->load->model('filmmodel'); // ucitaj model
	  // kad se submituje forma za pretragu filmova ovako popuni varijable, ako je get metod (sortiranje i paginacija) onda ih pun po difoltu 
	  if($this->input->server('REQUEST_METHOD') == 'POST'){ 
		  $ime = $this->input->post('ime');
		  $zanr = $this->input->post('zanr');
		  $godina = $this->input->post('godina');
		  $godina1 = $this->input->post('godina1');
		  $lokacija = $this->input->post('lokacija');	  
		  $poznati = $this->input->post('poznati');
		  $vju = $this->input->post('vju');
		  $provera = 'stigo POST';
        
	  }
	  
	  $offset = $this->uri->segment(12);
	  $result = $this->filmmodel->sve($vju, $ime, $zanr, $godina, $godina1, $lokacija, $poznati, $limit, $offset, $sort_by, $sort_order);
	  
	  if(empty($ime)){ $ime = 0; }
	  if(empty($zanr)){ $zanr = 0; }
	  if(empty($godina)){ $godina = 0; }
	  if(empty($godina1)){ $godina1 = 0; }
      if(empty($lokacija)){ $lokacija = 0; }
	  if(empty($poznati)){ $poznati = 0; }
	 //$provera = 'stigo GET';
	  $data['vju'] = $vju;//varijabla za kontrolu view-a
	  $data['ime'] = $ime;
	  $data['zanr'] = $zanr;
	  $data['godina'] = $godina;
	  $data['godina1'] = $godina1;
	  $data['lokacija'] = $lokacija;
	  $data['poznati'] = $poznati;
	  $data['sort_by'] = $sort_by; 
	  //$data['provera'] = $provera;
	  
	  // pozovi metod sve iz modela i vraceno(select * from filmovi i broji count * zbog paginacije) ubaci u $result
	  //$result = $this->filmmodel->sve($ime, $zanr, $godina, $godina1, $lokacija, $poznati, $limit, $offset, $sort_by, $sort_order);
	  //$sort_by = $this->input->get('sort');
	  
	  $data['sort_order'] = $sort_order;
	  
	  $data['sve'] = $result['row']; // redovi sa podatcima iz baze
	  $data['num_results'] = $result['num_rows']; // count * za konacan broj rezultata za paginaciju $config['total_rows']
	  //$data['nista'] = $result['nista'];
	  $this->load->library('uri');
	  $this->load->library('pagination');
	  $config = array(); // array za konfiguraciju paginacije, obavezan
	  $config['base_url'] = site_url("film/sve/$vju/$ime/$zanr/$godina/$godina1/$lokacija/$poznati/$sort_by/$sort_order");
	  $config['total_rows'] = $data['num_results'];
	  $config['per_page'] = $limit;
	  $config['uri_segment'] = 12;  
	  $config['num_links'] = 20;
      // linkovi za paginaciju su u div-u pagination u kom je <ul> 	  
                $config['full_tag_open'] = '<div class="pagination"><ul>';
                $config['full_tag_close'] = '</ul></div>';  
                $config['prev_link'] = FALSE;
                $config['next_link'] = FALSE;
                //$config['next_tag_open'] = '<div>';
                //$config['next_tag_close'] = '</div>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';					  
	  //$config['anchor_class'] = 'class="pagination"'; // dodaj pagination linkovima klasu paginacijaklasa
	  $this->pagination->initialize($config);
	  $data['pagination'] = $this->pagination->create_links();
	  // opet ucitaj header i viev filmview i posalji mu $data array
	  $this->load->view('filmheader1', $data);
	  $this->load->view('filmview', $data);
	}
	
	//-------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------------------
	
	function unosfilma(){//kad se klikne link u navigaciji ucitaj view unos.php
	  $data['vju'] = 'unos';// varijabla za kontrolu view-a
	  $this->load->view('filmheader1', $data);
	  $this->load->view('unos', $data);
	}
	function unos(){ // kad se klikne dugme u formi za unos filma u unos.php poziva se ovaj metod
	  //$this->load->view('filmheader');
	  //$this->load->view('unos');
	  $data['vju'] = 'unos';// varijabla za kontrolu view-a
	  $this->load->library('form_validation');//ucitaj library za validaciju
	  $this->form_validation->set_rules('ime', 'Ime', 'trim|required');//pravila za validaciju po poljima
	  $this->form_validation->set_rules('zanr', 'Zanr', 'trim|required');
	  $this->form_validation->set_rules('godina', 'Godina', 'trim|required|numeric');
	  $this->form_validation->set_rules('lokacija', 'Lokacija', 'trim|required');
	  $this->form_validation->set_rules('poznati', 'Poznati', 'trim|required');
	  if($this->form_validation->run() == FALSE){ // ako validacija ne prodje -
	     $data['uspeh'] = "Sva Polja Moraju Biti Popunjena, U Polje 'Godina' Mora Se Uneti Broj!"; // -posalji ovu poruku u view unos.php
		 $this->load->view('filmheader1', $data);
	     $this->load->view('unos', $data);
	  }else{ // ako validacija prodje
	     $this->load->model('filmmodel');//ucitaj model
		 $unos = $this->filmmodel->unos(); // pozovi unos metod modela filmmodel.php koji sam radi input iz post-a i upis u bazu
	     $data['uspeh'] = 'Uspesna Validacija'; //
		 if(isset($unos['vecunet'])){ // ako model vrati da je film vec u bazi 
		   $data['vecunet'] = 'Film je vec unet!'; // napravi poruku za view
		 }
		 if(isset($unos['unetfilm'])){ // ako model vrati poruku da je film unet
		   $data['unetfilm'] = 'Film je uspesno unet!'; // vrati ove podatke view-u(poruku, ime, zanr i godinu)
		   $data['unetoime'] = $unos['unetoime'];
		   $data['unetizanr'] = $unos['unetizanr'];
		   $data['unetagodina'] = $unos['unetagodina'];
		 }
		 $this->load->view('filmheader1', $data); // ucitaj view i posalji mu $data array sa podatcima za prikaz
	     $this->load->view('unos', $data);
	  }
	}
	
	//-------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------------------
	
	// metodi za prepravke i brisanje
	function prepravke(){
	  $data['vju'] = 'prepravke';// varijabla koja kontrolise view
	  $this->load->view('filmheader1', $data);
	  $this->load->view('filmview');
	}
	//-------------------------------------------------------------------------------------------------
	//metod se poziva kad se klikne link 'prepravi' u tabeli posle pretrage filmova
	function prepravkafilma($id = 0){
	  if(!isset($id) || $id == 0){
	    $data['vju'] = 'prepravke';// varijabla koja kontrolise view
	    $this->load->view('filmheader1', $data);
	    $this->load->view('filmview');
	  }else{
	    $data['vju'] = 'prepravke';// varijabla koja kontrolise view
	    $this->load->model('filmmodel');//ucitaj model
	    $result = $this->filmmodel->prepravkafilma($id);//metod modela koji vadi podatke iz baze filma koji treba prepraviti
	    $data['film'] = $result['film']; // u ovom array-u su podatci koji se salju u view prepravkaview
	    $this->load->view('filmheader1', $data); // posalji u view podatke filma i $data['view']
	    $this->load->view('prepravkaview', $data);
	  }
	}
	//-------------------------------------------------------------------------------------------------
	function upisprepravke(){//ovaj metod poziva prepravkaview kad se submit-uje forma za prepravljanje filma
	  $data['vju'] = 'prepravke';// varijabla koja kontrolise view
	  $this->load->model('filmmodel');//ucitaj model
	  $this->load->library('form_validation');//ucitaj library za validaciju
	  $this->form_validation->set_rules('ime', 'Ime', 'trim|required');//pravila za validaciju po poljima
	  $this->form_validation->set_rules('zanr', 'Zanr', 'trim|required');
	  $this->form_validation->set_rules('godina', 'Godina', 'trim|required|numeric');
	  $this->form_validation->set_rules('lokacija', 'Lokacija', 'trim|required');
	  $this->form_validation->set_rules('poznati', 'Poznati', 'trim|required');
	  if($this->form_validation->run() == FALSE){ // ako validacija ne prodje -
	     $data['uspeh'] = 'Sva Polja Moraju Biti Popunjena!!!'; // -posalji ovu poruku u view prepravkaview.php
		 $this->load->view('filmheader1', $data);
	     $this->load->view('prepravkaview', $data);
	  }else{
	    $this->load->model('filmmodel');//ucitaj model
	    $result = $this->filmmodel->upisprepravke();//metod modela koji upisuje u bazu prepravljeni film i vraca podatke koje je uneo
		$data['ispravljen'] = $result['ispravljen'];//ovde su novi upisani podatci koji se vracaju u view
		$this->load->view('filmheader1', $data);//ucitaj opetview
	    $this->load->view('prepravkaview', $data);
	  }
	}
	//-------------------------------------------------------------------------------------------------
	function brisanjefilma(){ // metod za brisanje filma
	  $id = $this->input->post('id');
	  $this->load->model('filmmodel');
	  $result = $this->filmmodel->brisanjefilma($id);
	  $data['vju'] = 'prepravke';// varijabla koja kontrolise view
	  if($result == 'Uspesno'){
	    $data['uspehbrisanje'] = 'Film je uspesno obrisan iz baze podataka!!!';
	  }else{
	    $data['uspehbrisanje'] = 'Doslo je do problema, Film nije obrisan iz baze podataka!!!';
	  }
	  $this->load->view('filmheader1', $data);//ucitaj view
	  $this->load->view('prepravkaview', $data);
	}
	//-------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------------------
	
	function bioskop(){
	  $data['vju'] = 'bioskop';// varijabla koja kontrolise view
	  $this->load->view('filmheader1', $data);
	  $this->load->view('filmview');
	}
	function bioskop2($ime, $godina){
	  $data['vju'] = 'bioskop';// varijabla koja kontrolise view
	  $ime = urldecode($ime);	  
	  $this->load->helper('directory');
	 // $folder = base_url()."Film1/" . $ime . " (" . $godina . ")";
	  $folder = "C:/xampp/htdocs/cifilmovi/Film1/" . $ime . " (" . $godina . ")";
	  $data['ime'] = $ime;
	  $data['filmfolder'] = directory_map($folder, 1);
	  $data['folder'] = $folder;
	  $data['podfolder'] = $ime . " (" . $godina . ")";
	  $this->load->view('filmheader1', $data);
	  $this->load->view('bioskopview2', $data);
	}
	//-------------------------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------------------
	//jQuery varijanta sajta
	function jq(){
	  $jq = $this->input->post('jq');
	  if($jq == 1){ 
	    $data['vju'] = 'filmovicom';//varijabla za kontrolu view-a
	    $this->load->view('filmheader', $data);
	    $this->load->view('filmview2');
	    $this->load->view('footer');
	    $result['rezultat'] = 0;
		$this->output->set_output(json_encode($result));
	  } 
	}//KRAJ metoda jq()
	
	function jqsve($ime = '', $zanr = '', $godina = '', $godina1 = '', $lokacija = '', $poznati = '', $limit = '', $offset = '', $sort = ''){
	  $this->load->model('filmmodel3'); // ucitaj model
	  //$data['vju'] = 'filmovicom';
	  $ime = $this->input->post('ime');
	  $zanr = $this->input->post('zanr');
	  $godina = $this->input->post('godina');
	  $godina1 = $this->input->post('godina1');
	  $lokacija = $this->input->post('lokacija');	  
	  $poznati = $this->input->post('poznati');
	  $limit = $this->input->post('limit');
	  $offset = $this->input->post('offset');
	  $sort = $this->input->post('sort');
	  if($sort == ''){
	    $sort = 'id asc';
	  }

	  $result = $this->filmmodel3->jq($ime, $zanr, $godina, $godina1, $lokacija, $poznati, $limit, $offset, $sort);
	  $this->output->set_output(json_encode($result)); // vrati metodu u film.js koji je slao ajax odgovor u json formatu
	}//KRAJ metoda jqsve()
	
	//-------------------------------------------------------------------------------------------------

	//metod za unos filma u bazu
	function unosjq(){
	  $this->load->model('filmmodel3');//ucitaj model
	  $this->load->library('form_validation');//ucitaj library za validaciju
	  $this->form_validation->set_error_delimiters('<p class="lead text-error text-center">', '</p>'); // podesi prikaz errora
	  $this->form_validation->set_rules('ime', 'Ime', 'trim|callback_input_check');//dole su funkcije (input_check($str) i godina_check($str)) koje rade validaciju
	  $this->form_validation->set_rules('zanr', 'Zanr', 'trim|callback_input_check');
	  $this->form_validation->set_rules('godina', 'Godina', 'trim|callback_godina_check');
	  $this->form_validation->set_rules('lokacija', 'Lokacija', 'trim|callback_input_check');
	  $this->form_validation->set_rules('poznati', 'Poznati', 'trim|callback_input_check');
	  if($this->form_validation->run() == FALSE){ // ako validacija ne prodje -
		 $result = array();
	     $result['rezultat'] = 0; // ako ne prodje validacija $result[0] je 0 ako prodje onda je 1
         $result['errors'] =  validation_errors();		
		 $this->output->set_output(json_encode($result)); // vrati metodu u film.js koji je slao ajax odgovor u json formatu
	  }else{ // ako validacija prodje
		$result = array(); 
		// model vraca 1 ako je film istog imena i godine proizvodnje vec u bazi, 2 ako uspesno uradi unos i 3 ako dodje do nekog problema pa nista ne upise u bazu 
		$result['rezultat'] = $this->filmmodel3->unos();
		$this->output->set_output(json_encode($result)); // vrati metodu u film.js koji je slao ajax odgovor u json formatu
	  }	  
	}//KRAJ metoda unos()
	//callback funkcije za validaciju forme (pogledaj - file:///C:/xampp/htdocs/cifilmovi2/user_guide/libraries/form_validation.html#callbacks)
	public function input_check($str){
	  if($str == ''){
		$this->form_validation->set_message('input_check', 'Polje "%s" Mora Biti Popunjeno!');
		return FALSE;
	  }else{
		return TRUE;
	  }
	}
	public function godina_check($str){
	  if($str == ''){
		$this->form_validation->set_message('godina_check', 'Polje "%s" Mora Biti Popunjeno!');
		return FALSE;
	  }else if((is_numeric($str)) == false){
	    $this->form_validation->set_message('godina_check', 'U Polje "%s" Mora Se Uneti Broj!');
		return FALSE;
	  }else{
		return TRUE;
	  }
	}
    //kraj callback funkcija

	
	//-------------------------------------------------------------------------------------------------
	
	// metod koji se koristi da sa IMDB-a izvuce podatke(rating, poster i radnju) odredjenog filma kom je u filmovi.com kliknut IMDB link
	function imdbdata(){
	  $link = $this->input->post('link'); // link za film koji je stigao AJAX-om
	  $imdbpage = file_get_contents($link); // svuci celu IMDB stranicu filma
	  $pozcijarating = strpos($imdbpage, 'itemprop="ratingValue">');//uzmi rating sa imdb strane koji zauzima 3 karaktera posle ovog stringa: itemprop="ratingValue">
	  $rating = substr($imdbpage, $pozcijarating+23, 3);
	  $pozicijaposter = strpos($imdbpage, '<div class="poster">'); // pocetak postera
	  if($pozicijaposter){
	    $pozicijaposter2 = strpos($imdbpage, '<div class="slate">'); // ako postoji div class="slate"(posto u nekim filmovima postoji u nekim ne)
	    if($pozicijaposter2 == ''){ // ako ne postoji div class="slate" onda je iza diva sa posterom div class="plot_summary_wrapper"
	      $pozicijaposter2 = strpos($imdbpage, '<div class="plot_summary_wrapper">');
	    } 
	    $do = $pozicijaposter2 - $pozicijaposter; // napravi drugi argument za substr tako sto oduzmes poziciju tj pocetak diva class="poster" od pozicije2 tj pozicije div-a koji dolazi posle div-a class="poster"
	    $poster = substr($imdbpage, $pozicijaposter, $do);
	  }else{ // ako na stranici ne postoji div class="poster" znaci da nema postera
	    $poster = 'Nije Dostupno!';
	  }
	  $pozicijaradnja = strpos($imdbpage, '<div class="summary_text" itemprop="description">'); // pocetak div-a koji prikazuje sazetak radnje filma 
	  $pozicijaradnja2 = strpos($imdbpage, '<div class="credit_summary_item">'); // kraj div-a koji prikazuje sazetak radnje filma 
	  $do = $pozicijaradnja2 - $pozicijaradnja;
	  $radnja = substr($imdbpage, $pozicijaradnja, $do);
	  if(strpos($radnja, '<a href="/title/')){ // obicno domaci filmovi imaju ovaj link koji vodi ka celom summary-ju radnje pa ga ovde odsecam
	    $linkuradnji = strpos($radnja, '<a href="/title/');
		$do = $linkuradnji - $radnja;
	    $radnja = substr($radnja, 49, $do);
      }
	  $result = array();
	  $result['rating'] = $rating;
	  $result['poster'] = $poster;
	  $result['radnja'] = $radnja;
	  $this->output->set_output(json_encode($result)); // vrati u film1.js podatke(rating, poster, radnja)
	  
	}//KRAJ metoda imdbdata()
	
	//-------------------------------------------------------------------------------------------------
	
	function upisprepravkejq(){
	  // kad se u formi za prepravku filma klikne #prepravifilmbutton hendler iz film.js koji hendluje taj button salje ovde podatke iz forme na validaciju i dalju obradu
	  $this->load->model('filmmodel3');//ucitaj model
	  $this->load->library('form_validation');//ucitaj library za validaciju
	  $this->form_validation->set_message('numeric', 'U Polje "Godina" Mora Se Uneti Broj');// podesi error msg-e
	  $this->form_validation->set_message('required', 'Sva Polja Moraju Biti Popunjena!!!');
	  $this->form_validation->set_error_delimiters('<p class="lead text-error text-center">', '</p>'); // podesi prikaz errora
	  $this->form_validation->set_rules('ime', 'Ime', 'trim|required');//pravila za validaciju po poljima
	  $this->form_validation->set_rules('zanr', 'Zanr', 'trim|required');
	  $this->form_validation->set_rules('godina', 'Godina', 'trim|required|numeric');
	  $this->form_validation->set_rules('lokacija', 'Lokacija', 'trim|required');
	  $this->form_validation->set_rules('poznati', 'Poznati', 'trim|required');
	  $this->form_validation->set_rules('link', 'Link', 'trim|required');
	  if($this->form_validation->run() == FALSE){ // ako validacija ne prodje -
	    $result = array();
	    $result['rezultat'] = 0; // ako ne prodje validacija $result[0] je 0 ako prodje onda je 1
        $result['errors'] =  validation_errors();		
		$this->output->set_output(json_encode($result));
	  }else{ // ako prodje validacija napuni varijable podatcima iz #_POST-a i salji u model(filmmodel2) da radi update baze po id koloni
	    $id = $this->input->post('id');
		$ime = $this->input->post('ime');
		$zanr = $this->input->post('zanr');
		$godina = $this->input->post('godina');
	    $lokacija = $this->input->post('lokacija');	  
	    $poznati = $this->input->post('poznati');
		$link = $this->input->post('link');
	    $prepravka = $this->filmmodel3->upisprepravke($id, $ime, $zanr, $godina, $lokacija, $poznati, $link); 
        if($prepravka){	//ako uspe unos	
		  $result['rezultat'] = 1;
		  $this->output->set_output(json_encode($result));
		}else if($prepravka == 0){ //ako ne uspe unos tj user nista ne promeni pa nista novo ne bude upisano u bazu
		  $result['rezultat'] = 2;
		  $this->output->set_output(json_encode($result));
		}	
	  }
	}//KRAJ metoda upisprepravkejq()
	
	//-------------------------------------------------------------------------------------------------
	
	//metod za brisanje filma jQuery
	function brisanjefilmajq(){
	  $id = $this->input->post('id');
	  $this->load->model('filmmodel3');
	  $result = $this->filmmodel3->brisanjefilma($id);
	  if($result){
	    $brisanje['rezultat'] = 1;
		$this->output->set_output(json_encode($brisanje));
	  }else{
	    $brisanje['rezultat'] = 0;
		$this->output->set_output(json_encode($brisanje));
	  }
	}//KRAJ metoda brisanjefilmajq()
	
	//-------------------------------------------------------------------------------------------------
	
    function jqbioskop(){
	  $ime = $this->input->post('ime');
      $godina = $this->input->post('godina');	  
	  $this->load->helper('directory');
	  $folder = "C:/xampp/htdocs/cifilmovi2/Film1/" . $ime . " (" . $godina . ")";
	  $result = array();
	  $result['ime'] = $ime;
	  $result['filmfolder'] = directory_map($folder, 1);
	  $result['folder'] = $folder;
	  $result['podfolder'] = $ime . " (" . $godina . ")";
	  $this->output->set_output(json_encode($result));
	}
	
	
	

	
	
	
  }//KRAJ KLASE
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  