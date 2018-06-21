<?php
/**
 * Contains class for registering custom content types.
 *
 * @since 1.0.0
 */

namespace BWP\AdvanceDocs\Core;

/**
 * Registers Custom WordPress Objects.
 */
class Register_Objects {

	/**
	 * Initialises Registration.
	 *
	 * @global array $wp_advance_docs Describes Plugin State
	 *
	 * @since 1.0.0
	 */
	public function init() {

		$types = array();
		$taxonomies = array();
		$product_taxonomies = array();

		array_push( $types, $this->documents() );
		array_push( $taxonomies, $this->categories() );
		array_push( $product_taxonomies, $this->related_products() );

		/**
		 * Filter recognised document post types.
		 *
		 * @param array	$types Document post type objects.
		 *
		 * @since 1.0.0
		 */
		$doc_types = apply_filters('wp_advance_docs/types', $types);

		/**
		 * Filter recognised documentation organisation taxonomies.
		 *
		 * @param array	$taxonomies Document taxonomy objects.
		 *
		 * @since 1.0.0
		 */
		$doc_taxonomies = apply_filters('wp_advance_docs/taxonomies', $taxonomies);

		/**
		 * Filter recognised product relationship taxonomies.
		 *
		 * @param array	$product_taxonomies Document taxonomy objects.
		 *
		 * @since 1.0.0
		 */
		$doc_product_taxonomies = apply_filters('wp_advance_docs/taxonomies', $product_taxonomies);


		global $wp_advance_docs;

		$wp_advance_docs['objects'] = array(
			'types' => $doc_types,
			'taxonomies' => $doc_taxonomies,
			'product_taxonomies' => $doc_product_taxonomies,
		);

	}

	/**
	 * Registers default document post type.
	 *
	 * @since 1.0.0
	 *
	 * @return type
	 */
	public function documents() {

		$labels = array(
			'name' => _x( 'Documents', 'Post Type General Name', 'bwp-advance-docs' ),
			'singular_name' => _x( 'Document', 'Post Type Singular Name', 'bwp-advance-docs' ),
			'menu_name' => __( 'Documentation', 'bwp-advance-docs' ),
			'name_admin_bar' => __( 'Documentation', 'bwp-advance-docs' ),
			'archives' => __( 'Document Archives', 'bwp-advance-docs' ),
			'attributes' => __( 'Document Attributes', 'bwp-advance-docs' ),
			'parent_item_colon' => __( 'Parent Document:', 'bwp-advance-docs' ),
			'all_items' => __( 'All Documents', 'bwp-advance-docs' ),
			'add_new_item' => __( 'Add New Document', 'bwp-advance-docs' ),
			'add_new' => __( 'Add New', 'bwp-advance-docs' ),
			'new_item' => __( 'New Document', 'bwp-advance-docs' ),
			'edit_item' => __( 'Edit Document', 'bwp-advance-docs' ),
			'update_item' => __( 'Update Document', 'bwp-advance-docs' ),
			'view_item' => __( 'View Document', 'bwp-advance-docs' ),
			'view_items' => __( 'View Documents', 'bwp-advance-docs' ),
			'search_items' => __( 'Search Document', 'bwp-advance-docs' ),
			'not_found' => __( 'Not found', 'bwp-advance-docs' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'bwp-advance-docs' ),
			'featured_image' => __( 'Featured Image', 'bwp-advance-docs' ),
			'set_featured_image' => __( 'Set featured image', 'bwp-advance-docs' ),
			'remove_featured_image' => __( 'Remove featured image', 'bwp-advance-docs' ),
			'use_featured_image' => __( 'Use as featured image', 'bwp-advance-docs' ),
			'insert_into_item' => __( 'Insert into document', 'bwp-advance-docs' ),
			'uploaded_to_this_item' => __( 'Uploaded to this document', 'bwp-advance-docs' ),
			'items_list' => __( 'Documents list', 'bwp-advance-docs' ),
			'items_list_navigation' => __( 'Documents list navigation', 'bwp-advance-docs' ),
			'filter_items_list' => __( 'Filter documents list', 'bwp-advance-docs' ),
		);

		$args = array(
			'label' => __( 'Document', 'bwp-advance-docs' ),
			'description' => __( 'Documentation', 'bwp-advance-docs' ),
			'labels' => $labels,
			'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
			'taxonomies' => array( 'doc_category', 'doc_related_product' ),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-media-document',
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'capability_type' => 'page',
			'show_in_rest' => true,
		);

		return register_post_type( 'document', $args );
	}

	/**
	 * Registers default documentation categories.
	 *
	 * @since 1.0.0
	 *
	 * @return object Taxonomy Object
	 */
	public function categories() {

		$labels = array(
			'name' => _x( 'Documentation Categories', 'Taxonomy General Name', 'bwp-advance-docs' ),
			'singular_name' => _x( 'Documentation Category', 'Taxonomy Singular Name', 'bwp-advance-docs' ),
			'menu_name' => __( 'Categories', 'bwp-advance-docs' ),
			'all_items' => __( 'All Doc Categories', 'bwp-advance-docs' ),
			'parent_item' => __( 'Parent Category', 'bwp-advance-docs' ),
			'parent_item_colon' => __( 'Parent Category:', 'bwp-advance-docs' ),
			'new_item_name' => __( 'New Category', 'bwp-advance-docs' ),
			'add_new_item' => __( 'Add New Category', 'bwp-advance-docs' ),
			'edit_item' => __( 'Edit Category', 'bwp-advance-docs' ),
			'update_item' => __( 'Update Category', 'bwp-advance-docs' ),
			'view_item' => __( 'View Category', 'bwp-advance-docs' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'bwp-advance-docs' ),
			'add_or_remove_items' => __( 'Add or remove categories', 'bwp-advance-docs' ),
			'choose_from_most_used' => __( 'Choose from the most used', 'bwp-advance-docs' ),
			'popular_items' => __( 'Popular Categories', 'bwp-advance-docs' ),
			'search_items' => __( 'Search Categories', 'bwp-advance-docs' ),
			'not_found' => __( 'Not Found', 'bwp-advance-docs' ),
			'no_terms' => __( 'No categories', 'bwp-advance-docs' ),
			'items_list' => __( 'Categories list', 'bwp-advance-docs' ),
			'items_list_navigation' => __( 'Categories list navigation', 'bwp-advance-docs' ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'show_in_rest' => true,
		);

		return register_taxonomy( 'doc_category', array( 'document' ), $args );
	}

	/**
	 * Registers default product relationship taxonomy.
	 *
	 * @since 1.0.0
	 *
	 * @return type
	 */
	function related_products() {

		$labels = array(
			'name' => _x( 'Related Products', 'Taxonomy General Name', 'bwp-advance-docs' ),
			'singular_name' => _x( 'Related Product', 'Taxonomy Singular Name', 'bwp-advance-docs' ),
			'menu_name' => __( 'Products', 'bwp-advance-docs' ),
			'all_items' => __( 'All Products', 'bwp-advance-docs' ),
			'parent_item' => __( 'Parent Product', 'bwp-advance-docs' ),
			'parent_item_colon' => __( 'Parent Product:', 'bwp-advance-docs' ),
			'new_item_name' => __( 'New Product', 'bwp-advance-docs' ),
			'add_new_item' => __( 'Add New Product', 'bwp-advance-docs' ),
			'edit_item' => __( 'Edit Product', 'bwp-advance-docs' ),
			'update_item' => __( 'Update Product', 'bwp-advance-docs' ),
			'view_item' => __( 'View Product', 'bwp-advance-docs' ),
			'separate_items_with_commas' => __( 'Separate products with commas', 'bwp-advance-docs' ),
			'add_or_remove_items' => __( 'Add or remove products', 'bwp-advance-docs' ),
			'choose_from_most_used' => __( 'Choose from the most used', 'bwp-advance-docs' ),
			'popular_items' => __( 'Popular Products', 'bwp-advance-docs' ),
			'search_items' => __( 'Search Products', 'bwp-advance-docs' ),
			'not_found' => __( 'Not Found', 'bwp-advance-docs' ),
			'no_terms' => __( 'No products', 'bwp-advance-docs' ),
			'items_list' => __( 'Products list', 'bwp-advance-docs' ),
			'items_list_navigation' => __( 'Products list navigation', 'bwp-advance-docs' ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'show_in_rest' => true,
		);

		return register_taxonomy( 'doc_related_product', array( 'document' ), $args );
	}

}
