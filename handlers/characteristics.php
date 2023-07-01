<?php
 require_once "handlers/connect.php";
 function characteristics($result, $link, $id)
 { 
   foreach ($result as $item){  
     
         $product = mysqli_query($link, "SELECT videocards.name, brand.name as brand, videomemory_frequency , 
         gpu_brand.name as gpubrand, gpu_codename.name as gpucodename, gpu_cooling_system.name as gpucoolingsystem,  
         gpu_interface.name as gpuinterface,  gpu_memorybus.name as gpumemorybus,  gpu_memory_capacity.name as gpumemorycapacity, 
         gpu_numberofslots.name as gpunumberofslots, gpu_series.name as gpuseries, gpu_typeofmemory.name as gputypeofmemory, 
         gpu_typeofstand.name as gputypeofstand from videocards INNER JOIN brand  on id_brand = brand.id 
         INNER JOIN gpu_brand on id_gpubrand = gpu_brand.id INNER JOIN gpu_codename on id_gpucodename = gpu_codename.id 
         INNER JOIN gpu_cooling_system on id_gpucoolingsystem = gpu_cooling_system.id 
         INNER JOIN gpu_interface on id_gpuinterface = gpu_interface.id 
         INNER JOIN gpu_memorybus on id_gpumemorybus = gpu_memorybus.id 
         INNER JOIN gpu_memory_capacity on id_gpumemorycapacity = gpu_memory_capacity.id 
         INNER JOIN gpu_numberofslots on id_gpunumberofslots = gpu_numberofslots.id 
         INNER JOIN gpu_series on id_gpuseries = gpu_series.id INNER JOIN gpu_typeofmemory on id_gputypeofmemory = gpu_typeofmemory.id 
         INNER JOIN gpu_typeofstand on id_gputypeofstand = gpu_typeofstand.id WHERE id_products = $id;");
         foreach ($product as $item){
            $name = $item['name'];
            $brand = $item['brand'];
            $gpubrand = $item['gpubrand'];
            $gpucodename = $item['gpucodename'];
            $gpucoolingsystem = $item['gpucoolingsystem'];
            $gpuinterface = $item['gpuinterface'];
            $gpumemorybus = $item['gpumemorybus'];
            $gpumemorycapacity = $item['gpumemorycapacity'];
            $gpunumberofslots = $item['gpunumberofslots'];
            $gpuseries = $item['gpuseries'];
            $gputypeofmemory = $item['gputypeofmemory'];
            $gputypeofstand = $item['gputypeofstand'];
            $videomemoryfrequency = $item['videomemory_frequency'];
         
 }
}
}
?>