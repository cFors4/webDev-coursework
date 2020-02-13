<?php
  require "header.php";
?>
<html>
<head>
   <link rel="stylesheet" href="css/style.css">

    <script >
    try{
    //call ajax
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "stocks.php";
    var asynchronous =true;
    
    ajax.open(method,url,asynchronous);

    //send ajax
    ajax.send();

    //receive
    ajax.onreadystatechange = function(){
      if(this.readyState ==4 && this.status==200){
        //converting JSON back to array
        var data = JSON.parse(this.responseText);

        var html = "";
        for (var a = 0; a<data.length;a++)
        {
          var id = data[a].id;
          var stock = data[a].stock;
          var quantity = data[a].quantity;

          html+= "<tr>";
            html+= "<td>"+id +"</td>";
            html+= "<td>"+stock +"</td>";
            html+= "<td>"+quantity +"</td>";
          html+= "</tr>";
        }
        document.getElementById("data").innerHTML = html;
        var table = document.getElementById("data"),rIndex
        for(var i = 0; i < table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {
                  // get the selected row index
                  rIndex = this.rowIndex;
                  document.getElementById("ID").value = this.cells[0].innerHTML;
                  document.getElementById("stock").value = this.cells[1].innerHTML;
                  document.getElementById("quantity").value = this.cells[2].innerHTML;
                };
            }
    }
  };
}
catch{
  throw 500;
}
  </script>

</head>
<body>
<table id="stocksTBL" border="1">
 <tr>
  <th>ID</th> 
  <th>Stock</th> 
  <th>Quantity</th>
 </tr>
 <tbody id="data">
 </tbody>
</table>


<form action="addStock.php" method="post">
<label><b>Selected Stock:</b></label>
<br>
<br>

<label for="ID"><b>ID (automatic when adding):</b></label>
<input type="number" name="ID" id="ID" >

<label for="stock"><b>Stock:</b></label>
<input type="text" name="stock" id="stock" maxlength = "30" required>

<label for="quantity"><b>Quantity:</b></label>
<input type="number" name="quantity" id="quantity" maxlength = "11" required><br>

<br></br>
<button type="submit" name="addStock">Add Stock</button><br>
<br></br>
<button type="submit" name="editStock" formaction="editStock.php">Save</button><br>
<br></br>
<button type="submit" name="deleteStock" formaction="deleteStock.php">Delete</button><br>

</form>
</body>
</html>



