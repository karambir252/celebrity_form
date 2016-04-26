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
            <?php
                $date_format = 'd M Y';
                $all_arrivals = array(
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming'),
                            array('_id'=> 1 , 'date' => date($date_format) , 'celebrity_id'=> 7 , 'celebrity_name' => 'Michal Jackson' , 'message'=>'Hello I am comming')
                        );
            ?>

            <ul class="blog">
                <?php
                    foreach($all_arrivals as $arrival){
                ?>

                <li>
                    <div>
                        <a href="#"><img src="<?php echo 'images/users/'. $arrival['celebrity_id'] .'.jpg' ; ?>" alt="celebrity pic"/></a>
                        <p>ON : <?php echo $arrival['date'] ?></p>
                        <p><?php echo $arrival['message']; ?></p>
                    
                     </div>
                </li>

                <?php
                    }
                ?>
            </ul>
            
        </div>

        <?php include('footer.php')?>
    
    </div>
</body>
</html>