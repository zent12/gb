<?php
//CREATED BY TM@17
//https://github.com/zent12
$device = "ebf".rand(255,999)."d".rand(1001,9999)."c4mm95c".rand(2500,6000)."f6c".rand(8000,9999)."4m0";
$headers1 = array();
$headers1[] = 'deviceid: '.$device.'';
$headers1[] = 'osname: android';
$headers1[] = 'appversion: 0.54.0';
$headers1[] = 'user-agent: Mucho/0.54.0(104'.rand(1000,999).') MuchoJS/0.54.0('.rand(100,199).') Android/7.1.1 (samsung cannine SM-J'.rand(100,999).'F let1337 ID; emulator/false; notch/false; tablet/false; landscape/false)';
$headers1[] = 'accept-language: id;';
$headers1[] = 'content-type:application/json;charset=utf-8';

$headers2 = array();
$headers2[] = 'accept: application/json';
$headers2[] = 'user-agent: Mozilla/5.0 (Linux; Android 0; X-ALIP%27CODE) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Mobile Safari/537.36';
$headers2[] = 'sec-fetch-mode: cors';
echo "\n";
echo "=========================\n";
echo "AutoRegis Mucho \n";
echo "Created By TM@17 \n";
echo "=========================\n";
echo "\n";
echo "Invite ID : ";
$link = trim(fgets(STDIN));
echo "Nomor : ";
$nomor = trim(fgets(STDIN));

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.mucho.id/core/signup/mobile/code');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"countryCode":"62","mobile":"'.$nomor.'","platform":"H5","preferredMethod":"whatsapp"}');
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'Accept: application/json, text/plain, */*';
$headers[] = 'Origin: https://mobile.mucho.id';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 7.1.1; SM-J250F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Mobile Safari/537.36';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Content-Type: application/json;charset=UTF-8';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Referer: https://i.mucho.id/dailycash/3mxl3rkyh9v69/2';
$headers[] = 'Accept-Encoding: gzip, deflate, br';
$headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ms;q=0.6';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$getotp = curl_exec($ch);
$jsgetotp = json_decode($getotp[0]);
var_dump($getotp);
sleep(5);
echo "OTP : ";
$otp = trim(fgets(STDIN));
$verifotp = curl('https://uc.mucho.id/user/signup','{"countryCode":"62","mobile":"'.$nomor.'","smsCode":"'.$otp.'"}', $headers);
$jsverifotp =  json_decode($verifotp[0]);
if($jsverifotp->code == 1){
	echo "Sukses Regis... \n";
	echo "Fecthing reffid... \n";
$reffid = $jsverifotp->data->hashid;
$nama =  $jsverifotp->data->name;
echo "Reffid ";
echo $reffid;
echo "\n";
echo $nama;
echo "\n";
$token = $jsverifotp->data->token;
echo $token ;
echo "\n";
$nuyul = curl('https://activity.mucho.id/redPacket/genZhuli?inviterId='.$link.'&inviteeId='.$reffid.'&inviteeName='.$nama.'&source=1&userHeadUrl=0',null,$headers);
$jsnuyul = json_decode($nuyul[0]);
echo $jsnuyul->message;
echo " Regis Dengan reff ";
echo $link;
echo "\n";
echo "Proses login App \n";
echo "Your device id ";
echo $device;
echo "\n";
sleep(3);
$loginapp = curl('https://api.mucho.id/core/signup/mobile/code', '{"countryCode":"62","mobile":"'.$nomor.'","platform":"android","preferredMethod":"sms"}', $headers1);
$jsloginapp = json_decode($loginapp[0]);
echo "OTP : ";
$otplogin = trim(fgets(STDIN));
$headers1[] = 'cookie: JSESSIONID=3203A1'.rand(1111,9999).'B9BD2D'.rand(1000,9999).'2FF5EDB117E7';
$appotp = curl('https://api.mucho.id/user/signup', '{"countryCode":"62","mobile":"'.$nomor.'","smsCode":"'.$otplogin.'"}', $headers1);
$jsappotp = json_decode($appotp[0]);
$pushtoken = curl('https://api.mucho.id/core/user/pushToken', '{"token":"'.$token.'"}', $headers1);
sleep(1);
$headers1[] = 'authorization: user_token '.$token.'';
$changemail = curl('https://api.mucho.id/core/user', '{"email":"dziuninc'.rand(1000,9999).'@gmail.com","gender":"male","hasPassword":0,"hashid":"'.$reffid.'","mobile":"+62'.$nomor.'","name":":'.$nama.'","avatar":"https://s3-ap-southeast-1.amazonaws.com/mucho-user-contents/default-avatars/male-5.png","birthday":"1981-05-17T05:00:00.000Z"}', $headers1);
echo "Success \n";
} else {
print_r($jsverifotp);
}
function curl($url, $fields = null, $headers = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($fields !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        if ($headers !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $result   = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return array(
            $result,
            $httpcode
        );
        }
?>
