@if(!empty($infographics))
<div class="infographic-list">
    <div class="row">

        @foreach ($infographics as $infographic)
        <div class="col-sm-6">
            <a href="{{url('infographics/'.$infographic->id)}}">
            <div class="white-box p-0">
                <div class="image">
                    <?php
                    if (isset($infographic->image) && $infographic->image != '') {
                        $url = ASSET . 'upload/infographics/thumbnail/' . $infographic->image;
                    } else {
                        $url = ASSET . 'upload/'.NO_IMAGE_AVAILABLE;
                    }
                    ?>
                    <img class="img-fluid" alt="" src="{{url($url)}}">
                </div>

                <div class="p-3">
                    <div class="tag">{{$infographic->title}}</div>
                    <h5>{{$infographic->short_desc}}</h5>
                    <p><?php echo date("M d, Y", strtotime($infographic->created_at)); ?></p>
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="pt-5">
            <center>{!! $infographics->render() !!}</center>
        </div>
    </div>
</div>
@endif
