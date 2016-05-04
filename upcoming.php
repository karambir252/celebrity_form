<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Upcoming</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <div class="page">

        <?php include('header.php')?>
        <?php
            require_once('dbhelper.php');
            $db = new SQLiteDb();
            
            $allArrivals = $db->getAllArrivals();
            $allArrivals->fetchArray();
        ?>

        <div class="body">

            <!--
            <form style="" action="addUpcoming.php" method="post" >
                <table>
                    <tr>
                        <td>
                            <label>Arrival Date :</label>
                        </td>
                        <td>
                            <input type="date" name="arrival_date" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Message :</label>
                        </td>
                        <td>
                            <textarea name="message" rows="10" cols="50"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Image :</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="I am coming"/>
                        </td>
                    </tr>
                </table>
            </form>
            -->

            <ul class="blog">
                <?php
                    while($arrival = $allArrivals->fetchArray()){
                ?>

                <li>
                    <div>
                        <a href="<?php echo 'blog.php?arrival_id=' . $arrival['_id'];?>">
                        <img src="<?php echo 'images/arrival/'. $arrival['_id'] .'.jpg' ; ?>" alt="celebrity pic"/>
                        </a>
                        <p><?php echo $arrival['message']; ?></p>
                    
                     </div>
                </li>

                <?php
                    }
                ?>
            </ul>
            
        </div>

        <?php
            $db->close();
        ?>
        <?php include('footer.php')?>
    
    </div>
</body>
</html>