
@if(!empty($brands))
<div class="row">
    @foreach ($brands as $brand)
    <div class="col-md-4 col-lg-3">
        <div class="product-box">
            <div class="product-image">
                <?php if(isset($brand->logo) && $brand->logo != '' ){ 
                    $url =   ASSET.'upload/image/'.$brand->logo;
                }else{
                    $url =   ASSET.'upload/'.NO_IMAGE_AVAILABLE;
                } ?>
                <img src="{{url($url)}}" alt="" style="min-width: 250px;max-height: 225px;">
                </div>
            <h4><a href="{{url('datasets/'.$brand->id)}}">{{$brand->title}} <i><img src="{{asset(ASSET.'new_frontend/img/arrow.svg')}}" alt=""></i></a></h4>
        </div>
    </div>
    @endforeach
</div>
<center>
    {!! $brands->render() !!}
</center>
@endif