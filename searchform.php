<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label for="s" class="screen-reader-text"><?php esc_html_e( 'Search for:', 'grid-magazine' ); ?></label>
  <input type="search" name="s" id="s" class="search-field" placeholder="<?php echo esc_attr( __( 'Search &hellip;', 'grid-magazine' ) ); ?>" value="<?php get_search_query(); ?>" required />
  <button type="submit"><?php esc_html_x( 'Search', 'search button label', 'grid-magazine' ); ?></button>
</form>
