<?php
if (!$blnPreLibCache) {
if ($blnPreLibLoad) {
include_once("{$libpath}/libsphp1.php");
} else {
include_once("{$libpath}/global/libloader.php");
}
}
include_once("{$slibpath}/comp/SphpJsM.php");
/**
* SphpPermission class for manage permissions system
*/
class SphpPermission {
/**
* Set Permissions List as Associate Array
* @param array $arrP <p>
* $arrp = array("perm1" => true,"perm2" => true);
* perm1 can be like index-view or allview or any word you want to use as
* permission identification. This permissions can be manage content in temp file or
* enable disable application features or menus.
* </p>
*/
public function setPermissions($arrP) {}
/**
* Check is permission ID exists
* @param string $permission 
* @return boolean
*/
public function hasPermission($permission) {}
/**
* Check Single or multi permissions
* @param string $permissions <p>
* single or coma separated permissions list as string
* </p>
* @return boolean
*/
public function isPermission($permissions) {}
/**
* Authorise user if permission is available otherwise application will be exit 
* and redirected by according to getWelcome function in comp.php file in project folder 
* @param string $perm <p>
* string or comma separated string list
* </p>
* @return boolean
*/
public function getAuthenticate($perm = "") {}
}
class SphpBase {
/** @static \Sphp\Engine $engine */
private static $engine = null;
/** @static \Sphp\core\Router $sphp_router */
private static $sphp_router = null;
/** @static \Sphp\core\SphpApi $sphp_api */
private static $sphp_api = null;
/** @static \Sphp\core\Request $sphp_request */
private static $sphp_request = null;
/** @static \Sphp\core\Response $sphp_response */
private static $sphp_response = null;
/** @static \Sphp\kit\Session $sphp_session */
private static $sphp_session = null;
/** @static \Sphp\Settings $sphp_settings */
private static $sphp_settings = null;
/** @static \SphpPermission $sphp_permissions */
private static $sphp_permissions = null;
/** @static \Sphp\kit\JSServer $JSServer */
private static $JSServer = null;
/** @static \Sphp\kit\JQuery $JQuery */
private static $JQuery = null;
/** @static \Sphp\kit\Page $page */
private static $page = null;
/** @static \Sphp\core\DebugProfiler $debug */
private static $debug = null;
/** @static \MySQL $dbEngine */
private static $dbEngine = null;
/** @static \SphpJsM $sphpJsM */
private static $sphpJsM = null;
/** @static \Sphp\tools\TempFile $dynData */
public static $dynData = null;
/** @static \stmycache $stmycache */
public static $stmycache = null;
/** @static array $cacheFileList */
public static $cacheFileList = null;
/**
* Get Engine
* @static
* @return \Sphp\Engine
*/
public static function engine() {
return self::$engine;
}
/**
* Get Router
* @static
* @return \Sphp\core\Router
*/
public static function sphp_router() {
return self::$sphp_router;
}
/**
* Get SphpApi
* @static
* @return \Sphp\core\SphpApi
*/
public static function sphp_api() {
return self::$sphp_api;
}
/**
* Get Request
* @static
* @return \Sphp\core\Request
*/
public static function sphp_request() {
return self::$sphp_request;
}
/**
* Get Response
* @static
* @return \Sphp\core\Response
*/
public static function sphp_response() {
return self::$sphp_response;
}
/**
* Get Session
* @static
* @return \Sphp\core\Session
*/
public static function sphp_session() {
return self::$sphp_session;
}
/**
* Get Settings
* @static
* @return \Sphp\core\Settings
*/
public static function sphp_settings() {
return self::$sphp_settings;
}
/**
* Get SphpPermission
* @static
* @return \SphpPermission
*/
public static function sphp_permissions() {
return self::$sphp_permissions;
}
/**
* Get JSServer
* @static
* @return \Sphp\kit\JSServer
*/
public static function JSServer() {
return self::$JSServer;
}
/**
* Get JQuery
* @static
* @return \Sphp\kit\JQuery
*/
public static function JQuery() {
return self::$JQuery;
}
/**
* Get Page Object
* @static
* @return \Sphp\kit\Page
*/
public static function page() {
return self::$page;
}
/**
* Set Page Object
* @static
* @param \Sphp\kit\Page $p
*/
public static function set_page($p) {
self::$page = $p;
}
/**
* Get DebugProfiler
* @static
* @return \Sphp\core\DebugProfiler
*/
public static function debug() {
return self::$debug;
}
/**
* Get DB Engine
* @static
* @return \MySQL
*/
public static function dbEngine() {
return self::$dbEngine;
}
/**
* set DB Engine
* @static
* @param \MySQL $d
*/
public static function set_dbEngine($d) {
self::$dbEngine = $d;
}
/**
* Get JS Manager
* @static
* @return \SphpJsM
*/
public static function sphpJsM() {
return self::$sphpJsM;
}
/**
* Advance Function, No Use
* @static
* @ignore
*/
public static function _startme() {
self::$sphp_settings = new \Sphp\Settings();
}
/**
* Advance Function, No Use
* @static
* @ignore
*/
public static function init() {
global $stmycache, $cacheFileList;
self::$stmycache = $stmycache;
self::$cacheFileList = $cacheFileList;
self::$sphp_request = new \Sphp\core\Request();
}
/**
* Advance Function, No Use
* @static
* @ignore
*/
public static function setReady($engine) {
self::$engine = $engine;
self::$sphp_router = $engine->getRouter();
self::$sphp_api = $engine->getSphpAPI();
self::$sphp_response = $engine->getResponse();
self::$sphp_session = $engine->getSession();
self::$JSServer = $engine->getJSServer();
self::$JQuery = $engine->getJQuery();
self::$debug = $engine->getDebug();
self::$dbEngine = $engine->getDBEngine();
self::$sphp_permissions = new SphpPermission();
self::$sphpJsM = new \SphpJsM();
}
/**
* Advance Function, No Use
* @static
* @ignore
*/
public static function refreshCacheEngine() {
global $ytetimestart1;
$ytetimestart1 = microtime(true);
self::$stmycache = new stmycache();
self::$sphp_response->init();
return self::$stmycache;
}
/**
* Advance Function, No Use
* @static
* @ignore
*/
public static function addNewRequest() {
self::$sphp_api->init();
self::$JSServer->init();
self::$sphpJsM->init();
self::$sphp_request->parseRequest();
self::$sphp_router->route();
self::$page()->init();
self::$engine->engine_start_time = microtime(true);
}
}
if ($debugmode > 0) {
error_reporting(E_ALL);
ini_set("display_errors", 1);
}
SphpBase::_startme();
SphpBase::init();
$jq = new \Sphp\kit\jq();
$engine = new Sphp\Engine();
SphpBase::setReady($engine);
$engine->start();
try {
if (!defined("sphp_mannually_start_engine")) {
$sphp_notglobalapp = $engine->executeinit();
if (!$sphp_notglobalapp[0]) {
include_once($sphp_notglobalapp[1]);
$engine->execute(true);
} else {
$engine->execute();
}
}
} catch (\Throwable $e) {
throw new Exception($e->getMessage() . ' File:- ' . $e->getFile() . ' Line:- ' . $e->getLine());
} catch (\Exception $e) {
throw new Exception($e->getMessage() . ' File:- ' . $e->getFile() . ' Line:- ' . $e->getLine());
}
