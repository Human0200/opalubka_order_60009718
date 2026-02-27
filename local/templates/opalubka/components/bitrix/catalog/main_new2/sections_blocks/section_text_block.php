<?
$descBlock = CIBlockSection::GetList([],['IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ID'=>$arSection['ID']], false, ['DESCRIPTION'], false)->GetNext()['~DESCRIPTION'];

echo $descBlock;
?>