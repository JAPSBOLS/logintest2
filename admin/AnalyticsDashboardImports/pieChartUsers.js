// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

fetch('AnalyticsDashboardImports/getThesisDeptCount.php')
  .then(response => response.json())
  .then(data =>{
    
    var totalCount = document.getElementById('thesisCount')
    var total = 0
    for(i=0;i<data.length;i++){
      // Convert to int then add to total
      total += +data[i].count;
    }
    totalCount.innerHTML = total;
    
    var colors = ['#4e73df', '#99f5d3', '#36b9cc', '#1cb9fc','#256c8a'];
    var bgcolors = [];
    for (var i = 0; i < data.length; i++) {
      bgcolors.push(colors[i % colors.length]);
    }
    
    
    var ctx = document.getElementById("thesisByDept");
    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: data.map(item => item.Th_Department),
        datasets: [{
          data: data.map(item => item.count),
          backgroundColor: bgcolors,
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','#1692c7','#1a4e63'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#000000",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        // cutoutPercentage: 50,
      },
    });
  }
)




fetch('AnalyticsDashboardImports/getStudentsDeptCount.php')
  .then(response => response.json())
  .then(data => {

    var totalCount = document.getElementById('userCount')
    var total = 0
    for(i=0;i<data.length;i++){
      // Convert to int then add to total
      total += +data[i].count;
    }
    totalCount.innerHTML = total;
    

    var colors = ['#4e73df', '#99f5d3', '#36b9cc', '#1cb9fc','#256c8a'];
    var bgcolors = [];
    for (var i = 0; i < data.length; i++) {
      bgcolors.push(colors[i % colors.length]);
    }


    var ctx = document.getElementById("usersByDept");
    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: data.map(item => item.department),
        datasets: [{
          data: data.map(item => item.count),
          backgroundColor: bgcolors,
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','#1692c7','#1a4e63'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#000000",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        // cutoutPercentage: 50,
      },
    });
  })


fetch('AnalyticsDashboardImports/getAvailablePercentage.php')
  .then(response => response.json())
  .then(data =>{
    data = Math.round(data * 100)/100
    var APText = document.getElementById("APText");
    APText.innerHTML = (data*100) + "%";

    var APBar = document.getElementById("APBar");
    APBar.style.width = (data*100) + "%";
  })

  fetch('AnalyticsDashboardImports/getReservRequestCount.php')
  .then(response => response.json())
  .then(data =>{

    var PRText = document.getElementById("PRText");
    PRText.innerHTML = data;
  })