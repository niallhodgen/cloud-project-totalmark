<?php

namespace App;

header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
require('functions.inc.php');

if (
	$_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['programming']) && isset($_POST['computingFoundations'])
	&& isset($_POST['databases']) && isset($_POST['webDevelopment']) && isset($_POST['softwareEngineering'])
	&& isset($_POST['dataAnalysis']) && isset($_POST['userExperience']) && isset($_POST['cloudComputing'])
) {

	$input = array(

		"Programming" => $_POST['programming'],
		"Computing Foundations" => $_POST['computingFoundations'],
		"Databases" => $_POST['databases'],
		"Web Development" => $_POST['webDevelopment'],
		"Software Engineering" => $_POST['softwareEngineering'],
		"Data Analysis" => $_POST['dataAnalysis'],
		"User Experience" => $_POST['userExperience'],
		"Cloud Computing" => $_POST['cloudComputing'],
	);

	$output = array(
		"error" => false,
		"string" => "",
		"answer" => 0
	);

	$answer = getTotal($input);
	$input_returned = urldecode(http_build_query($input));


	$output['string'] = $input_returned . "&answer=" . $answer;
	$output['answer'] = $answer;

	echo json_encode($output);
	exit();
} else {

	$output = array(
		"error" => true,
		"string" => "Error: ensure you have entered marks for every module",
		"answer" => 0
	);


	echo json_encode($output);
	exit();
}
