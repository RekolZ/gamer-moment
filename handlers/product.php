<?php
    require_once "handlers/connect.php";
    $id = $_GET['id'];
    if (!isset($_SESSION['recent']) and $id!=null) {//если сессия корзины не существует
        $temp[$id] = 1;//в массив заносим количество товара 1 
    } else {//если в сессии корзины уже есть товары
        $temp = $_SESSION['recent'];//заносим в масив старую сесию
        if (isset($_GET['id'])){ if (!array_key_exists($id, $temp)) {//проверяем есть ли в корзине уже такой товар
            $temp[$id] = 1; //в массив заносим количество товара 1
            }      }
    }
    if (!isset($_SESSION['recent']) and $id!=null) {$count = count($temp);}//считаем товары в корзине
    $_SESSION['recent'] = $temp;//записываем в сессию наш масив
    $sql = "Select * from products WHERE id = $id";
    $result = mysqli_query($link, $sql);
    function general_characteristic($result, $link, $id)
    { 
      //заносим данные из базы в переменные
      foreach ($result as $item){ 
        if($item['id_category']==7){
            $product = mysqli_query($link, "SELECT brand.name as brand, videomemory_frequency , gpu_brand.name as gpubrand, gpu_codename.name as gpucodename, gpu_cooling_system.name as gpucoolingsystem,  gpu_interface.name as gpuinterface,  gpu_memorybus.name as gpumemorybus,  gpu_memory_capacity.name as gpumemorycapacity, gpu_numberofslots.name as gpunumberofslots, gpu_series.name as gpuseries, gpu_typeofmemory.name as gputypeofmemory, gpu_typeofstand.name as gputypeofstand from videocards INNER JOIN brand  on id_brand = brand.id INNER JOIN gpu_brand on id_gpubrand = gpu_brand.id INNER JOIN gpu_codename on id_gpucodename = gpu_codename.id INNER JOIN gpu_cooling_system on id_gpucoolingsystem = gpu_cooling_system.id INNER JOIN gpu_interface on id_gpuinterface = gpu_interface.id INNER JOIN gpu_memorybus on id_gpumemorybus = gpu_memorybus.id INNER JOIN gpu_memory_capacity on id_gpumemorycapacity = gpu_memory_capacity.id INNER JOIN gpu_numberofslots on id_gpunumberofslots = gpu_numberofslots.id INNER JOIN gpu_series on id_gpuseries = gpu_series.id INNER JOIN gpu_typeofmemory on id_gputypeofmemory = gpu_typeofmemory.id INNER JOIN gpu_typeofstand on id_gputypeofstand = gpu_typeofstand.id WHERE id_products = $id;");
            foreach ($product as $item){
            $gpuinterface = $item['gpuinterface'];
            $gpumemorybus = $item['gpumemorybus'];
            $gpumemorycapacity = $item['gpumemorycapacity'];
            $gputypeofmemory = $item['gputypeofmemory'];
            $videomemoryfrequency = $item['videomemory_frequency'];
            }
          //Вывод характеристик
      echo '
      <h2>Характеристики</h2>
      <p><span class="grey">Интерфейс:&nbsp;</span>',$gpuinterface,'</p>
      <p><span class="grey">Частота графического процессора:&nbsp;</span>',$videomemoryfrequency,'&nbsp;МГц</p>
      <p><span class="grey">Объём памяти:&nbsp;</span>',$gpumemorycapacity,'</p>
      <p><span class="grey">Тип памяти:&nbsp;</span>',$gputypeofmemory,'</p>
      <p><span class="grey">Шина памяти (разрядность):&nbsp;</span>',$gpumemorybus,'&nbsp;бит</p>
      ';
    }
  }
}
    function detailed_characteristic($result, $link, $id)
    {
        //заносим данные из базы в переменные
      foreach ($result as $item){ 
        if($item['id_category']==7){
            //$product = mysqli_query($link, "SELECT * FROM videocard WHERE id_products = $id");
            $product = mysqli_query($link, "SELECT videocards.name, brand.name as brand, videomemory_frequency , gpu_brand.name as gpubrand, gpu_codename.name as gpucodename, gpu_cooling_system.name as gpucoolingsystem,  gpu_interface.name as gpuinterface,  gpu_memorybus.name as gpumemorybus,  gpu_memory_capacity.name as gpumemorycapacity, gpu_numberofslots.name as gpunumberofslots, gpu_series.name as gpuseries, gpu_typeofmemory.name as gputypeofmemory, gpu_typeofstand.name as gputypeofstand from videocards INNER JOIN brand  on id_brand = brand.id INNER JOIN gpu_brand on id_gpubrand = gpu_brand.id INNER JOIN gpu_codename on id_gpucodename = gpu_codename.id INNER JOIN gpu_cooling_system on id_gpucoolingsystem = gpu_cooling_system.id INNER JOIN gpu_interface on id_gpuinterface = gpu_interface.id INNER JOIN gpu_memorybus on id_gpumemorybus = gpu_memorybus.id INNER JOIN gpu_memory_capacity on id_gpumemorycapacity = gpu_memory_capacity.id INNER JOIN gpu_numberofslots on id_gpunumberofslots = gpu_numberofslots.id INNER JOIN gpu_series on id_gpuseries = gpu_series.id INNER JOIN gpu_typeofmemory on id_gputypeofmemory = gpu_typeofmemory.id INNER JOIN gpu_typeofstand on id_gputypeofstand = gpu_typeofstand.id WHERE id_products = $id;");
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
            //Вывод характеристик
                echo '
          <div class="flex jcsb">
              <div class="characteristics__item">
                <h3>Основные</h3>
                <div class="characteristics__span flex jcsb">
                  <span>Производитель</span>
                  <span>',$brand,'</span>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Код производителя</span>
                  <span>',$name,'</span>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Интерфейс</span>
                  <span>',$gpuinterface,'</span>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Производитель процессора</span>
                  <span>',$gpubrand,'</span>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Серия</span>
                  <span>',$gpuseries,'</span>
                </div>
                <h3>Память</h3>
                <div class="characteristics__span flex jcsb">
                  <span>Объём памяти</span>
                  <span>',$gpumemorycapacity,'</span>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Тип памяти</span>
                  <span>',$gputypeofmemory,'</span>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Шина памяти(разрядность)</span>
                  <span>',$gpumemorybus,'</span>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Частота видеопамяти</span>
                  <span>',$videomemoryfrequency,'</span>
                </div>
                
                </div>
                <div class="characteristics__item">
                  <h3>Видеопроцессор</h3>
                  <div class="characteristics__span flex jcsb">
                    <span>Кодовое название графического процессора</span>
                    <span>',$gpucodename,'</span>
                  </div>
                  <div class="characteristics__span flex jcsb">
                    <span>Частота графического процессора</span>
                    <span>',$videomemoryfrequency,'МГц</span>
                  </div>
                  <h3>Конструкция</h3>
                  <div class="characteristics__span flex jcsb">
                    <span>Количество занимаемых слотов</span>
                    <span>',$gpunumberofslots,'</span>
                  </div>
                  <div class="characteristics__span flex jcsb">
                    <span>Система охлаждения</span>
                    <span>',$gpucoolingsystem,'</span>
                  </div>
                  <h3>Дополнительно</h3>
                <div class="characteristics__span flex jcsb">
                  <span>Тип поставки</span>
                  <span>',$gputypeofstand,'</span>
                </div>
                <div class="characteristics__span flex jcsb">
                  <span>Гарантия</span>
                  <span>24 мес.</span>
                </div>
                </div>

            </div>';
        }
            
          
      }
        
    }
   
?>