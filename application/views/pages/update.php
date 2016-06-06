


<div class="container">
    <h2>Update Form</h2>

    <div align="center">
        <ol>
            <?php foreach ($users as $user): ?>
                <li><a href="<?php echo base_url() . "pages/show_user_id/" . $user->id; ?>"><?php echo $user->username; ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div>
    <div id="detail">
        <!-- Fetching All Details of Selected Student From Database And Showing In a Form -->
        <?php foreach ($single_user as $user): ?>
    <form  class="form-horizontal" method="post" action="<?php echo base_url() . "pages/update_user_id1" ?>">

        <label id="hide">Id :</label>
        <input class="form-control" type="text" id="hide" name="id" value="<?php  echo $user->id ; ?>"/>

        <label>Name :</label>
        <input class="form-control" type="text" name="username" value="<?php echo $user->username ; ?>"/>

        <label>Email :</label>
        <input class="form-control" type="text" name="email" value="<?php echo $user->email; ?>"/>

        <label>Password :</label>
        <input class="form-control" type="text" name="password" value="<?php echo $user->password; ?>"/>

        <input type="submit" id="submit" name="submit" value="Update"/>
    </form>
        <?php endforeach; ?>
</div>
    </div>


