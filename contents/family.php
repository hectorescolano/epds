<div id="family" class="form-step  hidden">
        <h2 class="text-3xl font-bold text-blue-800 mb-4">FAMILY BACKGROUND</h2>
        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">Spouse Information</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="spouse_first_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="First Name"  />
            <input name="spouse_middle_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Middle Name"  />
            <input name="spouse_last_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Last Name"  />
            <input name="spouse_ext_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Extension Name" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <input name="spouse_work" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Occupation" />
            <input name="spouse_employer" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Employeer/Business Name"  />
            <input name="spouse_address" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Address"  />
            <input name="spouse_telephone" type="tel" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Telephone No." />
        </div>

        <!-- Parents -->
        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">Father's Name</h4>
        <h4 class="text-xs font-semibold text-red-600 mt-4 mb-4">*This field is required</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="father_first_name" type="text" class="required-input border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="First Name" value="<?=$father_fname;?>" required />
            <input name="father_middle_name" type="text" class="required-input border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Middle Name" value="<?=$father_mname;?>" required />
            <input name="father_last_name" type="text" class="required-input border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Last Name" value="<?=$father_lname;?>" required />
            <input name="father_extname" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Extension Name" value="<?=$father_xname;?>" />
        </div>

        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">Mother's Maiden Name</h4>
        <h4 class="text-xs font-semibold text-red-600 mt-4 mb-4">*This field is required</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="mother_first_name" type="text" class="required-input border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="First Name" value="<?=$mother_fname;?>" required />
            <input name="mother_middle_name" type="text" class="required-input border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Middle Name" value="<?=$mother_mname;?>" required />
            <input name="mother_last_name" type="text" class="required-input border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Last Name" value="<?=$mother_lname;?>" required />
        </div>

        <!-- Children -->
        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">Name of Children (Write full name and list all)</h4>
        <h4 class="text-xs font-semibold text-red-600 mt-4 mb-4">*If all fields in a row are not applicable, enter 'N/A' in one of the fields within that row.</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="child0_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Child Full Name" />
            <input name="child0_bday" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth (mm/dd/yyyy)" />

            <input name="child1_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Child Full Name" />
            <input name="child1_bday" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth (mm/dd/yyyy)" />

            <input name="child2_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Child Full Name"  />
            <input name="child2_bday" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth (mm/dd/yyyy)" />

            <input name="child3_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Child Full Name"  />
            <input name="child3_bday" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth (mm/dd/yyyy)" />

            <input name="child4_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Child Full Name"  />
            <input name="child4_bday" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth (mm/dd/yyyy)" />

            <input name="child5_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Child Full Name"  />
            <input name="child5_bday" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth (mm/dd/yyyy)" />

            <input name="child6_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Child Full Name"  />
            <input name="child6_bday" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth (mm/dd/yyyy)" />

            <input name="child7_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Child Full Name"  />
            <input name="child7_bday" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth (mm/dd/yyyy)" />

            <input name="child8_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Child Full Name"  />
            <input name="child8_bday" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth (mm/dd/yyyy)" />

            <input name="child9_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Child Full Name"  />
            <input name="child9_bday" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth (mm/dd/yyyy)" />
            
        </div>
      </div>