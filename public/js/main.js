// Tabbed nav

// Get all tab elements
const tabs = document.querySelectorAll('.nav-link');
// Get the current active tab 
let active_nav = document.querySelector('.nav-link.active');
console.log(active_nav);
let active_tab = document.querySelector('.tab-pane.fade.active.show');

// Click listener for each tab
tabs.forEach((tab) => {
    tab.addEventListener('click', event => {
        event.preventDefault(); 
        // Get the target tab ID from the href
        let target_tab_id = tab.getAttribute('href');
        // Find the target content
        let target_tab = document.querySelector(target_tab_id);
        // Show the target content
        active_nav.classList.remove('active');
        active_tab.classList.remove('active', 'show');
        tab.classList.add('active');
        target_tab.classList.add('active', 'show');
        // Update the active tab variable
        active_nav = tab;
        active_tab = target_tab;
    });
});