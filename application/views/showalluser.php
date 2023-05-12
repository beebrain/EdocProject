<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
for ($i=0; $i < sizeof($userdata); $i++) { 
    $row = $userdata[$i];   
    // print_r($row);
    ?>
        <tr>
            <td><?php echo  $row->first ?></td>
            <td><?php echo  $row->last ?></td>
            <th><a href="<?php echo base_url()."index.php/Usercontroller/deactivate/".$row->userid ?>">delete</a></th>
        </tr>
        <?php

}
?>
    </tbody>
</table>
<?php





?>