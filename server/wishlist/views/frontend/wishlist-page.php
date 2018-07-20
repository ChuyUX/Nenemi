<?php

use Premmerce\Wishlist\WishlistPlugin;

global $wishlistPage;
global $wishlist_current;
$wishlistPage = true;

?>
<?php

global $premmerce_wishlist_frontend;

?>

<?php do_action( 'woocommerce_account_navigation' );  ?>


<?php if (count($wishlists) == 0): ?>

<div class="col-md-9 col-lg-10">
    <div class="dashboard">
        <div class="dashboard__headline">
            <h3>Wishlist</h3>
        </div>
        <div class="dashboard__content">
            <div class="text-center">
                <h3 class="mt-5 text-gray">You do not have any added activity on your Wishlist.</h3>
            </div>
        </div>
    </div>
</div>

<?php else : ?>
    <div class="col-md-9 col-lg-10">
        <div class="dashboard">
            <div class="dashboard__headline">
                <h3>Wishlist</h3>
            </div>
            <div class="dashboard__content">
                <div id="accordion" class="accordion">
    	   		<?php foreach ($wishlists as $wl): ?>
				<?php $wishlist_current = $wl; ?>
                  <div class="card">
                    <div class="card-header">
                        <button class="accordion__btn" data-toggle="collapse" data-target="#<?php echo $wl['name']; ?>" aria-expanded="true" aria-controls="<?php echo $wl['name']; ?>">
                        <?php echo $wl['name']; ?>
                      </button>
                    </div>
                    <div id="<?php echo $wl['name']; ?>" class="collapse show" data-parent="#accordion">
                      <div class="card-body">
                        <?php if (!$onlyView): ?>
                            <div class="text-right mb-1">
                                <a href="#" class="btn btn-primary btn-sm pl-4 pr-4 wl-frame__header-link" data-modal="<?= wp_nonce_url($apiUrlWishListRename . $wl['wishlist_key'], 'wp_rest'); ?>">Rename</a>
                                <a href="<?php echo wp_nonce_url($apiUrlWishListDelete . $wl['wishlist_key'], 'wp_rest'); ?>" class="btn btn-primary btn-sm pl-4 pr-4 wl-frame__header-link">Delete</a>
                            </div>
                        <?php endif; ?>
                        <?php 
                        if ($wl['products']):
                            $productsIds = array_map(function($product){
                            return $product->get_ID();
                            },$wl['products']);
                            $args = array(
                                'post_type' => 'product',
                                'post__in' => $productsIds
                            ); 
                            echo "<pre>" . print_r($productsIds) . "</pre>";
                            $apiUrl = site_url('wp-json/premmerce/wishlist/delete/');
                            set_query_var( 'args', $args );
                            set_query_var( 'apiUrl', $apiUrl );
                            set_query_var( 'wishlist_current', $wishlist_current['wishlist_key'] );
                            get_template_part('tile_experiences_loop','loop');
                        ?>
                        <?php else: ?>
                            <div class="text-center">
                                <h3 class="mt-5 text-gray">You do not have any added activity on this Wishlist.</h3>
                            </div>
                        <?php endif; ?>
                      </div>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
</div>
<?php $wishlistPage = false; ?>