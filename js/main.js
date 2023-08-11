const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
    const li = item.parentElement;

    item.addEventListener('click', function() {
        allSideMenu.forEach(i=> {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});



// Sidebar
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.querySelector('sidebar');

menuBar.addEventListener('click', function() {
    sidebar.classList.toggle('hide');
})

