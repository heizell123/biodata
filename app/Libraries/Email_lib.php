<?php

namespace App\Libraries;

class Email_lib {

	public function template_reject($number,$title,$subject,$nama,$note){
		$data = '<table align="center" cellpadding="0" cellspacing="0" width="500" style="border: 3px solid #C1CDD8; ">
            <tbody>          
            <tr style="background: #56b2e3; height: 50;">        
                <td colspan="3" style="  padding: 5px 0px 5px 5px;font-size: 14px; font-weight: bold; " align="center">
					<img src="http://kpi.vci.co.id/assets/images/mail.png" alt="Creating Email Magic" width="120" height="100" style="display: block;" />
					<p style="text-transform: uppercase;">For Your Information</p>
				</td> 
            </tr>  
            <tr>
                <td colspan="100%">&nbsp;</td>
            </tr>
            <tr height="25">
                <td style="padding: 0 0 0 10px;" colspan="100%">
                    <table border="0" width="100%">
                        <tr><td align=center><strong>'.$title.' '.date('Y-m-d H:i:s').'</strong> </td><tr>';
                        $data .='<tr><td align=center>'.$subject.' '.$nama.'</td></tr>';
                        $data .='<tr><td align=center>'.$note.'</td></tr>';
                        $data .='<tr><td align=center>Akses dengan cara klik atau copy hyperlink URL dibawah ini: </td></tr>				
		                        <tr>
									<td align=center colspan="100%" style="padding: 0 0 10px 10px;"><a href="http://kpi.vci.co.id/index.php/login">Klik Disini</a></td>
								</tr> ';
                    $data .='</table>	
                </td>
            </tr> 
            </tbody>
        </table>
        ';
		return $data;
	}

	public function SendMail($subject,$tujuan,$cc='',$bcc='',$message=''){
		$email_smtp = \Config\Services::email();



		$email_smtp->setFrom("vci@vci.co.id", "VCI Notification");
		$email_smtp->setTo($tujuan);
		$email_smtp->setCC($cc);
		$email_smtp->setBCC($bcc);

		$email_smtp->setSubject($subject);
		$email_smtp->setMessage($message);


		$email_smtp->send();
	}

	public function Test(){
		echo 'Test lib';
	}


}