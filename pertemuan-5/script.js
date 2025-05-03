const h5 = document.querySelector('h5');

// Cek preferensi awal dari browser
const userPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
if (userPrefersDark) {
    document.body.setAttribute('data-theme', 'dark');
}

const savedTheme = localStorage.getItem('theme');
if (savedTheme) {
    document.body.setAttribute('data-theme', savedTheme);
}

// handle form submit
const form = document.querySelector('form');
form.addEventListener('submit', function (event) {
    event.preventDefault();
    const input = document.querySelector('input');
    const value = input.value;
    if (value) {
        h5.textContent = `Halo ${value}!`;
        input.value = '';
    }
});

function toggleTheme() {
    const currentTheme = document.body.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    document.body.setAttribute('data-theme', newTheme);

    // Simpan preferensi pengguna
    localStorage.setItem('theme', newTheme);
}