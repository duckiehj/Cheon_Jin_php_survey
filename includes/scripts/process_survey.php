<?php
session_start();

require_once __DIR__ . '/../helpers.php';

$requestType = $_SERVER["REQUEST_METHOD"];

if ($requestType !== "POST") {
    exit("Please submit the survey form.");
}

$data = $_POST;
$errors = [];



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
$workArrangement = $data["work_arrangement"] ?? [];
$positionType = $data["position_type"] ?? "";
$contact = $data["contact"] ?? "";
$timeline = $data["timeline"] ?? "";
$findMethod = $data["find_method"] ?? "";
$email = $data["email"] ?? "";
$jobUrl = $data["job_url"] ?? "";
$phoneNumber = $data["phone_number"] ?? "";


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

// if (array_key_exists("favorite_projects", $errors)) {
//     echo $errors["favorite_projects"];
// }

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



$validPositionTypes = [
    "fulltime",
    "contract",
    "internship",
    "parttime"
];

if (!in_array($positionType, $validPositionTypes)) {
    $errors["position_type"] = "Please select an employment type.";
}


$validContacts = [
    "email",
    "phone",
    "linkedin"
];

if (!in_array($contact, $validContacts)) {
    $errors["contact"] = "Please select a valid contact method.";
}


$validTimelines = [
    "immediately",
    "one_month",
    "two_month"
];

if (!in_array($timeline, $validTimelines)) {
    $errors["timeline"] = "Please select a valid hiring timeline.";
}



$validFindMethods = [
    "find_linkedin",
    "find_google",
    "find_referral"
];

if (!in_array($findMethod, $validFindMethods)) {
    $errors["find_method"] = "Please select how you found my portfolio.";
}




if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Please enter a valid email address.";
}


if (!filter_var($jobUrl, FILTER_VALIDATE_URL)) {
    $errors["job_url"] = "Please enter a valid website address.";
}


if (strlen($phoneNumber) < 7) {
    $errors["phone_number"] = "Phone number must be at least 7 characters.";
}

if (count($errors) === 0) {
    $to = "hello@email.com";
    $subject = "New Portfolio Survey";

    $message = "<h1>New Portfolio Survey</h1>";
    $message .= "<ul>";
    $message .= "<li>First name: " . $firstName . "</li>";
    $message .= "<li>Last name: " . $lastName . "</li>";
    $message .= "<li>Company: " . $companyName . "</li>";
    $message .= "<li>Recruiter role: " . $recruiterRole . "</li>";
    $message .= "<li>Location: " . $cityLocation . "</li>";
    $message .= "<li>Position title: " . $positionTitle . "</li>";
    $message .= "<li>Reason for contacting me: " . $whyContact . "</li>";
    $message .= "<li>Job details: " . $jobDetail . "</li>";
    $message .= "<li>Employment type: " . $positionType . "</li>";
    $message .= "<li>Contact method: " . $contact . "</li>";
    $message .= "<li>Hiring timeline: " . $timeline . "</li>";
    $message .= "<li>Found my portfolio through: " . $findMethod . "</li>";
    $message .= "<li>Email: " . $email . "</li>";
    $message .= "<li>Website: " . $jobUrl . "</li>";
    $message .= "<li>Phone: " . $phoneNumber . "</li>";
    $message .= "</ul>";

    $message .= "<h2>Selected Projects</h2>";
    $message .= "<ul>";

    foreach ($favoriteProjects as $project) {
        $message .= "<li>" . $project . "</li>";
    }

    $message .= "</ul>";

    $message .= "<h2>Contact Reasons</h2>";
    $message .= "<ul>";

    foreach ($inquirySubject as $subjectChoice) {
        $message .= "<li>" . $subjectChoice . "</li>";
    }

    $message .= "</ul>";

    $message .= "<h2>Work Arrangements</h2>";
    $message .= "<ul>";

    foreach ($workArrangement as $arrangement) {
        $message .= "<li>" . $arrangement . "</li>";
    }

    $message .= "</ul>";

    mail($to, $subject, $message);
}

$_SESSION["form_errors"] = $errors;

header("Location: ../../index.php");
exit;

