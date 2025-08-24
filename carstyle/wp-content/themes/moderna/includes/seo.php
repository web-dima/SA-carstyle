<section class="article" id="article">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div itemscope itemtype="http://schema.org/WebPage">
                    <span itemprop="mainContentOfPage">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>