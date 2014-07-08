    <?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'convocat');
     
     
    if (isset($_GET['nom'])){
       mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD);
       mysql_select_db(DB_NAME);
       $sql = "SELECT cin FROM old_students WHERE nom LIKE '%".str_replace("'", "", $_GET['nom'])."%'";
       $resultat = mysql_query($sql) or die(mysql_error());
       $student = mysql_fetch_assoc($resultat);

    /* Toss back results as json encoded array. */
    echo trim($student['cin']);
    }
     
    ?>