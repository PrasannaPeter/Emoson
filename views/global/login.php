    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="loginModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">

                <div class="main">

                  <h3>Please Log In, or <a href="#">Sign Up</a></h3>
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <a href="#" class="btn btn-lg btn-primary btn-block">Facebook</a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <a href="#" class="btn btn-lg btn-info btn-block">Google</a>
                    </div>
                  </div>
                  <div class="login-or">
                    <hr class="hr-or">
                    <span class="span-or">or</span>
                  </div>

                <?php
                if(!empty($msgNotif))
                {
                    $typeNotif = "error";
                    $titreNotif = " Connexion impossible ";
                    $notification = notifications($typeNotif, $titreNotif, $msgNotif);
                    echo $notification.'<br />' ;
                }
                ?>

                  <form method="post" action="index.php" role="form">
                    <div class="form-group">
                      <label for="inputUsernameEmail">Username or email</label>
                      <input type="text" class="form-control" id="inputUsernameEmail">
                    </div>
                    <div class="form-group">
                      <a class="pull-right" href="#">Forgot password?</a>
                      <label for="inputPassword">Password</label>
                      <input type="password" class="form-control" id="inputPassword">
                    </div>
                    <div class="checkbox pull-right">
                      <label>
                        <input type="checkbox">
                        Remember me </label>
                    </div>
                    <button type="submit" class="btn btn btn-primary">
                      Log In
                    </button>
                  </form>

                </div>

              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->