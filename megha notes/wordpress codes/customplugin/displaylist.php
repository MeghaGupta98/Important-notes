<?php
global $wpdb;

// Table name
$tablename = $wpdb->prefix."customplugin";

// Import CSV
if(isset($_POST['butimport'])){

  // File extension
  $extension = pathinfo($_FILES['import_file']['name'], PATHINFO_EXTENSION);

  // If file extension is 'csv'
  if(!empty($_FILES['import_file']['name']) && $extension == 'csv'){

    $totalInserted = 0;

    // Open file in read mode
    $csvFile = fopen($_FILES['import_file']['tmp_name'], 'r');

    fgetcsv($csvFile); // Skipping header row

    // Read file
    while(($csvData = fgetcsv($csvFile)) !== FALSE){
      $csvData = array_map("utf8_encode", $csvData);

      // Row column length
      $dataLen = count($csvData);

      // Skip row if length != 4
      if( !($dataLen == 4) ) continue;

      // Assign value to variables
      $product_name = trim($csvData[0]);
      $retail_price = trim($csvData[1]);
      $modal = trim($csvData[2]);
      $size = trim($csvData[3]);

      // Check record already exists or not
      $cntSQL = "SELECT count(*) as count FROM {$tablename} where product_name='".$product_name."'";
      $record = $wpdb->get_results($cntSQL, OBJECT);

      if($record[0]->count==0){

        // Check if variable is empty or not
        if(!empty($product_name) && !empty($retail_price) && !empty($modal) && !empty($size) ) {

          // Insert Record
          $wpdb->insert($tablename, array(
            'product_name' =>$product_name,
            'retail_price' =>$retail_price,
            'modal' =>$modal,
            'size' => $size
          ));

          if($wpdb->insert_id > 0){
            $totalInserted++;
          }
        }

      }

    }
    echo "<h3 style='color: green;'>Total record Inserted : ".$totalInserted."</h3>";


  }else{
    echo "<h3 style='color: red;'>Invalid Extension</h3>";
  }

}

?>
<h2>All Entries</h2>

<!-- Form -->
<form method='post' action='<?= $_SERVER['REQUEST_URI']; ?>' enctype='multipart/form-data'>
  <input type="file" name="import_file" >
  <input type="submit" name="butimport" value="Import">
</form>

<!-- Record List -->
<table width='100%' border='1' style='border-collapse: collapse;'>
   <thead>
   <tr>
     <th>id</th>
     <th>product_name</th>
     <th>retail_price</th>
     <th>modal</th>
     <th>size</th>
   </tr>
   </thead>
   <tbody>
   <?php
   // Fetch records
   $entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by id asc");
   if(count($entriesList) > 0){
     $count = 0;
     foreach($entriesList as $entry){
        $id = $entry->id;
        $product_name = $entry->product_name;
        $retail_price = $entry->retail_price;
        $modal = $entry->modal;
        $size = $entry->size;

        echo "<tr>
        <td>".++$count."</td>
        <td>".$product_name."</td>
        <td>".$retail_price."</td>
        <td>".$modal."</td>
        <td>".$size."</td>
        </tr>
        ";
     }
   }else{
     echo "<tr><td colspan='5'>No record found</td></tr>";
  }
  ?>
  </tbody>
</table>
