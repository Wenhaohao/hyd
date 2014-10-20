/*
	require once  jquery
*/
define(["finger/modernizrCustom","finger/jqueryFinger","finger/flickerplate"],{
	
	selector: ".flicker-example",
	config: {
			arrows: true, // 	Arrows are used to navigate back and forth between the flicks.
			arrows_constraint: false, //
			auto_flick: true,
			auto_flick_delay: 10,
			block_text: true,
			dot_alignment: 'center',
			dot_navigation: true,
			flick_animation: 'transition-slide',//transition-slide, transform-slide, jquery-slide, scroller-slide, transition-fade, jquery-fade
			flick_position: 1,
			theme: 'dark'
		}
});