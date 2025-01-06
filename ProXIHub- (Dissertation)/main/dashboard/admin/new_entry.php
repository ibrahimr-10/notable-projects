<?php require '../../include/db_conn.php'; page_protect(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Player Registration</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link href="a1style.css" rel="stylesheet" type="text/css">
    <style>
        /* Header */
        .logo-env {
            background-color: #283747;
            padding: 15px;
            text-align: center;
        }

        .logo-env .logo img {
            width: 150px;
            height: auto;
        }

        /* Sidebar */
        .sidebar-menu {
            background-color: #34495e;
            color: #fff;
        }

        .sidebar-menu a {
            color: #fff;
        }

        .sidebar-menu #main-menu li#routinehassubopen > a {
            background-color: #2b303a;
            color: #ffffff;
        }

        #boxx {
            width: 220px;
        }
    </style>
</head>
<body>

    <div class="page-container">
        <div class="sidebar-menu">
            <header class="logo-env">
                <!-- Logo -->
                <div class="logo">
                    <a href="main.php">
                        <img src="logo1.png" alt="ProXIHub Logo" width="192" height="80" />
                    </a>
                </div>
            </header>
            <?php include('nav.php'); ?>
        </div>

        <div class="main-content">
            <div class="header">
                <ul class="user-details">
                    <li>Welcome <?php echo $_SESSION['full_name']; ?></li>
                    <li>
                        <a href="logout.php">
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>

            <div class="registration-form">
                <h2>New Registration</h2>
                <hr />

                <div class="form-container">
                    <div class="entry-heading">
                        <h3>New Entry</h3>
                    </div>
                    <form id="registration-form" name="registration-form" method="post" action="new_submit.php">
                        <div class="form-fields">
                            <div class="field">
                                <label for="u_name">Name:</label>
                                <input type="text" name="u_name" id="u_name" required/>
                            </div>
                            <div class="field">
                                <label for="street_name">House No & Street Name:</label>
                                <input type="text" name="street_name" id="street_name" required/>
                            </div>
                            <div class="field">
                                <label for="city">City:</label>
                                <input type="text" name="city" id="city" required/>
                            </div>
                            <div class="field">
                                <label for="zipcode">Postcode/ Zipcode:</label>
                                <input type="text" name="zipcode" id="zipcode" maxlength="8" required/>
                            </div>
                            <div class="field">
                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender" required>
                                    <option value="">--Please Select--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="field">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" name="dob" id="dob" required/>
                            </div>
                            <div class="field">
                                <label for="mobile">Phone No:</label>
                                <input type="number" name="mobile" id="mobile" maxlength="10" required/>
                            </div>
                            <div class="field">
                                <label for="email">Email Address:</label>
                                <input type="email" name="email" id="email" required/>
                            </div>
                            <div class="field">
                                <label for="jdate">Joining Date:</label>
                                <input type="date" name="jdate" id="jdate" required/>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input class="button" type="submit" name="submit" id="submit" value="Register" >
                            <input class="button" type="reset" name="reset" id="reset" value="Reset">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>


