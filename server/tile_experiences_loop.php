<div class="wishlist-carousel">
    <div class="wishlist-carousel__item">
<?php
$args = get_query_var('args');
$apiUrl = get_query_var('apiUrl',"not set");
$wishlist_current = get_query_var('wishlist_current');
$query = new WP_Query($args); 
$total_posts =$query->post_count;
$counter=1;
$closed_divs=0;
while ( $query->have_posts() ) : $query->the_post(); ?>
    <?php 
    if ($counter%3==1):
        echo ($counter!=1) ? "</div><div class='row'>" : "<div class='row'>";
        $closed_divs++;
    endif; 

    switch ($total_posts){
        case 1:
            echo "<div class='col-md-12'>";
            break;
        case 2:
            echo "<div class='col-md'>";
            break;
        case ($total_posts>=3):
            switch ($counter){
                case 1:
                    echo "<div class='col-md-6'>";
                    break;
                case ($counter<=3):
                    echo "<div class='col-sm-6 col-md-3'>";
                    break;
                case ($counter>=4):
                    if ($total_posts==6) {
                        if ($counter==4) {
                            echo "<div class='col-md'>";
                            $half_columns = true;
                        }
                        if ($counter==4 || $counter==5) {
                            $half_column="grid-item--half";
                        }
                        if ($counter==6) {
                            echo "</div><div class='col-md'>";
                            $half_column="";
                        }
                    }else if ($counter==7){
                            echo '</div> </div>
                            <div class="wishlist-carousel">
                                <div class="wishlist-carousel__item">
                                    <div class="col-md-12">';
                                    $counter=1;

                    }else{
                            echo "<div class='col-md'>";
                    }
                break;
            }
        break;
    }?>
    <a href="#" class="grid-item <?php echo $half_column; ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);"><!-- 
        <?php if ($wishlist_current!=""): ?>
            <a href="<?php echo wp_nonce_url($apiUrl . $wishlist_current . '/' . get_the_ID(), 'wp_rest') ?>" class="wl-button__remove" title="Delete">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M10-.01a10 10 0 1 0 10 10 10 10 0 0 0-10-10zm0 19a9 9 0 1 1 9-9 9 9 0 0 1-9 9z"/>
                    <path d="M13.72 6.29a1 1 0 0 0-1.4 0l-6 6a1 1 0 0 0 1.4 1.4l6-6a1 1 0 0 0 0-1.4z"/>
                    <path d="M6.31 6.29a1 1 0 0 1 1.4 0l6 6a1 1 0 1 1-1.4 1.4l-6-6a1 1 0 0 1 0-1.4z"/>
                </svg>
            </a>
        <?php endif; ?> -->
        <div class="grid-item__content">
            <h4 class="text-white mb-0"><?php the_title(); ?></h4>
            <div class="grid-item__meta">By: <?php the_author_nickname(); ?> | <?php the_date(); ?></div>
            <p class="grid-item__text"><?php echo get_the_excerpt(); ?></p>
        </div>
    </a>
<?php if (!$half_columns): ?>
            </div>
<?php endif;
$counter++;
endwhile;
for ($i = 1; $i < $closed_divs ; $i++) { 
    echo "</div>";
 } 
wp_reset_postdata(); 
?>
    </div>
</div>

