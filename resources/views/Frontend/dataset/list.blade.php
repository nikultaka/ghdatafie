@extends('Frontend.new_layouts.inner_main')

@section('pageTitle',$title)
@section('pageHeadTitle',$title)

@section('content')
<style>
    .dataset_list{
        padding-top: 25px;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
    }
    .date_gray{
        color: #8d8d8d;
        padding: 0px 10px;
        display: block;
        font-size: 13px;
        background: #f5f5f5;
        margin: 5px 0 5px 0;
        list-style: none;
    }
    .show_more{
        display: block;
        text-align: center;
        color: #128400;
    }
    .short_desc ,.short_desc a{
        font-size: 18px;
        padding: 5px;
        margin-bottom: -10px;
    }
    .list_contain{
        margin-bottom: 25px;
    }
    .ptitle{
        color: green;
        text-decoration: underline !important;
        font-size: 20px;
    }
</style>
<section class="content ">
    <div class="container">
        <?php echo  (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>
        <div class="dataset_list">
        <div id="dataset_container">
             @include('Frontend.dataset.load')
        </div>
        </div>
    </div>
</section>

@endsection
@section('bottomscript')
<script src="{!! asset(ASSET.'js/frontend/dataset.js')!!}"></script>
<script type="text/javascript">

	$(window).on('hashchange', function() {
            if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    } else {
                        getData(page);
                    }
            }
        });

	$(document).ready(function() {
	     $(document).on('click', '.pagination a',function(event){
	        event.preventDefault();
	        $('li').removeClass('active');
	        $(this).parent('li').addClass('active');
	        var myurl = $(this).attr('href');
	        var page=$(this).attr('href').split('page=')[1];
	        getData(page);
	    });
	});

	function getData(page){
	        $.ajax({
	            url: '?page=' + page,
	            type: "get",
	            datatype: "html"
	        })
	        .done(function(data){
	            $("#dataset_container").empty().html(data);
//	            location.hash = page;
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError){
	              alert('No response from server');
	        });
	}

</script>

@endsection