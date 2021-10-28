<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();

$dd = $deviceType;
$ua = htmlentities($_SERVER['HTTP_USER_AGENT']);
echo $dd;
echo $ua;
?>
<hr>
<p><?php echo $deviceType; ?></b>.
<b class="<?php echo $deviceType; ?>"><?php echo htmlentities($_SERVER['HTTP_USER_AGENT']); ?></b></p>

