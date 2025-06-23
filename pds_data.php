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

    // var_dump($data);
    
    if(!empty($data))
    {
            $employee_id = $data[0]['empid'] ?? '';
            $last_name = $data[0]['last_name'] ?? '';
            $first_name = $data[0]['first_name'] ?? '';
            $middle_name = $data[0]['middle_name'] ?? '';
            $ext_name = $data[0]['ext_name'] ?? '';

            if(!empty($data[0]['dob'])){
                $dob = $data[0]['dob']->format('m/d/Y') ?? '';
                // $dob = "";
            } else {
                $dob = "";
            }


            // echo "<pre>";
            // var_dump($dob);
            // echo "</pre>";
           	

            $pob = $data[0]['pob'] ?? '';
            $gender = $data[0]['gender'] ?? '';
            $civilstatus = $data[0]['civilstatus'] ?? '';
            $height = $data[0]['height'] ?? '';
            $weight = $data[0]['weight'] ?? '';
            $citizenship = $data[0]['citizenship'] ?? '';
            $blood = $data[0]['blood'] ?? '';

            $gsis = $data[0]['gsis'] ?? '';
            $pagibig = $data[0]['pagibig'] ?? '';
            $philhealth = $data[0]['philhealth'] ?? '';
            $sss = $data[0]['sss'] ?? '';
            $tin = $data[0]['tin'] ?? '';

            $emailadd = strtolower($data[0]['emailadd']) ?? '';
            $mobile = $data[0]['mobile'] ?? '';
            $tel = $data[0]['tel'] ?? '';

            $spouse_last_name = $data[0]['spouse_last_name'] ?? '';
            $spouse_first_name = $data[0]['spouse_first_name'] ?? '';
            $spouse_middle_name = $data[0]['spouse_middle_name'] ?? '';
            $spouse_ext_name = $data[0]['spouse_ext_name'] ?? '';
            $spouse_work = $data[0]['spouse_work'] ?? '';
            $spouse_employer = $data[0]['spouse_employer'] ?? '';
            $spouse_address = $data[0]['spouse_address'] ?? '';
            $spouse_telephone = $data[0]['spouse_telephone'] ?? '';


            $children = [];
            $maxChildren = 10; // or dynamically count based on data

            for ($i = 0; $i < $maxChildren; $i++) {
                $nameKey = "child{$i}_name";
                $bdayKey = "child{$i}_bday";

                if (isset($data[0][$nameKey]) || isset($data[0][$bdayKey])) {
                    
                    $bdayRaw = $data[0][$bdayKey] ?? '';
                    // Format if DateTime object, string, or leave blank
                    if ($bdayRaw instanceof DateTime) {
                        $bday = $bdayRaw->format('m/d/Y');
                    } elseif (is_string($bdayRaw) && strtotime($bdayRaw)) {
                        $bday = date('m/d/Y', strtotime($bdayRaw));
                    } else {
                        $bday = '';
                    }

                    $children[$i]['name'] = $data[0][$nameKey] ?? '';
                    $children[$i]['bday'] = $bday;
                }
            }

            $father_last_name = $data[0]['father_last_name'] ?? '';
            $father_first_name = $data[0]['father_first_name'] ?? '';
            $father_middle_name = $data[0]['father_middle_name'] ?? '';
            $father_extname = $data[0]['father_extname'] ?? '';
            $mother_last_name = $data[0]['mother_last_name'] ?? '';
            $mother_first_name = $data[0]['mother_first_name'] ?? '';
            $mother_middle_name = $data[0]['mother_middle_name'] ?? '';

            $elem_school_name = $data[0]['elem_school_name'] ?? '';
            $elem_educ_name = $data[0]['elem_educ_name'] ?? '';
            $elem_schoolyear_start = $data[0]['elem_schoolyear_start'] ?? '';
            if(!empty($data[0]['elem_schoolyear_start'])){
                $elem_schoolyear_start = $data[0]['elem_schoolyear_start']->format('Y') ?? '';
                // $dob = "";
            } else {
                $elem_schoolyear_start = "";
            }
            $elem_schoolyear_end = $data[0]['elem_schoolyear_end'] ?? '';
            if(!empty($data[0]['elem_schoolyear_start'])){
                $elem_schoolyear_end = $data[0]['elem_schoolyear_end']->format('Y') ?? '';
                // $dob = "";
            } else {
                $elem_schoolyear_end = "";
            }
            $elem_earn = $data[0]['elem_earn'] ?? '';
            $elem_year_grad = $data[0]['elem_year_grad'] ?? '';
            if(!empty($data[0]['elem_year_grad'])){
                $elem_year_grad = $data[0]['elem_year_grad']->format('Y') ?? '';
                // $dob = "";
            } else {
                $elem_year_grad = "";
            }
            $elem_scholar = $data[0]['elem_scholar'] ?? '';

            $second_school_name = $data[0]['second_school_name'] ?? '';
            $second_educ_name = $data[0]['second_educ_name'] ?? '';
            $second_schoolyear_start = $data[0]['second_schoolyear_start'] ?? '';
            if(!empty($data[0]['second_schoolyear_start'])){
                $second_schoolyear_start = $data[0]['second_schoolyear_start']->format('Y') ?? '';
                // $dob = "";
            } else {
                $second_schoolyear_start = "";
            }
            $second_schoolyear_end = $data[0]['second_schoolyear_end'] ?? '';
            if(!empty($data[0]['second_schoolyear_end'])){
                $second_schoolyear_end = $data[0]['second_schoolyear_end']->format('Y') ?? '';
                // $dob = "";
            } else {
                $second_schoolyear_end = "";
            }
            $second_earn = $data[0]['second_earn'] ?? '';
            $second_year_grad = $data[0]['second_year_grad'] ?? '';
            if(!empty($data[0]['second_year_grad'])){
                $second_year_grad = $data[0]['second_year_grad']->format('Y') ?? '';
                // $dob = "";
            } else {
                $second_year_grad = "";
            }
            $second_scholar = $data[0]['second_scholar'] ?? '';

            $vocation_school_name = $data[0]['vocation_school_name'] ?? '';
            $vocation_educ_name = $data[0]['vocation_educ_name'] ?? '';
            $vocation_schoolyear_start = $data[0]['vocation_schoolyear_start'] ?? '';
            if(!empty($data[0]['vocation_schoolyear_start'])){
                $vocation_schoolyear_start = $data[0]['vocation_schoolyear_start']->format('Y') ?? '';
                // $dob = "";
            } else {
                $vocation_schoolyear_start = "";
            }
            $vocation_schoolyear_end = $data[0]['vocation_schoolyear_end'] ?? '';
            if(!empty($data[0]['vocation_schoolyear_end'])){
                $vocation_schoolyear_end = $data[0]['vocation_schoolyear_end']->format('Y') ?? '';
                // $dob = "";
            } else {
                $vocation_schoolyear_end = "";
            }
            $vocation_earn = $data[0]['vocation_earn'] ?? '';
            $vocation_year_grad = $data[0]['vocation_year_grad'] ?? '';
            if(!empty($data[0]['vocation_year_grad'])){
                $vocation_year_grad = $data[0]['vocation_year_grad']->format('Y') ?? '';
                // $dob = "";
            } else {
                $vocation_year_grad = "";
            }
            $vocation_scholar = $data[0]['vocation_scholar'] ?? '';

            $college_school_name = $data[0]['college_school_name'] ?? '';
            $college_educ_name = $data[0]['college_educ_name'] ?? '';
            $college_schoolyear_start = $data[0]['college_schoolyear_start'] ?? '';
            if(!empty($data[0]['college_schoolyear_start'])){
                $college_schoolyear_start = $data[0]['college_schoolyear_start']->format('Y') ?? '';
                // $dob = "";
            } else {
                $college_schoolyear_start = "";
            }
            $college_schoolyear_end = $data[0]['college_schoolyear_end'] ?? '';
            if(!empty($data[0]['college_schoolyear_end'])){
                $college_schoolyear_end = $data[0]['college_schoolyear_end']->format('Y') ?? '';
                // $dob = "";
            } else {
                $college_schoolyear_end = "";
            }
            $college_earn = $data[0]['college_earn'] ?? '';
            $college_year_grad = $data[0]['college_year_grad'] ?? '';
            if(!empty($data[0]['college_year_grad'])){
                $college_year_grad = $data[0]['college_year_grad']->format('Y') ?? '';
                // $dob = "";
            } else {
                $college_year_grad = "";
            }
            $college_scholar = $data[0]['college_scholar'] ?? '';

            $gradstudy_school_name = $data[0]['gradstudy_school_name'] ?? '';
            $gradstudy_educ_name = $data[0]['gradstudy_educ_name'] ?? '';
            $gradstudy_schoolyear_start = $data[0]['gradstudy_schoolyear_start'] ?? '';
            if(!empty($data[0]['gradstudy_schoolyear_start'])){
                $gradstudy_schoolyear_start = $data[0]['gradstudy_schoolyear_start']->format('Y') ?? '';
                // $dob = "";
            } else {
                $gradstudy_schoolyear_start = "";
            }
            $gradstudy_schoolyear_end = $data[0]['gradstudy_schoolyear_end'] ?? '';
            if(!empty($data[0]['gradstudy_schoolyear_end'])){
                $gradstudy_schoolyear_end = $data[0]['gradstudy_schoolyear_end']->format('Y') ?? '';
                // $dob = "";
            } else {
                $gradstudy_schoolyear_end = "";
            }
            $gradstudy_earn = $data[0]['gradstudy_earn'] ?? '';
            $gradstudy_year_grad = $data[0]['gradstudy_year_grad'] ?? '';
            if(!empty($data[0]['gradstudy_year_grad'])){
                $gradstudy_year_grad = $data[0]['gradstudy_year_grad']->format('Y') ?? '';
                // $dob = "";
            } else {
                $gradstudy_year_grad = "";
            }
            $gradstudy_scholar = $data[0]['gradstudy_scholar'] ?? '';



            $cse_list = [];
            $max_cselist = 7;
            for ($i = 0; $i <= $max_cselist; $i++) {
                $suffix = $i === 0 ? '' : $i; // no suffix for the first set

                if($suffix >= 1){
                    $suffix = $suffix + 1;
                }



                    $cse_list[$i] = [
                        'name' => $data[0]["cse{$suffix}_name"] ?? '',
                        'rating' => $data[0]["cse{$suffix}_rating"] ?? '',
                        'doe' => $data[0]["cse{$suffix}_date"] ?? '',
                        'loc' => $data[0]["cse{$suffix}_loc"] ?? '',
                        'license' => $data[0]["cse{$suffix}_license"] ?? '',
                        'validity' => $data[0]["cse{$suffix}_validity"] ?? '',
                    ];

                    if(!empty($cse_list[$i]['doe'])){
                        $doe = $cse_list[$i]['doe'];
                         // Format if DateTime object, string, or leave blank
                        if ($doe instanceof DateTime) {
                            $dateofexam = $doe->format('m/d/Y');
                        } elseif (is_string($doe) && strtotime($doe)) {
                            $dateofexam = date('m/d/Y', strtotime($doe));
                        } else {
                            $dateofexam = '';
                        }
                        $cse_list[$i]['doe'] = $dateofexam;
                    }


                    if(!empty($cse_list[$i]['validity'])){
                        $vd = $cse_list[$i]['validity'];
                         // Format if DateTime object, string, or leave blank
                        if ($vd instanceof DateTime) {
                            $validity = $vd->format('m/d/Y');
                        } elseif (is_string($vd) && strtotime($vd)) {
                            $validity = date('m/d/Y', strtotime($vd));
                        } else {
                            $validity = '';
                        }
                        $cse_list[$i]['validity'] = $validity;
                    }
            }

            // References
            $reference_list = [];
            $reference_limit = 3;

            for ($i=0; $i < $reference_limit ; $i++) { 
                $suffix = $i + 1;
                $reference_list[$i] = [
                    'name' => $data[0]["ref_name{$suffix}"] ?? '',
                    'address' => $data[0]["ref_add{$suffix}"] ?? '',
                    'contact' => $data[0]["ref_contact{$suffix}"] ?? ''
                ];
            }

            
            // Address
            $res_lot = $data[0]['res_lot'] ?? '';
            $res_street = $data[0]['res_street'] ?? '';
            $res_village = $data[0]['res_village'] ?? '';
            $res_barangay = $data[0]['res_barangay'] ?? '';
            $res_city = $data[0]['res_city'] ?? '';
            $res_province = $data[0]['res_province'] ?? '';
            $res_zipcode = $data[0]['res_zipcode'] ?? '';

            $per_lot = $data[0]['per_lot'] ?? '';
            $per_street = $data[0]['per_street'] ?? '';
            $per_village = $data[0]['per_village'] ?? '';
            $per_barangay = $data[0]['per_barangay'] ?? '';
            $per_city = $data[0]['per_city'] ?? '';
            $per_province = $data[0]['per_province'] ?? '';
            $per_zipcode = $data[0]['per_zipcode'] ?? '';

            // Work Experience
            $workexp_list = [];
            $workexp_limit = 13;

            for ($i=0; $i < $workexp_limit ; $i++) { 
                $suffix = $i === 0 ? '' : $i; // no suffix for the first set

                if($suffix >= 1){
                    $suffix = $suffix + 1;
                }

                $workexp_list[$i] = [
                    'work_from' => $data[0]["work{$suffix}_from"] ?? '',
                    'work_to' => $data[0]["work{$suffix}_to"] ?? '',
                    'work_position' => $data[0]["work{$suffix}_position"] ?? '',
                    'work_dept' => $data[0]["work{$suffix}_dept"] ?? '',
                    'work_salary' => $data[0]["work{$suffix}_salary"] ?? '',
                    'work_sg' => $data[0]["work{$suffix}_sg"] ?? '',
                    'work_status' => $data[0]["work{$suffix}_status"] ?? '',
                    'work_gs' => $data[0]["work{$suffix}_gs"] ?? ''
                ];

                if(!empty($workexp_list[$i]['work_from'])){
                    $wf = $workexp_list[$i]['work_from'];
                     // Format if DateTime object, string, or leave blank
                    if ($wf instanceof DateTime) {
                        $workfrom = $wf->format('m/d/Y');
                    } elseif (is_string($wf) && strtotime($wf)) {
                        $workfrom = date('m/d/Y', strtotime($wf));
                    } else {
                        $workfrom = '';
                    }
                    $workexp_list[$i]['work_from'] = $workfrom;
                }

                if(!empty($workexp_list[$i]['work_to'])){
                    $wt = $workexp_list[$i]['work_to'];
                     // Format if DateTime object, string, or leave blank
                    if ($wf instanceof DateTime) {
                        $workto = $wt->format('m/d/Y');
                    } elseif (is_string($wt) && strtotime($wt)) {
                        $workto = date('m/d/Y', strtotime($wt));
                    } else {
                        $workto = '';
                    }
                    $workexp_list[$i]['work_to'] = $workto;
                }




            }

            // Voluntary Works
            $vol_works = [];
            $vol_limit = 7;
            for ($i=0; $i < $vol_limit ; $i++) { 
                $suffix = $i === 0 ? '' : $i; // no suffix for the first set

                if($suffix >= 1){
                    $suffix = $suffix + 1;
                }

                $vol_works[$i] = [
                    'name' => $data[0]["org{$suffix}_name"] ?? '',
                    'start' => $data[0]["org{$suffix}_start"] ?? '',
                    'end' => $data[0]["org{$suffix}_end"] ?? '',
                    'hours' => $data[0]["org{$suffix}_hours"] ?? '',
                    'position' => $data[0]["org{$suffix}_position"] ?? ''
                ];

                if(!empty($vol_works[$i]['start'])){
                    $vs = $vol_works[$i]['start'];
                     // Format if DateTime object, string, or leave blank
                    if ($vs instanceof DateTime) {
                        $volfrom = $vs->format('m/d/Y');
                    } elseif (is_string($vs) && strtotime($vs)) {
                        $volfrom = date('m/d/Y', strtotime($vs));
                    } else {
                        $volfrom = '';
                    }
                    $vol_works[$i]['start'] = $volfrom;
                }

                if(!empty($vol_works[$i]['end'])){
                    $ve = $vol_works[$i]['end'];
                     // Format if DateTime object, string, or leave blank
                    if ($ve instanceof DateTime) {
                        $volto = $ve->format('m/d/Y');
                    } elseif (is_string($ve) && strtotime($ve)) {
                        $volto = date('m/d/Y', strtotime($ve));
                    } else {
                        $volto = '';
                    }
                    $vol_works[$i]['end'] = $volto;
                }
            }
            
            // LD and Trainings
            $training_list = [];
            $training_limit = 21;
            for ($i=0; $i < $training_limit ; $i++) { 
                $suffix = $i === 0 ? '' : $i; // no suffix for the first set

                if($suffix >= 1){
                    $suffix = $suffix + 1;
                }

                $training_list[$i] = [
                    'name' => $data[0]["training{$suffix}_name"] ?? '',
                    'start' => $data[0]["training{$suffix}_start"] ?? '',
                    'end' => $data[0]["training{$suffix}_end"] ?? '',
                    'hours' => $data[0]["training{$suffix}_hours"] ?? '',
                    'type' => $data[0]["training{$suffix}_type"] ?? '',
                    'conduct' => $data[0]["training{$suffix}_conduct"] ?? ''
                ];

                if(!empty($training_list[$i]['start'])){
                    $ts = $training_list[$i]['start'];
                     // Format if DateTime object, string, or leave blank
                    if ($ts instanceof DateTime) {
                        $trainfrom = $ts->format('m/d/Y');
                    } elseif (is_string($ts) && strtotime($ts)) {
                        $trainfrom = date('m/d/Y', strtotime($ts));
                    } else {
                        $trainfrom = '';
                    }
                    $training_list[$i]['start'] = $trainfrom;
                }

                if(!empty($training_list[$i]['end'])){
                    $te = $training_list[$i]['end'];
                     // Format if DateTime object, string, or leate blank
                    if ($te instanceof DateTime) {
                        $trainto = $te->format('m/d/Y');
                    } elseif (is_string($te) && strtotime($te)) {
                        $trainto = date('m/d/Y', strtotime($te));
                    } else {
                        $trainto = '';
                    }
                    $training_list[$i]['end'] = $trainto;
                }
            }


            // Other Information
            $otherinfo_list = [];
            $otherinfo_limit = 7;

            for ($i=0; $i < $otherinfo_limit; $i++) { 
                $suffix = $i + 1;
                $otherinfo_list[$i] = [
                    'ssh_name' => $data[0]["ssh_name{$suffix}"] ?? '',
                    'nadr_name' => $data[0]["nadr_name{$suffix}"] ?? '',
                    'miao_name' => $data[0]["miao_name{$suffix}"] ?? ''
                ];
            }

             /* Government Issued ID */
            $govid_1 = $data[0]["govid_1"] ?? '';
            $govid_2 = $data[0]["govid_2"] ?? '';
            $govid_3 = $data[0]["govid_3"] ?? date('m/d/Y');

           
    } else {
        $data = array();
    }
?>