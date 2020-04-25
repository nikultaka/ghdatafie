@extends('Frontend.new_layouts.inner_main')

@section('pageTitle','Overview studies & reports')
@section('pageHeadTitle','Overview studies & reports')

@section('content')

<section class="content ">
    <div class="container" style="height: 400px;">
        <?php echo  (new \App\Helper\CommonHelper)->get_breadcrumb(); ?>
        <p style="text-align: center;padding-top: 100px;font-size: 20px;">This page is coming soon.</p>
    </div>
</section>
@endsection

