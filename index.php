<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

            <label for="project_1">Project 1</label>
            <input id="project_1" type="checkbox" name="favorite_projects[]" value="project_1">
            <label for="project_2">Project 2</label>
            <input id="project_2" type="checkbox" name="favorite_projects[]" value="project_2">
            <label for="project_3">Project 3</label>
            <input id="project_3" type="checkbox" name="favorite_projects[]" value="project_3">
            <label for="project_4">Project 4</label>
            <input id="project_4" type="checkbox" name="favorite_projects[]" value="project_4">
            <label for="project_all">All Projects</label>
            <input id="project_all" type="checkbox" name="favorite_projects[]" value="project_all">
          </fieldset>

          <fieldset class="col-span-full">
            <legend>What are the main reasons for reaching out to me today?</legend>

            <label for="reason_fulltime">Full time employment</label>
            <input id="reason_fulltime" type="checkbox" name="inquiry_subject[]" value="reason_fulltime">
            <label for="reason_parttime">Part time employment</label>
            <input id="reason_parttime" type="checkbox" name="inquiry_subject[]" value="reason_parttime">
            <label for="reason_coffee">Coffee chat & Networking</label>
            <input id="reason_coffee" type="checkbox" name="inquiry_subject[]" value="reason_coffee">
            <label for="reason_feedback">General Portfolio Feedback</label>
            <input id="reason_feedback" type="checkbox" name="inquiry_subject[]" value="reason_feedback">
          </fieldset>

          <fieldset class="col-span-full">
            <legend>What types of work arrangements are available for this position?</legend>

            <label for="remote">Fully remote</label>
            <input id="remote" type="checkbox" name="work_arrangement[]" value="remote">
            <label for="hybrid">Hybrid work</label>
            <input id="hybrid" type="checkbox" name="work_arrangement[]" value="hybrid">
            <label for="onsite">Onsite Office</label>
            <input id="onsite" type="checkbox" name="work_arrangement[]" value="onsite">
          </fieldset>

        <h2 class="col-span-full">Additional details</h2>
          <div class="col-span-full">
            <label for="why_contact">What specific aspect of my portfolio made you decide to reach out? </label>
            <textarea id="why_contact" name="why_contact"></textarea>
          </div>
          <div class="col-span-full">
            <label for="job_detail">Could you share a brief overview of your team, company culture or the role you are offering? </label>
            <textarea id="job_detail" name="job_detail"></textarea>
          </div>

        <footer class="col-span-full">
          <button type="submit">Send</button>
        </footer>
      </form>
    </main>
  </body>
</html>
