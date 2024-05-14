const allStar = document.querySelectorAll('.rating .star')
const ratingValue = document.querySelector('.rating input')

allStar.forEach((item, idx)=> {
	item.addEventListener('click', function () {
		let click = 0
		ratingValue.value = idx + 1

		allStar.forEach(i=> {
			i.classList.replace('bxs-star', 'bx-star')
			i.classList.remove('active')
		})
		for(let i=0; i<allStar.length; i++) {
			if(i <= idx) {
				allStar[i].classList.replace('bx-star', 'bxs-star')
				allStar[i].classList.add('active')
			} else {
				allStar[i].style.setProperty('--i', click)
				click++
			}
		}
	})
})

const feedback_form = document.getElementById("feedback_form")
const feedbackContainer = document.querySelector ("wrapper")
feedback_form.addEventListener("click", (event)=>{
	event.preventDefault();
	feedbackContainer.style.display = "block";
});



function submitAlert(){
	swal("Success!", 
			"Feedback Submitted Successfully",
	 		"success");
}

function cancelSubmission() {
	// Redirect the user to another page or perform any other action
	window.location.href = "../admin/index.php";
}