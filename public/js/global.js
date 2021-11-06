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