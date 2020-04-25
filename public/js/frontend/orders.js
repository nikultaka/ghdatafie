frontend.orders = {
    initialize: function ()
    {
        
        frontend.orders.load_orders();
        
        frontend.orders.load_booking();
        
    },
    load_orders: function () {



        var table = jQuery('.orders-table').DataTable({

            paging: true,

            pageLength: 10,

            bDestroy: true,

            responsive: true,

            processing: true,

            serverSide: true,

            "order": [],

            ajax: {

                url: BASE_URL + '/user/orders/getdata',

                type: "POST",

                data: frontend.common.get_csrf_toke_object_data()

            },

            columns: [

//                        { data: 'id', name: 'id'},

//                {data: 'name', name: 'name'},

                {data: 'title', name: 'title'},

                {data: 'charge_id', name: 'charge_id'},

                {data: 'amount', name: 'amount'},

                {data: 'created_at', name: 'created_at'},

                {data: 'action', name: 'action', orderable: false, searchable: false},

            ],

        });



    },
    load_booking: function () {



        var table = jQuery('.booking-table').DataTable({

            paging: true,

            pageLength: 10,

            bDestroy: true,

            responsive: true,

            processing: true,

            serverSide: true,

            "order": [],

            ajax: {

                url: BASE_URL + '/user/booking/getdata',

                type: "POST",

                data: frontend.common.get_csrf_toke_object_data()

            },

            columns: [

//                        { data: 'id', name: 'id'},

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