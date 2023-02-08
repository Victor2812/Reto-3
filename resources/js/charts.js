import Chart from 'chart.js/auto';

(async function() {
    const pieData = [
        { item: "Aprobado", count: 80 , color: 'lightblue'},
        { item: "Suspendido", count: 20, color: 'pink'}
    ];

    new Chart(
        document.getElementById('pieChart'),
        {
        type: 'pie',
        data: {
            labels: pieData.map(row => row.item),
            datasets: [
            {
                label: 'Aprobados $ Suspendidos',
                data: pieData.map(row => row.count),
                backgroundColor: pieData.map(row => row.color)
            }
            ]
        }
        }
    );

    const lineData = [
        { year: "19-20", count: { aprobados: 80, suspensos: 20 } },
        { year: "20-21", count: { aprobados: 60, suspensos: 40 } },
        { year: "21-22", count: { aprobados: 70, suspensos: 30 } },
        { year: "22-23", count: { aprobados: 10, suspensos: 90 } }
    ];

    new Chart(
        document.getElementById('lineChart'),
        {
        type: 'line',
        data: {
            labels: lineData.map(row => row.year),
            datasets: [
            {
                label: 'Aprobados',
                data: lineData,
                backgroundColor: 'blue',
                borderColor: 'blue',
                tension: 0.4,
                parsing: {
                    xAxisKey: 'year',
                    yAxisKey: 'count.aprobados'
                }
            },
            {
                label: 'Suspendidos',
                data: lineData,
                backgroundColor: 'red',
                borderColor: 'red',
                tension: 0.4,
                parsing: {
                    xAxisKey: 'year',
                    yAxisKey: 'count.suspensos'
                }
            }
            ]
        }
        }
    );



})();
