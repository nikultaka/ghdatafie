
@extends('Frontend.new_layouts.inner_main')

@section('pageTitle',$title)
@section('pageHeadTitle',$title)

@section('content')


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

                        <a href="{{ url('reports/'.$value->id) }}" data-smoothscroll="" class="navBar__link">

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

                <div class="white-box" id="" >

                    <div class="list-title">

                        <h3>{{ $reports_name }} <span>{{ $description }}</span></h3>

                    </div>

                    <div class="row">

                        <div class="col-sm-12 col-md-7">

                            <div class="row">

                                <div class="col-sm-6">

                                    <ul class="checklist">

                                        {{ $description }}

                                    </ul>

                                </div>

                                <div class="col-sm-6">

                                    <ul class="price-list">

                                        <li >Regular price<span class="price">$ {{ $regular_price }} price</span></li>

                                        <li >Corporate Account users <span class="price text-success">$0</span></li>

                                    </ul>

                                </div>

                            </div>

<!--                            <div class="row">

                                <div class="col-sm-12 text-center pt-3">
                                    <a href="{{url('reports/')}}" class="btn btn-light border">Show more </a>
                                </div>

                            </div>-->

                        </div>

                        <div class="col-sm-12 col-md-5">

                            <div class="reports">

                                <div class="row">
                                    @if(!empty($reports))
                                    
                                    <?php $count = 0; ?>
                                    
                                        @foreach($reports as $k => $v)
                                        
                                        <?php $count++ ; 
                                        
                                        if($count < 4) { ?>
                                        
                                        <div class="col-sm-4 text-center image_text"> 

                                            <a href="{{url('reports/book/'.$v->id)}}">

                                                @if(!empty($v->book_icon))
                                                    <img src="{{asset(ASSET.'upload/reports/books_icon/'.$v->book_icon)}}" alt="" class="img-fluid" />
                                                @else
                                                    <img src="{{asset(ASSET.'new_frontend/img/common_book_image.png')}}" alt="" class="img-fluid" />
                                                @endif

                                            </a> 

                                            <h6></h6>

                                        </div>
                                        <?php } ?>
                                        @endforeach
                                        
                                        @else


                                        <div class="col-sm-12 text-center image_text"> 

                                            <p>No data exist.</p>

                                        </div>
                                        @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>         



                @endif



            </div>
        </div>
        
        <div class="row bg-light">
            <div class="col-sm-12 pt-3 text-center">
                <!--<p>Need help with our studies & reports? <a href="">You can find more info in our First Steps guide.</a>--> 
            </div>
            <div class="col-sm-12">
                <div class="white-box" id="" >
                    <div class="list-title">
                        <h3>Most popular {{$reports_name}}<span></span></h3>
                    </div>
                    <div class="row">

                        <div class="col-sm-12" style="padding: 30px 50px;">
                            <div class="reports">
                                <div class="row">
                                    @if(!$reports->isEmpty())
                                    @foreach ($reports as $key=>$value)
                                    <div class="col-sm-2 text-center"> 
                                        <a href="{{url('reports/book/'.$value->id)}}">
                                            @if(!empty($value->book_icon))
                                                <img src="{{asset(ASSET.'upload/reports/books_icon/'.$value->book_icon)}}" alt="" class="img-fluid" />
                                            @else
                                                <img src="{{asset(ASSET.'new_frontend/img/common_book_image.png')}}" alt="" class="img-fluid" />
                                            @endif
                                        </a> 

                                        <h6>{{$value->title}}</h6>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="col-sm-12 text-center"> 
                                        <p>No data exist.</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </div>


        <div class="row bg-light">
            <div class="col-sm-12 pt-3 text-center">
                <!--<p>Need help with our studies & reports? <a href="">You can find more info in our First Steps guide.</a>--> 
            </div>
            <div class="col-sm-12">
                <div class="white-box" id="" >
                    <div class="list-title">
                        <h3>All {{$reports_name}}<span></span></h3>
                    </div>
                    <div class="row">

                        <div class="col-sm-12" style="padding: 30px 50px;">
                            <div class="reports">
                                <div class="row">
                                    @if(!$all_reports->isEmpty())
                                    @foreach ($all_reports as $key=>$value)
                                    <div class="col-sm-2 text-center" style="padding: 10px 0px;"> 
                                        <a href="{{url('reports/book/'.$value->id)}}">
                                            @if(!empty($value->book_icon))
                                                <img src="{{asset(ASSET.'upload/reports/books_icon/'.$value->book_icon)}}" alt="" class="img-fluid" />
                                            @else
                                                <img src="{{asset(ASSET.'new_frontend/img/common_book_image.png')}}" alt="" class="img-fluid" />
                                            @endif
                                        </a> 

                                        <h6>{{$value->title}}</h6>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="col-sm-12 text-center"> 
                                        <p>No data exist.</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</section>

@endsection

@section('bottomscript')

@endsection