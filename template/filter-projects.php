<?php
$category_project_selected = '';
if ( isset( $_GET['category_project'] ) && $_GET['category_project'] != '' ) {
	$category_project_selected = $_GET['category_project'];
}

?>

<div class="fre-project-filter-box">
    <script type="data/json" id="search_data">
            <?php
		$search_data = $_POST;
		echo json_encode( $search_data );
		?>

    </script>
    <div class="project-filter-header visible-sm visible-xs">
        <a class="project-filter-title" href=""><?php _e( 'Advanced search', ET_DOMAIN ); ?></a>
    </div>
    <div class="fre-project-list-filter">
        <form>
            <div class="row">
                <div class="col-md-4">
                    <div class="fre-input-field">
                        <label for="s" class="fre-field-title"><?php _e( 'Keyword', ET_DOMAIN ); ?></label>
                        <input class="keyword search" id="s" type="text" name="s"
                               placeholder="<?php _e( 'Search projects by keyword', ET_DOMAIN ); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fre-input-field dropdown">
                        <label for="skills" class="fre-field-title"><?php _e( 'Skills', ET_DOMAIN ); ?></label>
                        <input id="skills" class="dropdown-toggle fre-skill-field" readonly type="text"
                               placeholder="<?php _e( 'Search project by skills', ET_DOMAIN ); ?>" data-toggle="dropdown">

						<?php $terms = get_terms( 'skill', array( 'hide_empty' => 0 ) ); ?>
						<?php if ( ! empty( $terms ) ) : ?>
                            <div class="dropdown-menu dropdown-menu-skill">
								<?php if ( count( $terms ) > 7 ) : ?>
                                    <div class="search-skill-dropdown">
                                        <input class="fre-search-skill-dropdown" type="text">
                                    </div>
								<?php endif ?>
                                <ul class="fre-skill-dropdown" data-name="skill">

									<?php
									foreach ( $terms as $key => $value ) {
										echo '<li><a class="fre-skill-item" name="' . $value->slug . '" href="">' . $value->name . '</a></li>';
									}
									?>
                                </ul>
                            </div>
						<?php endif; ?>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="fre-input-field">
                        <label for="country" class="fre-field-title"><?php _e( 'Location', ET_DOMAIN ); ?></label>
						<?php
						ae_tax_dropdown( 'country', array(
								'attr'            => 'data-chosen-width="100%" data-chosen-disable-search="" data-placeholder="' . __( "Select country", ET_DOMAIN ) . '"',
								'class'           => 'fre-chosen-single',
								'hide_empty'      => false,
								'hierarchical'    => true,
								'value'           => 'slug',
								'id'              => 'country',
								'show_option_all' => __( "Select country", ET_DOMAIN )
							)
						);
						?>
                    </div>
                </div>
                
            </div>
            <a class="project-filter-clear clear-filter secondary-color" href=""><?php _e( 'Clear all filters', ET_DOMAIN ); ?></a>
        </form>
    </div>
</div>