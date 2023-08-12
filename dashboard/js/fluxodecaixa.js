// Cores para os modos claro e escuro
const colorsLight = {
    background: '#F9F9F9',
    text: '#342e37',
    lineReceitas: '#4BC0C0', 
    lineDespesas: '#FF6384', 
};

const colorsDark = {
    background: '#0C0C1E',
    text: '#FBFBFB',
    lineReceitas: '#4BC0C0', 
    lineDespesas: '#FF6384', 
};

let isDarkMode = false;
let chartGraph; // Variável para armazenar o gráfico

// Atualizar as cores do gráfico
function updateChartColors() {
    const colors = isDarkMode ? colorsDark : colorsLight;

    if (chartGraph) {
        chartGraph.data.datasets[0].borderColor = colors.lineReceitas; // Receitas
        chartGraph.data.datasets[0].backgroundColor = colors.background;
        chartGraph.data.datasets[1].borderColor = colors.lineDespesas; // Despesas
        chartGraph.data.datasets[1].backgroundColor = colors.background;
        chartGraph.options.title.color = colors.text;
        chartGraph.options.scales.x.grid.color = colors.text;
        chartGraph.options.scales.y.grid.color = colors.text;
        chartGraph.options.plugins.legend.labels.color = colors.text;
        chartGraph.options.plugins.title.color = colors.text;
        chartGraph.update();
    }
}

// Aguarde o carregamento do DOM para iniciar o gráfico
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementsByClassName("line-chart")[0].getContext("2d");
    chartGraph = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Receitas",
                data: [164, 2530, 1169, 3240, 3465, 1910, 1791, 1805, 1890, 3721, 1765, 420],
                borderWidth: 5,
                borderColor: colorsLight.lineReceitas, // Usando a cor definida para Receitas
                backgroundColor: colorsLight.background,
            },
            {
                label: "Despesas",
                data: [164, 1418, 867, 2175, 2668, 1313, 1084, 1427, 1101, 2331, 179],
                borderWidth: 5,
                borderColor: colorsLight.lineDespesas, // Usando a cor definida para Despesas
                backgroundColor: colorsLight.background,
            }],
        },
        options: {
    title: {
        display: true,
        fontSize: 20,
        text: "Relatório Financeiro Anual",
        color: colorsLight.text, // Defina a cor do título aqui
    },
    scales: {
        x: {
            grid: {
                color: colorsLight.text,
            },
        },
        y: {
            grid: {
                color: colorsLight.text,
            },
        },
    },
    plugins: {
        legend: {
            labels: {
                color: colorsLight.text,
            },
        },
        title: {
            color: colorsLight.text,
        },
    },
},
    });

    // DARK MODE
    const switchMode = document.getElementById('switch-mode');

    switchMode.addEventListener('change', function () {
        if (this.checked) {
            document.body.classList.add('dark');
            isDarkMode = true;
        } else {
            document.body.classList.remove('dark');
            isDarkMode = false;
        }
        updateChartColors();
    });
});
