<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
*/
$config['protocol'] = 'smtp';
$config['smtp_host']='ssl://smtp.gmail.com';
$config['smtp_user']='datptse02336@gmail.com';
$config['smtp_pass']='xiaoxingpham';
$config['smtp_port']='465';
$config['smtp_timeout'] = '7';
$config['charset']    = 'utf-8';
$config['newline']    = "\r\n";
$config['mailtype'] = 'html';
/* End of file config.php */
/* Location: ./application/config/config.php */