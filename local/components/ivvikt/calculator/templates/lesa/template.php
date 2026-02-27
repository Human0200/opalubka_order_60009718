<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
$this->addExternalJS($templateFolder . "/vue-3.4.21.js");
?>

<div class="calculator-container" id="calculator-vue">
    <div class="calc-headed">
        <h2><?= $arResult['HEAD']; ?></h2>
    </div>
    <div class="calc-description">
        <?= $arResult['TEXT']; ?>
    </div>
    <div class="calc-form">
        <div class="calc-input-block">
            <div class="calc-input form-control">
                <label for="les-type">Тип лесов</label>
                <select id="les-type" name="les-type" v-model="type_id" @change="changeType">
                    <? foreach ($arResult['TYPES'] as $k => $v) { ?>
                    <option value="<?= $v['ID']; ?>" <?= ($k === 0) ? 'selected' : ''; ?>><?= $v['TEXT']; ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="calc-input form-control">
                <label for="les-length">Длина фасада, м</label>
                <input type="text" id="les-length" name="les-length" @input="inputLength($event)">
            </div>
            <div class="calc-input form-control">
                <label for="les-height">Высота фасада, м</label>
                <input type="text" id="les-height" name="les-height" @input="inputHeight($event)">
            </div>
            <div class="calc-input form-control button">
                <button :disabled="!btnAccess" @click="calculate" type="button" id="les-button" class="btn btn-lg btn-default has-ripple">Рассчитать</button>
            </div>
        </div>
    </div>
    <div class="calc-result">
        <div class="calc-result-head">Результат расчета</div>
        <div class="calc-result-block">
            <div class="result-item">
                <p class="result-title">Площадь фасада, м2</p>
                <p id="size-result" class="result-summ">{{ size }}</p>
            </div>
            <div class="result-item">
                <p class="result-title">Стоимость комплекта в месяц, руб</p>
                <p id="summ-result" class="result-summ">{{ summ }}</p>
            </div>
        </div>
    </div>
    <div class="calc-feedback">
        <div class="calc-feedback-text-block">
            <?= $arResult['PHONE_TEXT']; ?>
        </div>
        <div class="calc-feedback-btn-block">
            <button type="button" class="calc-feedback-btn" data-event="jqm" data-param-form_id="CALLBACK" data-name="callback">Оставить заявку</button>
        </div>
    </div>
</div>

<script>
    var calcData = <?= json_encode($arResult); ?>;
</script>
