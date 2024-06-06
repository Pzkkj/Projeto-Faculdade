document.addEventListener("DOMContentLoaded", function() {
    const loginTab = document.getElementById('loginTab');
    const cadastroTab = document.getElementById('cadastroTab');
    const gerenciarTab = document.getElementById('gerenciarTab');
    const dashboardTab = document.getElementById('dashboardTab');
    const logoutTab = document.getElementById('logoutTab');

    const user = JSON.parse(sessionStorage.getItem('user'));

    if (user) {
        loginTab.style.display = 'none';
        cadastroTab.style.display = 'none';
        logoutTab.style.display = 'block';

        if (user.role === 'admin') {
            dashboardTab.style.display = 'block';
        } else {
            gerenciarTab.style.display = 'block';
        }
    } else {
        loginTab.style.display = 'block';
        cadastroTab.style.display = 'block';
        gerenciarTab.style.display = 'none';
        dashboardTab.style.display = 'none';
        logoutTab.style.display = 'none';
    }
});

function login(username, password) {
    fetch('php/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${username}&password=${password}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            sessionStorage.setItem('user', JSON.stringify({ username: data.username, role: data.role }));
            window.location.href = 'index.html';
        } else {
            alert('Login falhou');
        }
    });
}

function logout() {
    sessionStorage.removeItem('user');
    window.location.href = 'index.html';
}
