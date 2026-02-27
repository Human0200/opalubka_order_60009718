<?
$this->SetViewTarget("newseo");
$title = $GLOBALS['APPLICATION']->GetTitle(false);
$titlem=mb_strtolower($title);



$ourstroka=CIBlock::GetArrayByID(21, "DESCRIPTION");


if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
{
	function mb_ucfirst($str, $encoding='UTF-8')
	{
		$str = mb_ereg_replace('^[\ ]+', '', $str);
		$str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
			   mb_substr($str, 1, mb_strlen($str), $encoding);
		return $str;
	}
}

/*Тип опалубки*/

if (strpos($titlem, 'стеновой опалубки') !== false) {
	$text_tip_imenitpadej='стеновая опалубка';
	$text_tip_roditpadej='стеновой опалубки';
	$text_tip_datelnyi='стеновой опалубке';
	$text_tip_vinitelnyi='стеновую опалубку';
	$text_tip_tvoriyelnyi='стеновой опалубкой';
	$text_tip_predlojnyi='стеновой опалубке';
}
if (strpos($titlem, 'крупнощитовой стеновой опалубки') !== false) {	$text_tip_imenitpadej='крупнощитовая стеновая опалубка';
			$text_tip_roditpadej='крупнощитовой стеновой опалубки';
			$text_tip_datelnyi='крупнощитовой стеновой опалубке';
			$text_tip_vinitelnyi='крупнощитовую стеновую опалубку';
			$text_tip_tvoriyelnyi='крупнощитовой стеновой опалубкой';
$text_tip_predlojnyi='крупнощитовой стеновой опалубке';}
if (strpos($titlem, 'мелкощитовой стеновой опалубки') !== false) {	$text_tip_imenitpadej='мелкощитовая стеновая опалубка';
			$text_tip_roditpadej='мелкощитовой стеновой опалубки';
			$text_tip_datelnyi='мелкощитовой стеновой опалубке';
			$text_tip_vinitelnyi='мелкощитовую стеновую опалубку';
			$text_tip_tvoriyelnyi='мелкощитовой стеновой опалубкой';
			$text_tip_predlojnyi='мелкощитовой стеновой опалубке';}
if (strpos($titlem, 'опалубки перекрытий') !== false) {	$text_tip_imenitpadej='опалубка перекрытий';
			$text_tip_roditpadej='опалубки перекрытий';
			$text_tip_datelnyi='опалубке перекрытий';
			$text_tip_vinitelnyi='опалубку перекрытий';
			$text_tip_tvoriyelnyi='опалубкой перекрытий';
			$text_tip_predlojnyi='опалубке перекрытий';}
if (strpos($titlem, 'опалубка на объемных стойках') !== false) {	$text_tip_imenitpadej='опалубка на объемных стойках';
			$text_tip_roditpadej='опалубки на объемных стойках';
			$text_tip_datelnyi='опалубке на объемных стойках';
			$text_tip_vinitelnyi='опалубку на объемных стойках';
			$text_tip_tvoriyelnyi='опалубкой на объемных стойках';
			$text_tip_predlojnyi='опалубке на объемных стойках';}
if (strpos($titlem, 'опалубка на телескопических стойках') !== false) {	$text_tip_imenitpadej='опалубка на телескопических стойках';
			$text_tip_roditpadej='опалубки на телескопических стойках';
			$text_tip_datelnyi='опалубке на телескопических стойках';
			$text_tip_vinitelnyi='опалубку на телескопических стойках';
			$text_tip_tvoriyelnyi='опалубкой на телескопических стойках';
			$text_tip_predlojnyi='опалубке на телескопических стойках';}
if (strpos($titlem, 'пространственная опалубка') !== false) {	$text_tip_imenitpadej='пространственная опалубка';
			$text_tip_roditpadej='пространственной опалубки';
			$text_tip_datelnyi='пространственной опалубке';
			$text_tip_vinitelnyi='пространственную опалубку';
			$text_tip_tvoriyelnyi='пространственной опалубкой';
			$text_tip_predlojnyi='пространственной опалубке';}
if (strpos($titlem, 'опалубки для фундамента') !== false) {	$text_tip_imenitpadej='опалубка для фундамента';
			$text_tip_roditpadej='опалубки для фундамента';
			$text_tip_datelnyi='опалубке для фундамента';
			$text_tip_vinitelnyi='опалубку для фундамента';
			$text_tip_tvoriyelnyi='опалубкой для фундамента';
			$text_tip_predlojnyi='опалубке для фундамента';}
if (strpos($titlem, 'крупнощитовая опалубка для фундамента') !== false) {	$text_tip_imenitpadej='крупнощитовая опалубка для фундамента';
			$text_tip_roditpadej='крупнощитовой опалубки для фундамента';
			$text_tip_datelnyi='крупнощитовой опалубке для фундамента';
			$text_tip_vinitelnyi='крупнощитовую опалубку для фундамента';
			$text_tip_tvoriyelnyi='крупнощитовой опалубкой для фундамента';
			$text_tip_predlojnyi='крупнощитовой опалубке для фундамента';}
if (strpos($titlem, 'мелкощитовая опалубка для фундамента') !== false) {	$text_tip_imenitpadej='мелкощитовая опалубка для фундамента';
			$text_tip_roditpadej='мелкощитовой опалубки для фундамента';
			$text_tip_datelnyi='мелкощитовой опалубке для фундамента';
			$text_tip_vinitelnyi='мелкощитовую опалубку для фундамента';
			$text_tip_tvoriyelnyi='мелкощитовой опалубкой для фундамента';
			$text_tip_predlojnyi='мелкощитовой опалубке для фундамента';}
if (strpos($titlem, 'щитовая опалубка для монолитного фундамента') !== false) {	$text_tip_imenitpadej='щитовая опалубка для монолитного фундамента';
			$text_tip_roditpadej='щитовой опалубки для монолитного фундамента';
			$text_tip_datelnyi='щитовой опалубке для монолитного фундамента';
			$text_tip_vinitelnyi='щитовую опалубку для монолитного фундамента';
			$text_tip_tvoriyelnyi='щитовой опалубкой для монолитного фундамента';
			$text_tip_predlojnyi='щитовой опалубке для монолитного фундамента';}
if (strpos($titlem, 'опалубка колонн') !== false) {	$text_tip_imenitpadej='опалубка колонн';
			$text_tip_roditpadej='опалубки колонн';
			$text_tip_datelnyi='опалубке колонн';
			$text_tip_vinitelnyi='опалубку колонн';
			$text_tip_tvoriyelnyi='опалубкой колонн';
			$text_tip_predlojnyi='опалубке колонн';}
if (strpos($titlem, 'крупнощитовая опалубка колонн') !== false) {	$text_tip_imenitpadej='крупнощитовая опалубка колонн';
			$text_tip_roditpadej='крупнощитовой опалубки колонн';
			$text_tip_datelnyi='крупнощитовой опалубке колонн';
			$text_tip_vinitelnyi='крупнощитовую опалубку колонн';
			$text_tip_tvoriyelnyi='крупнощитовой опалубкой колонн';
			$text_tip_predlojnyi='крупнощитовой опалубке колонн';}
if (strpos($titlem, 'мелкощитовая опалубка колонн') !== false) {	$text_tip_imenitpadej='мелкощитовая опалубка колонн';
			$text_tip_roditpadej='мелкощитовой опалубки колонн';
			$text_tip_datelnyi='мелкощитовой опалубке колонн';
			$text_tip_vinitelnyi='мелкощитовую опалубку колонн';
			$text_tip_tvoriyelnyi='мелкощитовой опалубкой колонн';
			$text_tip_predlojnyi='мелкощитовой опалубке колонн';}
if (strpos($titlem, 'опалубка для лифтовых шахт') !== false) {	$text_tip_imenitpadej='опалубка для лифтовых шахт';
			$text_tip_roditpadej='опалубки для лифтовых шахт';
			$text_tip_datelnyi='опалубке для лифтовых шахт';
			$text_tip_vinitelnyi='опалубку для лифтовых шахт';
			$text_tip_tvoriyelnyi='опалубкой для лифтовых шахт';
			$text_tip_predlojnyi='опалубке для лифтовых шахт';}
if (strpos($titlem, 'комплектующие для опалубки') !== false) {	$text_tip_imenitpadej='комплектующие для опалубки';
			$text_tip_roditpadej='комплектующих для опалубки';
			$text_tip_datelnyi='комплектующим для опалубки';
			$text_tip_vinitelnyi='комплектующие для опалубки';
			$text_tip_tvoriyelnyi='комплектующими для опалубки';
			$text_tip_predlojnyi='комплектующих для опалубки';}
if (strpos($titlem, 'телескопические стойки для опалубки') !== false) {	$text_tip_imenitpadej='телескопические стойки для опалубки';
			$text_tip_roditpadej='телескопических стоек для опалубки';
			$text_tip_datelnyi='телескопическим стойкам для опалубки';
			$text_tip_vinitelnyi='телескопические стойки для опалубки';
			$text_tip_tvoriyelnyi='телескопическими стойками для опалубки';
			$text_tip_predlojnyi='телескопических стойках для опалубки';}
if (strpos($titlem, 'комплектующие для стеновой опалубки') !== false) {	$text_tip_imenitpadej='комплектующие для стеновой опалубки';
			$text_tip_roditpadej='комплектующих для стеновой опалубки';
			$text_tip_datelnyi='комплектующим для стеновой опалубки';
			$text_tip_vinitelnyi='комплектующие для стеновой опалубки';
			$text_tip_tvoriyelnyi='комплектующими для стеновой опалубки';
			$text_tip_predlojnyi='комплектующих для стеновой опалубки';}
if (strpos($titlem, 'комплектующие для опалубки перекрытия') !== false) {	$text_tip_imenitpadej='комплектующие для опалубки перекрытия';
			$text_tip_roditpadej='комплектующих для опалубки перекрытия';
			$text_tip_datelnyi='комплектующим для опалубки перекрытия';
			$text_tip_vinitelnyi='комплектующие для опалубки перекрытия';
			$text_tip_tvoriyelnyi='комплектующими для опалубки перекрытия';
			$text_tip_predlojnyi='комплектующих для опалубки перекрытия';}
if (strpos($titlem, 'комплектующие для опалубки для фундамента') !== false) {	$text_tip_imenitpadej='комплектующие для опалубки для фундамента';
			$text_tip_roditpadej='комплектующих для опалубки для фундамента';
			$text_tip_datelnyi='комплектующим для опалубки для фундамента';
			$text_tip_vinitelnyi='комплектующие для опалубки для фундамента';
			$text_tip_tvoriyelnyi='комплектующими для опалубки для фундамента';
			$text_tip_predlojnyi='комплектующих для опалубки для фундамента';}
if (strpos($titlem, 'балки для опалубки') !== false) {	$text_tip_imenitpadej='балки для опалубки';
			$text_tip_roditpadej='балок для опалубки';
			$text_tip_datelnyi='балкам для опалубки';
			$text_tip_vinitelnyi='балки для опалубки';
			$text_tip_tvoriyelnyi='балками для опалубки';
			$text_tip_predlojnyi='балках для опалубки';}
if (strpos($titlem, 'опалубка для забора') !== false) {	$text_tip_imenitpadej='опалубка для забора';
			$text_tip_roditpadej='опалубки для забора';
			$text_tip_datelnyi='опалубке для забора';
			$text_tip_vinitelnyi='опалубку для забора';
			$text_tip_tvoriyelnyi='опалубкой для забора';
			$text_tip_predlojnyi='опалубке для забора';}
if (strpos($titlem, 'строительные леса') !== false) {	$text_tip_imenitpadej='строительные леса';
			$text_tip_roditpadej='строительных лесов';
			$text_tip_datelnyi='строительным лесам';
			$text_tip_vinitelnyi='строительные леса';
			$text_tip_tvoriyelnyi='строительными лесами';
			$text_tip_predlojnyi='строительных лесах';}
if (strpos($titlem, 'инвентарная опалубка') !== false) {	$text_tip_imenitpadej='инвентарная опалубка';
			$text_tip_roditpadej='инвентарной опалубки';
			$text_tip_datelnyi='инвентарной опалубке';
			$text_tip_vinitelnyi='инвентарную опалубку';
			$text_tip_tvoriyelnyi='инвентарной опалубкой';
			$text_tip_predlojnyi='инвентарной опалубке';}
if (strpos($titlem, 'инвентарная опалубка для фундамента') !== false) {	$text_tip_imenitpadej='инвентарная опалубка для фундамента';
			$text_tip_roditpadej='инвентарной опалубки для фундамента';
			$text_tip_datelnyi='инвентарной опалубке для фундамента';
			$text_tip_vinitelnyi='инвентарную опалубку для фундамента';
			$text_tip_tvoriyelnyi='инвентарной опалубкой для фундамента';
			$text_tip_predlojnyi='инвентарной опалубке для фундамента';}
if (strpos($titlem, 'инвентарная опалубка колонн') !== false) {	$text_tip_imenitpadej='инвентарная опалубка колонн';
			$text_tip_roditpadej='инвентарной опалубки колонн';
			$text_tip_datelnyi='инвентарной опалубке колонн';
			$text_tip_vinitelnyi='инвентарную опалубку колонн';
			$text_tip_tvoriyelnyi='инвентарной опалубкой колонн';
			$text_tip_predlojnyi='инвентарной опалубке колонн';}
if (strpos($titlem, 'инвентарная опалубка перекрытий') !== false) {	$text_tip_imenitpadej='инвентарная опалубка перекрытий';
			$text_tip_roditpadej='инвентарной опалубки перекрытий';
			$text_tip_datelnyi='инвентарной опалубке перекрытий';
			$text_tip_vinitelnyi='инвентарную опалубку перекрытий';
			$text_tip_tvoriyelnyi='инвентарной опалубкой перекрытий';
			$text_tip_predlojnyi='инвентарной опалубке перекрытий';}
if (strpos($titlem, 'щитовая опалубка') !== false) {	$text_tip_imenitpadej='щитовая опалубка';
			$text_tip_roditpadej='щитовой опалубки';
			$text_tip_datelnyi='щитовой опалубке';
			$text_tip_vinitelnyi='щитовую опалубку';
			$text_tip_tvoriyelnyi='щитовой опалубкой';
			$text_tip_predlojnyi='щитовой опалубке';}
if (strpos($titlem, 'крупнощитовая опалубка') !== false) {	$text_tip_imenitpadej='крупнощитовая опалубка';
			$text_tip_roditpadej='крупнощитовой опалубки';
			$text_tip_datelnyi='крупнощитовой опалубке';
			$text_tip_vinitelnyi='крупнощитовую опалубку';
			$text_tip_tvoriyelnyi='крупнощитовой опалубкой';
			$text_tip_predlojnyi='крупнощитовой опалубке';}
if (strpos($titlem, 'мелкощитовая опалубка') !== false) {	$text_tip_imenitpadej='мелкощитовая опалубка';
			$text_tip_roditpadej='мелкощитовой опалубки';
			$text_tip_datelnyi='мелкощитовой опалубке';
			$text_tip_vinitelnyi='мелкощитовую опалубку';
			$text_tip_tvoriyelnyi='мелкощитовой опалубкой';
			$text_tip_predlojnyi='мелкощитовой опалубке';}
if (strpos($titlem, 'щитовая опалубка для фундамента') !== false) {	$text_tip_imenitpadej='щитовая опалубка для фундамента';
			$text_tip_roditpadej='щитовой опалубки для фундамента';
			$text_tip_datelnyi='щитовой опалубке для фундамента';
			$text_tip_vinitelnyi='щитовую опалубку для фундамента';
			$text_tip_tvoriyelnyi='щитовой опалубкой для фундамента';
			$text_tip_predlojnyi='щитовой опалубке для фундамента';}
if (strpos($titlem, 'щитовая опалубка колонн') !== false) {	$text_tip_imenitpadej='щитовая опалубка колонн';
			$text_tip_roditpadej='щитовой опалубки колонн';
			$text_tip_datelnyi='щитовой опалубке колонн';
			$text_tip_vinitelnyi='щитовую опалубку колонн';
			$text_tip_tvoriyelnyi='щитовой опалубкой колонн';
			$text_tip_predlojnyi='щитовой опалубке колонн';}
if (strpos($titlem, 'щитовая опалубка стен') !== false) {	$text_tip_imenitpadej='щитовая опалубка стен';
			$text_tip_roditpadej='щитовой опалубки стен';
			$text_tip_datelnyi='щитовой опалубке стен';
			$text_tip_vinitelnyi='щитовую опалубку стен';
			$text_tip_tvoriyelnyi='щитовой опалубкой стен';
			$text_tip_predlojnyi='щитовой опалубке стен';}
if (strpos($titlem, 'щитовая опалубка б/у') !== false) {	$text_tip_imenitpadej='щитовая опалубка б/у';
			$text_tip_roditpadej='щитовой опалубки б/у';
			$text_tip_datelnyi='щитовой опалубке б/у';
			$text_tip_vinitelnyi='щитовую опалубку б/у';
			$text_tip_tvoriyelnyi='щитовой опалубкой б/у';
			$text_tip_predlojnyi='щитовой опалубке б/у';}
if (strpos($titlem, 'легкая опалубка') !== false) {	$text_tip_imenitpadej='легкая опалубка';
			$text_tip_roditpadej='легкой опалубки';
			$text_tip_datelnyi='легкой опалубке';
			$text_tip_vinitelnyi='легкую опалубку';
			$text_tip_tvoriyelnyi='легкой опалубкой';
			$text_tip_predlojnyi='легкой опалубке';}
if (strpos($titlem, 'монолитная опалубка') !== false) {	$text_tip_imenitpadej='монолитная опалубка';
			$text_tip_roditpadej='монолитной опалубки';
			$text_tip_datelnyi='монолитной опалубке';
			$text_tip_vinitelnyi='монолитную опалубку';
			$text_tip_tvoriyelnyi='монолитной опалубкой';
			$text_tip_predlojnyi='монолитной опалубке';}
if (strpos($titlem, 'мостовая опалубка') !== false) {	$text_tip_imenitpadej='мостовая опалубка';
			$text_tip_roditpadej='мостовой опалубки';
			$text_tip_datelnyi='мостовой опалубке';
			$text_tip_vinitelnyi='мостовую опалубку';
			$text_tip_tvoriyelnyi='мостовой опалубкой';
			$text_tip_predlojnyi='мостовой опалубке';}
if (strpos($titlem, 'объемная опалубка') !== false) {	$text_tip_imenitpadej='объемная опалубка';
			$text_tip_roditpadej='объемной опалубки';
			$text_tip_datelnyi='объемной опалубке';
			$text_tip_vinitelnyi='объемную опалубку';
			$text_tip_tvoriyelnyi='объемной опалубкой';
			$text_tip_predlojnyi='объемной опалубке';}
if (strpos($titlem, 'объемная опалубка перекрытий') !== false) {	$text_tip_imenitpadej='объемная опалубка перекрытий';
			$text_tip_roditpadej='объемной опалубки перекрытий';
			$text_tip_datelnyi='объемной опалубке перекрытий ';
			$text_tip_vinitelnyi='объемную опалубку перекрытий';
			$text_tip_tvoriyelnyi='объемной опалубкой перекрытий';
			$text_tip_predlojnyi='объемной опалубке перекрытий ';}
if (strpos($titlem, 'опалубка для ленточного фундамента') !== false) {	$text_tip_imenitpadej='опалубка для ленточного фундамента';
			$text_tip_roditpadej='опалубки для ленточного фундамента';
			$text_tip_datelnyi='опалубке для ленточного фундамента';
			$text_tip_vinitelnyi='опалубку для ленточного фундамента';
			$text_tip_tvoriyelnyi='опалубкой для ленточного фундамента';
			$text_tip_predlojnyi='опалубке для ленточного фундамента';}
if (strpos($titlem, 'разборно-переставная опалубка') !== false) {	$text_tip_imenitpadej='разборно-переставная опалубка';
			$text_tip_roditpadej='разборно-переставной опалубки';
			$text_tip_datelnyi='разборно-переставной опалубке';
			$text_tip_vinitelnyi='разборно-переставную опалубку';
			$text_tip_tvoriyelnyi='разборно-переставной опалубкой';
			$text_tip_predlojnyi='разборно-переставной опалубке';}
if (strpos($titlem, 'разборная опалубка') !== false) {	$text_tip_imenitpadej='разборная опалубка';
			$text_tip_roditpadej='разборной опалубки';
			$text_tip_datelnyi='разборной опалубке';
			$text_tip_vinitelnyi='разборную опалубку';
			$text_tip_tvoriyelnyi='разборной опалубкой';
			$text_tip_predlojnyi='разборной опалубке';}
if (strpos($titlem, 'стальная опалубка') !== false) {	$text_tip_imenitpadej='стальная опалубка';
			$text_tip_roditpadej='стальной опалубки';
			$text_tip_datelnyi='стальной опалубке';
			$text_tip_vinitelnyi='стальную опалубку';
			$text_tip_tvoriyelnyi='стальной опалубкой';
			$text_tip_predlojnyi='стальной опалубке';}
if (strpos($titlem, 'стеновая инвентарная опалубка') !== false) {	$text_tip_imenitpadej='стеновая инвентарная опалубка';
			$text_tip_roditpadej='стеновой инвентарной опалубки';
			$text_tip_datelnyi='стеновой инвентарной опалубке';
			$text_tip_vinitelnyi='стеновую инвентарную опалубку';
			$text_tip_tvoriyelnyi='стеновой инвентарной опалубкой';
			$text_tip_predlojnyi='стеновой инвентарной опалубке';}
if (strpos($titlem, 'съемная опалубка') !== false) {	$text_tip_imenitpadej='стеновая инвентарная опалубка';
			$text_tip_roditpadej='стеновой инвентарной опалубки';
			$text_tip_datelnyi='стеновой инвентарной опалубке';
			$text_tip_vinitelnyi='стеновую инвентарную опалубку';
			$text_tip_tvoriyelnyi='стеновой инвентарной опалубкой';
			$text_tip_predlojnyi='стеновой инвентарной опалубке';}
if (strpos($titlem, 'телескопическая опалубка') !== false) {	$text_tip_imenitpadej='телескопическая опалубка';
			$text_tip_roditpadej='телескопической опалубки';
			$text_tip_datelnyi='телескопической опалубке';
			$text_tip_vinitelnyi='телескопическую опалубку';
			$text_tip_tvoriyelnyi='телескопической опалубкой';
			$text_tip_predlojnyi='телескопической опалубке';}
if (strpos($titlem, 'универсальная опалубка') !== false) {	$text_tip_imenitpadej='универсальная опалубка';
			$text_tip_roditpadej='универсальной опалубки';
			$text_tip_datelnyi='универсальной опалубке';
			$text_tip_vinitelnyi='универсальную опалубку';
			$text_tip_tvoriyelnyi='универсальной опалубкой';
			$text_tip_predlojnyi='универсальной опалубке';}
if (strpos($titlem, 'опалубка б/у') !== false) {	$text_tip_imenitpadej='опалубка б/у';
			$text_tip_roditpadej='опалубки б/у';
			$text_tip_datelnyi='опалубке б/у';
			$text_tip_vinitelnyi='опалубку б/у';
			$text_tip_tvoriyelnyi='опалубкой б/у';
			$text_tip_predlojnyi='опалубке б/у';}
if (strpos($titlem, 'опалубка для фундамента б/у') !== false) {	$text_tip_imenitpadej='опалубка для фундамента б/у';
			$text_tip_roditpadej='опалубки для фундамента б/у';
			$text_tip_datelnyi='опалубке для фундамента б/у';
			$text_tip_vinitelnyi='опалубку для фундамента б/у';
			$text_tip_tvoriyelnyi='опалубкой для фундамента б/у';
			$text_tip_predlojnyi='об опалубке для фундамента б/у';}
if (strpos($titlem, 'опалубка колонн б/у') !== false) {	$text_tip_imenitpadej='опалубка колонн б/у';
			$text_tip_roditpadej='опалубки колонн б/у';
			$text_tip_datelnyi='опалубке колонн б/у';
			$text_tip_vinitelnyi='опалубку колонн б/у';
			$text_tip_tvoriyelnyi='опалубкой колонн б/у';
			$text_tip_predlojnyi='опалубке колонн б/у';}
if (strpos($titlem, 'стеновая опалубка б/у') !== false) {	$text_tip_imenitpadej='стеновая опалубка б/у';
			$text_tip_roditpadej='стеновой опалубки б/у';
			$text_tip_datelnyi='стеновой опалубке б/у';
			$text_tip_vinitelnyi='стеновую опалубку б/у';
			$text_tip_tvoriyelnyi='стеновой опалубкой б/у';
			$text_tip_predlojnyi='стеновой опалубке б/у';}
if (strpos($titlem, 'съемная опалубка б/у') !== false) {	$text_tip_imenitpadej='съемная опалубка б/у';
			$text_tip_roditpadej='съемной опалубки б/у';
			$text_tip_datelnyi='съемной опалубке б/у';
			$text_tip_vinitelnyi='съемную опалубку б/у';
			$text_tip_tvoriyelnyi='съемной опалубкой б/у';
			$text_tip_predlojnyi='съемной опалубке б/у';}
if (strpos($titlem, 'щитовая опалубка б/у') !== false) {	$text_tip_imenitpadej='щитовая опалубка б/у';
			$text_tip_roditpadej='щитовой опалубки б/у';
			$text_tip_datelnyi='щитовой опалубке б/у';
			$text_tip_vinitelnyi='щитовую опалубку б/у';
			$text_tip_tvoriyelnyi='щитовой опалубкой б/у';
			$text_tip_predlojnyi='щитовой опалубке б/у';}


/*-------------*/




if (strpos($titlem, 'аренда опалубки') !== false) {
	$text_arenda_tipopalubki='опалубки';
	$text_arenda_imenitpadej='аренда опалубки';
	$text_arenda_roditpadej='аренды опалубки';
	$text_arenda_datelnyi='аренде опалубки';
	$text_arenda_vinitelnyi='аренду опалубку';
	$text_arenda_tvoriyelnyi='арендой опалубки';
	$text_arenda_predlojnyi='аренде опалубки';
}	

if (strpos($titlem, 'аренда стеновой опалубки') !== false) {
	$text_arenda_tipopalubki='стеновой опалубки';
	$text_arenda_imenitpadej='аренда стеновой опалубки';
	$text_arenda_roditpadej='аренды стеновой опалубки';
	$text_arenda_datelnyi='аренде стеновой опалубки';
	$text_arenda_vinitelnyi='аренду стеновую опалубку';
	$text_arenda_tvoriyelnyi='арендой стеновой опалубки';
	$text_arenda_predlojnyi='аренде стеновой опалубки';
}	

if (strpos($titlem, 'аренда крупнощитовой стеновой опалубки') !== false) { $text_arenda_tipopalubki='крупнощитовой стеновой опалубки';	$text_arenda_imenitpadej='аренда крупнощитовой стеновой опалубки';
			$text_arenda_roditpadej='аренды крупнощитовой стеновой опалубки';
			$text_arenda_datelnyi='аренде крупнощитовой стеновой опалубки';
			$text_arenda_vinitelnyi='аренду крупнощитовую стеновую опалубку';
			$text_arenda_tvoriyelnyi='арендой крупнощитовой стеновой опалубки';
			$text_arenda_predlojnyi='аренде крупнощитовой стеновой опалубки';
}
if (strpos($titlem, 'аренда мелкощитовой стеновой опалубки') !== false) { $text_arenda_tipopalubki='мелкощитовой стеновой опалубки';	$text_arenda_imenitpadej='аренда мелкощитовой стеновой опалубки';
			$text_arenda_roditpadej='аренды мелкощитовой стеновой опалубки';
			$text_arenda_datelnyi='аренде мелкощитовой стеновой опалубки';
			$text_arenda_vinitelnyi='аренду мелкощитовую стеновую опалубку';
			$text_arenda_tvoriyelnyi='арендой мелкощитовой стеновой опалубки';
			$text_arenda_predlojnyi='аренде мелкощитовой стеновой опалубки';
			}
if (strpos($titlem, 'аренда опалубки перекрытий') !== false) { $text_arenda_tipopalubki='опалубки перекрытий';	$text_arenda_imenitpadej='аренда опалубки перекрытий';
			$text_arenda_roditpadej='аренды опалубки перекрытий';
			$text_arenda_datelnyi='аренде опалубки перекрытий';
			$text_arenda_vinitelnyi='аренду опалубку перекрытий';
			$text_arenda_tvoriyelnyi='арендой опалубки перекрытий';
			$text_arenda_predlojnyi='аренде опалубки перекрытий';
			}
if (strpos($titlem, 'аренда опалубки на телескопических стойках') !== false) { $text_arenda_tipopalubki='опалубки  на телескопических стойках';	$text_arenda_imenitpadej='аренда опалубки на телескопических стойках';
			$text_arenda_roditpadej='аренды опалубки на телескопических стойках';
			$text_arenda_datelnyi='аренде опалубки на телескопических стойках';
			$text_arenda_vinitelnyi='аренду опалубку на телескопических стойках';
			$text_arenda_tvoriyelnyi='арендой опалубки на телескопических стойках';
			$text_arenda_predlojnyi='аренде опалубки на телескопических стойках';
			}
if (strpos($titlem, 'аренда опалубки на объемных стойках') !== false) { $text_arenda_tipopalubki='опалубки на объемных стойках';	$text_arenda_imenitpadej='аренда опалубки на объемных стойках';
			$text_arenda_roditpadej='аренды опалубки на объемных стойках';
			$text_arenda_datelnyi='аренде опалубки на объемных стойках';
			$text_arenda_vinitelnyi='аренду опалубку на объемных стойках';
			$text_arenda_tvoriyelnyi='арендой опалубки на объемных стойках';
			$text_arenda_predlojnyi='аренде опалубки на объемных стойках';
			}
if (strpos($titlem, 'аренда пространственной опалубки') !== false) { $text_arenda_tipopalubki='пространственной опалубки';	$text_arenda_imenitpadej='аренда пространственной опалубки';
			$text_arenda_roditpadej='аренды пространственной опалубки';
			$text_arenda_datelnyi='аренде пространственной опалубки';
			$text_arenda_vinitelnyi='аренду пространственную опалубку';
			$text_arenda_tvoriyelnyi='арендой пространственной опалубки';
			$text_arenda_predlojnyi='аренде пространственной опалубки';
			}
if (strpos($titlem, 'аренда опалубки для фундамента') !== false) { $text_arenda_tipopalubki='опалубки для фундамента';	$text_arenda_imenitpadej='аренда опалубки для фундамента';
			$text_arenda_roditpadej='аренды опалубки для фундамента';
			$text_arenda_datelnyi='аренде опалубки для фундамента';
			$text_arenda_vinitelnyi='аренду опалубку для фундамента';
			$text_arenda_tvoriyelnyi='арендой опалубки для фундамента';
			$text_arenda_predlojnyi='аренде опалубки для фундамента';
			}
if (strpos($titlem, 'аренда крупнощитовой опалубки для фундамента') !== false) { $text_arenda_tipopalubki='крупнощитовой опалубки для фундамента';	$text_arenda_imenitpadej='аренда крупнощитовой опалубки для фундамента';
			$text_arenda_roditpadej='аренды крупнощитовой опалубки для фундамента';
			$text_arenda_datelnyi='аренде крупнощитовой опалубки для фундамента';
			$text_arenda_vinitelnyi='аренду крупнощитовую опалубку для фундамента';
			$text_arenda_tvoriyelnyi='арендой крупнощитовой опалубки для фундамента';
			$text_arenda_predlojnyi='аренде крупнощитовой опалубки для фундамента';
			}
if (strpos($titlem, 'аренда мелкощитовой опалубки для фундамента') !== false) { $text_arenda_tipopalubki='мелкощитовой опалубки для фундамента';	$text_arenda_imenitpadej='аренда мелкощитовой опалубки для фундамента';
			$text_arenda_roditpadej='аренды мелкощитовой опалубки для фундамента';
			$text_arenda_datelnyi='аренде мелкощитовой опалубки для фундамента';
			$text_arenda_vinitelnyi='аренду мелкощитовую опалубку для фундамента';
			$text_arenda_tvoriyelnyi='арендой мелкощитовой опалубки для фундамента';
			$text_arenda_predlojnyi='аренде мелкощитовой опалубки для фундамента';
			}
if (strpos($titlem, 'аренда опалубки колонн') !== false) { $text_arenda_tipopalubki='опалубки колонн';	$text_arenda_imenitpadej='аренда опалубки колонн';
			$text_arenda_roditpadej='аренды опалубки колонн';
			$text_arenda_datelnyi='аренде опалубки колонн';
			$text_arenda_vinitelnyi='аренду опалубку колонн';
			$text_arenda_tvoriyelnyi='арендой опалубки колонн';
			$text_arenda_predlojnyi='аренде опалубки колонн';
			}
if (strpos($titlem, 'аренда крупнощитовой опалубки колонн') !== false) { $text_arenda_tipopalubki='крупнощитовой опалубки колонн';	$text_arenda_imenitpadej='аренда крупнощитовой опалубки колонн';
			$text_arenda_roditpadej='аренды крупнощитовой опалубки колонн';
			$text_arenda_datelnyi='аренде крупнощитовой опалубки колонн';
			$text_arenda_vinitelnyi='аренду крупнощитовую опалубку колонн';
			$text_arenda_tvoriyelnyi='арендой крупнощитовой опалубки колонн';
			$text_arenda_predlojnyi='аренде крупнощитовой опалубки колонн';
			}
if (strpos($titlem, 'аренда мелкощитовой опалубки колонн') !== false) { $text_arenda_tipopalubki='мелкощитовой опалубки колонн';	$text_arenda_imenitpadej='аренда мелкощитовой опалубки колонн';
			$text_arenda_roditpadej='аренды мелкощитовой опалубки колонн';
			$text_arenda_datelnyi='аренде мелкощитовой опалубки колонн';
			$text_arenda_vinitelnyi='аренду мелкощитовую опалубку колонн';
			$text_arenda_tvoriyelnyi='арендой мелкощитовой опалубки колонн';
			$text_arenda_predlojnyi='аренде мелкощитовой опалубки колонн';
			}
if (strpos($titlem, 'аренда опалубки для лифтовых шахт') !== false) { $text_arenda_tipopalubki='опалубки для лифтовых шахт';	$text_arenda_imenitpadej='аренда опалубки для лифтовых шахт';
			$text_arenda_roditpadej='аренды опалубки для лифтовых шахт';
			$text_arenda_datelnyi='аренде опалубки для лифтовых шахт';
			$text_arenda_vinitelnyi='аренду опалубку для лифтовых шахт';
			$text_arenda_tvoriyelnyi='арендой опалубки для лифтовых шахт';
			$text_arenda_predlojnyi='аренде опалубки для лифтовых шахт';
			}
if (strpos($titlem, 'аренда опалубки для забора') !== false) { $text_arenda_tipopalubki='опалубки для забора';	$text_arenda_imenitpadej='аренда опалубки для забора';
			$text_arenda_roditpadej='аренды опалубки для забора';
			$text_arenda_datelnyi='аренде опалубки для забора';
			$text_arenda_vinitelnyi='аренду опалубку для забора';
			$text_arenda_tvoriyelnyi='арендой опалубки для забора';
			$text_arenda_predlojnyi='аренде опалубки для забора';
			}
if (strpos($titlem, 'аренда строительных лесов') !== false) { $text_arenda_tipopalubki='опалубки';	$text_arenda_imenitpadej='аренда строительных лесов';
			$text_arenda_roditpadej='аренды строительных лесов';
			$text_arenda_datelnyi='аренде строительных лесов';
			$text_arenda_vinitelnyi='аренду строительные леса';
			$text_arenda_tvoriyelnyi='арендой строительных лесов';
			$text_arenda_predlojnyi='аренде строительных лесов';
			}
if (strpos($titlem, 'комплектующие для опалубки') !== false) { $text_arenda_tipopalubki='комплектующих для опалубки';	$text_arenda_imenitpadej='комплектующие для опалубки';
			$text_arenda_roditpadej='комплектующих для опалубки';
			$text_arenda_datelnyi='комплектующим для опалубки';
			$text_arenda_vinitelnyi='комплектующие для опалубки';
			$text_arenda_tvoriyelnyi='комплектующими для опалубки';
			$text_arenda_predlojnyi='комплектующих для опалубки';
			}
if (strpos($titlem, 'аренда балок для опалубки') !== false) { $text_arenda_tipopalubki='балок для опалубки';	$text_arenda_imenitpadej='аренда балок для опалубки';
			$text_arenda_roditpadej='аренды балок для опалубки';
			$text_arenda_datelnyi='аренде балок для опалубки';
			$text_arenda_vinitelnyi='аренду балки для опалубки';
			$text_arenda_tvoriyelnyi='арендой балок для опалубки';
			$text_arenda_predlojnyi='аренде балок для опалубки';
			}
if (strpos($titlem, 'аренда телескопических стоек') !== false) { $text_arenda_tipopalubki='телескопических стоек опалубки';	$text_arenda_imenitpadej='аренда телескопических стоек';
			$text_arenda_roditpadej='аренды телескопических стоек';
			$text_arenda_datelnyi='аренде телескопических стоек';
			$text_arenda_vinitelnyi='аренду телескопические стойки';
			$text_arenda_tvoriyelnyi='арендой телескопических стоек';
			$text_arenda_predlojnyi='аренде телескопических стоек';
			}
if (strpos($titlem, 'аренда инвентарной опалубки') !== false) { $text_arenda_tipopalubki='инвентарной опалубки';	$text_arenda_imenitpadej='аренда инвентарной опалубки';
			$text_arenda_roditpadej='аренды инвентарной опалубки';
			$text_arenda_datelnyi='аренде инвентарной опалубки';
			$text_arenda_vinitelnyi='аренду инвентарную опалубку';
			$text_arenda_tvoriyelnyi='арендой инвентарной опалубки';
			$text_arenda_predlojnyi='аренде инвентарной опалубки';
			}
if (strpos($titlem, 'аренда инвентарной опалубки колонн') !== false) { $text_arenda_tipopalubki='инвентарной опалубки колонн';	$text_arenda_imenitpadej='аренда инвентарной опалубки колонн';
			$text_arenda_roditpadej='аренды инвентарной опалубки колонн';
			$text_arenda_datelnyi='аренде инвентарной опалубки колонн';
			$text_arenda_vinitelnyi='аренду инвентарноую опалубку колонн';
			$text_arenda_tvoriyelnyi='арендой инвентарной опалубки колонн';
			$text_arenda_predlojnyi='аренде инвентарной опалубки колонн';
			}
if (strpos($titlem, 'аренда инвентарной опалубки перекрытий') !== false) { $text_arenda_tipopalubki='инвентарной опалубки перекрытий';	$text_arenda_imenitpadej='аренда инвентарной опалубки перекрытий';
			$text_arenda_roditpadej='аренды инвентарной опалубки перекрытий';
			$text_arenda_datelnyi='аренде инвентарной опалубки перекрытий';
			$text_arenda_vinitelnyi='аренду инвентарную опалубку перекрытий';
			$text_arenda_tvoriyelnyi='арендой инвентарной опалубки перекрытий';
			$text_arenda_predlojnyi='аренде инвентарной опалубки перекрытий';
			}
if (strpos($titlem, 'аренда щитовой опалубки') !== false) { $text_arenda_tipopalubki='щитовой опалубки';	$text_arenda_imenitpadej='аренда щитовой опалубки';
			$text_arenda_roditpadej='аренды щитовой опалубки';
			$text_arenda_datelnyi='аренде щитовой опалубки';
			$text_arenda_vinitelnyi='аренду щитовую опалубку';
			$text_arenda_tvoriyelnyi='арендой щитовой опалубки';
			$text_arenda_predlojnyi='аренде щитовой опалубки';
			}
if (strpos($titlem, 'аренда крупнощитовой опалубки') !== false) { $text_arenda_tipopalubki='крупнощитовой опалубки';	$text_arenda_imenitpadej='аренда крупнощитовой опалубки';
			$text_arenda_roditpadej='аренды крупнощитовой опалубки';
			$text_arenda_datelnyi='аренде крупнощитовой опалубки';
			$text_arenda_vinitelnyi='аренду крупнощитовую опалубку';
			$text_arenda_tvoriyelnyi='арендой крупнощитовой опалубки';
			$text_arenda_predlojnyi='аренде крупнощитовой опалубки';
			}
if (strpos($titlem, 'аренда мелкощитовой опалубки') !== false) { $text_arenda_tipopalubki='мелкощитовой опалубки';	$text_arenda_imenitpadej='аренда мелкощитовой опалубки';
			$text_arenda_roditpadej='аренды мелкощитовой опалубки';
			$text_arenda_datelnyi='аренде мелкощитовой опалубки';
			$text_arenda_vinitelnyi='аренду мелкощитовую опалубку';
			$text_arenda_tvoriyelnyi='арендой мелкощитовой опалубки';
			$text_arenda_predlojnyi='аренде мелкощитовой опалубки';
			}
if (strpos($titlem, 'аренда щитовой опалубки для фундамента') !== false) { $text_arenda_tipopalubki='щитовой опалубки для фундамента';	$text_arenda_imenitpadej='аренда щитовой опалубки для фундамента';
			$text_arenda_roditpadej='аренды щитовой опалубки для фундамента';
			$text_arenda_datelnyi='аренде щитовой опалубки для фундамента';
			$text_arenda_vinitelnyi='аренду щитовую опалубку для фундамента';
			$text_arenda_tvoriyelnyi='арендой щитовой опалубки для фундамента';
			$text_arenda_predlojnyi='аренде щитовой опалубки для фундамента';
			}
if (strpos($titlem, 'аренда щитовой опалубки колонн') !== false) { $text_arenda_tipopalubki='щитовой опалубки колонн';	$text_arenda_imenitpadej='аренда щитовой опалубки колонн';
			$text_arenda_roditpadej='аренды щитовой опалубки колонн';
			$text_arenda_datelnyi='аренде щитовой опалубки колонн';
			$text_arenda_vinitelnyi='аренду щитовую опалубку колонн';
			$text_arenda_tvoriyelnyi='арендой щитовой опалубки колонн';
			$text_arenda_predlojnyi='аренде щитовой опалубки колонн';
			}
if (strpos($titlem, 'аренда щитовой опалубки стен') !== false) { $text_arenda_tipopalubki='щитовой опалубки стен';	$text_arenda_imenitpadej='аренда щитовой опалубки стен';
			$text_arenda_roditpadej='аренды щитовой опалубки стен';
			$text_arenda_datelnyi='аренде щитовой опалубки стен';
			$text_arenda_vinitelnyi='аренду щитовую опалубку стен';
			$text_arenda_tvoriyelnyi='арендой щитовой опалубки стен';
			$text_arenda_predlojnyi='аренде щитовой опалубки стен';
			}
if (strpos($titlem, 'аренда легкой опалубки') !== false) { $text_arenda_tipopalubki='легкой опалубки';	$text_arenda_imenitpadej='аренда легкой опалубки';
			$text_arenda_roditpadej='аренды легкой опалубки';
			$text_arenda_datelnyi='аренде легкой опалубки';
			$text_arenda_vinitelnyi='аренду легкую опалубку';
			$text_arenda_tvoriyelnyi='арендой легкой опалубки';
			$text_arenda_predlojnyi='аренде легкой опалубки';
			}
if (strpos($titlem, 'аренда монолитной опалубки') !== false) { $text_arenda_tipopalubki='монолитной опалубки';	$text_arenda_imenitpadej='аренда монолитной опалубки';
			$text_arenda_roditpadej='аренды монолитной опалубки';
			$text_arenda_datelnyi='аренде монолитной опалубки';
			$text_arenda_vinitelnyi='аренду монолитную опалубку';
			$text_arenda_tvoriyelnyi='арендой монолитной опалубки';
			$text_arenda_predlojnyi='аренде монолитной опалубки';
			}
if (strpos($titlem, 'аренда мостовой опалубки') !== false) { $text_arenda_tipopalubki='мостовой опалубки';	$text_arenda_imenitpadej='аренда мостовой опалубки';
			$text_arenda_roditpadej='аренды мостовой опалубки';
			$text_arenda_datelnyi='аренде мостовой опалубки';
			$text_arenda_vinitelnyi='аренду мостовую опалубку';
			$text_arenda_tvoriyelnyi='арендой мостовой опалубки';
			$text_arenda_predlojnyi='аренде мостовой опалубки';
			}
if (strpos($titlem, 'аренда объемной опалубки') !== false) { $text_arenda_tipopalubki='объемной опалубки';	$text_arenda_imenitpadej='аренда объемной опалубки';
			$text_arenda_roditpadej='аренды объемной опалубки';
			$text_arenda_datelnyi='аренде объемной опалубки';
			$text_arenda_vinitelnyi='аренду объемную опалубку';
			$text_arenda_tvoriyelnyi='арендой объемной опалубки';
			$text_arenda_predlojnyi='аренде объемной опалубки';
			}
if (strpos($titlem, 'аренда объемной опалубки перекрытий') !== false) { $text_arenda_tipopalubki='объемной опалубки перекрытий';	$text_arenda_imenitpadej='аренда объемной опалубки перекрытий';
			$text_arenda_roditpadej='аренды объемной опалубки перекрытий';
			$text_arenda_datelnyi='аренде объемной опалубки перекрытий';
			$text_arenda_vinitelnyi='аренду объемную опалубку перекрытий';
			$text_arenda_tvoriyelnyi='арендой объемной опалубки перекрытий';
			$text_arenda_predlojnyi='аренде объемной опалубки перекрытий';
			}
if (strpos($titlem, 'аренда опалубки б/у') !== false) { $text_arenda_tipopalubki='опалубки б/у';	$text_arenda_imenitpadej='аренда опалубки б/у';
			$text_arenda_roditpadej='аренды опалубки б/у';
			$text_arenda_datelnyi='аренде опалубки б/у';
			$text_arenda_vinitelnyi='аренду опалубку б/у';
			$text_arenda_tvoriyelnyi='арендой опалубки б/у';
			$text_arenda_predlojnyi='аренде опалубки б/у';
			}
if (strpos($titlem, 'аренда опалубки для ленточного фундамента') !== false) { $text_arenda_tipopalubki='опалубки для ленточного фундамента';	$text_arenda_imenitpadej='аренда опалубки для ленточного фундамента';
			$text_arenda_roditpadej='аренды опалубки для ленточного фундамента';
			$text_arenda_datelnyi='аренде опалубки для ленточного фундамента';
			$text_arenda_vinitelnyi='аренду опалубку для ленточного фундамента';
			$text_arenda_tvoriyelnyi='арендой опалубки для ленточного фундамента';
			$text_arenda_predlojnyi='аренде опалубки для ленточного фундамента';
			}
if (strpos($titlem, 'аренда разборно-переставной опалубки') !== false) { $text_arenda_tipopalubki='разборно-переставной опалубки';	$text_arenda_imenitpadej='аренда разборно-переставной опалубки';
			$text_arenda_roditpadej='аренды разборно-переставной опалубки';
			$text_arenda_datelnyi='аренде разборно-переставной опалубки';
			$text_arenda_vinitelnyi='аренду разборно-переставную опалубку';
			$text_arenda_tvoriyelnyi='арендой разборно-переставной опалубки';
			$text_arenda_predlojnyi='аренде разборно-переставной опалубки';
			}
if (strpos($titlem, 'аренда разборной опалубки') !== false) { $text_arenda_tipopalubki='разборной опалубки';	$text_arenda_imenitpadej='аренда разборной опалубки';
			$text_arenda_roditpadej='аренды разборной опалубки';
			$text_arenda_datelnyi='аренде разборной опалубки';
			$text_arenda_vinitelnyi='аренду разборную опалубку';
			$text_arenda_tvoriyelnyi='арендой разборной опалубки';
			$text_arenda_predlojnyi='аренде разборной опалубки';
			}
if (strpos($titlem, 'аренда стальной опалубки') !== false) { $text_arenda_tipopalubki='стальной опалубки';	$text_arenda_imenitpadej='аренда стальной опалубки';
			$text_arenda_roditpadej='аренды стальной опалубки';
			$text_arenda_datelnyi='аренде стальной опалубки';
			$text_arenda_vinitelnyi='аренду стальную опалубку';
			$text_arenda_tvoriyelnyi='арендой стальной опалубки';
			$text_arenda_predlojnyi='аренде стальной опалубки';
			}
if (strpos($titlem, 'аренда стеновой инвентарной опалубки') !== false) { $text_arenda_tipopalubki='стеновой инвентарной опалубки';	$text_arenda_imenitpadej='аренда стеновой инвентарной опалубки';
			$text_arenda_roditpadej='аренды стеновой инвентарной опалубки';
			$text_arenda_datelnyi='аренде стеновой инвентарной опалубки';
			$text_arenda_vinitelnyi='аренду стеновую инвентарную опалубку';
			$text_arenda_tvoriyelnyi='арендой стеновой инвентарной опалубки';
			$text_arenda_predlojnyi='аренде стеновой инвентарной опалубки';
			}
if (strpos($titlem, 'аренда съемной опалубки') !== false) { $text_arenda_tipopalubki='съемной опалубки';	$text_arenda_imenitpadej='аренда съемной опалубки';
			$text_arenda_roditpadej='аренды съемной опалубки';
			$text_arenda_datelnyi='аренде съемной опалубки';
			$text_arenda_vinitelnyi='аренду съемную опалубку';
			$text_arenda_tvoriyelnyi='арендой съемной опалубки';
			$text_arenda_predlojnyi='аренде съемной опалубки';
			}
if (strpos($titlem, 'аренда телескопической опалубки') !== false) { $text_arenda_tipopalubki='телескопической опалубки';	$text_arenda_imenitpadej='аренда телескопической опалубки';
			$text_arenda_roditpadej='аренды телескопической опалубки';
			$text_arenda_datelnyi='аренде телескопической опалубки';
			$text_arenda_vinitelnyi='аренду телескопическую опалубку';
			$text_arenda_tvoriyelnyi='арендой телескопической опалубки';
			$text_arenda_predlojnyi='аренде телескопической опалубки';
			}
if (strpos($titlem, 'аренда универсальной опалубки') !== false) { $text_arenda_tipopalubki='универсальной опалубки';	$text_arenda_imenitpadej='аренда универсальной опалубки';
			$text_arenda_roditpadej='аренды универсальной опалубки';
			$text_arenda_datelnyi='аренде универсальной опалубки';
			$text_arenda_vinitelnyi='аренду универсальную опалубку';
			$text_arenda_tvoriyelnyi='арендой универсальной опалубки';
			$text_arenda_predlojnyi='аренде универсальной опалубки';
}


	


	//$ourstroka=str_replace('{{text_arenda_tipopalubki}}',$text_arenda_tipopalubki,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_imenitpadej}}',$text_arenda_imenitpadej,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_roditpadej}}',$text_arenda_roditpadej,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_datelnyi}}',$text_arenda_datelnyi,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_vinitelnyi}}',$text_arenda_vinitelnyi,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_tvoriyelnyi}}',$text_arenda_tvoriyelnyi,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_predlojnyi}}',$text_arenda_predlojnyi,$ourstroka);
	
	
	//$text_arenda_tipopalubki_upper=mb_ucfirst($text_arenda_tipopalubki);
	$text_arenda_imenitpadej_upper=mb_ucfirst($text_arenda_imenitpadej);
	$text_arenda_roditpadej_upper=mb_ucfirst($text_arenda_roditpadej);
	$text_arenda_datelnyi_upper=mb_ucfirst($text_arenda_datelnyi);
	$text_arenda_vinitelnyi_upper=mb_ucfirst($text_arenda_vinitelnyi);
	$text_arenda_tvoriyelnyi_upper=mb_ucfirst($text_arenda_tvoriyelnyi);
	$text_arenda_predlojnyi_upper=mb_ucfirst($text_arenda_predlojnyi);
	
	
	//$ourstroka=str_replace('{{text_arenda_tipopalubki_upper}}',$text_arenda_tipopalubki_upper,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_imenitpadej_upper}}',$text_arenda_imenitpadej_upper,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_roditpadej_upper}}',$text_arenda_roditpadej_upper,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_datelnyi_upper}}',$text_arenda_datelnyi_upper,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_vinitelnyi_upper}}',$text_arenda_vinitelnyi_upper,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_tvoriyelnyi_upper}}',$text_arenda_tvoriyelnyi_upper,$ourstroka);
	$ourstroka=str_replace('{{text_arenda_predlojnyi_upper}}',$text_arenda_predlojnyi_upper,$ourstroka);
	
	
	
	$ourstroka=str_replace('{{text_tip_imenitpadej}}',$text_tip_imenitpadej,$ourstroka);
	$ourstroka=str_replace('{{text_tip_roditpadej}}',$text_tip_roditpadej,$ourstroka);
	$ourstroka=str_replace('{{text_tip_datelnyi}}',$text_tip_datelnyi,$ourstroka);
	$ourstroka=str_replace('{{text_tip_vinitelnyi}}',$text_tip_vinitelnyi,$ourstroka);
	$ourstroka=str_replace('{{text_tip_tvoriyelnyi}}',$text_tip_tvoriyelnyi,$ourstroka);
	$ourstroka=str_replace('{{text_tip_predlojnyi}}',$text_tip_predlojnyi,$ourstroka);
	
	
	$text_tip_imenitpadej_upper=mb_ucfirst($text_tip_imenitpadej);
	$text_tip_roditpadej_upper=mb_ucfirst($text_tip_roditpadej);
	$text_tip_datelnyi_upper=mb_ucfirst($text_tip_datelnyi);
	$text_tip_vinitelnyi_upper=mb_ucfirst($text_tip_vinitelnyi);
	$text_tip_tvoriyelnyi_upper=mb_ucfirst($text_tip_tvoriyelnyi);
	$text_tip_predlojnyi_upper=mb_ucfirst($text_tip_predlojnyi);
	
	$ourstroka=str_replace('{{text_tip_imenitpadej_upper}}',$text_tip_imenitpadej_upper,$ourstroka);
	$ourstroka=str_replace('{{text_tip_roditpadej_upper}}',$text_tip_roditpadej_upper,$ourstroka);
	$ourstroka=str_replace('{{text_tip_datelnyi_upper}}',$text_tip_datelnyi_upper,$ourstroka);
	$ourstroka=str_replace('{{text_tip_vinitelnyi_upper}}',$text_tip_vinitelnyi_upper,$ourstroka);
	$ourstroka=str_replace('{{text_tip_tvoriyelnyi_upper}}',$text_tip_tvoriyelnyi_upper,$ourstroka);
	$ourstroka=str_replace('{{text_tip_predlojnyi_upper}}',$text_tip_predlojnyi_upper,$ourstroka);
	
	

echo $ourstroka;

$this->EndViewTarget("newseo");
?>