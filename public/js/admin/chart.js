function InitWeeklyOrders(data) {
    let ECHART_LINE_TOTAL_ORDER = data.elem ?? '.weekly-purchases';
    let $echartLineTotalOrder = document.querySelector(ECHART_LINE_TOTAL_ORDER);

    if ($echartLineTotalOrder) {
        // Get options from data attribute
        let userOptions = utils.getData($echartLineTotalOrder, 'options');
        let chart = window.echarts.init($echartLineTotalOrder); // Default options

        let getDefaultOptions = function getDefaultOptions() {
            return {
                tooltip: {
                    triggerOn: 'mousemove',
                    trigger: 'axis',
                    padding: [7, 10],
                    formatter: '{b0}: {c0}',
                    backgroundColor: utils.getGrays()['100'],
                    borderColor: utils.getGrays()['300'],
                    textStyle: {
                        color: utils.getColors().dark
                    },
                    borderWidth: 1,
                    transitionDuration: 0,
                    position: function position(pos, params, dom, rect, size) {
                        return getPosition(pos, params, dom, rect, size);
                    }
                },
                xAxis: {
                    type: 'category',
                    data: data.labels,
                    boundaryGap: false,
                    splitLine: {
                        show: false
                    },
                    axisLine: {
                        show: false,
                        lineStyle: {
                            color: utils.getGrays()['300'],
                            type: 'dashed'
                        }
                    },
                    axisLabel: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    axisPointer: {
                        type: 'none'
                    }
                },
                yAxis: {
                    type: 'value',
                    splitLine: {
                        show: false
                    },
                    axisLine: {
                        show: false
                    },
                    axisLabel: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    axisPointer: {
                        show: true
                    }
                },
                series: [{
                    type: 'line',
                    lineStyle: {
                        color: utils.getColors().primary,
                        width: 3
                    },
                    itemStyle: {
                        color: utils.getGrays().white,
                        borderColor: utils.getColors().primary,
                        borderWidth: 2
                    },
                    hoverAnimation: true,
                    data: data.datasets,
                    // connectNulls: true,
                    smooth: 0.6,
                    smoothMonotone: 'x',
                    showSymbol: false,
                    symbol: 'circle',
                    symbolSize: 8,
                    areaStyle: {
                        color: {
                            type: 'linear',
                            x: 0,
                            y: 0,
                            x2: 0,
                            y2: 1,
                            colorStops: [{
                                offset: 0,
                                color: utils.rgbaColor(utils.getColors().primary, 0.25)
                            }, {
                                offset: 1,
                                color: utils.rgbaColor(utils.getColors().primary, 0)
                            }]
                        }
                    }
                }],
                grid: {
                    bottom: '2%',
                    top: '0%',
                    right: '10px',
                    left: '10px'
                }
            };
        };

        echartSetOption(chart, userOptions, getDefaultOptions);
    }
}

function InitWeeklySales(chartData) {
    let ECHART_BAR_WEEKLY_SALES = chartData.elem ?? '.weekly-sales';
    let $echartBarWeeklySales = document.querySelector(ECHART_BAR_WEEKLY_SALES);

    if ($echartBarWeeklySales) {
        // Get options from data attribute
        let userOptions = utils.getData($echartBarWeeklySales, 'options');
        let data = chartData.datasets; // Max value of data
        let chart = window.echarts.init($echartBarWeeklySales); // Default options

        let getDefaultOptions = function getDefaultOptions() {
            return {
                tooltip: {
                    trigger: 'axis',
                    padding: [7, 10],
                    formatter: '{b0} : {c0}',
                    transitionDuration: 0,
                    backgroundColor: utils.getGrays()['100'],
                    borderColor: utils.getGrays()['300'],
                    textStyle: {
                        color: utils.getColors().dark
                    },
                    borderWidth: 1,
                    position: function position(pos, params, dom, rect, size) {
                        return getPosition(pos, params, dom, rect, size);
                    }
                },
                xAxis: {
                    type: 'category',
                    data: chartData.labels,
                    boundaryGap: false,
                    axisLine: {
                        show: false
                    },
                    axisLabel: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    axisPointer: {
                        type: 'none'
                    }
                },
                yAxis: {
                    type: 'value',
                    splitLine: {
                        show: false
                    },
                    axisLine: {
                        show: false
                    },
                    axisLabel: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    axisPointer: {
                        type: 'none'
                    }
                },
                series: [{
                    type: 'bar',
                    showBackground: true,
                    backgroundStyle: {
                        borderRadius: 10
                    },
                    barWidth: '5px',
                    itemStyle: {
                        barBorderRadius: 10,
                        color: utils.getColors().primary
                    },
                    data: data,
                    z: 10,
                    emphasis: {
                        itemStyle: {
                            color: utils.getColors().primary
                        }
                    }
                }],
                grid: {
                    right: 5,
                    left: 10,
                    top: 0,
                    bottom: 0
                }
            };
        };

        echartSetOption(chart, userOptions, getDefaultOptions);
    }
}