<?php include('dbcon.php'); include('session.php');include('header.php'); ?>
<body>
 <?php include('nav-top.php'); ?>
    <div class="navbar navbar-fixed-top1">
        <div class="navbar-inner">
            <div class="container">
                <div class="marg">
                    <ul class="nav">
                        <li class="active">
                            <a href="home.php"><i class="icon-home icon-large"></i>Home</a>
                        </li>
                        <li><a href="emp_profiles.php"><i class="icon-warning-sign icon-large"></i>Accidents</a></li>
                    
                        <li><a id="logout" data-toggle="modal" href="#myModal"><i class="icon-signout icon-large"></i>Logout</a></li>
                        <form  method="POST" action="search_user.php" class="navbar-search pull-right">
                            <input type="text" name="search" class="search-query" placeholder="Search">
                        </form>



                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">

        <div id="element" class="hero-body">
            <div class="peace">
                <center>
                    <div id="piecemaker">
                        <p>ADMS</p>
                    </div>
                </center>
            </div>
            <div class="body-home">
                <div class="alert alert-info">
                    <h2>
                Kenya Police Traffic department
 
                    </h2>
                </div>
            </div>  
            <div class="hero-unit-home">

The Unit is established to support the following functions of the Kenya Police Service in accordance with Section 24 of the National Police Service Act, 2011.
<p>I.    Ensuring of free flow of traffic</p>
<p>II.    Prevention of Road Accidents</p>
<p>III.    Investigation of Accidents</p>
<p>IV.     Enforcement of all Laws, Rules and Regulations with which the department is charged.</p>
<p>V.    Initiate road safety sensitization to the members of the public.</p>            </div>


        </div>  

        <?php include('footer.php');?>
    </div>
    </div>
</body>
<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
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