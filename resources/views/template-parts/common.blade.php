<section class="column-box-row">
    <div class="container">
    <div class="row">
        <?php foreach($commons as $common) { ?>
        <div class="col-md-6">
        <h4>{{$common->title}}</h4>
        {!! $common->content !!}
        </div>
        <?php } ?>
    </div>
    </div>
</section>