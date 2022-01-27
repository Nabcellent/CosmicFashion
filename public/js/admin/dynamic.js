/*===========================================================================================
*                           DELETE RESOURCE
* ===========================================================================================*/
$(() => {
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    $(document).on('click', '.delete-resource', function() {
        const id = $(this).data('id');
        const model = $(this).data('model');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return $.ajax({
                    data: {id, model},
                    method: 'DELETE',
                    url: `/delete-resource`,
                    statusCode: { 200: (response) => { return response; } },
                    error: () => { this.allowOutsideClick = true; return 'error'; }
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                if(JSON.parse(result.value).success) {
                    Swal.fire(
                        'Deleted!',
                        `Your ${model} has been deleted.`,
                        'success'
                    ).then(() => {location.reload();})
                } else {
                    oopsError();
                }
            }
        })
    });
})