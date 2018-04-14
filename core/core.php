<?
require_once ('core/config.php');

require_once ('lib/Twig/Autoloader.php');

/* проверка соединения с БД */
if (mysqli_connect_error()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

/**
* Класс формирования страницы с выбором шаблона в зависимости от url.
*/

function pageBuilder($connect_db) {

	$image = $url[0];

	Twig_Autoloader::register();
	$loader = new Twig_Loader_Filesystem('templates');
	$twig = new Twig_Environment($loader, array(
	    'cache' => 'cache',
	));


	//вывод изображений в массив с учетои популярности
	$sql = "SELECT * FROM images ORDER BY view_count DESC";
	$res = mysqli_query($connect_db,$sql);
	while($data_img[] = mysqli_fetch_assoc($res)){};
	

	$template = $twig->loadTemplate('index.tpl');
	echo $template->render(array(
		'data_img' => $data_img,
	));	

	mysqli_close($connect_db);
}





//счетчик просмотра изображений
function view_count ($fname,$connect_db) {
	mysqli_query($connect_db,"UPDATE images SET view_count = view_count + 1  WHERE url_img = '".$fname."';");

	$sql = "SELECT * FROM `images` WHERE `url_img` = '".$fname."';";
	$res = mysqli_query($connect_db,$sql);
	while($data_img = mysqli_fetch_assoc($res)) {
		echo "Просмотров: ".$data_img['view_count'];
	}
	mysqli_close($connect_db);
}

// функция проверки существования папки и ее создания
function chkdir($folder) {
	if (!file_exists($folder)) {
		mkdir ($folder, 0755);
	}
}

//функция проверки записи в БД о новом загружаемом файле
function check_file_in_db ($file_name,$db_connect) {
	$sql = "SELECT * FROM images WHERE name IN ('".$file_name."')";
	$res = mysqli_query($db_connect,$sql);
	$data = mysqli_fetch_assoc($res);
	if (($data[name]) != $file_name) {
		return true;
	}
	mysqli_close($connect_db);
}


// загрузка изображений с занесением записей в БД
if((isset($_POST['upload'])) && ($_FILES[userfile][name][0]) != "") {
	$dir = galley_dir;
	$dir_tmp = galley_tmp;
	chkdir($dir);
	chkdir($dir_tmp);

	foreach ($_FILES[userfile][name] as $key => $fname) {
		$info = pathinfo($fname)['extension'];

		$tmp_file_name = $_FILES[userfile][tmp_name][$key];
		$file_name = $_FILES[userfile][name][$key];
		$cropped_file_url = $dir_tmp."resize_".$file_name;

		if ((mb_strpos($upload_file_type,$info) > -1) && (filesize($tmp_file_name) <= $max_file_upload)) {
			if (check_file_in_db ($file_name,$connect_db) === true)
			{

				if (copy($tmp_file_name,$dir.$file_name)) {
					exec("convert ".$dir.$file_name." -resize x". $crop_img_width * 2 ." -resize \"". $crop_img_height * 2 . "x<\" -resize 50% -gravity center -crop ".$crop_img_height. "x".$crop_img_height."+0+0 +repage ".$cropped_file_url);
					
					mysqli_query($connect_db,"INSERT INTO `images`(`name`, `url_img`, `url_img_cropped`) VALUES ('".$file_name."','".$dir.$file_name."','".$cropped_file_url."');");
				}

 			}
			else
			{
				echo "Файл уже существует";
			}
		}
	}
}


?>