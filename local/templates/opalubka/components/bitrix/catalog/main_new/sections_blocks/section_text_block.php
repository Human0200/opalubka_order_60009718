<?
$descBlock = CIBlockSection::GetList([],['IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ID'=>$arSection['ID']], false, ['DESCRIPTION'], false)->GetNext()['~DESCRIPTION'];

echo $descBlock;
?>

<?
$res = CIBlockSection::GetList([], ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ID' => $arSection['ID']], false, ['IBLOCK_ID', 'ID', 'UF_BOTDOP'])->Fetch();
$value = $res['UF_BOTDOP'];
if ($value) {
DopText($value);
}
?>
