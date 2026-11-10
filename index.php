<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
      rel="stylesheet"
    />
    
    <title>About Me Process Survey</title>
    <link rel="stylesheet" type="text/css" href="css/grid.css" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
  </head>
  <body>
    <header class="grid-con">
      <h1 class="col-span-full">Do You Want to Contact Me?</h1>
    </header>
    <main>
      <form
        class="grid-con"
        action="includes/scripts/process_survey.php"
        method="POST"
      >
        <h2 class="col-span-full">About You & The Role</h2>

          <div class="col-span-full m-col-span-6">
            <label for="first_name">What is your first name?</label>
            <input
              id="first_name"
              name="first_name"
              type="text"
              placeholder="Billy"
            />
          </div>
          <div class="col-span-full m-col-span-6">
            <label for="last_name">What is your last name?</label>
            <input
              id="last_name"
              name="last_name"
              type="text"
              placeholder="Bob"
            />
          </div>
          <div class="col-span-full m-col-span-6">
            <label for="company_name">What is the name of your company?</label>
            <input
              id="company_name"
              name="company_name"
              type="text"
              placeholder="VS Code Corp"
            />
          </div>
          <div class="col-span-full m-col-span-6">
            <label for="recruiter_role"
              >What is your job title at your company?</label
            >
            <input
              id="recruiter_role"
              name="recruiter_role"
              type="text"
              placeholder="HR Manager"
            />
          </div>
          <div class="col-span-full m-col-span-6">
            <label for="city_location"
              >Which city and country are you currently located in?</label
            >
            <input
              id="city_location"
              name="city_location"
              type="text"
              placeholder="London, Ontario"
            />
          </div>
          <div class="col-span-full m-col-span-6">
            <label for="position_title"
              >What is the specific job title you are offering me?</label
            >
            <input
              id="position_title"
              name="position_title"
              type="text"
              placeholder="Designer"
            />
          </div>

        <h2 class="col-span-full">Portfolio & Role Details</h2>

          <fieldset class="col-span-full">
            <legend>Which specific projects from my portfolio caught your attention?</legend>

            <input id="project_1" type="checkbox" name="favorite_projects[]" value="project_1">
            <label for="project_1">Project 1</label>
            <input id="project_2" type="checkbox" name="favorite_projects[]" value="project_2">
            <label for="project_2">Project 2</label>
            <input id="project_3" type="checkbox" name="favorite_projects[]" value="project_3">
            <label for="project_3">Project 3</label>
            <input id="project_4" type="checkbox" name="favorite_projects[]" value="project_4">
            <label for="project_4">Project 4</label>
            <input id="project_all" type="checkbox" name="favorite_projects[]" value="project_all">
            <label for="project_all">All Projects</label>
            
          </fieldset>

          <fieldset class="col-span-full">
            <legend>What are the main reasons for reaching out to me today?</legend>
            
            <input id="reason_job" type="checkbox" name="inquiry_subject[]" value="reason_job">
            <label for="reason_job">Job Offer</label>
            <input id="reason_interview" type="checkbox" name="inquiry_subject[]" value="reason_interview">
            <label for="reason_interview">Interview Invitation</label>
            <input id="reason_coffee" type="checkbox" name="inquiry_subject[]" value="reason_coffee">
            <label for="reason_coffee">Coffee Chat & Networking</label>
            <input id="reason_feedback" type="checkbox" name="inquiry_subject[]" value="reason_feedback">
            <label for="reason_feedback">General Portfolio Feedback</label>
            
          </fieldset>

          <fieldset class="col-span-full">
            <legend>What types of work arrangements are available for this position?</legend>

            <input id="remote" type="checkbox" name="work_arrangement[]" value="remote">
            <label for="remote">Fully Remote</label>
            <input id="hybrid" type="checkbox" name="work_arrangement[]" value="hybrid">
            <label for="hybrid">Hybrid Work</label>
            <input id="onsite" type="checkbox" name="work_arrangement[]" value="onsite">
            <label for="onsite">Onsite Office</label>
            
          </fieldset>

        <h2 class="col-span-full">Additional Details</h2>

          <div class="col-span-full">
            <label for="why_contact">What specific aspect of my portfolio made you decide to reach out? </label>
            <textarea id="why_contact" name="why_contact"></textarea>
          </div>
          <div class="col-span-full">
            <label for="job_detail">Could you share a brief overview of your team, company culture or the role you are offering? </label>
            <textarea id="job_detail" name="job_detail"></textarea>
          </div>

        <h2 class="col-span-full">Position & Preferences</h2>

          <div class="col-span-full">
            <label for="position_type">What type of employment arrangement are you offering?</label>
            <select id="position_type" name="position_type">
              <option value="fulltime">Full-Time</option>
              <option value="contract">Contract</option>
              <option value="internship">Internship</option>
              <option value="parttime">Part-Time</option>
            </select>
          </div>
          <div class="col-span-full">
            <label for="contact">What is your preferred way to contact you?</label>
            <select id="contact" name="contact">
              <option value="email">Email</option>
              <option value="phone">Phone Call</option>
              <option value="linkedin">LinkedIn Message</option>
            </select>
          </div>
          <div class="col-span-full">
            <label for="timeline">When are you looking to fill this role?</label>
            <select id="timeline" name="timeline">
              <option value="immediately">Immediately</option>
              <option value="one_month">Within 1 month</option>
              <option value="two_month">Within 2-3 months</option>
            </select>
          </div>

          <fieldset class="col-span-full">
            <legend>How did you first discover my portfolio website?</legend>
            <input id="find_linkedin" type="radio" name="find_method" value="find_linkedin">
            <label for="find_linkedin">LinkedIn</label>
            <input id="find_google" type="radio" name="find_method" value="find_google">
            <label for="find_google">Google Search</label>
            <input id="find_referral" type="radio" name="find_method" value="find_referral">
            <label for="find_referral">Personal Referral</label>
            
          </fieldset>

        <h2 class="col-span-full">Contact Information</h2>

          <div class="col-span-full">
            <label for="email">What is your official business email address?</label>
            <input id="email" name="email" type="email" placeholder="info@email.com">
          </div>
          <div class="col-span-full">
            <label for="job_url">What is the link to your company website?</label>
            <input id="job_url" name="job_url" type="url" placeholder="http://website.com">
          </div>
          <div class="col-span-full">
            <label for="phone_number">What is the best phone number to contact you?</label>
            <input id="phone_number" name="phone_number" type="tel" placeholder="888 888 8888">
          </div>

        <footer class="col-span-full">
          <button type="submit">Send</button>
        </footer>
      </form>
    </main>
  </body>
</html>
