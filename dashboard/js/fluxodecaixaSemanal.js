// colorsLight2colorsLight2Cores para os modos claro e escuro
const colorsLight2 = {
    background: '#F9F9F9',
    text: '#342e37',
    lineReceitas: '#4BC0C0', 
    lineDespesas: '#FF6384', 
};

const colorsDark2 = {
    background: '#0C0C1E',
    text: '#FBFBFB',
    lineReceitas: '#4BC0C0', 
    lineDespesas: '#FF6384', 
};

let isDarkMode2 = false;
let chartGraphSemanal; // Variável para armazenar o gráfico

// Atualizar as cores do gráfico
function updateChartColors() {
    const colors = isDarkMode2 ? colorsDark : colorsLight2;

    if (chartGraphSemanal) {
        chartGraphSemanal.data.datasets[0].borderColor = colors.lineReceitas; // Receitas
        chartGraphSemanal.data.datasets[0].backgroundColor = colors.background;
        chartGraphSemanal.data.datasets[1].borderColor = colors.lineDespesas; // Despesas
        chartGraphSemanal.data.datasets[1].backgroundColor = colors.background;
        chartGraphSemanal.options.plugins.legend.labels.color = colors.text;
        chartGraphSemanal.options.plugins.title.color = colors.text;
        chartGraphSemanal.options.scales.x.grid.color = colors.text;
        chartGraphSemanal.options.scales.y.grid.color = colors.text;
        chartGraphSemanal.options.title.text = "Relatório Financeiro Anual"; // Atualize o título
        chartGraphSemanal.update();
    }
}

// Aguarde o carregamento do DOM para iniciar o gráfico
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementsByClassName("line-chart-week")[0].getContext("2d");
    
    chartGraphSemanal = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"],
            datasets: [{
                label: "Receitas",
                data: [34,66,240,760,360,600,0],
                borderWidth: 5,
                borderColor: colorsLight2.lineReceitas,
                backgroundColor: colorsLight2.background,
            },
            {
                label: "Despesas",
                data: [12,30,67,350,180,260,0,],
                borderWidth: 5,
                borderColor: colorsLight2.lineDespesas,
                backgroundColor: colorsLight2.background,
            }],
        },
        options: {
            title: {
                display: true,
                fontSize: 25,
                text: "Relatório Financeiro Anual",
                color: colorsLight2.text,
            },
            scales: {
                x: {
                    grid: {
                        color: colorsLight2.text,
                    },
                },
                y: {
                    grid: {
                        color: colorsLight2.text,
                    },
                },
            },
            plugins: {
                legend: {
                    labels: {
                        fontSize: 25,
                        color: colorsLight2.text,
                    },
                },
                title: {
                    color: colorsLight2.text,
                },
            },
        },
    });

    // DARK MODE
    const switchMode = document.getElementById('switch-mode');

    switchMode.addEventListener('change', function () {
        if (this.checked) {
            document.body.classList.add('dark');
            isDarkMode2 = true;
        } else {
            document.body.classList.remove('dark');
            isDarkMode2 = false;
        }
        updateChartColors();
    });
});
