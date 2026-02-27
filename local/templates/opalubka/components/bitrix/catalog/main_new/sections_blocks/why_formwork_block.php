<?php


if(!empty($arResult['VARIABLES']['SECTION_CODE'])) {
    $rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),
        ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'CODE' => $arResult['VARIABLES']['SECTION_CODE']], false,
        ['ID', 'NAME', 'DETAIL_PICTURE', 'IBLOCK_ID', 'UF_IMAGES']);
    if ($arSect = $rsSect->Fetch()) {
        if(!empty($arSect['DETAIL_PICTURE'])) {
            $sImg = CFile::GetPath( $arSect['DETAIL_PICTURE']);
        }
        if(!empty($arSect['UF_IMAGES'])) {
            $UF_IMAGES = $arSect['UF_IMAGES'];
        }

    }
}
?>
<h2> Почему наша опалубка? </h2>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
    <div class="c-promo 5">
        <div class="c-promo-img">
            <img alt="shablon.png" src="<?=$sImg ? : '/upload/medialibrary/6fd/lecbpzz1cjxux4tcz0ytht30iym14wtl.png'?>" title="shablon.png">
        </div>
        <div class="c-promo-list">
            <div class="promo1 lprblock">
                <div class="h3">
                    Качество сварки
                </div>
                <br>
                <p>
                    Выполняем сварочный процесс по нормативам сварочный карты. Сварка в двух сторон позволяет избежать перегрева металла и деформации
                </p>
            </div>
            <div class="promo2 lprblock">
                <div class="h3">
                    Толщина профиля
                </div>
                <br>
                <p>
                    Используем профиль, который соответствует ГОСТ. Это значит, что профиль всегда равен заявленной толщине либо превосходит ее
                </p>
            </div>
            <div class="promo3 lprblock">
                <div class="h3">
                    Прочные швы
                </div>
                <br>
                <p>
                    Резка лентопильными станками. Сварка проволокой без разрыва сварочного шва. Герметизацию швов производим только качественным европейским силиконом, устойчивым к агрессивным средам
                </p>
            </div>
            <div class="promo4 prblock">
                <div class="h3">
                    Качество фанеры
                </div>
                <br>
                <p>
                    Используем фанеру только "Демидовского фанерного комбината" (ДФК). Она производится с соблюдением всех технологических процессов и отвечает европейским стандартам качества
                </p>
            </div>
            <div class="promo5 prblock">
                <div class="h3">
                    Размерный ряд
                </div>
                <br>
                <p>
                    Наши мощности позволяют произвести опалубку по индивидуальному требованию заказчика. Размерный ряд, кратный сантиметру: ширина от 20 см до 120 см; высота от 50 см до 330 см
                </p>
            </div>
            <div class="promo6 prblock">
                <div class="h3">
                    Сжатые сроки
                </div>
                <br>
                <p>
                    Производство позволяет увеличить количество смен для ускорения сроков поставки
                </p>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
</div>
<div style="clear: both;"></div>
<?include $_SERVER['DOCUMENT_ROOT'] . '/include/catalog-gallery.php';?>