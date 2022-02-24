<div id="login-form" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <main class="container" style="max-width :80%;">
                <div class="container-fluid" style="margin-left:50px">
                    <h2 class="form-title">Accedi</h2>
                    <form method="POST" action="#" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="email" name="email" id="email" placeholder="Email" class="borderInputBlue" required/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" class="borderInputBlue" required/>
                        </div>
                        <p style="visibility: hidden" class="testoErrore" id="erroreEmailOPassword">
                            <i class="fas fa-exclamation-circle"></i>
                            Email o password Sbagliati
                        </p>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="submit" class="form-submit" value="Accedi"/>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</div>