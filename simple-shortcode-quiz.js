jQuery(document).ready(function() {
  // Scripts. Encapsulated in an anonymous function to avoid conflicts.
  (function($) {
    var updateView = function() {
      var numQuestions = $('.simple-shortcode-question').length;
      var currentQuestionNum = null;
      var count = 1;

      // We need to get the number of the current question
      $('.simple-shortcode-question').each(function(){
        if($(this).hasClass('simple-shortcode-current-question')) {
          currentQuestionNum = count;
        } else {
          count++;
        }
      });

      // Update the next and previous buttons' visibility
      if(currentQuestionNum === 1 || currentQuestionNum === null) {
        $('.simple-shortcode-prev').css('display', 'none');
      } else {
        $('.simple-shortcode-prev').css('display', 'inline-block');
      }

      if(currentQuestionNum === numQuestions) {
        $('.simple-shortcode-next').css('display', 'none');
      } else {
        $('.simple-shortcode-next').css('display', 'inline-block');
      }
    }

    var previousQuestion = function(){
      var currentQuestion = $('.simple-shortcode-question.simple-shortcode-current-question');
      currentQuestion.removeClass('simple-shortcode-current-question');
      currentQuestion.prevAll('.simple-shortcode-question').first().addClass('simple-shortcode-current-question');
      updateView();
    }

    var nextQuestion = function(){
      var currentQuestion = $('.simple-shortcode-question.simple-shortcode-current-question');
      currentQuestion.removeClass('simple-shortcode-current-question');
      currentQuestion.nextAll('.simple-shortcode-question').first().addClass('simple-shortcode-current-question');
      updateView();
    }

    var choiceSelected = function(){
      // First hide all of the other choice messages
      $(this).closest('.simple-shortcode-choice').siblings().find('.simple-shortcode-message').css('display','none');

      // Show the message for the choice we just clicked on
      $(this).parent().find('.simple-shortcode-message').css('display','block');
    }

    // Bind functions to events
    $('.simple-shortcode-next').click(nextQuestion);
    $('.simple-shortcode-prev').click(previousQuestion);
    $('.simple-shortcode-choice input').click(choiceSelected);
    $('.simple-shortcode-hidden-answer').click(function() {
      $(this).find('.temp').css('display', 'none');
      $(this).find('.answer').css('display', 'block');
    });

    // Run the first call of updating the view and set the first question as the first current question
    $('.simple-shortcode-question').first().addClass('simple-shortcode-current-question');
    updateView();
  })( jQuery ); // End scripts
});
