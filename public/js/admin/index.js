function InitCountUp(node, endVal, data = {}) {
    if(endVal > 999) {
        data.suffix = 'K'
        endVal /= 1000
    } else if(endVal > 999999) {
        data.suffix = 'M'
        endVal /= 1000000
    }

    let countUp = new window.countUp.CountUp(node, endVal, {
        ...data,
        duration: 7
    });

    !countUp.error ? countUp.start() : console.error(countUp.error);
}