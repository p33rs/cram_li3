<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2013, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */
?>
<!doctype html>
<html>
<head>
	<?php echo $this->html->charset();?>
	<title>Cram &gt; <?php echo $this->title(); ?></title>
	<?php echo $this->html->style(array('style.css', 'bootstrap.min.css')); ?>
	<?php echo $this->html->script('jquery.min.js'); ?>
	<?php echo $this->scripts(); ?>
	<?php echo $this->styles(); ?>
	<?php echo $this->html->link('Icon', null, array('type' => 'icon')); ?>
</head>
<body class="">

	<h1>
        cram
	</h1>

    <div id="main" class="content">
        <?php echo $this->content(); ?>
    </div>

</body>
</html>