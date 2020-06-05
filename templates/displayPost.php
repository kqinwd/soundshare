<section>
    <div class="row justify-content-around">
        <?php
        foreach ($items as $item) {
        ?>
            <div class="card mb-5 col-sm-12 col-md-12 col-lg-4" style="max-width: 480px;">
                <?php echo video_iframe_YT($item->link) ?>
                <div class="card-body">
                    <a class="badge badge-dark mb-2" href="?search=<?php echo $item->genre ?>"><?php echo ($item->genre) ?></a>
                    <h5 class="card-title"><?php echo $item->title ?></h5>

                    <p class="card-text text-truncate"><?php echo htmlentities($item->content) ?>
                    </p>
                    <p class="text-secondary font-italic">Posted by <a href="?search=@<?php echo $item->user->username ?>"><?php echo $item->user->username ?></a></p>
                    <div class="row mx-auto">
                        <a href="#" class="btn btn-primary mr-2">View post</a>
                        <a href="#" class="btn btn-outline-secondary">Add to playlist</a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</section>