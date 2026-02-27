document.addEventListener('DOMContentLoaded', function () {
    if (calcData) {
        /*const data = {
                    name: calcData.HEAD,
                    text: calcData.TEXT,
                    types: calcData.TYPES,
                    type_id: calcData.TYPES[0],
                    price: calcData.TYPES[0].PRICE,
                    width: 0,
                    height: 0,
                    size: 0,
                    summ: 0
                };
                
                
        const typeSelect = document.getElementById('les-type');
        if (typeSelect) {
            typeSelect.addEventListener('change', function() {
                data.type_id = this.value;
                console.log(data.type_id);
            });
        }*/
        const VueFeedback = {
            data() {
                return {
                    name: calcData.HEAD,
                    text: calcData.TEXT,
                    types: calcData.TYPES,
                    type_id: calcData.TYPES[0].ID,
                    price: calcData.TYPES[0].PRICE,
                    length: '',
                    height: '',
                    size: 0,
                    summ: 0
                };
            },
            mounted() {
                console.log(this.types)
                //this.initSelects(document);
            },
            updated() {},
            watch: {},
            computed: {
                btnAccess() {
                    return parseFloat(this.size) > 0 && parseFloat(this.price) > 0;
                },
                disabledBtn() {
                    let error = false;
                    for (propCode in this.props) {
                        if (this.props[propCode].REQUIRED == 'Y') {
                            let el = document.querySelector(`[data-for="${propCode}"]`);

                            if (propCode == 'EMAIL' && !this.validateEmail(this.props[propCode].VALUE)) {
                                error = true;
                            }

                            if (this.props[propCode].VALUE == '') {
                                error = true;
                            }
                        }
                    }

                    return !error;
                }
            },
            methods: {
                changeType() {
                    for (k in this.types) {
                        if (this.type_id == this.types[k].ID) {
                            this.price = parseFloat(this.types[k].PRICE);
                        }
                    }
                },
                inputLength(e) {
                    let val = e.target.value;
                    e.target.value = val.replace(/[^0-9]/g, '');
                    
                    if (e.target.value !== '') {
                        this.length = e.target.value;
                        this.calcSize();
                    } else {
                        this.length = 0;
                        this.size = 0;
                    }
                },
                inputHeight(e) {
                    let val = e.target.value;
                    e.target.value = val.replace(/[^0-9]/g, '');
                    
                    if (e.target.value !== '') {
                        this.height = e.target.value;
                        this.calcSize();
                    } else {
                        this.height = 0;
                        this.size = 0;
                    }
                },
                calcSize() {
                    this.size = this.length * this.height;
                },
                calculate() {
                    let summ = this.size * this.price;
                    this.summ = this.priceFormat(summ);
                },
                priceFormat(price) {
                    return price.toLocaleString('ru-RU');
                },
            },
        }
        Vue.createApp(VueFeedback).mount('#calculator-vue');
    }
});