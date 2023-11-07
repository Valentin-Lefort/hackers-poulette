<?php

if (!empty($honeypot)) {
  echo "Hey don't spam me";
  return;
} else {
  mail($to, $subject, $message, $header);
}
// Load the JSON file
$countries = file_get_contents('assets/json/country.json');

// Decode the JSON data into an associative array
$countries = json_decode($countries, true);
// var_dump($countries);


function sanitize($data)
{
  $data = trim($data); // Remove spaces
  $data = stripslashes($data); // Remove backslash
  $data = htmlspecialchars($data); // Convert all char into html char
  return $data;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $firstname = sanitize($_POST['firstName']);
  $lastname = sanitize($_POST['lastName']);
  $email = sanitize($_POST['email']);
  $gender = sanitize($_POST['gender']);
  $subject = sanitize($_POST['subject']);
  $country = sanitize($_POST['country']);
  $message = sanitize($_POST['message']);

  // echo '<pre>';
  // print_r($_POST);
  // echo '</pre>';
  include('mailing.php');
}



?>
<script defer src="./assets/js/script.js"></script>
<main class="bg-colors2 flex justify-center h-full">
  <div class="w-5/6">
    <form id="AddData" method="POST" onsubmit="validateForm();" class=" font-bellota w-full">
      <div class="relative z-0 w-full mb-6 group">
        <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="What's your email ? eg: johndoe@gmail.com" required />
        <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-colors1 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Email address</label>
        <span class="text-colors1" id="mail-error"></span>
      </div>
      <div class="relative z-0 w-full mb-6 group">
        <select name="lastName" id="lastName" class="block text-center py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
        <option value="select">Select your Gender</option>
        <option value="Mr">Mr</option>
        <option value="Mrs">Mrs</option>
        <option value="Miss">Miss</option>
        <option value="undefined">Undefined</option>
        </select> <label for="floating_gender" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-colors1 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Gender</label>
      </div>
      <div class="relative z-0 w-full mb-6 group">
        <select name="country" id="country" class="block text-center py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
          <option value="select" hidden>Select your country</option>
          <?php foreach ($countries as $country) : ?>
            <?php echo "<option value='"
              . $country['name'] . "'>" . $country['name'] . "</option>"; ?>
          <?php endforeach; ?>
        </select>
        <label for="country" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-colors1 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Country</label>
      </div>

      <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-6 group">
          <input type="text" name="firstName" id="firstName" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="What's your frist name? eg: John" required />
          <label for="firstName" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-colors1 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">First name</label>
          <span class="text-colors1" id="firstName-error"></span>
        </div>
        <div class="relative z-0 w-full mb-6 group">
          <input type="text" name="lastName" id="firstName" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="What's your last name? eg: Doe" required />
          <label for="lastName" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-colors1 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Last name</label>
          <span class="error-message text-white" id="lastName-error"></span>
        </div>
      </div>
      <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-6 group">
          <select name="selectInput" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer text-center">
            <option value="select" hidden>Select a subject</option>
            <option value="sub1">Subject 1</option>
            <option value="sub2">Subject 2</option>
            <option value="sub3">Subject 3</option>
          </select>
          <label for="selectInput" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-colors1 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Reason</label>
          <span class="error-message" id="subject-error"></span>
        </div>
        <div class="relative z-0 w-full mb-6 group">
          <input type="text" name="message" id="message" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="What's the issue? eg: i'm stuck" required />
          <label for="message" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-colors1 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Issue</label>
          <span class="error-message text-colors1" id="message-error"></span>
        </div>
      </div>
      <button type="submit" class="block py-2.5 px-0 w-2/3 m-auto  text-sm text-gray-900 bg-transparent border border-gray-300 appearance-none dark:text-white peer">Submit</button>
    </form>
  </div>
</main>