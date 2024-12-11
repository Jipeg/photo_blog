<?php

/* 
get this data from form
<input type="text" name="fio" required>

          <label for="tg">TelegramID</label>
          <input type="text" name="tg" required>

          <label for="age">Возраст</label>
          <input type="number" name="age" required>

          <label for="pic">Фото</label>
          <input type="file" name="pic" required>

          <label for="tusa">Выбери тусу</label>
          <select id="tusa" name="tusa">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="opel">Opel</option>
            <option value="audi">Audi</option>
          </select>

*/
$tg = $_POST['tg'];
$fio = $_POST['fio'];
$age = $_POST['age'];
$pic = $_POST['pic'];
$tusa = $_POST['tusa'];

//if pic file is ok than copy it to avas/ folder
if (! isset($_FILES['pic']) || $_FILES['pic']['error'] !== UPLOAD_ERR_OK) {
	echo "Error uploading file";
	die;
}

exec('mkdir avas');
// generate unique name
$name = uniqid();
$pic_type = $_FILES['pic']['type'];
$pic_ext = substr($pic_type, strpos($pic_type, '/') + 1);
$pic_name = $name . $pic_ext;

if (! move_uploaded_file($_FILES['pic']['tmp_name'], 'avas/' . $pic_name)) {
	echo "Error uploading file";
	die;
} 
	
//add sanitaizer
$tg = htmlspecialchars($tg);
$fio = htmlspecialchars($fio);
$age = htmlspecialchars($age);
$tusa = htmlspecialchars($tusa);

//get data from json file
$json = file_get_contents('zayavka.json');
$data = json_decode($json, true);

//add data to json
$data[] = array('tg' => $tg, 'fio' => $fio, 'age' => $age, 'pic' => $name, 'tusa' => $tusa);

// put this data in json file
$json = json_encode($data, JSON_UNESCAPED_UNICODE);
//save to file
file_put_contents('zayavka.json', $json);

echo 'Заявка отправлена';
