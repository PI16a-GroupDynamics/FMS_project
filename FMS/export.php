<?php
	require_once('/includes/fpdf/tfpdf.php');
	include_once('includes/connect.php');//подключеение к БД
	if ( !isset($_GET['id']) ) {
		echo '<font size="10px">Ошибка при попытке экспортировать даные пользователя</font>';
		exit();
	}

	// Запрос на получение данных о клиенте
	$query = mysqli_query($link,
		"SELECT serial, number, F_name, L_name, patronymic, gender, Date, nationality, adress, date_register, photo, identification.value AS iden, cities.value AS city, countries.value AS country
		FROM citizen, cities, countries, identification
		WHERE citizen.id = " . $_GET['id'] . " and identification.id = citizen.identification_id and citizen.city_id = cities.id and cities.country_id = countries.id");

	$citizen = mysqli_fetch_assoc($query);

	// Начало конфигурации

	$pdf = new tFPDF('P', 'mm', 'A4');
	$pdf->AddPage();
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',14);
	$pdf->SetTextColor(0, 0, 0);

	// Конец конфигурации

	// Начало записи в документ

	$pdf->SetTitle('PDF');
	$pdf->Cell(0, 15, "Информация о физическом лице", 0, 0, 'C');
	$pdf->Write(15, 'Фамилия: ' . $citizen['F_name'] . "\n");
	$pdf->Write(15, 'Имя: ' . $citizen['L_name'] . "\n");
	$pdf->Write(15, 'Отчество: ' . $citizen['patronymic'] . "\n");
	$pdf->Write(15, 'Дата рождения: ' . $citizen['Date'] . "\n");
	$pdf->Write(15, 'Пол: ' . ($citizen['gender'] == 1 ? 'Мужской' : 'Женский') . "\n");
	$pdf->Write(15, 'Гражданство: ' . $citizen['nationality'] . "\n");
	$pdf->Write(15, 'Страна: ' . $citizen['country'] . "\n");
	$pdf->Write(15, 'Город: ' . $citizen['city'] . "\n");
	$pdf->Write(15, 'Адрес проживания: ' . $citizen['adress'] . "\n");
	$pdf->Write(15, 'Удостоверение личности: ' . $citizen['iden'] . "\n");
	$pdf->Write(15, 'Серия: ' . $citizen['serial'] . "\n");
	$pdf->Write(15, 'Номер: ' . $citizen['number'] . "\n");
	$pdf->Write(15, 'Дата регистрации: ' . $citizen['date_register']);
	$pdf->Image($citizen['photo'], 120, 30, 70);	// Изображение физического лица

	$pdf->Output("report.pdf", "I");	// Вывод PDF-документа
?>