<?php

include_once('seo.php');

AddEventHandler("sale", "OnBeforeBasketAdd", "OnBeforePresentToBasket");

function OnBeforePresentToBasket(&$arFields) {

//$session = \Bitrix\Main\Application::getInstance()->getSession();

    $arFields['PROPS'][] = array(
        'NAME' => "Срок аренды",
        'CODE' => "KOD_A",
        'VALUE' => $_COOKIE["days"],
        'SORT' => 0
    );
}


AddEventHandler('main', 'OnUserTypeBuildList', array('CUserTypeSectionsHtmlField', 'GetUserTypeDescription'), 5000);
class CUserTypeSectionsHtmlField {

    public static function GetUserTypeDescription() {
        return array(
            // уникальный идентификатор
            'USER_TYPE_ID' => 'sections_html_field',
            // имя класса, методы которого формируют поведение типа
            'CLASS_NAME' => 'CUserTypeSectionsHtmlField',
            // название для показа в списке типов пользовательских свойств
            'DESCRIPTION' => 'HTML/text',
            // базовый тип на котором будут основаны операции фильтра
            'BASE_TYPE' => 'string',
        );
    }

    public static function GetDBColumnType($arUserField) {
        switch (strtolower($GLOBALS['DB']->type)) {
            case 'mysql':
                return 'text';
                break;
        }
    }

    public static function GetSettingsHTML($arUserField = false, $arHtmlControl, $bVarsFromForm) {
        $result = '';

        return $result;
    }

    public static function CheckFields($arUserField, $value) {
        $aMsg = array();
        return $aMsg;
    }

    public static function GetEditFormHTML($arUserField, $arHtmlControl) {
        if ($arUserField["ENTITY_VALUE_ID"] < 1 && strlen($arUserField["SETTINGS"]["DEFAULT_VALUE"]) > 0)
            $arHtmlControl["VALUE"] = htmlspecialchars($arUserField["SETTINGS"]["DEFAULT_VALUE"]);
        ob_start();
        CFileMan::AddHTMLEditorFrame($arHtmlControl["NAME"], $arHtmlControl["VALUE"], "html", "html", 200, "N", 0, "", "", "s1");
        $b = ob_get_clean();
        return $b;
    }

    public static function GetEditFormHTMLMulty($arUserField, $arHtmlControl) {
        $html = 'Поле не может быть множественным!';
        return $html;
    }

    public static function GetFilterHTML($arUserField, $arHtmlControl) {
        $sVal = intval($arHtmlControl['VALUE']);
        $sVal = $sVal > 0 ? $sVal : '';

        return CUserTypeSectionsHtmlField::GetEditFormHTML($arUserField, $arHtmlControl);
    }

    public static function GetAdminListViewHTML($arUserField, $arHtmlControl) {
        return '';
    }

    public static function GetAdminListViewHTMLMulty($arUserField, $arHtmlControl) {
        return '';
    }

    public static function GetAdminListEditHTML($arUserField, $arHtmlControl) {
        return '';
    }

    public static function GetAdminListEditHTMLMulty($arUserField, $arHtmlControl) {
        return '';
    }

    public static function onsearchIndex($arUserField) {
        return '';
    }

    public static function OnBeforeSave($arUserField, $value) {
        return $value;
    }
}

if (strpos($_SERVER['REQUEST_URI'], 'bitrix') == false) {
	AddEventHandler("main", "OnEndBufferContent", "ChangeMyContent");
	function ChangeMyContent(&$content){
		$content=str_replace('action="/catalog/"','action="/arenda_opalubki/"',$content);
		$content=str_replace('/catalog/compare.php"','/arenda_opalubki/compare.php"',$content);
		
		$content=str_replace('http://','https://',$content);
		
		
		$content=str_replace('<a href="https://wa.me/74951910920" class="link2"></a>','',$content);
		
		
		
		
		$content=str_replace('?PAGEN_3=1','',$content);
		
		
		$content=str_replace('"/arenda_shchitovoy_opalubki_dlya_fundamenta/"','"/arenda_opalubki/arenda_shchitovoy_opalubki_dlya_fundamenta/"',$content);
		
		$content=str_replace('"/include/licenses_detail.php"','"/licenses_detail.php"',$content);

		
		if(strpos($_SERVER['REQUEST_URI'], 'arenda_opalubki_')!==false) 
		{	
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_nn/') {$zam1='Нижнем Новгороде';$zam2='Нижнего Новгорода';$zam3='Нижний Новгород';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_torzhok/') {$zam1='Торжке';$zam2='Торжка';$zam3='Торжок';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_tver/') {$zam1='Твери';$zam2='Твери';$zam3='Тверь';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_yaroslavl/') {$zam1='Ярослaвле';$zam2='Ярослaвля';$zam3='Ярослaвль';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_kostroma/') {$zam1='Костроме';$zam2='Костромы';$zam3='Кострому';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_rybinsk/') {$zam1='Рыбинске';$zam2='Рыбинска';$zam3='Рыбинск';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_uglich/') {$zam1='Угличе';$zam2='Углича';$zam3='Углич';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_rostov-velikiy/') {$zam1='Ростове Великом';$zam2='Ростова Великого';$zam3='Ростов Великий';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_pereslavl-zalesskiy/') {$zam1='Переслaвле-Зaлесском';$zam2='Переслaвля-Зaлесского';$zam3='Переслaвль-Зaлесский';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_sergiev-posad/') {$zam1='Сергиевом Посaде';$zam2='Сергиева Посaда';$zam3='Сергиев Посaд';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_kolomna/') {$zam1='Коломне';$zam2='Коломны';$zam3='Коломну';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_kaluga/') {$zam1='Кaлуге';$zam2='Кaлуги';$zam3='Кaлугу';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_ryazan/') {$zam1='Рязaни';$zam2='Рязaни';$zam3='Рязaнь';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_tula/') {$zam1='Туле';$zam2='Тулы';$zam3='Тулу';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_smolensk/') {$zam1='Смоленске';$zam2='Смоленска';$zam3='Смоленск';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_orel/') {$zam1='Орле';$zam2='Орла';$zam3='Орел';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_magnitogorsk/') {$zam1='Магнитогорске';$zam2='Магнитогорска';$zam3='Магнитогорск';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_vladimir/') {$zam1='Владимире';$zam2='Владимира';$zam3='Владимира';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_kursk/') {$zam1='Курске';$zam2='Курска';$zam3='Курск';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_bryanks/') {$zam1='Брянске';$zam2='Брянска';$zam3='Брянск';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_ivanovo/') {$zam1='Иваново';$zam2='Иваново';$zam3='Иваново';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_lipeck/') {$zam1='Липецке';$zam2='Липецка';$zam3='Липецк';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_tambov/') {$zam1='Тамбове';$zam2='Тамбова';$zam3='Тамбов';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_belgorod/') {$zam1='Белгороде';$zam2='Белгорода';$zam3='Белгород';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_penza/') {$zam1='Пензе';$zam2='Пензы';$zam3='Пенза';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_saransk/') {$zam1='Саранске';$zam2='Саранска';$zam3='Саранск';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_vologda/') {$zam1='Вологде';$zam2='Вологды';$zam3='Вологда';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_cherepovec/') {$zam1='Череповце';$zam2='Череповца';$zam3='Череповец';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_velikiy-novgorod/') {$zam1='Великом Новгороде';$zam2='Великого Новгорода';$zam3='Великий Новгород';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_podolsk/') {$zam1='Подольске';$zam2='Подольска';$zam3='Подольск';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_rzhev/') {$zam1='Ржеве';$zam2='Ржева';$zam3='Ржев';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_dubna/') {$zam1='Дубне';$zam2='Дубны';$zam3='Дубна';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_murom/') {$zam1='Муроме';$zam2='Мурома';$zam3='Муром';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_sarov/') {$zam1='Сарове';$zam2='Сарова';$zam3='Саров';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_elec/') {$zam1='Ельце';$zam2='Ельца';$zam3='Елец';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_roslavl/') {$zam1='Рославле';$zam2='Рославля';$zam3='Рославль';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_vyazma/') {$zam1='Вязьме';$zam2='Вязьмы';$zam3='Вязьма';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_velikie-luki/') {$zam1='Великих Луках';$zam2='Великих Луков';$zam3='Великие Лука';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_arzamas/') {$zam1='Арзамасе';$zam2='Арзамаса';$zam3='Арзамас';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_dzerzhinsk/') {$zam1='Дзержинске';$zam2='Дзержинска';$zam3='Дзержинск';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_kazan/') {$zam1='Казани';$zam2='Казани';$zam3='Казань';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_voronezh/') {$zam1='Воронеже';$zam2='Воронежа';$zam3='Воронеж';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_novosibirsk/') {$zam1='Новосибирске';$zam2='Новосибирска';$zam3='Новосибирск';}
			if ($_SERVER['REQUEST_URI']=='/arenda_opalubki_spb/') {$zam1='Санкт-Петербурге';$zam2='Санкт-Петербурга';$zam3='Санкт-Петербург';}
			
			if ($zam1) {
				$content=str_replace('Москве',$zam1,$content);
			}
			
			if ($zam2) {
				$content=str_replace('Москвы',$zam2,$content);
			}
			
			if ($zam3) {
				$content=str_replace('Москву',$zam3,$content);
			}
			//$content=str_replace('Москве',$zam1,$content);
			//$content=str_replace('Москвы',$zam2,$content);
			//$content=str_replace('Москву',$zam3,$content);
			
			
		}
		
		
	}
}











function NewGetAdr()
{
	$zamenaarr=array('/','arenda_opalubki_');
	$oururl=str_replace($zamenaarr,'',$_SERVER['REQUEST_URI']);
									
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");
	$arFilter = Array("IBLOCK_ID"=>40, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","PROPERTY_WF_SUBDOMAIN"=>$oururl);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
	while($ob = $res->GetNextElement()){ 
		$arFields = $ob->GetFields();  
		$arProps = $ob->GetProperties();
		$adress=$arFields['NAME'].', '.$arProps['WF_ADR']['VALUE'];
	}
	if ($adress)
	{
		$adress=$adress;
	}
	else {
		$adress='г. Химки, Коммунальный проезд, д. 30';
	}	
	echo $adress;
}


function NewGetPhone()
{
	$zamenaarr=array('/','arenda_opalubki_');
	$oururl=str_replace($zamenaarr,'',$_SERVER['REQUEST_URI']);
									
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");
	$arFilter = Array("IBLOCK_ID"=>40, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","PROPERTY_WF_SUBDOMAIN"=>$oururl);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>1), $arSelect);
	while($ob = $res->GetNextElement()){ 
		$arFields = $ob->GetFields();  
		$arProps = $ob->GetProperties();
		$phone=$arProps['WF_PHONES']['VALUE'][0];
	}
	if ($phone) {
		$phone=$phone;
	}
	else {
		$phone='8 800 600 72 74';
	}
	echo $phone;
}

function DopText($doptext)
{
	$outer='<div class="newpotext">'.$doptext.'</div><div class="newdopsection"><div class="shmore btn">Показать еще</div></div>';
	echo $outer;
}


function check_mobile_device() { 
	$mobile_agent_array = array('ipad', 'iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
	$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	foreach ($mobile_agent_array as $value) {
		if (strpos($agent, $value) !== false) return true;
	}
	return false;
}


function getcity($name) {
	if ($_SERVER['HTTP_HOST']=='opalubka.market')
	{
		//Город Москва
		$id_goroda=1404;
	}
	else {
		//Остальные города
		$poddomen=explode('.',$_SERVER['HTTP_HOST']);
		$poddomen=$poddomen[0];
		
		$arSelect1 = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_PRIV");
		$arFilter1 = Array("IBLOCK_ID"=>40, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","PROPERTY_WF_SUBDOMAIN"=>$poddomen);
		$res = CIBlockElement::GetList(Array(), $arFilter1, false, Array("nPageSize"=>50), $arSelect1);
		while($ob = $res->GetNextElement()){ 
			$arFields = $ob->GetFields();  
			$id_goroda=$arFields['ID'];
		}
	}

	$flag=1;
	
	$arFilter = Array('IBLOCK_ID'=>21,'NAME'=>$name, 'ACTIVE'=>'Y');
			$db_list = CIBlockSection::GetList(Array("timestamp_x"=>"DESC"), $arFilter, false, Array("UF_PRIVE1"));
			if($uf_value = $db_list->GetNext()):
				 $value=$uf_value["UF_PRIVE1"];
			endif;

	if ($value)	{
		if (!in_array($id_goroda,$value) )
			{
				$flag=1;
			}
			else {
				$flag=0;
			} 
	}
    $flag=1;
	return $flag;
}


function getSectionMinPrice($sectionID){
    if(empty($sectionID)) {
        return;
    }
    \Bitrix\Main\Loader::includeModule("catalog");
    \Bitrix\Main\Loader::includeModule('currency');
    $priceGroup = '1';
    $section =  \Bitrix\Iblock\SectionTable::getList([
        'filter' => ['ID' => $sectionID],
        'select' => ['LEFT_MARGIN', 'RIGHT_MARGIN', 'IBLOCK_ID', 'ID']
    ])->fetchRaw();
    // Собираем все подразделы
    $subSections = \Bitrix\Iblock\SectionTable::getList([
        'filter' => [
            '>=LEFT_MARGIN' => $section['LEFT_MARGIN'],
            '<=RIGHT_MARGIN' => $section['RIGHT_MARGIN'],
            '=IBLOCK_ID'  => $section['IBLOCK_ID'],
        ],
        'select' => ['ID']
    ]);
    while ($section = $subSections->fetch()) {
        $arSectionsID[] = $section['ID'];
    }
    // Составляем запрос для получения элементво привязанных к секциям
    $elementSection = new Bitrix\Main\Entity\Query('\Bitrix\Iblock\SectionElementTable');
    $elementSection->addSelect('IBLOCK_ELEMENT_ID')->setFilter(['=IBLOCK_SECTION_ID' => $arSectionsID])->registerRuntimeField(
        'SECTION',
        [
            'data_type' => '\Bitrix\Iblock\SectionTable',
            'reference' => [
                '=this.IBLOCK_SECTION_ID' => 'ref.ID',
            ],
            'join_type' => 'inner'
        ]
    );
    // Выполняем запрос
    $resElementsID = \Bitrix\Main\Application::getConnection()->query($elementSection->getQuery());
    while ($elementsID = $resElementsID->fetch()) {
        $arElementsID[] = $elementsID['IBLOCK_ELEMENT_ID'];
    }
    $arItem = \Bitrix\Iblock\ElementTable::getList(
        [
            'filter' => ['=ID' => $arElementsID, 'ACTIVE' => 'Y'],
            'order' =>  ['PriceTable.PRICE_SCALE' => 'asc'],
            'select' => [
                'PriceTable.PRICE_SCALE', // Сумма конвертируется в базовую валюту
            ],
            'limit' => 1,
            'runtime' => [
                new \Bitrix\Main\Entity\ReferenceField(
                    'PriceTable',
                    \Bitrix\Catalog\PriceTable::class,
                    ['=this.ID' => 'ref.PRODUCT_ID', $priceGroup => 'ref.CATALOG_GROUP_ID'],
                    ['join_type' => 'RIGHT']
                )
            ]
        ]
    )->fetchRaw();
    if (!empty($arItem)) {
        // Получаем форматированную цену в базовой валюте
        $minPriceSection = \CCurrencyLang::CurrencyFormat(reset($arItem), \Bitrix\Currency\CurrencyManager::getBaseCurrency());
    }
    return $minPriceSection;
}



AddEventHandler("sale", "OnOrderNewSendEmail", "bxModifySaleMails");



function bxModifySaleMails($orderID, &$eventName, &$arFields)
{
    $arOrder = CSaleOrder::GetByID($orderID);

    $order_props = CSaleOrderPropsValue::GetOrderProps($orderID);
    $phone="";
    $index = "";
    $country_name = "";
    $city_name = "";
    $address = "";
    $delivery_price = 0;
    while ($arProps = $order_props->Fetch())
    {
        if ($arProps["CODE"] == "PHONE")
        {
            $phone = htmlspecialchars($arProps["VALUE"]);
        }
        if ($arProps["CODE"] == "LOCATION")
        {
            $arLocs = CSaleLocation::GetByID($arProps["VALUE"]);
            $country_name =  $arLocs["COUNTRY_NAME_ORIG"];
            $city_name = $arLocs["CITY_NAME_ORIG"];
        }

        if ($arProps["CODE"] == "ZIP")
        {
            $index = $arProps["VALUE"];
        }

        if ($arProps["CODE"] == "ADDRESS")
        {
            $address = $arProps["VALUE"];
        }
    }

    $full_address = $index.", ".$country_name."-".$city_name.", ".$address;

    $arDeliv = CSaleDelivery::GetByID($arOrder["DELIVERY_ID"]);
    $delivery_name = "";
    if ($arDeliv)
    {
        $delivery_name = $arDeliv["NAME"];
        $delivery_price = $arDeliv["PRICE"];
    }


    $arPaySystem = CSalePaySystem::GetByID($arOrder["PAY_SYSTEM_ID"]);
    $pay_system_name = "";
    if ($arPaySystem)
    {
        $pay_system_name = $arPaySystem["NAME"];
    }
    $personType = '';
    if ($arPersType = CSalePersonType::GetByID($arOrder['PERSON_TYPE_ID']))
    {
        $personType = $arPersType['NAME'];
    }

    $arFields["ORDER_DESCRIPTION"] = $arOrder["USER_DESCRIPTION"];
    $arFields["PHONE"] =  $phone;
    $arFields["DELIVERY_NAME"] =  $delivery_name;
    $arFields["PAY_SYSTEM_NAME"] =  $pay_system_name;
    $arFields["FULL_ADDRESS"] = $full_address;
    $arFields["DELIVERY_PRICE"] = $delivery_price;
    $arFields["PRODUCTS_PRICE"] =  (float)$arOrder["PRICE"] - (float)$delivery_price;
    $arFields["PERSON_TYPE"] = $personType;
    $arFields["TAX_VALUE"] = $arOrder["TAX_VALUE"];
}


function isMobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>