@extends('web.layouts.main')

@section('content')

<!-- ======= Team Section ======= -->
<section id="team contact-top" class="team section-bg-white" style="margin-top: 150px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h3><?= $_title ?></h3>
            <div class="title-border"></div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form action="<?= url('forget-password') ?>" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" class="form-control kava-input" name="email" value="<?= old('email') ?>" placeholder="Email" required/>
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-theme btn-main-color" style="width:100%;">Send Email</button></div>
                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</section>
<!-- End Team Section -->


@stop