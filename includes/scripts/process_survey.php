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
$whyContact = $data["why_contact"];
$jobDetail = $data["job_detail"];
$favoriteProjects = $data["favorite_projects"] ?? [];
$inquirySubject = $data["inquiry_subject"] ?? [];



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

if (isTextLengthInvalid($whyContact, 15, 500)) { $errors["why_contact"] = "Your reason for contacting me must be between 15 and 500 characters.";
}

if (isTextLengthInvalid($jobDetail, 15, 500)) { $errors["job_detail"] = "Your explanation about your job or company must be between 15 and 500 characters.";
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

if (array_key_exists("why_contact", $errors)) {
    echo $errors["why_contact"];
}

if (array_key_exists("job_detail", $errors)) {
    echo $errors["job_detail"];
}

$validProjects = [
    "project_1",
    "project_2",
    "project_3",
    "project_4",
    "project_all"
];

if (!is_array($favoriteProjects)) {
    $errors["favorite_projects"] = "Please check your project choices.";
} else {
    if (empty($favoriteProjects)) {
        $errors["favorite_projects"] = "Please select at least one project.";
    }

    foreach ($favoriteProjects as $project) {
        if (!in_array($project, $validProjects)) {
            $errors["favorite_projects"] = "Please check your project choices.";
        }
    }
}

if (array_key_exists("favorite_projects", $errors)) {
    echo $errors["favorite_projects"];
}

$validSubjects = [
    "reason_job",
    "reason_interview",
    "reason_coffee",
    "reason_feedback"
];

if (!is_array($inquirySubject)) {
    $errors["inquiry_subject"] = "Please check your contact reasons.";
} else {
    if (empty($inquirySubject)) {
        $errors["inquiry_subject"] = "Please select at least one reason.";
    }

    foreach ($inquirySubject as $subject) {
        if (!in_array($subject, $validSubjects)) {
            $errors["inquiry_subject"] = "Please check your contact reasons.";
        }
    }
}

if (array_key_exists("inquiry_subject", $errors)) {
    echo $errors["inquiry_subject"];
}

$validArrangements = [
    "remote",
    "hybrid",
    "onsite"
];

if (!is_array($workArrangement)) {
    $errors["work_arrangement"] = "Please check your work arrangements.";
} else {
    if (empty($workArrangement)) {
        $errors["work_arrangement"] = "Please select at least one work arrangement.";
    }

    foreach ($workArrangement as $arrangement) {
        if (!in_array($arrangement, $validArrangements)) {
            $errors["work_arrangement"] = "Please check your work arrangements.";
        }
    }
}

if (array_key_exists("work_arrangement", $errors)) {
    echo $errors["work_arrangement"];
}