<?php

class shipmentClass{



    /**
     * Returns details of the shipment.
     * @param string $shipment_type is the type of courier API
     * @param string $sender_name is the name of shipment sender
     * @param string $sender_Address is the address of shipment sender
     * @param string $reciver_name is the name of shipment reciver
     * @param string $reciver_Address is the address of shipment reciver
     * @param string $details is the details of shipment
     * @return string
     */
    public function creatshipment($shipment_type,$sender_name,$sender_Address,$reciver_name,$reciver_Address,$details)
    {
        try
        {


$result=false;
switch ($shipment_type)
{
    case 1:
        $result=$this->creat_api1($sender_name,$sender_Address,$reciver_name,$reciver_Address,$details);
        break;
    case 2:
        $result=$this->creat_api2($sender_name,$sender_Address,$reciver_name,$reciver_Address,$details);
        break;
    case 3:
        $result=$this->creat_api3($sender_name,$sender_Address,$reciver_name,$reciver_Address,$details);
        break;
}



            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }

    }





    private function creat_api1($sender_name,$sender_Address,$reciver_name,$reciver_Address,$details)
    {
        try
        {
        $shipment_id=$this->generateRandomString();
        $data=array("shipment_id"=>$shipment_id,"sender_name"=>$sender_name,"sender_Address"=> $sender_Address,"reciver_name"=>$reciver_name,"reciver_Address"=>$reciver_Address,"details"=>$details);


        $inp = file_get_contents('../Data/Shipments.json');
        $tempArray = json_decode($inp);
        $tempArray  = (array)$tempArray;
        array_push($tempArray, $data);
        $jsonData = json_encode($tempArray);

        file_put_contents('../Data/Shipments.json', $jsonData);

       return $shipment_id;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }
    private function creat_api2($sender_name,$sender_Address,$reciver_name,$reciver_Address,$details)
    {
        try
        {
            $shipment_id=$this->generateRandomString();
            $data=array("shipment_id"=>$shipment_id,"sender_name"=>$sender_name,"sender_Address"=> $sender_Address,"reciver_name"=>$reciver_name,"reciver_Address"=>$reciver_Address,"details"=>$details);


            $inp = file_get_contents('../Data/Shipments.json');
            $tempArray = json_decode($inp);
            $tempArray  = (array)$tempArray;
            array_push($tempArray, $data);
            $jsonData = json_encode($tempArray);

            file_put_contents('../Data/Shipments.json', $jsonData);

            return $shipment_id;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }
    private function creat_api3($sender_name,$sender_Address,$reciver_name,$reciver_Address,$details)
    {
        try
        {
            $shipment_id=$this->generateRandomString();
            $data=array("shipment_id"=>$shipment_id,"sender_name"=>$sender_name,"sender_Address"=> $sender_Address,"reciver_name"=>$reciver_name,"reciver_Address"=>$reciver_Address,"details"=>$details);


            $inp = file_get_contents('../Data/Shipments.json');
            $tempArray = json_decode($inp);
            $tempArray  = (array)$tempArray;
            array_push($tempArray, $data);
            $jsonData = json_encode($tempArray);

            file_put_contents('../Data/Shipments.json', $jsonData);

            return $shipment_id;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }



    /**
     * Returns details of the shipment.
     * @param string $shipment_number is the number of shipment
     * @return string
     */
    public function track_shipment($shipment_number)
    {
        $data = file_get_contents('../Data/Shipments.json');
        $data = json_decode($data, true);

        $result="No Data";
        if(!empty($data)) {
            $key = array_search($shipment_number, array_column($data, 'shipment_id'));

            $key=trim($key);
            if (!empty($key)||$key==="0") {

                   $result= $data[$key];
              }
        }


return $result;
    }





    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}