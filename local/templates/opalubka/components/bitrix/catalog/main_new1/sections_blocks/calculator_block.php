<div class="catalog-content-block">
    <h3>Калькулятор стеновой опалубки</h3>
    <div class="outwrapper">
        <div class="wrapper">
            <p class="width">
                Длина стены, метров:
            </p>
            <div class="inwrapper">
                10 <input class="r1" type="range" min="10" max="200" id="r1">200
            </div>
        </div>
        <div class="wrapper">
            <p class="height">
                Высота стены, метров:
            </p>
            <div class="inwrapper">
                <span>1</span> <input class="r2" type="range" min="10" max="30" id="r2"><span class="middle-span">2</span><span>3</span>
            </div>
        </div>
        <div class="overflow-table">
            <table>
                <tbody>
                    <tr>
                        <th>
                            НАименование
                        </th>
                        <th>
                            Площадь, м2
                        </th>
                        <th>
                            Цена за м2
                        </th>
                        <th>
                            Итоговая стоимость
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Опалубка стальная 1-го класса
                        </td>
                        <td class="center" id="res">
                        </td>
                        <td class="center">
                            4 000 р.
                        </td>
                        <td class="right" id="res2">
                            р.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <h3>Калькулятор опалубки перекрытий</h3>
    <div class="outwrapper calc3">
        <div class="wrapper">
            <p>
                Площадь перекрытий(м2)
            </p>
            <input type="text" id="pl" value="1" name="">
        </div>

        <div class="wrapper">
            <p>
                Толщина перекрытия(мм)
            </p>
            <select name="ceiling" id="ceiling">
                <option value="160">160</option>
                <option value="180">180</option>
                <option value="200">200</option>
                <option value="220">220</option>
                <option value="250">250</option>
                <option value="280">280</option>
                <option value="300">300</option>
                <option value="350">350</option>
            </select>
        </div>
        
    </div>
    <div class="outwrapper">
        <div class="overflow-table">  
            <table id="details">
                <thead>
                    <tr>
                        <th>
                            №
                        </th>
                        <th>
                            Наименование элемента
                        </th>
                        <th>
                            Ед. изм.
                        </th>
                        <th>
                            Кол-во
                        </th>
                        <th>
                            Цена, руб.
                        </th>
                        <th>
                            Сумма, руб.
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="center">
                            1
                        </td>
                        <td>
                            Стойка
                        </td>
                        <td class="center">
                            шт.
                        </td>
                        <td class="right">
                            1
                        </td>
                        <td class="center">
                            4 000 р.
                        </td>
                        <td class="right">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> 
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.0/rangeslider.min.js"></script>
<script type="text/javascript">
    // Load rangeslider.min.js
    var $x = jQuery.noConflict();

    $x('input[type="range"].r1').rangeslider({
        polyfill: false,
        onSlide: function (position, value) {
            $("#l").html(value);
            //console.log($('#r2').val());
            $("#res").html(parseInt(value) * parseInt($('#r2').val()) / 10);
            $("#res2").html((parseInt(value) * parseInt($('#r2').val()) / 10) * 4000);
            console.log(parseInt(value) * parseInt($('#r2').val()) / 10);

        }
    })


    $x('input[type="range"].r2').rangeslider({
        polyfill: false,
        onSlide: function (position, value) {
            $("#h").html(parseInt(value) / 10);
            $("#res").html(parseInt($('#r1').val()) * parseInt(value) / 10);
            $("#res2").html((parseInt($('#r1').val()) * parseInt(value) / 10) * 4000);



        }
    })

    $("#l").html($('#r1').val());
    $("#h").html(parseInt($('#r2').val()) / 10);
    $("#res").html(parseInt($('#r1').val()) * parseInt($('#r2').val()) / 10);
    $("#res2").html((parseInt($('#r1').val()) * parseInt($('#r2').val()) / 10) * 4000);

    
    function calc3() {
        $('#details tbody tr').remove();
        details = undefined;
        details = [['Стойка', 0.7, 595, 'шт'],
            ['Унивилка', 0.7, 95, 'шт'],
            ['Тренога', 0.5, 250, 'шт'],
            ['Балка клееная', 3.8, 195, 'мп'],
            ['Фанера', 1, 1000, 'м2'],
        ];
        //на 160 понижающий коэфициент на все значения 0,8.        От 250 - повышающий коэфициент 1,2
        console.log(details);
        let k = 1;
        let w = parseInt($('#ceiling').val());

        let sq = parseInt($('#pl').val());
        if (w == 160)
            k = 0.8;
        if (w >= 250)
            k = 1.2;
        let sum = 0;
        for (let i = 0; i < details.length; i++) {
            z = i + 1;
            details[i][5] = Math.ceil(details[i][1] * k * sq);
            details[i][6] = details[i][5] * details[i][2];
            sum += details[i][6];
            if (details[i][5] > 0) {
                $('#details tbody').append(`	<tr>
                        <td>${z}</td>
                        <td class="center">${details[i][0]}</td>
                        <td class="center">${details[i][3]}</td>
                        <td class="right">${details[i][5]}</td>

                        <td class="center">${details[i][2]}</td>
                        <td class="right">${details[i][6]}</td>
			
                </tr>
`);
            }

        }
        $('#details tbody').append(`	<tr>
                        <td class="center" colspan="5">Сумма</td>
                        <td class="right">${sum} руб.</td>
			
                </tr>
`);





    }
    $(".calc3 input, .calc3 select").change(function () {
        calc3()
    })
    $(".calc3 input").keyup(function () {
        calc3()
    })

</script>

<style type="text/css">

    p.width, p.height{
        padding-left: 40px;
        font-family: Ubuntu;
        font-size: 18px;
        font-weight: bold;
    }
    p.width {
        background: url(/img/w.png) no-repeat transparent !important;
    }
    p.height {
        background: url(/img/h.png) 15px 0 no-repeat transparent !important;
    }
    .rangeslider--horizontal {
        width: 100%;
        position: relative;
    }
    .right{
        text-align: right;
    }
    .center{
        text-align: center;
    }
    .outwrapper{
        display: flex;
        flex-wrap:wrap;
        flex-direction: column;
        padding: 15px;
        margin-bottom: 50px;
    }
    
    .outwrapper .wrapper {
		width: fit-content;
	}

    .wrapper{
        margin-right: 15px;
    }
    .wrapper p{
        margin: 0;
    }
    .inwrapper{
        padding: 1px;
        margin: 3px;
    }
    .outwrapper table{
        background-color: #fff;
        width: auto;
        margin-top: 50px;
        padding: 5px;
    }
    .outwrapper table#details{
        margin-top: 0;
    }
    .outwrapper table th{
        font-weight: bold;
        padding: 5px;
        border: 1px solid;
        text-align: center;
    }
    .outwrapper table td{
        border: 1px solid;
        padding: 5px;
    }
    .outwrapper button{
        background-color: #ba200f;
        color: #fff;
        padding: 5px 10px;
        border: none;
        margin-top: 34px;
        font-size: 13px;
    }
    #l,#h{
        font-weight: bold;
    }

    @media screen and (max-width: 480px) {
        .outwrapper{
            display:block;
            padding: 0;
        }
        .rangeslider {
            width: 100%;
            position: relative;
        }
        .outwrapper table{
            min-width: 500px !important;
        }
    }

    @media screen and (max-width: 990px)
    {
        .cta2img{
            display: none;
        }
    }
    
    .middle-span {
        position: absolute;
        bottom: 4px;
        right: calc(50% - 6px);
    }
</style>
<?
$showCalc = CIBlockSection::GetList([], ['IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ID' =>$arResult['VARIABLES']['SECTION_ID']], false, ['UF_SHOW_CALC'], false)->GetNext()['UF_SHOW_CALC'];

if ($showCalc) {
    $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/calculator/calc_lesa.php');
}
?>