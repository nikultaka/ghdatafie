@extends('Frontend.new_layouts.inner_main')

@section('pageTitle',$title)
@section('pageHeadTitle',$title)

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset(ASSET.'new_frontend/css/infographic_detail.css')}}" />
<section class="content ">
    <div class="container">
        <?php echo (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>
        <div class="padding-all-50">
            @if(!empty($infographics))
            <div class="">
                <div class="row article__header">
                    <h3 class="hl-module text-color--gray-light margin-bottom-0">
                        {{$infographics->name}}
                    </h3>
                    <h2 class="hl-article article__title">
                        {{$infographics->title}}
                    </h2>
                </div>

                <div class="row article__meta">
                    <div class="article__editor">
                        @if(isset($infographics->username) && $infographics->username != '')
                        <span>by&nbsp;</span>
                        <div class="infographic__author">
                            <a rel="author" href="mailto:{{$infographics->email}}">{{$infographics->username}}</a>, 
                        </div>&nbsp;
                        @endif

                    </div>
                    <div class="infographic__date infographic__date--published" title="<?php echo date("M d, Y", strtotime($infographics->publish_date)); ?>">
                        <?php echo date("M d, Y", strtotime($infographics->publish_date)); ?>
                    </div>
                    <div class="article__topic showMobile">
                        <i class="fa fa-tag"></i>
                        {{$infographics->title}}
                    </div>
                </div>
            </div>
            <div class="row margin-bottom-15">
                <div class="width70 padding-right-15">
                    <div class="article__contentText">
                        {!! $infographics->description !!}
                    </div>
                </div>
                <div class="width30 padding-left-15 hideMobile">
                    <div class="article__contentEditor">
                        <div class="box contactBox sidebar float-s--none">
                            <div class="contactBox">
                                <div class="img">
                                    <?php
                                    if (isset($infographics->profile_pic) && $infographics->profile_pic != '') {
                                        $path = ASSET . 'upload/image/profile/resize/' . $infographics->profile_pic;
                                        if (file_exists($path)) {
                                            $url = ASSET . 'upload/image/profile/resize/' . $infographics->profile_pic;
                                        } else {
                                            $url = url('/') . '/' . ASSET . 'upload/' . NO_IMAGE_AVAILABLE;
                                        }
                                    } else {
                                        $url = url('/') . '/' . ASSET . 'upload/' . NO_IMAGE_AVAILABLE;
                                    }
                                    ?>
                                    <img src="{{$url}}" alt="{{$infographics->username}}" data-hideonerror="" width="72" height="72">
                                </div>
                                <div class="cInfo">
                                    <div class="contactName" itemprop="author">
                                        {{$infographics->username}}
                                    </div>
                                    <!--                                <div class="contactTitle">
                                                                        Data Journalist
                                                                    </div>-->
                                    <div>
                                        <span class="mail">
                                            <a href="mailto:{{$infographics->email}}">
                                                {{$infographics->email}}
                                            </a>
                                        </span>
    <!--                                    <span class="phone">
                                            +49 (40) 284 841 562
                                        </span>-->
                                    </div>
                                    <p class="contactWorkingHours"></p>
                                </div>
                                <div class="clear">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="article__relativeStatistatic margin-top-15">
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="article__contentGraphic panel-box panelBox--noPadding width100">
                    <div class="flex">
                        <div class="flex_item width70 border-right-gray10-1 bg-white-smoke">
                            <div class="article__graphic" style="overflow: hidden;">
                                <?php
                                if (isset($infographics->image) && $infographics->image != '') {
                                    $url = ASSET . 'upload/infographics/' . $infographics->image;
                                } else {
                                    $url = ASSET . 'upload/' . NO_IMAGE_AVAILABLE;
                                }
                                ?>
                                <img class="margin-bottom-5n" alt="" src="{{url($url)}}" width="757" style="width: 100%;height: 600px;">
                                <!--<img src="https://infographic.statista.com/normal/chartoftheday_18163_fake_accounts_disabled_and_removed_by_facebook_n.jpg" alt="Infographic: Facebook Is Disabling Billions Of Fake Accounts | Statista" class="margin-bottom-5n" data-toggle="modal" data-target="#modal" data-gtm="infographic__graphic" width="757">-->
                            </div>

                            
                            <div class="width70 padding-right-15">
                                <div class="article__contentText">
                                    {!! $infographics->image_data !!}
                                </div>
                            </div>
                        </div>
                        <div class="flex_item width30">
                            <div class="panelBox__section panelBox__section--border article__graphicText">
                                <h3 class="hl-module article__graphicDescription">
                                    Description                                
                                </h3>
                                <p class="article__graphicDescription">
                                    {{$infographics->short_desc}}
                                </p>
    <!--                            <p class="margin-top-7 text-right">
                                    <a class="text--link text-color--gray font-size-xs" href="/statistics/report-content/infographic/18163" title="Report">
                                        <i class="fa fa-flag"></i>
                                            Report                                    
                                    </a>
                                </p>-->
                            </div>
                            <!--                        <div class="panelBox__section panelBox__section--border article__graphicText">
                                                        <a href="<?php echo url('/' . $url); ?>" class="button button--green green button--medium width100" target="_blank" title="Download Chart">
                                                            <i class="fa fa-download"></i>
                                                                Download Chart                
                                                        </a>
                                                    </div>-->
                            <!--                        <div class="panelBox__section panelBox__section--border article__socialmediaBar">
                                                        <div class="margin-bottom-5n">
                                                            <div class="width33 width-s-33 padding-right-7">
                                                                <a class="button button--facebook width100" title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.statista.com%2Fchart%2F18163%2Ffake-accounts-disabled-and-removed-by-facebook%2F" data-gtm="infographic__shareChart--facebook">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </div>
                                                            <div class="width33 width-s-33 padding-left-7 padding-right-7">
                                                                <a class="button button--twitter width100" title="Share on Twitter" href="https://twitter.com/intent/tweet?text=Facebook%20Is%20Disabling%20Billions%20Of%20Fake%20Accounts&amp;url=https%3A%2F%2Fwww.statista.com%2Fchart%2F18163%2Ffake-accounts-disabled-and-removed-by-facebook%2F" data-gtm="infographic__shareChart--twitter">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </div>
                                                            <div class="width33 width-s-33 padding-left-7 padding-right-7">
                                                                <a class="button button--linkedin width100" title="Share on LinkedIn" href="http://www.linkedin.com/shareArticle?url=https%3A%2F%2Fwww.statista.com%2Fchart%2F18163%2Ffake-accounts-disabled-and-removed-by-facebook%2F" data-gtm="infographic__shareChart--linkedin">
                                                                    <i class="fa fa-linkedin"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>-->
                            <!--                        <div id="referenceLink" class="panelBox__section panelBox__section--border article__embedCode border-bottom-gray10-1 hideMobile" data-gtm="infographic__referenceCode">
                                                        <label for="refCode" class="hl-module article__embedCodeLabel">
                                                            URL to be used as 
                                                            <a href="https://www.statista.com/chart/18163/fake-accounts-disabled-and-removed-by-facebook/">
                                                                reference link
                                                            </a>:
                                                        </label>
                                                        <textarea class="article__embedCodeTextarea" name="refCode" id="refCode" readonly="readonly" data-select-all="">
                                                            https://www.statista.com/chart/18163/fake-accounts-disabled-and-removed-by-facebook/
                                                        </textarea>
                                                    </div>-->
                            <!--                        <div class="panelBox__section panelBox__section--border hideMobile" data-gtm="infographic__embedCode">
                                                        <div class="article__embedCode">
                                                            <label for="htmlCode" class="article__embedCodeLabel">
                                                                <span class="hl-module"> 
                                                                    HTML code to embed chart        
                                                                </span>
                                                                <span data-tooltipbubble="" data-title="Can I integrate infographics into my blog or website?" 
                                                                      data-text="Yes, Statista allows the easy integration of many infographics on other websites. 
                                                                      Simply copy the HTML code that is shown for the relevant statistic in order to integrate it. 
                                                                      Our standard is 660 pixels, 
                                                                      but you can customize how the statistic is displayed to suit your site by setting the width and the display size. 
                                                                      Please note that the code must be integrated into the HTML code (not only the text) for WordPress pages and other CMS sites.">
                                                                    <i class="fa fa-info-circle"></i>
                                                                </span>
                                                            </label>
                                                            <textarea class="article__embedCodeTextarea" data-select-all="" name="htmlCode" readonly="readonly">
                                                            &lt;a href="https://www.statista.com/chart/18163/fake-accounts-disabled-and-removed-by-facebook/" 
                                                            title="Infographic: Facebook Is Disabling Billions Of Fake Accounts | Statista"&gt;&lt;img src="https://infographic.statista.com/normal/chartoftheday_18163_fake_accounts_disabled_and_removed_by_facebook_n.jpg" alt="Infographic: Facebook Is Disabling Billions Of Fake Accounts | Statista" width="100%" height="auto" style="width: 100%; height: auto !important; max-width:960px;-ms-interpolation-mode: bicubic;"/&gt;&lt;/a&gt; You will find more infographics at &lt;a href="https://www.statista.com/chartoftheday/"&gt;Statista&lt;/a&gt;
                                                            </textarea>
                                                        </div>
                                                    </div>-->
                        </div>
                    </div>
                </div>
            </div>    
            @else 
            <p style="text-align: center;">No datails available.</p>
            @endif
        </div>
    </div>
</section>


@endsection
@section('bottomscript')
<!--<script src="{!! asset(ASSET.'js/frontend/home.js')!!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        frontend.home.initialize();
    });
</script>-->
@endsection