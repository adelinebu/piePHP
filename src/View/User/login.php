<div id="body-content">
    <section id="page" class="container">
        <section class="row">
            <form action="" method="POST">
                <fieldset>
                    <legend>Login</legend>
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                                <div>
                                    <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required="">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">Mot de passe</label>
                                <div>
                                    <input id="password" name="password" type="password" placeholder="Mot de passe" class="form-control input-md" required="">
                                </div>
                        </div>

                        <div class="form-group">
						<label class="control-label" for="submit"></label>
						<div>
							<button id="submit" class="btn btn-outline-success btn-lg">Login</button>
						</div>
					</div>
                </fieldset>
            </form>
        </section>
    </section>    
</div>


<?= $hello ?>