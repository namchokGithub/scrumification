
<?php
/**
 * @Author	Jiranuwat Jaiyen       
 * @Create Date	22-03-2563
 * @Update Namchok Singhchai
 */
?>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/dist/img/user/'.$Profile[2].'.jpg'); ?>" class="img-circle" alt="User Image" style="object-fit: cover; object-position: center;min-width: 30px !important; min-height: 35px !important; " onerror="this.onerror=null;this.src='<?php echo base_url('assets/dist/img/user/unknown-who.jpg'); ?>';">
            </div>
            <div class="pull-left info">
                <p style="white-space: nowrap; width: 155px; overflow: hidden; text-overflow: ellipsis;">
                    <?php echo $Profile[0]; ?> </p>
                <a href="#"><i class="fa fa-user text-info"></i>
                    <span class="Role_name"><?php echo empty($Profile[1])? "No Role": implode(" , ",$Profile[1]); ?>
                    </span></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
            <li>
                <a id="Home" href="<?php echo site_url('home'); ?>"><i class="fa fa-home"></i> <span>Home</span></a>
            </li>
            <li>
                <a id="Challenger" href="<?php echo site_url('challenger'); ?>"><i class="fa fa-users"></i>
                    <span>Challenger</span></a></li>
            <li>
                <a id="MainReward" href="<?php echo site_url('mainreward'); ?>"><i class="fa fa-gamepad"></i>
                    <span>Main reward</span></a></li>
            <li>
                <a id="Achievement" href="<?php echo site_url('achievement'); ?>"><i class="fa fa-shopping-cart "></i>
                    <span>Shopping </span></a></li>
            <li>
                <a id="LeaderBoard" href="<?php echo site_url('leaderboard'); ?>"><i class="fa fa-bar-chart-o "></i>
                    <span>Leaderboard</span></a>
            </li>
             <!-- end MAIN NAVIGATION -->
        <li class="header ScrumMaster">SCRUM MASTER NAVIGATION</li>
            <li class="ScrumMaster">
                <a id="UserAchievementManager" href="<?php echo site_url('Source_manager/index/UserAchievement'); ?>">
                    <i class="fa fa-smile-o"></i><span>User Achievement</span>
                </a>
            </li>
            <li class="ScrumMaster">
                <a id="UserIndividualManager" href="<?php echo site_url('Source_manager/index/UserIndividual');?>">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span>User Individual Achievement</span>
                </a>
            </li>
            <li class="ScrumMaster">
                <a id="ActivityManager" href="<?php echo site_url('Source_manager/index/Activity'); ?>">
                    <i class="fa fa-calendar"></i><span>Activity</span>
                </a>
            </li>
            <li class="ScrumMaster">
                <a id="Request_Item" href="<?php echo site_url('Source_manager/index/Request_Item'); ?>">
                    <i class="fa fa-bell"></i><span>Request Item</span>
                </a>
            </li>
            <li class="ScrumMaster">
                <a id="ActivityReport" href="<?php echo site_url('Source_manager/index/ActivityReport'); ?>">
                    <i class="fa fa-television"></i><span>Activity Report</span></a>
            </li>
            <li class="ScrumMaster">
                <!-- ตามจริงต้อง Source_manager/index/roles_users -->
                <a id="AssignRole" href="<?php echo site_url('Source_manager/index/AssignRole'); ?>"> 
                    <i class="fa fa-child"></i><span>Assign Role</span></a>
            </li>
             <!-- end SCRUM MASTER NAVIGATION -->
        <li class="header ScrumMaster">MANAGER NAVIGATION</li>
            <li class="ScrumMaster">
                <a id="Groups" href="<?php echo site_url('Source_manager/index/Groups'); ?>">
                    <i class="fa fa-users"></i>
                    <span>Group Management</span>
                </a>
            </li>
            <li class="ScrumMaster">
                <a id="UsersManager" href="<?php echo site_url('Source_manager/index/Users'); ?>"><i class="fa fa-user"></i>
                    <span>Users Management</span>
                </a>
            </li>
            <li class="ScrumMaster">
                <a id="Roles" href="<?php echo site_url('Source_manager/index/Roles'); ?>">
                    <i class="fa fa-tag"></i>
                    <span>Role Management</span></a>
            </li>
            <li class="ScrumMaster">
                <a id="Achievement" href="<?php echo site_url('Source_manager/index/Achievement'); ?>">
                    <i class="fa fa-star-half-empty"></i>
                    <span>Achievement Management</span></a>
            </li>
            <li class="ScrumMaster">
                <a id="Individual Achievement" href="<?php echo site_url('Source_manager/index/Individual'); ?>">
                    <i class="fa fa-gift"></i>
                    <span>Individual Management</span></a>
            </li>
            <li class="ScrumMaster">
                <a id="Shop" href="<?php echo site_url('Source_manager/index/Shop'); ?>">
                    <i class="fa fa-cart-plus"></i>
                    <span>Shop Management</span></a>
            </li>
            <!-- end MANAGER NAVIGATION -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<script>
    /**
     * set role of user form cookie 
     *
     * @Author	Jiranuwat Jaiyen       
     * @Create Date	22-03-2563
     */
    if (getCookie("User") !== "<?php echo empty($Profile[2])? 'No User ':$Profile[1][0]; ?>") {
        setCookie("User", "<?php echo empty($Profile[1])? 'No User ':$Profile[1][0]; ?>", 999);
        setCookie("Role", "<?php echo empty($Profile[1])? 'No Role ':$Profile[1][0]; ?>", 999);
    }
    if (getCookie("Role") == "") {
        setCookie("Role", "<?php echo empty($Profile[1])? 'No Role ':$Profile[1][0]; ?>", 999);
    }
    if (getCookie("Role") == "ScrumMaster" || getCookie("Role") == "Administrator") {
        $(".ScrumMaster").show();
    } else {
        $(".ScrumMaster").hide();
    }
    $(".Role_name").text(getCookie("Role"))
    // console.log("length", $("span:contains('<?php echo $header; ?>')").length, $("a[id='<?php echo $header; ?>']").length)
    // console.log("role", getCookie("Role"), "a[id='<?php echo $header; ?>']")
    if ($("a[id='<?php echo $header; ?>']").length) {
        $("a[id='<?php echo $header; ?>']").closest("li").addClass("active");
    } else {
        console.log("length", $("span:contains('<?php echo $header; ?>')").length)
        // $("span:contains('<?php echo $header; ?>')").closest("li").addClass("active");
    }
</script>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <span style="font-size: medium;">
            <?php echo $header;?>
        </span>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(" home "); ?>"><i class="fa fa-dashboard"></i> Home </a></li>
            <li class="active">
                <?php echo $header;?>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">