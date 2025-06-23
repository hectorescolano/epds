<?php
  session_start();
  require_once "frameworks/DBHandler.php";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF token check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
        http_response_code(403);
        include 'csrf_error.php'; // Save the above code in csrf_error.php
        exit;
    }

  unset($_POST['csrf_token']);
  $db = new DBHandler("clusthris\clusthris", "PITCH", "sa", "MICS*write");
  

  /* Saving data */
  $dateFields = ['dob', 'child0_bday', 'child1_bday', 'child2_bday', 'child3_bday', 'child4_bday', 'child5_bday', 'child6_bday', 'child7_bday', 'child8_bday', 'child9_bday', 'elem_schoolyear_start', 'elem_schoolyear_end', 'elem_year_grad', 'second_schoolyear_start', 'second_schoolyear_end', 'second_year_grad', 'vocation_schoolyear_start', 'vocation_schoolyear_end', 'vocation_year_grad', 'college_schoolyear_start', 'college_schoolyear_end', 'college_year_grad', 'gradstudy_schoolyear_start', 'gradstudy_schoolyear_end', 'gradstudy_year_grad', 'cse_date', 'cse2_date', 'cse3_date', 'cse4_date', 'cse5_date', 'cse6_date', 'cse7_date', 'cse_validity', 'cse2_validity', 'cse3_validity', 'cse4_validity', 'cse5_validity', 'cse6_validity', 'cse7_validity', 'work_from', 'work2_from', 'work3_from', 'work4_from', 'work5_from', 'work6_from', 'work7_from', 'work8_from', 'work9_from', 'work10_from', 'work11_from', 'work12_from', 'work13_from', 'work_to', 'work2_to', 'work3_to', 'work4_to', 'work5_to', 'work6_to', 'work7_to', 'work8_to', 'work9_to', 'work10_to', 'work11_to', 'work12_to', 'work13_to', 'org_start', 'org2_start', 'org3_start', 'org4_start', 'org5_start', 'org6_start', 'org7_start', 'org_end', 'org2_end', 'org3_end', 'org4_end', 'org5_end', 'org6_end', 'org7_end', 'training_start', 'training2_start', 'training3_start', 'training4_start', 'training5_start', 'training6_start', 'training7_start', 'training8_start', 'training9_start', 'training10_start', 'training_end', 'training2_end', 'training3_end', 'training4_end', 'training5_end', 'training6_end', 'training7_end', 'training8_end', 'training9_end', 'training10_end'];

  $required_fields = [
      'first_name', 'last_name', 'dob', 'pob', 'gender', 'civilstatus',
      'height', 'weight', 'blood', 'citizenship', 'empid', 'tel', 'mobile',
      'father_first_name', 'father_middle_name', 'father_last_name',
      'mother_first_name', 'mother_middle_name', 'mother_last_name',
      'elem_school_name', 'elem_schoolyear_start', 'elem_schoolyear_end'
  ];

  // Check if all required fields are present and valid
  $missing_fields = [];
  foreach ($required_fields as $field) {
      $val = trim($_POST[$field] ?? '');
      if ($val === '' || $val === null || strtoupper($val) === 'N/A') {
          $missing_fields[] = $field;
      }
  }

  if (!empty($missing_fields)) {
      // Stop execution or handle error
      // echo "Error: Missing or invalid data in fields: " . implode(', ', $missing_fields);
      http_response_code(403);
      include 'error_missing.php'; // Save the above code in csrf_error.php
      exit;
  }

  // Continue sanitizing and processing
  $cleanedPost = [];
  foreach ($_POST as $key => $value) {
      if ($key !== 'empid') {
          if (in_array($key, $dateFields)) {
              $trimmed = trim($value);
              $cleanedPost[$key] = ($trimmed === '') ? null : $trimmed;
          } elseif (is_string($value)) {
              $trimmed = trim($value);
              $cleanedPost[$key] = $trimmed === '' ? 'N/A' : mb_strtoupper($trimmed, 'UTF-8');
          } else {
              $cleanedPost[$key] = ($value === null || $value === '') ? 'N/A' : $value;
          }
      }
  }

  // Add empid back without modifying its original value
  $cleanedPost['empid'] = $_POST['empid'];

  // Proceed with insert
  $result = $db->safeInsert("Employees_PDS", $cleanedPost, ['empid']);

    $db->close();
    unset($_SESSION['csrf_token']);
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Submission Status</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .fade-in {
      animation: fadeIn 0.8s ease-out forwards;
      opacity: 0;
    }
    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }
  </style>
</head>
<body class="bg-blue-50 min-h-screen flex flex-col">
  <!-- Preloader -->
  <div id="preloader" class="fixed inset-0 bg-white z-50 flex items-center justify-center">
    <div class="w-12 h-12 border-4 border-yellow-400 border-t-transparent rounded-full animate-spin"></div>
  </div>
  <!-- Navbar -->
  <?php require 'contents/navbar.php';?>

  <!-- Main Content -->
  <main class="flex-grow flex items-center justify-center px-4 sm:px-6 py-10 fade-in">
    <div class="bg-white shadow-xl rounded-2xl w-full max-w-md sm:max-w-lg p-6 sm:p-8 border-t-4 border-yellow-400">
      <?php
      if (!isset($result) || !is_array($result)) {
          $status = 'error';
          $message = 'No result to display. The result array is missing or invalid.';
          $skipped = [];
      } else {
          $status = $result['status'] ?? 'unknown';
          $message = $result['message'] ?? '';
          $skipped = $result['skipped_fields'] ?? [];
      }

      $statusMap = [
          'inserted' => [
              'icon' => '✅',
              'title' => 'Success!',
              'color' => 'bg-blue-100 text-blue-800 border-blue-300',
              'defaultMessage' => 'Your data has been successfully submitted.'
          ],
          'updated' => [
              'icon' => '✅',
              'title' => 'Update Success!',
              'color' => 'bg-blue-100 text-blue-800 border-blue-300',
              'defaultMessage' => 'Your data has been successfully updated.'
          ],
          'duplicate' => [
              'icon' => '⚠️',
              'title' => 'Duplicate Entry',
              'color' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
              'defaultMessage' => 'This record already exists.'
          ],
          'error' => [
              'icon' => '❌',
              'title' => 'Error',
              'color' => 'bg-red-100 text-red-700 border-red-300',
              'defaultMessage' => 'An error occurred during submission.'
          ],
          'failed' => [
              'icon' => '❌',
              'title' => 'Failed',
              'color' => 'bg-red-100 text-red-700 border-red-300',
              'defaultMessage' => 'Data insertion failed. Please try again.'
          ],
          'unknown' => [
              'icon' => '❓',
              'title' => 'Unknown Status',
              'color' => 'bg-gray-100 text-gray-600 border-gray-300',
              'defaultMessage' => 'Unknown submission result.'
          ],
      ];

      $display = $statusMap[$status] ?? $statusMap['unknown'];
      ?>

      <!-- Status Box -->
      <div class="border-l-4 <?= $display['color'] ?> p-4 rounded-md">
        <div class="flex items-start space-x-4">
          <div class="text-3xl"><?= $display['icon'] ?></div>
          <div>
            <h2 class="text-lg sm:text-xl font-semibold"><?= $display['title'] ?></h2>
            <p class="text-sm sm:text-base mt-1">
              <?= !empty($message) ? htmlspecialchars($message) : $display['defaultMessage'] ?>
            </p>
          </div>
        </div>
      </div>
      <?php //var_dump($status);?>

      <?php if($status != 'error') : ?>
        <div class="mt-8 text-center">
          <a href="https://www.cebucity.gov.ph/pitchV2/epds/download.php" class="inline-block bg-yellow-400 text-blue-900 font-medium px-4 py-2 rounded-lg hover:bg-yellow-500 transition">
            View or Download your PDS
          </a>
        </div>

      <?php else : ?>

      <!-- Go Back -->
      <div class="mt-8 text-center">
        <a href="https://www.cebucity.gov.ph/pitchV2/epds/" class="inline-block bg-yellow-400 text-blue-900 font-medium px-4 py-2 rounded-lg hover:bg-yellow-500 transition">
          ← Go Back
        </a>
      </div>

    <?php endif;?>


    </div>
  </main>
<script>
  window.addEventListener('load', function () {
    const preloader = document.getElementById('preloader');
    if (preloader) {
      preloader.style.opacity = '0';
      preloader.style.transition = 'opacity 0.5s ease';
      setTimeout(() => preloader.style.display = 'none', 500);
    }
  });
</script>

<?php require 'contents/footer.php';?>