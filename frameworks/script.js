$(function() {
      function scrollToTop() {
        $('html, body').animate({ scrollTop: 0 }, 400);
      }
      $(".next-step, .prev-step").on("click", function (e) {
          e.preventDefault(); // Prevent default form submission if needed
          $("html, body").animate({ scrollTop: 100 }, 200); // 600ms smooth scroll
      });

      $('#scrollDownBtn').on('click', function () {
        $('html, body').animate({
          scrollTop: $(window).scrollTop() + $(window).height()
        }, 100);
      });

      $("#copyResAddress").click(function(){

        var lot = $('input[name="res_lot"]').val();
        var street = $('input[name="res_street"]').val();
        var village = $('input[name="res_village"]').val();
        var brgy = $('input[name="res_barangay"]').val();
        var city = $('input[name="res_city"]').val();
        var prov = $('input[name="res_province"]').val();
        var zipcode = $('input[name="res_zipcode"]').val();

        $('input[name="per_lot"]').val(lot);
        $('input[name="per_street"]').val(street);
        $('input[name="per_village"]').val(village);
        $('input[name="per_barangay"]').val(brgy);
        $('input[name="per_city"]').val(city);
        $('input[name="per_province"]').val(prov);
        $('input[name="per_zipcode"]').val(zipcode);
        alert('Residential Address copied.');
           
      });


      $(".datepicker-year-only").datepicker({
         changeYear: true,
          showButtonPanel: true,
          dateFormat: 'yy',
          onClose: function(dateText, inst) {
            // Extract year only
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, 0, 1));
          },
          beforeShow: function(input, inst) {
            $(input).datepicker("option", "defaultDate", new Date());
          }
      });

      // Remove calendar and show only years
      $(".datepicker-year-only").focus(function () {
        $(".datepicker-year-only > .ui-datepicker-month").hide();
        $(".datepicker-year-only > .ui-datepicker-calendar").hide();
      });

      $(".datepicker").datepicker({
        dateFormat: "mm/dd/yy"
        //showOn: "both"
        //buttonText: "📅" // Or use an image via buttonImage
      });
      $('#checkDefaultNoSpouse').change(function(){
           if ($(this).is(':checked')) {
                //console.log('Checkbox is checked');
              $('#spouse_container').hide();
              $('[name^="spouse_"]').removeAttr('required');

            } else {
               // console.log('Checkbox is unchecked');
              $('#spouse_container').show();
              $('[name^="spouse_"]').prop('required', true);

            }
      });

      $('#checkDefaultNoChildren').change(function(){
          if ($(this).is(':checked')) {
                //console.log('Checkbox is checked');
              $('#children_container').hide();

            } else {
               // console.log('Checkbox is unchecked');
              $('#children_container').show();

            }
      });
      $('#checkMoreChildren').change(function(){
          if($(this).is(':checked')){
            $('#moreChildshow').show();
          } else {
            $('#moreChildshow').hide();
          }
      });



  const buttons = document.querySelectorAll('.tab-btn');
  const formSteps = document.querySelectorAll('.form-step'); // Unified class
  const nextBtn = document.getElementById('nextBtn');
  const prevBtn = document.getElementById('prevBtn');
  const progressBar = document.getElementById('progressBar');
  let currentStep = 0;

  // Show a specific step
  function showStep(step) {
    formSteps.forEach((stepEl, index) => {
      stepEl.classList.toggle('hidden', index !== step);
    });

    buttons.forEach((btn, index) => {
      btn.classList.toggle('text-yellow-500', index === step);
      btn.classList.toggle('font-bold', index === step);
    });

    prevBtn.disabled = step === 0;
    nextBtn.textContent = step === formSteps.length - 1 ? 'Submit' : 'Next';

    const percent = (step / (formSteps.length - 1)) * 100;
    progressBar.style.width = `${percent}%`;

    currentStep = step;
  }

  // Tab button clicks
  buttons.forEach((btn, index) => {
    btn.addEventListener('click', () => showStep(index));
  });

  // Next button
  nextBtn.addEventListener('click', () => {
    if (currentStep < formSteps.length - 1) {
      showStep(currentStep + 1);
    } else {
      document.getElementById('multiStepForm').submit();
    }
  });

  // Previous button
  prevBtn.addEventListener('click', () => {
    if (currentStep > 0) {
      showStep(currentStep - 1);
    }
  });

  // Optional: Scroll to top on step change
  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  // Initialize
  showStep(currentStep);

});