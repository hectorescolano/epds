<?php require 'contents/header.php';?>
  <!-- Navbar -->
  <?php require 'contents/navbar.php';?>
  <!-- Page Container -->
  <div class="max-w-5xl mx-auto my-8 p-8 bg-white rounded-lg shadow fade-in space-y-10">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-900">CSC FORM 212 (PERSONAL DATA SHEET)</h1>
    <h5 class="text-sm"><i><strong>WARNING:</strong> Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.</i></h5>
   
    <!-- Tab Navigation -->
    <?php require 'contents/tabnav.php';?>
    
    <?php if(empty($employee_hris_data['personal'])) : ?>
        <h4 class="text-sm font-bold text-red-900">No HRIS data retrieved.</h4>
    <?php endif;?>

<div id="multiStepFormContainer" class="hidden">
    <form id="multiStepForm" method="POST" action="submit.php" class="space-y-6">



      <!-- Personal Information -->
      <?php require 'contents/personal.php';?>
      <!-- End -->

      <!-- Address -->
      <?php require 'contents/address.php';?>
      <!-- End -->

      <!-- Family Background-->
      <?php require 'contents/family.php';?>
      <!-- End -->

      <!-- Education Background-->
      <?php require 'contents/education.php';?>
      <!-- End -->

      <!-- Civil Service Eligibility -->
      <?php require 'contents/eligibility.php';?>
      <!-- End -->

      <!-- Work Experience -->
      <?php require 'contents/work.php';?>
      <!-- End -->

      <!-- Voluntary Work -->
      <?php require 'contents/involvement.php';?>
      <!-- End -->

      <!-- Learning & Development -->
      <?php require 'contents/training.php';?>
      <!-- End -->

      <!-- Other Info. -->
      <?php require 'contents/other.php';?>
      <!-- End -->


      <!-- Navigation Buttons -->
      <?php require 'contents/button_bot.php';?>
      <!-- End -->
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    </form>
</div>
  
  <?php require 'contents/data_privacy.php';?>
  <?php require 'contents/footer.php';?>
