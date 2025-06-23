<?php 
	require "frameworks/DBHandler.php";

	/* GET EMPLOYEE ID FROM WORDRESS COOKIES */
    function array_key_exists_wildcard ( $array, $search, $return = 'key-value' ) {
        $search = str_replace( '\*', '.*?', preg_quote( $search, '/' ) );
        $result = preg_grep( '/^' . $search . '$/i', array_keys( $array ) );
        if ( $return == 'key-value' )
            return array_intersect_key( $array, array_flip( $result ) );
        return $result;
    }

    $value = array_key_exists_wildcard($_COOKIE,"wordpress_logged_in_*");
    $logged_user_cookie = explode("|",end($value));
    $empid = $logged_user_cookie[0];

    // $empid = '52082';
    
    $db = new DBHandler("clusthris\clusthris", "PITCH", "sa", "MICS*write");

    /* Fetch Data */
    $data = $db->fetchAll("Employees_PDS", ["empid" => $empid]);

    // $data = array();
    // $data[0] = array();
    
    

    $employee_id = $data[0]['empid'] ?? '';
    $last_name = $data[0]['last_name'] ?? '';
    $first_name = $data[0]['first_name'] ?? '';
    $middle_name = $data[0]['middle_name'] ?? '';
    $ext_name = $data[0]['ext_name'] ?? '';
    $dob = $data[0]['dob']->format('F j, Y') ?? '';

    // echo "<pre>";
    // var_dump($employee_id);
    // echo "</pre>";
   	

    // $pob = $data[0]['pob'] ?? '';
    // $gender = $data[0]['gender'] ?? '';
    // $civilstatus = $data[0]['civilstatus'] ?? '';
    // $height = $data[0]['height'] ?? '';
    // $weight = $data[0]['weight'] ?? '';
    // $citizenship = $data[0]['citizenship'] ?? '';
    // $blood = $data[0]['blood'] ?? '';

    // $gsis = $data[0]['gsis'] ?? '';
    // $pagibig = $data[0]['pagibig'] ?? '';
    // $philhealth = $data[0]['philhealth'] ?? '';
    // $sss = $data[0]['sss'] ?? '';
    // $tin = $data[0]['tin'] ?? '';

    // $emailadd = $data[0]['emailadd'] ?? '';
    // $mobile = $data[0]['mobile'] ?? '';
    // $tel = $data[0]['tel'] ?? '';

    // $spouse_last_name = $data[0]['spouse_last_name'] ?? '';
    // $spouse_first_name = $data[0]['spouse_first_name'] ?? '';
    // $spouse_middle_name = $data[0]['spouse_middle_name'] ?? '';
    // $spouse_ext_name = $data[0]['spouse_ext_name'] ?? '';
    // $spouse_work = $data[0]['spouse_work'] ?? '';
    // $spouse_employer = $data[0]['spouse_employer'] ?? '';
    // $spouse_address = $data[0]['spouse_address'] ?? '';
    // $spouse_telephone = $data[0]['spouse_telephone'] ?? '';

    // $child0_name = $data[0]['child0_name'] ?? '';
    // $child0_bday = $data[0]['child0_bday'] ?? '';

    // $child1_name = $data[0]['child1_name'] ?? '';
    // $child1_bday = $data[0]['child1_bday'] ?? '';

    // $child2_name = $data[0]['child2_name'] ?? '';
    // $child2_bday = $data[0]['child2_bday'] ?? '';

    // $child3_name = $data[0]['child3_name'] ?? '';
    // $child3_bday = $data[0]['child3_bday'] ?? '';

    // $child4_name = $data[0]['child4_name'] ?? '';
    // $child4_bday = $data[0]['child4_bday'] ?? '';

    // $child5_name = $data[0]['child5_name'] ?? '';
    // $child5_bday = $data[0]['child5_bday'] ?? '';

    // $child6_name = $data[0]['child6_name'] ?? '';
    // $child6_bday = $data[0]['child6_bday'] ?? '';

    // $child7_name = $data[0]['child7_name'] ?? '';
    // $child7_bday = $data[0]['child7_bday'] ?? '';

    // $child8_name = $data[0]['child8_name'] ?? '';
    // $child8_bday = $data[0]['child8_bday'] ?? '';

    // $child9_name = $data[0]['child9_name'] ?? '';
    // $child9_bday = $data[0]['child9_bday'] ?? '';

    // $father_last_name = $data[0]['father_last_name'] ?? '';
    // $father_first_name = $data[0]['father_first_name'] ?? '';
    // $father_middle_name = $data[0]['father_middle_name'] ?? '';
    // $father_extname = $data[0]['father_extname'] ?? '';
    // $mother_last_name = $data[0]['mother_last_name'] ?? '';
    // $mother_first_name = $data[0]['mother_first_name'] ?? '';
    // $mother_middle_name = $data[0]['mother_middle_name'] ?? '';

    // $elem_school_name = $data[0]['elem_school_name'] ?? '';
    // $elem_educ_name = $data[0]['elem_educ_name'] ?? '';
    // $elem_schoolyear_start = $data[0]['elem_schoolyear_start'] ?? '';
    // $elem_schoolyear_end = $data[0]['elem_schoolyear_end'] ?? '';
    // $elem_earn = $data[0]['elem_earn'] ?? '';
    // $elem_year_grad = $data[0]['elem_year_grad'] ?? '';
    // $elem_scholar = $data[0]['elem_scholar'] ?? '';

    // $second_school_name = $data[0]['second_school_name'] ?? '';
    // $second_educ_name = $data[0]['second_educ_name'] ?? '';
    // $second_schoolyear_start = $data[0]['second_schoolyear_start'] ?? '';
    // $second_schoolyear_end = $data[0]['second_schoolyear_end'] ?? '';
    // $second_earn = $data[0]['second_earn'] ?? '';
    // $second_year_grad = $data[0]['second_year_grad'] ?? '';
    // $second_scholar = $data[0]['second_scholar'] ?? '';

    // $vocation_school_name = $data[0]['vocation_school_name'] ?? '';
    // $vocation_educ_name = $data[0]['vocation_educ_name'] ?? '';
    // $vocation_schoolyear_start = $data[0]['vocation_schoolyear_start'] ?? '';
    // $vocation_schoolyear_end = $data[0]['vocation_schoolyear_end'] ?? '';
    // $vocation_earn = $data[0]['vocation_earn'] ?? '';
    // $vocation_year_grad = $data[0]['vocation_year_grad'] ?? '';
    // $vocation_scholar = $data[0]['vocation_scholar'] ?? '';

    // $college_school_name = $data[0]['college_school_name'] ?? '';
    // $college_educ_name = $data[0]['college_educ_name'] ?? '';
    // $college_schoolyear_start = $data[0]['college_schoolyear_start'] ?? '';
    // $college_schoolyear_end = $data[0]['college_schoolyear_end'] ?? '';
    // $college_earn = $data[0]['college_earn'] ?? '';
    // $college_year_grad = $data[0]['college_year_grad'] ?? '';
    // $college_scholar = $data[0]['college_scholar'] ?? '';

    // $gradstudy_school_name = $data[0]['gradstudy_school_name'] ?? '';
    // $gradstudy_educ_name = $data[0]['gradstudy_educ_name'] ?? '';
    // $gradstudy_schoolyear_start = $data[0]['gradstudy_schoolyear_start'] ?? '';
    // $gradstudy_schoolyear_end = $data[0]['gradstudy_schoolyear_end'] ?? '';
    // $gradstudy_earn = $data[0]['gradstudy_earn'] ?? '';
    // $gradstudy_year_grad = $data[0]['gradstudy_year_grad'] ?? '';
    // $gradstudy_scholar = $data[0]['gradstudy_scholar'] ?? '';

    // $cse_name = $data[0]['cse_name'] ?? '';
    // $cse_date = $data[0]['cse_date'] ?? '';
    // $cse_loc = $data[0]['cse_loc'] ?? '';
    // $cse_license = $data[0]['cse_license'] ?? '';
    // $cse_validity = $data[0]['cse_validity'] ?? '';

    // $cse2_name = $data[0]['cse2_name'] ?? '';
    // $cse2_date = $data[0]['cse2_date'] ?? '';
    // $cse2_loc = $data[0]['cse2_loc'] ?? '';
    // $cse2_license = $data[0]['cse2_license'] ?? '';
    // $cse2_validity = $data[0]['cse2_validity'] ?? '';

    // $cse3_name = $data[0]['cse3_name'] ?? '';
    // $cse3_date = $data[0]['cse3_date'] ?? '';
    // $cse3_loc = $data[0]['cse3_loc'] ?? '';
    // $cse3_license = $data[0]['cse3_license'] ?? '';
    // $cse3_validity = $data[0]['cse3_validity'] ?? '';

    // $cse4_name = $data[0]['cse4_name'] ?? '';
    // $cse4_date = $data[0]['cse4_date'] ?? '';
    // $cse4_loc = $data[0]['cse4_loc'] ?? '';
    // $cse4_license = $data[0]['cse4_license'] ?? '';
    // $cse4_validity = $data[0]['cse4_validity'] ?? '';

    // $cse5_name = $data[0]['cse5_name'] ?? '';
    // $cse5_date = $data[0]['cse5_date'] ?? '';
    // $cse5_loc = $data[0]['cse5_loc'] ?? '';
    // $cse5_license = $data[0]['cse5_license'] ?? '';
    // $cse5_validity = $data[0]['cse5_validity'] ?? '';

    // $cse6_name = $data[0]['cse6_name'] ?? '';
    // $cse6_date = $data[0]['cse6_date'] ?? '';
    // $cse6_loc = $data[0]['cse6_loc'] ?? '';
    // $cse6_license = $data[0]['cse6_license'] ?? '';
    // $cse6_validity = $data[0]['cse6_validity'] ?? '';

    // $cse7_name = $data[0]['cse7_name'] ?? '';
    // $cse7_date = $data[0]['cse7_date'] ?? '';
    // $cse7_loc = $data[0]['cse7_loc'] ?? '';
    // $cse7_license = $data[0]['cse7_license'] ?? '';
    // $cse7_validity = $data[0]['cse7_validity'] ?? '';

    // $ref1_name = $data[0]['ref1_name'] ?? '';
    // $ref2_name = $data[0]['ref2_name'] ?? '';
    // $ref3_name = $data[0]['ref3_name'] ?? '';
    // $ref1_address = $data[0]['ref1_address'] ?? '';
    // $ref2_address = $data[0]['ref2_address'] ?? '';
    // $ref3_address = $data[0]['ref3_address'] ?? '';
    // $ref1_contact = $data[0]['ref1_contact'] ?? '';
    // $ref2_contact = $data[0]['ref2_contact'] ?? '';
    // $ref3_contact = $data[0]['ref3_contact'] ?? '';

    // $res_lot = $data[0]['res_lot'] ?? '';
    // $res_street = $data[0]['res_street'] ?? '';
    // $res_village = $data[0]['res_village'] ?? '';
    // $res_barangay = $data[0]['res_barangay'] ?? '';
    // $res_city = $data[0]['res_city'] ?? '';
    // $res_province = $data[0]['res_province'] ?? '';
    // $res_zipcode = $data[0]['res_zipcode'] ?? '';

    // $per_lot = $data[0]['per_lot'] ?? '';
    // $per_street = $data[0]['per_street'] ?? '';
    // $per_village = $data[0]['per_village'] ?? '';
    // $per_barangay = $data[0]['per_barangay'] ?? '';
    // $per_city = $data[0]['per_city'] ?? '';
    // $per_province = $data[0]['per_province'] ?? '';
    // $per_zipcode = $data[0]['per_zipcode'] ?? '';

    // $work_from = $data[0]['work_from'] ?? '';
    // $work_to = $data[0]['work_to'] ?? '';
    // $work_position = $data[0]['work_position'] ?? '';
    // $work_dept = $data[0]['work_dept'] ?? '';
    // $work_salary = $data[0]['work_salary'] ?? '';
    // $work_sg = $data[0]['work_sg'] ?? '';
    // $work_status = $data[0]['work_status'] ?? '';

    // $work2_from = $data[0]['work2_from'] ?? '';
    // $work2_to = $data[0]['work2_to'] ?? '';
    // $work2_position = $data[0]['work2_position'] ?? '';
    // $work2_dept = $data[0]['work2_dept'] ?? '';
    // $work2_salary = $data[0]['work2_salary'] ?? '';
    // $work2_sg = $data[0]['work2_sg'] ?? '';
    // $work2_status = $data[0]['work2_status'] ?? '';

    // $work3_from = $data[0]['work3_from'] ?? '';
    // $work3_to = $data[0]['work3_to'] ?? '';
    // $work3_position = $data[0]['work3_position'] ?? '';
    // $work3_dept = $data[0]['work3_dept'] ?? '';
    // $work3_salary = $data[0]['work3_salary'] ?? '';
    // $work3_sg = $data[0]['work3_sg'] ?? '';
    // $work3_status = $data[0]['work3_status'] ?? '';

    // $work4_from = $data[0]['work4_from'] ?? '';
    // $work4_to = $data[0]['work4_to'] ?? '';
    // $work4_position = $data[0]['work4_position'] ?? '';
    // $work4_dept = $data[0]['work4_dept'] ?? '';
    // $work4_salary = $data[0]['work4_salary'] ?? '';
    // $work4_sg = $data[0]['work4_sg'] ?? '';
    // $work4_status = $data[0]['work4_status'] ?? '';

    // $work5_from = $data[0]['work5_from'] ?? '';
    // $work5_to = $data[0]['work5_to'] ?? '';
    // $work5_position = $data[0]['work5_position'] ?? '';
    // $work5_dept = $data[0]['work5_dept'] ?? '';
    // $work5_salary = $data[0]['work5_salary'] ?? '';
    // $work5_sg = $data[0]['work5_sg'] ?? '';
    // $work5_status = $data[0]['work5_status'] ?? '';

    // $work6_from = $data[0]['work6_from'] ?? '';
    // $work6_to = $data[0]['work6_to'] ?? '';
    // $work6_position = $data[0]['work6_position'] ?? '';
    // $work6_dept = $data[0]['work6_dept'] ?? '';
    // $work6_salary = $data[0]['work6_salary'] ?? '';
    // $work6_sg = $data[0]['work6_sg'] ?? '';
    // $work6_status = $data[0]['work6_status'] ?? '';

    // $work7_from = $data[0]['work7_from'] ?? '';
    // $work7_to = $data[0]['work7_to'] ?? '';
    // $work7_position = $data[0]['work7_position'] ?? '';
    // $work7_dept = $data[0]['work7_dept'] ?? '';
    // $work7_salary = $data[0]['work7_salary'] ?? '';
    // $work7_sg = $data[0]['work7_sg'] ?? '';
    // $work7_status = $data[0]['work7_status'] ?? '';

    // $work8_from = $data[0]['work8_from'] ?? '';
    // $work8_to = $data[0]['work8_to'] ?? '';
    // $work8_position = $data[0]['work8_position'] ?? '';
    // $work8_dept = $data[0]['work8_dept'] ?? '';
    // $work8_salary = $data[0]['work8_salary'] ?? '';
    // $work8_sg = $data[0]['work8_sg'] ?? '';
    // $work8_status = $data[0]['work8_status'] ?? '';

    // $work9_from = $data[0]['work9_from'] ?? '';
    // $work9_to = $data[0]['work9_to'] ?? '';
    // $work9_position = $data[0]['work9_position'] ?? '';
    // $work9_dept = $data[0]['work9_dept'] ?? '';
    // $work9_salary = $data[0]['work9_salary'] ?? '';
    // $work9_sg = $data[0]['work9_sg'] ?? '';
    // $work9_status = $data[0]['work9_status'] ?? '';

    // $work10_from = $data[0]['work10_from'] ?? '';
    // $work10_to = $data[0]['work10_to'] ?? '';
    // $work10_position = $data[0]['work10_position'] ?? '';
    // $work10_dept = $data[0]['work10_dept'] ?? '';
    // $work10_salary = $data[0]['work10_salary'] ?? '';
    // $work10_sg = $data[0]['work10_sg'] ?? '';
    // $work10_status = $data[0]['work10_status'] ?? '';

    // $work11_from = $data[0]['work11_from'] ?? '';
    // $work11_to = $data[0]['work11_to'] ?? '';
    // $work11_position = $data[0]['work11_position'] ?? '';
    // $work11_dept = $data[0]['work11_dept'] ?? '';
    // $work11_salary = $data[0]['work11_salary'] ?? '';
    // $work11_sg = $data[0]['work11_sg'] ?? '';
    // $work11_status = $data[0]['work11_status'] ?? '';

    // $work12_from = $data[0]['work12_from'] ?? '';
    // $work12_to = $data[0]['work12_to'] ?? '';
    // $work12_position = $data[0]['work12_position'] ?? '';
    // $work12_dept = $data[0]['work12_dept'] ?? '';
    // $work12_salary = $data[0]['work12_salary'] ?? '';
    // $work12_sg = $data[0]['work12_sg'] ?? '';
    // $work12_status = $data[0]['work12_status'] ?? '';

    // $work13_from = $data[0]['work13_from'] ?? '';
    // $work13_to = $data[0]['work13_to'] ?? '';
    // $work13_position = $data[0]['work13_position'] ?? '';
    // $work13_dept = $data[0]['work13_dept'] ?? '';
    // $work13_salary = $data[0]['work13_salary'] ?? '';
    // $work13_sg = $data[0]['work13_sg'] ?? '';
    // $work13_status = $data[0]['work13_status'] ?? '';

    // $org_name = $data[0]['org_name'] ?? '';
    // $org_start = $data[0]['org_start'] ?? '';
    // $org_end = $data[0]['org_end'] ?? '';
    // $org_hours = $data[0]['org_hours'] ?? '';
    // $org_position = $data[0]['org_position'] ?? '';

    // $org2_name = $data[0]['org2_name'] ?? '';
    // $org2_start = $data[0]['org2_start'] ?? '';
    // $org2_end = $data[0]['org2_end'] ?? '';
    // $org2_hours = $data[0]['org2_hours'] ?? '';
    // $org2_position = $data[0]['org2_position'] ?? '';

    // $org3_name = $data[0]['org3_name'] ?? '';
    // $org3_start = $data[0]['org3_start'] ?? '';
    // $org3_end = $data[0]['org3_end'] ?? '';
    // $org3_hours = $data[0]['org3_hours'] ?? '';
    // $org3_position = $data[0]['org3_position'] ?? '';

    // $org4_name = $data[0]['org4_name'] ?? '';
    // $org4_start = $data[0]['org4_start'] ?? '';
    // $org4_end = $data[0]['org4_end'] ?? '';
    // $org4_hours = $data[0]['org4_hours'] ?? '';
    // $org4_position = $data[0]['org4_position'] ?? '';

    // $org5_name = $data[0]['org5_name'] ?? '';
    // $org5_start = $data[0]['org5_start'] ?? '';
    // $org5_end = $data[0]['org5_end'] ?? '';
    // $org5_hours = $data[0]['org5_hours'] ?? '';
    // $org5_position = $data[0]['org5_position'] ?? '';

    // $org6_name = $data[0]['org6_name'] ?? '';
    // $org6_start = $data[0]['org6_start'] ?? '';
    // $org6_end = $data[0]['org6_end'] ?? '';
    // $org6_hours = $data[0]['org6_hours'] ?? '';
    // $org6_position = $data[0]['org6_position'] ?? '';

    // $org7_name = $data[0]['org7_name'] ?? '';
    // $org7_start = $data[0]['org7_start'] ?? '';
    // $org7_end = $data[0]['org7_end'] ?? '';
    // $org7_hours = $data[0]['org7_hours'] ?? '';
    // $org7_position = $data[0]['org7_position'] ?? '';

    // $training_name = $data[0]['training_name'] ?? '';
    // $training_start = $data[0]['training_start'] ?? '';
    // $training_end = $data[0]['training_end'] ?? '';
    // $training_hours = $data[0]['training_hours'] ?? '';
    // $training_type = $data[0]['training_type'] ?? '';
    // $training_conduct = $data[0]['training_conduct'] ?? '';

    // $training2_name = $data[0]['training2_name'] ?? '';
    // $training2_start = $data[0]['training2_start'] ?? '';
    // $training2_end = $data[0]['training2_end'] ?? '';
    // $training2_hours = $data[0]['training2_hours'] ?? '';
    // $training2_type = $data[0]['training2_type'] ?? '';
    // $training2_conduct = $data[0]['training2_conduct'] ?? '';

    // $training3_name = $data[0]['training3_name'] ?? '';
    // $training3_start = $data[0]['training3_start'] ?? '';
    // $training3_end = $data[0]['training3_end'] ?? '';
    // $training3_hours = $data[0]['training3_hours'] ?? '';
    // $training3_type = $data[0]['training3_type'] ?? '';
    // $training3_conduct = $data[0]['training3_conduct'] ?? '';

    // $training4_name = $data[0]['training4_name'] ?? '';
    // $training4_start = $data[0]['training4_start'] ?? '';
    // $training4_end = $data[0]['training4_end'] ?? '';
    // $training4_hours = $data[0]['training4_hours'] ?? '';
    // $training4_type = $data[0]['training4_type'] ?? '';
    // $training4_conduct = $data[0]['training4_conduct'] ?? '';

    // $training5_name = $data[0]['training5_name'] ?? '';
    // $training5_start = $data[0]['training5_start'] ?? '';
    // $training5_end = $data[0]['training5_end'] ?? '';
    // $training5_hours = $data[0]['training5_hours'] ?? '';
    // $training5_type = $data[0]['training5_type'] ?? '';
    // $training5_conduct = $data[0]['training5_conduct'] ?? '';

    // $training6_name = $data[0]['training6_name'] ?? '';
    // $training6_start = $data[0]['training6_start'] ?? '';
    // $training6_end = $data[0]['training6_end'] ?? '';
    // $training6_hours = $data[0]['training6_hours'] ?? '';
    // $training6_type = $data[0]['training6_type'] ?? '';
    // $training6_conduct = $data[0]['training6_conduct'] ?? '';

    // $training7_name = $data[0]['training7_name'] ?? '';
    // $training7_start = $data[0]['training7_start'] ?? '';
    // $training7_end = $data[0]['training7_end'] ?? '';
    // $training7_hours = $data[0]['training7_hours'] ?? '';
    // $training7_type = $data[0]['training7_type'] ?? '';
    // $training7_conduct = $data[0]['training7_conduct'] ?? '';

    // $training8_name = $data[0]['training8_name'] ?? '';
    // $training8_start = $data[0]['training8_start'] ?? '';
    // $training8_end = $data[0]['training8_end'] ?? '';
    // $training8_hours = $data[0]['training8_hours'] ?? '';
    // $training8_type = $data[0]['training8_type'] ?? '';
    // $training8_conduct = $data[0]['training8_conduct'] ?? '';

    // $training9_name = $data[0]['training9_name'] ?? '';
    // $training9_start = $data[0]['training9_start'] ?? '';
    // $training9_end = $data[0]['training9_end'] ?? '';
    // $training9_hours = $data[0]['training9_hours'] ?? '';
    // $training9_type = $data[0]['training9_type'] ?? '';
    // $training9_conduct = $data[0]['training9_conduct'] ?? '';

    // $training10_name = $data[0]['training10_name'] ?? '';
    // $training10_start = $data[0]['training10_start'] ?? '';
    // $training10_end = $data[0]['training10_end'] ?? '';
    // $training10_hours = $data[0]['training10_hours'] ?? '';
    // $training10_type = $data[0]['training10_type'] ?? '';
    // $training10_conduct = $data[0]['training10_conduct'] ?? '';

    // $ssh_name1 = $data[0]['ssh_name1'] ?? '';
    // $ssh_name2 = $data[0]['ssh_name2'] ?? '';
    // $ssh_name3 = $data[0]['ssh_name3'] ?? '';
    // $ssh_name4 = $data[0]['ssh_name4'] ?? '';

    // $nadr_name1 = $data[0]['nadr_name1'] ?? '';
    // $nadr_name2 = $data[0]['nadr_name2'] ?? '';
    // $nadr_name3 = $data[0]['nadr_name3'] ?? '';
    // $nadr_name4 = $data[0]['nadr_name4'] ?? '';

    // $miao_name1 = $data[0]['miao_name1'] ?? '';
    // $miao_name2 = $data[0]['miao_name2'] ?? '';
    // $miao_name3 = $data[0]['miao_name3'] ?? '';
    // $miao_name4 = $data[0]['miao_name4'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>e-PDS | Download and View</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --primary-color: #1e3a8a; /* Blue */
      --accent-color: #facc15;  /* Yellow */
    }
    .fade-in {
      animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  
    #preloader {
        transition: opacity 0.5s ease, visibility 0.5s ease;
      }
  </style>
</head>
<body class="bg-blue-50 text-gray-800 font-sans">
	
	<?php require 'contents/navbar.php';?>
	  
    <!-- Preloader -->
<div id="preloader" class="fixed inset-0 bg-white flex flex-col items-center justify-center z-50">
  <p class="mb-4 text-gray-700 text-lg">Loading page...</p>
  <div class="w-64 h-2 bg-gray-200 rounded overflow-hidden">
    <div id="preloader-bar" class="h-full bg-blue-600 w-0 transition-all duration-300 ease-linear"></div>
  </div>
</div>


	<!-- Main Content -->
	<div id="print-content" class="max-w-5xl mx-auto my-8 p-8 bg-white rounded-lg shadow fade-in space-y-10">
		  <!-- Header -->
		  <!-- <div>
		    <h1 class="text-3xl font-bold text-blue-900 mb-2">Personal Data Sheet (View Only)</h1>
		    <hr class="border-t-2 border-blue-300">
		    <div class="flex justify-end gap-3 mb-4 mt-4">
			  <button onclick="printPDS()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Print</button>
			</div>
		  </div> -->
	</div>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
	<script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>

	<script>
	  function printPDS() {
	    const printContents = document.getElementById("print-content").innerHTML;
	    const originalContents = document.body.innerHTML;

	    document.body.innerHTML = printContents;
	    window.print();
	    document.body.innerHTML = originalContents;
	    window.location.reload(); // reload to restore JS and layout
	  }

     document.addEventListener("DOMContentLoaded", () => {
            const preloader = document.getElementById('preloader');
            const bar = document.getElementById('preloader-bar');
            let progress = 0;

            const interval = setInterval(() => {
              progress += Math.random() * 10; // simulate loading
              if (progress >= 100) {
                progress = 100;
                clearInterval(interval);
                // Smoothly hide preloader
                preloader.classList.add('opacity-0');
                preloader.classList.add('invisible');
                setTimeout(() => preloader.remove(), 500);
              }
              bar.style.width = `${progress}%`;
            }, 200);
          });
	

	</script>

</body>
</html>
