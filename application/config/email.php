<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| EMAIL CONFINGURAÇÕES
| -------------------------------------------------------------------
| Configuratiçõa de servidor de e-mail.
| */

//--- Configurações Gerais
$config['protocol']=  'mail'; //'smtp';
$config['validate']  = TRUE;
$config['mailtype']  = 'html'; //--- Configurações para conta do proprio servidor "somente este"
$config['charset']   = 'utf-8';
$config['smtp_timeout']=20;
$config['charset']='utf-8';
$config['newline']="\r\n";
$config['crlf'] = "\r\n";

//--- Configurações para conta Outlook
/*
$config['smtp_host']='smtp.live.com'; 
$config['smtp_port'] = 587;
$config['smtp_crypto'] = 'tls';
$config['smtp_user']='fernando.frkl@hotmail.com';
$config['smtp_pass']='';
*/

//--- Configurações para conta Gmail
/*
$config['smtp_host'] = 'ssl://smtp.gmail.com'; //gmail
$config['smtp_port'] = 465;
$config['smtp_user']='novaplanengenharia@gmail.com';
$config['smtp_pass']='Plan1352';
*/

//--- Configurações para conta Terra
$config['smtp_host']='mail.terra.com.br'; 
$config['smtp_port'] = 587;
//$config['smtp_crypto'] = 'ssl';
$config['smtp_user']='novaplan@terra.com.br';
$config['smtp_pass']='Neo135229';