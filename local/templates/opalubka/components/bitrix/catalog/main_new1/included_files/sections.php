<?
$folderPath = $_SERVER['DOCUMENT_ROOT'].$templateFolder;

if ($arParams['IBLOCK_ID'] == 21) {
    $section = '/arenda/';
} elseif ($arParams['IBLOCK_ID'] == 36) {
    $section = '/prodazha/';
}
?>
<? @include_once($folderPath.'/sections_blocks/sections.php'); //Блок Разделы ?>
<? @include_once($folderPath.'/sections_blocks/about_block.php'); //Блок о компании ?>
<? @include_once($folderPath.'/sections_blocks/why_formwork_block.php'); //Блок Почему наша опалубка ?>
<? @include_once($folderPath.'/sections_blocks/adv_compare_block1.php'); //Блок Преимущества в сравнении с другими начало ?>
<?$APPLICATION->ShowViewContent('newseo');?>
<? @include_once($folderPath.'/sections_blocks/adv_compare_block.php'); //Блок Преимущества в сравнении с другими ?>
<? @include_once($folderPath.'/sections_blocks/adv_ico_block.php'); //Блок Преимущества иконками с текстом ?>
<? @include_once($folderPath.'/sections_blocks/form_service_block.php'); //Блок баннер "Совершенно бесплатно"" ?>
<? @include_once($folderPath.'/sections_blocks/mini_banner_block.php'); //Блок баннер "Совершенно бесплатно"" ?>
<? @include_once($folderPath.'/sections_blocks/objects_block.php'); //Блок Объекты ?>
<? @include_once($folderPath.'/sections_blocks/actions_block.php'); //Блок Наши услуги ?>
<? @include_once($folderPath.'/sections_blocks/montage_text_block.php'); //Блок Текст про расчет и монтаж ?>
<? @include_once($folderPath.'/sections_blocks/question_block.php'); //Блок Есть вопрос ?>
<? // @include_once($folderPath.'/sections_blocks/calculator_block.php'); //Блок калькулятор ?>
<?
$arUrls = [
    '/arenda_opalubki/lesa/',
    '/arenda_opalubki/lesa/arenda_ramnykh_lesov_lrsp/',
    '/arenda_opalubki/lesa/arenda_khomutovykh_lesov_lspkh/',
    '/prodazha_opalubki/prodazha_stroitelnykh_lesov/',
    '/prodazha_opalubki/prodazha_stroitelnykh_lesov/lesa_khomutovye_lspkh/',
    '/prodazha_opalubki/prodazha_stroitelnykh_lesov/lesa_ramnye_lrsp/',
    '/prodazha_opalubki/prodazha_stroitelnykh_lesov/podvesnye_stroitelnye_lesa/'
];
$curUrl = explode('?', $_SERVER['REQUEST_URI'])[0];
if(in_array($curUrl, $arUrls)) {
    @include_once($_SERVER['DOCUMENT_ROOT'] . '/include/calc_lesa.php'); //Блок калькулятор
}else{
    @include_once($_SERVER['DOCUMENT_ROOT'] . '/include/calculator_new_block.php');
}
?>
<? @include_once($folderPath.'/sections_blocks'.$section.'link_block.php'); //Блок Перелинковка с тегами ?>
<? @include_once($folderPath.'/sections_blocks/products_block.php'); // Блок с товарами ?>
<? @include_once($folderPath.'/sections_blocks/prays.php'); //Блок Прайс-лист ?>
<? @include_once($folderPath.'/sections_blocks/price_button_block.php'); //Блок Кнопка прайс-лист ?>
<? @include_once($folderPath.'/sections_blocks/stores_map_block.php'); //Блок Адреса складов ?>
<? @include_once($folderPath.'/sections_blocks/dostavka_block.php'); //Блок доставки ?>
<? @include_once($folderPath.'/sections_blocks/order_block.php'); //Блок Оформить заказ ?>
<? @include_once($folderPath.'/sections_blocks/3d_block.php'); //Блок Обзор опалуки 3D ?>
<? @include_once($folderPath.'/sections_blocks/sale_block.php'); //Блок Выгодные предложения ?>
<? @include_once($folderPath.'/sections_blocks/faq_block.php'); //Блок FAQ ?>
<? @include_once($folderPath.'/sections_blocks/partners_block.php'); //Блок Наши клиенты ?>
<? @include_once($folderPath.'/sections_blocks/reviews_block.php'); //Блок Отзывы о нас ?>
<? @include_once($folderPath.'/sections_blocks/comand_block.php'); //Блок Наша команда ?>
<? @include_once($folderPath.'/sections_blocks/sertify_block.php'); //Блок Сертификаты и паспорта ?>
<? @include_once($folderPath.'/sections_blocks/articles_block.php'); //Блок Полезные статьи ?> 
<? @include_once($folderPath.'/sections_blocks'.$section.'text_block.php'); //Блок Текст раздела?>

<? @include_once($folderPath.'/sections_blocks/seohidden.php'); //Блок Сео подмена?>