document.addEventListener('DOMContentLoaded', async function () {
    const btnDownload = document.querySelector('.btn-download');
    const mainContent = document.querySelector('#content').innerHTML;

    // Função para carregar a biblioteca jsPDF
    async function loadJsPDF() {
        if (typeof jsPDF === 'undefined') {
            return new Promise((resolve) => {
                const script = document.createElement('script');
                script.src = '/dashboard/js/jspdf.min.js';
                script.onload = resolve;
                document.head.appendChild(script);
            });
        }
    }

    btnDownload.addEventListener('click', async function (e) {
        // Carregar a biblioteca jsPDF
        await loadJsPDF();

        // Agora a biblioteca deve estar carregada corretamente
        if (typeof jsPDF !== 'undefined') {
            const pdf = new jsPDF();
            pdf.text(mainContent, 10, 10);
            pdf.save('relatorio.pdf');
        } else {
            console.error('A biblioteca jsPDF não foi carregada corretamente.');
        }
    });
});