<div class="auth-container">
    <div class="tabs">
        <button id="loginTab" class="active">Connexion</button>
        <button id="registerTab">Inscription</button>
    </div>

    <!-- LOGIN -->
    <form id="loginForm" method="POST" action="login.php" class="form active">

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Se connecter</button>
    </form>

    <!-- REGISTER -->
    <form id="registerForm" method="POST" action="register.php" class="form">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>Confirmer le mot de passe</label>
            <input type="password" name="confirm_password" required>
        </div>

        <button type="submit">Créer un compte</button>
    </form>
</div>


<script>
    const loginTab = document.querySelector('#loginTab')
    const registerTab = document.querySelector('#registerTab')
    const loginForm =document.querySelector('#loginForm')
    const registerForm =document.querySelector('#registerForm')

    loginTab.onclick = () => {
        loginTab.classList.add('active')
        registerForm.classList.remove('active')
        loginForm.classList.add('active')
        registerForm.classList.remove('active')

    };

    registerTab.onclick = () => {
        loginTab.classList.remove('active')
        registerTab.classList.add('active')
        loginForm.classList.remove('active')
        registerForm.classList.add('active')
    }

</script>





<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #6366f1, #22c55e);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .loginForm{
        margin-left: 160px;
    }

    .auth-container {
        width: 100%;
        background: #fff;
        border-radius: 14px;
        padding: 28px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, .15);
    }

    /* Tabs */
    .tabs {
        display: flex;
        margin-bottom: 20px;
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
    }

    .tabs button {
        flex: 1;
        padding: 12px;
        border: none;
        background: #f3f4f6;
        font-weight: 600;
        cursor: pointer;
        color: #374151;
    }

    .tabs button.active {
        background: #6366f1;
        color: #fff;
    }

    /* Forms */
    .form {
        display: none;
        margin-left: 160px;
    }

    .form.active {
        display: block;
    }

    .form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #1f2937;
    }

    /* Inputs */
    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #374151;
    }

    .form-group input {
        width: 70%;
        padding: 11px 12px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
    }

    .form-group input:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .2);
    }

    /* Button */
    button[type="submit"] {
        width: 70%;
        padding: 13px;
        margin-top: 10px;
        border: none;
        border-radius: 10px;
        background: #6366f1;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background: #4f46e5;
    }
</style>