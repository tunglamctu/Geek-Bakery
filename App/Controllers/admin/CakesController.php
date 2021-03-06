<?php
    use App\Core\Controller;

    class CakesController extends Controller{
        private $cakeModel;
        private $cakeTypeModel;
        function __construct(){
            $this->cakeModel = $this->model("CakeModel");
            $this->cakeTypeModel = $this->model("CakeTypeModel");
        }

        function Index(){
            $result = $this->cakeModel->all();
            if ($result != false) $data["cake"] = $result;
            
            $this->view("cakes/index", $data);
        }

        function create(){
            $result = $this->cakeTypeModel->all();
            if ($result != false) $data["categories"] = $result;
            $this->view("cakes/create", $data);
        }

        function store(){
            if(!isset($_POST)) header("Location: ".DOCUMENT_ROOT."/admin/cakes/create");
            else{
                $data["cate"] = $_POST["cate"];
                $data["name"] = $_POST["name"];
                $data["size"] = $_POST["size"];
                $data["price"] = $_POST["price"];
                $data["des"] = $_POST["des"];

                if(isset($_FILES["image"])){
                    if($_FILES["image"]["name"] != ""){
                        $randomNum = time();
                        $imageExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);//Lay phan mo rong cua ten file
                        $newImageName = $randomNum.".".$imageExt;
                    }
                }

                move_uploaded_file($_FILES["image"]["tmp_name"], CAKE_IMG.DS.$newImageName);
                $data["image"] = $newImageName;
                
                $result = $this->cakeModel->insert($data);
                if ($result == true) header("Location: ".DOCUMENT_ROOT."/admin/cakes");
                else header("Location: ".DOCUMENT_ROOT."/admin/cakes/create");
            }
        }

        
        function edit($cakeId){
            $result1 = $this->cakeTypeModel->all();
            if ($result1 != false) $data["categories"] = $result1;

            $result2 = $this->cakeModel->getCakeById($cakeId);
            if ($result2 != false) $data["cake"] = $result2;
            $this->view("cakes/edit", $data);
        }

        function update($cakeId){
            if(!isset($_POST)) header("Location: ".DOCUMENT_ROOT."/admin/cakes/edit");
            else{
                $data["id"] = $cakeId;
                $data["cate"] = $_POST["cate"];
                $data["name"] = $_POST["name"];
                $data["size"] = $_POST["size"];
                $data["price"] = $_POST["price"];
                $data["des"] = $_POST["des"];

                if($_FILES["image"]["name"] != ""){
                        $randomNum = time();
                        $imageExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);//Lay phan mo rong cua ten file
                        $newImageName = $randomNum.".".$imageExt;
                        move_uploaded_file($_FILES["image"]["tmp_name"], CAKE_IMG.DS.$newImageName);
                        $data["image"] = $newImageName;
                }      
                else{
                    $data["image"] = $_POST["old-image"];
                }

                $result = $this->cakeModel->update($data);
                if ($result == true) header("Location: ".DOCUMENT_ROOT."/admin/cakes");
                else header("Location: ".DOCUMENT_ROOT."/admin/cakes/edit");
            }
        }

    }
?>