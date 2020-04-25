@extends('Frontend.new_layouts.main')

@section('pageTitle','Home')
@section('pageHeadTitle','Home')

@section('content')
<section id="intro">
  <div class="intro-container">
    <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel"> 
      <!-- <ol class="carousel-indicators">
        <li data-target="#introCarousel" data-slide-to="0" class="active"></li>
      </ol>-->
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" >
          <div class="carousel-container">
            <div class="carousel-content">
              <h2>Access over 1 million dataset</h2>
              <p>GhDatafie provides data within disparate Industries.</p>
              <div class="homeSearch__Wrapper">
                  <form class="homeSearch" action="post" method="" onsubmit="return false;">
                    <!--<div class="ui-widget">-->
                    <input class="homeSearch__input vue-homeSearch__input" id="tags" type="search" name="q" maxlength="1024" autocomplete="off" placeholder="Find datafie">
                    <!--</div>-->

                  <!--<input type="hidden" name="qKat" value="search">-->
                      <button class="homeSearch__submit button--primary search_btn" type="submit" data-gtm="searchButton"> <span class="homeSearch__submitText">Ghdatafie Search</span> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </form>
              </div>
              <div class="tagGroup flex flex--justifyContent-center">
                <ul class="tagList">
                @foreach ($brands as $brand)
                  <li class="tagList__item tagList__item--shorten"><a class="tag tag--rounded tag--shiny" data-gtm="topTagList__t--1" href="{{url('datasets/'.$brand->id)}}"> {{$brand->title}} </a></li>
                @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <svg class="homeBgWave" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 50" xml:space="preserve" preserveAspectRatio="none">
    <path class="homeBgWave__background" d="M0,50h1920c0,0-320-35-640-35S960,27.5,640,27.5S320,10,0,10V50z"></path>
    <path class="homeBgWave__wave" d="M0,20c320,0,320,15,640,15s320-15,640-15s640,30,640,30s-320-40-640-40S966,20,640,20S314,0,0,0V20z"></path>
  </svg>
</section>
<section class="content ">
    <div class="left-bg"></div>
    <div class="right-bg"></div>
    <div class="container">
        <!--<div class="half-divider"></div>-->
<!--        <div class="section-title text-center">
            <h3>POPULAR BRANDS</h3>
            <h2>Starting point of your research </h2>
        </div>
        <div class="linkCloud">
            @foreach ($brands_all as $brand_all)
          
            <a href="{{url('datasets/'.$brand_all->id)}}" class="linkCloud__item">{{$brand_all->title}}</a>
            @endforeach
           
        </div>-->
        <!--<div class="half-divider"></div>-->
        
        <div class="section-title text-center">
            <h3>POPULAR DATASET</h3>
            <h2>Starting point of your research </h2>
        </div>
        <div class="linkCloud">
            @foreach ($dataset as $data)
          
            <a href="{{url('dataset/'.$data->fld_dataset_id)}}" class="linkCloud__item">{{$data->fld_dataset_title}}</a>
            @endforeach
           
        </div>
        <div class="half-divider"></div>

        <div class="section-title text-center">
            <h3>NEWS & REPORTS</h3>
            <h2>Expert research in condensed form</h2>
        </div>
    </div>

    <!-- News Section-->
    <div class="news-slider">
        <div class="container-fluid">
            <div class="center-slider slider">
                @foreach($news_details as $news)
                <div  class="news-box " >
                    <div class="updateNewsFeed__listItemInner">
                        <div class="updateNewsFeed__listItemHeader">
                            <?php if(isset($news->image) && $news->image != '' ){ 
                                $url =   ASSET.'upload/news/thumbnail/'.$news->image;
                            }else{
                                $url =   ASSET.'upload/'.NO_IMAGE_AVAILABLE;
                            } ?>
                            <img style="width: 313px;height: 130px;" src="{{url($url)}}"  alt="" >
                            <div class="updateNewsFeed__listItemCategory">New</div>
                        </div>
                        <h4 class="responsiveHeadline" style="
                                                            /*white-space: nowrap;*/
                                                            width: 280px;
                                                            overflow: hidden;
                                                            text-overflow: ellipsis;
                                                            min-height: 99px;
                                                            max-height: 99px;
                                                            "> {{$news->title}} </h4>
                        <div class="updateNewsFeed__listItemContent" style="height:250px;">

                            <p>{{$news->short_desc}}</p>
                            
                            <a href="{{url('news/'.$news->id)}}" style="position: absolute;bottom: 6px;" target="_blank" rel="noopener" class="linkArrowHover" tabindex="-1"><i aria-hidden="true" class="fa fa-long-arrow-right "></i> More Information </a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- News Section-->
    @if(isset($cmsDetails))
    {!! $cmsDetails->description !!}
    @endif
<!--    <div class="markets-section">
        <div class="left-bg"></div>
        <div class="right-bg"></div>
        <div class="container">
            <div class="half-divider"></div>

            <div class="row">
                <div class="col-sm-8"><div class="section-title text-left">
                        <h3>MARKET OUTLOOKS</h3>
                        <h2>Analyze markets across 50+ countries</h2>
                    </div>

                    <div class="custom-tabs">    <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#ConsumerMarkets">Consumer Markets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#DigitalMarkets">Digital Markets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#MobilityMarkets">Mobility Markets</a>
                            </li>
                        </ul>

                         Tab panes 
                        <div class="tab-content">
                            <div class="tab-pane active" id="ConsumerMarkets">
                                <p>We provide current market figures and forecasts for the most important consumer goods within a total of more than 200 markets. All key figures are internationally comparable and are based on extensive analyses of data from national and international statistical offices, associations, company reports and the trade press.</p>
                                <p><a href="javascript:void(0);" class="btn btn-success ">Explore the tool</a> <a href="javascript:void(0);" class="btn btn-outline-secondary "><i class="fa fa-play"></i> Watch the tutorial</a></p>
                            </div>
                            <div class="tab-pane fade" id="DigitalMarkets">
                                <p>We provide the numbers behind markets related to catchwords like Smart Home, FinTech or Connected Car. It presents up-to-date figures on more than 90 markets of the digital economy. The comparable key figures are based on extensive analyses of relevant indicators from the areas of society, economy, and technology.</p>
                                <p><a href="javascript:void(0);" class="btn btn-success ">Explore the tool</a> <a href="javascript:void(0);" class="btn btn-outline-secondary "><i class="fa fa-play"></i> Watch the tutorial</a></p>
                            </div>
                            <div class="tab-pane fade" id="MobilityMarkets">
                                <p>We present the key figures from the world of automotive and mobility – sales, revenues, prices, and brands.</p>
                                <p><a href="javascript:void(0);" class="btn btn-success ">Explore the tool</a> <a href="javascript:void(0);" class="btn btn-outline-secondary "><i class="fa fa-play"></i> Watch the tutorial</a></p>
                            </div>
                        </div></div>
                </div>    


            </div>

        </div>
        <div class="browserMockup browserMockup--perspectiveRight pos-relative z-index-1 vertical-top margin-left-70 hideMobile" data-parallaxbrowser="1000">
            <div class="browserMockup__addressBar"><span class="browserMockup__button"></span><span class="browserMockup__button"></span>
                <span class="browserMockup__button"></span><span class="browserMockup__addressInput"></span></div>
            <span id="previewXMO" data-parallaximage="" class="homeScreenshot lazy homeScreenshot--mmo" ></span></div>
    </div>-->

    <div class="container">    
        <div class="half-divider"></div>
        <div class="section-title text-center">
            <h3>GH DataFie ACCOUNTS
            </h3>
            <h2>Our complete solutions</h2>
        </div>

<!--        <div class="row">
            @if(!empty($packeges))
            @foreach($packeges as $packege)
            <div class="col-sm-4">
                <div class="panelCard " style="min-height: 515px;">
                    <div class="flex flex--directionColumn height-full">
                        <div class="flex__item flex__item--grow">
                            <div class="p-4">
                                <h4 class="text-primary text-center mb-3">
                                    {{$packege->title}}
                                </h4>
                                <h6 class="text-center mb-1 ">
                                    {{$packege->sub_title}}
                                </h6>
                                <div class="half-divider"></div>

                                <ul class="connectedDotsList">
                                    <?php $descriptions =  Explode(',',$packege->description) ?>
                                @foreach($descriptions as $description)
                                    <li class="connectedDotsList__li text-color--dark-blue-gray">
                                        {{$description}}
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <div style="position: absolute;right: 4%;left: 4%; bottom: 10%;">
                        <div class="price-label bg-light text-center pt-4 pb-4" >
                            <span class="text-dark">
                                {{$packege->price}}
                            </span>
                        </div>
                        </div>
                    </div>
                    <div style="position: absolute;bottom: 1%; left: 33%; right: 33%;">
                    <div style="text-align: center; padding: 5px;">
                        <a class="button btn {{ $packege->instant == 1 ? 'btn-success' : 'btn-primary' }}  button--medium width100 float-none submit-package" href="{{url('order/'.$packege->id)}}" data-id="{{$packege->id}}" >
                                {{$packege->btn_text}}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>-->
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
<!--        <div class="row">
            <div class="col-sm-12 text-center mt-5 mb-5">
                <a href="" class="btn btn-success btn-lg">Go to product overview</a>
            </div>
        </div>-->

        <div class="half-divider"></div>
        <div class="section-title text-center">
            <h3>DAILY INFOGRAPHICS

            </h3>
            <h2>Global stories vividly visualized
            </h2>
        </div>


            
            
        @if(!empty($infographics))
        <div class="center-slider2 slider">
            @foreach($infographics as $infographic)
            <?php if (isset($infographic->image) && $infographic->image != '') {
                    $url = ASSET . 'upload/infographics/thumbnail/' . $infographic->image;
                } else {
                    $url = ASSET . 'upload/'.NO_IMAGE_AVAILABLE;
                }
            ?>
            <a href="{{url('infographics/'.$infographic->id)}}">
            <div class="item">
                <img alt="" src="{{url($url)}}" style="min-width: 337px;max-width: 337px; max-height: 240px;min-height: 240px;">
            </div>
            </a>
             @endforeach
        </div>
        @else
             <p style="text-align: center;font-size: 25px;">No Infographics for today.</p>
             
        @endif





        <div class="half-divider"></div>
        <div class="section-title text-center">
            <h3>CONTACT</h3>
            <h2>Get in touch with us. We are happy to help.</h2>
        </div>
        <div class="mapContacts">
            <div class="row">
                <div class="col-md-7">
                    <div class="mapContacts__item mapContacts__item--left">
                        <div class="mapContacts__map">
                            
                            <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0) -->
                            <svg version="1.1" id="worldmap" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 655 317" style="enable-background:new 0 0 655 317;" xml:space="preserve">
                            <title>World map</title>
                            <style type="text/css">
                                rect {
                                    transform-style: preserve-3d;
                                    transform-origin: center;
                                    transform-box: fill-box;
                                }
                                .st0 {
                                    fill: #C0CDDB;
                                }
                                rect.highlight {
                                    animation: scaleUpDown .5s linear 0s forwards;
                                }
                                @keyframes scaleUpDown {
                                    0% {transform: scale(1);}
                                    50% {transform:scale(1.3);}
                                    100% {transform: scale(1); fill: #0b85e5;}
                                }
                            </style>
                            <g id="worldmap-rest">
                            <rect x="178" class="st0" width="5" height="5"/>
                            <rect x="186" class="st0" width="5" height="5"/>
                            <rect x="178" y="8" class="st0" width="5" height="5"/>
                            <rect x="170" y="8" class="st0" width="5" height="5"/>
                            <rect x="162" y="8" class="st0" width="5" height="5"/>
                            <rect x="154" y="8" class="st0" width="5" height="5"/>
                            <rect x="146" y="8" class="st0" width="5" height="5"/>
                            <rect x="186" y="8" class="st0" width="5" height="5"/>
                            <rect x="194" y="8" class="st0" width="5" height="5"/>
                            <rect x="202" y="8" class="st0" width="5" height="5"/>
                            <rect x="210" y="8" class="st0" width="5" height="5"/>
                            <rect x="218" y="8" class="st0" width="5" height="5"/>
                            <rect x="226" y="8" class="st0" width="5" height="5"/>
                            <rect x="234" y="8" class="st0" width="5" height="5"/>
                            <rect x="242" y="8" class="st0" width="5" height="5"/>
                            <rect x="250" y="8" class="st0" width="5" height="5"/>
                            <rect x="258" y="8" class="st0" width="5" height="5"/>
                            <rect x="266" y="8" class="st0" width="5" height="5"/>
                            <rect x="226" class="st0" width="5" height="5"/>
                            <rect x="242" class="st0" width="5" height="5"/>
                            <rect x="250" class="st0" width="5" height="5"/>
                            <rect x="258" class="st0" width="5" height="5"/>
                            <rect x="274" y="8" class="st0" width="5" height="5"/>
                            <rect x="282" y="8" class="st0" width="5" height="5"/>
                            <rect x="170" y="16" class="st0" width="5" height="5"/>
                            <rect x="162" y="16" class="st0" width="5" height="5"/>
                            <rect x="154" y="16" class="st0" width="5" height="5"/>
                            <rect x="146" y="16" class="st0" width="5" height="5"/>
                            <rect x="138" y="16" class="st0" width="5" height="5"/>
                            <rect x="130" y="16" class="st0" width="5" height="5"/>
                            <rect x="122" y="16" class="st0" width="5" height="5"/>
                            <rect x="194" y="16" class="st0" width="5" height="5"/>
                            <rect x="202" y="16" class="st0" width="5" height="5"/>
                            <rect x="210" y="16" class="st0" width="5" height="5"/>
                            <rect x="218" y="16" class="st0" width="5" height="5"/>
                            <rect x="226" y="16" class="st0" width="5" height="5"/>
                            <rect x="234" y="16" class="st0" width="5" height="5"/>
                            <rect x="242" y="16" class="st0" width="5" height="5"/>
                            <rect x="250" y="16" class="st0" width="5" height="5"/>
                            <rect x="258" y="16" class="st0" width="5" height="5"/>
                            <rect x="266" y="16" class="st0" width="5" height="5"/>
                            <rect x="162" y="24" class="st0" width="5" height="5"/>
                            <rect x="154" y="24" class="st0" width="5" height="5"/>
                            <rect x="146" y="24" class="st0" width="5" height="5"/>
                            <rect x="138" y="24" class="st0" width="5" height="5"/>
                            <rect x="130" y="24" class="st0" width="5" height="5"/>
                            <rect x="114" y="24" class="st0" width="5" height="5"/>
                            <rect x="106" y="24" class="st0" width="5" height="5"/>
                            <rect x="98" y="24" class="st0" width="5" height="5"/>
                            <rect x="186" y="24" class="st0" width="5" height="5"/>
                            <rect x="194" y="24" class="st0" width="5" height="5"/>
                            <rect x="202" y="24" class="st0" width="5" height="5"/>
                            <rect x="210" y="24" class="st0" width="5" height="5"/>
                            <rect x="218" y="24" class="st0" width="5" height="5"/>
                            <rect x="226" y="24" class="st0" width="5" height="5"/>
                            <rect x="234" y="24" class="st0" width="5" height="5"/>
                            <rect x="242" y="24" class="st0" width="5" height="5"/>
                            <rect x="250" y="24" class="st0" width="5" height="5"/>
                            <rect x="258" y="24" class="st0" width="5" height="5"/>
                            <rect x="266" y="24" class="st0" width="5" height="5"/>
                            <rect x="274" y="24" class="st0" width="5" height="5"/>
                            <rect x="162" y="32" class="st0" width="5" height="5"/>
                            <rect x="154" y="32" class="st0" width="5" height="5"/>
                            <rect x="146" y="32" class="st0" width="5" height="5"/>
                            <rect x="138" y="32" class="st0" width="5" height="5"/>
                            <rect x="114" y="32" class="st0" width="5" height="5"/>
                            <rect x="106" y="32" class="st0" width="5" height="5"/>
                            <rect x="98" y="32" class="st0" width="5" height="5"/>
                            <rect x="90" y="32" class="st0" width="5" height="5"/>
                            <rect x="210" y="32" class="st0" width="5" height="5"/>
                            <rect x="218" y="32" class="st0" width="5" height="5"/>
                            <rect x="226" y="32" class="st0" width="5" height="5"/>
                            <rect x="234" y="32" class="st0" width="5" height="5"/>
                            <rect x="242" y="32" class="st0" width="5" height="5"/>
                            <rect x="250" y="32" class="st0" width="5" height="5"/>
                            <rect x="258" y="32" class="st0" width="5" height="5"/>
                            <rect x="266" y="32" class="st0" width="5" height="5"/>
                            <rect x="170" y="40" class="st0" width="5" height="5"/>
                            <rect x="162" y="40" class="st0" width="5" height="5"/>
                            <rect x="154" y="40" class="st0" width="5" height="5"/>
                            <rect x="138" y="40" class="st0" width="5" height="5"/>
                            <rect x="130" y="40" class="st0" width="5" height="5"/>
                            <rect x="122" y="40" class="st0" width="5" height="5"/>
                            <rect x="114" y="40" class="st0" width="5" height="5"/>
                            <rect x="106" y="40" class="st0" width="5" height="5"/>
                            <rect x="98" y="40" class="st0" width="5" height="5"/>
                            <rect x="90" y="40" class="st0" width="5" height="5"/>
                            <rect x="210" y="40" class="st0" width="5" height="5"/>
                            <rect x="218" y="40" class="st0" width="5" height="5"/>
                            <rect x="226" y="40" class="st0" width="5" height="5"/>
                            <rect x="234" y="40" class="st0" width="5" height="5"/>
                            <rect x="242" y="40" class="st0" width="5" height="5"/>
                            <rect x="250" y="40" class="st0" width="5" height="5"/>
                            <rect x="258" y="40" class="st0" width="5" height="5"/>
                            <rect x="266" y="40" class="st0" width="5" height="5"/>
                            <rect x="178" y="48" class="st0" width="5" height="5"/>
                            <rect x="138" y="48" class="st0" width="5" height="5"/>
                            <rect x="130" y="48" class="st0" width="5" height="5"/>
                            <rect x="122" y="48" class="st0" width="5" height="5"/>
                            <rect x="114" y="48" class="st0" width="5" height="5"/>
                            <rect x="106" y="48" class="st0" width="5" height="5"/>
                            <rect x="98" y="48" class="st0" width="5" height="5"/>
                            <rect x="90" y="48" class="st0" width="5" height="5"/>
                            <rect x="82" y="48" class="st0" width="5" height="5"/>
                            <rect x="74" y="48" class="st0" width="5" height="5"/>
                            <rect x="58" y="48" class="st0" width="5" height="5"/>
                            <rect x="186" y="48" class="st0" width="5" height="5"/>
                            <rect x="218" y="48" class="st0" width="5" height="5"/>
                            <rect x="226" y="48" class="st0" width="5" height="5"/>
                            <rect x="234" y="48" class="st0" width="5" height="5"/>
                            <rect x="242" y="48" class="st0" width="5" height="5"/>
                            <rect x="250" y="48" class="st0" width="5" height="5"/>
                            <rect x="258" y="48" class="st0" width="5" height="5"/>
                            <rect x="178" y="56" class="st0" width="5" height="5"/>
                            <rect x="154" y="56" class="st0" width="5" height="5"/>
                            <rect x="146" y="56" class="st0" width="5" height="5"/>
                            <rect x="138" y="56" class="st0" width="5" height="5"/>
                            <rect x="130" y="56" class="st0" width="5" height="5"/>
                            <rect x="122" y="56" class="st0" width="5" height="5"/>
                            <rect x="114" y="56" class="st0" width="5" height="5"/>
                            <rect x="106" y="56" class="st0" width="5" height="5"/>
                            <rect x="98" y="56" class="st0" width="5" height="5"/>
                            <rect x="90" y="56" class="st0" width="5" height="5"/>
                            <rect x="82" y="56" class="st0" width="5" height="5"/>
                            <rect x="74" y="56" class="st0" width="5" height="5"/>
                            <rect x="66" y="56" class="st0" width="5" height="5"/>
                            <rect x="58" y="56" class="st0" width="5" height="5"/>
                            <rect x="186" y="56" class="st0" width="5" height="5"/>
                            <rect x="194" y="56" class="st0" width="5" height="5"/>
                            <rect x="218" y="56" class="st0" width="5" height="5"/>
                            <rect x="226" y="56" class="st0" width="5" height="5"/>
                            <rect x="234" y="56" class="st0" width="5" height="5"/>
                            <rect x="242" y="56" class="st0" width="5" height="5"/>
                            <rect x="178" y="64" class="st0" width="5" height="5"/>
                            <rect x="162" y="64" class="st0" width="5" height="5"/>
                            <rect x="138" y="64" class="st0" width="5" height="5"/>
                            <rect x="130" y="64" class="st0" width="5" height="5"/>
                            <rect x="122" y="64" class="st0" width="5" height="5"/>
                            <rect x="114" y="64" class="st0" width="5" height="5"/>
                            <rect x="106" y="64" class="st0" width="5" height="5"/>
                            <rect x="98" y="64" class="st0" width="5" height="5"/>
                            <rect x="90" y="64" class="st0" width="5" height="5"/>
                            <rect x="82" y="64" class="st0" width="5" height="5"/>
                            <rect x="74" y="64" class="st0" width="5" height="5"/>
                            <rect x="66" y="64" class="st0" width="5" height="5"/>
                            <rect x="58" y="64" class="st0" width="5" height="5"/>
                            <rect x="186" y="64" class="st0" width="5" height="5"/>
                            <rect x="218" y="64" class="st0" width="5" height="5"/>
                            <rect x="226" y="64" class="st0" width="5" height="5"/>
                            <rect x="234" y="64" class="st0" width="5" height="5"/>
                            <rect x="178" y="72" class="st0" width="5" height="5"/>
                            <rect x="170" y="72" class="st0" width="5" height="5"/>
                            <rect x="138" y="72" class="st0" width="5" height="5"/>
                            <rect x="130" y="72" class="st0" width="5" height="5"/>
                            <rect x="122" y="72" class="st0" width="5" height="5"/>
                            <rect x="114" y="72" class="st0" width="5" height="5"/>
                            <rect x="106" y="72" class="st0" width="5" height="5"/>
                            <rect x="98" y="72" class="st0" width="5" height="5"/>
                            <rect x="90" y="72" class="st0" width="5" height="5"/>
                            <rect x="82" y="72" class="st0" width="5" height="5"/>
                            <rect x="74" y="72" class="st0" width="5" height="5"/>
                            <rect x="66" y="72" class="st0" width="5" height="5"/>
                            <rect x="226" y="72" class="st0" width="5" height="5"/>
                            <rect x="178" y="80" class="st0" width="5" height="5"/>
                            <rect x="170" y="80" class="st0" width="5" height="5"/>
                            <rect x="138" y="80" class="st0" width="5" height="5"/>
                            <rect x="130" y="80" class="st0" width="5" height="5"/>
                            <rect x="122" y="80" class="st0" width="5" height="5"/>
                            <rect x="114" y="80" class="st0" width="5" height="5"/>
                            <rect x="106" y="80" class="st0" width="5" height="5"/>
                            <rect x="98" y="80" class="st0" width="5" height="5"/>
                            <rect x="90" y="80" class="st0" width="5" height="5"/>
                            <rect x="82" y="80" class="st0" width="5" height="5"/>
                            <rect x="74" y="80" class="st0" width="5" height="5"/>
                            <rect x="66" y="80" class="st0" width="5" height="5"/>
                            <rect x="186" y="80" class="st0" width="5" height="5"/>
                            <rect x="194" y="80" class="st0" width="5" height="5"/>
                            <rect x="178" y="88" class="st0" width="5" height="5"/>
                            <rect x="170" y="88" class="st0" width="5" height="5"/>
                            <rect x="154" y="88" class="st0" width="5" height="5"/>
                            <rect x="146" y="88" class="st0" width="5" height="5"/>
                            <rect x="138" y="88" class="st0" width="5" height="5"/>
                            <rect x="130" y="88" class="st0" width="5" height="5"/>
                            <rect x="122" y="88" class="st0" width="5" height="5"/>
                            <rect x="114" y="88" class="st0" width="5" height="5"/>
                            <rect x="106" y="88" class="st0" width="5" height="5"/>
                            <rect x="98" y="88" class="st0" width="5" height="5"/>
                            <rect x="90" y="88" class="st0" width="5" height="5"/>
                            <rect x="82" y="88" class="st0" width="5" height="5"/>
                            <rect x="74" y="88" class="st0" width="5" height="5"/>
                            <rect x="186" y="88" class="st0" width="5" height="5"/>
                            <rect x="194" y="88" class="st0" width="5" height="5"/>
                            <rect x="202" y="88" class="st0" width="5" height="5"/>
                            <rect x="178" y="96" class="st0" width="5" height="5"/>
                            <rect x="170" y="96" class="st0" width="5" height="5"/>
                            <rect x="162" y="96" class="st0" width="5" height="5"/>
                            <rect x="154" y="96" class="st0" width="5" height="5"/>
                            <rect x="146" y="96" class="st0" width="5" height="5"/>
                            <rect x="138" y="96" class="st0" width="5" height="5"/>
                            <rect x="130" y="96" class="st0" width="5" height="5"/>
                            <rect x="186" y="96" class="st0" width="5" height="5"/>
                            <rect x="202" y="96" class="st0" width="5" height="5"/>
                            <rect x="194" y="104" class="st0" width="5" height="5"/>
                            <rect x="210" y="104" class="st0" width="5" height="5"/>
                            <rect x="298" y="128" class="st0" width="5" height="5"/>
                            <rect x="378" y="128" class="st0" width="5" height="5"/>
                            <rect x="386" y="128" class="st0" width="5" height="5"/>
                            <rect x="114" y="136" class="st0" width="5" height="5"/>
                            <rect x="106" y="136" class="st0" width="5" height="5"/>
                            <rect x="98" y="136" class="st0" width="5" height="5"/>
                            <rect x="90" y="136" class="st0" width="5" height="5"/>
                            <rect x="290" y="136" class="st0" width="5" height="5"/>
                            <rect x="298" y="136" class="st0" width="5" height="5"/>
                            <rect x="306" y="136" class="st0" width="5" height="5"/>
                            <rect x="314" y="136" class="st0" width="5" height="5"/>
                            <rect x="322" y="136" class="st0" width="5" height="5"/>
                            <rect x="330" y="136" class="st0" width="5" height="5"/>
                            <rect x="338" y="136" class="st0" width="5" height="5"/>
                            <rect x="346" y="136" class="st0" width="5" height="5"/>
                            <rect x="354" y="136" class="st0" width="5" height="5"/>
                            <rect x="362" y="136" class="st0" width="5" height="5"/>
                            <rect x="370" y="136" class="st0" width="5" height="5"/>
                            <rect x="378" y="136" class="st0" width="5" height="5"/>
                            <rect x="386" y="136" class="st0" width="5" height="5"/>
                            <rect x="122" y="144" class="st0" width="5" height="5"/>
                            <rect x="114" y="144" class="st0" width="5" height="5"/>
                            <rect x="106" y="144" class="st0" width="5" height="5"/>
                            <rect x="98" y="144" class="st0" width="5" height="5"/>
                            <rect x="282" y="144" class="st0" width="5" height="5"/>
                            <rect x="290" y="144" class="st0" width="5" height="5"/>
                            <rect x="298" y="144" class="st0" width="5" height="5"/>
                            <rect x="306" y="144" class="st0" width="5" height="5"/>
                            <rect x="314" y="144" class="st0" width="5" height="5"/>
                            <rect x="322" y="144" class="st0" width="5" height="5"/>
                            <rect x="330" y="144" class="st0" width="5" height="5"/>
                            <rect x="338" y="144" class="st0" width="5" height="5"/>
                            <rect x="346" y="144" class="st0" width="5" height="5"/>
                            <rect x="354" y="144" class="st0" width="5" height="5"/>
                            <rect x="362" y="144" class="st0" width="5" height="5"/>
                            <rect x="370" y="144" class="st0" width="5" height="5"/>
                            <rect x="378" y="144" class="st0" width="5" height="5"/>
                            <rect x="386" y="144" class="st0" width="5" height="5"/>
                            <rect x="162" y="152" class="st0" width="5" height="5"/>
                            <rect x="154" y="152" class="st0" width="5" height="5"/>
                            <rect x="146" y="152" class="st0" width="5" height="5"/>
                            <rect x="138" y="152" class="st0" width="5" height="5"/>
                            <rect x="122" y="152" class="st0" width="5" height="5"/>
                            <rect x="114" y="152" class="st0" width="5" height="5"/>
                            <rect x="274" y="152" class="st0" width="5" height="5"/>
                            <rect x="282" y="152" class="st0" width="5" height="5"/>
                            <rect x="290" y="152" class="st0" width="5" height="5"/>
                            <rect x="298" y="152" class="st0" width="5" height="5"/>
                            <rect x="306" y="152" class="st0" width="5" height="5"/>
                            <rect x="314" y="152" class="st0" width="5" height="5"/>
                            <rect x="322" y="152" class="st0" width="5" height="5"/>
                            <rect x="330" y="152" class="st0" width="5" height="5"/>
                            <rect x="338" y="152" class="st0" width="5" height="5"/>
                            <rect x="346" y="152" class="st0" width="5" height="5"/>
                            <rect x="354" y="152" class="st0" width="5" height="5"/>
                            <rect x="362" y="152" class="st0" width="5" height="5"/>
                            <rect x="370" y="152" class="st0" width="5" height="5"/>
                            <rect x="378" y="152" class="st0" width="5" height="5"/>
                            <rect x="386" y="152" class="st0" width="5" height="5"/>
                            <rect x="394" y="152" class="st0" width="5" height="5"/>
                            <rect x="402" y="152" class="st0" width="5" height="5"/>
                            <rect x="410" y="152" class="st0" width="5" height="5"/>
                            <rect x="178" y="160" class="st0" width="5" height="5"/>
                            <rect x="170" y="160" class="st0" width="5" height="5"/>
                            <rect x="162" y="160" class="st0" width="5" height="5"/>
                            <rect x="138" y="160" class="st0" width="5" height="5"/>
                            <rect x="130" y="160" class="st0" width="5" height="5"/>
                            <rect x="122" y="160" class="st0" width="5" height="5"/>
                            <rect x="114" y="160" class="st0" width="5" height="5"/>
                            <rect x="274" y="160" class="st0" width="5" height="5"/>
                            <rect x="282" y="160" class="st0" width="5" height="5"/>
                            <rect x="290" y="160" class="st0" width="5" height="5"/>
                            <rect x="298" y="160" class="st0" width="5" height="5"/>
                            <rect x="306" y="160" class="st0" width="5" height="5"/>
                            <rect x="314" y="160" class="st0" width="5" height="5"/>
                            <rect x="322" y="160" class="st0" width="5" height="5"/>
                            <rect x="330" y="160" class="st0" width="5" height="5"/>
                            <rect x="338" y="160" class="st0" width="5" height="5"/>
                            <rect x="346" y="160" class="st0" width="5" height="5"/>
                            <rect x="354" y="160" class="st0" width="5" height="5"/>
                            <rect x="362" y="160" class="st0" width="5" height="5"/>
                            <rect x="370" y="160" class="st0" width="5" height="5"/>
                            <rect x="378" y="160" class="st0" width="5" height="5"/>
                            <rect x="386" y="160" class="st0" width="5" height="5"/>
                            <rect x="394" y="160" class="st0" width="5" height="5"/>
                            <rect x="402" y="160" class="st0" width="5" height="5"/>
                            <rect x="146" y="168" class="st0" width="5" height="5"/>
                            <rect x="138" y="168" class="st0" width="5" height="5"/>
                            <rect x="274" y="168" class="st0" width="5" height="5"/>
                            <rect x="282" y="168" class="st0" width="5" height="5"/>
                            <rect x="290" y="168" class="st0" width="5" height="5"/>
                            <rect x="298" y="168" class="st0" width="5" height="5"/>
                            <rect x="306" y="168" class="st0" width="5" height="5"/>
                            <rect x="314" y="168" class="st0" width="5" height="5"/>
                            <rect x="322" y="168" class="st0" width="5" height="5"/>
                            <rect x="330" y="168" class="st0" width="5" height="5"/>
                            <rect x="338" y="168" class="st0" width="5" height="5"/>
                            <rect x="346" y="168" class="st0" width="5" height="5"/>
                            <rect x="354" y="168" class="st0" width="5" height="5"/>
                            <rect x="362" y="168" class="st0" width="5" height="5"/>
                            <rect x="370" y="168" class="st0" width="5" height="5"/>
                            <rect x="378" y="168" class="st0" width="5" height="5"/>
                            <rect x="386" y="168" class="st0" width="5" height="5"/>
                            <rect x="178" y="176" class="st0" width="5" height="5"/>
                            <rect x="170" y="176" class="st0" width="5" height="5"/>
                            <rect x="162" y="176" class="st0" width="5" height="5"/>
                            <rect x="154" y="176" class="st0" width="5" height="5"/>
                            <rect x="146" y="176" class="st0" width="5" height="5"/>
                            <rect x="186" y="176" class="st0" width="5" height="5"/>
                            <rect x="282" y="176" class="st0" width="5" height="5"/>
                            <rect x="290" y="176" class="st0" width="5" height="5"/>
                            <rect x="298" y="176" class="st0" width="5" height="5"/>
                            <rect x="306" y="176" class="st0" width="5" height="5"/>
                            <rect x="314" y="176" class="st0" width="5" height="5"/>
                            <rect x="322" y="176" class="st0" width="5" height="5"/>
                            <rect x="330" y="176" class="st0" width="5" height="5"/>
                            <rect x="338" y="176" class="st0" width="5" height="5"/>
                            <rect x="346" y="176" class="st0" width="5" height="5"/>
                            <rect x="354" y="176" class="st0" width="5" height="5"/>
                            <rect x="362" y="176" class="st0" width="5" height="5"/>
                            <rect x="370" y="176" class="st0" width="5" height="5"/>
                            <rect x="378" y="176" class="st0" width="5" height="5"/>
                            <rect x="386" y="176" class="st0" width="5" height="5"/>
                            <rect x="394" y="176" class="st0" width="5" height="5"/>
                            <rect x="178" y="184" class="st0" width="5" height="5"/>
                            <rect x="170" y="184" class="st0" width="5" height="5"/>
                            <rect x="162" y="184" class="st0" width="5" height="5"/>
                            <rect x="186" y="184" class="st0" width="5" height="5"/>
                            <rect x="194" y="184" class="st0" width="5" height="5"/>
                            <rect x="202" y="184" class="st0" width="5" height="5"/>
                            <rect x="290" y="184" class="st0" width="5" height="5"/>
                            <rect x="322" y="184" class="st0" width="5" height="5"/>
                            <rect x="330" y="184" class="st0" width="5" height="5"/>
                            <rect x="338" y="184" class="st0" width="5" height="5"/>
                            <rect x="346" y="184" class="st0" width="5" height="5"/>
                            <rect x="354" y="184" class="st0" width="5" height="5"/>
                            <rect x="362" y="184" class="st0" width="5" height="5"/>
                            <rect x="378" y="184" class="st0" width="5" height="5"/>
                            <rect x="386" y="184" class="st0" width="5" height="5"/>
                            <rect x="394" y="184" class="st0" width="5" height="5"/>
                            <rect x="178" y="192" class="st0" width="5" height="5"/>
                            <rect x="170" y="192" class="st0" width="5" height="5"/>
                            <rect x="162" y="192" class="st0" width="5" height="5"/>
                            <rect x="154" y="192" class="st0" width="5" height="5"/>
                            <rect x="186" y="192" class="st0" width="5" height="5"/>
                            <rect x="194" y="192" class="st0" width="5" height="5"/>
                            <rect x="202" y="192" class="st0" width="5" height="5"/>
                            <rect x="210" y="192" class="st0" width="5" height="5"/>
                            <rect x="322" y="192" class="st0" width="5" height="5"/>
                            <rect x="330" y="192" class="st0" width="5" height="5"/>
                            <rect x="338" y="192" class="st0" width="5" height="5"/>
                            <rect x="346" y="192" class="st0" width="5" height="5"/>
                            <rect x="354" y="192" class="st0" width="5" height="5"/>
                            <rect x="362" y="192" class="st0" width="5" height="5"/>
                            <rect x="370" y="192" class="st0" width="5" height="5"/>
                            <rect x="378" y="192" class="st0" width="5" height="5"/>
                            <rect x="386" y="192" class="st0" width="5" height="5"/>
                            <rect x="178" y="200" class="st0" width="5" height="5"/>
                            <rect x="170" y="200" class="st0" width="5" height="5"/>
                            <rect x="162" y="200" class="st0" width="5" height="5"/>
                            <rect x="154" y="200" class="st0" width="5" height="5"/>
                            <rect x="186" y="200" class="st0" width="5" height="5"/>
                            <rect x="194" y="200" class="st0" width="5" height="5"/>
                            <rect x="202" y="200" class="st0" width="5" height="5"/>
                            <rect x="210" y="200" class="st0" width="5" height="5"/>
                            <rect x="218" y="200" class="st0" width="5" height="5"/>
                            <rect x="226" y="200" class="st0" width="5" height="5"/>
                            <rect x="234" y="200" class="st0" width="5" height="5"/>
                            <rect x="330" y="200" class="st0" width="5" height="5"/>
                            <rect x="338" y="200" class="st0" width="5" height="5"/>
                            <rect x="346" y="200" class="st0" width="5" height="5"/>
                            <rect x="354" y="200" class="st0" width="5" height="5"/>
                            <rect x="362" y="200" class="st0" width="5" height="5"/>
                            <rect x="370" y="200" class="st0" width="5" height="5"/>
                            <rect x="378" y="200" class="st0" width="5" height="5"/>
                            <rect x="178" y="208" class="st0" width="5" height="5"/>
                            <rect x="170" y="208" class="st0" width="5" height="5"/>
                            <rect x="162" y="208" class="st0" width="5" height="5"/>
                            <rect x="154" y="208" class="st0" width="5" height="5"/>
                            <rect x="186" y="208" class="st0" width="5" height="5"/>
                            <rect x="194" y="208" class="st0" width="5" height="5"/>
                            <rect x="202" y="208" class="st0" width="5" height="5"/>
                            <rect x="210" y="208" class="st0" width="5" height="5"/>
                            <rect x="218" y="208" class="st0" width="5" height="5"/>
                            <rect x="226" y="208" class="st0" width="5" height="5"/>
                            <rect x="234" y="208" class="st0" width="5" height="5"/>
                            <rect x="330" y="208" class="st0" width="5" height="5"/>
                            <rect x="338" y="208" class="st0" width="5" height="5"/>
                            <rect x="346" y="208" class="st0" width="5" height="5"/>
                            <rect x="354" y="208" class="st0" width="5" height="5"/>
                            <rect x="362" y="208" class="st0" width="5" height="5"/>
                            <rect x="370" y="208" class="st0" width="5" height="5"/>
                            <rect x="378" y="208" class="st0" width="5" height="5"/>
                            <rect x="610" y="208" class="st0" width="5" height="5"/>
                            <rect x="178" y="216" class="st0" width="5" height="5"/>
                            <rect x="170" y="216" class="st0" width="5" height="5"/>
                            <rect x="162" y="216" class="st0" width="5" height="5"/>
                            <rect x="186" y="216" class="st0" width="5" height="5"/>
                            <rect x="194" y="216" class="st0" width="5" height="5"/>
                            <rect x="202" y="216" class="st0" width="5" height="5"/>
                            <rect x="210" y="216" class="st0" width="5" height="5"/>
                            <rect x="218" y="216" class="st0" width="5" height="5"/>
                            <rect x="226" y="216" class="st0" width="5" height="5"/>
                            <rect x="234" y="216" class="st0" width="5" height="5"/>
                            <rect x="330" y="216" class="st0" width="5" height="5"/>
                            <rect x="338" y="216" class="st0" width="5" height="5"/>
                            <rect x="346" y="216" class="st0" width="5" height="5"/>
                            <rect x="354" y="216" class="st0" width="5" height="5"/>
                            <rect x="362" y="216" class="st0" width="5" height="5"/>
                            <rect x="370" y="216" class="st0" width="5" height="5"/>
                            <rect x="378" y="216" class="st0" width="5" height="5"/>
                            <rect x="554" y="216" class="st0" width="5" height="5"/>
                            <rect x="562" y="216" class="st0" width="5" height="5"/>
                            <rect x="178" y="224" class="st0" width="5" height="5"/>
                            <rect x="170" y="224" class="st0" width="5" height="5"/>
                            <rect x="186" y="224" class="st0" width="5" height="5"/>
                            <rect x="194" y="224" class="st0" width="5" height="5"/>
                            <rect x="202" y="224" class="st0" width="5" height="5"/>
                            <rect x="210" y="224" class="st0" width="5" height="5"/>
                            <rect x="218" y="224" class="st0" width="5" height="5"/>
                            <rect x="226" y="224" class="st0" width="5" height="5"/>
                            <rect x="330" y="224" class="st0" width="5" height="5"/>
                            <rect x="338" y="224" class="st0" width="5" height="5"/>
                            <rect x="346" y="224" class="st0" width="5" height="5"/>
                            <rect x="354" y="224" class="st0" width="5" height="5"/>
                            <rect x="362" y="224" class="st0" width="5" height="5"/>
                            <rect x="370" y="224" class="st0" width="5" height="5"/>
                            <rect x="378" y="224" class="st0" width="5" height="5"/>
                            <rect x="394" y="224" class="st0" width="5" height="5"/>
                            <rect x="538" y="224" class="st0" width="5" height="5"/>
                            <rect x="546" y="224" class="st0" width="5" height="5"/>
                            <rect x="554" y="224" class="st0" width="5" height="5"/>
                            <rect x="562" y="224" class="st0" width="5" height="5"/>
                            <rect x="578" y="224" class="st0" width="5" height="5"/>
                            <rect x="642" y="224" class="st0" width="5" height="5"/>
                            <rect x="178" y="232" class="st0" width="5" height="5"/>
                            <rect x="170" y="232" class="st0" width="5" height="5"/>
                            <rect x="186" y="232" class="st0" width="5" height="5"/>
                            <rect x="194" y="232" class="st0" width="5" height="5"/>
                            <rect x="202" y="232" class="st0" width="5" height="5"/>
                            <rect x="210" y="232" class="st0" width="5" height="5"/>
                            <rect x="218" y="232" class="st0" width="5" height="5"/>
                            <rect x="226" y="232" class="st0" width="5" height="5"/>
                            <rect x="330" y="232" class="st0" width="5" height="5"/>
                            <rect x="338" y="232" class="st0" width="5" height="5"/>
                            <rect x="346" y="232" class="st0" width="5" height="5"/>
                            <rect x="354" y="232" class="st0" width="5" height="5"/>
                            <rect x="362" y="232" class="st0" width="5" height="5"/>
                            <rect x="370" y="232" class="st0" width="5" height="5"/>
                            <rect x="386" y="232" class="st0" width="5" height="5"/>
                            <rect x="394" y="232" class="st0" width="5" height="5"/>
                            <rect x="530" y="232" class="st0" width="5" height="5"/>
                            <rect x="538" y="232" class="st0" width="5" height="5"/>
                            <rect x="546" y="232" class="st0" width="5" height="5"/>
                            <rect x="554" y="232" class="st0" width="5" height="5"/>
                            <rect x="562" y="232" class="st0" width="5" height="5"/>
                            <rect x="570" y="232" class="st0" width="5" height="5"/>
                            <rect x="578" y="232" class="st0" width="5" height="5"/>
                            <rect x="586" y="232" class="st0" width="5" height="5"/>
                            <rect x="618" y="232" class="st0" width="5" height="5"/>
                            <rect x="178" y="240" class="st0" width="5" height="5"/>
                            <rect x="170" y="240" class="st0" width="5" height="5"/>
                            <rect x="186" y="240" class="st0" width="5" height="5"/>
                            <rect x="194" y="240" class="st0" width="5" height="5"/>
                            <rect x="202" y="240" class="st0" width="5" height="5"/>
                            <rect x="210" y="240" class="st0" width="5" height="5"/>
                            <rect x="338" y="240" class="st0" width="5" height="5"/>
                            <rect x="346" y="240" class="st0" width="5" height="5"/>
                            <rect x="354" y="240" class="st0" width="5" height="5"/>
                            <rect x="362" y="240" class="st0" width="5" height="5"/>
                            <rect x="370" y="240" class="st0" width="5" height="5"/>
                            <rect x="394" y="240" class="st0" width="5" height="5"/>
                            <rect x="522" y="240" class="st0" width="5" height="5"/>
                            <rect x="530" y="240" class="st0" width="5" height="5"/>
                            <rect x="538" y="240" class="st0" width="5" height="5"/>
                            <rect x="546" y="240" class="st0" width="5" height="5"/>
                            <rect x="554" y="240" class="st0" width="5" height="5"/>
                            <rect x="562" y="240" class="st0" width="5" height="5"/>
                            <rect x="570" y="240" class="st0" width="5" height="5"/>
                            <rect x="578" y="240" class="st0" width="5" height="5"/>
                            <rect x="586" y="240" class="st0" width="5" height="5"/>
                            <rect x="594" y="240" class="st0" width="5" height="5"/>
                            <rect x="626" y="240" class="st0" width="5" height="5"/>
                            <rect x="178" y="248" class="st0" width="5" height="5"/>
                            <rect x="170" y="248" class="st0" width="5" height="5"/>
                            <rect x="186" y="248" class="st0" width="5" height="5"/>
                            <rect x="194" y="248" class="st0" width="5" height="5"/>
                            <rect x="202" y="248" class="st0" width="5" height="5"/>
                            <rect x="210" y="248" class="st0" width="5" height="5"/>
                            <rect x="338" y="248" class="st0" width="5" height="5"/>
                            <rect x="346" y="248" class="st0" width="5" height="5"/>
                            <rect x="354" y="248" class="st0" width="5" height="5"/>
                            <rect x="362" y="248" class="st0" width="5" height="5"/>
                            <rect x="522" y="248" class="st0" width="5" height="5"/>
                            <rect x="530" y="248" class="st0" width="5" height="5"/>
                            <rect x="538" y="248" class="st0" width="5" height="5"/>
                            <rect x="546" y="248" class="st0" width="5" height="5"/>
                            <rect x="554" y="248" class="st0" width="5" height="5"/>
                            <rect x="562" y="248" class="st0" width="5" height="5"/>
                            <rect x="570" y="248" class="st0" width="5" height="5"/>
                            <rect x="578" y="248" class="st0" width="5" height="5"/>
                            <rect x="586" y="248" class="st0" width="5" height="5"/>
                            <rect x="594" y="248" class="st0" width="5" height="5"/>
                            <rect x="602" y="248" class="st0" width="5" height="5"/>
                            <rect x="178" y="256" class="st0" width="5" height="5"/>
                            <rect x="170" y="256" class="st0" width="5" height="5"/>
                            <rect x="186" y="256" class="st0" width="5" height="5"/>
                            <rect x="194" y="256" class="st0" width="5" height="5"/>
                            <rect x="202" y="256" class="st0" width="5" height="5"/>
                            <rect x="338" y="256" class="st0" width="5" height="5"/>
                            <rect x="346" y="256" class="st0" width="5" height="5"/>
                            <rect x="354" y="256" class="st0" width="5" height="5"/>
                            <rect x="362" y="256" class="st0" width="5" height="5"/>
                            <rect x="530" y="256" class="st0" width="5" height="5"/>
                            <rect x="538" y="256" class="st0" width="5" height="5"/>
                            <rect x="546" y="256" class="st0" width="5" height="5"/>
                            <rect x="562" y="256" class="st0" width="5" height="5"/>
                            <rect x="570" y="256" class="st0" width="5" height="5"/>
                            <rect x="578" y="256" class="st0" width="5" height="5"/>
                            <rect x="586" y="256" class="st0" width="5" height="5"/>
                            <rect x="594" y="256" class="st0" width="5" height="5"/>
                            <rect x="602" y="256" class="st0" width="5" height="5"/>
                            <rect x="178" y="264" class="st0" width="5" height="5"/>
                            <rect x="170" y="264" class="st0" width="5" height="5"/>
                            <rect x="162" y="264" class="st0" width="5" height="5"/>
                            <rect x="186" y="264" class="st0" width="5" height="5"/>
                            <rect x="338" y="264" class="st0" width="5" height="5"/>
                            <rect x="530" y="264" class="st0" width="5" height="5"/>
                            <rect x="578" y="264" class="st0" width="5" height="5"/>
                            <rect x="586" y="264" class="st0" width="5" height="5"/>
                            <rect x="594" y="264" class="st0" width="5" height="5"/>
                            <rect x="642" y="264" class="st0" width="5" height="5"/>
                            <rect x="178" y="272" class="st0" width="5" height="5"/>
                            <rect x="170" y="272" class="st0" width="5" height="5"/>
                            <rect x="162" y="272" class="st0" width="5" height="5"/>
                            <rect x="586" y="272" class="st0" width="5" height="5"/>
                            <rect x="642" y="272" class="st0" width="5" height="5"/>
                            <rect x="650" y="272" class="st0" width="5" height="5"/>
                            <rect x="178" y="280" class="st0" width="5" height="5"/>
                            <rect x="170" y="280" class="st0" width="5" height="5"/>
                            <rect x="162" y="280" class="st0" width="5" height="5"/>
                            <rect x="586" y="280" class="st0" width="5" height="5"/>
                            <rect x="594" y="280" class="st0" width="5" height="5"/>
                            <rect x="634" y="280" class="st0" width="5" height="5"/>
                            <rect x="642" y="280" class="st0" width="5" height="5"/>
                            <rect x="170" y="288" class="st0" width="5" height="5"/>
                            <rect x="162" y="288" class="st0" width="5" height="5"/>
                            <rect x="634" y="288" class="st0" width="5" height="5"/>
                            <rect x="170" y="296" class="st0" width="5" height="5"/>
                            <rect x="162" y="296" class="st0" width="5" height="5"/>
                            <rect x="154" y="296" class="st0" width="5" height="5"/>
                            <rect x="170" y="304" class="st0" width="5" height="5"/>
                            <rect x="162" y="304" class="st0" width="5" height="5"/>
                            <rect x="154" y="304" class="st0" width="5" height="5"/>
                            <rect x="170" y="312" class="st0" width="5" height="5"/>
                            <rect x="162" y="312" class="st0" width="5" height="5"/>
                            </g>
                            <g id="worldmap-us">
                            <rect x="178" y="104" class="st0" width="5" height="5"/>
                            <rect x="170" y="104" class="st0" width="5" height="5"/>
                            <rect x="162" y="104" class="st0" width="5" height="5"/>
                            <rect x="154" y="104" class="st0" width="5" height="5"/>
                            <rect x="146" y="104" class="st0" width="5" height="5"/>
                            <rect x="138" y="104" class="st0" width="5" height="5"/>
                            <rect x="130" y="104" class="st0" width="5" height="5"/>
                            <rect x="122" y="104" class="st0" width="5" height="5"/>
                            <rect x="114" y="104" class="st0" width="5" height="5"/>
                            <rect x="106" y="104" class="st0" width="5" height="5"/>
                            <rect x="98" y="104" class="st0" width="5" height="5"/>
                            <rect x="90" y="104" class="st0" width="5" height="5"/>
                            <rect x="82" y="104" class="st0" width="5" height="5"/>
                            <rect x="186" y="104" class="st0" width="5" height="5"/>
                            <rect x="178" y="112" class="st0" width="5" height="5"/>
                            <rect x="170" y="112" class="st0" width="5" height="5"/>
                            <rect x="162" y="112" class="st0" width="5" height="5"/>
                            <rect x="154" y="112" class="st0" width="5" height="5"/>
                            <rect x="146" y="112" class="st0" width="5" height="5"/>
                            <rect x="138" y="112" class="st0" width="5" height="5"/>
                            <rect x="130" y="112" class="st0" width="5" height="5"/>
                            <rect x="122" y="112" class="st0" width="5" height="5"/>
                            <rect x="114" y="112" class="st0" width="5" height="5"/>
                            <rect x="106" y="112" class="st0" width="5" height="5"/>
                            <rect x="98" y="112" class="st0" width="5" height="5"/>
                            <rect x="90" y="112" class="st0" width="5" height="5"/>
                            <rect x="82" y="112" class="st0" width="5" height="5"/>
                            <rect x="170" y="120" class="st0" width="5" height="5"/>
                            <rect x="162" y="120" class="st0" width="5" height="5"/>
                            <rect x="154" y="120" class="st0" width="5" height="5"/>
                            <rect x="146" y="120" class="st0" width="5" height="5"/>
                            <rect x="138" y="120" class="st0" width="5" height="5"/>
                            <rect x="130" y="120" class="st0" width="5" height="5"/>
                            <rect x="122" y="120" class="st0" width="5" height="5"/>
                            <rect x="114" y="120" class="st0" width="5" height="5"/>
                            <rect x="106" y="120" class="st0" width="5" height="5"/>
                            <rect x="98" y="120" class="st0" width="5" height="5"/>
                            <rect x="90" y="120" class="st0" width="5" height="5"/>
                            <rect x="82" y="120" class="st0" width="5" height="5"/>
                            <rect x="162" y="128" class="st0" width="5" height="5"/>
                            <rect x="154" y="128" class="st0" width="5" height="5"/>
                            <rect x="146" y="128" class="st0" width="5" height="5"/>
                            <rect x="138" y="128" class="st0" width="5" height="5"/>
                            <rect x="130" y="128" class="st0" width="5" height="5"/>
                            <rect x="122" y="128" class="st0" width="5" height="5"/>
                            <rect x="114" y="128" class="st0" width="5" height="5"/>
                            <rect x="106" y="128" class="st0" width="5" height="5"/>
                            <rect x="98" y="128" class="st0" width="5" height="5"/>
                            <rect x="90" y="128" class="st0" width="5" height="5"/>
                            <rect x="154" y="136" class="st0" width="5" height="5"/>
                            <rect x="146" y="136" class="st0" width="5" height="5"/>
                            <rect x="138" y="136" class="st0" width="5" height="5"/>
                            <rect x="130" y="136" class="st0" width="5" height="5"/>
                            <rect x="122" y="136" class="st0" width="5" height="5"/>
                            <rect x="154" y="144" class="st0" width="5" height="5"/>
                            <rect x="50" y="48" class="st0" width="5" height="5"/>
                            <rect x="42" y="48" class="st0" width="5" height="5"/>
                            <rect x="34" y="48" class="st0" width="5" height="5"/>
                            <rect x="26" y="48" class="st0" width="5" height="5"/>
                            <rect x="18" y="48" class="st0" width="5" height="5"/>
                            <rect x="50" y="56" class="st0" width="5" height="5"/>
                            <rect x="42" y="56" class="st0" width="5" height="5"/>
                            <rect x="34" y="56" class="st0" width="5" height="5"/>
                            <rect x="26" y="56" class="st0" width="5" height="5"/>
                            <rect x="18" y="56" class="st0" width="5" height="5"/>
                            <rect x="10" y="56" class="st0" width="5" height="5"/>
                            <rect x="50" y="64" class="st0" width="5" height="5"/>
                            <rect x="42" y="64" class="st0" width="5" height="5"/>
                            <rect x="34" y="64" class="st0" width="5" height="5"/>
                            <rect x="26" y="64" class="st0" width="5" height="5"/>
                            <rect x="18" y="64" class="st0" width="5" height="5"/>
                            <rect x="10" y="64" class="st0" width="5" height="5"/>
                            <rect x="58" y="72" class="st0" width="5" height="5"/>
                            <rect x="34" y="72" class="st0" width="5" height="5"/>
                            <rect x="26" y="72" class="st0" width="5" height="5"/>
                            <rect x="18" y="72" class="st0" width="5" height="5"/>
                            <rect x="2" y="72" class="st0" width="5" height="5"/>
                            <rect x="26" y="80" class="st0" width="5" height="5"/>
                            <rect x="18" y="80" class="st0" width="5" height="5"/>
                            <rect x="10" y="80" class="st0" width="5" height="5"/>
                            <rect x="122" y="96" class="st0" width="5" height="5"/>
                            <rect x="114" y="96" class="st0" width="5" height="5"/>
                            <rect x="106" y="96" class="st0" width="5" height="5"/>
                            <rect x="98" y="96" class="st0" width="5" height="5"/>
                            <rect x="90" y="96" class="st0" width="5" height="5"/>
                            <rect x="82" y="96" class="st0" width="5" height="5"/>
                            </g>
                            <g id="worldmap-eu">
                            <rect x="330" y="16" class="st0" width="5" height="5"/>
                            <rect x="338" y="16" class="st0" width="5" height="5"/>
                            <rect x="346" y="16" class="st0" width="5" height="5"/>
                            <rect x="354" y="16" class="st0" width="5" height="5"/>
                            <rect x="330" y="24" class="st0" width="5" height="5"/>
                            <rect x="346" y="24" class="st0" width="5" height="5"/>
                            <rect x="338" y="48" class="st0" width="5" height="5"/>
                            <rect x="346" y="48" class="st0" width="5" height="5"/>
                            <rect x="354" y="48" class="st0" width="5" height="5"/>
                            <rect x="362" y="48" class="st0" width="5" height="5"/>
                            <rect x="370" y="48" class="st0" width="5" height="5"/>
                            <rect x="266" y="56" class="st0" width="5" height="5"/>
                            <rect x="274" y="56" class="st0" width="5" height="5"/>
                            <rect x="330" y="56" class="st0" width="5" height="5"/>
                            <rect x="338" y="56" class="st0" width="5" height="5"/>
                            <rect x="346" y="56" class="st0" width="5" height="5"/>
                            <rect x="354" y="56" class="st0" width="5" height="5"/>
                            <rect x="362" y="56" class="st0" width="5" height="5"/>
                            <rect x="370" y="56" class="st0" width="5" height="5"/>
                            <rect x="378" y="56" class="st0" width="5" height="5"/>
                            <rect x="266" y="64" class="st0" width="5" height="5"/>
                            <rect x="322" y="64" class="st0" width="5" height="5"/>
                            <rect x="330" y="64" class="st0" width="5" height="5"/>
                            <rect x="338" y="64" class="st0" width="5" height="5"/>
                            <rect x="346" y="64" class="st0" width="5" height="5"/>
                            <rect x="354" y="64" class="st0" width="5" height="5"/>
                            <rect x="362" y="64" class="st0" width="5" height="5"/>
                            <rect x="370" y="64" class="st0" width="5" height="5"/>
                            <rect x="378" y="64" class="st0" width="5" height="5"/>
                            <rect x="298" y="72" class="st0" width="5" height="5"/>
                            <rect x="314" y="72" class="st0" width="5" height="5"/>
                            <rect x="322" y="72" class="st0" width="5" height="5"/>
                            <rect x="330" y="72" class="st0" width="5" height="5"/>
                            <rect x="338" y="72" class="st0" width="5" height="5"/>
                            <rect x="354" y="72" class="st0" width="5" height="5"/>
                            <rect x="362" y="72" class="st0" width="5" height="5"/>
                            <rect x="370" y="72" class="st0" width="5" height="5"/>
                            <rect x="378" y="72" class="st0" width="5" height="5"/>
                            <rect x="298" y="80" class="st0" width="5" height="5"/>
                            <rect x="322" y="80" class="st0" width="5" height="5"/>
                            <rect x="330" y="80" class="st0" width="5" height="5"/>
                            <rect x="346" y="80" class="st0" width="5" height="5"/>
                            <rect x="354" y="80" class="st0" width="5" height="5"/>
                            <rect x="362" y="80" class="st0" width="5" height="5"/>
                            <rect x="370" y="80" class="st0" width="5" height="5"/>
                            <rect x="290" y="88" class="st0" width="5" height="5"/>
                            <rect x="298" y="88" class="st0" width="5" height="5"/>
                            <rect x="306" y="88" class="st0" width="5" height="5"/>
                            <rect x="322" y="88" class="st0" width="5" height="5"/>
                            <rect x="330" y="88" class="st0" width="5" height="5"/>
                            <rect x="338" y="88" class="st0" width="5" height="5"/>
                            <rect x="346" y="88" class="st0" width="5" height="5"/>
                            <rect x="354" y="88" class="st0" width="5" height="5"/>
                            <rect x="362" y="88" class="st0" width="5" height="5"/>
                            <rect x="370" y="88" class="st0" width="5" height="5"/>
                            <rect x="298" y="96" class="st0" width="5" height="5"/>
                            <rect x="306" y="96" class="st0" width="5" height="5"/>
                            <rect x="314" y="96" class="st0" width="5" height="5"/>
                            <rect x="322" y="96" class="st0" width="5" height="5"/>
                            <rect x="330" y="96" class="st0" width="5" height="5"/>
                            <rect x="338" y="96" class="st0" width="5" height="5"/>
                            <rect x="346" y="96" class="st0" width="5" height="5"/>
                            <rect x="354" y="96" class="st0" width="5" height="5"/>
                            <rect x="362" y="96" class="st0" width="5" height="5"/>
                            <rect x="370" y="96" class="st0" width="5" height="5"/>
                            <rect x="378" y="96" class="st0" width="5" height="5"/>
                            <rect x="306" y="104" class="st0" width="5" height="5"/>
                            <rect x="314" y="104" class="st0" width="5" height="5"/>
                            <rect x="322" y="104" class="st0" width="5" height="5"/>
                            <rect x="330" y="104" class="st0" width="5" height="5"/>
                            <rect x="338" y="104" class="st0" width="5" height="5"/>
                            <rect x="346" y="104" class="st0" width="5" height="5"/>
                            <rect x="354" y="104" class="st0" width="5" height="5"/>
                            <rect x="362" y="104" class="st0" width="5" height="5"/>
                            <rect x="370" y="104" class="st0" width="5" height="5"/>
                            <rect x="378" y="104" class="st0" width="5" height="5"/>
                            <rect x="290" y="112" class="st0" width="5" height="5"/>
                            <rect x="298" y="112" class="st0" width="5" height="5"/>
                            <rect x="306" y="112" class="st0" width="5" height="5"/>
                            <rect x="322" y="112" class="st0" width="5" height="5"/>
                            <rect x="330" y="112" class="st0" width="5" height="5"/>
                            <rect x="338" y="112" class="st0" width="5" height="5"/>
                            <rect x="346" y="112" class="st0" width="5" height="5"/>
                            <rect x="354" y="112" class="st0" width="5" height="5"/>
                            <rect x="386" y="112" class="st0" width="5" height="5"/>
                            <rect x="290" y="120" class="st0" width="5" height="5"/>
                            <rect x="298" y="120" class="st0" width="5" height="5"/>
                            <rect x="306" y="120" class="st0" width="5" height="5"/>
                            <rect x="330" y="120" class="st0" width="5" height="5"/>
                            <rect x="346" y="120" class="st0" width="5" height="5"/>
                            <rect x="354" y="120" class="st0" width="5" height="5"/>
                            <rect x="362" y="120" class="st0" width="5" height="5"/>
                            <rect x="370" y="120" class="st0" width="5" height="5"/>
                            <rect x="378" y="120" class="st0" width="5" height="5"/>
                            <rect x="386" y="120" class="st0" width="5" height="5"/>
                            <rect x="322" y="128" class="st0" width="5" height="5"/>
                            </g>
                            <g id="worldmap-asia">
                            <rect x="474" y="8" class="st0" width="5" height="5"/>
                            <rect x="474" y="16" class="st0" width="5" height="5"/>
                            <rect x="482" y="16" class="st0" width="5" height="5"/>
                            <rect x="410" y="24" class="st0" width="5" height="5"/>
                            <rect x="418" y="24" class="st0" width="5" height="5"/>
                            <rect x="426" y="24" class="st0" width="5" height="5"/>
                            <rect x="482" y="24" class="st0" width="5" height="5"/>
                            <rect x="490" y="24" class="st0" width="5" height="5"/>
                            <rect x="498" y="24" class="st0" width="5" height="5"/>
                            <rect x="402" y="32" class="st0" width="5" height="5"/>
                            <rect x="410" y="32" class="st0" width="5" height="5"/>
                            <rect x="458" y="32" class="st0" width="5" height="5"/>
                            <rect x="466" y="32" class="st0" width="5" height="5"/>
                            <rect x="474" y="32" class="st0" width="5" height="5"/>
                            <rect x="482" y="32" class="st0" width="5" height="5"/>
                            <rect x="490" y="32" class="st0" width="5" height="5"/>
                            <rect x="498" y="32" class="st0" width="5" height="5"/>
                            <rect x="546" y="32" class="st0" width="5" height="5"/>
                            <rect x="554" y="32" class="st0" width="5" height="5"/>
                            <rect x="570" y="32" class="st0" width="5" height="5"/>
                            <rect x="402" y="40" class="st0" width="5" height="5"/>
                            <rect x="426" y="40" class="st0" width="5" height="5"/>
                            <rect x="434" y="40" class="st0" width="5" height="5"/>
                            <rect x="442" y="40" class="st0" width="5" height="5"/>
                            <rect x="450" y="40" class="st0" width="5" height="5"/>
                            <rect x="458" y="40" class="st0" width="5" height="5"/>
                            <rect x="466" y="40" class="st0" width="5" height="5"/>
                            <rect x="474" y="40" class="st0" width="5" height="5"/>
                            <rect x="482" y="40" class="st0" width="5" height="5"/>
                            <rect x="490" y="40" class="st0" width="5" height="5"/>
                            <rect x="498" y="40" class="st0" width="5" height="5"/>
                            <rect x="506" y="40" class="st0" width="5" height="5"/>
                            <rect x="514" y="40" class="st0" width="5" height="5"/>
                            <rect x="522" y="40" class="st0" width="5" height="5"/>
                            <rect x="530" y="40" class="st0" width="5" height="5"/>
                            <rect x="538" y="40" class="st0" width="5" height="5"/>
                            <rect x="546" y="40" class="st0" width="5" height="5"/>
                            <rect x="554" y="40" class="st0" width="5" height="5"/>
                            <rect x="562" y="40" class="st0" width="5" height="5"/>
                            <rect x="394" y="48" class="st0" width="5" height="5"/>
                            <rect x="402" y="48" class="st0" width="5" height="5"/>
                            <rect x="410" y="48" class="st0" width="5" height="5"/>
                            <rect x="418" y="48" class="st0" width="5" height="5"/>
                            <rect x="426" y="48" class="st0" width="5" height="5"/>
                            <rect x="434" y="48" class="st0" width="5" height="5"/>
                            <rect x="442" y="48" class="st0" width="5" height="5"/>
                            <rect x="450" y="48" class="st0" width="5" height="5"/>
                            <rect x="458" y="48" class="st0" width="5" height="5"/>
                            <rect x="466" y="48" class="st0" width="5" height="5"/>
                            <rect x="474" y="48" class="st0" width="5" height="5"/>
                            <rect x="482" y="48" class="st0" width="5" height="5"/>
                            <rect x="490" y="48" class="st0" width="5" height="5"/>
                            <rect x="498" y="48" class="st0" width="5" height="5"/>
                            <rect x="506" y="48" class="st0" width="5" height="5"/>
                            <rect x="514" y="48" class="st0" width="5" height="5"/>
                            <rect x="522" y="48" class="st0" width="5" height="5"/>
                            <rect x="530" y="48" class="st0" width="5" height="5"/>
                            <rect x="538" y="48" class="st0" width="5" height="5"/>
                            <rect x="546" y="48" class="st0" width="5" height="5"/>
                            <rect x="554" y="48" class="st0" width="5" height="5"/>
                            <rect x="562" y="48" class="st0" width="5" height="5"/>
                            <rect x="570" y="48" class="st0" width="5" height="5"/>
                            <rect x="578" y="48" class="st0" width="5" height="5"/>
                            <rect x="586" y="48" class="st0" width="5" height="5"/>
                            <rect x="594" y="48" class="st0" width="5" height="5"/>
                            <rect x="602" y="48" class="st0" width="5" height="5"/>
                            <rect x="610" y="48" class="st0" width="5" height="5"/>
                            <rect x="618" y="48" class="st0" width="5" height="5"/>
                            <rect x="386" y="56" class="st0" width="5" height="5"/>
                            <rect x="394" y="56" class="st0" width="5" height="5"/>
                            <rect x="402" y="56" class="st0" width="5" height="5"/>
                            <rect x="410" y="56" class="st0" width="5" height="5"/>
                            <rect x="418" y="56" class="st0" width="5" height="5"/>
                            <rect x="426" y="56" class="st0" width="5" height="5"/>
                            <rect x="434" y="56" class="st0" width="5" height="5"/>
                            <rect x="442" y="56" class="st0" width="5" height="5"/>
                            <rect x="450" y="56" class="st0" width="5" height="5"/>
                            <rect x="458" y="56" class="st0" width="5" height="5"/>
                            <rect x="466" y="56" class="st0" width="5" height="5"/>
                            <rect x="474" y="56" class="st0" width="5" height="5"/>
                            <rect x="482" y="56" class="st0" width="5" height="5"/>
                            <rect x="490" y="56" class="st0" width="5" height="5"/>
                            <rect x="498" y="56" class="st0" width="5" height="5"/>
                            <rect x="506" y="56" class="st0" width="5" height="5"/>
                            <rect x="514" y="56" class="st0" width="5" height="5"/>
                            <rect x="522" y="56" class="st0" width="5" height="5"/>
                            <rect x="530" y="56" class="st0" width="5" height="5"/>
                            <rect x="538" y="56" class="st0" width="5" height="5"/>
                            <rect x="546" y="56" class="st0" width="5" height="5"/>
                            <rect x="554" y="56" class="st0" width="5" height="5"/>
                            <rect x="562" y="56" class="st0" width="5" height="5"/>
                            <rect x="570" y="56" class="st0" width="5" height="5"/>
                            <rect x="578" y="56" class="st0" width="5" height="5"/>
                            <rect x="586" y="56" class="st0" width="5" height="5"/>
                            <rect x="594" y="56" class="st0" width="5" height="5"/>
                            <rect x="602" y="56" class="st0" width="5" height="5"/>
                            <rect x="610" y="56" class="st0" width="5" height="5"/>
                            <rect x="618" y="56" class="st0" width="5" height="5"/>
                            <rect x="626" y="56" class="st0" width="5" height="5"/>
                            <rect x="634" y="56" class="st0" width="5" height="5"/>
                            <rect x="626" y="40" class="st0" width="5" height="5"/>
                            <rect x="642" y="56" class="st0" width="5" height="5"/>
                            <rect x="386" y="64" class="st0" width="5" height="5"/>
                            <rect x="394" y="64" class="st0" width="5" height="5"/>
                            <rect x="402" y="64" class="st0" width="5" height="5"/>
                            <rect x="410" y="64" class="st0" width="5" height="5"/>
                            <rect x="418" y="64" class="st0" width="5" height="5"/>
                            <rect x="426" y="64" class="st0" width="5" height="5"/>
                            <rect x="434" y="64" class="st0" width="5" height="5"/>
                            <rect x="442" y="64" class="st0" width="5" height="5"/>
                            <rect x="450" y="64" class="st0" width="5" height="5"/>
                            <rect x="458" y="64" class="st0" width="5" height="5"/>
                            <rect x="466" y="64" class="st0" width="5" height="5"/>
                            <rect x="474" y="64" class="st0" width="5" height="5"/>
                            <rect x="482" y="64" class="st0" width="5" height="5"/>
                            <rect x="490" y="64" class="st0" width="5" height="5"/>
                            <rect x="498" y="64" class="st0" width="5" height="5"/>
                            <rect x="506" y="64" class="st0" width="5" height="5"/>
                            <rect x="514" y="64" class="st0" width="5" height="5"/>
                            <rect x="522" y="64" class="st0" width="5" height="5"/>
                            <rect x="530" y="64" class="st0" width="5" height="5"/>
                            <rect x="538" y="64" class="st0" width="5" height="5"/>
                            <rect x="546" y="64" class="st0" width="5" height="5"/>
                            <rect x="554" y="64" class="st0" width="5" height="5"/>
                            <rect x="562" y="64" class="st0" width="5" height="5"/>
                            <rect x="570" y="64" class="st0" width="5" height="5"/>
                            <rect x="578" y="64" class="st0" width="5" height="5"/>
                            <rect x="586" y="64" class="st0" width="5" height="5"/>
                            <rect x="594" y="64" class="st0" width="5" height="5"/>
                            <rect x="602" y="64" class="st0" width="5" height="5"/>
                            <rect x="610" y="64" class="st0" width="5" height="5"/>
                            <rect x="618" y="64" class="st0" width="5" height="5"/>
                            <rect x="626" y="64" class="st0" width="5" height="5"/>
                            <rect x="386" y="72" class="st0" width="5" height="5"/>
                            <rect x="394" y="72" class="st0" width="5" height="5"/>
                            <rect x="402" y="72" class="st0" width="5" height="5"/>
                            <rect x="410" y="72" class="st0" width="5" height="5"/>
                            <rect x="418" y="72" class="st0" width="5" height="5"/>
                            <rect x="426" y="72" class="st0" width="5" height="5"/>
                            <rect x="434" y="72" class="st0" width="5" height="5"/>
                            <rect x="442" y="72" class="st0" width="5" height="5"/>
                            <rect x="450" y="72" class="st0" width="5" height="5"/>
                            <rect x="458" y="72" class="st0" width="5" height="5"/>
                            <rect x="466" y="72" class="st0" width="5" height="5"/>
                            <rect x="474" y="72" class="st0" width="5" height="5"/>
                            <rect x="482" y="72" class="st0" width="5" height="5"/>
                            <rect x="490" y="72" class="st0" width="5" height="5"/>
                            <rect x="498" y="72" class="st0" width="5" height="5"/>
                            <rect x="506" y="72" class="st0" width="5" height="5"/>
                            <rect x="514" y="72" class="st0" width="5" height="5"/>
                            <rect x="522" y="72" class="st0" width="5" height="5"/>
                            <rect x="530" y="72" class="st0" width="5" height="5"/>
                            <rect x="538" y="72" class="st0" width="5" height="5"/>
                            <rect x="546" y="72" class="st0" width="5" height="5"/>
                            <rect x="554" y="72" class="st0" width="5" height="5"/>
                            <rect x="562" y="72" class="st0" width="5" height="5"/>
                            <rect x="570" y="72" class="st0" width="5" height="5"/>
                            <rect x="578" y="72" class="st0" width="5" height="5"/>
                            <rect x="586" y="72" class="st0" width="5" height="5"/>
                            <rect x="594" y="72" class="st0" width="5" height="5"/>
                            <rect x="602" y="72" class="st0" width="5" height="5"/>
                            <rect x="610" y="72" class="st0" width="5" height="5"/>
                            <rect x="378" y="80" class="st0" width="5" height="5"/>
                            <rect x="386" y="80" class="st0" width="5" height="5"/>
                            <rect x="394" y="80" class="st0" width="5" height="5"/>
                            <rect x="402" y="80" class="st0" width="5" height="5"/>
                            <rect x="410" y="80" class="st0" width="5" height="5"/>
                            <rect x="418" y="80" class="st0" width="5" height="5"/>
                            <rect x="426" y="80" class="st0" width="5" height="5"/>
                            <rect x="434" y="80" class="st0" width="5" height="5"/>
                            <rect x="442" y="80" class="st0" width="5" height="5"/>
                            <rect x="450" y="80" class="st0" width="5" height="5"/>
                            <rect x="458" y="80" class="st0" width="5" height="5"/>
                            <rect x="466" y="80" class="st0" width="5" height="5"/>
                            <rect x="474" y="80" class="st0" width="5" height="5"/>
                            <rect x="482" y="80" class="st0" width="5" height="5"/>
                            <rect x="490" y="80" class="st0" width="5" height="5"/>
                            <rect x="498" y="80" class="st0" width="5" height="5"/>
                            <rect x="506" y="80" class="st0" width="5" height="5"/>
                            <rect x="514" y="80" class="st0" width="5" height="5"/>
                            <rect x="522" y="80" class="st0" width="5" height="5"/>
                            <rect x="530" y="80" class="st0" width="5" height="5"/>
                            <rect x="538" y="80" class="st0" width="5" height="5"/>
                            <rect x="546" y="80" class="st0" width="5" height="5"/>
                            <rect x="554" y="80" class="st0" width="5" height="5"/>
                            <rect x="586" y="80" class="st0" width="5" height="5"/>
                            <rect x="594" y="80" class="st0" width="5" height="5"/>
                            <rect x="378" y="88" class="st0" width="5" height="5"/>
                            <rect x="386" y="88" class="st0" width="5" height="5"/>
                            <rect x="394" y="88" class="st0" width="5" height="5"/>
                            <rect x="402" y="88" class="st0" width="5" height="5"/>
                            <rect x="410" y="88" class="st0" width="5" height="5"/>
                            <rect x="418" y="88" class="st0" width="5" height="5"/>
                            <rect x="426" y="88" class="st0" width="5" height="5"/>
                            <rect x="434" y="88" class="st0" width="5" height="5"/>
                            <rect x="442" y="88" class="st0" width="5" height="5"/>
                            <rect x="450" y="88" class="st0" width="5" height="5"/>
                            <rect x="458" y="88" class="st0" width="5" height="5"/>
                            <rect x="466" y="88" class="st0" width="5" height="5"/>
                            <rect x="474" y="88" class="st0" width="5" height="5"/>
                            <rect x="482" y="88" class="st0" width="5" height="5"/>
                            <rect x="490" y="88" class="st0" width="5" height="5"/>
                            <rect x="498" y="88" class="st0" width="5" height="5"/>
                            <rect x="506" y="88" class="st0" width="5" height="5"/>
                            <rect x="514" y="88" class="st0" width="5" height="5"/>
                            <rect x="522" y="88" class="st0" width="5" height="5"/>
                            <rect x="530" y="88" class="st0" width="5" height="5"/>
                            <rect x="538" y="88" class="st0" width="5" height="5"/>
                            <rect x="546" y="88" class="st0" width="5" height="5"/>
                            <rect x="554" y="88" class="st0" width="5" height="5"/>
                            <rect x="562" y="88" class="st0" width="5" height="5"/>
                            <rect x="586" y="88" class="st0" width="5" height="5"/>
                            <rect x="594" y="88" class="st0" width="5" height="5"/>
                            <rect x="386" y="96" class="st0" width="5" height="5"/>
                            <rect x="394" y="96" class="st0" width="5" height="5"/>
                            <rect x="402" y="96" class="st0" width="5" height="5"/>
                            <rect x="410" y="96" class="st0" width="5" height="5"/>
                            <rect x="418" y="96" class="st0" width="5" height="5"/>
                            <rect x="426" y="96" class="st0" width="5" height="5"/>
                            <rect x="434" y="96" class="st0" width="5" height="5"/>
                            <rect x="442" y="96" class="st0" width="5" height="5"/>
                            <rect x="450" y="96" class="st0" width="5" height="5"/>
                            <rect x="458" y="96" class="st0" width="5" height="5"/>
                            <rect x="466" y="96" class="st0" width="5" height="5"/>
                            <rect x="474" y="96" class="st0" width="5" height="5"/>
                            <rect x="482" y="96" class="st0" width="5" height="5"/>
                            <rect x="490" y="96" class="st0" width="5" height="5"/>
                            <rect x="498" y="96" class="st0" width="5" height="5"/>
                            <rect x="506" y="96" class="st0" width="5" height="5"/>
                            <rect x="514" y="96" class="st0" width="5" height="5"/>
                            <rect x="522" y="96" class="st0" width="5" height="5"/>
                            <rect x="530" y="96" class="st0" width="5" height="5"/>
                            <rect x="538" y="96" class="st0" width="5" height="5"/>
                            <rect x="546" y="96" class="st0" width="5" height="5"/>
                            <rect x="554" y="96" class="st0" width="5" height="5"/>
                            <rect x="562" y="96" class="st0" width="5" height="5"/>
                            <rect x="386" y="104" class="st0" width="5" height="5"/>
                            <rect x="394" y="104" class="st0" width="5" height="5"/>
                            <rect x="402" y="104" class="st0" width="5" height="5"/>
                            <rect x="410" y="104" class="st0" width="5" height="5"/>
                            <rect x="418" y="104" class="st0" width="5" height="5"/>
                            <rect x="426" y="104" class="st0" width="5" height="5"/>
                            <rect x="434" y="104" class="st0" width="5" height="5"/>
                            <rect x="442" y="104" class="st0" width="5" height="5"/>
                            <rect x="450" y="104" class="st0" width="5" height="5"/>
                            <rect x="458" y="104" class="st0" width="5" height="5"/>
                            <rect x="466" y="104" class="st0" width="5" height="5"/>
                            <rect x="474" y="104" class="st0" width="5" height="5"/>
                            <rect x="482" y="104" class="st0" width="5" height="5"/>
                            <rect x="490" y="104" class="st0" width="5" height="5"/>
                            <rect x="498" y="104" class="st0" width="5" height="5"/>
                            <rect x="506" y="104" class="st0" width="5" height="5"/>
                            <rect x="514" y="104" class="st0" width="5" height="5"/>
                            <rect x="522" y="104" class="st0" width="5" height="5"/>
                            <rect x="530" y="104" class="st0" width="5" height="5"/>
                            <rect x="538" y="104" class="st0" width="5" height="5"/>
                            <rect x="546" y="104" class="st0" width="5" height="5"/>
                            <rect x="554" y="104" class="st0" width="5" height="5"/>
                            <rect x="562" y="104" class="st0" width="5" height="5"/>
                            <rect x="394" y="112" class="st0" width="5" height="5"/>
                            <rect x="402" y="112" class="st0" width="5" height="5"/>
                            <rect x="410" y="112" class="st0" width="5" height="5"/>
                            <rect x="418" y="112" class="st0" width="5" height="5"/>
                            <rect x="426" y="112" class="st0" width="5" height="5"/>
                            <rect x="434" y="112" class="st0" width="5" height="5"/>
                            <rect x="442" y="112" class="st0" width="5" height="5"/>
                            <rect x="450" y="112" class="st0" width="5" height="5"/>
                            <rect x="458" y="112" class="st0" width="5" height="5"/>
                            <rect x="466" y="112" class="st0" width="5" height="5"/>
                            <rect x="474" y="112" class="st0" width="5" height="5"/>
                            <rect x="482" y="112" class="st0" width="5" height="5"/>
                            <rect x="490" y="112" class="st0" width="5" height="5"/>
                            <rect x="498" y="112" class="st0" width="5" height="5"/>
                            <rect x="506" y="112" class="st0" width="5" height="5"/>
                            <rect x="514" y="112" class="st0" width="5" height="5"/>
                            <rect x="522" y="112" class="st0" width="5" height="5"/>
                            <rect x="530" y="112" class="st0" width="5" height="5"/>
                            <rect x="538" y="112" class="st0" width="5" height="5"/>
                            <rect x="562" y="112" class="st0" width="5" height="5"/>
                            <rect x="570" y="112" class="st0" width="5" height="5"/>
                            <rect x="394" y="120" class="st0" width="5" height="5"/>
                            <rect x="402" y="120" class="st0" width="5" height="5"/>
                            <rect x="410" y="120" class="st0" width="5" height="5"/>
                            <rect x="418" y="120" class="st0" width="5" height="5"/>
                            <rect x="426" y="120" class="st0" width="5" height="5"/>
                            <rect x="434" y="120" class="st0" width="5" height="5"/>
                            <rect x="442" y="120" class="st0" width="5" height="5"/>
                            <rect x="450" y="120" class="st0" width="5" height="5"/>
                            <rect x="458" y="120" class="st0" width="5" height="5"/>
                            <rect x="466" y="120" class="st0" width="5" height="5"/>
                            <rect x="474" y="120" class="st0" width="5" height="5"/>
                            <rect x="482" y="120" class="st0" width="5" height="5"/>
                            <rect x="490" y="120" class="st0" width="5" height="5"/>
                            <rect x="498" y="120" class="st0" width="5" height="5"/>
                            <rect x="506" y="120" class="st0" width="5" height="5"/>
                            <rect x="514" y="120" class="st0" width="5" height="5"/>
                            <rect x="522" y="120" class="st0" width="5" height="5"/>
                            <rect x="538" y="120" class="st0" width="5" height="5"/>
                            <rect x="562" y="120" class="st0" width="5" height="5"/>
                            <rect x="394" y="128" class="st0" width="5" height="5"/>
                            <rect x="402" y="128" class="st0" width="5" height="5"/>
                            <rect x="410" y="128" class="st0" width="5" height="5"/>
                            <rect x="418" y="128" class="st0" width="5" height="5"/>
                            <rect x="426" y="128" class="st0" width="5" height="5"/>
                            <rect x="434" y="128" class="st0" width="5" height="5"/>
                            <rect x="442" y="128" class="st0" width="5" height="5"/>
                            <rect x="450" y="128" class="st0" width="5" height="5"/>
                            <rect x="458" y="128" class="st0" width="5" height="5"/>
                            <rect x="466" y="128" class="st0" width="5" height="5"/>
                            <rect x="474" y="128" class="st0" width="5" height="5"/>
                            <rect x="482" y="128" class="st0" width="5" height="5"/>
                            <rect x="490" y="128" class="st0" width="5" height="5"/>
                            <rect x="498" y="128" class="st0" width="5" height="5"/>
                            <rect x="506" y="128" class="st0" width="5" height="5"/>
                            <rect x="514" y="128" class="st0" width="5" height="5"/>
                            <rect x="522" y="128" class="st0" width="5" height="5"/>
                            <rect x="538" y="128" class="st0" width="5" height="5"/>
                            <rect x="546" y="128" class="st0" width="5" height="5"/>
                            <rect x="554" y="128" class="st0" width="5" height="5"/>
                            <rect x="394" y="136" class="st0" width="5" height="5"/>
                            <rect x="402" y="136" class="st0" width="5" height="5"/>
                            <rect x="410" y="136" class="st0" width="5" height="5"/>
                            <rect x="418" y="136" class="st0" width="5" height="5"/>
                            <rect x="426" y="136" class="st0" width="5" height="5"/>
                            <rect x="434" y="136" class="st0" width="5" height="5"/>
                            <rect x="442" y="136" class="st0" width="5" height="5"/>
                            <rect x="450" y="136" class="st0" width="5" height="5"/>
                            <rect x="458" y="136" class="st0" width="5" height="5"/>
                            <rect x="466" y="136" class="st0" width="5" height="5"/>
                            <rect x="474" y="136" class="st0" width="5" height="5"/>
                            <rect x="482" y="136" class="st0" width="5" height="5"/>
                            <rect x="490" y="136" class="st0" width="5" height="5"/>
                            <rect x="498" y="136" class="st0" width="5" height="5"/>
                            <rect x="506" y="136" class="st0" width="5" height="5"/>
                            <rect x="514" y="136" class="st0" width="5" height="5"/>
                            <rect x="522" y="136" class="st0" width="5" height="5"/>
                            <rect x="546" y="136" class="st0" width="5" height="5"/>
                            <rect x="394" y="144" class="st0" width="5" height="5"/>
                            <rect x="402" y="144" class="st0" width="5" height="5"/>
                            <rect x="410" y="144" class="st0" width="5" height="5"/>
                            <rect x="418" y="144" class="st0" width="5" height="5"/>
                            <rect x="426" y="144" class="st0" width="5" height="5"/>
                            <rect x="434" y="144" class="st0" width="5" height="5"/>
                            <rect x="442" y="144" class="st0" width="5" height="5"/>
                            <rect x="450" y="144" class="st0" width="5" height="5"/>
                            <rect x="458" y="144" class="st0" width="5" height="5"/>
                            <rect x="466" y="144" class="st0" width="5" height="5"/>
                            <rect x="474" y="144" class="st0" width="5" height="5"/>
                            <rect x="482" y="144" class="st0" width="5" height="5"/>
                            <rect x="490" y="144" class="st0" width="5" height="5"/>
                            <rect x="498" y="144" class="st0" width="5" height="5"/>
                            <rect x="506" y="144" class="st0" width="5" height="5"/>
                            <rect x="514" y="144" class="st0" width="5" height="5"/>
                            <rect x="522" y="144" class="st0" width="5" height="5"/>
                            <rect x="530" y="144" class="st0" width="5" height="5"/>
                            <rect x="434" y="152" class="st0" width="5" height="5"/>
                            <rect x="442" y="152" class="st0" width="5" height="5"/>
                            <rect x="450" y="152" class="st0" width="5" height="5"/>
                            <rect x="458" y="152" class="st0" width="5" height="5"/>
                            <rect x="466" y="152" class="st0" width="5" height="5"/>
                            <rect x="474" y="152" class="st0" width="5" height="5"/>
                            <rect x="482" y="152" class="st0" width="5" height="5"/>
                            <rect x="490" y="152" class="st0" width="5" height="5"/>
                            <rect x="498" y="152" class="st0" width="5" height="5"/>
                            <rect x="506" y="152" class="st0" width="5" height="5"/>
                            <rect x="514" y="152" class="st0" width="5" height="5"/>
                            <rect x="522" y="152" class="st0" width="5" height="5"/>
                            <rect x="442" y="160" class="st0" width="5" height="5"/>
                            <rect x="450" y="160" class="st0" width="5" height="5"/>
                            <rect x="458" y="160" class="st0" width="5" height="5"/>
                            <rect x="482" y="160" class="st0" width="5" height="5"/>
                            <rect x="490" y="160" class="st0" width="5" height="5"/>
                            <rect x="498" y="160" class="st0" width="5" height="5"/>
                            <rect x="530" y="160" class="st0" width="5" height="5"/>
                            <rect x="442" y="168" class="st0" width="5" height="5"/>
                            <rect x="450" y="168" class="st0" width="5" height="5"/>
                            <rect x="490" y="168" class="st0" width="5" height="5"/>
                            <rect x="498" y="168" class="st0" width="5" height="5"/>
                            <rect x="506" y="168" class="st0" width="5" height="5"/>
                            <rect x="530" y="168" class="st0" width="5" height="5"/>
                            <rect x="538" y="168" class="st0" width="5" height="5"/>
                            <rect x="450" y="176" class="st0" width="5" height="5"/>
                            <rect x="458" y="176" class="st0" width="5" height="5"/>
                            <rect x="490" y="176" class="st0" width="5" height="5"/>
                            <rect x="538" y="176" class="st0" width="5" height="5"/>
                            <rect x="490" y="184" class="st0" width="5" height="5"/>
                            <rect x="498" y="184" class="st0" width="5" height="5"/>
                            <rect x="522" y="184" class="st0" width="5" height="5"/>
                            <rect x="490" y="192" class="st0" width="5" height="5"/>
                            <rect x="498" y="192" class="st0" width="5" height="5"/>
                            <rect x="514" y="192" class="st0" width="5" height="5"/>
                            <rect x="522" y="192" class="st0" width="5" height="5"/>
                            <rect x="530" y="192" class="st0" width="5" height="5"/>
                            <rect x="538" y="192" class="st0" width="5" height="5"/>
                            <rect x="546" y="192" class="st0" width="5" height="5"/>
                            <rect x="554" y="192" class="st0" width="5" height="5"/>
                            <rect x="498" y="200" class="st0" width="5" height="5"/>
                            <rect x="506" y="200" class="st0" width="5" height="5"/>
                            <rect x="530" y="200" class="st0" width="5" height="5"/>
                            <rect x="546" y="200" class="st0" width="5" height="5"/>
                            <rect x="554" y="200" class="st0" width="5" height="5"/>
                            <rect x="562" y="200" class="st0" width="5" height="5"/>
                            <rect x="570" y="200" class="st0" width="5" height="5"/>
                            <rect x="578" y="200" class="st0" width="5" height="5"/>
                            <rect x="594" y="200" class="st0" width="5" height="5"/>
                            <rect x="514" y="208" class="st0" width="5" height="5"/>
                            <rect x="522" y="208" class="st0" width="5" height="5"/>
                            <rect x="530" y="208" class="st0" width="5" height="5"/>
                            <rect x="538" y="208" class="st0" width="5" height="5"/>
                            <rect x="546" y="208" class="st0" width="5" height="5"/>
                            <rect x="570" y="208" class="st0" width="5" height="5"/>
                            <rect x="578" y="208" class="st0" width="5" height="5"/>
                            <rect x="586" y="208" class="st0" width="5" height="5"/>
                            </g>
                            </svg>
                            <div class="supportCenters">
                                <div class="supportCenters__item supportCenters__item--us  supportCenters__item--active" data-supportcenter="us" data-map="us" data-gtm="contact__us"><span>us</span></div>
<!--                                <div class="supportCenters__item supportCenters__item--asia" data-supportcenter="asia" data-map="asia" data-gtm="contact__asia"><span>asia</span></div>
                                <div class="supportCenters__item supportCenters__item--eu-uk" data-supportcenter="eu-uk" data-map="eu" data-gtm="contact__eu-uk"><span>eu</span></div>
                                <div class="supportCenters__item supportCenters__item--latam" data-supportcenter="latam" data-map="latam" data-gtm="contact__latam"><span>latam</span></div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mapContacts__item mapContacts__item--right">
                        <div class="mapContacts__contacts">
                            <div class="contactCards">
                                <div class="contactCards__item contactCards__item--1" data-supportcentercard="us">
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
                                </div>
<!--                                <div class="contactCards__item contactCards__item--2" data-supportcentercard="asia">
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
                                        <p class="contactCards__working responsiveText margin-bottom-0">Mon - Fri, 9am - 6pm (EST)</p>
                                    </div>
                                </div>-->
<!--                                <div class="contactCards__item contactCards__item--3" data-supportcentercard="eu-uk">
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
                                        <p class="contactCards__working responsiveText margin-bottom-0">Mon - Fri, 9am - 6pm (EST)</p>
                                    </div>
                                </div>-->
<!--                                <div class="contactCards__item contactCards__item--4" data-supportcentercard="latam">
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
                                        <p class="contactCards__working responsiveText margin-bottom-0">Mon - Fri, 9am - 6pm (EST)</p>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="half-divider"></div>
    </div>
</section>
@endsection
@section('bottomscript')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    .ui-autocomplete {
        max-height: 150px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }
      /* IE 6 doesn't support max-height
       * we use height instead, but this forces the menu to always be this tall
       */
    * html .ui-autocomplete {
        height: 100px;
    }
    .ui-widget-content{
        background-color: transparent;
        font-weight: 700;
        border-radius: 15px;
        background-color: #328605;
    }
    .ui-widget-content li{ 
        color: #fff;
        padding: 5px;
    }
    .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
        border: 1px solid transparent;
        background: #205a02;
        font-weight: normal;
        color: #ffffff;
        border-radius: 10px;
    }
</style>
<script>
  $(function() {
    var availableTags = [
<?php  
if(!empty($brands_all)){
    foreach ($brands_all as $key => $value) {
          echo "'$value->title'".",";
    }
}
?>
    ];
    $("#tags").autocomplete({
      source: availableTags
    });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".search_btn").on('click',function(){
            
            var tags = $("#tags").val();
            
            if(tags.trim() == ""){
                $("#tags").addClass('has-error');
            } else {
                $("#tags").removeClass('has-error');
            
                $.ajax({
                    type:"POST",
                    url: BASE_URL + '/dataset/search_brand',
                    data:{'_token':frontend.common.get_csrf_token_value(),'tags':tags},
                    success: function(result){
                        
                        var data = JSON.parse(result);
                        if(data.status == 1){
                            window.location.href = BASE_URL + '/datasets/'+data.data.id;
                        } else if(data.status == 2){
                            window.location.href = BASE_URL + '/datasets';
                        }
                    }
                }); 
            }
        });
    });
</script>
@endsection