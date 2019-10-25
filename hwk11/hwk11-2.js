class App {

	static init() {
		App.puzzlePiece = document.getElementByClassName('puzzlePiece')[0]
		App.puzzlePiece.addEventListener("dragstart", App.dragstart)
		App.puzzlePiece.addEventListener("dragend", App.dragend)

		const containers = document.getElementByClassName("holder")

		for(const container of containers) {
			container.addEventListener("dragover", App.dragover)
			container.addEventListener("dragenter", App.dragenter)
			container.addEventListener("dragleave", App.dragleave)
			container.addEventListener("drop", App.drop)
		}
	}

	static dragstart() {
		this.className += "held"
		setTimeout(() => this.className = "invisible", 0)
	}

	static dragend() {
		this.className = "box"
	}

	static dragover(e) {
		e.preventDefault()
		this.className += "hovered"
	}

	static dragleave() {
		this.className = "holder"
	}

	static drop() {
		this.className = "holder"
		this.append(App.puzzlePiece)
	}
}

document.addEventListener("DOMContentLoaded", App.init)