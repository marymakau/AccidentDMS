<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <div class="marg_top">
                <a class="brand">
                    <img src="img/logo.png" width="200" height="58">
                </a> 
                <a class="brand">
                    <h2>Accident Data Management System</h2>
                    <div class="chmsc_nav"><font size="4" color="white">Kenya Traffic Police Department</font></div>
                </a>

                <div class="pull-right">
                    <font color="white">
                        <?php
                            $Today=date('y:m:d');
                            $new=date('l, F d, Y',strtotime($Today));
                            echo $new; ?>

                        <p>
                            <?php

                                $user_query=mysql_query("select *  from user where User_id='$id_session'")or die(mysql_error());
                                $row=mysql_fetch_array($user_query);
                                $fullname=$row['FirstName'].' '.$row['LastName'];
                                echo 'Welcome:'." ".$fullname;
                                
                                

                            ?>
                        </p>
                    </font>
                </div>
            </div>
        </div>
    </div>
	</div>
    