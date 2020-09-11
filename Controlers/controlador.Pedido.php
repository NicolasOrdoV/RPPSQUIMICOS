<?php
require_once 'providers/conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class ControladorPedidos
{
  static public function enviarCorreoPedido($client){
    foreach ($client as $deta) {
      $dataCli=[
      'nombre'=>$deta['nombreEC'],
      'correo'=> $deta['correocontEC'],
      ];
    }
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'rppsquimicos@gmail.com';                     // SMTP username
        $mail->Password   = 'luisblanco23';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('rppsquimicos@gmail.com');
        $mail->addAddress($dataCli['correo']);     // Add a recipient


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'PEDIDO EXITOSO';
        $mail->Body    = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="width:100%;height:100%;font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;Margin:0">
         <head>
          <meta charset="UTF-8">
          <meta content="width=device-width, initial-scale=1" name="viewport">
          <meta content="telephone=no" name="format-detection">
          <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
          <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
          <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
          <title>RPPSQUIMICOS</title>
          <!--[if gte mso 9]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
          <!--[if !mso]> -->
          <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
          <!--<![endif]-->
          <style type="text/css">
        .logo-p-t-b {
                    padding-bottom: 33px;
                    padding-top: 43px;
                }
                .greetings-txt {
                    background-image: url(https://hxe.stripocdn.email/content/guids/CABINET_3acc2dbeb6d3989c0141ed4c5e214eda/images/59731571905663515.jpg);
                    background-position: center top;
                    background-color: #ffffff;
                    background-repeat: no-repeat;
                    padding-right: 80px;
                    padding-left: 80px;
                    padding-bottom: 125px;
                }
                .footer-txt {
                    padding-right: 50px;
                    padding-left: 50px;
                }
                .footer-txt-p {
                    font-size: 16px;
                }
                .footer-txt-block {
                    background-image: url(https://hxe.stripocdn.email/content/guids/CABINET_3acc2dbeb6d3989c0141ed4c5e214eda/images/30171571658072243.jpg);
                    background-position: center top;
                    background-repeat: no-repeat;
                    background-size: 100% 100%;
                    background-color: transparent;
                }
                .txt-recommend {
                    padding-right: 70px;
                }
                .td-align-right {
                    text-align: right;
                }
                .recommend-block {
                    background-image: url(https://hxe.stripocdn.email/content/guids/CABINET_8589bdaaf1e1992d5dc82d81699f82f7/images/16451571054437953.jpg);
                    background-position: center bottom;
                    background-repeat: no-repeat;
                    padding-top: 70px;
                    padding-bottom: 10px;
                }
                .desk-ptb-50 {
                    padding-top: 50px;
                    padding-bottom: 50px;
                }
                .txt-pl {
                    padding-left: 50px;
                }
                .footer-txt-p {
                    font-size: 16px;
                }
                /*СТИЛИ КАРУСЕЛЬКИ*/
                .amp-heading {
                    max-width: 290px;
                }
                .amp-subh {
                    font-size: 16px;
                }
                .amp-p {
                    font-size: 15px;
                    color: #000000;
                    font-family: "open sans", "helvetica neue", helvetica, arial, sans-serif;
                    line-height: 200%;
                    display: block;
                    text-align: left;
                }
                .amp-p-mw-260 {
                    max-width: 260px;
                }
                .amp-p-mw-240 {
                    max-width: 240px;
                }
                .amp-p-p50b {
                    padding-bottom: 50px;
                }
                .amp-carousel-button-next,
                .amp-carousel-button-prev {
                    width: 30px;
                    height: 30px;
                    outline: none;
                    border: none;
                    background-color: transparent;
                    background-repeat: no-repeat;
                    background-size: cover;
                    padding: 0;
                    margin: 0;
                    cursor: pointer;
                    opacity: 0;
                }
                .amp-carousel-button-prev {
                    left: 0;
                    background-image: url(https://hxe.stripocdn.email/content/guids/CABINET_366ca9de771882866be694ab16971fd7/images/15611570806739656.png);
                }
                .amp-carousel-button-next {
                    right: 0;
                    background-image: url(https://hxe.stripocdn.email/content/guids/CABINET_366ca9de771882866be694ab16971fd7/images/49021570806786752.png);
                }
                .text-block {
                    display: inline;
                    flex-basis: 47%;
                    flex-direction: column;
                }
                .kidburg-case-block {
                    background-image: url(https://hxe.stripocdn.email/content/guids/CABINET_3acc2dbeb6d3989c0141ed4c5e214eda/images/9791571658072371.jpg);
                    padding: 85px 60px 60px;
                    padding-top: 40px;
                    background-position: center bottom;
                    background-repeat: no-repeat;
                }
                .amp-descr-block {
                    padding-left: 35px;
                }
                .p-1 {
                    padding-bottom: 38px;
                }
                .amp-heading-block {
                    padding-bottom: 30px;
                }
                .amp-carousel-block {
                    padding-left: 25px;
                    padding-right: 10px;
                    padding-bottom: 60px;
                }
                .amp-carousel-block-3 {
                    padding-bottom: 50px;
                }
                .amp-banner {
                    padding-bottom: 54px;
                }
                .amp-accordion-block {
                    padding-right: 50px;
                    padding-left: 50px;
                }
                section {
                    background-color: transparent;
                    border: none;
                    outline: none;
                    -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
                    -webkit-tap-highlight-color: transparent;
                }
                .amp-accordion-h2 {
                    background-color: transparent;
                    border: none;
                    outline: none;
                    text-decoration: underline;
                    padding-bottom: 30px;
                }
                .amp-accordion-h2-right-1 {
                    text-align: right;
                    padding-right: 128px;
                }
                .amp-accordion-h2-right-2 {
                    text-align: right;
                    padding-right: 164px;
                }
                .amp-accordion-img-block-right {
                    position: absolute;
                    top: 26px;
                    right: 40px;
                    z-index: 100;
                }
                .amp-accordion-img-block-left {
                    position: absolute;
                    top: 40px;
                    left: 0px;
                    z-index: 100;
                }
                .text-block-p30l {
                    padding-left: 30px;
                }
        #outlook a {
        	padding:0;
        }
        .ExternalClass {
        	width:100%;
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
        	line-height:100%;
        }
        a:link,
        span.MsoHyperlink {
        	mso-style-priority:100!important;
        	text-decoration:underline!important;
        }
        .es-button {
        	mso-style-priority:100!important;
        	text-decoration:none!important;
        }
        a[x-apple-data-detectors=true] {
        	color:inherit!important;
        	text-decoration:none!important;
        }
        .es-desk-hidden {
        	display:none;
        	float:left;
        	overflow:hidden;
        	width:0;
        	max-height:0;
        	line-height:0;
        	mso-hide:all;
        }
        @media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:14px!important; line-height:170%!important } h1 { font-size:24px!important; text-align:center!important } h2, h2 a { font-size:15px!important; text-align:left!important } h3 { font-size:16px!important; text-align:left!important; line-height:150%!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:12px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:14px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c { text-align:center!important } .es-m-txt-r { text-align:right!important } .es-m-txt-l, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:inline-block!important } a.es-button { font-size:14px!important; display:inline-block!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .adapt-img-90 { width:90.3%!important; height:auto!important } .adapt-img-74 { width:74.6%!important; height:auto!important } .adapt-img-69 { width:69.8%!important; height:auto!important } .adapt-img-62 { width:62.5%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p5 { padding-top:5px!important; padding-bottom:5px!important; padding-left:5px!important; padding-right:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p10l { padding-left:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15 { padding-top:15px!important; padding-bottom:15px!important; padding-left:15px!important; padding-right:15px!important } .es-m-p20b { padding-bottom:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p22t { padding-top:22px!important } .es-m-p25l { padding-left:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:20px!important } .es-m-p60l { padding-left:60px!important } .es-m-p60b { padding-bottom:60px!important } .es-m-p80t { padding-top:80px!important } .es-m-p100b { padding-bottom:100px!important } .es-m-p105r { padding-right:75px!important } .es-m-p125r { padding-right:105px!important } .es-m-p155r { padding-right:135px!important } .es-m-p155l { padding-left:135px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt { width:auto!important } table.es-social td { display:inline-block!important; padding-bottom:10px } .es-menu td a { font-size:14px!important } .m-bg { background-color:rgb(238, 238, 238)!important } .m-bg-red { background-color:rgb(231, 65, 51)!important } .m-txt-l { font-size:20px!important } .m-txt-s { font-size:12px!important } h4 { font-size:10px!important; line-height:150%!important } .m-logo-m { width:140px!important } .m-bg-none { background-image:none!important } .m-border { border:4px solid rgb(88, 164, 73)!important; background-color:rgb(90, 87, 80)!important } .m-border-gray { border:4px solid rgb(124, 124, 124)!important } .m-border-dashed { border:1px dashed rgb(232, 232, 232)!important; border-radius:10px!important } .m-bg-80 { background-size:80% auto!important; background-position:center center!important } .m-number-s { width:12px!important } .m-number-l { width:18px!important } .m-txt-14 { font-size:14px!important; line-height:150%!important } .m-bg-fff { background-color:rgb(255, 255, 255)!important } .m-img-small { width:90px!important; height:auto!important } .m-bg-bottom { background-size:auto 68%!important } .m-bg-auto { background-size:auto 100%!important } .m-butterfly { width:20px!important; height:auto!important } .m-bg-120 { background-size:110% auto!important } .m-bg-100-100 { background-size:100% 100%!important } .m-br-none { border-radius:0!important } .m-bg-gray { background-color:rgb(41, 41, 41)!important } .m-btn-m { width:200px!important; height:auto!important } .banner-left-p { padding-left:0 } .structure-background { background-position:center bottom; background-size:200% 100% } .container { display:flex } .pr-heading-30 { padding-right:0; text-align:left } .icon-desk-none { display:block; margin-bottom:30px } .logo-p-t-b { padding-top:20px; padding-bottom:20px } .greetings-txt { padding-right:20px; padding-left:20px; padding-bottom:40px; background-image:none } .footer-txt { padding-right:0px; padding-left:0px; font-size:14px; line-height:170% } .footer-txt-p { font-size:14px; line-height:170% } .footer-txt-block { background-size:auto 100% } .amp-heading { max-width:100%; display:block } .amp-p, .amp-subh { font-size:14px; line-height:170% } .amp-carousel-button-next, .amp-carousel-button-prev { width:20px; height:20px } .amp-carousel-1 { height:510px } .amp-carousel-2, .amp-carousel-3 { height:500px } .amp-carousel-block { padding-right:20px; padding-left:20px; padding-bottom:40px } h2 { font-size:15px; text-align:left } h2 a { font-size:15px; text-align:left } .amp-accordion-img-block-left, .amp-accordion-img-block-right { position:static; padding-bottom:30px } .amp-accordion-h2-right-1, .amp-accordion-h2-right-2 { text-align:left; padding-right:0 } .amp-p-mw-260, .amp-p-mw-240 { max-width:100% } }
        </style>
         </head>
         <body style="width:100%;height:100%;font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;Margin:0">
          <div class="es-wrapper-color" style="background-color:#FFFFFF">
           <!--[if gte mso 9]>
        			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
        				<v:fill type="tile" color="#ffffff"></v:fill>
        			</v:background>
        		<![endif]-->
           <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
             <tr style="border-collapse:collapse">
              <td valign="top" style="Margin:0">
               <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                 <tr style="border-collapse:collapse">
                  <td align="center" bgcolor="transparent" style="Margin:0;background-color:transparent">
                   <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:700px">
                     <tr style="border-collapse:collapse">
                      <td class="es-m-p20b" align="left" style="Margin:0;border-radius:30px 30px 0px 0px;background-color:#515151" bgcolor="#515151">
                       <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                         <tr style="border-collapse:collapse">
                          <td align="center" valign="top" style="Margin:0;width:700px">
                           <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-size:100%" role="presentation">
                             <tr style="border-collapse:collapse">
                              <td align="center" class="logo-p-t-b" style="Margin:0;font-size:0px"><a target="_blank" href="http://imgfz.com/i/9ifdakv.png" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;font-size:15px;text-decoration:underline;color:#000001"><img src="http://imgfz.com/i/a6fzqhO.png" alt="RPPSQUIMICOS" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" height="50" title="RPPSQUIMICOS" class="m-logo-m" sizes="(max-width:600px) 140px, 204px"></a></td>
                             </tr>
                             <tr style="border-collapse:collapse">
                              <td align="center" class="es-m-p30b amp-banner" style="Margin:0;font-size:0px"><a target="_blank" href="https://:v" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;font-size:15px;text-decoration:underline;color:#000001"><img src="http://imgfz.com/i/xb7R1zK.png" alt="Pedido Completo" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="374" sizes="(max-width:600px) 80vw, 373px" class="adapt-img" title="Pedido Completo"></a></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table></td>
                     </tr>
                     <tr style="border-collapse:collapse">
                      <td class="es-m-p20l es-m-p20r es-m-p40b m-bg-none" align="left" style="Margin:0;padding-top:40px;background-image:url(http://imgfz.com/i/d56uATF.jpeg);background-position:center top;background-color:#FFFFFF;background-repeat:no-repeat;padding-right:80px;padding-left:80px;padding-bottom:125px" bgcolor="#ffffff" background="http://imgfz.com/i/d56uATF.jpeg">
                       <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                         <tr style="border-collapse:collapse">
                          <td align="center" valign="top" style="Margin:0;width:540px">
                           <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                             <tr style="border-collapse:collapse">
                              <td align="left" style="Margin:0;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;line-height:30px;color:#000000">¡Hola '. $dataCli['nombre'] .'!<span style="font-family:roboto, "helvetica neue", helvetica, arial, sans-serif"></span></p></td>
                             </tr>
                             <tr style="border-collapse:collapse">
                              <td align="left" style="Margin:0;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:15px;font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;line-height:30px;color:#000000">Tu pedido está en camino. ¡Estará llegando dentro de 2 a 5 Días! !&nbsp;<span style="font-family:roboto, "helvetica neue", helvetica, arial, sans-serif"></span></p></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table></td>
                     </tr>
                     <tr style="border-collapse:collapse">
                      <td class="m-bg-auto" align="left" style="Margin:0;background-size:100% 100%;background-color:transparent;background-position:center top" bgcolor="transparent">
                       <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                         <tr style="border-collapse:collapse">
                          <td align="center" valign="top" style="Margin:0;width:700px">
                           <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center top" role="presentation">
                             <tr style="border-collapse:collapse">
                              <td align="center" style="Margin:0;padding-top:25px;font-size:0px"><img src="http://imgfz.com/i/RPJSXvp.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="700" class="adapt-img"></td>
                             </tr>
                           </table></td>
                         </tr>
                         <tr class="es-visible-simple-html-only" style="border-collapse:collapse">
                          <td align="center" valign="top" style="Margin:0;width:700px">
                           <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-position:center top;background-color:#515151;border-radius:0 0 30px 30px" bgcolor="#515151" role="presentation">
                             <tr style="border-collapse:collapse">
                              <td align="center" style="Margin:0;padding-top:20px"><h1 style="Margin:0;line-height:43px;mso-line-height-rule:exactly;font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;font-size:36px;font-style:normal;font-weight:bold;color:#FFFFFF">¡Aún <span style="font-family:roboto, "helvetica neue", helvetica, arial, sans-serif"></span>hay más!</h1></td>
                             </tr>
                             <tr style="border-collapse:collapse">
                              <td align="center" style="Margin:0;padding-top:30px;padding-right:140px;padding-left:140px" class="es-m-p20l es-m-p20r"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;line-height:32px;color:#FFFFFF;letter-spacing:1px">RPPSQUIMICOS <span style="font-family:roboto, "helvetica neue", helvetica, arial, sans-serif"></span>tiene una gran variedad de productos de excelente calidad&nbsp;que pueden estar a un click de distancia</p></td>
                             </tr>
                             <tr style="border-collapse:collapse">
                              <td align="center" style="Margin:0;padding-left:20px;padding-right:20px;padding-bottom:50px;font-size:0px"><a target="_blank" href="https://:v" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;font-size:15px;text-decoration:underline;color:#000001"><img class="adapt-img" src="http://imgfz.com/i/XwnxUBJ.png" alt="Visita nuestros productos" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="382" title="Visita nuestros productos"></a></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table></td>
                     </tr>
                   </table></td>
                 </tr>
               </table>
               <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                 <tr style="border-collapse:collapse">
                  <td align="center" bgcolor="transparent" style="Margin:0;background-color:transparent">
                   <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:700px">
                     <tr class="es-visible-simple-html-only" style="border-collapse:collapse">
                      <td align="left" style="Margin:0;padding-bottom:20px;padding-top:30px;background-position:center top">
                       <!--[if mso]><table style="width:700px" cellpadding="0" cellspacing="0"><tr><td style="width:480px" valign="top"><![endif]-->
                       <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                         <tr style="border-collapse:collapse">
                          <td class="es-m-p20b" align="left" style="Margin:0;width:480px">
                           <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                             <tr style="border-collapse:collapse">
                              <td class="es-m-txt-c" align="left" style="Margin:0;padding-left:20px;padding-right:20px;font-size:0px"><a target="_blank" href="#" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:"open sans", "helvetica neue", helvetica, arial, sans-serif;font-size:15px;text-decoration:underline;color:#000001"><img src="http://imgfz.com/i/r9THY3S.png" alt="Сделано в Inbox Marketing" title="Сделано в Inbox Marketing" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="65"></a></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table>
                       <!--[if mso]></td><td style="width:20px"></td><td style="width:200px" valign="top"><![endif]-->
                       <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                         <tr style="border-collapse:collapse">
                          <td align="left" style="Margin:0;width:200px">
                           <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                             <tr style="border-collapse:collapse">
                              <td align="left" class="es-m-txt-c" style="Margin:0;padding-left:20px;padding-right:20px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:"open sans", verdana;line-height:14px;color:#000000">2020, Garoware Software ©</p></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table>
                       <!--[if mso]></td></tr></table><![endif]--></td>
                     </tr>
                     <tr style="border-collapse:collapse">
                      <td align="left" style="Margin:0;background-position:center top">
                       <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                         <tr style="border-collapse:collapse">
                          <td valign="top" align="center" style="Margin:0;width:700px">
                           <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center top" role="presentation">
                             <tr class="es-visible-simple-html-only" style="border-collapse:collapse">
                              <td align="center" class="es-m-txt-c" style="Margin:0;padding-bottom:15px;padding-left:20px;padding-right:20px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:"open sans", verdana;line-height:14px;color:#000000">Todos los derechos reservados.</p></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table>
          </div>
         </body>
        </html>
';
        $mail->CharSet = 'UTF-8';
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}
