function oopsError(title = 'Oops...', message = 'Something went wrong') {
    return Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: message,
    })
}

function errorAlert(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: message,
    })
}

function showLoader(message = null) {
    if(message !== null) {
        $('loader button').html(message);
    }

    $('loader.wait').show(300);
}
function hideLoader() {
    $('loader.wait').hide(500);
}

$(() => {
    AOS.init({
        delay: 20,
        duration: 700,
        once: true,
        mirror: true,
        anchorPlacement: 'top-bottom',
    });
})

function initCountUp(node, endVal, data = {}) {
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