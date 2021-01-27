var backgroundColors = ["red", "blue", "green", "orange"];

$.get('episodes_per_day', function( data ) {
    // divido el tamaño del array en meses
    let months = Math.floor(data.contentX.length / 30);

    let dateTitleRange = "Tus estadísticas desde el " + data.contentY[0] + " al " + data.contentY[data.contentY.length - 1];
    $('<h1>' + dateTitleRange + '</h1>').appendTo("#stats-title");

    // divido dias y episodios en arrays iguales
    let days = chunkArray(data.contentX, months);
    let episodes = chunkArray(data.contentY, months);

    for(let i = 0; i < days.length; i++) {
        var barColors = [];

        episodes[i].forEach(element => {
            var randomColor = Math.floor(Math.random()*16777215).toString(16);
            barColors.push("#" + randomColor);
        });

        loadChart(days[i], episodes[i], i, barColors);
    }
});

function loadChart(days, episodes, id, barColors) {
    var idCanvas = "statsChart_" + id;
    var dateRange = episodes[0] + " al " + episodes[episodes.length - 1];

    $('<h2>Rango de Fechas: ' + dateRange + '</h2>').appendTo("#chart-container");
    $('<canvas id="' + idCanvas + '" width="400" height="150"></canvas>').appendTo("#chart-container");

    var ctx = document.getElementById(idCanvas).getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: episodes,
            datasets: [{
                label: 'Cantidad de contenido visto',
                data: days,
                backgroundColor: barColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}

function chunkArray(myArray, chunk_size){
    var results = [];
    
    while (myArray.length) {
        results.push(myArray.splice(0, chunk_size));
    }
    
    return results;
}