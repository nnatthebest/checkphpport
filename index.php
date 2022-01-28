<?php
//Проверка на работоспособность функции fsockopen
if(!function_exists('fsockopen'))
		{ echo 'fsockopen не работает!'; return; }
//Используем определённые сервера на которых точно открыты нужные порты
$tests = array(
		25 => 'smtp.sendgrid.com',
		2525 => 'smtp.sendgrid.com',
		587 => 'smtp.sendgrid.com',
		465 => 'ssl://smtp.sendgrid.com');
//По циклу тестируем
foreach($tests as $port => $server){
	//Соединяемся
	$fp = @fsockopen($server,$port,$errno,$errstr,5);
	//Если удачное соединение
	if($fp){ echo 'Порт '.$port.' открыт на вашем сервере!'; fclose($fp); }
//Если неудачное соединение
else{
		echo 'Порт '.$port.' не открыт на вашем сервере!';
		//Вывод номера и причины ошибки
		echo " error num: ".$errno.' : '.$errstr;
}}
