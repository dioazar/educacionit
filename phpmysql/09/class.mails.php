<?php 
/**
* Esta clase arma los mails y los manda. 
	Cada método es para un mail distinto y todos usan setearTexto() y mandar_mail()
	También se insertan las distintas notificaciones al mismo tiempo que se mandan los mails con insNotificacion().
*/

require_once __DIR__.'/class.helpers.php';
require_once __DIR__.'/../PHPMailer/PHPMailerAutoload.php';

class Email
{	
	//cambio por si está en producción, testing o local
	//private static $linkHref = 'http://krowolf.com/';
	//private static $linkHref = 'http://testkrowolf.com/';
	//private static $linkHref = 'localhost:8080/contentmanager/';

	/********************************** MAILS DE FUNCIONAMIENTO **********************************************************/
	

	function mail_recuperar_pass($randomString, $email)
	{
		$textoPropio = 'Recuperar contraseña. ';
		$link = 'http://grupoamedia.com.ar/mentoresenred/recpass.php?id='.$randomString;
		$href = '<a href="'.$link.'" style="text-decoration:none !important; color:#fff !important; display:block; padding:13px 20px 11px;">Recuperar contraseña</a>';
		$textoEmail = Self::setearTexto('Recuperar contraseña. ', $textoPropio, $link);
		Self::mandar_mail($email, 'Recuperar contraseña. ', utf8_decode($textoEmail));
	}

	/********************************************** MÉTODOS GENÉRICOS **********************************************************/

	function mandar_mail($para, $titulo, $mensaje)
	{
		//$para = 'dionel.azar@amedia.com.ar';
		$destinatarios = explode(',', $para);

		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = false;
		//$mail->SMTPSecure = "ssl";
		//$mail->Host = "smtp.gmail.com";
		$mail->Host = "dedrelay.secureserver.net";
		$mail->Port = 25;
		//$mail->Host = gethostbyname("smtp.gmail.com");
		//$mail->Port = 465;//465
		//$mail->Username = "no-reply@amedia.com.ar";
		//$mail->Password = "mipassword";
		
		$mail->SetFrom('no-reply@amedia.com.ar', 'Mentores en red');
		$mail->AddReplyTo("no-reply@amedia.com.ar","Mentores en red");
		$mail->Subject = utf8_decode($titulo);

		$mail->MsgHTML($mensaje);//$mail->MsgHTML(utf8_encode($mensaje));

		for ($i=0; $i < count($destinatarios); $i++) { 
			$mail->addAddress($destinatarios[$i], $destinatarios[$i]);
			if(!$mail->Send()) {
				//echo "Error al enviar email: " . $mail->ErrorInfo. "<br>";
				return 'Error al enviar el email ';
			} else {
				//echo "Se envió un email!<br>";
				return 'Se envió un email. ';
			}
		}
	}

	function setearTexto($titulo, $textoPropio, $href)
	{
		$html = '<!DOCTYPE html>
				<html xmlns="http://www.w3.org/1999/xhtml">

				<head>
				    <meta name="viewport" content="width=device-width, initial-scale=1.0">
				    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
				    <meta name="format-detection" content="telephone=no">
				    <title>Recuperar contraseña</title>
				    <!-- apple related styles -->
				    <style>
				    a[x-apple-data-detectors] {
				        color: inherit !important;
				        text-decoration: none !important;
				        font-size: inherit !important;
				        font-family: inherit !important;
				        font-weight: inherit !important;
				        line-height: inherit !important;
				    }

				    div,
				    p,
				    a,
				    li,
				    td {
				        -webkit-text-size-adjust: none;
				    }

				    tbody {
				        vertical-align: top;
				    }
				    </style>
				    <style>
				    .hiddenDefault {
				        display: none;
				        font-size: 0;
				        line-height: 0;
				        height: 0;
				        mso-hide: all;
				        max-height: 0;
				        max-width: 0;
				        width: 0;
				        -ms-interpolation-mode: bicubic;
				        visibility: hidden;
				    }
				    </style>
				    <!-- mediaqueries -->
				    <style>
				    /* MD media queries */

				    @media only screen and (max-width: 640px) {
				        .responsiveTableMd {
				            width: 100% !important;
				        }
				        .noWidthMd {
				            width: 0px !important;
				        }
				        .hiddenMd {
				            display: none !important;
				            width: 0px !important;
				            height: 0px !important;
				            ms-hide: all !important;
				        }
				        .visibleBlockMd {
				            /* To hide: display:none; font-size:0; line-height:0; height:0;mso-hide: all;max-height: 0; max-width: 0; width:0; -ms-interpolation-mode: bicubic;
				                USE <!--[if !mso]><!--> ... <!--<![endif]--> FOR MSO DESKTOP HIDE
				                */
				            display: block!important;
				            max-height: none !important;
				            max-width: none !important;
				            line-height: 1.4 !important;
				            width: 100%!important;
				            height: auto!important;
				            visibility: visible !important;
				        }
				        .visibleInlineMd {
				            /* To hide: display:none; font-size:0; line-height:0; height:0; mso-hide: all;max-height: 0; max-width: 0; width:0; -ms-interpolation-mode: bicubic;
				                USE <!--[if !mso]><!--> ... <!--<![endif]--> FOR MSO DESKTOP HIDE 
				                */
				            display: inline-block !important;
				            max-height: none !important;
				            max-width: none !important;
				            line-height: 1.4 !important;
				            width: auto !important;
				            height: auto !important;
				            visibility: visible !important;
				        }
				        .visibleTableXs {
				            /* To hide: display:none; font-size:0; line-height:0; height:0; mso-hide: all;max-height: 0; max-width: 0; width:0; -ms-interpolation-mode: bicubic; 
				                USE <!--[if !mso]><!--> ... <!--<![endif]--> FOR MSO DESKTOP HIDE
				                */
				            display: table !important;
				            mso-hide: none !important;
				            line-height: 1.4 !important;
				            max-height: none !important;
				            max-width: none !important;
				            line-height: 1.4 !important;
				            height: auto;
				            visibility: visible !important;
				        }
				        .hiddenMd {
				            display: none !important;
				            mso-hide: all !important;
				            width: 0px !important;
				            height: 0px !important;
				            overflow: hidden !important;
				            line-height: 0px !important;
				            font-size: 0px !important;
				        }
				        .h5Md {
				            height: 5px !important;
				        }
				        .h10Md {
				            height: 10px !important;
				        }
				        .h15Md {
				            height: 15px !important;
				        }
				        .wAutoMd {
				            width: auto !important;
				        }
				    }
				    /* SM media queries */

				    @media only screen and (max-width: 510px) {
				        .responsiveTableSm {
				            width: 100% !important;
				        }
				        .noWidthSm {
				            width: 0px !important;
				        }
				        .hiddenSm {
				            display: none !important;
				            width: 0px !important;
				            height: 0px !important;
				            mso-hide: all !important;
				        }
				        .visibleBlockSm {
				            /* To hide: display:none; font-size:0; line-height:0; height:0; mso-hide: all;max-height: 0; max-width: 0; width:0; -ms-interpolation-mode: bicubic; */
				            display: block!important;
				            mso-hide: none !important;
				            max-height: none !important;
				            max-width: none !important;
				            line-height: 1.4 !important;
				            width: 100%!important;
				            height: auto!important;
				            visibility: visible !important;
				        }
				        .visibleInlineSm {
				            /* To hide: display:none; font-size:0; line-height:0; height:0; mso-hide: all;max-height: 0; max-width: 0; width:0; -ms-interpolation-mode: bicubic; */
				            display: inline-block !important;
				            mso-hide: none !important;
				            max-height: none !important;
				            max-width: none !important;
				            line-height: 1.4 !important;
				            width: auto !important;
				            height: auto !important;
				            visibility: visible !important;
				        }
				        .visibleTrSm {
				            display: table-row !important;
				            mso-hide: none !important;
				            max-height: none !important;
				            max-width: none !important;
				            line-height: 1.4 !important;
				            width: auto !important;
				            height: auto !important;
				            visibility: visible !important;
				        }
				        .visibleTableSm {
				            /* To hide: display:none; font-size:0; line-height:0; height:0; mso-hide: all;max-height: 0; max-width: 0; width:0; -ms-interpolation-mode: bicubic; */
				            display: table !important;
				            mso-hide: none !important;
				            line-height: 1.4 !important;
				            max-height: none !important;
				            max-width: none !important;
				            line-height: 1.4 !important;
				            visibility: visible !important;
				        }
				        .hiddenSm {
				            display: none !important;
				            mso-hide: all !important;
				            width: 0px !important;
				            height: 0px !important;
				            overflow: hidden !important;
				            line-height: 0px !important;
				            font-size: 0px !important;
				            visibility: visible !important;
				        }
				        .h5Sm {
				            height: 5px !important;
				        }
				        .h10Sm {
				            height: 10px !important;
				        }
				        .h15Sm {
				            height: 15px !important;
				        }
				        .wAutoSm {
				            width: auto !important;
				        }

				        /**
				             * *********************************
				             * CUSTOM CLASSES
				             * *********************************
				             */

				        .logo-top {
				            width: 100% !important;
				            text-align: center !important;
				        }
				        .headerWeb {
				            width: 100% !important;
				        }

				        .smw10 {
				            width: 10% !important;
				        }
				        .textHeaderSm {
				            padding: 0 10px !important;
				        }
				    }
				    /* XS Media queries */

				    @media only screen and (max-width: 420px) {
				        .responsiveTableXs {
				            width: 100% !important;
				        }
				        .noWidthXs {
				            width: 0px !important;
				        }
				        .hiddenXs {
				            display: none !important;
				            width: 0px !important;
				            height: 0px !important;
				            ms-hide: all !important;
				        }
				        .visibleBlockXs {
				            /* To hide: display:none; font-size:0; line-height:0; height:0; mso-hide: all;max-height: 0; max-width: 0; width:0; -ms-interpolation-mode: bicubic; */
				            display: block!important;
				            max-height: none !important;
				            max-width: none !important;
				            line-height: 1.4 !important;
				            width: 100%!important;
				            height: auto!important;
				            visibility: visible !important;
				        }
				        .visibleInlineXs {
				            /* To hide: display:none; font-size:0; line-height:0; height:0; mso-hide: all;max-height: 0; max-width: 0; width:0; -ms-interpolation-mode: bicubic; */
				            display: inline-block !important;
				            max-height: none !important;
				            max-width: none !important;
				            line-height: 1.4 !important;
				            width: auto !important;
				            height: auto !important;
				            visibility: visible !important;
				        }
				        .visibleTableXs {
				            /* To hide: display:none; font-size:0; line-height:0; height:0; mso-hide: all;max-height: 0; max-width: 0; width:0; -ms-interpolation-mode: bicubic; */
				            display: table !important;
				            mso-hide: none !important;
				            line-height: 1.4 !important;
				            max-height: none !important;
				            max-width: none !important;
				            line-height: 1.4 !important;
				            visibility: visible !important;
				        }
				        .hiddenXs {
				            display: none !important;
				            mso-hide: all !important;
				            width: 0px !important;
				            height: 0px !important;
				            overflow: hidden !important;
				            line-height: 0px !important;
				            font-size: 0px !important;
				            visibility: visible !important;
				        }
				        .h5Xs {
				            height: 5px !important;
				        }
				        .h10Xs {
				            height: 10px !important;
				        }
				        .h15Xs {
				            height: 15px !important;
				        }
				        .h30Xs {
				            height: 30px !important;
				        }
				        .w20Xs {
				            width: 20px !important;
				        }
				        .w15Xs {
				            width: 15px !important;
				        }
				        .wAutoXs {
				            width: auto !important;
				        }


				        /****
				            *** CUSTOM STYLES
				            ****/

				        .btn2 {
				            padding: 10px 45px !important;
				            margin-bottom: 10px !important;
				        }
				        .inlineCellXs {
				            display: inline-block;
				            width: 125px;
				        }
				        .textSizeXs {
				            font-size: 13px !important;
				        }
				        .xsw4 {
				            width: 4% !important;
				        }
				        .phoneXS {
				            text-align: center !important;
				        }
				        .textXs {
				            font-size: 13px !important;
				        }
				        .orXs {
				            margin-bottom: 10px !important;
				        }
				        .headerTxt {
				            padding: 0 15px !important;
				        }
				        .xsH10 {
				            height: 10px !important;
				        }
				    }

				    @media only screen and (max-width: 355px) {
				        .inlineCellXs {
				            display: inline-block;
				            width: 110px;
				        }
				    }
				    </style>

				    <body bgcolor="#F5F5F5" width="100%" style="margin:0px; padding:0px; -webkit-font-smoothing:antialiased; -webkit-text-size-adjust:none">
				        <center>
				            <table width="100%" border="0" cellspacing="0" cellpadding="0" valign="bottom">
				                <tr>
				                    <td class="h30Xs" height="30"></td>
				                </tr>
				                <tr>
				                    <td>
				                        <center>
				                            <!-- -->
				                            <!-- header -->
				                            <!-- -->
				                            <table class="responsiveTableMd"  bgcolor="white" border="0" cellspacing="0" width="650" cellspacing="0" valign="top">
				                                <tr>
				                                    <td>
				                                        <table class="responsiveTableMd" border="0" cellspacing="0" width="650" cellspacing="0" valign="top">
				                                            
				                                            <tr align="center">
				                                                <td>
				                                                    <img  width="100%" src="http://grupoamedia.com.ar/mentoresenred/img/mail-header.png" alt="">
				                                                </td>
				                                            </tr>
				                                        </table>
				                                    </td>
				                                </tr>
				                            </table>
				                        </center>
				                    </td>
				                </tr>
				                <tr>
				                    <td>
				                        <!-- -->
				                        <!-- MODULE 1 -->
				                        <!-- -->
				                        <center>
				                            <table width="100%" class="responsiveTableMd" border="0" cellspacing="0" cellpadding="0" >
				                                <tr align="center">
				                                    <!-- LEFT MARGIN -->
				                                    <td width="100%">
				                                        <center>
				                                            <!-- CONTENT -->
				                                            <table class="responsiveTableMd" width="650" border="0" cellspacing="0" cellpadding="0" bgcolor="white">
				                                                <tr>
				                                                    <td colspan="3" class="h30Xs" height="10"></td>
				                                                </tr>
				                                                <tr>
				                                                    <td width="10"></td>
				                                                    <td valign="middle" align="center" style="width: 60px;line-height: 1.3em;font-size: 16px;letter-spacing: 0.02em;color: #666666;font-family: Arial, Helvetica, sans-serif;"><strong><h1>Recuperar contraseña</h1></strong></td>
				                                                    <td width="10"></td>
				                                                </tr>
				                                                <tr>
				                                                    <td colspan="3" class="h30Xs" height="15"></td>
				                                                </tr>
				                                                <tr>
				                                                    <td width="10"></td>
				                                                    <td valign="middle" align="center" style="width: 60px;line-height: 1.3em;font-size: 16px;letter-spacing: 0.02em;color: #666666;font-family: Arial, Helvetica, sans-serif;">Si no solicitaste una recuperación de contraseña, ignora este email.<br><br>Si solicitaste el cambio, haz click en el siguiente enlace para recuperar tu contraseña.</td>
				                                                    <td width="10"></td>
				                                                </tr>
				                                                <tr>
				                                                    <td colspan="3" height="30"></td>
				                                                </tr>
				                                            </table>
				                                        </center>
				                                    </td>
				                                </tr>
				                            </table>
				                        </center>
				                    </td>
				                </tr>
				                <tr>
				                    <td>
				                        <!-- -->
				                        <!-- MODULE 2 -->
				                        <!-- -->
				                        <center>
				                            <table width="100%" class="responsiveTableMd" border="0" cellspacing="0" cellpadding="0">
				                                <tr align="center">
				                                    <!-- LEFT MARGIN -->
				                                    <td width="100%">
				                                        <center>
				                                            <!-- CONTENT -->
				                                            <table class="responsiveTableMd" width="650" border="0" cellspacing="0" cellpadding="0" bgcolor="white">
				                                                <tr style="max-width: 300px;">
				                                                    <td width="120"></td>
				                                                    <td valign="middle" align="center" style="width: 60px;line-height: 1.3em;font-size: 16px;letter-spacing: 0.02em;color: white;font-family: Arial, Helvetica, sans-serif; width: 200px;padding: 15px;background-color: #0f75a9; text-decoration: none;font-weight: 600;border-radius:5px"><a href="'+$href+'" style="text-decoration: none;color: white;"><strong>Recuperar contraseña</strong></a></td>
				                                                    <td width="120"></td>
				                                                </tr>
				                                                <tr>
				                                                    <td colspan="3" height="30"></td>
				                                                </tr>
				                                            </table>
				                                        </center>
				                                    </td>
				                                </tr>
				                            </table>
				                        </center>
				                    </td>
				                </tr>
				            </table>
				        </center>
				    </body>
				</head>';

		return $html;
	}
}
?>