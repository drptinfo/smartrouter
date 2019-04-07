<?php  
 include_once("conexao_bd.php");
 //$connect = mysqli_connect("localhost", "root", "", "smartrouter");  
 $query ="SELECT * FROM cliente ORDER BY ID DESC";  
 $result = mysqli_query($conexao, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
             <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
              <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
			 
	
	
			 
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Lista</h3>  
                <br />  
								
                <div class="table-responsive">  
				
					 <table id="employee_data" class="table table-striped table-bordered">   
					
				
                          <thead>  
                               <tr>  
                                    <td>ID</td>  
                                    <td>DATA REG</td>  
                                    <td>NOME PAC</td>  
                                    <td>TELEFONE</td>  
                                    <td>EMAIL</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["ID"].'</td>  
                                     <td>'.$row["DT_REG"].'</td> 
									<td>'.$row["NOME_PAC"].'</td>                                     
                                    <td>'.$row["TEL"].'</td>  
                                    <td>'.$row["EMAIL"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  