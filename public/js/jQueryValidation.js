$('#create-product').validate({
    rules: {
        name: 'required'
    }
})

$('#create-user').validate({
    rules: {
        first_name: 'required',
        last_name: 'required',
        email: {
            required: true,
            email: true,
            remote: '/check-email',
        },
        gender: 'required',
        password: { minlength: 8 },
        password_confirmation: { equalTo: '#password' }
    },
    messages: {
        email: {
            remote: 'Email address already in use.',
        },
        gender: 'Gender is required.',
        password_confirmation: {
            equalTo: 'Passwords do not match.'
        }
    }
})