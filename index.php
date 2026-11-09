<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Me Process Survey</title>
    <link rel="stylesheet" type="text/css" href="css/gird.css" />
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

        <footer>
          <button type="submit">Send</button>
        </footer>
      </form>
    </main>
  </body>
</html>
