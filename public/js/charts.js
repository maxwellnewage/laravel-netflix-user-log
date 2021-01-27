var backgroundColors = ["red", "blue", "green", "orange"];

$.get('episodes_per_day', function( data ) {
    // divido el tamaño del array en meses
    let months = Math.floor(data.contentX.length / 30);

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

    $('<canvas id="' + idCanvas + '" width="400" height="100"></canvas>').appendTo("#chart-container");

    var ctx = document.getElementById(idCanvas).getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: episodes,
            datasets: [{
                label: ' ',
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