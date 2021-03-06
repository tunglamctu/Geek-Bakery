<?php

    use App\Core\Database;

    class UserModel extends Database{

        //Add new user into database
        function register($data, $file){
            $name = $data["name"];
            $password = password_hash($data["password"], PASSWORD_DEFAULT);
            $email = $data["email"];
            $phone = $data["phone"];
            $role=1;
            $address = $data["address"];

            $avatar = $file["avatar"]["name"];
            move_uploaded_file($file["avatar"]["tmp_name"], USER_IMG.$file["avatar"]["name"]);

            $stmt = $this->conn->prepare("INSERT INTO users VALUES(NULL, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssis", $name, $phone, $address, $password, $email, $role, $avatar);
            $stmt->execute();

            $result = $stmt->affected_rows;

            if($result<1) return false;
            else return true;
        }

        //Authenticate when user login
        function authenticate($data){    
            $email = $data["email"];
            $password = $data["password"];

            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows >0){

                $result = $result->fetch_assoc();

                if (password_verify($password, $result["password"])===true) return [true, $result];
                else return "Password incorrect!";

            }
            else return "Name does not exist!";
        }

        //Get email
        function checkEmailExist($email){    
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows >0){
                return true;
            }
            else return false;
        }

        //Get user information
        function updateInfor($id_user, $data){
            $stmt = $this->conn->prepare("UPDATE users SET name=?, email=?, phone=?, address=? WHERE id=?");
            $stmt->bind_param("sssss", $data["name"], $data["email"], $data["phone"], $data["address"], $id_user);
            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result>0){
                return true;
            }
            else return false;
        }

        // Update user information
        function getInfor($id_user){
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id=?");
            $stmt->bind_param("s", $id_user);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows >0){
                return $result->fetch_assoc();
            }
            else return false;
        }

        // Upload avatar
        function uploadAvatar($id_user, $data){
            $url = $data["file"]["name"];
            move_uploaded_file($data["file"]["tmp_name"], URL_USER.$data["file"]["name"]);
            $stmt = $this->conn->prepare("UPDATE users SET avatar=? WHERE id=?");
            $stmt->bind_param("ss", $url, $id_user);
            $stmt->execute();
            $result = $stmt->affected_rows;

            if ($result>0){
                return true;
            }
            else return false;
        }
    }
?>