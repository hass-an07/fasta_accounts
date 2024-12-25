<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Solution-Experts-Invoice</title>
    <meta name="author" content="themeholy">
    <meta name="description" content="Invar - Invoice HTML Template">
    <meta name="keywords" content="Invar - Invoice HTML Template" />
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    {{--
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png"> --}}
    <link rel="manifest" href="{{asset('invoice/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('invoice/img/favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('invoice/css/bootstrap.min.css')}}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('invoice/css/style.css')}}">
    
    <style>
        .color_blue{
            --smoke-dark: #6763ed ;
        }
        .qr_code{
            /*float:right;*/
            display:flex;
            /*right*/
            justify-content:space-between;
        }
        .qr_code img{
            margin-right:120px;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.5;
            overflow-x: hidden; /* Prevent horizontal overflow */
        }
        .invoice-container {
            padding: 10px;
        }
        .big-title {
            font-size: 1.3rem;
        }
        .themeholy-header {
            text-align: center;
            margin-bottom: 20px;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        .row p {
            margin: 5px 0;
        }
        @media screen and (max-width: 480px) {
  .invoice-container {
    height : 100vh;
  }
  
}
    </style>

</head>

<body>


    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <!--********************************
   		Code Start From Here 
	******************************** -->

    <div class="container-fluid invoice-container">
        <div class="invoice-container">
            <main>
                <!--==============================
Invoice Area
==============================-->
                <div class="themeholy-invoice invoice_style4">
                    {{-- <div class="template_shape1">
                        <img src="assets/img/template/car_road.png" alt="car road">
                    </div> --}}
                    <div class="download-inner" id="download_section">
                        <!--==============================
	Header Area
==============================-->
                        <header class="themeholy-header header-layout4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <div class="header-logo">
                                        <a href="{{route('dashboard.index')}}"><img
                                                src="{{asset('invoice/img/acc_logo.jpg')}}" width="200px"
                                                alt="Invar"></a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <h1 class="big-title">SE(SOLUTION EXPERTS)</h1>
                                    <span><b>Phone: </b> 0303-753-0000</span>
                                    <span><b>Youtube: </b> Solution Experts</span>
                                    <span><b>Email: </b> info@SolutionExperts.io</span>
                                </div>
                            </div>
                        </header>
                        <div class="row justify-content-between mb-4">
                            <h5>Invoice</h5>
                            <div class="col-auto">
                                <div class="invoice-left">
                                    <address>
                                        <span class="font-bold text-dark "
                                            style="font-size: 15px; font-weight: bolder">Name : {{$invoice->customer_name}}<br>
                                        <span class="font-bold text-dark "
                                            style="font-size: 15px; font-weight: ">Mobile: {{$invoice->customer_phone}}</span>
                                         <br>
                                        <span class="font-bold text-dark "
                                            style="font-size: 15px; font-weight: ">Cnic: {{$invoice->customer_cnic ?? '' }}</span>
                                    </address>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="invoice-middle">
                                    <address>
                                        <span class="font-bold text-dark "
                                            style="font-size: 15px; font-weight: bolder">CRO: {{ optional($invoice->cro)->first_name ?? '' }}</span>
                                        

                                        <br>
                                        <span class="font-bold text-dark "
                                            style="font-size: 15px; font-weight: bolder">Join
                                            By: {{ $invoice->joined->first_name ?? '' }}</span>
 <br>
                                        <span class="font-bold text-dark "
                                            style="font-size: 15px; font-weight: bolder">Trainer: {{$invoice->trainer->first_name ?? ''}}</span>
                                        

                                        <br>
                                        <span class="font-bold text-dark "
                                            style="font-size: 15px; font-weight: bolder">User iD: {{$invoice->user_id ?? ''}}</span>
                                    </address>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="invoice-right">
                                    <!--<b>Invar Taxi Service:</b>-->
                                    <address>
                                        <span class="font-bold text-dark "
                                            style="font-size: 15px; font-weight: bolder">SrNo: {{$invoice->invoice_number ?? '' }}
                                        </span>
                                        <br>
                                        <span class="font-bold text-dark "
                                            style="font-size: 15px; font-weight: bolder">Date: {{$invoice->date ?? '' }}</span>
                                        <br>
                                    </address>
                                </div>
                            </div>
                        </div>
                        <table class="invoice-table table-stripe3 style2 color_blue" >
                            <thead>
                                <tr>
                                    <th>Details/Description</th>
                                    <th>Rate</th>
                                    <th>Discount</th>
                                    <th>Amount</th>
                                    <th>Net</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>{{$invoice->products->description ?? '' }}</b></td>
                                   <td><b>{{ $invoice->products->price ?? '' }}</b></td>
<td>
    @php
        $productPrice = $invoice->products->price ?? 0;
        $invoiceAmount = $invoice->amount ?? 0;
        $discount = $invoiceAmount - $productPrice;
        $discount = abs($discount); // Get the absolute value of the discount
    @endphp
    <b>{{ $discount }}</b>
</td>
<td><b>{{ $invoice->amount ?? '' }}</b></td>

<td><b>{{ $invoice->amount ?? '' }}</b></td>

                                </tr>
                            </tbody>
                        </table>

                        <div class="row justify-content-between">
                            <div class="col-8">
                                <div class="invoice-left">
                                    <b>Note:</b>
                                    <p class="mb-0">
                                        This amount is not refundable and non-transferable to another person. <br>
                                        <span dir="rtl" style="display: inline-block; text-align: left; width: 100%;">
                                            اپنی سلپ آفس کے نمبر پر وٹس ایپ کریں<br>
                                            (یہ فیس قابل واپسی نہیں)
                                        </span>
                                        
                                    <div class="qr_code">
                                        <div>
                                            For More Details Office Contact # <br>
                                        0303-753-0000 <br>
                                        24/7 On WhatsApp
                                        </div>
                                       <img src="{{asset('invoice/img/qr_code.jpg')}}" width="80px" alt="Qr Code">
                                   </div>
                                    </p>

                                </div>
                            </div>
                                
                            <div class="col-4">
                                <table class="total-table">
                                    <tr>
                                        <th>Sub Total:</th>
                                        <th>{{$invoice->amount}}</th>
                                    </tr>
    <!--                                <tr>-->
    <!--                                    <th>Discount:</th>-->
    <!--                                    <th>-->
    <!--                                        @php-->
    <!--    $productPrice = $invoice->products->price ?? 0;-->
    <!--    $invoiceAmount = $invoice->amount ?? 0;-->
    <!--    $discount = $invoiceAmount - $productPrice;-->
    <!--@endphp-->
    <!--{{ $discount }}-->
    <!--                                    </th>-->
    <!--                                </tr>-->
                                    <tr>
                                        <th>Total:</th>
                                        <th>{{$invoice->amount}}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <p class="company-address style2">
                        <div class="row">
                            <div class="col-3">
                                <div class="card-invoice">
                                    <div class="card-invoice-body text-center">
                                        <p class="card-invoice-title"><b>Forms Department</b></p>
                                        <p class="card-invoice-text"><b>Prepared By</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card-invoice">
                                    <div class="card-invoice-body text-center">
                                        <p class="card-invoice-title"><b>Relationship Manager</b></p>
                                        <p class="card-invoice-text"><b>Reviewed By</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card-invoice">
                                    <div class="card-invoice-body text-center">
                                        <p class="card-invoice-title "><b>Branch <br> Manager</b></p>
                                        <p class="card-invoice-text"><b>Approved By</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p>
                        <p class="invoice-note mt-3  text-black" style="background-color:#6763ed; color: black; font-weight: 700;">
                            <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.64581 13.7917H10.3541V12.5417H3.64581V13.7917ZM3.64581 10.25H10.3541V9.00002H3.64581V10.25ZM1.58331 17.3334C1.24998 17.3334 0.958313 17.2084 0.708313 16.9584C0.458313 16.7084 0.333313 16.4167 0.333313 16.0834V1.91669C0.333313 1.58335 0.458313 1.29169 0.708313 1.04169C0.958313 0.791687 1.24998 0.666687 1.58331 0.666687H9.10415L13.6666 5.22919V16.0834C13.6666 16.4167 13.5416 16.7084 13.2916 16.9584C13.0416 17.2084 12.75 17.3334 12.4166 17.3334H1.58331ZM8.47915 5.79169V1.91669H1.58331V16.0834H12.4166V5.79169H8.47915ZM1.58331 1.91669V5.79169V1.91669V16.0834V1.91669Z"
                                    fill="#2D7CFE" />
                            </svg>

                            <b>NOTE: </b>This is computer generated receipt and does not require signature.
                            <br>
                            The customer pays his dues in his own way so, <br>
                            They have no right to take legal action or claim against company.
                        </p>
                    </div>
                    <div class="invoice-buttons">
                        <button class="print_btn">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.25 13H3.75C3.38542 13 3.08594 13.1172 2.85156 13.3516C2.61719 13.5859 2.5 13.8854 2.5 14.25V19.25C2.5 19.6146 2.61719 19.9141 2.85156 20.1484C3.08594 20.3828 3.38542 20.5 3.75 20.5H16.25C16.6146 20.5 16.9141 20.3828 17.1484 20.1484C17.3828 19.9141 17.5 19.6146 17.5 19.25V14.25C17.5 13.8854 17.3828 13.5859 17.1484 13.3516C16.9141 13.1172 16.6146 13 16.25 13ZM16.25 19.25H3.75V14.25H16.25V19.25ZM17.5 8V3.27344C17.5 2.90885 17.3828 2.60938 17.1484 2.375L15.625 0.851562C15.3646 0.617188 15.0651 0.5 14.7266 0.5H5C4.29688 0.526042 3.71094 0.773438 3.24219 1.24219C2.77344 1.71094 2.52604 2.29688 2.5 3V8C1.79688 8.02604 1.21094 8.27344 0.742188 8.74219C0.273438 9.21094 0.0260417 9.79688 0 10.5V14.875C0.0260417 15.2656 0.234375 15.474 0.625 15.5C1.01562 15.474 1.22396 15.2656 1.25 14.875V10.5C1.25 10.1354 1.36719 9.83594 1.60156 9.60156C1.83594 9.36719 2.13542 9.25 2.5 9.25H17.5C17.8646 9.25 18.1641 9.36719 18.3984 9.60156C18.6328 9.83594 18.75 10.1354 18.75 10.5V14.875C18.776 15.2656 18.9844 15.474 19.375 15.5C19.7656 15.474 19.974 15.2656 20 14.875V10.5C19.974 9.79688 19.7266 9.21094 19.2578 8.74219C18.7891 8.27344 18.2031 8.02604 17.5 8ZM16.25 8H3.75V3C3.75 2.63542 3.86719 2.33594 4.10156 2.10156C4.33594 1.86719 4.63542 1.75 5 1.75H14.7266L16.25 3.27344V8ZM16.875 10.1875C16.3021 10.2396 15.9896 10.5521 15.9375 11.125C15.9896 11.6979 16.3021 12.0104 16.875 12.0625C17.4479 12.0104 17.7604 11.6979 17.8125 11.125C17.7604 10.5521 17.4479 10.2396 16.875 10.1875Z"
                                    fill="#00C764" />
                            </svg>
                        </button>
                        <button id="download_btn" class="download_btn">
                            <svg width="25" height="19" viewBox="0 0 25 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.94531 11.1797C8.6849 10.8932 8.6849 10.6068 8.94531 10.3203C9.23177 10.0599 9.51823 10.0599 9.80469 10.3203L11.875 12.3516V6.375C11.901 5.98438 12.1094 5.77604 12.5 5.75C12.8906 5.77604 13.099 5.98438 13.125 6.375V12.3516L15.1953 10.3203C15.4818 10.0599 15.7682 10.0599 16.0547 10.3203C16.3151 10.6068 16.3151 10.8932 16.0547 11.1797L12.9297 14.3047C12.6432 14.5651 12.3568 14.5651 12.0703 14.3047L8.94531 11.1797ZM10.625 0.75C11.7969 0.75 12.8646 1.01042 13.8281 1.53125C14.8177 2.05208 15.625 2.76823 16.25 3.67969C16.8229 3.39323 17.4479 3.25 18.125 3.25C19.375 3.27604 20.4036 3.70573 21.2109 4.53906C22.0443 5.34635 22.474 6.375 22.5 7.625C22.5 8.01562 22.4479 8.41927 22.3438 8.83594C23.151 9.2526 23.7891 9.85156 24.2578 10.6328C24.7526 11.4141 25 12.2865 25 13.25C24.974 14.6562 24.4922 15.8411 23.5547 16.8047C22.5911 17.7422 21.4062 18.224 20 18.25H5.625C4.03646 18.1979 2.70833 17.651 1.64062 16.6094C0.598958 15.5417 0.0520833 14.2135 0 12.625C0.0260417 11.375 0.377604 10.2812 1.05469 9.34375C1.73177 8.40625 2.63021 7.72917 3.75 7.3125C3.88021 5.4375 4.58333 3.88802 5.85938 2.66406C7.13542 1.4401 8.72396 0.802083 10.625 0.75ZM10.625 2C9.08854 2.02604 7.78646 2.54688 6.71875 3.5625C5.67708 4.57812 5.10417 5.85417 5 7.39062C4.94792 7.91146 4.67448 8.27604 4.17969 8.48438C3.29427 8.79688 2.59115 9.33073 2.07031 10.0859C1.54948 10.8151 1.27604 11.6615 1.25 12.625C1.27604 13.875 1.70573 14.9036 2.53906 15.7109C3.34635 16.5443 4.375 16.974 5.625 17H20C21.0677 16.974 21.9531 16.6094 22.6562 15.9062C23.3594 15.2031 23.724 14.3177 23.75 13.25C23.75 12.5208 23.5677 11.8698 23.2031 11.2969C22.8385 10.724 22.3568 10.2682 21.7578 9.92969C21.2109 9.59115 21.0026 9.09635 21.1328 8.44531C21.2109 8.21094 21.25 7.9375 21.25 7.625C21.224 6.73958 20.9245 5.9974 20.3516 5.39844C19.7526 4.82552 19.0104 4.52604 18.125 4.5C17.6302 4.5 17.1875 4.60417 16.7969 4.8125C16.1719 5.04688 15.651 4.90365 15.2344 4.38281C14.7135 3.65365 14.0495 3.08073 13.2422 2.66406C12.4609 2.22135 11.5885 2 10.625 2Z"
                                    fill="#2D7CFE" />
                            </svg>
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Invoice Conainter End -->

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="{{asset('invoice/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('invoice/js/bootstrap.min.js')}}"></script>
    <!-- PDF Generator -->
    <script src="{{asset('invoice/js/jspdf.min.js')}}"></script>
    <script src="{{asset('invoice/js/html2canvas.min.js')}}"></script>
    <!-- Main Js File -->
    <!--<script src="{{asset('invoice/js/main.js')}}"></script>-->

    <script>
        (function ($) {
  "use strict";

  /*----------- 01. Download as Image Button ----------*/
  $('#download_btn').on('click', function () {
      var downloadSection = $('#download_section');
      var scale = 2; // Scale to enhance image quality

      html2canvas(downloadSection[0], {
          scale: scale,
          useCORS: true
      }).then(function (canvas) {
          // Debug: append canvas to document to verify image
          document.body.appendChild(canvas);

          var imgData = canvas.toDataURL('image/png'); // Change 'image/png' to 'image/jpeg' for JPEG format
          var link = document.createElement('a');
          link.href = imgData;
          link.download = 'downloaded-content.png'; // Change the filename and extension as needed
          link.click();
          window.location.href = "{{ route('invoices.index') }}";
      }).catch(function (error) {
          console.error('Error generating image:', error);
      });
  });

  // Print HTML Document
  $('.print_btn').on('click', function () {
      window.print();
  });

})(jQuery);


    </script>
</body>

</html>