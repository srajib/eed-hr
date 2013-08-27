<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 
// file: /app/views/layout/flash_bad.ctp
?>
	<style>
	 
	 .flash_bad { 
		background: #eccecf;
		border:2px solid #9e0b0f;
		padding:10px;
		font-weight:bold;
		}
		
	  .flash_good img, .flash_bad img {
		float:right;
		}
		
	 </style>	
	 
<div class="flash_bad">
	<!--<a href="/" class="cancel"><img src="/img/icons/cross.png" alt="Cross Icon" /></a>-->
	<a href="/" class="cancel">t</a>
	<?php echo $content_for_layout; ?>
</div>