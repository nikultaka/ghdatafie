@extends('Frontend.new_layouts.inner_main')

@section('pageTitle','Data')
@section('pageHeadTitle','Data')

@section('content')

<section class="content ">
  <div class="container">
      <?php echo  (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>
    <div class="section-title text-center">
      <h2> Data</h2>
      <p>Search Over {{isset($count_brands) ? $count_brands : ''}} Datasets </p>
          <hr>
    </div>
      
        <div id="home_container">
        @include('Frontend.home.load')
        </div>
  </div>
  
  
  
</section>

@endsection
@section('bottomscript')
<script src="{!! asset(ASSET.'js/frontend/home.js')!!}"></script>
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
	            $("#home_container").empty().html(data);
//	            location.hash = page;
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError){
	              alert('No response from server');
	        });
	}

</script>
<script type="text/javascript">
    $(document).ready(function () {
        frontend.home.initialize();
    });
</script>
@endsection