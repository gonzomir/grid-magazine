<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label for="s" class="screen-reader-text"><?php _e( 'Search for:', 'grid-magazine' ); ?></label>
  <input type="search" name="s" id="s" class="search-field" placeholder="<?php echo esc_attr( __( 'Search &hellip;', 'grid-magazine' ) ); ?>" value="<?php get_search_query(); ?>" required />
  <button type="submit"><?php _e( 'Search', 'grid-magazine' ); ?></button>
</form>
