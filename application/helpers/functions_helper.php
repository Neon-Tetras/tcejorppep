<?php

function clean($string){
	return mysql_real_escape_string(htmlentities(trim($string)));
}


function readMyFile($filename)
{
	$file = fopen($filename,"r") or exit("Unable to open file!");
	
	while(!feof($file))
	{
		return fgets($file);
	}
	fclose($file);
}

function generate_hash($text)
{
	$blowfish_salt = bin2hex(openssl_random_pseudo_bytes(22));
	$encrypted_pass = crypt($text, $blowfish_salt);
	
	return $encrypted_pass;
}

function validate_pw($password,$hash)
{
	return crypt($password,$hash) == $hash;
}
