<!-- Data Privacy Consent Modal -->
<div id="privacyModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-1">
  <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-xl">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-bold text-blue-800">Data Privacy Consent</h2>
      <!-- <button onclick="closePrivacyModal()" class="text-gray-500 hover:text-red-500">&times;</button> -->
    </div>

    <div class="text-sm text-gray-700 space-y-4">
      <p>
        In compliance with the Data Privacy Act of 2012 (RA 10173), we are committed to protecting your personal data.
        By continuing to fill out this form, you are giving your full consent for the City Government of Cebu to collect, use,
        store, and process your information for official and lawful purposes only.
      </p>
      <p>
        Your data will be handled with utmost confidentiality and will not be shared with any third party without your
        explicit permission, unless required by law.
      </p>

      <label class="flex items-start gap-2 mt-2">
        <input type="checkbox" id="consentCheckbox" class="mt-1" required>
        <span>I have read and understood the privacy policy above and consent to the collection and processing of my data.</span>
      </label>
    </div>

    <div class="mt-6 flex justify-end gap-3">
      <button onclick="closePrivacyModal()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
        Cancel
      </button>
      <button onclick="acceptConsent()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 disabled:opacity-50" id="acceptBtn" disabled>
        I Agree
      </button>
    </div>
  </div>
</div>
