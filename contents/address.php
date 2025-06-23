<div id="address" class="form-step  hidden">
        <h2 class="text-3xl font-bold text-blue-800 mb-4">ADDRESS</h2>
        <h4 class="text-xl font-bold text-blue-800 mb-4">Residential</h4>
        <h4 class="text-xs font-semibold text-red-600 mt-4 mb-4">*This field is required</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <input name="res_lot" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="House/Block/Lot No." />
          <input name="res_street" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Street" />
          <input name="res_village" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Subdivision/Village" value="<?=$address;?>" />
          <input name="res_barangay" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Barangay" value="<?=$brgy;?>" />
          <input name="res_city" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="City/Municipality" />
          <input name="res_province" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Province" />
          <input name="res_zipcode" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="ZIP Code" />
        </div>

        <div class="grid w-full grid-cols-2">
          <div class="flex text-xl font-bold text-blue-800 mb-4 mt-4">Permanent </div>
          <button id="copyResAddress" type="button" class="flex items-center justify-end text-m text-blue-600">
                    <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                      <path d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z"></path>
                      <path d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z"></path>
                    </svg> 
                    <span class="copy-text">Click here to copy from residential</span>
          </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <input name="per_lot" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="House/Block/Lot No." />
          <input name="per_street" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Street" />
          <input name="per_village" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Subdivision/Village" />
          <input name="per_barangay" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Barangay" />
          <input name="per_city" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="City/Municipality" />
          <input name="per_province" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="Province" />
          <input name="per_zipcode" type="text" class="border p-2 rounded focus:ring-2 focus:ring-yellow-400" placeholder="ZIP Code" />
        </div>
      </div>