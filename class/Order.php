<?php

class Order 
{
    private $conn;

    private $db_table = "orders";

    public $order_id;
    public $cust_id;
    public $order_placed;
    public $material;
    public $furnace_tempr;
    public $application;
    public $type;
    public $sr_d;
    public $spiral_pitch;
    public $cr_d;
    public $crod_pitch;
    public $edges;
    public $belt_width;
    public $length;
    public $sample_photos;

    public function __construct($db) 
    {
        $this->conn = $db;
    }

    public function createOrders()
    {
          $sql = "INSERT INTO 
                 orders (order_id,cust_id,order_placed,material,furnace_tempr,application,type,sr_d,spiral_pitch,cr_d,crod_pitch,edges,belt_width,length,sample_photos)
                 VALUES (:order_id, 
                   :cust_id, 
                    :order_placed, 
                    :material, 
                    :furnace_tempr,
                    :application,
                    :type,
                    :sr_d,
                    :spiral_pitch,
                    :cr_d,
                    :crod_pitch,
                    :edges,
                    :belt_width,
                    :length, :sample_photos)";

        //$sql = "UPDATE orders SET material = :material WHERE order_id = :order_id";

        //$sql= "INSERT INTO orders (order_id, material) VALUES (:order_id, :material)";
       
        $stmt = $this->conn->prepare($sql);
        
        $this->order_id = htmlspecialchars(strip_tags($this->order_id));
        $this->cust_id = htmlspecialchars(strip_tags($this->cust_id));
        $this->order_placed = htmlspecialchars(strip_tags($this->order_placed));
        $this->material = htmlspecialchars(strip_tags($this->material));
        $this->furnace_tempr = htmlspecialchars(strip_tags($this->furnace_tempr));
        $this->application = htmlspecialchars(strip_tags($this->application));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->sr_d = htmlspecialchars(strip_tags($this->sr_d));
        $this->spiral_pitch = htmlspecialchars(strip_tags($this->spiral_pitch));
        $this->cr_d = htmlspecialchars(strip_tags($this->cr_d)); 
        $this->crod_pitch = htmlspecialchars(strip_tags($this->crod_pitch));
        $this->edges = htmlspecialchars(strip_tags($this->edges));
        $this->belt_width = htmlspecialchars(strip_tags($this->belt_width));
        $this->length = htmlspecialchars(strip_tags($this->length));
        $this->sample_photos = htmlspecialchars(strip_tags($this->sample_photos));

        $stmt->bindParam(":order_id", $this->order_id);
        $stmt->bindParam(":cust_id", $this->cust_id);
        $stmt->bindParam(":order_placed", $this->order_placed);
        $stmt->bindParam(":material", $this->material);
        $stmt->bindParam(":furnace_tempr", $this->furnace_tempr);
        $stmt->bindParam(":application", $this->application);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":sr_d", $this->sr_d);
        $stmt->bindParam(":spiral_pitch", $this->spiral_pitch);
        $stmt->bindParam(":cr_d", $this->cr_d);
        $stmt->bindParam(":crod_pitch", $this->crod_pitch);
        $stmt->bindParam(":edges", $this->edges);
        $stmt->bindParam(":belt_width", $this->belt_width);
        $stmt->bindParam(":length", $this->length);
        $stmt->bindParam(":sample_photos", $this->sample_photos);

        if($stmt->execute())
        {
            return true;
        }
        return false;

    }
}



?>