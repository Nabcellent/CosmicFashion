$.extend(true, $.fn.dataTable.defaults, {
    // ordering:  false,
    responsive: true,
    columnDefs: [
        { orderable: false, targets: 0 }
    ],
    order: [[1, 'asc']]
})

