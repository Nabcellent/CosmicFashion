function InitPopularProducts(data) {
    let ECHART_MARKET_SHARE = '.echart-popular-products';
    let $echartMarketShare = document.querySelector(ECHART_MARKET_SHARE);

    if ($echartMarketShare) {
        let userOptions = utils.getData($echartMarketShare, 'options');
        let chart = window.echarts.init($echartMarketShare);

        const sum = data.reduce((a, {value}) => a + parseInt(value), 0);
        InitCountUp($('#popular-products-cu').get(0), sum)

        function getDefaultOptions() {
            return {
                color: [utils.getColors().primary, utils.getColors().info, utils.getGrays()[300]],
                tooltip: {
                    trigger: 'item',
                    padding: [7, 10],
                    backgroundColor: utils.getGrays()['100'],
                    borderColor: utils.getGrays()['300'],
                    textStyle: {
                        color: utils.getColors().dark
                    },
                    borderWidth: 1,
                    transitionDuration: 0,
                    formatter: function formatter(params) {
                        return "<strong>".concat(params.data.name, ":</strong> ").concat(params.percent, "%");
                    }
                },
                position: function position(pos, params, dom, rect, size) {
                    return getPosition(pos, params, dom, rect, size);
                },
                legend: {
                    show: false
                },
                series: [{
                    type: 'pie',
                    radius: ['100%', '87%'],
                    avoidLabelOverlap: false,
                    hoverAnimation: false,
                    itemStyle: {
                        borderWidth: 2,
                        borderColor: utils.getColor('card-bg')
                    },
                    label: {
                        normal: {
                            show: false,
                            position: 'center',
                            textStyle: {
                                fontSize: '20',
                                fontWeight: '500',
                                color: utils.getGrays()['700']
                            }
                        },
                        emphasis: {
                            show: false
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data: data
                }]
            };
        }

        echartSetOption(chart, userOptions, getDefaultOptions);

        const productColors = ['primary', 'info', '300']
        const products = data.map((product, i) => {
            return `<div class="d-flex flex-between-center mb-1">
                <div class="d-flex align-items-center" title="${product.value} purchases">
                    <span class="dot bg-${productColors[i]}"></span>
                    <a href="/admin/products/show/${product.product_id}" class="fw-semi-bold">${product.name}</a>
                </div>
                <div class="d-xxl-none">${product.value}</div>
            </div>`
        })

        $('#popular-product-names').html(products)

        AOS.refreshHard()
    }
}