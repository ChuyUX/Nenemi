<?php
    use Premmerce\Wishlist\WishlistPlugin;
?>

<?php if($product): ?>
    <div data-ajax-inject="wishlist-link--<?= $productId; ?>" >
<?php endif; ?>

    <div class="wishlist-btn-wrap" >

        <?php if(premmerce_wishlist()->checkInWishlist($productId)): ?>
            <a class="button alt" rel="nofollow"
               href="<?php echo get_permalink(get_post(get_option(WishlistPlugin::OPTION_PAGE))); ?>">
                <?php _e('View Wishlists',WishlistPlugin::DOMAIN); ?>
            </a>
        <?php else: ?>
            <button class="button alt" data-modal="<?= $addUrl; ?>">
                <?php _e('Add to Wishlist', WishlistPlugin::DOMAIN) ?>
            </button>
        <?php endif; ?>

    </div>

<?php if($product): ?>
    </div>
<?php endif; ?>