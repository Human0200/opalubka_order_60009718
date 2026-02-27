<div style="display:none;"  class="newsslcont">



<?
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_SSL");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>12, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","!PROPERTY_SSL"=>false);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()){
	$arProps = $ob->GetProperties();
	echo '<a href="'.$arProps['SSL']['VALUE'].'">'.$arProps['SSL']['VALUE'].'</a><br>';
//print_r($arProps['SSL']['VALUE']);
}
?>

</div>