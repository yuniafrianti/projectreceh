<?php 
// session_start();
//         if($_SESSION['level']=="supervasior"){
//     header("location:stok.php?pesan=gagal");
//   }
 
  ?>

        <form method="POST" action=index.php?id=13.php>
   

              <!-- /.card-header -->
              <!-- form start -->

         
               
              <div class="box-header">
              <h3 class="box-title"></h3>

              <a href="cetak_stok.php"  target="_blank" class="btn btn-default float-right">Print Pdf</a>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>

               <?php
                 $sqlSelect = "select kd_barang, sum(tbl_barangmasuk.stok) as stok
                  from tbl_barangmasuk group by kd_barang;";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                   ?>
            <div class="box-footer">
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Stock</th>
              

               
                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <td><?php  echo $no++; ?></td>

                    
                    <td>
                        <?php 
                      include('koneksi.php');
                      $a="select * from tbl_barang where kd_barang='".$row['kd_barang']."'";
                      $query=mysqli_query($kon,$a);
                      $data=mysqli_fetch_object($query);
                      echo $data->nama_barang;

                     ?>

                    </td>
                    <td><?php echo $row['stok'];?></td>
                    
    
                </tr>
                <?php
                  }
                } 
                  ?>
            

                
         </table>
       </div>
     </div>
      </form>

     
  
