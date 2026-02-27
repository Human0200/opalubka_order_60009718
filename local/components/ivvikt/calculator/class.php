<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Application;
use Bitrix\Main\SystemException;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\Loader;

use Bitrix\Main\Entity;

class CKvokkaFeedback extends CBitrixComponent implements \Bitrix\Main\Engine\Contract\Controllerable {

    protected $errorCollection;

    public function configureActions() {
        return [];
    }
    
    public function onPrepareComponentParams($arParams)
    {
            $this->errorCollection = new ErrorCollection();
            return $arParams;
    }
    
    protected function listKeysSignedParameters()
    {					
        return [];
    }

    public function getData() {
        $ibId = $this->arParams['IBLOCK_ID'];
        $secId = $this->arParams['CALC_ID'];
        if (!empty($ibId) && intval($ibId) > 0 && !empty($secId) && intval($secId) > 0) {
            $this->arResult = [];
            $arSect = CIBlockSection::GetList([], ['IBLOCK_ID' => $ibId, 'ID' => $secId], false, ['NAME', 'DESCRIPTION', 'UF_PHONE_TEXT'], false)->Fetch();
            if (!empty($arSect)) {
                $this->arResult['HEAD'] = $arSect['NAME'];
                $this->arResult['TEXT'] = $arSect['DESCRIPTION'];
                $this->arResult['PHONE_TEXT'] = $arSect['UF_PHONE_TEXT'];
                $dbEls = CIBlockElement::GetList(['SORT' => 'ASC'], ['IBLOCK_ID' => $ibId, 'SECTION_ID' => $secId], false, false, []);
                while ($obEl = $dbEls->GetNextElement()) {
                    $arFields = $obEl->GetFields();
                    $arProps = $obEl->GetProperties();
                    $this->arResult['TYPES'][] = [
                        'ID' => $arFields['ID'],
                        'TEXT' => $arFields['NAME'],
                        'PRICE' => floatval($arProps['PRICE']['VALUE'])
                    ];
                }
            }
        }
    }

    public function executeComponent() {
        $this->getData();
        $this->IncludeComponentTemplate();
    }
}
