<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Submission Error</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .fade-in {
      animation: fadeIn 0.5s ease-out forwards;
      opacity: 0;
    }
    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }
  </style>
</head>
<body class="bg-red-50 min-h-screen flex items-center justify-center px-4 py-12">
  <div class="bg-white border border-red-300 rounded-xl shadow-xl max-w-2xl w-full p-8 text-center">
    <div class="flex flex-col items-center mb-6">
      <div class="text-3xl text-yellow-500 mb-2">⚠️</div>
      <h1 class="text-2xl font-bold text-red-700">Submission Error</h1>
      <p class="text-gray-700 mt-2 text-sm">Some required information is missing or invalid. Please review the following fields:</p>
    </div>

    <ul class="text-left text-sm bg-red-100 text-red-800 border border-red-200 rounded-lg p-5 space-y-1 max-h-64 overflow-auto mb-6">
      <li>• First Name</li>
      <li>• Last Name</li>
      <li>• Date of Birth</li>
      <li>• Place of Birth</li>
      <li>• Gender</li>
      <li>• Civil Status</li>
      <li>• Height</li>
      <li>• Weight</li>
      <li>• Blood Type</li>
      <li>• Citizenship</li>
      <li>• Employee ID</li>
      <li>• Telephone Number</li>
      <li>• Mobile Number</li>
      <li>• Father's First Name</li>
      <li>• Father's Middle Name</li>
      <li>• Father's Last Name</li>
      <li>• Mother's First Name</li>
      <li>• Mother's Middle Name</li>
      <li>• Mother's Last Name</li>
      <li>• Elementary School Name</li>
      <li>• School Year Start (Elementary)</li>
      <li>• School Year End (Elementary)</li>
    </ul>

    <a href="https://www.cebucity.gov.ph/pitchV2/epds" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-full shadow transition">
      ← Return to Form
    </a>
  </div>

