<?php
    class SQLiteDb extends SQLite3{
        function __construct(){
            $this->open('data/db.sqlite');
        }
        
        function addUser($name,$email,$password){
            $query = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
            $result = $this->exec($query);
            if(!$result){
                echo $this->lastErrorMsg();
            }
            
            $result = $this->query("SELECT _id FROM users WHERE name == '$name' AND email == '$email'");
            $data = $result->fetchArray();
            return $data['_id'];
        }

        function hasUser($email,$password){
            $query = "SELECT * FROM users WHERE email == '$email' and password == '$password'";
            $result = $this->query($query);
            if(!$result){
                echo $this->lastErrorMsg();
            }
            return $result;
        }

        function userExist($email){
            $query = "SELECT * FROM users WHERE email == '$email'";
            $result = $this->query($query);
            if(!$result){
                echo $this->lastErrorMsg();
                return FALSE;
            }

            return TRUE;
        }

        function addArrival($arrival_date,$celebrity_id,$message,$celebrity_name){
            $insert = "INSERT INTO arrival(date,celebrity_id,message,celebrity_name) VALUES($arrival_date,$celebrity_id,'$message','$celebrity_name')";
            $result = $this->exec($insert);
            if(!$result){
                echo $this->lastErrorMsg();
                return FALSE;
            }
            return TRUE;
        }

        function addQuestion($question,$arrival_id,$user_id){
            $insert = "INSERT INTO questions(question,arrival_id,user_id) VALUES('$question',$arrival_id,$user_id)";
            $result = $this->exec($insert);
            if(!$result){
                echo $this->lastErrorMsg();
                return FALSE;
            }
            return TRUE;
        }

        function getQuestions($user_id){
            $query = "SELECT * FROM questions WHERE user_id == $user_id ORDER BY arrival_id DESC , _id DESC";
            return $this->query($query);
        }
        
        function getArrival($arrival_id){
            $query = "SELECT * FROM arrival WHERE _id == $arrival_id";
            $result = $this->query($query);
            if(!$result){
                echo $this->lastErrorMsg();
            }
            return $result->fetchArray();
        }

        function getNextArrival(){
            $query = 'SELECT * FROM arrival ORDER BY _id DESC LIMIT 1';
            $result = $this->query($query);
            return $result->fetchArray();
        }
        
        function getLastFiveArrivals(){
            $query = 'SELECT * FROM arrival ORDER BY _id DESC LIMIT 5';
            $result = $this->query($query);
            return $result;
        }
        
        function getAllArrivals(){
            $query = 'SELECT * FROM arrival ORDER BY _id DESC';
            $result = $this->query($query);
            return $result;
        }
        
        function getNextArrivalId(){
            $result = $this->getNextArrival();
            return $result['_id'];
        }
        
        function addAnswer($id,$answer){
            $update = "UPDATE questions SET answer = '$answer' WHERE _id == $id";
            $result = $this->exec($update);
            if(!$result){
                echo $this->lastErrorMsg();
                return FALSE;
            }
            return TRUE;
        }
        
        function getSingleQuestion(){
            $arrivalId = $this->getNextArrivalId();
            $query = "SELECT * FROM questions WHERE answer is NULL and arrival_id = $arrivalId LIMIT 1";
            $result = $this->query($query);
            return $result->fetchArray();
        }
        
        function getAllQuestions($arrival_id){
            $query = "SELECT * FROM questions WHERE arrival_id == $arrival_id ORDER BY _id DESC";
            $result = $this->query($query);
            if(!$result){
                echo $this->lastErrorMsg();
            }
            return $result;
        }
        
        function getAllAskedQuestions($arrival_id,$user_id){
            $query = "SELECT * FROM questions WHERE arrival_id == $arrival_id and user_id == $user_id ORDER BY _id DESC";
            $result = $this->query($query);
            if(!$result){
                echo $this->lastErrorMsg();
            }
            return $result;
        }
        
        function getTopLikedNineQuestions(){
            $arrivalId = $this->getNextArrivalId();
            $query = "SELECT * FROM questions WHERE answer is not NULL and arrival_id = $arrivalId ORDER BY likes DESC LIMIT 9";
            $result = $this->query($query);
            if(!$result){
                echo $this->lastErrorMsg();
            }
            return $result;
        }
        
        function isUserLiked($user_id,$question_id){
            $query = "SELECT * FROM user_likes WHERE user_id == $user_id and question_id == $question_id";
            $result = $this->query($query);
            if(!$result){
                echo $this->lastErrorMsg();
                return FALSE;
            }
            
            if($result->fetchArray()){
                return TRUE;
            }
            return FALSE;
        }
        
        function setUserLike($user_id,$question_id){
            if($this->isUserLiked($user_id,$question_id)){
                die('user already liked: ' . $question_id . '   user: ' . $user_id);
            }
            
            $query = "SELECT * FROM questions WHERE _id == $question_id";
            $result = $this->query($query);
            if(!$result){
                echo $this->lastErrorMsg();
                return FALSE;
            }
            
            $likes = $result->fetchArray()['likes']+1;
            
            
            $insert = "INSERT INTO user_likes(user_id,question_id) VALUES($user_id,$question_id)";
            $update = "UPDATE questions SET likes = $likes WHERE _id == $question_id";
            
            if(!$this->exec($insert)){
                echo $this->lastErrorMsg();
                return FALSE;
            }
            
            if(!$this->exec($update)){
                echo $this->lastErrorMsg();
                return FALSE;
            }
            
            return TRUE;
        }
        
        function unsertUserLike($user_id,$question_id){
            if(!$this->isUserLiked($user_id,$question_id)){
                die('user not like: ' . $question_id . '   user: ' . $user_id);
            }
            
            $query = "SELECT * FROM questions WHERE _id == $question_id";
            $result = $this->query($query);
            if(!$result){
                echo $this->lastErrorMsg();
                return FALSE;
            }
            
            $likes = $result->fetchArray()['likes']-1;
            
            
            $insert = "DELETE FROM user_likes WHERE user_id == $user_id and question_id == $question_id";
            $update = "UPDATE questions SET likes = $likes WHERE _id == $question_id";
            
            if(!$this->exec($insert)){
                echo $this->lastErrorMsg();
                return FALSE;
            }
            
            if(!$this->exec($update)){
                echo $this->lastErrorMsg();
                return FALSE;
            }
            
            return TRUE;
        }
    }
?>