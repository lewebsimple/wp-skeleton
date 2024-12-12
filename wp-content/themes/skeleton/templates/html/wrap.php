<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?= kaliroots_html_template( 'head' ); ?>
<body class="<?= join( ' ', get_body_class() ) ?>">
<?php is_singular() && the_post(); ?>
<?= kaliroots_html_template( 'partials/loading' ) ?>
<?= kaliroots_html_template( 'partials/app' ) ?>
<?php wp_footer(); ?>
</body>
</html>
