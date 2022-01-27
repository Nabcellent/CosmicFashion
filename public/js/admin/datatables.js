$.extend(true, $.fn.dataTable.defaults, {
    responsive: true,
    columnDefs: [
        { orderable: false, targets: 0 }
    ],
    order: [[1, 'desc']]
})

