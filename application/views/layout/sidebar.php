<div class="sidebar" data-color="purple" data-background-color="black" data-image="<?php echo base_url();?>assets/img/sidebar-2.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>

    </div>
    <div class="logout" style="padding-left: 70px;">
        <a href="<?php echo base_url(); ?>user/logout" class="btn btn-danger">Logout</a>

    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item <?php if($this->uri->uri_string() == '') { echo 'active'; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item <?php if($this->uri->uri_string() == 'student/addStudent') { echo 'active'; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>student/addStudent">
                    <i class="material-icons">person</i>
                    <p>Add Student</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'student/viewStudent') { echo 'active'; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>student/viewStudent">
                    <i class="material-icons">content_paste</i>
                    <p>Student List</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'department/addDepartment') { echo 'active'; } ?> ">
                <a class="nav-link" href="<?php echo base_url(); ?>department/addDepartment">
                    <i class="material-icons">library_books</i>
                    <p>Add Department</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'department/viewDepartment') { echo 'active'; } ?> ">
                <a class="nav-link" href="<?php echo base_url(); ?>department/viewDepartment">
                    <i class="material-icons">bubble_chart</i>
                    <p>Department List</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'author/addAuthor') { echo 'active'; } ?> ">
                <a class="nav-link" href="<?php echo base_url(); ?>author/addAuthor">
                    <i class="material-icons">location_ons</i>
                    <p>Add Author</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'author/viewAuthor') { echo 'active'; } ?> ">
                <a class="nav-link" href="<?php echo base_url(); ?>author/viewAuthor">
                    <i class="material-icons">notifications</i>
                    <p>Author List</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'book/addBook') { echo 'active'; } ?>">
                  <a class="nav-link" href="<?php echo base_url(); ?>book/addBook">
                      <i class="material-icons">unarchive</i>
                      <p>Add Book</p>
                  </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'book/viewBook') { echo 'active'; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>book/viewBook">
                    <i class="material-icons">unarchive</i>
                    <p>Book List</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'issueBook/index') { echo 'active'; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>issueBook/index">
                    <i class="material-icons">unarchive</i>
                    <p>Issue Book</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'issueBook/issuedBookList') { echo 'active'; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>issueBook/issuedBookList">
                    <i class="material-icons">unarchive</i>
                    <p>Issued Books</p>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->uri_string() == 'issueBook/returnBookList') { echo 'active'; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>issueBook/returnBookList">
                    <i class="material-icons">unarchive</i>
                    <p>Return Books</p>
                </a>
            </li>
        </ul>
    </div>
</div>
