<div>
    <div class="header">
        <div class="logo">
            <a href="/">
                <img src="/image/logo.png" alt="">
            </a>
        </div>
    </div>
    <section id="trending">
    <div class="login_body">
        <div class="login_box">
            <h2>Registre-se</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
    
                <div class="input_box">
                    <input required type="text" name="name" placeholder="Nome">
                </div>
    
                <div class="input_box">
                    <input required type="email" name="email" placeholder="Email">
                </div>
    
                <div class="input_box">
                    <input required type="password" name="password" placeholder="Senha">
                </div>
    
                <div class="input_box">
                    <input required type="password" name="password_confirmation" placeholder="Confirme a Senha">
                </div>
    
                <div>
                    <button class="submit" type="submit">Registrar</button>
                </div>
            </form>
    
            <div class="support">
                <div class="remember">
                    <span><input type="checkbox" style="margin: 0;padding: 0; height: 13px;"></span>
                    <span>Lembre-se de mim</span>
                </div>
                <div class="help">
                    <a href="#">Precisa de ajuda?</a>
                </div>
            </div>
            <div class="register-link">
                <p>Já possui uma conta? <a href="{{ route('login') }}">Entrar</a></p>
            </div>
        </div>
    </div>
    </section>
</div>
