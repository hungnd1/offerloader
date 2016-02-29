<?php

namespace frontend\helpers;
define('secret_key', 's3cr3t_k3y');
/**
 * Description of CUtils
 *
 * @author Nguyen Chi Thuc
 */
class CUtils {

    /**
     * @param $file_path: path of css, image
     * @return string
     */
    public static function getAssetUrl($file_path) {
        return \Yii::$app->urlManagerPublic->getBaseUrl(). '/' . $file_path;
    }

    /**
     * @param array $params : string action, parameters ex: ['site/index','a'=>1]
     * @return mixed
     */
    public static function createAbsoluteUrl($params= array()) {
        return \Yii::$app->urlManagerPublic->createAbsoluteUrl($params);
    }

    /**
     * get user ip
     *
     * @return string
     */
    public static function getUserIP() {
        if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
                $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
                return trim($addr[0]);
            } else {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        }
        else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    /**
     * split title
     *
     * @param $length
     * @param $title
     * @return string
     */
    public static function splitTitle($length, $title) {
        if (strlen(trim($title)) > $length) {
            $title = mb_substr(trim($title), 0, $length - 3,"UTF-8") . '...';
        }
        return trim($title);
    }

	/**
	 * Log a msg as custom level "CUtils::Debug"
	 * You need to add this level ("CUtils::Debug") to log component in config/main.php :
	 * <code>
	 * 'log'=>array(
	 *		'class'=>'CLogRouter',
	 *		'routes'=>array(
	 *			array(
	 *				'class'=>'CFileLogRoute',
	 *				'levels'=>'error, warning, <b>CUtils::Debug</b>',
	 *			),
	 *			array('class'=>'CWebLogRoute',),
	 *		),
	 * </code>
	 * @param string $msg
	 */
	public static function Debug($msg, $category="mAloTV") {
		\Yii::log($msg, 'CUtils::Debug', $category);
	}

	public static function randomString($length=32, $chars="abcdefghijklmnopqrstuvwxyz0123456789") {
		$max_ind = strlen($chars)-1;
		$res = "";
		for ($i =0; $i < $length; $i++) {
			$res .= $chars{rand(0, $max_ind)};
		}

		return $res;
	}

	public static function checkIPRange($ip) {
		$ipRanges = Yii::app()->params['ipRanges'];
		foreach ($ipRanges as $range) {
			if (CUtils::cidrMatch($ip, $range)) {
				return true;
			}
		}
		return false;
	}


	public static function encrypt($str) {
		return md5($str);
	}

	public static function timeElapsedString($ptime) {
		$etime = time() - $ptime;
	  
		if ($etime < 1) {
			return '0 giây';
		}
	  
		$a = array( 12 * 30 * 24 * 60 * 60  => 'năm',
				30 * 24 * 60 * 60       => 'tháng',
				24 * 60 * 60            => 'ngày',
				60 * 60                 => 'giờ',
				60                      => 'phút',
				1                       => 'giây'
		);
	  
		foreach ($a as $secs => $str) {
			$d = $etime / $secs;
			if ($d >= 1) {
				$r = round($d);
				return $r . ' ' . $str . ' trước';
			}
		}
	}

    public static function httpStatusOK($status_code){
        $pattern = '/^[54].*/';
        if(preg_match($pattern,$status_code)){
            return false;
        }else{
            return true;
        }
    }

    public static function getThemeURL(){
        return Yii::app()->theme->baseUrl;
    }

    public static function httpBuildQuery($url, $params){
        $determine = '?';
        $pos = strrpos($url, '?');
        if($pos > 1){
            if($pos < strlen($url)){
                $determine = '&';
            }else{
                $determine = '';
            }
        }
        $query = $url.$determine;
        foreach($params as $key=>$val){
            $query .= $key.'='.$val.'&';
        }
        $query = substr($query,0,-1);
        return $query;
    }

    /**
     * @param Unixtimestamp $timestampt
     * @return string
     */
    public static function convertMysqlTime($timestampt){
        return date("Y-m-d H:m:s", $timestampt);
    }

	public static function convertMysqlToTimestamp($dateString) {
		$format = '@^(?P<year>\d{4})-(?P<month>\d{2})-(?P<day>\d{2}) (?P<hour>\d{2}):(?P<minute>\d{2}):(?P<second>\d{2})$@';
		preg_match($format, $dateString, $dateInfo);
		$unixTimestamp = mktime(
				$dateInfo['hour'], $dateInfo['minute'], $dateInfo['second'],
				$dateInfo['month'], $dateInfo['day'], $dateInfo['year']
		);
		return $unixTimestamp;
	}

	public static function timeElapsedStringFromMysql($dateString) {
		$ptime = CUtils::convertMysqlToTimestamp($dateString);
		return CUtils::timeElapsedString($ptime);
	}

	public static function cidrMatch($ip, $range) {
		list ($subnet, $bits) = explode('/', $range);
		$ip = ip2long($ip);
		$subnet = ip2long($subnet);
		$mask = -1 << (32 - $bits);
		$subnet &= $mask; # nb: in case the supplied subnet wasn't correctly aligned
		return ($ip & $mask) == $subnet;
	}

	public static function truncateWords($text, $length = 10){
		if(strlen($text) > $length){
			$text_temp = substr($text, 0, $length);
			$end_point = strrpos($text_temp, ' ');
			$text_fi = substr($text_temp, 0, $end_point).'...';
			return $text_fi;
		}else{
			return $text;
		}
	}

    /**
     *
     * @param string $mobileNumber
     * @param int type format: 0: format 84xxx, 1: format 0xxxx, 2: format xxxx
     * @return String valid mobile
     */
    public static function validateMobile($mobileNumber, $typeFormat = 0){
        $valid_number = '';
        if($mobileNumber == '841663333333')return $mobileNumber;
        // Remove string "+"
        $mobileNumber = str_replace('+84', '84', $mobileNumber);

        //TODO: for testing: dung so dung cua VMS goi qua charging test ko thanh cong

        if(preg_match('/^(84|0)(91|94|123|124|125|127|129)\d{7}$/', $mobileNumber, $matches)){

            /**
             * $typeFormat == 0: 8491xxxxxx
             * $typeFormat == 1: 091xxxxxx
             * $typeFormat == 2: 91xxxxxx
             */
            if($typeFormat == 0){
                if ($matches[1] == '0' || $matches[1] == ''){
                    $valid_number = preg_replace('/^(0|)/', '84', $mobileNumber);
                }else{
                    $valid_number = $mobileNumber;
                }
            }else if($typeFormat == 1){
                if ($matches[1] == '84' || $matches[1] == ''){
                    $valid_number = preg_replace('/^(84|)/', '0', $mobileNumber);
                }else{
                    $valid_number = $mobileNumber;
                }
            }else if ($typeFormat == 2){
                if ($matches[1] == '84' || $matches[1] == '0'){
                    $valid_number = preg_replace('/^(84|0)/', '', $mobileNumber);
                }else{
                    $valid_number = $mobileNumber;
                }
            }

        }
        return $valid_number;
    }

	public static function getStartDate($startDate){
    	$date = new DateTime($startDate);
		$date->setTime(00, 00, 00);
		return $date->format('Y-m-d H:i:s');
    }

    public static function getEndDate($endDate){
    	$date = new DateTime($endDate);
		$date->setTime(23, 59, 59);
		return $date->format('Y-m-d H:i:s');
    }

    public static function messageNot3G(){
        return "Tính năng chỉ sử dụng trên  GPRS/3G  của MobiFone. Xin lỗi quý khách vì sự bất tiện này";
    }

    /**
     * validate string date
     *
     * @param $date
     * @param $separator: / or -
     * @return bool
     */
    public static function isDate($date, $separator) {
        $arrayDate =  explode($separator, $date);
        if(count($arrayDate) < 3) {
            return false;
        }
        $day = (int) $arrayDate[0];
        $month = (int) $arrayDate[1];
        $year = (int) $arrayDate[2];
        //validate ngay hop le trong nam
        if(!checkdate($month, $day, $year)) {
            return false;
        }
        return true;
    }

    public static function encryptVMSLinkConfirm($params){
        $str = implode('&', $params);
        return base64_encode(self::aes128_ecb_encrypt(VMS_ENCRYPT_KEY,$str,""));

    }

    public static function decryptVMSLinkConfirm($str){
        $str = str_replace(' ', '+', $str);
        $clean_str =  self::aes128_ecb_decrypt(VMS_ENCRYPT_KEY,base64_decode($str),"");
        $params = explode('&', $clean_str);
        if($params){
                return array(
                    'trans_id' => $params[0],
                    'msisdn' => $params[1],
                    'status' => $params[2],
                );
        }else{
            return false;
        }
    }
    public static function decryptVMSLinkConfirm2($str){
        $str = str_replace(' ', '+', $str);
        $clean_str =  self::aes128_ecb_decrypt(VMS_ENCRYPT_KEY,base64_decode($str),"");
        $params = explode('&', $clean_str);
        if($params){
                return $params;
        }else{
            return false;
        }
    }

    // Hàm nhúng
    public static function aes128_ecb_encrypt($key, $data, $iv = '') {
        if(16 !== strlen($key)) $key = hash('MD5', $key, true);
        if(16 !== strlen($iv)) $iv = hash('MD5', $iv, true);
        $padding = 16 - (strlen($data) % 16);
        $data .= str_repeat(chr($padding), $padding);
        return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB, $iv);
    }
    public static function aes256_ecb_encrypt($key, $data, $iv = '') {
        if(32 !== strlen($key)) $key = hash('SHA256', $key, true);
        if(16 !== strlen($iv)) $iv = hash('MD5', $iv, true);
        $padding = 16 - (strlen($data) % 16);
        $data .= str_repeat(chr($padding), $padding);
        return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB, $iv);
    }
    public static function aes128_ecb_decrypt($key, $data, $iv = '') {
        if(16 !== strlen($key)) $key = hash('MD5', $key, true);
        if(16 !== strlen($iv)) $iv = hash('MD5', $iv, true);
        $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB, $iv);
        $padding = ord($data[strlen($data) - 1]);
        return substr($data, 0, -$padding);
    }
    public static function aes256_ecb_decrypt($key, $data, $iv = '') {
        if(32 !== strlen($key)) $key = hash('SHA256', $key, true);
        if(16 !== strlen($iv)) $iv = hash('MD5', $iv, true);
        $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_ECB, $iv);
        $padding = ord($data[strlen($data) - 1]);
        return substr($data, 0, -$padding);
    }

}

?>
