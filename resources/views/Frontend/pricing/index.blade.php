@extends('Frontend.new_layouts.inner_main')

@section('pageTitle',$title)
@section('pageHeadTitle',$title)

@section('content')
<link href="{{asset(ASSET.'frontend/css/custom.css')}}" rel="stylesheet" type="text/css" media="all" />


<section class="content ">
    <div class="container">
        <?php echo  (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>
        <div class="section-title text-center">
            <h2> Start working more efficiently!</h2>
            <p>Important market data, surveys and statistics available at a click. </p>
        </div>
            <div class="inner-logo-slider row">
<!--              <div class="trustCompaniesSlider__headline b h5 text-center"> More than <b>7,500 <br>
                companies</b> trust<br>
                Ghdatafie </div>
              <div class="slider logo-slider">
                <div><img src="images/logo-google-grayblue.png" alt="" /></div>
                <div><img src="images/logo-samsung-grayblue.png" alt="" /></div>
                <div><img src="images/logo-paypal-grayblue.png" alt="" /></div>
                <div><img src="images/logo-telekom-grayblue.png" alt="" /></div>
                <div><img src="images/logo-adobe-grayblue.png" alt="" /></div>
                <div><img src="images/logo-pg-grayblue.png" alt="" /></div>
              </div>-->
            </div>
        <div class="row productCardWrapper">
            @if(!empty($packeges))
            @foreach($packeges as $packege)

            @if($packege->id == 1)
            <div class="col-sm-4 pr-0">
                <div class="productCard productCard--left">
                    <div class="productCard__header text-center">
                        <h3> {{$packege->title}} </h3>
                        <p> {{$packege->sub_title}} </p>
                        <hr>
                    </div>
                    <div class="productCard__middle text-center">
                        <p> {{$packege->price}} </p>
                        <a class="button--medium float-none submit-package btn btn-primary" href="{{url('order/'.$packege->id)}}" 
                           data-id="{{$packege->id}}" data-gtm="accountOverview__requestCorporate">
                            {{$packege->btn_text}} </a>
                    </div>
                    <div class="productCard__bottom">
                        <ul class="productCard__benefits">
                            <?php $descriptions = Explode(',', $packege->description) ?>
                            @foreach($descriptions as $description)
                            <li class="productCard__benefitItem"><i class="fa fa-check"></i>

                                {{$description}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


            @elseif($packege->id == 2)

            <div class="col-sm-4 pl-0 pr-0">
                <div class="productCard productCard--center ">
                    <div class="callOut">
                        <p class="callOut__text"> Instant Access </p>
                    </div>
                    <div class="productCard__header text-center">
                        <h3> {{$packege->title}} </h3>
                        <p> {{$packege->sub_title}} </p>
                        <hr>
                    </div>
                    <div class="productCard__middle text-center">
                        <p class="productCard__priceWrap"><b class="price">{{$packege->price}}</b>
                            <small class="footnote"> {!! $packege->short_description !!}<br>
                            </small></p>
                        <a class="button--medium float-none submit-package btn btn-success" href="{{url('order/'.$packege->id)}}" 
                           data-id="{{$packege->id}}" data-gtm="accountOverview__requestCorporate">
                            {{$packege->btn_text}} </a>
                    </div>

                    <div class="productCard__bottom">
                        <ul class="productCard__benefits">
                            <?php $descriptions = Explode(',', $packege->description) ?>
                            @foreach($descriptions as $description)
                            <li class="productCard__benefitItem"><i class="fa fa-check"></i>

                                {{$description}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            @elseif($packege->id == 3)
            <div class="col-sm-4 pl-0">
                <div class="productCard productCard--right">
                    <div class="productCard__header text-center">
                        <h3> {{$packege->title}} </h3>
                        <p> {{$packege->sub_title}} </p>
                        <hr>
                    </div>
                    <div class="productCard__middle text-center">
                        <p class="productCard__priceWrap"><b class="price">{{$packege->price}}</b>
                            <small> {!! $packege->short_description !!}<br>
                            </small></p>
                        <a class="button--medium float-none submit-package btn btn-primary" href="{{url('order/'.$packege->id)}}" 
                           data-id="{{$packege->id}}" data-gtm="accountOverview__requestCorporate">
                            {{$packege->btn_text}}
                        </a>
                    </div>
                    <div class="productCard__bottom">
                        <ul class="productCard__benefits">
                            <?php $descriptions = Explode(',', $packege->description) ?>
                            @foreach($descriptions as $description)
                            <li class="productCard__benefitItem"><i class="fa fa-check"></i>

                                {{$description}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            @endif


            @endforeach
            @endif
            <div class="col-sm-12 text-center"  >
                <div class="p-3 mt-3">
                    <p>* All products require an annual contract.
                        Prices do not include sales tax. </p>
                </div>
            </div>
        </div>
        <hr>
        <div class="section-title text-center">
            <h2>Your advantages with a Premium Account</h2>
            <p>Our best seller</p>
        </div>
        <div class="single-account-tab row">
            <ul class="nav nav-pills row ">
                <li class="col-sm-4 text-center"><a class="active" data-toggle="pill" href="#premium">
                        <div class="premiumTabNav__item" > <i class="fa fa-star"></i>
                            <div class="premiumTabsNav__title">
                                <h4>All Premium Statistics</h4>
                            </div>
                            <div class="premiumTabsNav__content">
                                <p><b>Immediate access</b> to all statistics (basic and premium).</p>
                            </div>
                        </div>
                    </a> </li>
                <li class="col-sm-4 text-center"><a class="" data-toggle="pill" href="#Relevant">
                        <div class="premiumTabNav__item" > <i class="fa fa-eye"></i>
                            <div class="premiumTabsNav__title">
                                <h4 class="h4">Relevant data</h4>
                            </div>
                            <p> We provide <b>market and consumer data</b> from 22,500 relevant sources. </p>
                        </div>
                    </a> </li>
                <li class="col-sm-4 text-center"><a class="" data-toggle="pill" href="#download">
                        <div class="premiumTabNav__item" > <i class="fa fa-download"></i>
                            <div class="premiumTabsNav__title">
                                <h4 class="h4">Unlimited downloads</h4>
                            </div>
                            <p> Unlimited access to our statistics database, as well as download rights in <b>XLS, PDF &amp; PNG.</b></p>
                        </div>
                    </a> </li>
            </ul>

            <!-- Tab panes -->
<!--            <div class="tab-content">
                <div class="tab-pane active" id="premium">
                    <div class="row">
                        <div class="col-sm-7">
                            <h4>Our Premium Statistics - facts for your business</h4>
                            <p>Currently, Ghdatafie provides more than 1 million statistics.
                                93 percent (all Premium content) are exclusively accessible via our professional accounts.</p>
                            <h5>Benefits</h5>
                            <ul class="list-group">
                                <li>Industry-specific data</li>
                                <li>Exclusively on Ghdatafie</li>
                                <li>Data from collaborations and surveys conducted by our experts</li>
                                <li>In-depth research for you</li>
                            </ul>
                        </div>
                        <div class="col-sm-5"> <img src="{{asset(ASSET.'new_frontend/img/tab_content_img_1_en.png')}}" class="img-fluid" alt="" /> </div>
                    </div>
                </div>
                <div class="tab-pane" id="Relevant">
                    <div class="row">
                        <div class="col-sm-7">
                            <h4>Great results with Ghdatafie</h4>
                            <p>Thanks to surveys conducted by in-house experts, aggregated secondary data and exclusive data from collaborations, we offer more than one million relevant statistics on more than 80,000 topics.
                                All data include detailed source information.</p>
                        </div>
                        <div class="col-sm-5"> <img src="{{asset(ASSET.'new_frontend/img/tab_content_img_3-1.png')}}" class="img-fluid" alt="" /> </div>
                    </div>
                </div>
                <div class="tab-pane" id="download">
                    <div class="row">
                        <div class="col-sm-7">
                            <h4>Unlimited access</h4>
                            <p>As a Ghdatafie Premium customer, you receive unlimited access to all statistics at all times. Including downloads of data in the most common formats (XLS, PDF & PNG). Create relevant and significant statistics in no time.</p>
                        </div>
                        <div class="col-sm-5"> <img src="{{asset(ASSET.'new_frontend/img/tab_content_img_2-1.png')}}" class="img-fluid" alt="" /> </div>
                    </div>
                </div>
            </div>-->
        </div>

        <div class="inner-logo-slider inner-client-logos row">
            <!--            <div class="col-sm-12">    
                            <h4>Every day, leading media corporations trust Ghdatafie and use our infographics</h4>
            
                            <div class="slider logo-slider ">
                                <div><img src="images/logo-google-grayblue.png" alt="" /></div>
                                <div><img src="images/logo-samsung-grayblue.png" alt="" /></div>
                                <div><img src="images/logo-paypal-grayblue.png" alt="" /></div>
                                <div><img src="images/logo-telekom-grayblue.png" alt="" /></div>
                                <div><img src="images/logo-adobe-grayblue.png" alt="" /></div>
                                <div><img src="images/logo-pg-grayblue.png" alt="" /></div>
                            </div>
                        </div>-->
        </div>


        <div class="row">
            <div class="col-sm-12"><div class="section-title text-center">
                    <h2>Any more questions?
                    </h2>
                    <h3>Get in touch with us quickly and easily. 
                        We are happy to help!</h3>
                </div></div>  

        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="get-intouch-box">    <h3>Contact</h3>

                    <div class="contactCards__item contactCards__item--1">
                        <?php 
                                        if(isset($contact_image->fild_value) && $contact_image->fild_value != ''){ ?>
                                     <img src="{{asset(ASSET.'upload/image/thumbnail/'.$contact_image->fild_value)}}"
                                        class="contactCards__avatar"
                                        alt="ContactEsther Shaulova"/>
                                      <?php  }else{ ?>
                                          <img src="{{asset(ASSET.'new_frontend/img/avtar.png')}}"
                                        class="contactCards__avatar"
                                        alt="ContactEsther Shaulova"/>
                                       <?php }
                                    ?>
                                  
                                    <div class="flex--grow">
                                        <h4 class="contactCards__title">{{ isset($contact_name->fild_value) ? $contact_name->fild_value : '' }}</h4>
                                        <h5 class="contactCards__position">{{ isset($contact_post->fild_value) ? $contact_post->fild_value : '' }}<span class="showMobile">– Contact (United States)</span></h5>
                                        <div class="contactCards__mail">
                                            <div class="margin-bottom-5">
                                                <div class="contactCards__mail--prefix">Email</div>
                                                <a href="mailto:support@ghdatafie.com">{{ isset($contact_email->fild_value) ? $contact_email->fild_value : '' }}</a></div>
                                            <div>
                                                <div class="contactCards__mail--prefix">Tel</div>
                                                <a href="fon:+1 212 419-5770">{{ isset($contact_number->fild_value) ? $contact_number->fild_value : '' }}</a></div>
                                        </div>
<!--                                        <p class="contactCards__working responsiveText margin-bottom-0">Mon - Fri, 9am - 6pm (EST)</p>-->
                                    </div>
                    </div></div>


            </div>
<!--            <div class="col-sm-6">
                <div class="get-intouch-box">    <h3>Contact (Europe)</h3>

                    <div class="contactCards__item contactCards__item--1">
                        <img src="{{asset(ASSET.'new_frontend/img/avtar.png')}}" class="contactCards__avatar" alt="ContactEsther Shaulova">
                        <div class="flex--grow">
                            <h4 class="contactCards__title">Esther Shaulova</h4>
                            <h5 class="contactCards__position">Operations Manager</h5>
                            <div class="contactCards__mail">
                                <div class="margin-bottom-5">
                                    <div class="contactCards__mail--prefix">Email</div>
                                    <a href="mailto:support@ghdatafie.com">support@ghdatafie.com</a></div>
                                <div>
                                    <div class="contactCards__mail--prefix">Tel</div>
                                    <a href="fon:+1 212 419-5770">+1 212 419-5770</a></div>
                            </div>
                            <p class="contactCards__working responsiveText margin-bottom-0">Mon - Fri, 9am - 6pm (EST)</p>
                        </div>
                    </div></div>


            </div>-->
        </div>

    </div>
</section>

@endsection
@section('bottomscript')
<script src="{!! asset(ASSET.'js/frontend/pricing.js')!!}"></script>
<script type="text/javascript">
$(document).ready(function () {
    frontend.pricing.initialize();
});
</script>
@endsection