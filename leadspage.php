 




<html>
  <head>
      <title>uiuxdesignschool</title>
	 
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
     <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
	  
  </head> 
  <body>
	   <div style="margin:2% auto 0;width:fit-content;">
		<div style="display:flex;justify-content:space-evenly;align-items:flex-start;">
       <form action="" method="GET" name="myform">
       <label>From</label>
       <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>">
       <label>To</label>
       <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>">
       
       <button type="submit">Filter</button>
       </form>
			
	   <button id="btnn" style="display:none">download</button>
		   </div>
	  
	    <?php 
                                $con = new PDO("mysql:host=localhost:3306;dbname=elightac_uiuxleads",'elightac_uiux','uiuxds@2023');
                                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
									  
                                    $from_date = $_GET['from_date']." "."00:00:00";
                                    $to_date = $_GET['to_date']." "."23:59:59";
								
                                    $query = $con->prepare("SELECT * FROM uiux WHERE date BETWEEN '$from_date' AND '$to_date' ");
                                    $query->execute();
                                    $query_run= $query->fetchAll(PDO::FETCH_ASSOC);
                                    
									

                                    if(count($query_run) > 0)
                                    {
										?>
	                                    <table border="1" style="margin:2% auto 0;" id="tbl">
											<tr>
												<td>id</td>
												<td>name</td>
												<td>email</td>
												<td>phone</td>
												<td>date</td>
											</tr>
											<?php
                                        foreach(array_reverse($query_run) as $row)
                                        {
                                            ?>
                                          
	                                         <tr>
                                             <td><?php echo $row['id']?></td>
                                             <td><?php echo $row['name']?></td>
		                                     <td><?php echo $row['email']?></td>
		                                     <td><?php echo $row['phone']?></td>
		                                     <td><?php echo $row['date']?></td>
                                             </tr>
	                                       
                                            <?php
                                        }
										?>
											</table>
	  </div>
	                                   <?php
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
		                        
	                        
		                    
                            ?>
                           <script>
							  $("#btnn").click(function(){
                             $("#tbl").table2excel({
                               filename:"uiuxleads.xls",
							   name:"worksheet"
                              }); 
                            }); 
							
		                    let form=document.forms["myform"];
							let from=form["from_date"].value;
							let to=form["to_date"].value;
							
							if(from.length>0 && to.length>0){
								document.querySelector("#btnn").style.display="block";
							}
	  
	                       </script>
                         

  </body>
    
</html>