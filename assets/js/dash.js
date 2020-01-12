var data1 = $("p#valor1").html();
var data2 = $("p#valor2").html();

var ctx = document.getElementById('chart-dash').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Vencidos', 'A Vencer'],
        datasets: [{
            label: 'valor R$',
            data: [eval(data1), eval(data2)],
            backgroundColor: [
                'rgba(255, 32, 45, 0.5)',
                'rgba(75, 192, 192, 0.5)',
            ],
            borderColor: [
                'rgba(255, 32, 45, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    }
})