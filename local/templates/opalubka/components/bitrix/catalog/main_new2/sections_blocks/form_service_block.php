<? $name = $arSection['NAME']; ?>

<div class="ordered-block wraps form-order-block ">
    <table class="order-block bordered">
        <tr>
            <td class="col-md-9 col-sm-8 col-xs-7 valign text-col">
                <div class="block-item"> 
                    <div class="flexbox flexbox--row">
                        <div class="block-item__image icon_sendmessage"><?= CMax::showIconSvg("sendmessage", SITE_TEMPLATE_PATH . "/images/svg/sendmessage.svg", "", "colored_theme_svg", true, false); ?></div>
                        <div class="text darken">
                            Оформите заявку на сайте, мы свяжемся с вами в ближайшее время и ответим на все интересующие вопросы.
                        </div>
                    </div>
                </div>
            </td>
            <td class="col-md-3 col-sm-4 col-xs-5 valign btns-col">
                <div class="btns">
                    <span><span class="btn btn-default" data-event="jqm" data-param-form_id="SERVICES" data-name="order_services" data-autoload-service="<?= CMax::formatJsName($name); ?>" data-autoload-project="<?= CMax::formatJsName($name); ?>"><span>Заказать услугу</span></span></span>
                    <span><span class="btn  btn-transparent-border-color question" data-event="jqm" data-param-form_id="ASK" data-name="ASK" data-autoload-product_name="<?= CMax::formatJsName($name); ?>"><?= CMax::showIconSvg("question", SITE_TEMPLATE_PATH . '/images/svg/qmark.svg', "", "colored_theme_svg", true, false); ?></span></span>
                </div>
            </td>
        </tr>
    </table>
</div>