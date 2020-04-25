admin.order = {
    initialize: function ()
    {
        var this_class = this;

        admin.order.load_orders();

    },
    load_orders: function () {

        var table = jQuery('.order-table').DataTable({
            paging: true,
            pageLength: 10,
            bDestroy: true,
            responsive: true,
            processing: true,
            serverSide: true,
            "order": [],
            ajax: {
                url: BASE_URL + '/' + ADMIN + '/order/gettable',
                type: 'POST',
                data: admin.common.get_csrf_toke_object_data()
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'title', name: 'title'},
                {data: 'charge_id', name: 'charge_id'},
                {data: 'amount', name: 'amount'},
                {data: 'created_at', name: 'created_at'},
//                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });

    },
};