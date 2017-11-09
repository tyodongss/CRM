<div class="form-group">
                                     <label>Owner</label>
                                    <?php  
                                    include "koneksi.php";
                                    $result = mysql_query("select * from owner order by nama_owner asc");  
                                    $jsArray = "var prdName = new Array();\n";  
                                    echo '<select class="form-control" name="id_owner" onchange="document.getElementById(\'prd_name\').value = prdName[this.value] . document.getElementById(\'prd_name3\').value = prdName[this.value]">';  
                                    echo '<option>---- Pilih Owner ----</option>';  
                                    while ($row = mysql_fetch_array($result)) {  
                                        echo '<option value="' . $row['id_owner'] . '">' . $row['nama_owner'] . '</option>';  
                                        $jsArray .= "prdName['" . $row['id_owner'] . "'] = '" . addslashes($row['email_owner']) . "' . '" . addslashes($row['nama_owner']) . "';\n";  
                                    }  
                                    echo '</select>';  
                                    ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" name="email_owner" id="prd_name"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray; ?>  
                                    </script> 
                                </div>

                                <div class="form-group">
                                    <input class="form-control" name="nama_owner" id="prd3_name"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray; ?>  
                                    </script> 
                                </div>