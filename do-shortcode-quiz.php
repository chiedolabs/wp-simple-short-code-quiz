<?php
/*
Plugin Name: DO Shortcode quiz
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_shortcode( 'do-shortcode-quiz', 'do_shortcode_quiz' );
function do_shortcode_quiz( $atts , $content = null ) {
  $atts = shortcode_atts( array(
    'title' => '',
  ), $atts, 'do-shortcode-quiz' );
?>
  <div class="do-shortcode-quiz">
    <div class="do-shortcode-title"><?php echo $atts['title'] ?></div>
    <div class="do-shortcode-questions">
      <?php echo do_shortcode($content) ?>
    </div>
  </div>
<?php
}

add_shortcode( 'do-shortcode-question', 'do_shortcode_question' );
function do_shortcode_question( $atts , $content = null ) {
  $atts = shortcode_atts( array(
    'title' => '',
  ), $atts, 'do-shortcode-quiz' );
?>
  <div class="do-shortcode-question">
    <div class="do-shortcode-title"><?php echo $atts['title'] ?></div>
    <div class="do-shortcode-choices">
      <?php echo do_shortcode($content) ?>
    </div>
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
