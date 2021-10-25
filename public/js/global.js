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