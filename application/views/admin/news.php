<div class="container">
    <div class="col-xs-12">
    <a href="<?php echo base_url('Admin/newsAdd'); ?>">A&ntilde;adir noticia</a>
    <br><br><br>
    <?php foreach($news as $item) { ?>
        <div class="post-preview">
            <a href="<?php echo base_url('admin/newsEdit/' . $item->id); ?>">
                <div class="container">
                    <div class="col-xs-4">
                        <h4>
                        <?php echo $item->header; ?>
                        </h4>
                    </div>
                    <div class="col-xs-4">
                        <?php echo $item->subHeader; ?>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo base_url('Admin/DeleteNews') . '/' . $item->id; ?>">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </div>
                </div>
            </a>
        </div>
        <hr>
    <?php }; ?>
    </div>
</div>