  /* *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** ***
  /////////////////   Down Load Button Function   /////////////////
  *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** */
 
(function ($) {
  'use strict';

  document.addEventListener('DOMContentLoaded', function() {
    const downloadBtn = document.getElementById('tm_download_btn');

    downloadBtn.addEventListener('click', function() {
        // Target the invoice section
        const invoiceSection = document.getElementById('tm_download_section');

        // Use html2canvas to capture the invoice section
        html2canvas(invoiceSection, { scale: 2 }).then(canvas => {
            // Convert the canvas to an image
            const imgData = canvas.toDataURL('image/png');

            // Create a link element for downloading
            const link = document.createElement('a');
            link.href = imgData;
            link.download = 'invoice.png';
            link.click();
        });
    });
});


})(jQuery);
