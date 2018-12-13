<div class="row mt-4">
    <div class="col-md-6 offset-md-3">
        <h2><?php echo \Idno\Core\Idno::site()->language()->_('Welcome back!'); ?></h2>
        <div class="card text-center">
            <h5 class="card-header"><?php echo \Idno\Core\Idno::site()->language()->_('Sign in'); ?></h5>
            <div class="card-body text-center">
                <form class="form-signin" action="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL() ?>session/login" method="post">
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only"><?php echo \Idno\Core\Idno::site()->language()->_('Your email address or username'); ?></label>
                        <input type="text" id="inputEmail" name="email" placeholder="<?php echo \Idno\Core\Idno::site()->language()->_('Your email address or username'); ?>" class="form-control" autofocus>
                    </div>            
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only"><?php echo \Idno\Core\Idno::site()->language()->_('Password'); ?></label>
                        <input type="password" id="inputPassword" name="password" placeholder="<?php echo \Idno\Core\Idno::site()->language()->_('Password'); ?>" class="form-control" >
                    </div>
                    <!-- <div class="checkbox mb-3">
                      <label>
                        <input type="checkbox" value="remember-me"> Remember me
                      </label>
                    </div> -->
                    <button type="submit" class="mt-4 btn btn-raised btn-primary btn-signin"><?php echo \Idno\Core\Idno::site()->language()->_('Sign in'); ?></button>
                    <input type="hidden" name="fwd" value="<?php
                            if (!empty($vars['fwd'])) {
                                echo htmlspecialchars($vars['fwd']);
                            } else if (!empty($_SERVER['HTTP_REFERER'])) {
                                echo htmlspecialchars($_SERVER['HTTP_REFERER']);
                            } else {
                                echo \Idno\Core\Idno::site()->config()->getDisplayURL();
                            }?>" />
                    <div class="form-group mt-4">
                        <?php
                        if (\Idno\Core\Idno::site()->config()->open_registration == true && \Idno\Core\Idno::site()->config()->canAddUsers()) {
                            ?>
                            <a href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL()?>account/register"><?php echo \Idno\Core\Idno::site()->language()->_('New here? Register for an account.'); ?></a><br><br>
                            <?php
                        }
                        ?>
                        <a href="<?php echo \Idno\Core\Idno::site()->config()->getDisplayURL()?>account/password"><?php echo \Idno\Core\Idno::site()->language()->_('Forgot your password?'); ?></a>
                    </div>
                    <?php echo \Idno\Core\Idno::site()->actions()->signForm('/session/login') ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript">
    $(document).ready(function() {
        $('#inputEmail').focus();
    });
</script>
