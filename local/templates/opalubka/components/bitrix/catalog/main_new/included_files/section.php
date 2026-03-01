<?
$folderPath = $_SERVER['DOCUMENT_ROOT'] . $templateFolder;
?>

<?
$flag = getcity($arSection['NAME']);


if ($flag == 0) {
	\Bitrix\Iblock\Component\Tools::process404(
		"",
		($arParams["SET_STATUS_404"] === "Y"),
		($arParams["SET_STATUS_404"] === "Y"),
		($arParams["SHOW_404"] === "Y"),
		$arParams["FILE_404"]
	);
}

?>

<? @include_once($folderPath . '/sections_blocks/about_block.php'); //Блок о компании 
?>
<? @include_once($folderPath . '/sections_blocks/why_formwork_block.php'); //Блок Почему наша опалубка 
?>
<? @include_once($folderPath . '/sections_blocks/adv_compare_block1.php'); //Блок Преимущества в сравнении с другими начало 
?>
<? @include_once($folderPath . '/sections_blocks/adv_compare_block.php'); //Блок Преимущества в сравнении с другими 
?>
<? @include_once($folderPath . '/sections_blocks/adv_ico_block.php'); //Блок Преимущества иконками с текстом 
?>
<? @include_once($folderPath . '/sections_blocks/mini_banner_block.php'); //Блок баннер "Совершенно бесплатно"" 
?>
<? @include_once($folderPath . '/sections_blocks/form_service_block.php'); //Блок баннер "Совершенно бесплатно"" 
?>
<? @include_once($folderPath . '/sections_blocks/objects_block.php'); //Блок Объекты 
?>
<? @include_once($folderPath . '/sections_blocks/actions_block.php'); //Блок Наши услуги 
?>
<? @include_once($folderPath . '/sections_blocks/montage_text_block.php'); //Блок Текст про расчет и монтаж 
?>
<? @include_once($folderPath . '/sections_blocks/question_block.php'); //Блок Есть вопрос 
?>
<? // @include_once($folderPath.'/sections_blocks/calculator_block.php'); //Блок калькулятор 
?>

<?
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // без ?params

if ($section['UF_SHOW_CALC']) {
	@include_once($_SERVER['DOCUMENT_ROOT'] . '/include/calc_lesa.php'); // леса
} else {

	// перекрытия
	if (strpos($uri, '/arenda_opalubki/arenda_opalubki_perekrytiy/') === 0) {
		@include_once($_SERVER['DOCUMENT_ROOT'] . '/include/calc_opalubka_ceiling.php');
	} else {
		// стеновая
		@include_once($_SERVER['DOCUMENT_ROOT'] . '/include/calc_opalubka_wall.php');
	}
}
?>

<style>
	.opalubka-calc-scope {
		margin-top: 20px;
	}
</style>


<? @include_once($folderPath . '/sections_blocks/section_link_block.php'); //Блок Перелинковка с тегами */
?>
<? @include_once($folderPath . '/sections_blocks/section_products_block.php'); // Блок с товарами 
?>
<? @include_once($folderPath . '/sections_blocks/prays.php'); //Блок Прайс-лист 
?>
<? @include_once($folderPath . '/sections_blocks/price_button_block.php'); //Блок Кнопка прайс-лист 
?>
<? @include_once($folderPath . '/sections_blocks/stores_map_block.php'); //Блок Адреса складов 
?>
<? @include_once($folderPath . '/sections_blocks/dostavka_block.php'); //Блок доставки 
?>
<? @include_once($folderPath . '/sections_blocks/order_block.php'); //Блок Оформить заказ 
?>
<? @include_once($folderPath . '/sections_blocks/3d_block.php'); //Блок Обзор опалуки 3D 
?>
<? @include_once($folderPath . '/sections_blocks/sale_block.php'); //Блок Выгодные предложения 
?>
<?
global $faqFilter;
$faqFilter['ID'] = $section['UF_FAQ'];
include $_SERVER['DOCUMENT_ROOT'] . '/include/faq_block.php';
?>
<? // @include_once($folderPath.'/sections_blocks/faq_block.php'); //Блок FAQ 
?>
<? @include_once($folderPath . '/sections_blocks/partners_block.php'); //Блок Наши клиенты 
?>
<? @include_once($folderPath . '/sections_blocks/reviews_block.php'); //Блок Отзывы о нас 
?>
<? @include_once($folderPath . '/sections_blocks/comand_block.php'); //Блок Наша команда 
?>
<? @include_once($folderPath . '/sections_blocks/sertify_block.php'); //Блок Сертификаты и паспорта 
?>
<? @include_once($folderPath . '/sections_blocks/articles_block.php'); //Блок Полезные статьи 
?>
<? @include_once($folderPath . '/sections_blocks/section_text_block.php'); //Блок Текст раздела
?>