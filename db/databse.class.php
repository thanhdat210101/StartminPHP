<?php
class database{
    protected $connection = null;
    protected $user='';
    protected $pass='';
    protected $name='';
    protected $host='';

    public function __construct($config)
    {
        $this->host = $config['host'];
        $this->user = $config['user'];
        $this->pass = $config['pass'];
        $this->name = $config['name'];
        //connect mysql
        $this->connect();
    }
    public function connect(){
        $this->connection = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->name
        );
        if($this->connection->connect_errno){
            exit($this->connection->connect_error);
        }
    }
    
    public function table($tableName)
    {
        $this->table = $tableName;
        return $this;
    }

    public function get(){
        $sql = "SELECT * FROM $this->table";
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute();

        $result = $this->statement->get_result();

        $returnData = [];

        while($row = $result->fetch_object()){
            $returnData[] = $row;
        }

        return $returnData;
    }

    public function getOne($id){
        $sql = "SELECT * FROM $this->table where id=?";
        $this->statement = $this->connection->prepare($sql);
        $this->statement->bind_param('i',$id);
        $this->statement->execute();
       
        $result = $this->statement->get_result();
        $returnData = [];

        while($row = $result->fetch_object()){
            $returnData[] = $row;
        }

        return $returnData;
    }

    public function insert($data = []){
        $field = implode(',',array_keys($data));
        $valuesdata = implode(',',array_fill(0,count($data),'?'));
        $sql = "INSERT INTO $this->table($field) value ($valuesdata) ";

        $values  = array_values($data);
        $this->statement = $this->connection->prepare($sql);

        $this->statement->bind_param(str_repeat('s',count($data)),...$values);
        $this->statement->execute();
        //đóng kết nối
        // $this->statement->close();
        // $this->connection->close();
    }
    
    public function updates($id, $data = []){
        $keyValue =[];
        foreach($data as $key=>$values){
            $keyValue[]= $key . '=?';
        }
        $setfields = implode(',',$keyValue);

            $values =  array_values($data);
            $values[] = $id;

        $sql = "UPDATE $this->table set $setfields where id=? ";

        $this->statement = $this->connection->prepare($sql);
        $this->statement->bind_param(str_repeat('s',count($data)).'i',...$values);
        $this->statement->execute();
        return $this->statement->affected_rows;
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table where id =?";
        $this->statement = $this->connection->prepare($sql);
        $this->statement->bind_param('i',$id);
        $this->statement->execute();
        return $this->statement->affected_rows;
    }


}
?>