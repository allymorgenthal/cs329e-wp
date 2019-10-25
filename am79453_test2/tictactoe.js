//makes an array of the buttons equivalent to their id numbers
//0 1 2
//3 4 5
//6 7 8
var board = document.getElementsByTagName('input');
var clickNumber = 1;

function play(button) {
	if (button.value == ""){
		if (clickNumber % 2 !== 0) {
			button.value = "X";
			clickNumber ++
			if (checkWinner("X")) {
				alert("X has won!");
			}
		} else {
			button.value = "O";
			clickNumber++;
			if (checkWinner("O")){
				alert("O has won!");
			}
		}
	} else {
		alert("This spot is already taken");
	}
}

function checkWinner(playerVal){
	if (board[0].value == playerVal) {
		if (board[1].value == playerVal && board[2].value == playerVal) {
			return true;
		} else if (board[3].value == playerVal && board[6].value == playerVal) {
			return true;
		} else if (board[4].value == playerVal && board[8].value == playerVal) {
			return true;
		} else {
			return false;
		}
	} else if (board[2].value == playerVal) {
		if (board[4].value == playerVal && board[6].value == playerVal) {
			return true;
		} else if (board[5].value == playerVal && board[8].value == playerVal){
			return true;
		} else {
			return false;
		}
	} else if (board[1].value == playerVal && board[4].value == playerVal && board[7].value == playerVal) {
		return true;
	} else if (board[3].value == playerVal && board[4].value == playerVal && board[5].value == playerVal) {
		return true;
	} else if (board[6].value == playerVal && board[7].value == playerVal && board[8].value == playerVal) {
		return true;
	} else {
		return false;
	}
}



