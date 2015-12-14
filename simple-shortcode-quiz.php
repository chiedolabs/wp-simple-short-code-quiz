<?php
/*
Plugin Name: Simple Shortcode quiz
Plugin URI: https://wordpress.org/plugins/simple-shortcode-quiz/
Description: Now you can easily create mini-quizzes in your blog posts just using shortcodes. These quizzes would be intended for your readers. If you need something more complex that allows you to track results, this is not the plugin for you.
Version: 1.0.6
Author: Chiedo Labs
Author URI: https://labs.chie.do
License: GPLv2 or later
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action( 'wp_enqueue_scripts', 'simple_shortcode_quiz_scripts' );
function simple_shortcode_quiz_scripts() {
  wp_enqueue_script('simple-shortcode-quiz', plugin_dir_url( __FILE__ ).'simple-shortcode-quiz.js', array("jquery"), "0.1", true);
}

add_shortcode( 'simple-shortcode-quiz', 'simple_shortcode_quiz' );
function simple_shortcode_quiz( $atts , $content = null ) {
  ob_start();
?>
  <style>
    .simple-shortcode-quiz { margin-bottom: 20px; }

    .simple-shortcode-questions > br, .simple-shortcode-questions > p,
    .simple-shortcode-question > br, .simple-shortcode-question > p { display: none; }
    .simple-shortcode-question { display: none; }
    .simple-shortcode-current-question { display: block; }

    .simple-shortcode-choices > br, .simple-shortcode-choices > p,
    .simple-shortcode-choice > br, .simple-shortcode-choice > p { display: none; }

    .simple-shortcode-message { display: none; }
    .simple-shortcode-correct { color: green; }
    .simple-shortcode-incorrect { color: red; }

    .simple-shortcode-nav { margin-top: 10px; }
    .simple-shortcode-btn { background: #000000; color: #ffffff; padding:10px; cursor: pointer; }
    .simple-shortcode-prev, .simple-shortcode-next { display: none }
  </style>
  <div class="simple-shortcode-quiz">
    <div class="simple-shortcode-questions">
      <?php echo do_shortcode($content) ?>
    </div>
    <div class="simple-shortcode-nav">
      <span class="simple-shortcode-prev simple-shortcode-btn">Previous<span class="simple-shortcode-nav-sep">&nbsp;&nbsp;</span></span>
      <span class="simple-shortcode-next simple-shortcode-btn">Next</span>
    </div>
  </div>
<?php
  $result = ob_get_contents ();
  ob_end_clean();
  return $result;
}

add_shortcode( 'simple-shortcode-question', 'simple_shortcode_question' );
function simple_shortcode_question( $atts , $content = null ) {
  ob_start();
?>
  <div class="simple-shortcode-question">
    <form class="simple-shortcode-choices">
      <?php echo do_shortcode($content) ?>
    </form>
  </div>
<?php
  $result = ob_get_contents ();
  ob_end_clean();
  return $result;
}

add_shortcode( 'simple-shortcode-choice', 'simple_shortcode_choice' );
function simple_shortcode_choice( $atts , $content = null ) {
  $atts = shortcode_atts( array(
    'message' => '',
    'correct' => false,
  ), $atts, 'simple-shortcode-choice' );

  if($atts['correct']) {
    $message = "<span class='simple-shortcode-correct'><strong>Correct:</strong> " . $atts['message']. '</span>';
  } else {
    $message = "<span class='simple-shortcode-incorrect'><strong>Incorrect:</strong> " . $atts['message']. '</span>';
  }
  ob_start();
?>
  <div class="simple-shortcode-choice">
    <input type='radio' name="choice"/> <?php echo do_shortcode($content) ?>
    <div class="simple-shortcode-message"><?php echo $message; ?></div>
  </div>
<?php
  $result = ob_get_contents ();
  ob_end_clean();
  return $result;
}

add_shortcode( 'simple-shortcode-hidden-answer', 'simple_shortcode_hidden_answer' );
function simple_shortcode_hidden_answer( $atts , $content = null ) {
  ob_start();
?>
  <div class="simple-shortcode-hidden-answer" style="cursor: pointer; font-weight: 700;">
    <div class="temp">Show answer</div>
    <div class="answer" style="display: none;"><?php echo do_shortcode($content) ?></div>
  </div>
<?php
  $result = ob_get_contents ();
  ob_end_clean();
  return $result;
}
?>
