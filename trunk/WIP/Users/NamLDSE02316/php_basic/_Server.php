<?php
echo $_SERVER['PHP_SELF'];//returns file name or currently executing script.
echo "<br>";
ECHO $_SERVER['SERVER_NAME'];
ECHO "<BR>";
ECHO $_SERVER['HTTP_HOST'];
ECHO "<BR>";
//ECHO $_SERVER['HTTP_REFERER'];
ECHO "<BR>";
ECHO $_SERVER['HTTP_USER_AGENT'];
ECHO "<BR>";
ECHO $_SERVER['SCRIPT_NAME'];
ECHO "<BR>";
ECHO $_SERVER['GATEWAY_INTERFACE'];//RETURNS version common gateway interface CGI the server is using.
ECHO "<BR>";
ECHO $_SERVER['SERVER_ADDR'];// RETURN THE IP ADDRESS OF THE HOST SERVER
ECHO "<BR>";

ECHO $_SERVER['REQUEST_METHOD'];//RETURN THE REQUEST METHOD USED TO ACCESS THE PAGE
ECHO "<BR>";
ECHO $_SERVER['REQUEST_TIME'];//RETURN THE TIMESTAMP OF THE START OF THE REQUEST 
ECHO "<BR>";
ECHO $_SERVER['QUERY_STRING'];//RETURN query  string if the page is accessed via query string.
ECHO "<BR>";

ECHO $_SERVER['HTTP_ACCEPT'];//return the accept header from the current request.	
ECHO "<BR>";

//ECHO $_SERVER['HTTPS'];//is the script querid through a secure HTTP protocol 
ECHO "<BR>";
ECHO $_SERVER['REMOTE_ADDR'];//return the ip address from where the user  is viewing the current page.
ECHO "<BR>";

echo $_SERVER['REMOTE_PORT'];
echo "<br>";
//echo $_SERVER['REMOTE_HOST'];
echo "<br>";
/*$_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.*/
// $_SERVER is a php super global variable which holds information about headers, paths, and script locations.
?>


