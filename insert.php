<?php

require_once __DIR__ . '/includes/init.php';

//AJAX

    //ovde se prihvataju prosledjene vrednosti

    $data = array(
            'factor1' => '',
            'factor2' => '',
            'operation' => '',
            'result' => ''
    );
    //ovde se smestaju greske
    
    $errors = array();
    
    //jedan parametar koji je indikator da su podaci poslati odnosno da je korisnik pokrenuo neku akciju u ovom slucaju insert
    
    if (isset($_POST["task"]) && $_POST["task"] == "insert") {

            // filtriranje i validacija polja 

            if (isset($_POST["factor1"]) && $_POST["factor1"] !== '') {
                //dodavanje parametara medju podatke 
                $data["factor1"] = $_POST["factor1"];

                //filtriranje 
                $data["factor1"] = trim($data["factor1"]);

                $possibleValues = array(1,2,3,4,5,6,7,8,9,10);
		
		//validacija 
		if (!in_array($data["factor1"], $possibleValues)) {
			$errors["factor1"][] = "Izabrali ste neodgovarajucu vrednost za polje factor1";
		}
                

            } else {
            //ovaj else ide samo ako je polje obavezno
                $errors["factor1"][] = "Polje factor1 je obavezno";
            }

            if (isset($_POST["factor2"]) && $_POST["factor2"] !== '') {
                //dodavanje parametara medju podatke u formi
                $data["factor2"] = $_POST["factor2"];

                //filtriranje 
                $data["factor2"] = trim($data["factor2"]);

                $possibleValues = array(1,2,3,4,5,6,7,8,9,10);
		
		//validacija da li je prosledjena vrednost medju opcijama
		if (!in_array($data["factor2"], $possibleValues)) {
			$errors["factor2"][] = "Izabrali ste neodgovarajucu vrednost za polje factor2";
		}

            } else {
            //ovaj else ide samo ako je polje obavezno
                $errors["factor2"][] = "Polje factor2 je obavezno";
            }

            if (isset($_POST["operation"]) && $_POST["operation"] !== '') {
                //dodavanje parametara medju podatke u formi
                $data["operation"] = $_POST["operation"];

                //filtriranje
                $data["operation"] = trim($data["operation"]);
                
                $possibleValues = array('*');
		
		//validacija da li je prosledjena vrednost medju opcijama
		if (!in_array($data["operation"], $possibleValues)) {
			$errors["operation"][] = "Izabrali ste neodgovarajucu vrednost za polje operation";
		}
            } else {
            //ovaj else ide samo ako je polje obavezno
                $errors["operation"][] = "Polje operation je obavezno";
            }
            
            if (isset($_POST["result"]) && $_POST["result"] !== '') {
                //dodavanje parametara medju podatke u formi
                $data["result"] = $_POST["result"];

                //filtriranje
                $data["result"] = trim($data["result"]);

            } else {
            //ovaj else ide samo ako je polje obavezno
                $errors["result"][] = "Polje result je obavezno";
            }

            if (empty($errors)) {

                //Pozivanje akcije insertOne
                $mt = Calculator::insertOne($data);
                
            }

    }
