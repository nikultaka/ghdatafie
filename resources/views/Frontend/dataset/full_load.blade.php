@if(!empty($datasets))
<div class="tab-content">
        <div id="latest-reports" class="tab-pane fade active in">
            <div class="report-listing">
                @foreach($datasets as $dataset)
               <div class="report-block col-md-12">
                    <h4><a href="{{url('/dataset/'.$dataset->fld_dataset_id)}}" title="" class="ptitle">
                                                        <?php echo $dataset->fld_dataset_title ?></a> </h4>
                        <ul class="publshr-name clearfix">
                        <li><i class="fa fa-calendar"></i> On <?php echo date('d/m/y', strtotime($dataset->fld_dataset_created_date));?></li>                                        
                    </ul>
                    <div class="shortdesc clearfix">
                        <p><?php echo $dataset->fld_shortdescription; ?>[...]
                        <a href="{{url('/dataset/'.$dataset->fld_dataset_id)}}" class="showmoretxt" rel="nofollow"> Read More</a>
                                                                </p>
                    </div>
                </div> 
                @endforeach
                
            </div>
        </div>
</div>
<center>
    {!! $datasets->render() !!}
</center>

@endif