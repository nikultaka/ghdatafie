

@extends('Frontend.new_layouts.inner_main')



@section('pageTitle',$title)

@section('pageHeadTitle',$title)



@section('content')



<style type="text/css">

/*    .image_text{

        position: relative;

        display: inline-block;  Make the width of box same as image 

    }

    .image_text .text{



        position: absolute;

        z-index: 999;

        margin: 0 auto;

        left: 11%;

        top: 4%;  Adjust this value to move the positioned div up and down 

        background: #0f8de7;

        font-family: Arial,sans-serif;

        font-size: 10px;

        color: #fff !important;

        font-weight: 501 !important;

        width: 60%;  Set the width of the positioned div 

        margin-top: 3px;

    }*/

</style>

<section class="content ">

    <div class="container">

        <?php echo  (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>

        <div class="section-title text-center">

            <h2>Our best studies & reports</h2>

            <p>Tailored to your search demands </p>

        </div>

        <div class="page-filter row">

            <div class="col-sm-12">

                    @if(!$sub_category->isEmpty())

                <ul class="">

                    @foreach ($sub_category as $key=>$value)

                    <li class="navBar__item navBar__item--icon6 navBar__item--icon">

                        <a href="#{{$value->name}}" data-smoothscroll="" class="navBar__link">

                            <i class="navBar__icon dot dot--blue"></i>

                            {{$value->name}}

                        </a>

                    </li>

                    @endforeach

                </ul>

                    @else

                    <center>No category exist.</center>

                    @endif

            </div>

        </div>

        <div class="row bg-light">

            <div class="col-sm-12 pt-3 text-center">

                <p>Need help with our studies & reports? <a href="{{url('overview-studies-reports')}}">You can find more info in our First Steps guide.</a> 

            </div>

            <div class="col-sm-12">



                @if(!empty($reports))

                @foreach ($reports as $key=>$value)



                <div class="white-box" id="{{$value['name']}}" >

                    <div class="list-title">

                        <h3>{{$value['name']}} <span>{{$value['description']}}</span></h3>

                    </div>

                    <div class="row">

                        <div class="col-sm-12 col-md-7">

                            <div class="row">

                                <div class="col-sm-6">

                                    <ul class="checklist">

                                        {!! html_entity_decode($value['description']) !!}

                                    </ul>

                                </div>

                                <div class="col-sm-6">

                                    <ul class="price-list">

                                        <li >Regular price<span class="price">${{$value['price']}}</span></li>

                                        <li >Corporate Account users <span class="price text-success">$0</span></li>

                                    </ul>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-12 text-center pt-3"> <a href="{{url('reports/'.$value['id'])}}" class="btn btn-light border">Show more {{$value['name']}}</a> </div>

                            </div>

                        </div>

                        <div class="col-sm-12 col-md-5">

                            <div class="reports">

                                <div class="row">

                                    <?php



                                    if(!empty($value['details'])){

                                        $count = 0;

                                        foreach ($value['details'] as $k => $v) {

                                       

                                            $count++;

                                            if ($count < 4) {

                                                ?>

                                                <div class="col-sm-4 text-center image_text"> 

                                                    <a href="{{url('reports/book/'.$v->id)}}">

                                                        @if(!empty($v->book_icon))
                                                            <img src="{{asset(ASSET.'upload/reports/books_icon/'.$v->book_icon)}}" alt="" class="img-fluid" />
                                                        @else
                                                            <img src="{{asset(ASSET.'new_frontend/img/common_book_image.png')}}" alt="" class="img-fluid" />
                                                        @endif

                                                    </a> 

    <!--                                                <div class="text">

                                                        {{$value['name']}}

                                                    </div>-->

                                                    <h6>{{$v->title}}</h6>

                                                </div>

                                            <?php

                                            }

                                        }

                                    } else { ?>

                                        <div class="col-sm-12 text-center image_text"> 

                                            <p>No data exist.</p>

                                        </div>

                                    <?php }

                                    ?>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>         



                @endforeach

                @endif



<!--                <div class="row">

                    <div class="col-sm-12">

                        <div class="section-title text-center">

                            <h2>Did not find the right thing yet?</h2>

                            <h3>Search another 32,000 studies in our database.</h3>

                        </div>

                        <div class="search-form mb-5">

                            <form class="homeSearch">

                                <input class="homeSearch__input vue-homeSearch__input" type="search" name="q" maxlength="1024" autocomplete="off" placeholder="Statista Search">

                                <input type="hidden" name="qKat" value="search">

                                <button class="homeSearch__submit button--primary" type="submit" data-gtm="searchButton"> <span class="homeSearch__submitText">Statista Search</span> <i class="fa fa-search" aria-hidden="true"></i> </button>

                            </form>

                        </div>

                    </div>

                </div>-->

            </div>

        </div>

    </div>

</section>

@endsection



@section('bottomscript')



@endsection