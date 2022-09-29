<?php session_start();?>

<?php

if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'create':
            $name = $_POST['name'];
            $slug = $_POST['slug'];
            $description= $_POST['description'];
            $features = $_POST['features'];
            $brand_id = $_POST['brand_id'];
            $p = new ProductsController();
            $p->create($name, $slug, $description, $features, $brand_id);   
            break;
        
    }
}

 
class ProductsController{
    public function getAll(){
    $curl = curl_init();
    $token = $_SESSION['token'];
    // echo $token; 
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer ".$token
        // 'Authorization: Bearer 1|PcPVKlixuabgKcsW26pfyg7PI7SWNXS8YoItBC2M'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
    }

    public function create($name, $slug, $description, $features, $brand_id){

    $token = $_SESSION['token'];         
    $curl = curl_init();
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('name' => $name,'slug' => $slug,'description' =>$description,'features' => $features,'brand_id' => $brand_id),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$token
    ),
));


$response = curl_exec($curl);

curl_close($curl);
echo $response;  

header('Location: ../products/index.php?success=true');


/*         $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $name,'slug' => $slug,'description' => $description,'features' => $features, 'brand_id' => $brand_id),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;


    } */


}
}



?>