"use strict";

/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */
var loser = null;  // whether the user has hit a wall

window.onload = function() {
	var boundaries = $$("#maze div.boundary");
	for (var i = 0; i < boundaries.length; i++) {
			boundaries[i].onmouseover = overBoundary;
	}
	$("start").onclick = startClick;
	$("end").onmouseover = overEnd;
  $("maze").onmouseleave = overBody;

};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
	var boundaries = $$("#maze div.boundary");
	if (loser == 0){
		for (var i = 0; i < boundaries.length; i++) {
				//boundaries[i].addClassName("div.youlose");
				boundaries[i].style.backgroundColor = "#ff8888";
		}
		$("status").innerHTML = "You lose! :(";
	}
	loser = 1;
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	loser = 0;
	$("status").innerHTML = "Move your mouse to 'E' without touching any walls";
	var boundaries = $$("#maze div.boundary");
	for (var i = 0; i < boundaries.length; i++) {
			boundaries[i].style.backgroundColor = "#eeeeee";
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
	var boundaries = $$("#maze div.boundary");
	if (loser == 0){
		for (var i = 0; i < boundaries.length; i++) {
				//boundaries[i].addClassName("div.youlose");
				boundaries[i].style.backgroundColor = "#ff8888";
		}
		$("status").innerHTML = "You lose! :(";
	}
	loser = 1;
}