<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("IVVIKT_COMPONENT_NAME"),
	"DESCRIPTION" => GetMessage("IVVIKT_COMPONENT_DESCR"),
	"ICON" => "/images/icon_popup.gif",
	"CACHE_PATH" => "Y",
	"PATH" => array(
			"ID" => "utility",
			"CHILD" => array(
				"ID" => "Калькулятор",
				"NAME" => GetMessage("MAIN_USER_GROUP_NAME")
			)
		),	
);
?>