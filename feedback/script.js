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

function cancelSubmission() {
	// Redirect the user to another page or perform any other action
	window.location.href = "../admin/index.php";
}

function submitForm(event) {
	event.preventDefault(); // Prevent form submission
	var rating = document.getElementById('rating').value;
	var subjectType = document.getElementById('subject_type').value;
	var comment = document.getElementById('user_review').value;

	// Check if the rating, subject type, and comment are filled out
	if (rating === "" || subjectType === "" || comment === "") {
			swal("Error!", "Please fill out all fields.", "error");
	} else {
			// Display success message using SweetAlert
			swal("Success!", "Feedback Submitted Successfully", "success")
					.then((value) => {
							// If user clicks OK, submit the form
							if (value) {
									document.getElementById('reviewForm').submit();
							}
					});
	}
}
