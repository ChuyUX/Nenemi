<?php
    use Premmerce\Wishlist\WishlistPlugin;
?>

<div class="wishlist-btn-wrap">
    <button class="button alt" data-modal="<?= $addUrl; ?>">
        <?php _e('Move',WishlistPlugin::DOMAIN); ?>
    </button>
</div>