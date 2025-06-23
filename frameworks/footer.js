function printPDS() {
      const printContents = document.getElementById("print-content").innerHTML;
      const originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
      window.location.reload(); // reload to restore JS and layout
    }
    document.addEventListener("DOMContentLoaded", () => {
      const preloader = document.getElementById('preloader');
      const bar = document.getElementById('preloader-bar');
      let progress = 0;

      const interval = setInterval(() => {
        progress += Math.random() * 10; // simulate loading
        if (progress >= 100) {
          progress = 100;
          clearInterval(interval);
          // Smoothly hide preloader
          preloader.classList.add('opacity-0');
          preloader.classList.add('invisible');
          setTimeout(() => preloader.remove(), 500);
        }
        bar.style.width = `${progress}%`;
      }, 200);
    });
    document.getElementById('navToggle').addEventListener('click', function () {
      const mobileNav = document.getElementById('mobileNav');
      mobileNav.classList.toggle('hidden');
    });
    function fillNA_vol() {
        const inputs = document.querySelectorAll('.input-vol');
        inputs.forEach(input => {
          input.value = 'N/A';
        });
    }
    // Show the modal when the page loads (or conditionally if you prefer)
    window.addEventListener('load', () => {
      if (!localStorage.getItem('naReminderShown')) {
        document.getElementById('naModal').classList.remove('hidden');
        localStorage.setItem('naReminderShown', 'true'); // Only show once
      }
    });
    function closeModal() {
      document.getElementById('naModal').classList.add('hidden');
    }
    document.querySelectorAll('.tab-btn').forEach(tab => {
      tab.addEventListener('click', () => {
        document.getElementById('naModal').classList.remove('hidden');
      });
    });



// DATA PRIVACY
// Show modal on load
  window.addEventListener('load', function () {
    document.getElementById('privacyModal').classList.remove('hidden');
  });

  // Hide modal
  function closePrivacyModal() {
    document.getElementById('privacyModal').classList.add('hidden');
  }

  // Enable accept button when checkbox is checked
  document.getElementById('consentCheckbox').addEventListener('change', function () {
    document.getElementById('acceptBtn').disabled = !this.checked;
  });

  // Accept logic
  function acceptConsent() {
    closePrivacyModal();
    document.getElementById('multiStepFormContainer').classList.remove('hidden');
    // Optional: scroll to top of form
    document.getElementById('multiStepFormContainer').scrollIntoView({ behavior: 'smooth' });
  }
 