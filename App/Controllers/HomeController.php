<?php
    // require_once "../Core/Controller.php";
    use App\Core\Controller;

    class HomeController extends Controller{
        private $cakeModel;
        private $caketypeModel;

        function __construct(){
            $this->cakeModel = $this->model("CakeModel");
            $this->caketypeModel = $this->model("CakeTypeModel");
        }

        function Index(){
            //Get all of cakes
            $cakes = $this->cakeModel->all();
            if(!$cakes){
                $cakes=[];
            }

            //Get the number of cakes
            $numOfCake = $this->cakeModel->count();

            // Get cakes to show on Sweeties
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            }
            else{
                $page=1;
            }

            $limit = ($page - 1) * NUM_OF_CAKE_ON_PAGE;
            $cakeOnPage = $this->cakeModel->getCake($limit , NUM_OF_CAKE_ON_PAGE);
            if(!$cakeOnPage){
                $caketypes=[];
            }

            //Get all of caketypes to show on Categories
            $caketypes = $this->caketypeModel->all();
            if(!$caketypes){
                $caketypes=[];
            }

            //Results saved
            $data["cake"] = $cakes;
            $data["num_of_cake"] = $numOfCake;
            $data["cake_to_show"] = $cakeOnPage;
            $data["caketype"] = $caketypes;

            //Get cakes to show on Best Seller
            $data["bestSeller"][] = $cakes[1];
            $data["bestSeller"][] = $cakes[5];
            $data["bestSeller"][] = $cakes[7];
            $data["bestSeller"][] = $cakes[9];
            $data["bestSeller"][] = $cakes[15];

            //Call the view
            $this->view("home/index", $data);
        }
    }
?>