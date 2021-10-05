@extends('web.layouts.main')

@section('content')

<!-- ======= Team Section ======= -->
<section id="team contact-top" class="team section-bg-white" style="margin-top: 150px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3><?= $content->title ?></h3>
            <div class="title-border"></div>
        </div>
        <div class="content-dynamic"><?= $content->content ?></div>
    </div>
</section>
<!-- End Team Section -->

@stop