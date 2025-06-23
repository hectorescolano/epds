<div id="education" class="form-step  hidden">
        <h2 class="text-3xl font-bold text-blue-800 mb-4">EDUCATION BACKGROUND</h2>
        <h4 class="text-xs font-semibold text-red-600 mt-4">*This field is required</h4>
        <h4 class="text-xs font-semibold text-red-600">*Please write in full details.</h4>
        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">Elementary</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="elem_school_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Name of School" value="<?=$elem_schoolname;?>" />
            <input name="elem_educ_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Basic Education/Degree/Course" value="<?=$elem_coursename;?>" readonly/>
            <input name="elem_schoolyear_start" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Period of Attendance (Year-started)" value="<?=$elem_yearstarted;?>"  />
            <input name="elem_schoolyear_end" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker-year-only" placeholder="Period of Attendance (Year-ended)" value="<?=$elem_yearended;?>"   />
            <input name="elem_earn" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Highest Level/Units Earned (if not graduated)" />
            <input name="elem_year_grad" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Year Graduated"  />
            <input name="elem_scholar" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Scholarship/Academic Honors Received" />
        </div>
        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">Secondary</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="second_school_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Name of School" value="<?=$second_schoolname;?>"   />
            <input name="second_educ_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Basic Education/Degree/Course" value="<?=$second_coursename;?>"  readonly/>
            <input name="second_schoolyear_start" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Period of Attendance (Year-started)" value="<?=$second_yearstarted;?>"   />
            <input name="second_schoolyear_end" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Period of Attendance (Year-ended)" value="<?=$second_yearended;?>"   />
            <input name="second_earn" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Highest Level/Units Earned (if not graduated)" />
            <input name="second_year_grad" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Year Graduated"  />
            <input name="second_scholar" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Scholarship/Academic Honors Received" />
        </div>
        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">Vocational / Trade Course</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="vocation_school_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Name of School" value="<?=$vocational_schoolname;?>" />
            <input name="vocation_educ_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Basic Education/Degree/Course" value="<?=$vocational_coursename;?>" />
            <input name="vocation_schoolyear_start" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Period of Attendance (Year-started)" value="<?=$vocational_yearstarted;?>" />
            <input name="vocation_schoolyear_end" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Period of Attendance (Year-ended)" value="<?=$vocational_yearended;?>"  />
            <input name="vocation_earn" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Highest Level/Units Earned (if not graduated)" />
            <input name="vocation_year_grad" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Year Graduated"  />
            <input name="vocation_scholar" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Scholarship/Academic Honors Received" />
        </div>
        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">College</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="college_school_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Name of School" value="<?=$college_schoolname;?>" />
            <input name="college_educ_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Basic Education/Degree/Course" value="<?=$college_coursename;?>" />
            <input name="college_schoolyear_start" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Period of Attendance (Year-started)" value="<?=$college_yearstarted;?>" />
            <input name="college_schoolyear_end" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Period of Attendance (Year-ended)" value="<?=$college_yearended;?>"  />
            <input name="college_earn" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Highest Level/Units Earned (if not graduated)" />
            <input name="college_year_grad" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Year Graduated"  />
            <input name="college_scholar" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Scholarship/Academic Honors Received" />
        </div>
        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">Graduate Studies</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="gradstudy_school_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Name of School" value="<?=$post_graduate_schoolname;?>" />
            <input name="gradstudy_educ_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Basic Education/Degree/Course" value="<?=$post_graduate_coursename;?>" />
            <input name="gradstudy_schoolyear_start" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Period of Attendance (Year-started)" value="<?=$post_graduate_yearstarted;?>" />
            <input name="gradstudy_schoolyear_end" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Period of Attendance (Year-ended)" value="<?=$post_graduate_yearended;?>"  />
            <input name="gradstudy_earn" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Highest Level/Units Earned (if not graduated)" />
            <input name="gradstudy_year_grad" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Year Graduated"  />
            <input name="gradstudy_scholar" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Scholarship/Academic Honors Received" />
        </div>
      </div>