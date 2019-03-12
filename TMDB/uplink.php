<?PHP

//Скрипт генерации временных ссылок, без БД или фременных файлов.
//Зачем использовать таблицы и SQL, если можно генерить ссылки с ключем, зависимым от времени?
//например так:

$timeout = 3600; // Один час
$filesdir = "downloads/"; // Слеш в конце

//
$secret = md5((int)(time() / $timeout)); //Всегда целое число, меняется раз в $timeout секунд;

if( isset($_GET['key']) ) {
	if( ($_GET['key'] == $secret) && //проверка ключа
			strlen($_GET['fn']) && file_exists($filesdir.$_GET['fn']) ) { //проверка файла

		readfile($filesdir.$_GET['fn']);die; //читаем файл
	} else {

		header ( 'HTTP/1.1 404 Not Found' );//Файл не найден
		die;
	}
}
?>

Скачать:<a href="?fn=file.doc&key=<?PHP echo $secret;?>">file.doc</a>