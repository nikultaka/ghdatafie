
@if(!empty($brand))
<h2 style="margin-bottom: 10px;">{{$brand->title}} Datasets </h2>
@endif
@if(!$datasets->isEmpty())
<div class="list_contain">
@foreach($datasets as $dataset)
<div class="row">
    <div class="col-md-12">
        <h4><a href="{{url('/dataset/'.$dataset->fld_dataset_id)}}" class="ptitle">{{$dataset->fld_dataset_title}}</a></h4>
    </div>
    <div class="col-md-12">
        <p class="date_gray"> <i class="fa fa-calendar"></i>
            On 
            <?php echo date('d/m/y', strtotime($dataset->fld_dataset_created_date));?></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p class="short_desc">
            {{$dataset->fld_shortdescription}}[...]
            <a href="{{url('/dataset/'.$dataset->fld_dataset_id)}}" class="show_more" >
                Read more</a>
        </p>
    </div>
</div>
<hr>    
@endforeach
</div>


<center>
    {!! $datasets->render() !!}
</center>

@else

<div class="tab-content">
        <div id="latest-reports" class="tab-pane active in">
            <div class="report-listing">
                <center><p>No dataset exist.</p></center>
                
            </div>
        </div>
</div>

@endif