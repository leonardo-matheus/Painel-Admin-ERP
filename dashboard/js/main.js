// Recupera o estado do menu do Armazenamento Local
const isSidebarHidden = localStorage.getItem('sidebarHidden');

// Define o estado inicial do menu
const sidebar = document.getElementById('sidebar'); // Moveu a declaração aqui
if (isSidebarHidden === 'true') {
    sidebar.classList.add('hide');
}

// Função para alternar a visibilidade do menu lateral
function toggleSidebar() {
    sidebar.classList.toggle('hide');
    const isHidden = sidebar.classList.contains('hide');
    localStorage.setItem('sidebarHidden', isHidden); // Salva o estado no Armazenamento Local
}

// RECOLHER E EXPANDIR O MENU LATERAL
const menuBar = document.querySelector('#content nav .bx.bx-menu');

menuBar.addEventListener('click', toggleSidebar);

// Função para abrir o menu ao passar o mouse
function openSidebar() {
    sidebar.classList.remove('hide');
}

// Função para fechar o menu ao tirar o mouse
function closeSidebar() {
    sidebar.classList.add('hide');
}

// Evento para abrir o menu ao passar o mouse
sidebar.addEventListener('mouseenter', openSidebar);

// Evento para fechar o menu ao tirar o mouse
sidebar.addEventListener('mouseleave', closeSidebar);

//PESQUISA
const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault();
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchButtonIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
        }
    }
});

// RESPONSIVIDADE
if (window.innerWidth < 768) {
    sidebar.classList.add('hide');
} else if (window.innerWidth > 576) {
    searchButtonIcon.classList.replace('bx-x', 'bx-search');
    searchForm.classList.remove('show');
}

window.addEventListener('resize', function () {
    if (this.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
});

// Função para definir o modo escuro no armazenamento local
function setDarkModePreference(isDarkMode) {
    localStorage.setItem('darkMode', isDarkMode);
}

// Função para obter o estado do modo escuro do armazenamento local
function getDarkModePreference() {
    return localStorage.getItem('darkMode') === 'true';
}

// Função para atualizar a interface de acordo com o estado do modo escuro
function updateDarkModeUI(isDarkMode) {
    if (isDarkMode) {
        document.body.classList.add('dark');
        switchMode.checked = true;
    } else {
        document.body.classList.remove('dark');
        switchMode.checked = false;
    }
}

// DARK MODE
const switchMode = document.getElementById('switch-mode');

// Evento de mudança do interruptor de modo escuro
switchMode.addEventListener('change', function () {
    const isDarkMode = this.checked;
    setDarkModePreference(isDarkMode);
    updateDarkModeUI(isDarkMode);
});

// Atualize o modo escuro na interface com base na preferência armazenada
updateDarkModeUI(getDarkModePreference());

// NOTIFICAÇÔES
const notifyButton = document.querySelector('.notification');
const notifyPanel = document.querySelector('.notification-panel');

notifyButton.addEventListener('click', () => {
    notifyPanel.style.display = notifyPanel.style.display === 'none' ? 'block' : 'none';
});
