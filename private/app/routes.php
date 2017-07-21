<?php

// On définit la liste des pages du site
$router = [
	// "name_route" => ["page", "accès restreint ?"],

	// Accueil
	"home"      	  => ["home.php",       	 false],

	// Foodtrucks
	"foodtrucks"	  => ["foodtrucks.php", 	 false],
	"foodtruck"  	  => ["foodtruck.php",  	 false],
	"add_foodtruck"   => ["add_foodtruck.php",   true ],
	"edit_foodtruck"  => ["edit_foodtruck.php",  true ],
	"dlt_foodtruck"   => ["dlt_foodtruck.php",   true ],  // dlt = delete

	// Contact
	"contact"         => ["contact.php",    	 false],

	// Users
	"profile"    	  => ["profile.php",    	 true ],
	"settings"   	  => ["settings.php",   	 true ],
	"register"   	  => ["register.php",   	 false],
	"login"      	  => ["login.php",      	 false],
	"lostpwd"    	  => ["lostpwd.php",    	 false],
	"renewpwd"   	  => ["renewpwd.php",   	 false],
	"logout"     	  => [null,             	 true ],

	// Erreur
	"404"             => ["404.php",        	 false]
];