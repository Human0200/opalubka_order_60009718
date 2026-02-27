<?
$linkBlock = CIBlockSection::GetList([],['IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ID'=>$arSection['ID']], false, ['UF_LINK_BLOCK'], false)->GetNext()['~UF_LINK_BLOCK'];

echo $linkBlock;
?>