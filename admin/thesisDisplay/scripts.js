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


