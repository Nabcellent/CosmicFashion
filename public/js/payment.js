function payWithMpesa(amount, formData) {
    Swal.fire({
        input: 'tel',
        inputLabel: 'Phone number',
        inputPlaceholder: 'Enter the phone number',
        showLoaderOnConfirm: true,
        preConfirm: phoneNumber => {
            if (!phoneNumber.match(/^((0)?((?:7(?:[01249][0-9]|5[789]|6[89])|1[1][0-5])[0-9]{6})|(?:254|\+254|0)?((?:7(?:[01249][0-9]|5[789]|6[89])|1[1][0-5])[0-9]{6}))$/)) {
                Swal.showValidationMessage('Invalid phone number.')
            } else {
                formData.phone = phoneNumber;
                formData.amount = amount;

                return $.ajax({
                    data: formData,
                    method: 'POST',
                    url: `/admin/payments/stk_requests`,
                    dataType: 'json',
                    beforeSend: () => showLoader('Processing payment...'),
                    statusCode: {
                        200: response => {
                            if (response.status) {
                                return response.content;
                            } else {
                                $('loader').addClass('d-none');
                                errorAlert(response.message)
                            }
                        },
                    },
                    error: () => {
                        oopsError();
                        hideLoader();
                    }
                })
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then(result => {
        if (result.isConfirmed) {
            new STK(result.value.requestId).checkStkStatus()
        }
    })
}

class STK {
    constructor(checkout_request_id) {
        this.CHECKOUT_REQUEST_ID = checkout_request_id;
    }

    checkStkStatus() {
        Swal.fire({
            icon: "info",
            title: "Info",
            text: "Your request has been received and is being processed. PLEASE ENTER MPESA PIN when prompted, then click OK.",
            showLoaderOnConfirm: true,
            showCancelButton: true,
            preConfirm: () => {
                return $.ajax({
                    url: '/admin/payments/stk_status/' + this.CHECKOUT_REQUEST_ID,
                    type: 'GET',
                    dataType: 'json',
                    success: response => {
                        return response;
                    }
                })
            },
            allowOutsideClick: () => !Swal.isLoading(),
        }).then((result) => {
            if (result.isDismissed && result.dismiss === 'cancel') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'info',
                    title: 'Payment Cancelled',
                    text: 'RewAd',
                    timer: 3000,
                    showConfirmButton: false
                }).then(() => hideLoader())
            } else if (result.isConfirmed) {
                this.stkStatusResponse(result.value)
            } else {
                this.fetchStkStatus().then(result => this.stkStatusResponse(result));
            }
        })
    }

    async fetchStkStatus() {
        return await fetch('/admin/payments/callbacks/stk_status/' + this.CHECKOUT_REQUEST_ID)
            .then(response => response.json())
            .then(data => {
                return data;
            });
    }

    stkStatusResponse(data) {
        if (data.status === 'processing') {
            this.checkStkStatus(this.CHECKOUT_REQUEST_ID)
        } else if (data.status === 'processed') {
            Swal.fire({
                position: 'top-end',
                icon: data.icon,
                title: data.message,
                text: 'RewAd',
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                if (data.url !== "") {
                    window.location = data.url
                }
            });
        } else if (data.status === 'failed') {
            Swal.fire({
                icon: 'error',
                title: 'Sorry...',
                text: data.message,
                willClose: hideLoader,
                footer: '<a href>Report this issue?</a>'
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                willClose: hideLoader,
                footer: '<a href>Report this issue?</a>'
            });
        }
    }
}


/**---------------------------------------------------------------------------------------------------
 *                          PAYPAL PAYMENT
 * ---------------------------------------------------------------------------------------------------*/
if ($('#paypal_payment_button').length) {
    const formData = {}

    $('#checkout-form').serializeArray().map(input => {
        formData[input.name] = input.value;
    });

    paypal.Buttons({
        style: {
            color: 'blue',
            layout: 'vertical',
            shape: 'pill',
            label: 'buynow',
        },
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        currency_code: "USD",
                        value: 1
                        //value: parseFloat(AMOUNT_USD)
                    },
                    payee: {
                        email_address: 'sb-kg0wb2320059@business.example.com'
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then((details) => {
                formData.payload = details
                formData.status = 'Paid'

                $.ajax({
                    data: formData,
                    type: 'POST',
                    url: '/admin/payments/paypal-callback',
                    dataType: 'json',
                    beforeSend: () => showLoader('Processing payment...'),
                    statusCode: {
                        200: (response) => {
                            if (response.status) {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Payment Successful!',
                                    text: 'RewAd',
                                    timer: 3000,
                                    showConfirmButton: false
                                }).then(() => {
                                    if (data.url !== "") window.location = response.url;
                                });
                            } else {
                                errorAlert(response.message)
                            }
                        },
                    },
                    error: () => {
                        oopsError()
                    }
                });
            });
        },
        onCancel: (data) => {
            data.status = 'Cancelled';
            formData.payload = data;

            $.ajax({
                data: formData,
                type: 'POST',
                url: '/admin/payments/paypal-callback',
                dataType: 'json',
            })

            Swal.fire({
                title: 'Payment Cancelled.',
                position: 'top-end',
                icon: 'info',
                text: 'RewAd',
                timer: 3000,
                showConfirmButton: false
            })
        }
    }).render('#paypal_payment_button');
}