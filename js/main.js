function chart(tId,cId) {
  let arrayTh = [];
  let arrayTd = [];
  
  const th = `#${tId} th`;
  const td = `#${tId} td`;
  
  console.log(th);
  console.log(td);
  
  $(function(){
    $(th).each(function(){
      let amountTh = $(this).find('span').text();
      arrayTh.push(amountTh);
    });
    $(td).each(function(){
      let amountTd = $(this).find('span').text();
      arrayTd.push(amountTd);
    });
    console.log(arrayTh);
    console.log(Math.max(...arrayTd));
  });
  
  $(function(){
    var ctx = document.getElementById(cId).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: arrayTh,
            datasets: [{
                label: "",
                data: arrayTd,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                  ticks:{
                    suggestedMax: Math.max(...arrayTd)+1,
                      suggestedMin: 0,
                      stepSize: 1,
                      beginAtZero:true
  
                  }
                }]
            }
        }
    });
  })
  }