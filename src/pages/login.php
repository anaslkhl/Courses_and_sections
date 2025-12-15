<div class="login-container">
    <h2>Connexion</h2>

    <form method="POST" action="login.php">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required placeholder="exemple@email.com">
        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" required placeholder="********">
        </div>

        <button type="submit">Se connecter</button>

        <p class="register-link">
            Pas encore de compte ?
            <a href="register.php">Créer un compte</a>
        </p>
    </form>
</div>