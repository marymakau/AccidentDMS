<?php include('dbcon.php'); include('session.php');include('header.php'); ?>
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
                        <li class="active"><a href="emp_profiles.php"><i class="icon-warning-sign icon-large"></i>Accidents</a></li>  
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
            <h2>Personnel List</h2>
        </div>

        <hr>

        <div class="pull-right">  
            <a class="btn btn-primary btn-large" id="add"  data-content="Click here to Add Personnel" rel="popover" data-original-title="Add Accident?" href="emp_add.php">  <i class="icon-plus-sign icon-large"></i>&nbsp;Add Personnel</a>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    $('#add').popover('show')
                    $('#add').popover('hide')

                });
            </script>
            <a href="user_account.php" class="btn btn-large"><i class="icon-user icon-large"></i>&nbsp;View User Account</a>







        </div>



        <form method="post" action="sort.php">

            <select name="sort" class="span4">
                <option>Sort AccidentID</option>

                <?php
                    $while_query=mysql_query("SELECT DISTINCT AccidentID from trafficpoliceofficer where FullName='$fullname'")or die(mysql_error());
                    while($row=mysql_fetch_array($while_query)){
                    ?>

                    <option><?php echo $row['AccidentID'];?></option>


                    <?php }; ?>
            </select>          
            <button name="filter" class="btn btn-success"><i class="icon-filter icon-large"></i>&nbsp;Sort</button>
        </form>

       <br>


        <table class="users-table">


        <div class="demo_jui">
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
                <thead>
                  <tr>
                        <th>Accident ID</th>
                        <th>Upload Date</th>
                        <th>Last Edit</th>
                        <th>JobID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                
             <?php if (isset($_POST['search'])){
             $search=$_POST['search'];    
              ?>  

                    <?php $emp_query=mysql_query("SELECT * from trafficpoliceofficer where FullName='$fullname' AND AccidentID like '%$search%'");
                           $count=mysql_num_rows($emp_query);
              if ($count > 0 ){
                        while($row=mysql_fetch_array($emp_query)){ $id=$row['AccidentID']; ?>

                   <tr class="del<?php echo $id ?>">
                            <td><?php echo $row['AccidentID']; ?></td>
                            <td><?php echo $row['InfoFillingDate']; ?></td>
                            <td><?php  echo $row['InfoLastEditDate']?></td>
                            <td><?php  echo $row['JobID']?></td>


                            <td align="center" width="320">      
                                <script type="text/javascript">
                                    jQuery(document).ready(function() {
                                        $('#p<?php echo $id; ?>').popover('show')
                                        $('#p<?php echo $id; ?>').popover('hide')

                                    });
                                </script>


                                <a class="btn btn-success"  id="p<?php echo $id; ?>" data-content="Click here to Edit accident" rel="popover" data-original-title="Edit?"  href="edit.php<?php echo '?id='.$id; ?>"><i class="icon-edit icon-large"></i>&nbsp;Edit</a>&nbsp;
                                
                                <a class="btn btn-warning"  data-toggle="modal" href="#<?php echo $id; ?>" ><i class="icon-list icon-large"></i>&nbsp;View</a>
                                <?php
                                    include('button_view_user.php');
                                ?>
                                <a class="btn "  data-toggle="modal" href="#a<?php echo $id; ?>" ><i class="icon-plus icon-large"></i>&nbsp;Add</a>
                                <?php
                                    include('button_add_user.php');
                                ?>
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
        
        

    