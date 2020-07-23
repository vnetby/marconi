<?php
namespace EdgeCore\CPT\CafeMenu;

use EdgeCore\Lib;

/**
 * Class CafeMenuRegister
 * @package EdgeCore\CPT\CafeMenu
 */

class CafeMenuRegister implements Lib\PostTypeInterface {
	/**
	 * @var string
	 */
	private $base;
	/**
	 * @var string
	 */
	private $taxBase;

	public function __construct() {
		$this->base    = 'edgtf-cafe-menu-item';
		$this->taxBase = 'edgtf-cafe-menu-category';
	}

	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function register() {
		$this->registerPostType();
		$this->registerTax();
	}

	/**
	 * Regsiters custom post type with WordPress
	 */
	private function registerPostType() {

		global $barista_edge_Framework;

		$menuPosition = 5;
		$menuIcon     = 'dashicons-list-view';

		register_post_type($this->base,
			array(
				'labels'        => array(
					'name'          => __('Cafe Menu', 'edge-cpt'),
					'menu_name'     => __('Cafe Menu', 'edge-cpt'),
					'all_items'     => __('Cafe Menu Items', 'edge-cpt'),
					'add_new'       => __('Add New Cafe Menu Item', 'edge-cpt'),
					'singular_name' => __('Cafe Menu Item', 'edge-cpt'),
					'add_item'      => __('New Cafe Menu Item', 'edge-cpt'),
					'add_new_item'  => __('Add New Cafe Menu Item', 'edge-cpt'),
					'edit_item'     => __('Edit Cafe Menu Item', 'edge-cpt')
				),
				'public'        => false,
				'show_in_menu'  => true,
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'has_archive'   => false,
				'hierarchical'  => false,
				'supports'      => array('title', 'thumbnail'),
				'menu_icon'     => $menuIcon
			)
		);
	}

	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => __('Cafe Menu Category', 'edge-cpt'),
			'singular_name'     => __('Cafe Menu Category', 'edge-cpt'),
			'search_items'      => __('Search Cafe Menu Categories', 'edge-cpt'),
			'all_items'         => __('All Cafe Menu Categories', 'edge-cpt'),
			'parent_item'       => __('Parent Cafe Menu Category', 'edge-cpt'),
			'parent_item_colon' => __('Parent Cafe Menu Category:', 'edge-cpt'),
			'edit_item'         => __('Edit Cafe Menu Category', 'edge-cpt'),
			'update_item'       => __('Update Cafe Menu Category', 'edge-cpt'),
			'add_new_item'      => __('Add New Cafe Menu Category', 'edge-cpt'),
			'new_item_name'     => __('New Cafe Menu Category Name', 'edge-cpt'),
			'menu_name'         => __('Cafe Menu Categories', 'edge-cpt'),
		);

		register_taxonomy($this->taxBase, array($this->base), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
		));
	}

}