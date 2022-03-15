function calc() 
{
  var price = document.getElementsByName("price").innerHTML;
  var noTickets = document.getElementsByName("quantity").value;
  var total = parseFloat(price) * noTickets
  if (!isNaN(total))
  {
    document.getElementsByName("price1").innerHTML = total;
    document.getElementsByName("total_price").innerHTML = total;
  }
    

    
}