<style>
#main-menu {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

#main-menu li {
    margin-bottom: 10px;
}

#main-menu li a {
    text-decoration: none;
    display: block;
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

#main-menu li a:hover {
    background-color: #2980b9;
}

#main-menu li ul {
    list-style-type: none;
    padding: 0;
    margin-top: 5px;
    display: none;
}

#main-menu li:hover ul {
    display: block;
}

#main-menu li ul li a {
    padding: 10px 40px;
    background-color: #2ecc71;
    border-radius: 0;
}

#main-menu li ul li a:hover {
    background-color: #27ae60;
}

</style>

<ul id="main-menu" class="">
    <li id="dash"><a href="index.php"><span>Dashboard</span></a></li>
    
    <li id="regis"><a href="new_entry.php"><span>New Player Registration</span></a></li>
    
    <li class="" id="hassubopen">
        <a href="#" onclick="memberExpand(1)">
            <span>Players</span>
        </a>
        <ul id="memExpand">
            <li class="active">
                <a href="view_player.php"><span>Edit Players</span></a>
            </li>
            <li><a href="table_view.php"><span>View Players</span></a></li>
        </ul>
    </li>
    

    <li class="" id="statisticshassubopen">
        <a href="#" onclick="memberExpand(3)">
            <span>Player Statistics</span>
        </a>
        <ul id="statisticsExpand">
            <li><a href="add_player_stats.php"><span>Add Player Stats</span></a></li>
            <li><a href="player_stats.php"><span>Current Player Stats</span></a></li>
            <li><a href="individual_stats.php"><span>Individual Player Stats</span></a></li>
        </ul>
    </li>

    <li class="" id="analyticshassubopen">
        <a href="#" onclick="memberExpand(4)">
            <span>Team Analytics</span>
        </a>
        <ul id="analyticsExpand">
            <li class="active"><a href="analytics_goals.php"><span>Goal Analytics</span></a></li>
            <li><a href="analytics_assists.php"><span>Assist Analytics</span></a></li>
            <li><a href="analytics_cards.php"><span>Card Analytics</span></a></li>
        </ul>
    </li>

    
    <li class="" id="lineupshassubopen">
        <a href="#" onclick="memberExpand(5)">
            <span>Lineups</span>
        </a>
        <ul id="lineupsExpand">
            <li class="active"><a href="lineup.php"><span>Create Lineup</span></a></li>
            <li><a href="view_lineup.php"><span>View Lineups</span></a></li>
        </ul>
    </li>
    
    <li class="" id="routinehassubopen">
        <a href="#" onclick="memberExpand(6)">
            <span>Routines</span>
        </a>
        <ul id="routineExpand">
            <li class="active"><a href="addroutine.php"><span>Add Weekly Routine</span></a></li>
            <li><a href="editroutine.php"><span>Edit Weekly Routine</span></a></li>
            <li><a href="viewroutine.php"><span>View Weekly Routine</span></a></li>
        </ul>
    </li>
    
    <li id="adminprofile">
        <a href="userprofile.php"><span>Profile</span></a>
    </li>
    
    <li>
        <a href="logout.php"><span>Logout</span></a>
    </li>
</ul>
