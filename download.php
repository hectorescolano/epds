<?php 
    require "pds_data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>e-PDS | Download and View</title>
  <!-- jQuery & jQuery UI -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Custom Script -->
  <script src="frameworks/script.js?v=<?= time(); ?>"></script>

  <!-- Theme Colors -->
  <style>
    :root {
      --blue: #1e3a8a;
      --yellow: #facc15;
    }
    html {
      scroll-behavior: smooth;
    }
    #preloader {
        transition: opacity 0.5s ease, visibility 0.5s ease;
      }
  </style>
</head>
<body class="bg-gray-100 font-sans">
	<?php require 'contents/preloader.php';?>
	<?php require 'contents/navbar.php';?>
	  


	<!-- Main Content -->
	<div id="print-content" class="max-w-5xl mx-auto my-8 p-8 bg-white rounded-lg shadow fade-in space-y-10">

		  <!-- Header -->
		  <div>
		    <h1 class="text-3xl font-bold text-blue-900 mb-2">Personal Data Sheet (View Only)</h1>
		    <hr class="border-t-2 border-blue-300">
            <?php if(!empty($data)) : ?>
    		    <div class="flex justify-end gap-3 mb-4 mt-4">
    			  <a href="https://www.cebucity.gov.ph/pitchV2/epds/update_pds.php" class="flex items-center justify-end bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1v-4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4a1 1 0 0 1-1 1H9Z" clip-rule="evenodd"/>
</svg>
 Print or Download</a>
    			</div>
            <?php else :?>
                <h4 class="text-xl font-semibold text-red-900 mb-4">No data recorded yet.</h4>
                <!-- <a href='https://www.cebucity.gov.ph/pitchV2/epds/' class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center me-2 mb-2">Submit here
                </a> -->
                <a href="https://www.cebucity.gov.ph/pitchV2/epds/" class="font-medium text-blue-600 hover:underline">Click here to submit new PDS data.</a>

            <?php endif;?>
		    
		  </div>


          <?php if(!empty($data)) : ?>

		  <!-- Personal Info -->
		  <h2 class="text-2xl font-bold text-blue-900 mb-4">PERSONAL BACKGROUND</h2>
		  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
		    <div class="space-y-1">
		      <p><strong>Employee ID:</strong> <?=$employee_id;?></p>
		      <p><strong>Name:</strong> <?=$first_name.' '.$middle_name.' '.$last_name;?></p>
		      <p><strong>Date of Birth:</strong> <?=$dob;?></p>
		      <p><strong>Place of Birth:</strong> <?=$pob;?></p>
		      <p><strong>Gender:</strong> <?=$gender;?></p>
		      <p><strong>Civil Status:</strong> <?=$civilstatus;?></p>
		      <p><strong>Citizenship:</strong> <?=$citizenship;?></p>
		    </div>
		    <div class="space-y-1">
		      <p><strong>Email:</strong> <?=$emailadd;?></p>
		      <p><strong>Mobile:</strong> <?=$mobile;?></p>
		      <p><strong>Blood Type:</strong> <?=$blood;?></p>
		      <p><strong>Height:</strong> <?=$height;?> m</p>
		      <p><strong>Weight:</strong> <?=$weight;?> kg</p>
		      <p><strong>GSIS:</strong> <?=$gsis;?></p>
		      <p><strong>Pag-IBIG:</strong> <?=$pagibig;?></p>
		      <p><strong>TIN:</strong> <?=$tin;?></p>
		      <p><strong>Phil-Health:</strong> <?=$philhealth;?></p>
		    </div>
		  </div>

		  <!-- Address -->
		  <div>
		    <h2 class="text-2xl font-bold text-blue-900 mb-4">ADDRESS</h2>
		    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
		      <div>
		        <label class="font-medium">Lot/Block No.</label>
		        <input type="text" value="<?=$res_lot;?>" class="w-full border px-2 py-1 rounded" readonly />
		      </div>
		      <div>
		        <label class="font-medium">Street</label>
		        <input type="text" value="<?=$res_street;?>" class="w-full border px-2 py-1 rounded" readonly />
		      </div>
		      <div>
		        <label class="font-medium">Village</label>
		        <input type="text" value="<?=$res_village;?>" class="w-full border px-2 py-1 rounded" readonly />
		      </div>
		      <div>
		        <label class="font-medium">Barangay</label>
		        <input type="text" value="<?=$res_barangay;?>" class="w-full border px-2 py-1 rounded" readonly />
		      </div>
		      <div>
		        <label class="font-medium">City</label>
		        <input type="text" value="<?=$res_city;?>" class="w-full border px-2 py-1 rounded" readonly />
		      </div>
		      <div>
		        <label class="font-medium">Province</label>
		        <input type="text" value="<?=$res_province;?>" class="w-full border px-2 py-1 rounded" readonly />
		      </div>
		      <div>
		        <label class="font-medium">Zip-Code</label>
		        <input type="text" value="<?=$res_zipcode;?>" class="w-full border px-2 py-1 rounded" readonly />
		      </div>
		    </div>
		  </div>

		  <!-- Family Section -->
		  <div>
		    <!-- Spouse -->
		    <div>
		      <h2 class="text-2xl font-bold text-blue-900 mb-4">SPOUSE INFORMATION</h2>
		      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
		        <div>
		          <label class="font-medium">First Name</label>
		          <input type="text" value="<?=$spouse_first_name;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">Middle Name</label>
		          <input type="text" value="<?=$spouse_middle_name;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">Last Name</label>
		          <input type="text" value="<?=$spouse_last_name;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">Name Extension</label>
		          <input type="text" value="<?=$spouse_ext_name;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		      </div>
		      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
		        <div>
		          <label class="font-medium">Occupation</label>
		          <input type="text" value="<?=$spouse_work;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">Employer/Business Name</label>
		          <input type="text" value="<?=$spouse_employer;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">Business Address</label>
		          <input type="text" value="<?=$spouse_address;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">Telephone No.</label>
		          <input type="text" value="<?=$spouse_telephone;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		      </div>
		    </div>

		    <!-- Father -->
		    <div>
		      <h2 class="text-2xl font-bold text-blue-900 mb-4 mt-4">FATHER'S NAME</h2>
		      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
		        <div>
		          <label class="font-medium">First Name</label>
		          <input type="text" value="<?=$father_first_name;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">Middle Name</label>
		          <input type="text" value="<?=$father_middle_name;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">Last Name</label>
		          <input type="text" value="<?=$father_last_name;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">Name Extension</label>
		          <input type="text" value="<?=$father_extname;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		      </div>
		    </div>

		    <!-- Mother -->
		    <div>
		      <h2 class="text-2xl font-bold text-blue-900 mb-4 mt-4">MOTHER'S MAIDEN NAME</h2>
		      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
		        <div>
		          <label class="font-medium">Surname</label>
		          <input type="text" value="<?=$mother_last_name;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">First Name</label>
		          <input type="text" value="<?=$mother_first_name;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		        <div>
		          <label class="font-medium">Middle Name</label>
		          <input type="text" value="<?=$mother_middle_name;?>" class="w-full border px-2 py-1 rounded" readonly />
		        </div>
		      </div>
		    </div>
		  </div>

		  <!-- Children -->
		  <div>
		    <h2 class="text-2xl font-bold text-blue-900 mb-4 mt-4">CHILDREN</h2>
		    <div class="overflow-x-auto">
		      <table class="w-full border border-gray-300 text-sm">
		        <thead class="bg-gray-100 text-left">
		          <tr>
		            <th class="border px-3 py-2 w-2/3">Name of Children</th>
		            <th class="border px-3 py-2 w-1/3">Date of Birth <span class="text-xs font-normal">(mm/dd/yyyy)</span></th>
		          </tr>
		        </thead>
		        <tbody>

		        	<?php if(!empty($children) ) : ?>
		          <?php foreach($children as $child) : ?>
		          <tr>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($child['name']);?></td>
    						<td class="border px-3 py-2 h-10"><?=htmlspecialchars($child['bday']);?></td>
		          </tr>
		          <?php endforeach; ?>
		        	<?php else :?>
		        		<tr>
		            	<td class="border px-3 py-2 h-10" colspan="2">No data retrieved.</td>
		          	</tr>
		        	<?php endif;?>
		        </tbody>
		      </table>
		    </div>
		  </div>

		  <!-- Educational Background -->
		  <div>
		    <h2 class="text-2xl font-bold text-blue-900 mb-4 mt-4">EDUCATIONAL BACKGROUND</h2>
		    <ul class="list-disc list-inside text-sm space-y-1">
              <?php if(!empty($elem_school_name)) : ?>
		      <li><strong>Elementary:</strong> <?=$elem_school_name;?> (SY - <?=$elem_schoolyear_start.' to '.$elem_schoolyear_end;?>)</li>
              <?php endif;?>
              <?php if(!empty($second_school_name)) : ?>
		      <li><strong>Secondary:</strong> <?=$second_school_name;?> (SY - <?=$second_schoolyear_start.' to '.$second_schoolyear_end;?>)</li>
              <?php endif;?>
              <?php if(!empty($vocation_school_name)) : ?>
              <li><strong>Vocational:</strong> <?=$vocation_school_name;?> (SY - <?=$vocation_schoolyear_start.' to '.$vocation_schoolyear_end;?>)</li>
             <?php endif;?>
             <?php if(!empty($college_school_name)) : ?>
		      <li><strong>College:</strong> <?=$college_school_name;?> (SY - <?=$college_schoolyear_start.' to '.$college_schoolyear_end;?>)</li>
              <?php endif;?>
              <?php if(!empty($gradstudy_school_name)) : ?>
              <li><strong>Post-graduate:</strong> <?=$gradstudy_school_name;?> (SY - <?=$gradstudy_schoolyear_start.' to '.$gradstudy_schoolyear_end;?>)</li>
              <?php endif;?>
		    </ul>
		  </div>

		  <!-- Eligibility -->
		  <div>
		    <h2 class="text-2xl font-bold text-blue-900 mb-4 mt-4">ELIGIBILITY</h2>
		    <div class="overflow-x-auto">
		      <table class="w-full border border-gray-300 text-sm">
		        <thead class="bg-gray-100 text-left">
		          <tr>
		            <th class="border px-3 py-2">NAME</th>
		            <th class="border px-3 py-2">RATING</span></th>
		            <th class="border px-3 py-2">DATE OF EXAM</span></th>
		            <th class="border px-3 py-2">PLACE OF EXAM</span></th>
		            <th class="border px-3 py-2">LICENSE NO.</span></th>
		            <th class="border px-3 py-2">VALIDITY</span></th>
		          </tr>
		        </thead>
		        <tbody>

		        	<?php if (!empty($cse_list)) : ?>
							  <?php foreach($cse_list as $key => $e): ?>
							    <tr>
							      <td class="border px-3 py-2 h-10"><?= htmlspecialchars($e['name']); ?></td>
							      <td class="border px-3 py-2 h-10"><?= htmlspecialchars($e['rating']); ?></td>
							      <td class="border px-3 py-2 h-10"><?= htmlspecialchars($e['doe']); ?></td>
							      <td class="border px-3 py-2 h-10"><?= htmlspecialchars($e['loc']); ?></td>
							      <td class="border px-3 py-2 h-10"><?= htmlspecialchars($e['license']); ?></td>
							      <td class="border px-3 py-2 h-10"><?= htmlspecialchars($e['validity']); ?></td>
							    </tr>
							  <?php endforeach; ?>
							<?php else : ?>
							  <tr>
							    <td colspan="6" class="border px-3 py-2 h-10 text-center text-gray-500 italic">
							      No Eligibility records available.
							    </td>
							  </tr>
							<?php endif; ?>

		        	
		        </tbody>
		      </table>
		    </div>
		  </div>

		  <!-- Work Experience -->
		  <div>
		    <h2 class="text-2xl font-bold text-blue-900 mb-4 mt-4">WORK EXPERIENCE</h2>
		    <div class="overflow-x-auto">
		      <table class="w-full border border-gray-300 text-sm">
		        <thead class="bg-gray-100 text-left">
		          <tr>
		            <th class="border px-3 py-2">FROM</th>
		            <th class="border px-3 py-2">TO</span></th>
		            <th class="border px-3 py-2">POSITION TITLE</span></th>
		            <th class="border px-3 py-2">DEPT/AGENCY/OFFICE</span></th>
		            <th class="border px-3 py-2">MONTHLY SALARY</span></th>
		            <th class="border px-3 py-2">SALARGY GRADE</span></th>
		            <th class="border px-3 py-2">STATUS</span></th>
		            <th class="border px-3 py-2">GOV'T SERVICE</span></th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php for ($i = 0; $i < $workexp_limit; $i++): ?>
		          <tr>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($workexp_list[$i]['work_from']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($workexp_list[$i]['work_to']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($workexp_list[$i]['work_position']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($workexp_list[$i]['work_dept']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($workexp_list[$i]['work_salary']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($workexp_list[$i]['work_sg']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($workexp_list[$i]['work_status']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($workexp_list[$i]['work_gs']);?></td>
		          </tr>
		          <?php endfor; ?>
		        </tbody>
		      </table>
		    </div>
		  </div>


		  <!-- Voluntary Works -->
		  <div>
		    <h2 class="text-2xl font-bold text-blue-900 mb-4 mt-4">VOLUNTARY WORKS</h2>
		    <div class="overflow-x-auto">
		      <table class="w-full border border-gray-300 text-sm">
		        <thead class="bg-gray-100 text-left">
		          <tr>
		            <th class="border px-3 py-2">NAME & ADDRESS OF ORGANIZATION</th>
		            <th class="border px-3 py-2">FROM</span></th>
		            <th class="border px-3 py-2">TO</span></th>
		            <th class="border px-3 py-2">NO. OF HOURS</span></th>
		            <th class="border px-3 py-2">POSITION / NATURE OF WORK</span></th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php for ($i = 0; $i < $vol_limit; $i++): ?>
		          <tr>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($vol_works[$i]['name']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($vol_works[$i]['start']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($vol_works[$i]['end']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($vol_works[$i]['hours']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($vol_works[$i]['position']);?></td>
		          </tr>
		          <?php endfor; ?>
		        </tbody>
		      </table>
		    </div>
		  </div>




		  <!-- Training -->
		  <div>
		    <h2 class="text-2xl font-bold text-blue-900 mb-4 mt-4">LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS / TRAINING PROGRAMS ATTENDED</h2>
		    <div class="overflow-x-auto">
		      <table class="w-full border border-gray-300 text-sm">
		        <thead class="bg-gray-100 text-left">
		          <tr>
		            <th class="border px-3 py-2">TITLE</th>
		            <th class="border px-3 py-2">FROM</span></th>
		            <th class="border px-3 py-2">TO</span></th>
		            <th class="border px-3 py-2">HOURS</span></th>
		            <th class="border px-3 py-2">TYPE</span></th>
		            <th class="border px-3 py-2">CONDUCTED</span></th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php for ($i = 0; $i < $training_limit; $i++): ?>
		          <tr>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($training_list[$i]['name']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($training_list[$i]['start']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($training_list[$i]['end']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($training_list[$i]['hours']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($training_list[$i]['type']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($training_list[$i]['conduct']);?></td>
		          </tr>
		          <?php endfor; ?>
		        </tbody>
		      </table>
		    </div>
		  </div>

		  <!-- Other -->
		  <div>
		    <h2 class="text-2xl font-bold text-blue-900 mb-4 mt-4">OTHER INFORMATION</h2>
		    <div class="overflow-x-auto">
		      <table class="w-full border border-gray-300 text-sm">
		        <thead class="bg-gray-100 text-left">
		          <tr>
		            <th class="border px-3 py-2">SPECIAL SKILLS and HOBBIES</th>
		            <th class="border px-3 py-2">NON-ACADEMIC DISTINCTIONS</span></th>
		            <th class="border px-3 py-2">MEMBERSHIP IN ASSOCIATION</span></th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php for ($i = 0; $i < $otherinfo_limit; $i++): ?>
		          <tr>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($otherinfo_list[$i]['ssh_name']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($otherinfo_list[$i]['nadr_name']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($otherinfo_list[$i]['miao_name']);?></td>
		          </tr>
		          <?php endfor; ?>
		        </tbody>
		      </table>
		    </div>
		  </div>

		  <!-- References -->
		  <div>
		    <h2 class="text-2xl font-bold text-blue-900 mb-4 mt-4">REFERENCES</h2>
		    <div class="overflow-x-auto">
		      <table class="w-full border border-gray-300 text-sm">
		        <thead class="bg-gray-100 text-left">
		          <tr>
		            <th class="border px-3 py-2">NAME</th>
		            <th class="border px-3 py-2">ADDRESS</span></th>
		            <th class="border px-3 py-2">CONTACT NO.</span></th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php for ($i = 0; $i < $reference_limit; $i++): ?>
		          <tr>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($reference_list[$i]['name']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($reference_list[$i]['address']);?></td>
		            <td class="border px-3 py-2 h-10"><?=htmlspecialchars($reference_list[$i]['contact']);?></td>
		          </tr>
		          <?php endfor; ?>
		        </tbody>
		      </table>
		    </div>
		  </div>

        <?php else :?>


        <?php endif;?>    
	</div>


  <?php require 'contents/footer.php';?>