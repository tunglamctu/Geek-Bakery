<?php

    use App\Core\Database;

    class CartModel extends Database{

        function addToCart($data){
            $id_user = $data["userId"];
            $id_cake = $data["cakeId"];
            $amount = isset($data["amount"]) ? $data["amount"] : 1;
            $isSuccess = true;

            $numIndex = $this->numOfCake($id_cake, $id_user);
            $amount += $numIndex;

            //Trong gio hang da co sp nay => Tang so luong len
            if ($numIndex > 0){
                $stmt = $this->conn->prepare("UPDATE carts SET amount=? WHERE id_cake=? AND id_user=?");
                $stmt->bind_param("iii", $amount, $id_cake, $id_user);
                $stmt->execute();
                $result = $stmt->affected_rows;
                if($result<1) $isSuccess = false;
            }
            else{//Chua co san pham nay => Them moi
                $amount=1;
                $stmt = $this->conn->prepare("INSERT INTO carts VALUES(?, ?, ?)");
                $stmt->bind_param("iii", $id_cake, $id_user, $amount);
                $stmt->execute();
                $result = $stmt->affected_rows;
                if($result<1) $isSuccess = false;
            }

            $numInCart = $this->countCakeInCart($id_user);
            return [
                "isSuccess" => $isSuccess,
                "numInCart" => $numInCart
            ];
        }

        //Kiem tra trong gio hang da co sp nay chu
        function numOfCake($id_cake, $id_user){
            $stmt = $this->conn->prepare("SELECT amount FROM carts WHERE id_cake=? AND id_user=?");
            $stmt->bind_param("ii", $id_cake, $id_user);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows>0){
                $result=$result->fetch_assoc();
                return $result["amount"];
            }
            return 0;
        }

        //So loai banh trong gio hang
        function countCakeInCart($id_user){
            $stmt = $this->conn->prepare("SELECT id_cake FROM carts WHERE id_user=?");
            $stmt->bind_param("i", $id_user);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows>0){
                return $result->num_rows;
            }
            else{
                return 0;
            }
        }
    }
?>