<?php if(isset($header)){echo $header;}?>

<?php if(isset($sidebar)){echo $sidebar;}?>

    <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:void(0)">Student List</a>
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

                    <div class="col-md-12">
                        <?php
                        $msg =$this->session->flashdata('msg');
                        if(isset($msg)){
                            echo $msg;
                        }
                        ?>
                        <div class="card card-plain">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title mt-0">Student Information</h4>
                                <p class="card-category">See all student here</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover">
                                        <thead class="">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Department
                                        </th>
                                        <th>
                                            Roll
                                        </th>
                                        <th>
                                            Reg
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                        </thead>
                                        <tbody>


                                        <?php
                                        $i = 0;
                                        foreach ($studentData as $stdInfo){
                                            $i++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;?>

                                            </td>
                                            <td>
                                                <?php echo $stdInfo->name;?>
                                            </td>
                                            <td>
                                                <?php echo $stdInfo->dpt;?>
                                            </td>
                                            <td>
                                                <?php echo $stdInfo->roll;?>
                                            </td>
                                            <td>
                                                <?php echo $stdInfo->reg;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>student/editStudent/<?php echo $stdInfo->stdId;?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;
                                                <a  href="#myModal<?php echo $stdInfo->stdId;?>" role="button" data-toggle="modal"><i class="fa fa-trash"></i></a>


                                                <div class="modal small fade" id="myModal<?php echo $stdInfo->stdId;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 id="myModalLabel">Are your sure want to delete?</h3>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                                <a class="btn btn-danger" href="<?php echo base_url(); ?>student/deleteStudent/<?php echo $stdInfo->stdId;?>" >Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php if(isset($footer)){echo $footer;}?>