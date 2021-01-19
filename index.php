<?php
    session_start();
    require_once 'php/connection-db.php';
    require_once 'php/login-controller.php';
    require_once 'php/add-edit-category-controller.php';
    require_once 'php/add-edit-utype-controller.php';
    require_once 'php/edit-user-controller.php';
    require_once 'php/register-controller.php';
    require_once 'php/auth-login-controller.php';
    require_once 'php/auth-link-controller.php';
?>
<html>

<head>
    <title>Filing System</title>
    <!--    <link rel="stylesheet" type="text/css" href="custom-css/custom-css.css">-->
    <link rel="stylesheet" type="text/css" href="uikit-css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="custom-css/notyf.min.css">
    <link rel="stylesheet" type="text/css" href="custom-css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="custom-css/dark-nav.css">
    <link rel="stylesheet" type="text/css" href="custom-css/custom2.css">
    <link rel="icon" type="image/svg+xml" href="images/document.svg">
    <link rel="stylesheet" type="text/css" href="custom-css/sweetalert2.min.css">
    <!--Icons made by "https://www.flaticon.com/authors/smalllikeart" -->
    <link rel="stylesheet" type="text/css" href="custom-css/booty.min.css">
    <link rel="stylesheet" type="text/css" href="custom-css/font.min.css">
    <link rel="stylesheet" type="text/css" href="custom-css/notification.css">
</head>

<body>
    <audio id="notification_ding" src="audio/ding.mp3" muted>
    </audio>
    <header class="cd-main-header">
        <p class="cd-logo">
            File System
        </p>
        <!--
        <div class="cd-search is-hidden">
            <form action="#0">
                <input type="search" disabled>
                <input type="hidden" value="<?php echo $_SESSION['name']; ?>" name="hidden_id" id="hidden_id">
            </form>
        </div>
--> <?php if($auth != "restricted") { ?>
        <div class="dropdown" style="float: left; padding: 13px">
            <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="" style="float: left" aria-expanded="true">
                <i class="fa fa-bell-o" style="font-size: 28px; float: left; color: white">
                </i>
            </a>
            <?php include 'php/fetch-notification-controller.php'; ?>
        </div>
        <?php } ?>
        <nav class="cd-nav">
            <ul class="cd-top-nav">
                <li class="has-children">
                    <a href="php/logout-controller.php">
                        Log out
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="cd-main-content">
        <nav class="cd-side-nav">

            <ul class="uk-nav uk-nav-default">

                <li class="cd-label">
                    <center>HI <?php echo $_SESSION['name'];?></center>
                </li>
                <?php if($auth != "restricted") { ?>
                <li class="has-children overview <?php if($_SESSION['fragment'] == ""){ echo 'active';}?>">
                    <a>Overview</a>
                    <ul>
                        <li <?php if($_SESSION['location'] == ""){ echo "class='active'";}?>><a href="index.php#">Dashboard</a></li>
                    </ul>
                </li>
                <?php } ?>
                <li class="has-children bookmarks <?php if($_SESSION['fragment'] == "files"){ echo 'active';}?>">
                    <a>File</a>
                    <ul>
                        <li <?php if($_SESSION['location'] == "manage" && $_SESSION['fragment'] == "files"){ echo "class='active'";}?>><a href="index.php#files/manage">Manage Files</a></li>
                        <?php if($auth != "restricted") { ?>
                        <li <?php if($_SESSION['location'] == "upload"){ echo "class='active'";}?>><a href="index.php#files/upload">Upload Files</a></li>
                        <li <?php if($_SESSION['location'] == "categories"){ echo "class='active'";}?>><a href="index.php#files/categories">Manage File Category</a></li>
                        <li <?php if($_SESSION['location'] == "request"){ echo "class='active'";}?>><a href="index.php#files/request">Manage Requests</a></li>
                        <?php }else { ?>

                        <?php }  ?>
                    </ul>
                </li>
                <?php if($auth != "restricted") { ?>
                <li class="has-children users <?php if($_SESSION['fragment'] == "admin"){ echo 'active';}?>">
                    <a>Admin</a>

                    <ul>
                        <li <?php if($_SESSION['location'] == "manage" && $_SESSION['fragment'] == "admin"){ echo "class='active'";}?>><a href="index.php#admin/manage">Manage Users</a></li>
                        <li <?php if($_SESSION['location'] == "user-types"){ echo "class='active'";}?>><a href="index.php#admin/user-types">Manage User Types</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </nav>

        <div class="content-wrapper">
            <!-- Page Content -->
            <br />
            <br />
            <div id="page-content-wrapper uk-margin-top" uk-scrollspy="cls: uk-animation-fade; delay: 300; repeat: true">

                <div class="uk-container uk-container-medium" id="content">


                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div> <!-- .content-wrapper -->
    </main> <!-- .cd-main-content -->
    <!-- scripts -->
    <script src="custom-js/jquery.js"></script>
    <script src="uikit-js/uikit.min.js"></script>
    <script src="uikit-js/uikit-icons.min.js"></script>
    <script src="custom-js/custom-js.js"></script>
    <script src="custom-js/notyf.min.js"></script>
    <script src="custom-js/custom2.js"></script>
    <script src="custom-js/menu-aim.js"></script>
    <script src="custom-js/signals.min.js"></script>
    <script src="custom-js/hasher.min.js"></script>
    <script src="custom-js/crossroads.min.js"></script>
    <script src="custom-js/sweetalert2.all.min.js"></script>
    <script src="custom-js/Chart.bundle.min.js"></script>
    <script src="custom-js/booty.min.js"></script>
    <script>
        $(document).ready(function() {
            var searchParams = new URLSearchParams(window.location.search);
            var notyf = new Notyf();

            if (searchParams.has('success')) {
                var param = searchParams.get('success');
                if (param == 1) {

                    var notyfMessage = 'Welcome ' + name + '!';
                    setTimeout(function() {
                        notyf.confirm(notyfMessage);
                    }, 500);
                }
            } else if (searchParams.has('add_success')) {
                var param = searchParams.get('add_success');
                if (param == 1) {

                    var notyfMessage = 'Added User Successful!';
                    setTimeout(function() {
                        notyf.confirm(notyfMessage);
                    }, 500);
                }
            }

            $(document).on('click', '.has-children li', function() {
                $('.has-children li').removeClass('active');
                $(this).addClass('active');
            });

            $(document).on('click','.notif', function() {
                var notif_num = $('#notif_number').html();
                var notif_num = notif_num - 1;
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "php/delete-request-controller.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(result) {
                        $('#notif_number').text(notif_num);
                        if (notif_num == 0) {
                            $('#notif_header').children('a').text('No Notifcations');
                            $('#notif_number').removeClass('badge-danger');
                            $('#notif_number').addClass('badge-info');
                        }
                    }
                });
                $(this).remove();
            });
            setTimeout(fetchdata, 5000);
            
            function fetchdata() {

            var old_count = $('#notif_number').html();

            $.ajax({
                type: "POST",
                url: "php/fetch-countNotif-controller.php",
                success: function(data) {

                    if (data > old_count) {
                        //                        $('audio')[0].play();
                    }
                    if (old_count == 0 && data > old_count) {
                        $('#notif_header').remove();
                    }
                    if (data != 0) {
                        $('#notif_number').removeClass('badge-info');
                        $('#notif_number').addClass('badge-danger');
                    }
                    $('#notif_number').html(data);
                    $.ajax({
                        type: "POST",
                        url: "php/fetch-newNotif-controller.php",
                        data: {
                            old_count: old_count
                        },
                        success: function(res) {
                            if (res != 'fail') {
                                $('#notif_list').remove();
                                $('#style-1').append(res);
                            }
                        }
                    });
                },complete: function(data) {
                    setTimeout(fetchdata, 5000);
                }
            });
        }
        });
    </script>
    <script>
        

        function get_content(tpl, div) {
            $.get(tpl, function(result) {
                $result = $(result);

                $(div).html(result);
                $result.find('script').appendTo(div);
            }, 'html');

        }
        crossroads.addRoute('/{section}/{subsection}', function(section, subsection) {
            get_content('templates/' + section + '/' + subsection + '.php', '#content');
            var addr = window.location.hash.replace('#', '');
            var frag = window.location.hash.replace('#', '').split("/");
            $.ajax({
                url: "php/set-fragment-controller.php?fragment=" + frag[0] + "&loc=" + frag[1] + "&addrs=" + addr,
                success: function(result) {}
            });
        });
        crossroads.addRoute('/', function(id) {
            get_content('templates/home.php', '#content');
        });

        //setup hasher
        function parseHash(newHash, oldHash) {
            crossroads.parse(newHash);
        }
        hasher.initialized.add(parseHash); //parse initial hash
        hasher.changed.add(parseHash); //parse hash changes
        hasher.init(); //start listening for history change


        (function($) {
            var $window = $(window),
                $html = $('#wrapper');

            function resize() {
                if ($window.width() < 768) {
                    return $html.removeClass('toggled');
                }

                $html.addClass('toggled');
            }

            $window
                .resize(resize)
                .trigger('resize');
        })(jQuery);
    </script>
</body>

</html>