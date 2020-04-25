

@extends('Frontend.new_layouts.inner_main')



@section('pageTitle',$title)

@section('pageHeadTitle',$title)



@section('facebookShare')

<?php
$setting = new \App\Helper\CommonHelper;

if (isset($book_detail->r_id)) {

    $url = url('/reports/book/' . $book_detail->r_id);
} else {

    $url = url('/reports/book/');
}



if (isset($book_detail->title)) {

    $title = $book_detail->title;
} else {

    $title = '';
}



if (isset($book_detail->description)) {

    $description = $book_detail->description;
} else {

    $description = '';
}



if (isset($book_detail->infographic_image) && $book_detail->infographic_image != "") {

    $infographic_image_path = asset(ASSET . 'upload/reports/infographic/' . $book_detail->infographic_image);
} else {

    $infographic_image_path = asset(ASSET . 'upload/' . NO_IMAGE_AVAILABLE);
}
?>

<meta property="og:url"           content="{{ $url }}" />

<meta property="og:type"          content="{{ url('/')}}" />

<meta property="og:title"         content="{{ $title }}" />

<meta property="og:description"   content="{{ $description }}" />

<meta property="og:image"         content="{{ $infographic_image_path}}" />    

@endsection

@section('content')

@if(!empty($book_detail))

<div id="fb-root"></div>

<script>
    (function(d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance:textfield;
    }
</style>

<!--<div class="fb-share-button" 

     data-layout="button_count">

</div>-->
<section class="content report-details">

    <div class="container">

        <?php echo (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>

        <div class="section-title">

            <h4>{{$book_detail->title}}</h4>

        </div>

        <div class="row">

            <div class="col-sm-8">

                <div class="row">

                    <div class="col-sm-4 text-center">

                        @if(!empty($book_detail->book_icon))

                        <img src="{{asset(ASSET.'upload/reports/books_icon/'.$book_detail->book_icon)}}" alt=""/>

                        @else

                        <img src="{{asset(ASSET.'new_frontend/img/details.png')}}" alt=""/>

                        @endif

                    </div>

                    <div class="col-sm-8">

                        <ul class="checklist">

                            <li><i class="fa fa-check"></i> <?= $description; ?></li>

                            <!--<li><i class="fa fa-check"></i>Editorially prepared</li>-->

                            <li><i class="fa fa-check"></i>Download as <img src="{{asset(ASSET.'new_frontend/img/pdf_icon.png')}}" alt="" /> PDF / <img src="{{asset(ASSET.'new_frontend/img/ppt_icon.png')}}" alt="" /> PPT</li>

                        </ul>

                    </div>

                </div>

                <div class="pt-3 pb-3">

                    <h4>Ghdatafie {{$book_detail->name}} on {{$book_detail->title}}</h4>

                    <p>

                        {!! html_entity_decode($book_detail->description) !!}

                    </p>

                </div>

                <h3>Table of contents 

                    <div class="btn-group pull-right">

                        <?php
//                        if (isset($book_detail->report_doc) && $book_detail->report_doc != "") {
//                            $doc = explode('.', $book_detail->report_doc);
//
//                            if (in_array("pdf", $doc)) {
                        ?>



                        <!--                                <a href="{{url('reports/download',$book_detail->r_id)}}"  class="btn btn-light border">

                                                            <img src="{{asset(ASSET.'new_frontend/img/pdf_icon.png')}}" alt="" />

                                                        </a> -->



                        <?php // } else if (in_array("ppt", $doc) || in_array("pptx", $doc)) {   ?>

                        <!--                                <a href="{{url('reports/download',$book_detail->r_id)}}" class="btn btn-light border">

                                                            <img src="{{asset(ASSET.'new_frontend/img/ppt_icon.png')}}" alt="" />

                                                        </a>-->

                        <?php
//                            }
//                        }
                        ?>
                    </div></h3>

                <div class="table-of-content">

                    <div class="accordion" id="accordionExample">

                        <?php
                        if (!empty($bookChapterDetails)) {

                            $num = 1;

                            foreach ($bookChapterDetails as $key => $value) {
                                ?>



                                <div class="card">

                                    <div class="card-header" <?php
                                    if ($num == 1) {

                                        echo 'id="headingOne"';
                                    }
                                    ?>>

                                        <h2 class="mb-0"> 

                                            <a class="btn btn-link w-100 text-left collapsed"  data-toggle="collapse" data-target="#{{$num}}" aria-expanded="true" aria-controls="{{$num}}"> 

                                                {{$num}}. {{$value['title_name']}}

                                                <i class="fa fa-arrow-down rotate-icon pull-right"></i> 

                                            </a> 

                                        </h2>

                                    </div>

                                    <div id="{{$num}}" class="collapse <?php
                                    if ($num == 1) {

                                        echo "show";
                                    }
                                    ?>" aria-labelledby="headingOne" data-parent="#{{$num}}">

                                        <div class="card-body">

                                            <ul class="checklist">

                                                <?php
                                                if (!empty($value['sub_chapter'])) {

                                                    foreach ($value['sub_chapter'] as $k => $v) {
                                                        ?>

                                                        <li><i class="fa fa-check"></i> {{$v->title_name}} </li>

                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>

                                        </div>

                                    </div>

                                </div>

                                <?php
                                $num++;
                            }
                        }
                        ?>

                    </div>



                </div>

                <div class="row pt-3 pb-3">

                    <div class="col-sm-8">

                        <ul class="study-info-list">

                            <li class="language"><b>Language: </b><span class="">   &nbsp&nbsp<img src="{{asset(ASSET.'new_frontend/img/eng_icon.png')}}"></span>&nbsp&nbsp{{$book_detail->language}} </li>

                            <li class="releaseDate"><b>Released: </b> 2019 </li>

                        </ul>

                    </div>

                    <div class="col-sm-4 text-right">

                        <!--<a href="" class="btn btn-primary"><i class="fa fa-flag"></i> Reports</a>-->

                    </div>

                </div>

            </div>

            <div class="col-sm-4">

                <div class="detail-right-sidebar">

                    <div class="white-box " style="border: 1px solid lightgray;">

                        <div class="list-title">

                            <h4>{{$book_detail->name}} Details</h4>

                        </div>

                        <p>{{$book_detail->title}}</p>

                        <ul>

                            <li><span class="label">Pages:</span> {{$book_detail->pages}}</li>

                            <!--<li><span class="label">Pages:</span> <img src="{{asset(ASSET.'new_frontend/img/pdf_icon.png')}}" alt=""> PDF / <img src="{{asset(ASSET.'new_frontend/img/ppt_icon.png')}}" alt=""> PPT</li>-->

                        </ul>

                        <p><strong>Access after purchase:</strong></p>

                        <p>Download from this page</p>

                        <hr>

                        <div class="row">

                            <div class="col-xs-5 col-sm-5">

                                <label>Price</label>

                            </div>

                            <div class="col-xs-7 col-sm-7 text-right">

                                <div class="price-amount">${{$book_detail->price}}</div>

                            </div>

                        </div>

                        <hr>

                        <div class="row">

                            <!--<div class="col-sm-12  text-center pt-3 pb-3"> <a href="{{url('order',FREE_ACOOUNT_ID)}}" class="btn btn-success">Order {{$book_detail->name}}</a> </div>-->

                            <!--                            <div class="col-sm-12  text-center pt-3 pb-3"> <a href="{{url('download/report/'.$book_detail->r_id)}}" class="btn btn-success">Download {{$book_detail->name}}</a> </div>-->

                            <?php
                            if (isset(Auth::user()->id) && Auth::user()->id != "") {

                                if ($isDownload == 0) {
                                    ?>
                                    <!--<div class="col-sm-6  text-center pt-3 pb-3"> <button class="btn btn-success" onclick="pay({{$book_detail->price}})">Download</button> </div>-->
                                    <div class="col-sm-6  text-center pt-3 pb-3"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#purchase">Download</button></div>
                                <?php } else { ?>
                                    <div class="col-sm-6  text-center pt-3 pb-3"> <a href="{{url('download/report/'.$book_detail->r_id)}}" class="btn btn-success">Download</a> </div>
                                    <?php
                                }
                            } else {
                                ?>
                                <div class="col-sm-6  text-center pt-3 pb-3"> <a href="{{url('/login')}}" class="btn btn-success" onclick="pay({{$book_detail->price}})">Download</a> </div>
                            <?php } ?>
                            <div class="col-sm-6  text-center pt-3 pb-3">

                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#socialModal">Summary</button>

                            </div>

                            <!--                            <div class="col-sm-6  text-center pt-3 pb-3">
                            
                                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#purchase">Purchase</button>
                            
                                                        </div>-->



                        </div>

                    </div>

                    <div class="white-box mt-5" style="border: 1px solid lightgray;">
                        <p><strong>Hint</strong></p>
                        <p>Order a <strong><a href="">Premium Account</a></strong> now and you receive a free dossier of your choice.</p>
                        <p class="text-right"> <a href="" class="btn-link">Order Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>

        .team-social {

            text-align: center;

            position: absolute;

            width: 100%;

            /*bottom: 20px;*/

            /*padding: 10px 0;*/

            transition: all 0.3s;

            -webkit-transition: all 0.3s;

        }

        .team-social ul {

            list-style: none;

            margin: 0;

            padding: 0;

        }

        .team-social li {

            display: inline-block;

            margin-left: 15px;

        }

        .team-social li a {

            display: block;

            width: 25px;

            height: 33px;

            line-height: 33px;

            text-decoration: none;

            transition: all 0.3s;

            -webkit-transition: all 0.3s;

        }

        @media screen and (min-width: 600px) {

            .mobile-share {

                visibility: hidden;

                clear: both;

                display: none;

            }

        }

    </style>

    <div id="socialModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?= $book_detail->title ?></h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="<?= $infographic_image_path; ?>" style="width: 80%;"/>    
                    </div>
                </div>
                <div class="modal-footer" style="padding: 20px;">
                    <!--                    <div class="team-social">
                    
                                            <ul>
                    
                                                <li><a href="https://facebook.com/sharer/sharer.php?u=<?= $url; ?>&title=<?= $title; ?>&summary=<?= $description; ?>" title="Share On Facebook"><i class="fa fa-facebook"></i></a></li>
                    
                                                <li><a href="https://twitter.com/share?url=<?= $url; ?>&text=<?= $title; ?>" title="Share On Twitter"><i class="fa fa-twitter"></i></a></li>
                    
                                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $url; ?>&title=<?= $title; ?>&summary=<?= $description; ?>" title="Share On LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                    
                                                <li><a href="mailto:AAA@gmail.com?cc=CC@gmail.com&bcc=BCC@gmail.com&subject=<?= $title; ?>&body=<?= $description; ?> <br><br> For more details go to {{url('/')}}" title="Share On Flickr"><i class="fa fa-flickr"></i></a></li>
                    
                                                <li><a href="https://wa.me/?text=<?= $title; ?> <?= $url; ?>" class="mobile-share" title="Share On WhatsApp"><i class="fa fa-whatsapp"></i></a></li>
                    
                                            </ul>
                    
                                        </div>-->

                    <!-- https://wa.me/?text=<?= $title; ?> <?= $url; ?> WHATSAPP SHARE HREF-->
                    <div class="col-sm-6">
                        <span style="font-size: 11px;" >Sources <a target="_blank" href="http://ghdatafie.com" style="font-size: 11px;"><?= USER_NAME; ?></a></span>
                    </div>
                    <div class="col-sm-6">
                        <ul class="social-links">
                            <li><a target="_blank" href="https://facebook.com/sharer/sharer.php?u=<?= $url; ?>&title=<?= $title; ?>&summary=<?= $description; ?>" class="socialMediaButton" title="Share On Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="https://twitter.com/share?url=<?= $url; ?>&text=<?= $title; ?>" class="socialMediaButton" title="Share On Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $url; ?>&title=<?= $title; ?>&summary=<?= $description; ?>" class="socialMediaButton" title="Share On LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                            <li><a target="_blank" href="mailto:AAA@gmail.com?cc=CC@gmail.com&bcc=BCC@gmail.com&subject=<?= $title; ?>&body=<?= $description; ?> <br><br> For more details go to {{url('/')}}" class="socialMediaButton" title="Mail"><i class="fa fa-envelope"></i></a></li>
                            <li><a target="_blank" href="whatsapp://send?text=<?= $url; ?>" class="socialMediaButton mobile-share" title="Share On WhatsApp"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="purchase" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Purchase Book</h4>
                </div>
                <form class="form-payment" role="form" method="post" id="frm_payment" name="frm_payment" action="" onsubmit="return false;"> 
                    {{ csrf_field() }}
                    <div class="col-sm-12">
                        <span class="payment-errors" style="color: red;"></span>
                    </div>
                    <input type="hidden" name="amount" id="amount" value="{{$book_detail->price}}">
                    <input type="hidden" name="report_id" id="report_id" value="{{isset($book_detail->r_id) ? $book_detail->r_id : ""}}">
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <div class="row form-group">
                                    <label for="email" class="col-sm-12">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" data-stripe="email">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="card-number" class="col-sm-12">Card Details</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="card-number" name="card-number" placeholder="Card Number" size="20" data-stripe="number">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="card-month" class="col-sm-12">Expire Date</label>
                                    <div class="col-sm-12" style="display: flex;">
                                        <input type="text" class="form-control" id="card-month" name="card-month" placeholder="MM" size="2" data-stripe="exp_month">
                                        &nbsp;<h2>&#47;</h2>&nbsp;
                                        <input type="text" class="form-control" id="card-year" name="card-year" placeholder="YY" size="2" data-stripe="exp_year">
                                    </div>
                                </div>
                                <div class="row form-group">    
                                    <label for="card-cvv" class="col-sm-12">CVV Number</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="card-cvv" name="card-cvv" placeholder="CVV" size="4" data-stripe="cvc">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding: 20px;">
                        <input type="submit" class="btn btn-primary submit" value="Submit Payment">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endif

@endsection

@section('bottomscript')

<!--<script src="https://checkout.stripe.com/checkout.js"></script>-->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    var a = '<?php echo $setting->get_setting_details('stripe_key', 'fild_value'); ?>';
    Stripe.setPublishableKey(a);
    $(function() {

    var $form = $('#frm_payment');
            $form.submit(function(event) {
            if ($("#email").val() == ""){
            $("#email").css('border', '1px solid red');
                    return false;
            }
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#email").val()))){
            $("#email").css('border', '1px solid red');
                    return false;
            }
            $("#email").css('border', '1px solid #ced4da');
                    // Disable the submit button to prevent repeated clicks:
                    $form.find('.submit').prop('disabled', true);
                    // Request a token from Stripe:
                    Stripe.card.createToken($form, stripeResponseHandler);
                    // Prevent the form from being submitted:
                    return false;
            });
    });
    function stripeResponseHandler(status, response) {
    // Grab the form:
    var $form = $('#frm_payment');
            if (response.error) { // Problem!

    // Show the errors on the form:
    $form.find('.payment-errors').text(response.error.message);
            $form.find('.submit').prop('disabled', false); // Re-enable submission

    } else { // Token was created!

    // Get the token ID:
    var token = response.id;
            // Insert the token ID into the form so it gets submitted to the server:
            $form.append($('<input type="hidden" name="stripeToken">').val(token));
            if ($("#email").val() == ""){
    $("#email").addClass('has-error');
    } else {
    $("#loader").show();
            $.ajax({

            url: BASE_URL + '/dopay',
                    method: 'post',
                    data: $form.serialize(),
                    success: function (response) {
                    window.location.reload();
                    },
                    error: function (error) {
                    window.location.reload();
                    }

            })
    }
    }
    };
</script>
<!--<script type="text/javascript">

    function pay(amount) {

    $("#loader").show();

            var handler = StripeCheckout.configure({

            key: '<?php echo $setting->get_setting_details('stripe_key', 'fild_value'); ?>', // your publisher key id

                    locale: 'auto',

                    allowRememberMe: false,

                    token: function (token) {

                    $("#loader").show();

                            // You can access the token ID with `token.id`.

                            // Get the token ID to your server-side code for use.

                            //                console.log('Token Created!!');

                            //                console.log(token)

                            $('#token_response').html(JSON.stringify(token));

                            $.ajax({

                            url: BASE_URL + '/dopay',

                                    method: 'post',

                                    data: {_token: frontend.common.get_csrf_token_value(), stripeToken: token.id, amount: amount, report_id : <?php echo isset($book_detail->r_id) ? $book_detail->r_id : ""; ?>},

                                    success: function (response) {



                                    window.location.reload();

                                    },

                                    error: function (error) {



                                    window.location.reload();

                                    }

                            })

                    }

            });

            handler.open({

            name: '<?php echo isset($book_detail->title) ? $book_detail->title : "" ?>',

//                                                            description: '10 widgets',

                    amount: amount * 100

            });

            var myVar = setInterval(function(){

            if ($('.stripe_checkout_app').is(":visible")){

            $("#loader").hide();

                    clearInterval(myVar);

            }

            }, 1000)

    }

</script>-->



@endsection



