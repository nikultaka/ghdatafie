



@extends('Frontend.new_layouts.inner_main')







@section('pageTitle',$title)



@section('pageHeadTitle',$title)







@section('content')



 <?php

 if (isset($datasets->fld_dataset_id)) {

    $url = url('/dataset/' . $datasets->fld_dataset_id);

} else {

    $url = url('/dataset');

}



if (isset($datasets->fld_dataset_title)) {

    $title = $datasets->fld_dataset_title;

} else {

    $title = '';

}



if (isset($datasets->fld_shortdescription)) {

    $short_desc = $datasets->fld_shortdescription;

} else {

    $short_desc = '';

}



if (isset($datasets->fld_infographic) && $datasets->fld_infographic != "") {

    $infographic_image_path = asset(ASSET . 'upload/dataset/image/' . $datasets->fld_infographic);

} else {

    $infographic_image_path = asset(ASSET . 'upload/' . NO_IMAGE_AVAILABLE);

}



?>

<section class="content ">



    <div class="container">



        <?php echo  (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>



    <div style="margin-top: 20px;">



<div class="row">



    @if(!empty($datasets))



    <div class="col-md-5">



        <div class="metadata-list">	







            <div class="added_dates">



                <h4>Additional Metadata</h4> 



            </div>               



            <div id="div_hide">



                <table class="table table-striped table-bordered table-condensed table-toggle-less" data-module="table-toggle-more">



                    <tbody>







                        <tr>



                            <th class="dataset-label">Metadata Created Date</th>



                            <td>{{date('Y-m-d',strtotime($datasets->fld_dataset_created_date))}}</td>



                        </tr>











                        <tr>



                            <th class="dataset-label">Metadata Updated Date</th>



                            <td><span property="dct:modified">{{date('Y-m-d',strtotime($datasets->fld_dataset_updated_date))}}</span></td>



                        </tr>











                        <tr>



                            <th class="dataset-label">Publisher</th>



                            <td><span itemprop="name" property="dct:publisher">{{$datasets->fld_dataset_publisher}}<span></span></span></td>



                        </tr>



                        <tr>



                            <th class="dataset-label">Contact Name</th>



                            <td>



                                <div itemprop="provider" itemscope="" itemtype="http://schema.org/Person">



                                    <span itemprop="name" property="dcat:contactPoint">{{$datasets->fld_dataset_maintainer}}</span>



                                </div>



                            </td>



                        </tr>







                        <tr>



                            <th class="dataset-label">Contact Email</th>



                            <td><div itemprop="provider" itemscope="" itemtype="http://schema.org/Person" typeof="foaf:Person">



                                    <span itemprop="email" property="foaf:mbox">



                                        <a href="mailto:{{$datasets->fld_dataset_maintainer_email}}">{{$datasets->fld_dataset_maintainer_email}}</a>



                                    </span></div>



                            </td>



                        </tr>



                   </tbody>



                </table>







            </div>



            <div id="show-more" style="display:none;">                    



                <table class="table table-striped table-bordered table-condensed table-toggle-less" data-module="table-toggle-more">



                    <tbody>







                        <tr>



                            <th class="dataset-label">Metadata Created Date</th>



                            <td>{{date('Y-m-d',strtotime($datasets->fld_dataset_created_date))}}</td>



                        </tr>











                        <tr>



                            <th class="dataset-label">Metadata Updated Date</th>



                            <td><span property="dct:modified">{{date('Y-m-d',strtotime($datasets->fld_dataset_updated_date))}}</span></td>



                        </tr>











                        <tr itemprop="publisher" itemscope="" itemtype="http://schema.org/Organization">



                            <th class="dataset-label">Publisher</th>



                            <td><span itemprop="name" property="dct:publisher">{{$datasets->fld_dataset_publisher}}<span></span></span></td>



                        </tr>







                        <tr>



                            <th class="dataset-label">Contact Name</th>



                            <td>



                                <div itemprop="provider" itemscope="" itemtype="http://schema.org/Person">



                                    <span itemprop="name" property="dcat:contactPoint">{{$datasets->fld_dataset_maintainer}}</span>



                                </div>



                            </td>



                        </tr>







                        <tr>



                            <th class="dataset-label">Contact Email</th>



                            <td><div itemprop="provider" itemscope="" itemtype="http://schema.org/Person" typeof="foaf:Person">



                                    <span itemprop="email" property="foaf:mbox">



                                        <a href="mailto:{{$datasets->fld_dataset_maintainer_email}}">{{$datasets->fld_dataset_maintainer_email}}</a>



                                    </span></div>



                            </td>



                        </tr>







                        <tr>



                            <td><a href="javascript:void(0)" onclick="Showhide()">Hide</a></td>



                            <td></td>



                        </tr>	







                    </tbody>



                </table>



            </div>  







        </div>



        <div class="attachments resources open" id="">



            <table class="table table-striped table-bordered table-condensed table-toggle-less">



                <tbody>



                    <tr>



                        <td colspan="2">



                            <div class="added_dates">



                                <h4>Downloads</h4>



                                <div class="metadata_div">



                                </div>  



                            </div>



                        </td>



                    </tr>	



                    <tr>



                        <td>Dataset</td>



                        <td><a href="{{url(ASSET.'upload/dataset/document/'.$datasets->fld_dataset_image)}}" target="_blank" download>Download Data</a></td>



                    </tr>

                    

                    <tr>



                        <td>Infographic</td>



                        <td>

                            <a href="" data-toggle="modal" data-target="#infographic_image_modal">Open Image</a>

                        </td>



                    </tr>



                </tbody>



            </table>











        </div>



        <table class="table table-striped table-bordered table-condensed table-toggle-less">



            <tbody>



                <tr>



                    <td><a href="javascript:void(0);" class="bijlagen">Attachments</a></td>



                    <td><a href="javascript:void(0);" class="metadata">Metadata</a></td>



                </tr>



            </tbody>



        </table>



    </div>



    <div class="col-md-7 description_text">



        <h3 class="title-txt">{{ $datasets->fld_dataset_title }}</h3>



        <p class="data_text dataset_text">{!! $datasets->fld_dataset_desc !!}</p>







    </div>



    @else



    <center>No data Exist.</center>



    @endif



    



</div>



</div>



</div>

<div id="infographic_image_modal" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">



        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title"><?= $datasets->fld_dataset_title ?></h4>

            </div>

            <div class="modal-body">

                <div class="text-center">

                    <img src="<?= $infographic_image_path; ?>" style="width: 80%;"/>    

                </div>

                

            </div>

            <div class="modal-footer" style="padding: 20px;">

<!--                    <div class="team-social">

                    <ul>

                        <li><a href="<?= $infographic_image_path ?>" class="socialMediaButton" title="Save Image" download><i class="fa fa-download"></i></a></li>

                        <li><a href="https://facebook.com/sharer/sharer.php?u=<?= $url; ?>&title=<?= $title; ?>&summary=<?= $short_desc; ?>" title="Share On Facebook"><i class="fa fa-facebook"></i></a></li>

                        <li><a href="https://twitter.com/share?url=<?= $url; ?>&text=<?= $title; ?>" title="Share On Twitter"><i class="fa fa-twitter"></i></a></li>

                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $url; ?>&title=<?= $title; ?>&summary=<?= $short_desc; ?>" title="Share On LinkedIn"><i class="fa fa-linkedin"></i></a></li>

                        <li><a href="mailto:AAA@gmail.com?cc=CC@gmail.com&bcc=BCC@gmail.com&subject=<?= $title; ?>&body=<?= $short_desc;?> <br><br> For more details go to {{url('/')}}" title="Share On Flickr"><i class="fa fa-flickr"></i></a></li>

                        <li><a href="https://wa.me/?text=<?= $title; ?> <?= $url; ?>" class="mobile-share" title="Share On WhatsApp"><i class="fa fa-whatsapp"></i></a></li>

                    </ul>

                </div>-->

                <!-- https://wa.me/?text=<?= $title; ?> <?= $url; ?> WHATSAPP SHARE HREF-->

                <div class="col-sm-6">

                    <span style="font-size: 11px;">Sources <a target="_blank" href="http://ghdatafie.com" style="font-size: 11px;"><?= USER_NAME; ?></a></span>

                </div>

                <div class="col-sm-6">

                    <ul class="social-links">

                        <li><a target="_blank" href="<?= $infographic_image_path ?>" class="socialMediaButton" title="Save Image" download><i class="fa fa-download"></i></a></li>

                        <li><a target="_blank" href="https://facebook.com/sharer/sharer.php?u=<?= $url; ?>&title=<?= $title; ?>&summary=<?= $short_desc; ?>" class="socialMediaButton" title="Share On Facebook"><i class="fa fa-facebook"></i></a></li>

                        <li><a target="_blank" href="https://twitter.com/share?url=<?= $url; ?>&text=<?= $title; ?>" class="socialMediaButton" title="Share On Twitter"><i class="fa fa-twitter"></i></a></li>

                        <li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $url; ?>&title=<?= $title; ?>&summary=<?= $short_desc; ?>" class="socialMediaButton" title="Share On LinkedIn"><i class="fa fa-linkedin"></i></a></li>

                        <li><a target="_blank" href="mailto:AAA@gmail.com?cc=CC@gmail.com&bcc=BCC@gmail.com&subject=<?= $title; ?>&body=<?= $short_desc;?> <br><br> For more details go to {{url('/')}}" class="socialMediaButton" title="Mail"><i class="fa fa-envelope"></i></a></li>

                        <li><a target="_blank" href="whatsapp://send?text=<?= $url; ?>" class="socialMediaButton mobile-share" title="Share On WhatsApp"><i class="fa fa-whatsapp"></i></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

</section>



@endsection



@section('bottomscript')



<script src="{!! asset(ASSET.'js/frontend/dataset.js')!!}"></script>



<script type="text/javascript">



                                $(document).ready(function () {



                                    



                                    // frontend.dataset.initialize();



                                });



</script>



<script>



$(document).ready(function(){



  $(".bijlagen").click(function(){



	 



	  //$(this).toggleClass("open");



	  $('.resources').toggleClass("open");



  });



  



  $(".metadata").click(function(){



	  



	  //$(this).toggleClass("open");



	  $('.metadata-list').toggleClass("open");



  });



  



  $('td.tip').hover(function(){



	  $('.infoclass').css("display","block");



	  



  },



  function(){



	  $('.infoclass').css("display","none");



  }



  



  



  );



  



});



</script>



<style>



.iconClass{



	width : 20px;



	height:20px;



}	



.nav > li > a {	



	padding: 3px 15px;



} 



.nav > li > a:hover, .nav > li > a:focus {	



	background-color: unset;



} 



.open , .infoclass{



display:none;	



}







a.tip {



   



    text-decoration: underline;



	cursor:pointer;



}







a.tip:hover {   



    position: relative



}



a.tip span {



    display: none



}



a.tip:hover span {



    border: #c0c0c0 1px dotted;



    padding: 5px 20px 5px 5px;



    display: block;



    z-index: 100;



    background: url(../images/status-info.png) #f0f0f0 no-repeat 100% 5%;



    left: 0px;



    margin: 10px;



    width: 250px;



    position: absolute;



    top: 10px;



    text-decoration: none



}







td.tip:hover {



    



    position: relative



}



.infoclass{	



	position: absolute;



	left: 52%;



	bottom: 25%;



}



.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {



        font-size: 0.9em;



        color: #999;



        border-top: none !important;



    }



    h3.title-txt {



        text-align: left;



        text-transform: capitalize;



        font-size: 31px;



        color: #000;



        margin-bottom: 10px;



        font-family: Lato;



    }



    .data_text {



        margin-bottom: 30px;



        margin-top: 15px;



    }



    .description_text p {



        font-family: Lato;



        color: #333;



        font-size: 18px;



        line-height: 28px;



    }







</style>



@endsection