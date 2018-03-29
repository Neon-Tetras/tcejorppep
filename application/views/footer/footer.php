         
         
         <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
         <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/form_helpers/dist/js/bootstrap-formhelpers.min.js'); ?>"></script>
         <script type="text/javascript" src="<?php echo base_url('assets/inteTelInput/build/js/intlTelInput.min.js'); ?>"></script>
         <script>
    $("#phone").intlTelInput({
//     allowDropdown: true,
     autoHideDialCode: false,
      // autoPlaceholder: "off",
       dropdownContainer: "body",
//       excludeCountries: ["us"],
       formatOnDisplay: true,
     geoIpLookup: function(callback) {
         $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
           var countryCode = (resp && resp.country) ? resp.country : "";
           callback(countryCode);
         });
       },
       hiddenInput: "full_number",
       initialCountry: "auto",
      // nationalMode: false,
//       onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
       placeholderNumberType: "MOBILE",
//       preferredCountries: ['cn', 'jp'],
       separateDialCode: true,
      utilsScript: "<?php echo base_url('assets/inteTelInput/build/js/utils.js'); ?>"
    });
   
  </script>
      </head>
         
  </html>