function getTotalPrice() {
  // decalaring value that are mandatory
  let checkboxes = document.getElementsByName("feature");
  let additional_price = 0;
  let initial_fee = 100;
  let final_price = 0;

  // get and calculate the total price from checkboxes
  for (let i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked == true) {
      additional_price += parseInt(checkboxes[i].value);
    }
  }
  // calculate final price with initial fee
  final_price = initial_fee + additional_price;

  // insert into html element and display to client
  document.getElementById("totalAmmount").innerHTML ="Initial fee to pay is: " + initial_fee + "<br>" + "Total ammount to pay is: " + final_price;
  document.getElementById("totalAmmount").style.display = "block";
}
