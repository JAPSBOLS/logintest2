 
 //Filter Button

const toggleButton = document.getElementById('toggleButton');
const filter = document.getElementById('filter');

let isHidden = true;
toggleButton.addEventListener('click', () => {
    if (isHidden) {
        filter.style.display = 'block';
        toggleButton.textContent = 'Hide Filters';
    } else {
        filter.style.display = 'none';
        toggleButton.textContent = 'Show Filters';
    }
    isHidden = !isHidden;
});

 
 
        const reserveLink = document.getElementById("reserve-link");
        const popupContainer = document.querySelector(".popup-container");
        reserveLink.addEventListener("click", (event) => {
        event.preventDefault();
        popupContainer.style.display = "block";
        });
        
        const closePopup = document.getElementById("closeForm");
        closePopup.addEventListener("click", (event) => {
        event.preventDefault();
        popupContainer.style.display = "none";
        });


function IsNumeric(n) {
    return !isNaN(n);
  }
  
  const generateButton = document.querySelector("#reserve-link");
  const lowInput = document.querySelector("#lownumber");
  const highInput = document.querySelector("#highnumber");
  const randomNumberOutput = document.querySelector("#randomnumber");
  
  generateButton.addEventListener("click", () => {
    var numLow = lowInput.value;
    var numHigh = highInput.value;
  
    var adjustedHigh = parseFloat(numHigh) - parseFloat(numLow) + 1;
  
    var numRand = Math.floor(Math.random() * adjustedHigh) + parseFloat(numLow);
  
    if (
      IsNumeric(numLow) &&
      IsNumeric(numHigh) &&
      parseFloat(numLow) <= parseFloat(numHigh) &&
      numLow != "" &&
      numHigh != ""
    ) {
      randomNumberOutput.innerText = '#' + numRand;
    } else {
      randomNumberOutput.innerText = "Careful now...";
    }
  
    return false;
  });
  
  function goBack() {
    window.history.back();
}


$(document).ready(function() {
    $("#hideContentArea").click(function() {
        $("#contentArea").toggle();
    });
});