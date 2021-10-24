<?php 
    class productDatabase extends database{
        public function getProduct(){
            $sql ="SELECT *,brand.name as 'nameBrand',categories.name as 'nameCategory',products.name as 'nameProduct',products.id as 'productid' FROM products join categories on products.categoryid = categories.id
            join brand on products.brandid = brand.id";
            $this->statement = $this->connection->prepare($sql);
            $this->statement->execute();
    
            $resuft = $this->statement->get_result();
            $data = [];
    
            while($row = $resuft->fetch_object()){
                $data[] = $row;
            }
    
            return $data;
        }
    }
?>