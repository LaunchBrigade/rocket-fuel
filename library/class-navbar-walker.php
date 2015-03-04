<?php
/**
 * Customize the output of menus for Foundation nav bar classes
 */
class Navbar_Walker extends Walker_Nav_Menu {

	function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
		$element->has_children = !empty($children_elements[$element->ID]);
		$element->classes[] = ($element->current || $element->current_item_ancestor) ? 'active' : '';
		$element->classes[] = ($element->has_children) ? 'has-dropdown' : '';

		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$item_html = '';
		parent::start_el($item_html, $item, $depth, $args);

		$classes = empty($item->classes) ? array() : (array) $item->classes;

		$output .= $item_html;
	}

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "\n<ul class=\"dropdown\">\n";
	}

} // end nav bar walker
