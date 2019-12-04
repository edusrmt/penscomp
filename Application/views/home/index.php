<!-- HOME -->
<aside id="sidebar">
    <!-- SIGN-FORM -->
    <div class="sign-container">
        <div id="signin" class="signin">        
            <h2 onclick="slide_up(false)" class="form-title"><span>ou</span>Entrar</h2>
                <div class="form-holder">                    
                    <input type="email" class="input" id="login-email" placeholder="Email" />
                    <input type="password" class="input" id="login-password" name="password" placeholder="Senha" />                    
                </div>
                <button id="login-button" onclick="login();" class="special-btn">Entrar</button>
        </div>
        <div id="signup" class="signup slide-up">
            <div class="center">
            <h2 onclick="slide_up(true)" class="form-title"><span>ou</span>Registrar</h2>
            <form method="POST" action="./back/register.php">
                <div class="form-holder">                    
                    <input type="text" class="input" name="name" placeholder="Nome" />
                    <input type="email" class="input" name="email" placeholder="Email" />
                    <input type="password" class="input" name="password" placeholder="Senha" />                    
                </div>
                <input type="submit" class="special-btn" value="Registrar">
            </form>
        </div>
        </div>      
    </div>	
    <!-- SIGN-FORM -->
</aside>
<section id="page-content">
    <div class="logo-container">
        <h1 class="logo">
            <a href="./index.php">Pens<span>comp</span></a>            
        </h1>
        <h2 class="gradient-multiline"><span>Um novo jeito de capacitar programadores.</span></h2>
    </div>
</section>
<!-- HOME -->