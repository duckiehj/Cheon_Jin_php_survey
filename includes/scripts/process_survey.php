<?php
// Start the session so errors can be shared with the survey page.
// This lets the form show errors after the user submits it.
session_start();

// Load the helper file once so can use the length check function.
// Keeping the function there avoids repeating it in this file.
require_once __DIR__ . '/../helpers.php';

// Only process answers sent with POST 
// Stop and show message if someone opens this file directly without submitting the form.
$requestType = $_SERVER["REQUEST_METHOD"];
if ($requestType !== "POST") {
    exit("Please submit the survey form.");
}

// Keep the submitted answers in $data.
// Each input name is used to find its answer.
$data = $_POST;
// Start with an empty error list for this submission.
// Add messages when an answer does not pass a check.
$errors = [];


// Put the text answers in separate variables.
// This makes the length checks below easier to read.
$firstName = $data["first_name"];
$lastName = $data["last_name"];
$companyName = $data["company_name"];
$recruiterRole = $data["recruiter_role"];
$cityLocation = $data["city_location"];
$positionTitle = $data["position_title"];
$whyContact = $data["why_contact"];
$jobDetail = $data["job_detail"];
// Checkboxes send no answer when nothing is selected.
// Use an empty array so we can check for missing choices below.
$favoriteProjects = $data["favorite_projects"] ?? [];
$inquirySubject = $data["inquiry_subject"] ?? [];
$workArrangement = $data["work_arrangement"] ?? [];
// Get one answer for each single-choice question.
// Use an empty string if an answer is missing so validation can catch it.
$positionType = $data["position_type"] ?? "";
$contact = $data["contact"] ?? "";
$timeline = $data["timeline"] ?? "";
$findMethod = $data["find_method"] ?? "";
// Get the email, website and phone answers for checks.
// Use empty strings when answers are missing so validation can still run.
$email = $data["email"] ?? "";
$jobUrl = $data["job_url"] ?? "";
$phoneNumber = $data["phone_number"] ?? "";

// Check that the first name has 3 to 30 characters.
// Save an error so the message can explain what needs fixing.
// Use the shared function to avoid repeating the length check.
// Use code from class file two.php
if (isTextLengthInvalid($firstName, 3, 30)) { $errors["first_name"] = "First name must be between 3 and 30 characters.";
}
// Use the same function to check the last name.
// Keep its error separate so it appears beside the correct question.
if (isTextLengthInvalid($lastName, 3, 30)) { $errors["last_name"] = "Last name must be between 3 and 30 characters.";
}

// Allow 2 to 30 characters for the company name.
// Keep its error separate so it appears beside the correct question.
// Use code from class file two.php
if (isTextLengthInvalid($companyName, 2, 30)) { $errors["company_name"] = "Company name must be between 2 and 30 characters.";
}

// Allow 2 to 50 characters for the recruiter's job title.
// Save an error so the user knows if the answer needs changing.
if (isTextLengthInvalid($recruiterRole, 2, 50)) { $errors["recruiter_role"] = "Job title must be between 2 and 50 characters.";
}

// Allow 3 to 50 characters for the answer.
// Save an error so the user knows if the answer needs changing.
if (isTextLengthInvalid($cityLocation, 3, 50)) { $errors["city_location"] = "Location must be between 3 and 50 characters.";
}
// Allow 3 to 50 characters for the answer.
// Use the shared function to avoid repeating the length check.
if (isTextLengthInvalid($positionTitle, 3, 50)) { $errors["position_title"] = "Position title must be between 3 and 50 characters.";
}

// Allow 15 to 500 characters for the answer.
// This asks for some detail while keeping the answer within a limit.
if (isTextLengthInvalid($whyContact, 15, 500)) { $errors["why_contact"] = "Your reason for contacting me must be between 15 and 500 characters.";
}

// Allow 15 to 500 characters for the answer.
// This asks for some detail while keeping the answer within a limit.
if (isTextLengthInvalid($jobDetail, 15, 500)) { $errors["job_detail"] = "Your explanation about your job or company must be between 15 and 500 characters.";
}

// 3 multiple select questions in same form

// List the project values used by the form.
// Compare submitted choices with this list to reject unknown values.
$validProjects = [
    "project_1",
    "project_2",
    "project_3",
    "project_4",
    "project_all"
];


// Multiple choices should arrive as an array.
// Show an error if the answer is not a list.
if (!is_array($favoriteProjects)) {
    $errors["favorite_projects"] = "Please check your project choices.";
} else {
    // Require at least one project selection.
    // Save an error if the user did not choose anything.
    if (empty($favoriteProjects)) {
        $errors["favorite_projects"] = "Please select at least one project.";
    }

    // Check each selected project against the allowed list.
    // Save an error if a submitted value is not one of our options.
    // Use class file from other_cats.php
    foreach ($favoriteProjects as $project) {
        if (!in_array($project, $validProjects)) {
            $errors["favorite_projects"] = "Please check your project choices.";
        }
    }
}

// left this for errors check up
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

// 4 multi-answer, single select questions in same form

// List the employment types allowed by the form.
// These values match the options in the dropdown.
$validPositionTypes = [
    "fulltime",
    "contract",
    "internship",
    "parttime"
];

// Check if the submitted answer is missing from the allowed list.
// If a submitted choice is not in this list, save an error.
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


// This radio question is one of the four single-choice questions
// required by the assignment. Radio buttons allow only one choice.
// Use an empty string if nothing was selected so validation can show an error.

$validFindMethods = [
    "find_linkedin",
    "find_google",
    "find_referral"
];

if (!in_array($findMethod, $validFindMethods)) {
    $errors["find_method"] = "Please select how you found my portfolio.";
}



// 3 atypical queistions

// Check its format before adding it to the email message.
// Save an error if it is empty or is not a valid email address.

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Please enter a valid email address.";
}

// Check that the website answer has a valid URL format.
// Save an error if it is empty or invalid so the user can fix it.
if (!filter_var($jobUrl, FILTER_VALIDATE_URL)) {
    $errors["job_url"] = "Please enter a valid website address.";
}

// Check that the phone number has at least 7 characters.
// Save an error if it is too short. This check only measures length.
if (strlen($phoneNumber) < 7) {
    $errors["phone_number"] = "Phone number must be at least 7 characters.";
}



// Followed in class file
// Build and send the email only when there are no validation errors.
// This keeps invalid answers out of the email.

if (count($errors) === 0) {
    
    // Set the subject so the email is easy to identify.
    $to = "hello@email.com";
    $subject = "New Portfolio Survey";

    // Build the email body with the validated answers.
    // Use HTML headings and lists to group the information.
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

    // Add the multiple-choice answers in separate groups because it's a long list of survey
    // Foreach loop adds every selected choice to its group's list.
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


    // Try to send the completed message.
    // WAMP has no mail server set up.
    mail($to, $subject, $message);
}

// Save the errors in the session before returning to the form.
// The form page reads them and shows each error message on question.
$_SESSION["form_errors"] = $errors;

// Return to the survey after processing the answers.
// Stop here so no more code runs after the redirect.
header("Location: ../../index.php");
exit;


