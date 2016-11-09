<?php 
include('dbcon.php'); include('session.php');include('header.php'); ?>
<body>
  <?php include('nav-top.php'); ?>
    <div class="navbar navbar-fixed-top1">
        <div class="navbar-inner">
            <div class="container">
                <div class="marg">
                    <ul class="nav">
                        <li>
                            <a href="home.php"><i class="icon-home icon-large"></i>Home</a>
                        </li>
                        <li class="active"><a href="user_accountP.php"><i class="icon-group icon-large"></i>Profiles</a></li>
                       <li><a href="history_log.php"><i class="icon-table icon-large"></i>History Log</a></li>
                        <li><a id="logout" data-toggle="modal" href="#myModal"><i class="icon-signout icon-large"></i>Logout</a></li>
                        <form  method="POST" action="search.php" class="navbar-search pull-right">
                            <input type="text" name="search" class="search-query" placeholder="Search">
                        </form>



                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">

    <div id="element" class="hero-body">


        <div class="alert alert-info">
            <h2>User List</h2>
        </div>

        <hr>

        <div class="pull-right">  
            <a href="user_accountP.php" class="btn btn-large btn-success"><i class="icon-group icon-large"></i>&nbsp;All Profiles</a>

            <a class="btn btn-primary btn-large" id="add"  data-content="Click here to Add User" data-original-title="Add User?" rel="popover" href="add_user.php">  <i class="icon-plus-sign icon-large"></i>&nbsp;Add User</a>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    $('#add').popover('show')
                    $('#add').popover('hide')

                });
            </script>

        </div>



       <form method="post" action="sortSearch.php">

            <p><select name="sort" class="span4" required>
                <option>Sort By Access Rights</option>

                <?php
                    $while_query=mysql_query("SELECT DISTINCT User_Type from user ORDER BY User_Type ASC")or die(mysql_error());
                    while($row=mysql_fetch_array($while_query)){
                    ?>

                    <option><?php echo $row['User_Type'];?></option>


                    <?php }; ?>
            </select>          
            <button name="filter" class="btn btn-success"><i class="icon-filter icon-large"></i>&nbsp;Sort Search Results</button></p>
        </form>

        <br>


        <table class="users-table">


        <div class="demo_jui">
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
                <thead>
                    <tr>
                            <th>UserName</th>
                            <th>Password</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>User Type</th>
                            <th>User Created On</th>
                            <th>User Last Edit</th>
                            <th>Actions</th>
                        </tr>
                </thead>
                <tbody>
                
             <?php if (isset($_POST['search'])){
             $search=$_POST['search'];  
             $_SESSION['search']=$search;  
              ?>  

                    <?php $user_query=mysql_query("SELECT * from user where UserName like '%$search%' ORDER BY UserName ASC");
                           $count=mysql_num_rows($user_query);
              if ($count > 0 ){
                      while($row=mysql_fetch_array($user_query)){ $id=$row['User_id']; ?>

                            <tr class="del<?php echo $id ?>">
                                <td><?php echo $row['UserName']; ?></td>
                                <td><?php echo $row['Password']; ?></td>
                                <td><?php echo $row['FirstName']; ?></td>
                                <td><?php  echo $row['LastName']?></td>
                                <td><?php echo $row['User_Type'] ?></td>
                                <td><?php echo $row['UserCreatedOn'] ?></td>
                                <td><?php echo $row['UsercLastEditedOn'] ?></td>
                                <td width="160">
                                    <a class="btn btn-success" href="edit_user.php<?php echo '?id='.$id; ?>"><i class="icon-edit icon-large"></i>&nbsp;Edit</a>&nbsp;   

                                    <a class="btn btn-danger1"  data-toggle="modal" href="#d<?php echo $id; ?>">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a>

                                    <div class="modal hide fade" id="d<?php echo $id; ?>">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">?</button>
                                            <h3> </h3>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-error">
                                                <p><font color="gray">Are You Sure you Want to Delete This User?</font></p>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn" data-dismiss="modal">No</a>
                                            <a href="del_user.php<?php echo '?id='.$id; ?>" class="btn btn-primary">Yes</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        <?php }}}?>
                </tbody>
            </table>

        </div>


        <?php include('footer.php');?>
    </div>
</body>
<div class="modal hide fade" id="myModal">
    <div class="modal-header">
       
        <h3> </h3>
    </div>
    <div class="modal-body">
        <p><font color="gray">Are You Sure you Want to LogOut?</font></p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">No</a>
        <a href="logout.php" class="btn btn-primary">Yes</a>
    </div>
        </div>
        
        

    