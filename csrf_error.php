<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>403 Forbidden – Invalid CSRF Token</title>
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

  <div class="fade-in bg-white shadow-xl rounded-2xl p-8 max-w-xl w-full border-l-4 border-red-500">
    <div class="text-center space-y-4">
      <div class="text-6xl text-red-500">🚫</div>
      <h1 class="text-3xl font-bold text-red-700">403 Forbidden</h1>
      <p class="text-gray-700 text-base leading-relaxed">
        Your session could not be verified due to an invalid or expired CSRF token.
        This may happen if:
      </p>

      <ul class="text-left text-sm text-red-800 bg-red-100 border border-red-200 rounded-md p-4 space-y-1">
        <li>• Your session timed out due to inactivity</li>
        <li>• You submitted the form from multiple tabs/windows</li>
        <li>• The page was left open for too long</li>
        <li>• The request was modified or tampered with</li>
      </ul>

      <p class="text-gray-600 text-sm mt-2">
        For your security, please reload the form and try again.
      </p>

      <div class="mt-6">
        <a href="https://www.cebucity.gov.ph/pitchV2/epds/"
          class="inline-block bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-semibold px-6 py-2 rounded-full transition">
          ← Return to Home Page
        </a>
      </div>
    </div>
  </div>

</body>
</html>
