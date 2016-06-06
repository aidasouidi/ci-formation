


<div class="container">
    <h2>Registration Form</h2>

    <div align="center">
        <div class="panel panel-default" style="width: 50%;">
            <div class="panel-heading"><B>Contact</b></div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="<?php echo base_url('pages/contact'); ?>">
                    <p>
                        <label align="left">UserName : </label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Please enter the username"/>
                    </p>



                    <p>
                        <label align="left">Password : </label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="***********" />
                    </p>

                    <p>
                        <label align="left">Email : </label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="exemple@exemple.x" />
                    </p>


                    <p>
                        <button type="submit" id="submitbtn">Sign in</button>
                        <button type="reset" id="reset">Reset</button>
                    </p>
                    <p>
                        <a href="<?php echo base_url('pages/login') ?>">To LogIn Click Here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>