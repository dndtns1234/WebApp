"use strict";

/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */
var loser = null;  // whether the user has hit a wall

window.onload = function() {
	var boundaries = $$(".boundary");
	for (var i = 0; i < boundaries.length; i++){
		boundaries[i].observe("mouseover", overBoundary);
	}
	$("end").observe("mouseover", overEnd);
  $("maze").observe("mouseleave", overBody);
	$("start").observe("click", startClick);
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
	if (loser == 0){
		var boundaries = $$(".boundary");
		for (var i = 0; i < boundaries.length; i++){
			boundaries[i].addClassName("youlose");
		}
		$("status").innerHTML = "You lose! :(";
	}

	loser = true;
	event.stop();
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	loser = 0;
	$("status").innerHTML = "Move your mouse to 'E' without touching any walls";
	var boundaries = $$(".boundary");
	for (var i = 0; i < boundaries.length; i++) {
			boundaries[i].removeClassName("youlose");
	}
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	if (loser == 0){
			$("status").innerHTML = "You win! :)";
	}
	loser = 1;
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	if (loser == 0){
		var boundaries = $$(".boundary");
		for (var i = 0; i < boundaries.length; i++){
			boundaries[i].addClassName("youlose");
		}
		$("status").innerHTML = "You lose! :(";
	}
	loser = true;
	event.stop();
}
