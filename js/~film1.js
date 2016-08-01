var Template = function(){
  
  //kad se u navigaciji klikne link Filmovi.com
  $('#filmovicom').on('click', function(e){
    e.preventDefault();
	$('#unesi').unbind('click', false);// posto kad se u unosu klikne unesi i ako dodje do error-a unbind-uje se klik na ovo isto dugme pa se sad za svaki slucaj bind-uje opet
    $('.vjunavigacija').removeClass('vjunavigacija'); // trenutno aktivnom linku tj onom koji ima klasu vjunavigacija skini mu je
	$(this).addClass('vjunavigacija'); // i dodaj klasu vjunavigacija linku filmovicom
	$("input[name='vju']").val('filmovicom'); // u formi promeni input hidden da bude filmovicom
	if($('#linkfilma').is(':visible')){// ako je vidljiv unos za link 
	  $("#linkfilma").hide(); // sakrij u formi input (tj div) za linkfilma
	}
	if($('#lokacijafilma').is(':hidden')){// ako je skriven input za llokaciju tj ako je user bio u bioskopu koji je ne prikazuje  
	  $('#lokacijafilma').show();// prikazi input za lokaciju
	}
	if($('#godina1filma').is(':hidden')){// ako je skriven input za godinu1 tj ako je user bio u unosu koji je ne prikazuje  
	  $('#godina1filma').show();// prikazi input za godinu1
	}
	$('#forma1 input:submit').val('Pretrazi!'); //promeni text na dugmetu da pise pretrazi!
	$('#forma1 input:submit').attr('id', 'pretrazi');//id atribut submit button-a promeni u 'pretrazi' posto ga unos menja u 'unesi' 
	$('#paginacijadiv').html(''); // isprazni div koji prikazuje paginaciju
	$('#output').html(''); // izprazni div #output posto je mozda radjena pretraga u prepravkama ili bioskopu
	prazniformu();//funkcija za brisanje unosa u polja forme
  });
  
  //kad se u navigaciji klikne link Prepravke
  $('#prepravke').on('click', function(e){
    e.preventDefault();
	$('#unesi').unbind('click', false);// posto kad se u unosu klikne unesi i ako dodje do error-a unbind-uje se klik na ovo isto dugme pa se sad za svaki slucaj bind-uje opet
    $('.vjunavigacija').removeClass('vjunavigacija'); // trenutno aktivnom linku tj onom koji ima klasu vjunavigacija skini mu je
	$(this).addClass('vjunavigacija'); // i dodaj klasu vjunavigacija linku Prepravke
	$("input[name='vju']").val('prepravke'); // u formi promeni input hidden da bude prepravke
	if($('#linkfilma').is(':visible')){// ako je vidljiv unos za link 
	  $("#linkfilma").hide(); // sakrij u formi input (tj div) za linkfilma
	}
	if($('#lokacijafilma').is(':hidden')){// ako je skriven input za llokaciju tj ako je user bio u bioskopu koji je ne prikazuje  
	  $('#lokacijafilma').show();// prikazi input za lokaciju
	}
	if($('#godina1filma').is(':hidden')){// ako je skriven input za godinu1 tj ako je user bio u unosu koji je ne prikazuje  
	  $('#godina1filma').show();// prikazi input za godinu1
	}
	$('#forma1 input:submit').val('Pretrazi!'); //promeni text na dugmetu da pise pretrazi!
	$('#forma1 input:submit').attr('id', 'pretrazi');//id atribut submit button-a promeni u 'pretrazi' posto ga unos menja u 'unesi' 
	$('#paginacijadiv').html(''); // isprazni div koji prikazuje paginaciju
	$('#output').html(''); // izprazni div #output posto je mozda radjena pretraga u filmovicom ili bioskopu
	prazniformu();//funkcija za brisanje unosa u polja forme
  });
  
  //kad se u navigaciji klikne link Bioskop
  $('#bioskop').on('click', function(e){
    e.preventDefault();
	$('#unesi').unbind('click', false);// posto kad se u unosu klikne unesi i ako dodje do error-a unbind-uje se klik na ovo isto dugme pa se sad za svaki slucaj bind-uje opet
    $('.vjunavigacija').removeClass('vjunavigacija'); // trenutno aktivnom linku tj onom koji ima klasu vjunavigacija skini mu je
	$(this).addClass('vjunavigacija'); // i dodaj klasu vjunavigacija linku Bioskop
	$("input[name='vju']").val('bioskop'); // u formi promeni input hidden da bude bioskop
	$("#lokacijafilma").hide(); // sakrij u formi input (tj div) za lokaciju posto su svi gledljivi filmovi na HDVeliki disku
	if($('#linkfilma').is(':visible')){// ako je vidljiv unos za link 
	  $("#linkfilma").hide(); // sakrij u formi input (tj div) za linkfilma
	}
	if($('#godina1filma').is(':hidden')){// ako je skriven input za godinu1 tj ako je user bio u unosu koji je ne prikazuje  
	  $('#godina1filma').show();// prikazi input za godinu1
	}
	$('#forma1 input:submit').val('Pretrazi!'); //promeni text na dugmetu da pise pretrazi! 
	$('#forma1 input:submit').attr('id', 'pretrazi');//id atribut submit button-a promeni u 'pretrazi' posto ga unos menja u 'unesi' 
	$('#paginacijadiv').html(''); // isprazni div koji prikazuje paginaciju
	$('#output').html(''); // izprazni div #output posto je mozda radjena pretraga u prepravkama ili filmovicom
	prazniformu();//funkcija za brisanje unosa u polja forme
  });
  
  //kad se u navigaciji klikne link Unos Filmova
  $('#unos').on('click', function(e){
    e.preventDefault();
	$('.vjunavigacija').removeClass('vjunavigacija'); // trenutno aktivnom linku tj onom koji ima klasu vjunavigacija skini mu je
	$(this).addClass('vjunavigacija'); // i dodaj klasu vjunavigacija linku Unos Filmova
	$("input[name='vju']").val('unos'); // u formi promeni input hidden da bude unos
	$('#godina1filma').hide();
	if($('#linkfilma').is(':hidden')){// ako je skriven input za link   
	  $('#linkfilma').show();// prikazi input za link
	}
	if($('#lokacijafilma').is(':hidden')){// ako je skriven input za llokaciju tj ako je user bio u bioskopu koji je ne prikazuje  
	  $('#lokacijafilma').show();// prikazi input za lokaciju
	}
	$('#forma1 input:submit').val('Unesi Film!'); //promeni text na dugmetu da pise unesi film! 
	$('#forma1 input:submit').attr('id', 'unesi');//id atribut submit button-a promeni u 'unesi'
	$('#paginacijadiv').html(''); // isprazni div koji prikazuje paginaciju
	$('#output').html(''); // izprazni div #output posto je mozda radjena pretraga
	prazniformu();//funkcija za brisanje unosa u polja forme
  });
  
  
  
  //----------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------------------------------------
  // varijable koje cuvaju vrednosti unete u formu za pretragu, koriste ih hendler za linkove za paginaciju  
  var paginacijaIme = '';
  var paginacijaZanr = '';
  var paginacijaGodina = '';
  var paginacijaGodina1 = '';
  var paginacijaLokacija = '';
  var paginacijaPoznati = '';
  var rezpostr = 10;
  var paginacijaSortiranje = '';
  // klik na button pretrazi u formi
  $('body').on('click', '#pretrazi', function(e){    
    e.preventDefault();
	var baseurl = $('#baseurl').text();//<p>#baseurl je skriveni paragraf koji echo-uje baseurl()
	var url = baseurl+'film/jqsve'; // napravi url kom se salje post
	var vju = $("input[name='vju']").val();
	
	postData = { // pokupi vrednosti unete u formu za pretragu da se posalje u kontroler film/jqsve koji salje modelu da radi query u bazi
	  ime: $('#ime').val(),
	  zanr: $('#zanr').val(),
	  godina: $('#godina').val(),
	  godina1: $('#godina1').val(),
	  lokacija: $('#lokacija').val(),
	  poznati: $('#poznati').val(),	  
	  limit: rezpostr,
	  offset: 0,
	  sort: ''
	};
	paginacijaIme = postData.ime; // napuni globalne varijable vrednostima koje je user uneo u formu da bi kad se klikne na linkove paginacija moglo da se pristupi istima
    paginacijaZanr = postData.zanr;
    paginacijaGodina = postData.godina;
    paginacijaGodina1 = postData.godina1;
    paginacijaLokacija = postData.lokacija;
    paginacijaPoznati = postData.poznati;
	//alert(postData);
	console.log(postData);
	$.post(url, postData, function(o){// salji get AJAX u kontroler cifilmovi2/film/jqsve
	  //objekat o koji se vrati iz modela tj kontrolera jqsve je array kom je o[0] podarray sa podatcima filmova a o[1] je ukupan broj filmova koji taj WHERE uslov vraca iz baze da bi kasnije mogla da se radi paginacija  
	  console.log(o);
	  $('#paginacijadiv').html(''); // isprazni div koji prikazuje paginaciju
	  var total = o[1];
	  var brfilmova = o[0].length;//prebroj br vracenih filmova iz baze tj duzina objekta
	  var output = '';
	  output += '<div class="listafilmova">';
	  output += '<div class="hovertabele1">Pronadjeno Filmova: <strong>'+o[1]+'</strong><br>';//pronadjeno filmova
	  if(postData.ime != ''){ // dodaj u div .hovertabele da prikaze sta je pretrazeno u formi(koji element postData array-a je popunjen prikazi ga)
	    output += ' Ime: <strong>'+postData.ime+'</strong>';
	  } 
	  if(postData.zanr != ''){
	    output += ' Zanr: <strong>'+postData.zanr+'</strong>';
	  } 
	  if(postData.godina != ''){
	    output += ' Godina: <strong>'+postData.godina+'</strong>';
	  } 
	  if(postData.godina1 != ''){
	    output += ' Godina Do: <strong>'+postData.godina1+'</strong>';
	  } 
	  if(postData.lokacija != ''){
	    output += ' Lokacija: <strong>'+postData.lokacija+'</strong>';
	  } 
	  if(postData.poznati != ''){
	    output += ' Poznati: <strong>'+postData.poznati+'</strong>';
	  } 
	  //select za sortiranje po kolonama
	  output +='<select id="sortorder" class="span2">';
	  output +='<option value="#"></option>';
	  output +='<option sortirajpo="lokacija asc" value="lokacija ASC">Lokacija ASC</option>';
	  output +='<option sortirajpo="lokacija desc"  value="lokacija DESC">Lokacija DESC</option>';
	  output +='<option sortirajpo="ime asc"  value="ime ASC">Ime ASC</option>';
	  output +='<option sortirajpo="ime desc"  value="ime DESC">Ime DESC</option>';
	  output +='<option sortirajpo="godina asc"  value="godina ASC">Godina ASC</option>';
	  output +='<option sortirajpo="godina desc"  value="godina DESC">Godina DESC</option>';
	  output +='<option sortirajpo="zanr asc"  value="zanr ASC">Zanr ASC</option>';
	  output +='<option sortirajpo="zanr desc"  value="zanr DESC">Zanr DESC</option>';
      output +='</select>';
	  output += '</div>';//kraj div-a hovertabele
	  if(o[0].length <= 0){//ako ne pronadje ni jedan film
	    output += '<div class="tabelarowjq">';
		output += '<p class="lead orandz text-error text-center">Vasa Pretraga Nema Rezultata!<br> Pokusajte Sa Novim Unosom.</p>';
		output += '</div>';//kraj div .tabelarowjq		
	  }
	  for(var i = 0; i < o[0].length; i++){ //ako pronadje nesto, iteriraj po objektu i prikazi svaki film
	    output += '<div id="'+o[0][i].id+'" class="tabelarowjq">'; //id atribut je id filma iz baze  
	    output += '<p class="lead text-info"><span id="rednibroj'+o[0][i].id+'">'+(i+1)+'</span>. '+o[0][i].ime+' '+'<span class="text-success">('+o[0][i].godina+')</span></p>';
		//ovi <p>-ovi su skriveni i sluze samo da bi se lako izvukli podatci odredjenog filma ako se radi prepravka pa se po id atributu podatci filma ubacuju u formu za prepravku
		output += '<p id="filmime'+o[0][i].id+'" hidden>'+o[0][i].ime+'</p>';
		output += '<p id="filmzanr'+o[0][i].id+'" hidden>'+o[0][i].zanr+'</p>';
		output += '<p id="filmgodina'+o[0][i].id+'" hidden>'+o[0][i].godina+'</p>';
		output += '<p id="filmlokacija'+o[0][i].id+'" hidden>'+o[0][i].lokacija+'</p>';
		output += '<p id="filmpoznati'+o[0][i].id+'" hidden>'+o[0][i].poznati+'</p>';
		output += '<p id="filmlink'+o[0][i].id+'" hidden>'+o[0][i].link+'</p>';
		if(vju == 'filmovicom'){ // ako je vju filmovicom prikazi link ka IMDB-u
		  output += '<a class="logo" href="'+o[0][i].link+'" target="blank"><img src="http://localhost/cifilmovi2/images/imdblogo.png"></a>'; 
		}
		if(vju == 'prepravke'){ // ako je vju prepravke prikazi link Prepravi, film-id atribut je tu da bi mogao da se nadje div istog id-ja posle kog se podatci filma ubacuju u div za prepravljanje(pogledaj hendler za klik na ovaj link)
		  //id atribut ima u sebi id filma(o[i].id) da bi se kad se klikne na Cancel prepravke (tj .prepravkacancel link u divu koji se pojavi kad se klikne ovaj link) ponovo bindovao click event na ovaj link posto se click event unbinduje kad se klikne na ovaj link da bi bio neaktivan kad se klikne vise od jednog puta
		  output += '<a film-id="'+o[0][i].id+'" id="linkprepavka'+o[0][i].id+'" class="logo linkprepavka" href="#" target="blank"><h4 class="text-warning prepavke">Prepravi</h4></a>'; 
		}
		if(vju == 'bioskop'){ // ako je vju bioskop prikazi link Gledaj
		  output += '<a id="linkbioskop" class="logo" href="#" target="blank"><h4 class="text-warning prepavke">Gledaj</h4></a>'; 
		}
		output += '<p id="lokpoznatizanr'+o[0][i].id+'"><strong> Lokacija:</strong> <span class="text-info">'+o[0][i].lokacija+'</span>'+', ';
		output += ' <strong> Poznati:</strong> <span class="text-info">'+o[0][i].poznati+'</span>'+', ';
		output += ' <strong> Zanr:</strong> <span class="text-info">'+o[0][i].zanr+'</span></p>';
		
		output += '</div>';//kraj div .+o[0][i].id+
		
	  }
	  output += '</div>';//kraj diva klase listafilmova
	  $('#output').html(output);
	  //$('#outputinner').append(output);
	  
	  if(o[1] > rezpostr){ // ako vrati vise rezultata nego sto je dozvoljeno po stranici generisi linkove za paginaciju
	    
		console.log(paginacijaIme);
		brstranica = Math.ceil(total / rezpostr);
		console.log('brstranica: '+brstranica);
		var listalinkova = '';
		for(var p = 1; p <= brstranica; p++){
		  listalinkova += '<a href="'+p+'" class="paginacijalink';
		  if(p == 1){
		    listalinkova += ' current'; // prvom linku dodaj klasu current
		  }
		  listalinkova += '">'+p+'</a>';
		}
		$('#paginacijadiv').html(listalinkova);
	  }
	  
	  //output += '<br><div id="paginacijadiv"></div><br>'; // div koji ce prikazivati paginaciju ako je broj vracenih filmova iz baze veci od 10
      //$('#output').html(output);
	   // ako baza vrati vise od 10 filmova radi paginaciju, koristim simplePagination.js plugin(skinuto sa: http://flaviusmatis.github.io/simplePagination.js/) nalazi se u folderu: cifilmovi2\js\flaviusmatis-simplePagination.js-307b5c6
	   // ona samo sakriva i otkriva ono sto je ucitano na stranicu, query je uvek isti tj ne radi novi query kad se klikne novi link na paginaciji
	  /* if(o[1] > 10){
      var paginiraj = $('.tabelarowjq'); // element koji ce se paginirati tj skrivati i otkrivati, u ovom slucaju to su div-ovi klase tabelarowjq jer svaki film se prikazuje u jednom takvom div-u 
      var brrez = o[1]; // broj vracenih filmova iz baze 
	  var postr = 10;
	  paginiraj.slice(postr).hide();
	  $('#paginacijadiv').pagination({
	    items: brrez,
		itemsOnPage: postr,
		cssStyle: "light-theme",
		onPageClick: function(pageNum){
            var start = postr * (pageNum - 1);
            var end = start + postr;
			$('.prepravka').remove();
            paginiraj.hide().slice(start, end).show();
	    }	
	  });
	  } */
	}, 'json');
	
  });
  
  //----------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------------------------------------
  
  //klik na link za paginaciju
  $('body').on('click', '.paginacijalink', function(e){ 
    e.preventDefault();
	$('.current').removeClass('current'); // linku koji je bio aktivan tj imao klasu current skini istu
	$(this).addClass('current'); // dodaj klasu current linku na koji je kliknuto
	var baseurl = $('#baseurl').text();//<p>#baseurl je skriveni paragraf koji echo-uje baseurl()
	var url = baseurl+'film/jqsve'; // napravi url kom se salje post
	var vju = $("input[name='vju']").val();
	var cur_page = $(this).attr('href'); // uzmi vrednost linka koji je kliknut
	var skip = ((cur_page - 1) * rezpostr); // napravi offset
	postData = { // pokupi vrednosti koje je korisnik uneo u formu a sacuvane su u globalnim varijablama  paginacijaIme paginacijaZanr itd...
	  ime: paginacijaIme,
	  zanr: paginacijaZanr,
	  godina: paginacijaGodina,
	  godina1: paginacijaGodina1,
	  lokacija: paginacijaLokacija,
	  poznati: paginacijaPoznati,	  
	  limit: rezpostr,
	  offset: skip,
	  sort: paginacijaSortiranje
	};
    console.log(postData);
	$.post(url, postData, function(o){// salji get AJAX u kontroler cifilmovi2/film/jqsve
	  //objekat o koji se vrati iz modela tj kontrolera jqsve je array kom je o[0] podarray sa podatcima filmova a o[1] je ukupan broj filmova koji taj WHERE uslov vraca iz baze da bi kasnije mogla da se radi paginacija  
	  console.log(o);
	  var total = o[1];
	  var brfilmova = o[0].length;//prebroj br vracenih filmova iz baze tj duzina objekta
	  var output = '';
	  output += '<div class="listafilmova">';
	  output += '<div class="hovertabele1">Pronadjeno Filmova: <strong>'+o[1]+'</strong><br>';//pronadjeno filmova
	  if(postData.ime != ''){ // dodaj u div .hovertabele da prikaze sta je pretrazeno u formi(koji element postData array-a je popunjen prikazi ga)
	    output += ' Ime: <strong>'+postData.ime+'</strong>';
	  } 
	  if(postData.zanr != ''){
	    output += ' Zanr: <strong>'+postData.zanr+'</strong>';
	  } 
	  if(postData.godina != ''){
	    output += ' Godina: <strong>'+postData.godina+'</strong>';
	  } 
	  if(postData.godina1 != ''){
	    output += ' Godina Do: <strong>'+postData.godina1+'</strong>';
	  } 
	  if(postData.lokacija != ''){
	    output += ' Lokacija: <strong>'+postData.lokacija+'</strong>';
	  } 
	  if(postData.poznati != ''){
	    output += ' Poznati: <strong>'+postData.poznati+'</strong>';
	  } 
	  //select za sortiranje po kolonama
	  output +='<select id="sortorder" class="span2">';
	  output +='<option value="#"></option>';
	  output +='<option sortirajpo="lokacija asc" value="lokacija ASC">Lokacija ASC</option>';
	  output +='<option sortirajpo="lokacija desc"  value="lokacija DESC">Lokacija DESC</option>';
	  output +='<option sortirajpo="ime asc"  value="ime ASC">Ime ASC</option>';
	  output +='<option sortirajpo="ime desc"  value="ime DESC">Ime DESC</option>';
	  output +='<option sortirajpo="godina asc"  value="godina ASC">Godina ASC</option>';
	  output +='<option sortirajpo="godina desc"  value="godina DESC">Godina DESC</option>';
	  output +='<option sortirajpo="zanr asc"  value="zanr ASC">Zanr ASC</option>';
	  output +='<option sortirajpo="zanr desc"  value="zanr DESC">Zanr DESC</option>';
      output +='</select>';
	  output += '</div>';//kraj div-a hovertabele
	  if(o[0].length <= 0){//ako ne pronadje ni jedan film
	    output += '<div class="tabelarowjq">';
		output += '<p class="lead orandz text-error text-center">Vasa Pretraga Nema Rezultata!<br> Pokusajte Sa Novim Unosom.</p>';
		output += '</div>';//kraj div .tabelarowjq		
	  }
	  for(var i = 0; i < o[0].length; i++){ //ako pronadje nesto, iteriraj po objektu i prikazi svaki film
	    output += '<div id="'+o[0][i].id+'" class="tabelarowjq">'; //id atribut je id filma iz baze  
	    output += '<p class="lead text-info"><span id="rednibroj'+o[0][i].id+'">'+(skip+i+1)+'</span>. '+o[0][i].ime+' '+'<span class="text-success">('+o[0][i].godina+')</span></p>';
		//ovi <p>-ovi su skriveni i sluze samo da bi se lako izvukli podatci odredjenog filma ako se radi prepravka pa se po id atributu podatci filma ubacuju u formu za prepravku
		output += '<p id="filmime'+o[0][i].id+'" hidden>'+o[0][i].ime+'</p>';
		output += '<p id="filmzanr'+o[0][i].id+'" hidden>'+o[0][i].zanr+'</p>';
		output += '<p id="filmgodina'+o[0][i].id+'" hidden>'+o[0][i].godina+'</p>';
		output += '<p id="filmlokacija'+o[0][i].id+'" hidden>'+o[0][i].lokacija+'</p>';
		output += '<p id="filmpoznati'+o[0][i].id+'" hidden>'+o[0][i].poznati+'</p>';
		output += '<p id="filmlink'+o[0][i].id+'" hidden>'+o[0][i].link+'</p>';
		if(vju == 'filmovicom'){ // ako je vju filmovicom prikazi link ka IMDB-u
		  output += '<a class="logo" href="'+o[0][i].link+'" target="blank"><img src="http://localhost/cifilmovi2/images/imdblogo.png"></a>'; 
		}
		if(vju == 'prepravke'){ // ako je vju prepravke prikazi link Prepravi, film-id atribut je tu da bi mogao da se nadje div istog id-ja posle kog se podatci filma ubacuju u div za prepravljanje(pogledaj hendler za klik na ovaj link)
		  //id atribut ima u sebi id filma(o[i].id) da bi se kad se klikne na Cancel prepravke (tj .prepravkacancel link u divu koji se pojavi kad se klikne ovaj link) ponovo bindovao click event na ovaj link posto se click event unbinduje kad se klikne na ovaj link da bi bio neaktivan kad se klikne vise od jednog puta
		  output += '<a film-id="'+o[0][i].id+'" id="linkprepavka'+o[0][i].id+'" class="logo linkprepavka" href="#" target="blank"><h4 class="text-warning prepavke">Prepravi</h4></a>'; 
		}
		if(vju == 'bioskop'){ // ako je vju bioskop prikazi link Gledaj
		  output += '<a id="linkbioskop" class="logo" href="#" target="blank"><h4 class="text-warning prepavke">Gledaj</h4></a>'; 
		}
		output += '<p id="lokpoznatizanr'+o[0][i].id+'"><strong> Lokacija:</strong> <span class="text-info">'+o[0][i].lokacija+'</span>'+', ';
		output += ' <strong> Poznati:</strong> <span class="text-info">'+o[0][i].poznati+'</span>'+', ';
		output += ' <strong> Zanr:</strong> <span class="text-info">'+o[0][i].zanr+'</span></p>';
		
		output += '</div>';//kraj div .+o[0][i].id+
		
	  }
	  output += '</div>';//kraj diva klase listafilmova
	  $('#output').html(output);
	 
	}, 'json');
	
  });
  
  //----------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------------------------------------

  // promena u selectu #sortorder za sortiranje 
  $('body').on('change', '#sortorder', function(e){
    e.preventDefault();
	var baseurl = $('#baseurl').text();//<p>#baseurl je skriveni paragraf koji echo-uje baseurl()
	var url = baseurl+'film/jqsve'; // napravi url kom se salje post
	var vju = $("input[name='vju']").val();
	var sort = $('option:selected', this).attr('sortirajpo'); // uzmi vrednost atributa sortirajpo u kom pise po kojoj koloni se sortira i da li je ASC ili DESC
	paginacijaSortiranje = sort; // zapamti u globalnoj varijabli paginacijaSortiranje sta je u selectu kliknuto da bi paginacija mogla da napravi tacan query 
	postData = { // pokupi vrednosti koje je korisnik uneo u formu a sacuvane su u globalnim varijablama  paginacijaIme paginacijaZanr itd...
	  ime: paginacijaIme,
	  zanr: paginacijaZanr,
	  godina: paginacijaGodina,
	  godina1: paginacijaGodina1,
	  lokacija: paginacijaLokacija,
	  poznati: paginacijaPoznati,
	  limit: rezpostr, // definisan gore (10)
	  offset: 0,
      sort: sort 
	};

	console.log(postData);
	$.post(url, postData, function(o){// salji get AJAX u kontroler cifilmovi2/film/jqsve
	  //objekat o koji se vrati iz modela tj kontrolera jqsve je array kom je o[0] podarray sa podatcima filmova a o[1] je ukupan broj filmova koji taj WHERE uslov vraca iz baze da bi kasnije mogla da se radi paginacija  
	  console.log(o);
	  $('#paginacijadiv').html(''); // isprazni div koji prikazuje paginaciju
	  var total = o[1];
	  var brfilmova = o[0].length;//prebroj br vracenih filmova iz baze tj duzina objekta
	  var output = '';
	  output += '<div class="listafilmova">';
	  output += '<div class="hovertabele1">Pronadjeno Filmova: <strong>'+o[1]+'</strong><br>';//pronadjeno filmova
	  if(postData.ime != ''){ // dodaj u div .hovertabele da prikaze sta je pretrazeno u formi(koji element postData array-a je popunjen prikazi ga)
	    output += ' Ime: <strong>'+postData.ime+'</strong>';
	  } 
	  if(postData.zanr != ''){
	    output += ' Zanr: <strong>'+postData.zanr+'</strong>';
	  } 
	  if(postData.godina != ''){
	    output += ' Godina: <strong>'+postData.godina+'</strong>';
	  } 
	  if(postData.godina1 != ''){
	    output += ' Godina Do: <strong>'+postData.godina1+'</strong>';
	  } 
	  if(postData.lokacija != ''){
	    output += ' Lokacija: <strong>'+postData.lokacija+'</strong>';
	  } 
	  if(postData.poznati != ''){
	    output += ' Poznati: <strong>'+postData.poznati+'</strong>';
	  } 
	  //select za sortiranje po kolonama
	  output +='<select id="sortorder" class="span2">';
	  output +='<option value="#"></option>';
	  output +='<option sortirajpo="lokacija asc" value="lokacija ASC">Lokacija ASC</option>';
	  output +='<option sortirajpo="lokacija desc"  value="lokacija DESC">Lokacija DESC</option>';
	  output +='<option sortirajpo="ime asc"  value="ime ASC">Ime ASC</option>';
	  output +='<option sortirajpo="ime desc"  value="ime DESC">Ime DESC</option>';
	  output +='<option sortirajpo="godina asc"  value="godina ASC">Godina ASC</option>';
	  output +='<option sortirajpo="godina desc"  value="godina DESC">Godina DESC</option>';
	  output +='<option sortirajpo="zanr asc"  value="zanr ASC">Zanr ASC</option>';
	  output +='<option sortirajpo="zanr desc"  value="zanr DESC">Zanr DESC</option>';
      output +='</select>';
	  output += '</div>';//kraj div-a hovertabele
	  if(o[0].length <= 0){//ako ne pronadje ni jedan film
	    output += '<div class="tabelarowjq">';
		output += '<p class="lead orandz text-error text-center">Vasa Pretraga Nema Rezultata!<br> Pokusajte Sa Novim Unosom.</p>';
		output += '</div>';//kraj div .tabelarowjq		
	  }
	  for(var i = 0; i < o[0].length; i++){ //ako pronadje nesto, iteriraj po objektu i prikazi svaki film
	    output += '<div id="'+o[0][i].id+'" class="tabelarowjq">'; //id atribut je id filma iz baze  
	    output += '<p class="lead text-info"><span id="rednibroj'+o[0][i].id+'">'+(i+1)+'</span>. '+o[0][i].ime+' '+'<span class="text-success">('+o[0][i].godina+')</span></p>';
		//ovi <p>-ovi su skriveni i sluze samo da bi se lako izvukli podatci odredjenog filma ako se radi prepravka pa se po id atributu podatci filma ubacuju u formu za prepravku
		output += '<p id="filmime'+o[0][i].id+'" hidden>'+o[0][i].ime+'</p>';
		output += '<p id="filmzanr'+o[0][i].id+'" hidden>'+o[0][i].zanr+'</p>';
		output += '<p id="filmgodina'+o[0][i].id+'" hidden>'+o[0][i].godina+'</p>';
		output += '<p id="filmlokacija'+o[0][i].id+'" hidden>'+o[0][i].lokacija+'</p>';
		output += '<p id="filmpoznati'+o[0][i].id+'" hidden>'+o[0][i].poznati+'</p>';
		output += '<p id="filmlink'+o[0][i].id+'" hidden>'+o[0][i].link+'</p>';
		if(vju == 'filmovicom'){ // ako je vju filmovicom prikazi link ka IMDB-u
		  output += '<a class="logo" href="'+o[0][i].link+'" target="blank"><img src="http://localhost/cifilmovi2/images/imdblogo.png"></a>'; 
		}
		if(vju == 'prepravke'){ // ako je vju prepravke prikazi link Prepravi, film-id atribut je tu da bi mogao da se nadje div istog id-ja posle kog se podatci filma ubacuju u div za prepravljanje(pogledaj hendler za klik na ovaj link)
		  //id atribut ima u sebi id filma(o[i].id) da bi se kad se klikne na Cancel prepravke (tj .prepravkacancel link u divu koji se pojavi kad se klikne ovaj link) ponovo bindovao click event na ovaj link posto se click event unbinduje kad se klikne na ovaj link da bi bio neaktivan kad se klikne vise od jednog puta
		  output += '<a film-id="'+o[0][i].id+'" id="linkprepavka'+o[0][i].id+'" class="logo linkprepavka" href="#" target="blank"><h4 class="text-warning prepavke">Prepravi</h4></a>'; 
		}
		if(vju == 'bioskop'){ // ako je vju bioskop prikazi link Gledaj
		  output += '<a id="linkbioskop" class="logo" href="#" target="blank"><h4 class="text-warning prepavke">Gledaj</h4></a>'; 
		}
		output += '<p id="lokpoznatizanr'+o[0][i].id+'"><strong> Lokacija:</strong> <span class="text-info">'+o[0][i].lokacija+'</span>'+', ';
		output += ' <strong> Poznati:</strong> <span class="text-info">'+o[0][i].poznati+'</span>'+', ';
		output += ' <strong> Zanr:</strong> <span class="text-info">'+o[0][i].zanr+'</span></p>';
		
		output += '</div>';//kraj div .+o[0][i].id+
		
	  }
	  output += '</div>';//kraj diva klase listafilmova
	  $('#output').html(output);
	  //$('#outputinner').append(output);  
	  if(o[1] > rezpostr){ // ako vrati vise rezultata nego sto je dozvoljeno po stranici generisi linkove za paginaciju
	    
		console.log(paginacijaIme);
		brstranica = Math.ceil(total / rezpostr);
		console.log('brstranica: '+brstranica);
		var listalinkova = '';
		for(var p = 1; p <= brstranica; p++){
		  listalinkova += '<a href="'+p+'" class="paginacijalink';
		  if(p == 1){
		    listalinkova += ' current'; // prvom linku dodaj klasu current
		  }
		  listalinkova += '">'+p+'</a>';
		}
		$('#paginacijadiv').html(listalinkova);
	  }
	}, 'json'); 

  });
  
  
  //----------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------------------------------------

  // klik na button #unesi za unos filma u bazu
  $('body').on('click', '#unesi', function(e){ 
    e.preventDefault();
	//alert('Pozdrav iz unosa');
	var baseurl = $('#baseurl').text();//<p>#baseurl je skriveni paragraf koji echo-uje baseurl()
	var url = baseurl+'film/unosjq'; // napravi url kom se salje post
	postData = { // pokupi vrednosti unete u formu za unos filma da se posalje u kontroler film/unosjq 
	  ime: $('#ime').val(),
	  zanr: $('#zanr').val(),
	  godina: $('#godina').val(),
	  lokacija: $('#lokacija').val(),
	  link: $('#link').val(),
	  poznati: $('#poznati').val()  
	};
	$.post(url, postData, function(obj){ // salji AJAX u kontroler
	   console.log(obj);
	  if(obj.rezultat == 0){ // ako je obj.rezultat == 0 forma nije prosla validaciju u kontroleru, onda izbaci errore koje je codeigniter pronasao
	    var content = '';
		content += '<div class="popunipolja">';
	    content += '<div class="orandz">'+obj.errors+'</div>';//error-i su u obj.errors
	    content += '</div>';
	    $(content).appendTo('#output').slideDown('500', function(){
		  $('#unesi').bind('click', false); // zabrani klik event na #unesi dok ne istekne 5 sekundi(pogledaj dole setTimeout() funkciju)
		});
	    setTimeout(function(){ // ako je doslo do error-a i izbacen je div .popunipolja posle 5 sec ga skloni i vrati klik event na #unesi
	      $('.popunipolja').fadeOut().remove(); 
		  $('#unesi').unbind('click', false);
	    }, 5000);
	  }else if(obj.rezultat == 1){ // ako je obj.rezultat == 1 znaci da je film vec unet u bazu
	    $('#output').html(''); // isprazni div #output za svaki slucaj
	    var content = '';
	    content += '<div class="vecunet">';
	    content += '<h3 class="text-danger1">Film je vec unet!</h3>';
		content += '</div>';
		$(content).appendTo('#output').slideDown('500'); // izbaci poruku da je film vec unet
	  }else if(obj.rezultat == 2){ // ako je obj.rezultat == 2 znaci da je film uspesno unet u bazu
	    $('#output').html(''); // isprazni div #output za svaki slucaj
		var imeunetogfilma = $('#ime').val();  //napuni varijable za crtanje div-a sa unetim filmom vrednostima iz forme
		var godinaunetogfilma = $('#godina').val();
		var zanrunetogfilma = $('#zanr').val();
		var lokacijaunetogfilma = $('#lokacija').val();
		var linkunetogfilma = $('#link').val();
		var poznatiunetogfilma = $('#poznati').val();
		var content = ''; // napravi div koji prikazuje uneti film
		content += '<div class="uspesnounet">';
	    content += '<h3 class="text-info">Film Je Uspešno Unet</h3></div>';
		content += '<div class="listafilmova"><div class="tabelarowjq">'; 
	    content += '<p class="lead text-info">'+imeunetogfilma+' '+'<span class="text-success">('+godinaunetogfilma+')</span></p>';
		content += '<a class="logo" href="'+linkunetogfilma+'" target="blank"><img src="http://localhost/cifilmovi2/images/imdblogo.png"></a>';
	    content += '<p><strong> Lokacija:</strong> <span class="text-info">'+lokacijaunetogfilma+'</span>'+', ';
		content += ' <strong> Poznati:</strong> <span class="text-info">'+poznatiunetogfilma+'</span>'+', ';
		content += ' <strong> Zanr:</strong> <span class="text-info">'+zanrunetogfilma+'</span></p>';
		content += '</div></div>';
		$(content).appendTo('#output').slideDown('500'); // prikazi uneti film u div-u #output
		prazniformu();//funkcija za brisanje unosa u polja forme
	  }else{ // ako je obj.rezultat == 3 znaci da je doslo do neke greske sa bazom
	    $('#output').html(''); // isprazni div #output za svaki slucaj
	    var content = '';
	    content += '<div class="vecunet">'; // prikazi poruku da je doslo do greske u bazi
	    content += '<h3 class="text-danger1">Došlo je do greške u bazi podataka, pokušajte kasnije ponovo.</h3>';
		content += '</div>';
		$(content).appendTo('#output').slideDown('500'); // izbaci poruku da je film vec unet
	  }
	}, 'json');
  });
  
  //----------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------------------------------------
  
  // klik na na link Prepravi
  $('#output').on('click', '.linkprepavka', function(e){
    e.preventDefault();
	
	var id = $(this).attr('film-id');
	//izvuci podatke filma koji su u hidden <p>-ovima u divu iznad, na koji je ovaj div okacen
	var imefilma = $('#filmime'+id).text();
	var zanrfilma = $('#filmzanr'+id).text();
	var godinafilma = $('#filmgodina'+id).text();
	var lokacijafilma = $('#filmlokacija'+id).text();
	var poznatifilma = $('#filmpoznati'+id).text();
	var linkfilma = $('#filmlink'+id).text();
	var content = '';
	content += '<div class="prepravka" id="divprepravka'+id+'"><p>Prepravi Podatke Filma id: '+id+'</p><a class="prepravkacancel" film-id="'+id+'" href="#">Cancel!</a>'; 
	//otvori formu
	content += '<form class="formazaprepravku form-horizontal" accept-charset="utf-8" method="post" action="http://localhost/cifilmovi2/film/upisprepravkejq">';
	// napravi input-e i ubaci im u value atribute podatke filma izvadjene iz hidden <p>-ova u divu iznad, na koji je ovaj div okacen, svakom inputu se u id atribut ubacuje id filma 
	content += '<input type="hidden" value="'+id+'" name="id">';
	content += '<label for="ime" class="col-sm-2 control-label">Ime Filma: </label>';
	content += '<input name="ime" type="text" id="imeprepravka'+id+'" value="'+imefilma+'"><br><br>';
	content += '<label for="zanr" class="col-sm-2 control-label">Zanr Filma: </label>';
	content += '<input name="zanr" type="text" id="zanrprepravka'+id+'" value="'+zanrfilma+'"><br><br>';
	content += '<label for="godina" class="col-sm-2 control-label">Godina: </label>';
	content += '<input name="godina" type="text" id="godinaprepravka'+id+'" value="'+godinafilma+'"><br><br>';
	content += '<label for="lokacija" class="col-sm-2 control-label">Lokacija Filma: </label>';
	content += '<input name="lokacija" type="text" id="lokacijaprepravka'+id+'" value="'+lokacijafilma+'"><br><br>';
	content += '<label for="poznati" class="col-sm-2 control-label">Poznati: </label>';
	content += '<input name="poznati" type="text" id="poznatiprepravka'+id+'" value="'+poznatifilma+'"><br><br>';
	content += '<label for="link" class="col-sm-2 control-label">Link: </label>';
	content += '<input name="link" type="text" id="linkprepravka'+id+'" value="'+linkfilma+'"><br><br>';
    content += '<input id="prepravifilmbutton" prepravka-id="'+id+'" class="btn btn-primary" type="submit" value="Prepravi Film!">';	
	content += '<input id="obrisifilmbutton" brisanje-id="'+id+'" type="submit" class="btn btn-danger" value="Obrisi     Film!">';
	content += '</form>'; // zatvori formu
	content += '</div>'; // zatvori div class="prepravka"
	$(content).insertAfter('#'+id).hide().slideDown('500');//insertuj ga posle ovog diva(class="prepravka"), sakrij ga pa ga slideDown()-uj
	$(this).bind('click', false); // ovo sprecava Prepravi link(tj link klase .linkprepavka) da funkcionise(ukida mu se 'click' event) da ne bi moglo da se klikne na njega vise od jednog puta, kad se klikne link klase.prepravkacancel opet se dozvoljava 'click' event na Prepravi link(pogledaj hendler za link.prepravkacancel)
	
  });
    
  //----------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------------------------------------
  
  //klik na link za Cancel prepravke (tj link klase .prepravkacancel) u div-u za prepravke
  $('#output').on('click', '.prepravkacancel', function(e){
    e.preventDefault();
    var id = $(this).attr('film-id'); // uzmi id filma posto je on u id atributu ovog diva koji treba ukloniti i u id atributu linka Prepravi kom treba opet bindovati 'click' event posto je unbindovan kad je kliknuto na njega   
	$('#divprepravka'+id).slideUp(function(){ //prvo ga slideUp()-uj -
	  $('#divprepravka'+id).remove(); // - pa onda u callbacku ukloni ovaj div
	});
	
	$('#linkprepavka'+id).unbind('click', false); // binduj 'click' event na link Prepravi (tj '#linkprepavka'+id)
  });
  
  //----------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------------------------------------
  
  //submit forme za prepravku filma 
  $('#output').on('click', '#prepravifilmbutton', function(e){
    e.preventDefault();
	var id = $(this).attr('prepravka-id');
	var rednibroj = $('#rednibroj'+id).text();
	var baseurl = $('#baseurl').text();//<p>#baseurl je skriveni paragraf koji echo-uje baseurl()
	var url = baseurl+'film/upisprepravkejq'; // napravi url kom se salje post
	postData = { // pokupi vrednosti unete u formu za prepravku da se posalje u kontroler film/upisprepravkejq
	  id: id, 
	  ime: $('#imeprepravka'+id).val(),
	  zanr: $('#zanrprepravka'+id).val(),
	  godina: $('#godinaprepravka'+id).val(),
	  lokacija: $('#lokacijaprepravka'+id).val(),
	  poznati: $('#poznatiprepravka'+id).val(),
	  link: $('#linkprepravka'+id).val()
	};
	$.post(url, postData, function(obj){ // salji AJAX u kontroler film/upisprepravkejq()
	  console.log(id);
	  console.log(obj);
	  var content = '';
	  if(obj.rezultat == 0){ // ako je obj.rezultat == 0 forma nije prosla validaciju u kontroleru, onda izbaci errore koje je codeigniter pronasao
	    content += '<div class="popunipolja'+id+'">';
	    content += '<div class="orandz">'+obj.errors+'</div>';//error-i su u obj.errors
	    content += '</div>';
	    $(content).appendTo('#divprepravka'+id).slideDown('500', function(){
		  $('#prepravifilmbutton').bind('click', false); // zabrani klik event na #prepravifilmbutton dok ne istekne 5 sekundi(pogledaj dole setTimeout() funkciju)
		});
	    setTimeout(function(){ // ako je doslo do error-a i izbacen je div .popunipolja posle 5 sec ga skloni i vrati klik event na #prepravifilmbutton
	      $('.popunipolja'+id).fadeOut().remove(); 
		  $('#prepravifilmbutton').unbind('click', false);
	    }, 5000);
	  }else if(obj.rezultat == 2){ // ako je obj.rezultat == 2 nista nije uneto u bazu zato sto korisnik nije uneo nikakve promene, izbaci mu poruku da mora nesto prepraviti
	    content += '<div class="popunipolja'+id+'">';
	    content += '<div class="orandz"><p class="lead text-error text-center">Niste Uneli Nijednu Prepravku.</p></div>';
	    content += '</div>';
	    $(content).appendTo('#divprepravka'+id).slideDown('500', function(){
		  $('#prepravifilmbutton').bind('click', false); // zabrani klik event na #prepravifilmbutton dok ne istekne 5 sekundi(pogledaj dole setTimeout() funkciju)
		});
	    setTimeout(function(){ // ako je doslo do error-a ili nisu unete nikakve prepravke izbacen je div .popunipolja posle 5 sec ga skloni i vrati klik event na #prepravifilmbutton
	      $('.popunipolja'+id).fadeOut().remove(); 
		  $('#prepravifilmbutton').unbind('click', false);
	    }, 5000);
	  }else{   
	    $('#divprepravka'+id).slideUp(function(){ //prvo ga slideUp()-uj -
	      $('#divprepravka'+id).remove(); // - pa onda u callbacku ukloni ovaj div
	    });
	    $('#linkprepavka'+id).unbind('click', false); // binduj 'click' event na link Prepravi (tj '#linkprepavka'+id)
	    //output += '<div id="'+id+'" class="tabelarowjq">'; //id atribut je id filma iz baze  
		output = ''; // napravi novi HTML div-a #id tj promeni tekst u divu koji prikazuje upravo prepravljeni film
	    output += '<p class="lead text-info"><span id="rednibroj'+id+'">'+rednibroj+'</span>. '+postData.ime+' '+'<span class="text-success">('+postData.godina+')</span></p>';
		//ovi <p>-ovi su skriveni i sluze samo da bi se lako izvukli podatci odredjenog filma ako se radi prepravka pa se po id atributu podatci filma ubacuju u formu za prepravku
		output += '<p id="filmime'+postData.id+'" hidden>'+postData.ime+'</p>';
		output += '<p id="filmzanr'+postData.id+'" hidden>'+postData.zanr+'</p>';
		output += '<p id="filmgodina'+postData.id+'" hidden>'+postData.godina+'</p>';
		output += '<p id="filmlokacija'+postData.id+'" hidden>'+postData.lokacija+'</p>';
		output += '<p id="filmpoznati'+postData.id+'" hidden>'+postData.poznati+'</p>';
		output += '<p id="filmlink'+postData.id+'" hidden>'+postData.link+'</p>';
		  //id atribut ima u sebi id filma(o[i].id) da bi se kad se klikne na Cancel prepravke (tj .prepravkacancel link u divu koji se pojavi kad se klikne ovaj link) ponovo bindovao click event na ovaj link posto se click event unbinduje kad se klikne na ovaj link da bi bio neaktivan kad se klikne vise od jednog puta
		output += '<a film-id="'+postData.id+'" id="linkprepavka'+postData.id+'" class="logo linkprepavka" href="#" target="blank"><h4 class="text-warning prepavke">Prepravi</h4></a>'; 
		output += '<p id="lokpoznatizanr'+postData.id+'"><strong> Lokacija:</strong> <span class="text-info">'+postData.lokacija+'</span>'+', ';
		output += ' <strong> Poznati:</strong> <span class="text-info">'+postData.poznati+'</span>'+', ';
		output += ' <strong> Zanr:</strong> <span class="text-info">'+postData.zanr+'</span></p>';	
		//output += '</div>';//kraj div .+o[0][i].id+
	    $('#'+id).html(output); // ubaci novi HTML u div #id
	  }
	}, 'json');
	
  });
  
  //----------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------------------------------------
 
  //klik na button za brisanje filma (#obrisifilmbutton) 
  $('#output').on('click', '#obrisifilmbutton', function(e){
    e.preventDefault();
	var id = $(this).attr('brisanje-id');
	var ime = $('#imeprepravka'+id).val();
	var baseurl = $('#baseurl').text();//<p>#baseurl je skriveni paragraf koji echo-uje baseurl()
	var url = baseurl+'film/brisanjefilmajq'; // napravi url kom se salje post
	postData = { // posalji id filma
	  id: id
	};
    if(confirm("Da Li Ste Sigurni Da Želite Da Obrišete Ovaj Film?")){//izbaci confirm user-u da potvrdi brisanje, ako potvrdi salji $.post u kontroler u kom je id filma da dalje posalje u model koi brise i vraca 1 ako uspe brisanje
        //alert(id);
		$.post(url, postData, function(obj){
		  console.log(obj);
		  if(obj.rezultat == 1){ // ako model vrati jedan tj brianje je uspesno
		    alert('Uspešno Ste Obrisali Film "'+ime+'".'); // izbaci alert da je film obrisan
		    $('#divprepravka'+id).fadeOut(1000, function(){ // fadeOut-uj div za prepravke
			  $('#'+id).slideUp(1000, function(){ // kad fadeOut-uje div za prepravke slideUp-uj div koji je prikazivao upravo obrisani film
			    $('#'+id).remove();//remove-uj div koji je prikazivao fim
			  });
			  $('#divprepravka'+id).remove();//remove-uj div za prepravke 
			})		
		  }else{ // ako model ne vrati 1 tj dodje do neke greske prilikom brisanja iz baze
		    alert('doslo je do greske');
		  }
		}, 'json');
    }else{ // ako user klikne 'No' u confirmu
        return false;
    } 
	
  });
  
  //----------------------------------------------------------------------------------------------------------------------------
  //----------------------------------------------------------------------------------------------------------------------------
  
  
   //kad se predje misem preko nekog filma dodaj mu plavu pozadinu (tj div-u .tabelarowjq dodaj klasu .hovertabele) 
   // - kad se izadje skini mu je
   $("#output").on('mouseenter', '.tabelarowjq', function(){
     $(this).addClass('hovertabele');
   });
   $("#output").on('mouseleave', '.tabelarowjq', function(){
     $(this).removeClass('hovertabele');
   });
   
   //funkcija za brisanje unosa u polja forme
   var prazniformu = function(){
     $('#ime').val('').css({"background-color": "#fff"});
	 $('#zanr').val('').blur();
	 $('#godina').val('').blur();
	 $('#godina1').val('').blur();
	 $('#lokacija').val('').blur();
	 $('#poznati').val('').blur();	
	 $('#link').val('').blur();	
   };
   
   
    
};






























