/* chart.js chart examples */

// chart colors
$.ajax({
    url: "back/local.php",
    type: "POST",
    data: { opcion: 7 },
    dataType: "json",
    success: function (res) {
        PorCulto(res.primeiro, res.segundo, res.strong, res.familia, res.ame)
    },
});
function PorCulto(primeiro, segundo, strong, familia, ame) {
    const labels = ['1º Culto', '2º Culto','Strong','Família', 'AME'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Formulários',
            data: [primeiro, segundo, strong, familia, ame],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(255, 159, 64)',
                'rgba(255, 205, 86)',
                'rgba(55, 05, 86)',
                'rgba(55, 205, 86)',

            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgba(55, 05, 86)',
                'rgba(55, 205, 86)',
            ],
            borderWidth: 2,

        }]
    };



    var chBar = document.getElementById("chBar");

    var myBarChart = new Chart(chBar, {
        type: 'bar',
        data: data,
        options: {
            layout: {
                padding: {
                    left: 5,
                    right: 10,
                    top: 5,
                    bottom: 0
                }
            },
            legend: {
                display: false

            },
            tooltips: {
                titleMarginBottom: 2,
                titleFontColor: '#3d3f47',
                titleFontSize: 10,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#4c4e57",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 5,
                yPadding: 5,
                displayColors: false,
                caretPadding: 1,
            },
            scales: {
                y: {
                    beginAtZero: true
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                yAxes: [{
                    ticks: {
                        min: 0,
                        padding: 10,
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
        }
    });
}


$.ajax({
    url: "back/local.php",
    type: "POST",
    data: { opcion: 8 },
    dataType: "json",
    success: function (res) {
        PorConhecer(res.primeiro, res.segundo, res.terceiro, res.quarto, res.quinto)
    },
});

function PorConhecer(primeiro, segundo, terceiro, quarto, quinto) {
    const labels = ['Instagram/Facebook', 'Whatsapp', 'Youtube', 'Passei em frente a igreja', 'Eu fui convidado'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Formulários',
            data: [primeiro, segundo, terceiro, quarto, quinto],
            backgroundColor: [
                'rgb(255, 199, 132)',
                'rgb(25, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(25, 9, 132)',
                'rgba(255, 25, 86)',

            ],
            borderColor: [
                'rgb(255, 199, 132)',
                'rgb(25, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(25, 9, 132)',
                'rgba(255, 25, 86)',
            ],
            hoverOffset: 4,

        }]
    };



    var chBar = document.getElementById("chBar-1");

    var myBarChart = new Chart(chBar, {
        type: 'pie',
        data: data,
        options: {
            legend: {
                display: true,
                align: 'start',
                maxWidth: 10,
            },
            tooltips: {
                titleMarginBottom: 2,
                titleFontColor: '#3d3f47',
                titleFontSize: 10,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#4c4e57",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 5,
                yPadding: 5,
                displayColors: false,
                caretPadding: 1,
            },
        }
    });
}

$.ajax({
    url: "back/local.php",
    type: "POST",
    data: { opcion: 9 },
    dataType: "json",
    success: function (res) {
        PorProxPass(res.primeiro, res.segundo, res.terceiro, res.quarto)
    },
});
function PorProxPass(primeiro, segundo, terceiro, quarto) {
    const labels = ['GR', 'SK', 'PDC', 'OC'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Formulários',
            data: [primeiro, segundo, terceiro, quarto],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(255, 159, 64)',
                'rgba(255, 205, 86)',
                'rgb(25, 9, 132)',

            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(25, 9, 132)',
            ],
            borderWidth: 2,

        }]
    };



    var chBar = document.getElementById("chBar-2");

    var myBarChart = new Chart(chBar, {
        type: 'bar',
        data: data,
        options: {
            layout: {
                padding: {
                    left: 5,
                    right: 10,
                    top: 5,
                    bottom: 0
                }
            },
            legend: {
                display: false

            },
            tooltips: {
                titleMarginBottom: 2,
                titleFontColor: '#3d3f47',
                titleFontSize: 10,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#4c4e57",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 5,
                yPadding: 5,
                displayColors: false,
                caretPadding: 1,
            },
            scales: {
                y: {
                    beginAtZero: true
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                yAxes: [{
                    ticks: {
                        min: 0,
                        padding: 10,
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
        }
    });
}

$.ajax({
    url: "back/local.php",
    type: "POST",
    data: { opcion: 10 },
    dataType: "json",
    success: function (res) {
        PorSexo(res.primeiro, res.segundo)
    },
});

function PorSexo(primeiro, segundo) {
    const labels = ['Femenino', 'Masculino'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Formulários',
            data: [primeiro, segundo],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(25, 9, 132)',
               

            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(25, 9, 132)',
            ],
            hoverOffset: 4,

        }]
    };



    var chBar = document.getElementById("chBar-3");

    var myBarChart = new Chart(chBar, {
        type: 'pie',
        data: data,
        options: {
            legend: {
                display: true,
                align: 'start',
                maxWidth: 10,
            },
            tooltips: {
                titleMarginBottom: 2,
                titleFontColor: '#3d3f47',
                titleFontSize: 10,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#4c4e57",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 5,
                yPadding: 5,
                displayColors: false,
                caretPadding: 1,
            },
        }
    });
}


$.ajax({
    url: "back/local.php",
    type: "POST",
    data: { opcion: 11 },
    dataType: "json",
    success: function (res) {
        PorCivil(res.primeiro, res.segundo, res.terceiro, res.quarto)
    },
});
function PorCivil(primeiro, segundo, terceiro, quarto) {
    const labels = ['Solteiro', 'Casado', 'Divorciado', 'Viúvo'];
    const data = {
        labels: labels,
        datasets: [{
            label: 'Formulários',
            data: [primeiro, segundo, terceiro, quarto],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(255, 159, 64)',
                'rgba(255, 205, 86)',
                'rgb(25, 9, 132)',

            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(25, 9, 132)',
            ],
            borderWidth: 2,

        }]
    };



    var chBar = document.getElementById("chBar-4");

    var myBarChart = new Chart(chBar, {
        type: 'bar',
        data: data,
        options: {
            layout: {
                padding: {
                    left: 5,
                    right: 10,
                    top: 5,
                    bottom: 0
                }
            },
            legend: {
                display: false

            },
            tooltips: {
                titleMarginBottom: 2,
                titleFontColor: '#3d3f47',
                titleFontSize: 10,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#4c4e57",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 5,
                yPadding: 5,
                displayColors: false,
                caretPadding: 1,
            },
            scales: {
                y: {
                    beginAtZero: true
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                yAxes: [{
                    ticks: {
                        min: 0,
                        padding: 10,
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
        }
    });
}