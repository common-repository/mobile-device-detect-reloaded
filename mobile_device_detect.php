<?php
/**
 * Mobile Device Detect Reloaded script, based on Detect Mobile Browser (http://detectmobilebrowsers.com/).
 *
 * Detect Mobile Browser script was created by Chad Smith (https://twitter.com/chadsmith).
 * http://detectmobilebrowsers.com/
 *
 * LICENSE: This is free and unencumbered software released into the public domain.
 * For more information, please refer to the UNLICENSE (http://unlicense.org/).
 *
 * @author     Chad Smith (https://twitter.com/chadsmith)
 * @author     Guilherme Desimon (https://twitter.com/guidesimon)
 * @license    http://unlicense.org/  UNLICENSE
 * @link       http://detectmobilebrowsers.com
 * @link       http://wordpress.org/plugins/mobile-device-detect-reloaded/
 *
 *
 * TABLET SUPPORT ->  |android|ipad|playbook|silk
*/
function mobile_device_detect($iphone=true,$ipad=true,$android=true,$windowsPhone=true,$opera=true,$blackberry=true,$palm=true,$windows=true,$moboredir=false,$desktopredirect=false) {
  $mobile = false;
  $useragent=$_SERVER['HTTP_USER_AGENT'];
  switch (true) {
    case (preg_match('/ip(hone|od)/i', $useragent)):
      $mobile = $iphone;
      if(filter_var($iphone, FILTER_VALIDATE_URL) !== FALSE) {
        $moboredir = $iphone;  
      }
      break;

    case (preg_match('/ipad/i', $useragent)):
      $mobile = $ipad;
      if(filter_var($ipad, FILTER_VALIDATE_URL) !== FALSE) {
        $moboredir = $ipad; 
      }
      break;

    case (preg_match('/android/i', $useragent)):
      $mobile = $android;
      if(filter_var($android, FILTER_VALIDATE_URL) !== FALSE) {
        $moboredir = $android;
      }
      break;


    case (preg_match('/iemobile/i', $useragent)):
      $mobile = $windowsPhone;
      if(filter_var($windowsPhone, FILTER_VALIDATE_URL) !== FALSE) {
        $moboredir = $windowsPhone;
      }

    case (preg_match('/opera m(ob|in)i/i', $useragent)):
      $mobile = $opera;
      if(filter_var($opera, FILTER_VALIDATE_URL) !== FALSE) {
        $moboredir = $opera;
      }
      break;

    case (preg_match('/(blackberry|bb)/i', $useragent)):
      $mobile = $blackberry;
      if(filter_var($blackberry, FILTER_VALIDATE_URL) !== FALSE) {
        $moboredir = $blackberry;
      }
      break;

    case (preg_match('/palm( os)?|phone|p(ixi|re)\/|plucker|pocket|treo/i', $useragent)):
      $mobile = $palm;
      if(filter_var($palm, FILTER_VALIDATE_URL) !== FALSE) {
        $moboredir = $palm;
      }
      break;

    case (preg_match('/windows (ce|phone)|xda/i', $useragent)):
      $mobile = $windows;
      if(filter_var($windows, FILTER_VALIDATE_URL) !== FALSE) {
        $moboredir = $windows;
      }
      break;


    case (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))):
      $mobile = true;
      break;

    default;
      $mobile = false;
      break;
  }

  if($redirect = ($mobile == true) ? $moboredir : $desktopredirect){
    header('Location: '.$redirect);
    exit;
  } else { 
    if($mobile==''){
      return $mobile;
    }else{
      return array($mobile, $status);
    }
  }

  
}