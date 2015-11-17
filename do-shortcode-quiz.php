<?php
/*
Plugin Name: DO Shortcode quiz
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_shortcode( 'do-shortcode-quiz', 'do_shortcode_quiz' );
function do_shortcode_quiz( $atts , $content = null ) {
?>
  <div class="do-shortcode-quiz">
    <?php echo $content ?>
  </div>
<?php
}

add_shortcode( 'do-shortcode-question', 'do_shortcode_question' );
function do_shortcode_question( $atts , $content = null ) {
?>
  <div class="do-shortcode-question">
    <?php echo $content ?>
  </div>
<?php
}

add_shortcode( 'do-shortcode-choice', 'do_shortcode_choice' );
function do_shortcode_choice( $atts , $content = null ) {
?>
  <div class="do-shortcode-choice">
    <?php echo $content ?>
  </div>
<?php
}

add_shortcode( 'do-shortcode-answer', 'do_shortcode_answer' );
function do_shortcode_answer( $atts , $content = null ) {
?>
  <div class="do-shortcode-answer">
    <?php echo $content ?>
  </div>
<?php
}
?>
