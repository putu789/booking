<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            
            <th>ID</th>
            <th>NAME</th>
        </tr>
        <?php
        include "conn.php";
        if(isset($keyword)){ 
            $param = '%'.$keyword.'%';
            $sql = $pdo->prepare("SELECT * FROM pasien WHERE no_rkm_medis LIKE :id OR tanggal_lahir LIKE :na ");
            $sql->bindParam(':id', $param);
            $sql->bindParam(':na', $param);
            $sql->execute();
        }else{ 
            $sql = $pdo->prepare("SELECT * FROM pasien");
            $sql->execute(); 
        }
        $no = 1; 
        while($data = $sql->fetch()){ 
        ?>
            <tr>
                
                <td class="align-middle"><?php echo $data['id']; ?></td>
                <td class="align-middle"><?php echo $data['name']; ?></td>
                <td class="align-middle"><?php echo $data['sex']; ?></td>
                <td class="align-middle"><?php echo $data['phone']; ?></td>
                <td class="align-middle"><?php echo $data['address']; ?></td>
            </tr>
        <?php
            $no++; 
        }
        ?>
    </table>
</div>