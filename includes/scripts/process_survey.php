<?php

$data = $_POST;
$errors = [];

function isTextLengthInvalid($text, $min, $max)
{
    return strlen($text) < $min || strlen($text) > $max;
}

$firstName = $data["first_name"];
$lastName = $data["last_name"];
$companyName = $data["company_name"];
$recruiterRole = $data["recruiter_role"];
$cityLocation = $data["city_location"];
$positionTitle = $data["position_title"];



if (isTextLengthInvalid($firstName, 3, 30)) { $errors["first_name"] = "First name must be between 3 and 30 characters.";
}

if (isTextLengthInvalid($lastName, 3, 30)) { $errors["last_name"] = "Last name must be between 3 and 30 characters.";
}

if (isTextLengthInvalid($companyName, 2, 30)) { $errors["company_name"] = "Company name must be between 2 and 30 characters.";
}

if (isTextLengthInvalid($recruiterRole, 2, 50)) { $errors["recruiter_role"] = "Job title must be between 2 and 50 characters.";
}

if (isTextLengthInvalid($cityLocation, 3, 50)) { $errors["city_location"] = "Location must be between 3 and 50 characters.";
}

if (isTextLengthInvalid($positionTitle, 3, 50)) { $errors["position_title"] = "Position title must be between 3 and 50 characters.";
}

if (array_key_exists("first_name", $errors)) {
    echo $errors["first_name"];
}

if (array_key_exists("last_name", $errors)) {
    echo $errors["last_name"];
}

if (array_key_exists("company_name", $errors)) {
    echo $errors["company_name"];
}

if (array_key_exists("recruiter_role", $errors)) {
    echo $errors["recruiter_role"];
}

if (array_key_exists("city_location", $errors)) {
    echo $errors["city_location"];
}

if (array_key_exists("position_title", $errors)) {
    echo $errors["position_title"];
}