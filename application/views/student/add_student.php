<?php if(isset($header)){echo $header;}?>

<?php if(isset($sidebar)){echo $sidebar;}?>

    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">Add Student</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <form class="navbar-form">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">
                                <i class="material-icons">dashboard</i>
                                <p class="d-lg-none d-md-block">
                                    Stats
                                </p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="d-lg-none d-md-block">
                                    Some Actions
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="javascript:void(0)">Mike John responded to your email</a>
                                <a class="dropdown-item" href="javascript:void(0)">You have 5 new tasks</a>
                                <a class="dropdown-item" href="javascript:void(0)">You're now friend with Andrew</a>
                                <a class="dropdown-item" href="javascript:void(0)">Another Notification</a>
                                <a class="dropdown-item" href="javascript:void(0)">Another One</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
<!--                        --><?php
//                        $msg =$this->session->flashdata('msg');
//                        if(isset($msg)){
//                            ?>
<!--                            <div id="msg">-->
<!--                                --><?php //echo $msg; ?>
<!--                            </div>-->
<!---->
<!--                        --><?php //   }
//                        ?>
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Add Student</h4>
                                <p class="card-category">Please add student</p>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url(); ?>student/saveStudent" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Student Name</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Department</label>

                                                <select name="dptID" class="form-control dropdown">
                                                    <option value="0" >Select Department</option>
                                                    <?php
                                                    foreach ($departmentData as $dData){
                                                    ?>
                                                    <option value="<?php echo $dData->dptID; ?>"><?php echo $dData->dptName; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Roll No.</label>
                                                <input type="text" name="roll" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Reg No.</label>
                                                <input type="text" name="reg" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary pull-right" onclick="md.showNotification('top','right')">Add Student</button>
                                    <div class="clearfix" ></div>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


<?php if(isset($footer)){echo $footer;}?>