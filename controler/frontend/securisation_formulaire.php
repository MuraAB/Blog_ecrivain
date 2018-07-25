<?php
// Sécurisation formulaire

function securisation_formulaire() {
	foreach($_POST as $key => $value) {
		$_POST[$key] = strip_tags($value);
	}	
}