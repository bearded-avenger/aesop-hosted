<?php

class AesopSupportBar {

  function __construct(){
      add_action('admin_bar_menu', array($this,'add_toolbar_items'), 100);
  }

	function add_toolbar_items($admin_bar){
			$admin_bar->add_menu( array(
				'id'    => 'aesop-support',
				'title' => __('Aesop Feedback', 'aesop-hosted'),
				'href'  => 'http://aesopstories.uservoice.com',
				'meta'  => array(
					'title' => __('Aesop Feedback'),
				),
			));
	}

}
new AesopSupportBar;