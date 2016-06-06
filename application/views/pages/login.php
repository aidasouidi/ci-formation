


<div class="container">
    <h2>Login Form</h2>

    <br>
    <div align="center">
        <div class="panel panel-default" style="width: 50%;">
            <div class="panel-heading"><B>Authentification</b></div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="<?php echo base_url('pages/admin'); ?>">
                    <p>
                        <label align="left">UserName : </label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Please enter the username"/>
                    </p>
                    <p>
                        <label align="left">Password : </label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="***********"/>
                    </p>
                    <p>
                        <button type="submit" id="submitbtn">login</button>
                        <button type="reset" id="reset">Reset</button>
                    </p>
                    <p>
                        <a href="<?php echo base_url('pages/contact') ?>">To SignUp Click Here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>