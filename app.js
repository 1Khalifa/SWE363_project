var i = 1;
var counter = 0;
var cart = [];
var totalCart = 0;

function item(name, price, count) {
  this.name = name;
  this.price = price;
  this.count = count;
}

let el = document.getElementsByClassName("add-to-cart");
var btnsNum = el.length;

for (i = 0; i < btnsNum; i++) {
  var button = el[i];
  button.addEventListener("click", function add(event) {
    var buttonclicked = event.target;

    var itemName = buttonclicked.getAttribute("data-name");
    var itemPrice = Number(buttonclicked.getAttribute("data-price"));
    var itemCount = 1;

    totalCart += itemPrice;

    var Item = new item(itemName, itemPrice, itemCount);
    cart.push(Item);
    console.log(Item);
    console.log(cart);
    var nweRow = document
      .querySelector(".receipt")
      .appendChild(document.createElement("tr"));
    nweRow.className = "tt";
    document
      .querySelector(".receipt")
      .appendChild(
        document.createElement("td")
      ).textContent = buttonclicked.getAttribute("data-name");

    document
      .querySelector(".receipt")
      .appendChild(
        document.createElement("td")
      ).textContent = buttonclicked.getAttribute("data-price");
    counter++;
    document.querySelector(".cartCount").innerHTML = counter;
    document.querySelector(".total-cart").innerHTML = totalCart;
  });
}

let or = document.querySelector(".orderNow");
or.addEventListener("click", function () {
  for (i = 0; i < counter; i++) {
    document.querySelector(".show-cart").deleteTFoot();
  }
  cart = [];
  counter = 0;
  totalCart = 0;
  var nweRow = document
    .querySelector(".show-cart")
    .appendChild(document.createElement("tfoot"));
  nweRow.className = "receipt";
  document.querySelector(".cartCount").innerHTML = counter;
  document.querySelector(".total-cart").innerHTML = totalCart;
})

function plusItem() {
    ++i;
    document.getElementById("itemNum").innerHTML = i;
}
function minusItem() {
    if (i > 1) {
        --i;
        document.getElementById("itemNum").innerHTML = i;
    }
}

function countChars(obj) {
    var maxLength = 500;
    var strLength = obj.value.length;
    document.getElementById("charNum").innerHTML = strLength + ' / ' + maxLength;
}
function emptyReview() {
    document.getElementById('Review').addEventListener("keydown", function () {
        document.getElementById('message').style.display = 'none';
    });
    if (document.getElementById('Review').value == '') {
        document.getElementById('message').style.display = 'block';
        document.getElementById('message').innerHTML = 'Please type your review';
        document.getElementById('message').style.color = '#a80e0e';
        return false;
    } else
        return true;
}
function checkName() {
    if (document.getElementById('personName').value == '') {
        document.getElementById('personName').value = 'Customer';
        return false;
    } else
        return true;
}
function submitReview() {
    if (checkName() == true && emptyReview() == true) {
        document.getElementById("frm1").submit();
    }
}
function slidIN() {
    document.getElementById('addReview').style.height = 'max-content';
    document.getElementById('addReview').style.opacity = '100%';
    document.getElementById('addReview').style.marginLeft = '0rem';
}
