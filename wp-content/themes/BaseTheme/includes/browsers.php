<?php
/**
 * Functions for browser detection
 *
 * @package BaseTheme 2021
 * @since 1.0.0
 *
 */

namespace Browsersphp;

class Browsers {

  public $classes = array();

  public function __construct() {
  $this->user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
  }


  /**
   * Microsoft Edge Detection
   *
   * @return bool : Returns 'True' if the current device is a Windows Phone
   *
   */
  public function is_msft_edge() {
	if(strpos($this->user_agent,'windows nt') && strpos($this->user_agent,'edge')){
	  return true;
	}else{
	  return false;
	}
  }


  /**
   * Android Stock Browser Detection
   *
   * @return bool : Returns 'True' if the current device is a Windows Phone
   *
   */
  public function is_android_stock() {

	//results array
	$matches = [];

	//perform regex query
	preg_match ( '/Android.*AppleWebKit\/([\d.]+)/', $_SERVER['HTTP_USER_AGENT'], $matches);

	//Check if the regex query returned matches specific to
	//the android stock browser.
	if( isset($matches[0]) && ( isset($matches[1]) && intval($matches[1] < 537) ) ){
	  return true;
	}
	return false;
  }


  /**
   * Windows Phone Detection
   *
   * @return bool : Returns 'True' if the current device is a Windows Phone
   *
   */
  public function is_windows_phone() {
	return (bool) strpos($this->user_agent,'windows phone');
  }


  /**
   * iPad Detection
   *
   * @return bool : Returns 'True' if the current device is an iPad
   *
   */
  public function is_ipad() {
	return (bool) strpos($this->user_agent,'ipad');
  }


  /**
   * iPhone Detection
   *
   * @return bool : Returns 'True' if the current device is an iPhone
   *
   */
  public function is_iphone() {
	return (bool) strpos($this->user_agent,'iphone');
  }


  /**
   * iPhone iOS 7 Detection
   *
   * @return bool : Returns 'True' if the current device is an iPhone iOS 7
   *
   */
  public function is_ios7() {
	if ($this->is_iphone() || $this->is_ipad() || $this->is_ipod())
	  return (bool) strpos($this->user_agent,'iphone os 7_');
	else
	  return false;
  }


  /**
   * iPhone iOS 8 Detection
   *
   * @return bool : Returns 'True' if the current device is an iPhone iOS 7
   *
   */
  public function is_ios8() {
	if ($this->is_iphone() || $this->is_ipad() || $this->is_ipod())
	  return (bool) strpos($this->user_agent,'iphone os 8_');
	else
	  return false;
  }


  /**
   * iPod Detection
   *
   * @return bool : Returns 'True' if the current device is an iPod
   *
   */
  public function is_ipod() {
	return (bool) strpos($this->user_agent,'ipod');
  }


  /**
   * iOS Detection
   *
   * @return bool : Returns 'True' if the current device is an iOS device
   *
   */
  public function is_ios() {
	if ($this->is_iphone() || $this->is_ipad() || $this->is_ipod())
	  return true;
	else
	  return false;
  }


  /**
   * Android Detection
   *
   * @return bool : Returns 'True' if the current device is an Android device
   *
   */
  public function is_android() {
	return (bool) strpos($this->user_agent,'android');
  }


  /**
   * Android Phone Detection
   *
   * @return bool : Returns 'True' if the current device is an Android phone
   *
   */
  public function is_android_mobile() {
	$is_android  = $this->is_android();
	$is_mobile = (bool) strpos($this->user_agent,'mobile');
	if ($is_android && $is_mobile)
	  return true;
	else
	  return false;
  }


  /**
   * Android Tablet Detection
   *
   * @return bool : Returns 'True' if the current device is an Android tablet
   *
   */
  public function is_android_tablet() {
	if ($this->is_android() && !$this->is_android_mobile())
	  return true;
	else
	  return false;
  }


  /**
   * Mobile Device Detection
   *
   * @return bool : Returns 'True' if the current device is an iPhone, Android, or iPod touch
   *
   */
  public function is_mobile_device() {
	if (isset($_GET['triggermobile']) ) return true;
	if ($this->is_android_mobile() || $this->is_iphone() || $this->is_ipod() || $this->is_windows_phone())
	  return true;
	else
	  return false;
  }


  /**
   * Tablet Detection
   *
   * @return bool : Returns 'True' if the current device is a tablet
   *
   */
  public function is_tablet() {
	if (($this->is_android() && !$this->is_android_mobile()) || $this->is_ipad() || $this->is_kindle())
	  return true;
	else
	  return false;
  }


  /**
   * Kindle Detection
   *
   * @return bool : Returns 'True' if the current device is an Amazon Kindle
   *
   */
  public function is_kindle() {
	$is_kindle = (bool) strpos($this->user_agent,'kindle');
	if ($is_kindle)
	  return true;
	else return false;
  }


  /**
   * Android Version Detection
   *
   * @return bool : Returns Android version by name
   *
   */
  public function get_android_version() {
	if ((bool) strpos($this->user_agent,'android 6')){
	  return "marshmallow";
	}
	if ((bool) strpos($this->user_agent,'android 5')){
	  return "lollipop";
	}
	if ((bool) strpos($this->user_agent,'android 4.4')){
	  return "kitkat";
	}
	if ((bool) strpos($this->user_agent,'android 4.0')){
	  return "icecreamsandwich";
	}
	if ((bool) strpos($this->user_agent,'android 4')){
	  return "jellybean";
	}
	if ((bool) strpos($this->user_agent,'android 3')){
	  return "honeycomb";
	}
	if ((bool) strpos($this->user_agent,'android 2.3')){
	  return "gingerbread";
	}
	if ((bool) strpos($this->user_agent,'android 2.2')){
	  return "froyo";
	}
	return NULL;
  }


  /**
   * Windows Detection
   *
   * @return bool : Returns 'True' if the current device is a Windows
   *
   */
  public function is_windows() {
	return stristr( $this->user_agent,"windows");
  }


  /**
   * Mac Detection
   *
   * @return bool : Returns 'True' if the current device is a Windows
   *
   */
  public function is_mac() {
	return stristr( $this->user_agent,"mac");
  }


  /**
   * Linux Detection
   *
   * @return bool : Returns 'True' if the current device is a Windows
   *
   */
  public function is_linux() {
	return stristr( $this->user_agent,"linux");
  }


  /**
   * Internet Explorer Detection
   *
   * @return bool : Returns 'True' if the browser is Internet Explorer
   *
   */
  public function is_ie() {
	return stristr( $this->user_agent,"msie");
  }


  /**
   * Internet Explorer 6 Detection
   *
   * @return bool : Returns 'True' if the browser is Internet Explorer 6
   *
   */
  public function is_ie6() {
	return (preg_match('/\bmsie 6/i', $this->user_agent) && !preg_match('/\bopera/i', $this->user_agent));
  }


  /**
   * Internet Explorer 7 Detection
   *
   * @return bool : Returns 'True' if the browser is Internet Explorer 7
   *
   */
  public function is_ie7() {
	return stristr( $this->user_agent,"msie 7.0");
  }


  /**
   * Internet Explorer 8 Detection
   *
   * @return bool : Returns 'True' if the browser is Internet Explorer 8
   *
   */
  public function is_ie8() {
	return stristr( $this->user_agent,"msie 8.0");
  }


  /**
   * Internet Explorer 9 Detection
   *
   * @return bool : Returns 'True' if the browser is Internet Explorer 9
   *
   */
  public function is_ie9() {
	return stristr( $this->user_agent,"msie 9.0");
  }


  /**
   * Internet Explorer 10 Detection
   *
   * @return bool : Returns 'True' if the browser is Internet Explorer 10
   *
   */
  public function is_ie10() {
	return stristr( $this->user_agent,"msie 10.0");
  }


  /**
   * Internet Explorer 11 Detection
   *
   * @return bool : Returns 'True' if the browser is Internet Explorer 11
   *
   */
  public function is_ie11() {
	return stristr( $this->user_agent,"rv:11.0");
  }


/**
 * Internet Explorer Version Detection
 *
 * @return string : Returns the IE version
 *
 */
public function get_ie_version() {
	if($this->is_ie6()) return "ie6";
	if($this->is_ie7()) return "ie7";
	if($this->is_ie8()) return "ie8";
	if($this->is_ie9()) return "ie9";
	if($this->is_ie10()) return "ie10";
	if($this->is_ie11()) return "ie11";
}


  /**
   * Chrome Detection
   *
   * @return bool : Returns 'True' if the browser is Chrome
   *
   */
  public function is_chrome() {
	return stristr( $this->user_agent,"chrome");
  }


  /**
   * Chrome IOS Detection
   *
   * @return bool : Returns 'True' if the browser is Chrome
   *
   */
  public function is_chrome_ios() {
	return stristr( $this->user_agent,"crios");
  }


  /**
   * Firefox Detection
   *
   * @return bool : Returns 'True' if the browser is Firefox
   *
   */
  public function is_firefox() {
	return stristr( $this->user_agent,"firefox");
  }


  /**
   * Safari Detection
   *
   * @return bool : Returns 'True' if the browser is Safari
   *
   */
  public function is_safari() {

	// If Chrome is detected, then we are not on safari
	if($this->is_chrome())
	  return false;
	return stristr( $this->user_agent,"safari");
  }


  /**
   * Opera Detection
   *
   * @return bool : Returns 'True' if the browser is Opera
   *
   */
  public function is_opera() {
	return stristr( $this->user_agent,"opera");
  }


  /**
   * Add browser-specific classes to BODY tag
   *
   * @param string Returns class names
   *
   */
  public function browser_classes() {
	global $classes;

	// Mobile Device Detection
	if($this->is_mobile_device())
	  $classes[] = 'mobile';

	// Tablet Detection
	if($this->is_tablet())
	  $classes[] = 'tablet';

	// Windows Phone Detection
	if($this->is_windows_phone())
	  $classes[] = 'windows_phone';

	// iOS Detection
	if($this->is_ios()){
	  $classes[] = 'ios';

	  if($this->is_iphone())
		$classes[] = 'iphone';

	  if($this->is_ipod())
		$classes[] = 'ipod';

	  if($this->is_ipad())
		$classes[] = 'ipad';

	  if($this->is_ios7())
		$classes[] = 'ios7';

	  if($this->is_ios8())
		$classes[] = 'ios8';
	}

	// Android Detection
	if($this->is_android()){
	  $classes[] = 'android';

	  if($this->is_android_mobile())
		$classes[] = 'android_mobile';

	  if($this->is_android_tablet())
		$classes[] = 'android_tablet';

	  $android_version = $this->get_android_version();
	  if($android_version != ""){
		$classes[] = $android_version;
	  }

	  if($this->is_android_stock()){
		$classes[] = 'android_stock_browser';
	  }

	}

	// Detect Kindle
	if($this->is_kindle())
	  $classes[] = 'kindle';

	// Detect Windows
	if($this->is_windows())
	  $classes[] = 'windows';

	// Detect OS X
	if($this->is_mac())
	  $classes[] = 'osx';

	// Detect Linux
	if($this->is_linux())
	  $classes[] = 'linux';

	// Detect Chrome
	if($this->is_chrome())
	  $classes[] = 'chrome';

	// Detect Chrome iOS
	if($this->is_chrome_ios())
	  $classes[] = 'chrome_ios';

	// Detect Firefox
	if($this->is_firefox())
	  $classes[] = 'firefox';

	// Detect Safari
	if($this->is_safari())
	  $classes[] = 'safari';

	// Detect Microsoft Edge Browser
	if($this->is_msft_edge())
	  $classes[] = 'edge';

	// Detect Internet Explorer
	if($this->is_ie() || $this->is_ie11()){
	  $classes[] = 'ie';
	  $ie_version = $this->get_ie_version();
	  if($ie_version != ""){
		$classes[] = $ie_version;
	  }
	}

	// Detect Opera
	if($this->is_opera())
	  $classes[] = 'opera';
	if (!empty($classes)) {
	  return implode(' ', $classes);
	}else{
	  return '';
	}
  }
}
