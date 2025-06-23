<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>e-PDS Viewer</title>
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
  </style>
</head>
<body class="bg-blue-50 text-gray-800 font-sans">

  <!-- Top Navigation Bar -->
  <nav class="bg-blue-900 text-white px-4 py-3 shadow-md sticky top-0 z-50">
    <div class="flex justify-between items-center">
      <div class="text-lg font-semibold">PDS Viewer</div>
      <button onclick="downloadPDS()" class="bg-yellow-400 text-blue-900 px-4 py-1 rounded hover:bg-yellow-300 transition">Download</button>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-4xl mx-auto my-8 p-6 bg-white rounded-lg shadow-md fade-in">
    <h1 class="text-2xl font-bold text-blue-900 mb-6">Personal Data Sheet</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <strong>Employee ID:</strong> 52082<br>
        <strong>Name:</strong> HECTOR JOHN C. ESCOLANO<br>
        <strong>Date of Birth:</strong> November 10, 1989<br>
        <strong>Place of Birth:</strong> CEBU CITY<br>
        <strong>Gender:</strong> Male<br>
        <strong>Civil Status:</strong> SINGLE<br>
        <strong>Citizenship:</strong> FILIPINO
      </div>

      <div>
        <strong>Email:</strong> hjescolano@gmail.com<br>
        <strong>Mobile:</strong> 09174924163<br>
        <strong>Blood Type:</strong> AB+<br>
        <strong>Height:</strong> 1.61 m<br>
        <strong>Weight:</strong> 0 kg<br>
        <strong>GSIS:</strong> 2004576265<br>
        <strong>Pag-IBIG:</strong> 121031870199
      </div>
    </div>

    <div class="mt-6">
      <h2 class="text-xl font-semibold text-blue-900 mb-2">Address</h2>
      <p><strong>Village:</strong> HABITAT BLISSVILLE CABANGCALAN NO.1</p>
      <p><strong>Barangay:</strong> BULACAO</p>
    </div>

    <div class="mt-6">
      <h2 class="text-xl font-semibold text-blue-900 mb-2">Educational Background</h2>
      <ul class="list-disc list-inside">
        <li><strong>Elementary:</strong> HOLY ROSARY SCHOOL OF PARDO (1999 - 2003)</li>
        <li><strong>Secondary:</strong> HOLY ROSARY SCHOOL OF PARDO (2003 - 2007)</li>
        <li><strong>College:</strong> CEBU INSTITUTE OF TECHNOLOGY - BSIT (2007 - 2012)</li>
      </ul>
    </div>
  </div>

  <script>
    function downloadPDS() {
      const element = document.body;
      const opt = {
        margin:       1,
        filename:     'Personal_Data_Sheet.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
      };
      html2pdf().set(opt).from(element).save();
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

</body>
</html>