<?php

$data = $_POST;
$errors = [];

$firstName = $data["first_name"];


if (strlen($firstName) < 3 || strlen($firstName) > 30 ) { $errors["last_name"] = "First name must be between 3 and 30 characters.";
}

if (array_key_exists("first_name", $errors)) {
    echo $errors["first_name"];
}

$lastName = $data["last_name"];


if (strlen($lastName) < 3 || strlen($lastName) > 30 ) { $errors["last_name"] = "Last name must be between 3 and 30 characters.";
}

if (array_key_exists("last_name", $errors)) {
    echo $errors["last_name"];
}