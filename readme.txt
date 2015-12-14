=== Simple Shortcode Quiz ===
Contributors: chiedolabs, chiedojohn
Tags: shortcode-quiz, quiz
Requires at least: 4.3.1
Tested up to: 4.3.1
Stable tag: 1.0.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Now you can easily create mini-quizzes in your blog posts just using shortcodes. These quizzes would be intended for your readers.

== Description ==

Now you can easily create mini-quizzes in your blog posts just using shortcodes. These quizzes would be intended for your readers. If you need something more complex that allows you to track results, this is not the plugin for you.

== Installation ==

1. Upload to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

Now you can create plugins in your pages and posts. You should do this in text mode as opposed to visual. see the following example:

`
[simple-shortcode-quiz]
  [simple-shortcode-question]
    What is the best movie of all times?
    [simple-shortcode-choice message="This is simply not true"]The Matrix Reloaded[/simple-shortcode-choice]
    [simple-shortcode-choice message="Dang straight." correct=true]The Matrix[/simple-shortcode-choice]
  [/simple-shortcode-question]
  [simple-shortcode-question]
    What is the best food?
    [simple-shortcode-choice message="Just no."]
      Pizza
    [/simple-shortcode-choice]
    [simple-shortcode-choice message="You got it pal!" correct=true]
      Steak
    [/simple-shortcode-choice]
  [/simple-shortcode-question]
[/simple-shortcode-quiz]
`

Or you can create an even more basic quiz with basic text and then show a hidden answer like this:

Where is Paris?
`
[simple-shortcode-hidden-answer]
France
[/simple-shortcode-hidden-answer]
`


== Frequently Asked Questions ==

= How did you create such an awesome plugin? =

With swag.
== Screenshots ==

1. None

== Changelog ==

= 1.0.5 =
* Added simple-shortcode-hidden-answer shortcode
= 0.1 =
* Initial Build
