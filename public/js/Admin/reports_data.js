sorting_div();
function sorting_div(){
    $( function() {
    $( "#accordion" )
//      .accordion({
//        collapsible: true,
//        active: false,
//        header: "> div > h3"
//      })
      .sortable({
        axis: "y",
        handle: "h3",
        stop: function( event, ui ) {
            
            $.ajax({
                type: "POST",
                url: BASE_URL +'/'+ ADMIN+'/reports/sort',
                data: $("#report_sortable_form").serialize(),
            });
          // IE doesn't register the blur when sorting
          // so trigger focusout handlers to remove .ui-state-focus
          ui.item.children( "h3" ).triggerHandler( "focusout" );
 
          // Refresh accordion to handle new order
          $( this ).accordion( "refresh" );
        }
      });
      $("#accordion").disableSelection();
  } );
}


sorting_inner_div();
function sorting_inner_div(){
$(function () {
    $(".accordion1").sortable({
        items: "> p", 
        connectWith: ".connectedSortable",
        start: function (e, div) {
                $(this).attr('data-previndex', div.item.index());
        },
        update: function (event, div) {

//            $(event.currentTarget).data('parent_id');
//            console.log($('.sub_menu').data('parent_id'));
//            console.log(div);
            $(this).removeAttr('data-previndex');
            

            $.ajax({
                type: "POST",
                url: BASE_URL +'/'+ ADMIN+'/reports/subsort',
                data: $("#report_sortable_form").serialize(),
                success : function (data){
//                    report_data_list();
                }
            });
        }
    });
    $(".accordion1").disableSelection();
});
}

    function report_data_list(){
        
        var report_id = $("#report_id").val();
        
        $.ajax({
            url: BASE_URL +'/'+ ADMIN+'/reports/reportdata_list',
            type: 'POST',
            data: {_token: admin.common.get_csrf_token_value(),report_id:report_id},
            success: function (data) {

                var result = JSON.parse(data);
                if (result.status == 1) {
                    $("#list_data").html(result.content);
                    sorting_div();
                    sorting_inner_div();
                    add_sub_report();
                    edit_sub_report();
                    delete_report();
                    delete_sub_report();
                    
                }
            }
        });
    }
    
    function add_sub_report(){
        $(".add_subreport_data").on('click',function(){

            var id = $(this).data('id');
            var report_id = $(this).data('report_id');
            $("#sub_parent_id").val(id);
            $("#sub_report_id").val(report_id);
            $("#sub_report_data_modal").modal('show');
        });

    }
    
    function edit_sub_report(){
        $(".edit_subreport_data").on('click',function(){
            var id = $(this).data('id');
            
            $.ajax({
                url: BASE_URL +'/'+ ADMIN+'/reports/edit_subreportdata',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(),id:id},
                success: function (result) {

                    var data = $.parseJSON(result);
                    console.log(data.content.title_name);
                    if (data.status == 1) {
                        $("#sub_id").val(data.content.id);
                        $("#sub_parent_id").val(data.content.parent_id);
                        $("#sub_report_id").val(data.content.report_id);
                        $("#sub_title_name").val(data.content.title_name);
                        $("#sub_status").val(data.content.status);
                        $("#sub_report_data_modal").modal('show');
//                        report_data_list();
                    }
                }
            });
        });
    }
    
    function delete_report(){
        
        $(".delete_report_data").on('click',function(){
            
            var id = $(this).data('id');
            
            if(confirm("Are you sure ?")){
                if (id > 0) {
                    $.ajax({
                        url: BASE_URL +'/'+ ADMIN+'/reports/delete_reportdata',
                        type: 'POST',
                        data: {_token: admin.common.get_csrf_token_value(), id: id},
                        success: function (data) {

                            var data = $.parseJSON(data);
                            if (data.status == 1){
                                $('#msg_main').html(data.msg);
                                $('#msg_main').attr('style', 'color:green;');
                                report_data_list();
                            }
                        }
                    });
                }
            } else {
                return false;
            }
        });
    }
    
    function delete_sub_report(){
        
        $(".delete_subreport_data").on('click',function(){
            
            var id = $(this).data('id');
            
            if(confirm("Are you sure ?")){
                if (id > 0) {
                    $.ajax({
                        url: BASE_URL +'/'+ ADMIN+'/reports/delete_subreportdata',
                        type: 'POST',
                        data: {_token: admin.common.get_csrf_token_value(), id: id},
                        success: function (data) {

                            var data = $.parseJSON(data);
                            if (data.status == 1){
                                $('#msg_main').html(data.msg);
                                $('#msg_main').attr('style', 'color:green;');
                                report_data_list();
                            }
                        }
                    });
                }
            } else {
                return false;
            }
        });
    }
    
    $(document).ready(function () {
        $('#report_data_modal').on('hidden.bs.modal', function () {
            $('#frm_report_data')[0].reset();
        });
        
        $('#sub_report_data_modal').on('hidden.bs.modal', function () {
            $('#frm_subreport_data')[0].reset();
        });
        
        
        
        
        $(".sub_subrep_data").on('click',function(){
            $.validate({
                form: '#frm_subreport_data',
                onSuccess: function () {
                    $.ajax({
                        url: BASE_URL +'/'+ ADMIN+'/reports/subreportdata',
                        type: 'POST',
                        data: $("#frm_subreport_data").serialize(),
                        success: function (data) {

                            var data = $.parseJSON(data);
                            if (data.status == 1){
                                $('#msg_main').html(data.msg);
                                $('#msg_main').attr('style', 'color:green;');
                                $("#sub_report_data_modal").modal('hide');
            //                    admin.reports.load_reports();
                                report_data_list();
                            }
                        }
                    });
                },
            });
        });
        
        
        report_data_list();
        $(".sub_rep_data").on('click',function(){
            $.validate({
                form: '#frm_report_data',
                onSuccess: function () {

                    $.ajax({
                        url: BASE_URL +'/'+ ADMIN+'/reports/reportdata',
                        type: 'POST',
                        data: $("#frm_report_data").serialize(),
                        success: function (data) {
                            
                            var data = $.parseJSON(data);
                            if (data.status == 1) {
                                $('#msg_main').html(data.msg);
                                $('#msg_main').attr('style', 'color:green;');
                                $("#report_data_modal").modal('hide');
            //                    admin.reports.load_reports();
                                report_data_list();
                            }
                        }
                    });
                },
            });
        });
        
        $("body").on('click','.edit_report_data',function(){
            
            var id = $(this).data('id');
            
            $.ajax({
                url: BASE_URL +'/'+ ADMIN+'/reports/edit_reportdata',
                type: 'POST',
                data: {_token: admin.common.get_csrf_token_value(),id:id},
                success: function (data) {

                    var result = $.parseJSON(data);
                    if (result.status == 1) {
                        $("#id").val(result.content.id);
                        $("#title_name").val(result.content.title_name);
                        $("#title_description").val(result.content.title_description);
                        $("#status").val(result.content.status);
                        $("#report_data_modal").modal('show');
                    }
                }
            });
        });
    });