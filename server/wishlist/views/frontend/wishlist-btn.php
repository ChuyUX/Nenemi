<?php
    use Premmerce\Wishlist\WishlistPlugin;
?>
<?php if($product): ?>
    <div data-ajax-inject="wishlist-link--<?= $productId; ?>" class="d-inline-block">
<?php endif; ?>
<?php if (is_product()): ?>
        <?php if(premmerce_wishlist()->checkInWishlist($productId)): ?>
            <a href="<?php echo get_permalink(get_post(get_option(WishlistPlugin::OPTION_PAGE))); ?>" class="btn btn-sm btn-sm-icon btn-light bg-white" rel="nofollow">
                <svg class="icon" >
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star" aria-labelledby="ViewDesc"></use>
                    <span class="d-none d-sm-inline-block"><?php _e('View Wishlists', 'nenemi_button_element'); ?></span>
                </svg>
            </a>
        <?php else: ?>
            <a href="#" class="btn btn-sm btn-sm-icon btn-light bg-white" rel="nofollow" data-modal="<?= $addUrl; ?>">
                <svg class="icon" >
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-love" aria-labelledby="ViewDesc"></use>
                    <span class="d-none d-sm-inline-block"><?php _e('Add to Wishlist', 'nenemi_button_element'); ?></span>
                </svg>
            </a>
        <?php endif; ?>
<?php else: ?>
        <?php if(premmerce_wishlist()->checkInWishlist($productId)): ?>
            <a href="<?php echo get_permalink(get_post(get_option(WishlistPlugin::OPTION_PAGE))); ?>" class="list-item__actions-item" rel="nofollow">
                <svg class="list-item__actions-icon icon" >
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-star" aria-labelledby="ViewDesc">
                        <title id="ViewDesc"><?php _e('View Wishlists',WishlistPlugin::DOMAIN); ?></title>
                    </use>
                </svg>
            </a>
        <?php else: ?>
            <a href="#" class="list-item__actions-item" data-modal="<?= $addUrl; ?>">
                <svg class="list-item__actions-icon icon" >
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/symbol-defs.svg#icon-love" aria-labelledby="AddDesc">
                        <title id="AddDesc"><?php _e('Add to Wishlist', WishlistPlugin::DOMAIN) ?></title>
                    </use>
                </svg>
            </a>
        <?php endif; ?>
<?php endif; ?>

<?php if($product): ?>
    </div>
<?php endif; ?>