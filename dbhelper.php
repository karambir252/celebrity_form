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
        }

        function hasUser($email,$password){
            $query = "SELECT * FROM users WHERE email == '$email' and password == '$password'";
            $result = $this->query($query);
            if(!$result){
                echo $this->lastErrorMsg();
                return FALSE;
            }

            return TRUE;
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

        function addArrival($arrival_date,$celebrity_id,$message){
            $insert = "INSERT INTO arrival(date,celebrity_id,message) VALUES($arrival_date,$celebrity_id,'$message')";
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
    }
?>