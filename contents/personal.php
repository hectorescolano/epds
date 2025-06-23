<div id="personal" class="form-step  block">
        <h2 class="text-3xl font-bold text-blue-800 mb-4">PERSONAL INFORMATION</h2>
        <h4 class="text-xs font-semibold text-red-600 mt-4 mb-4">*This field is required</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="first_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="First Name" value="<?=$firstname;?>" required />
            <input name="middle_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Middle Name" value="<?=$middlename;?>" required />
            <input name="last_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Last Name" value="<?=$lastname;?>" required />
            <input name="ext_name" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Extension Name" value="<?=$xname;?>" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            
            <input name="dob" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400 datepicker" placeholder="Date of Birth" value="<?=$dob;?>" required />
            <input name="pob" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Place of Birth" required value="<?=$pob;?>" />

          
            <select name="gender" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" required>
                <option value="" <?= empty($gender) ? 'selected' : '' ?>>- Gender -</option>
                <option value="Male" <?= ($gender ?? '') === 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= ($gender ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
            </select>


            <select name="civilstatus" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" required>
              <option value="" <?= empty($cstatus) ? 'selected' : '' ?>>- Civil Status -</option>
              <option value="<?=strtoupper('Single');?>" <?= ($cstatus ?? '') === strtoupper('Single') ? 'selected' : '' ?>>SINGLE</option>
              <option value="<?=strtoupper('Widowed');?>" <?= ($cstatus ?? '') === strtoupper('Widowed') ? 'selected' : '' ?>>WIDOWED</option>
              <option value="<?=strtoupper('Married');?>" <?= ($cstatus ?? '') === strtoupper('Married') ? 'selected' : '' ?>>MARRIED</option>
              <option value="<?=strtoupper('Separated');?>" <?= ($cstatus ?? '') === strtoupper('Separated') ? 'selected' : '' ?>>SEPARATED</option>
          </select>


        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

            <input name="height" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Height (m)" value="<?=$height;?>" required />
            <input name="weight" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Weight (kg)" value="<?=$weight;?>" required />


            <select name="blood" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" required>
                <option value="" <?= empty($blood) ? 'selected' : '' ?>>- Blood Type -</option>
                <option value="A+" <?= ($blood ?? '') === 'A+' ? 'selected' : '' ?>>A+</option>
                <option value="A-" <?= ($blood ?? '') === 'A-' ? 'selected' : '' ?>>A-</option>
                <option value="B+" <?= ($blood ?? '') === 'B+' ? 'selected' : '' ?>>B+</option>
                <option value="B-" <?= ($blood ?? '') === 'B-' ? 'selected' : '' ?>>B-</option>
                <option value="AB+" <?= ($blood ?? '') === 'AB+' ? 'selected' : '' ?>>AB+</option>
                <option value="AB-" <?= ($blood ?? '') === 'AB-' ? 'selected' : '' ?>>AB-</option>
                <option value="O+" <?= ($blood ?? '') === 'O+' ? 'selected' : '' ?>>O+</option>
                <option value="O-" <?= ($blood ?? '') === 'O-' ? 'selected' : '' ?>>O-</option>
            </select>


            <select name="citizenship" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" required>
                <option value="" <?= empty($citizenship) ? 'selected' : '' ?>>- Citizenship -</option>
                <option value="FILIPINO" <?= ($citizenship ?? '') === 'FILIPINO' ? 'selected' : '' ?>>FILIPINO</option>
                <option value="DualB" <?= ($citizenship ?? '') === 'DualB' ? 'selected' : '' ?>>Dual Citizen (by birth only)</option>
                <option value="DualBN" <?= ($citizenship ?? '') === 'DualBN' ? 'selected' : '' ?>>Dual Citizen (by birth and naturalization)</option>
                <option value="DualN" <?= ($citizenship ?? '') === 'DualN' ? 'selected' : '' ?>>Dual Citizen (by naturalization only)</option>
            </select>




        </div>

        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">Other Govt. ID</h4>
        <h4 class="text-xs font-semibold text-red-600 mt-4 mb-4">*This field is required</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="empid" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="EMPLOYEE ID No." value="<?=$employeeId;?>"  />
            <input name="gsis" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="GSIS ID No." value="<?=$gsis;?>"  />
            <input name="pagibig" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="PAG-IBIG ID No." value="<?=$pagibig;?>"  />
            <input name="philhealth" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="PHILHEALTH No." value="<?=$philhealth;?>"  />
            <input name="tin" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="TIN No." value="<?=$tin;?>"  />
            <input name="sss" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="SSS No." />
        </div>


        <h4 class="text-xl font-bold text-blue-800 mt-4 mb-4">Contact Info.</h4>
        <h4 class="text-xs font-semibold text-red-600 mt-4 mb-4">*This field is required</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input name="tel" type="tel" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Telephone No." value="<?=$contact;?>" />
            <input name="mobile" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Mobile No." value="<?=$mobile;?>" required />
            <input name="emailadd" type="email" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Email Address" value="<?=$email;?>" />
          
        </div>
      </div>