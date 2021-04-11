var counter = 0;
var cart = [];
var totalCart = 0;
var i = 1;
var cartCounter = 0;

var shoppingCart = (function () {

    cart = [];

    function Item(name, price, count) {
        this.name = name;
        this.price = price;
        this.count = count;
    }

    var obj = {};

    obj.addItemToCart = function (name, price, count) {
        for (var item in cart) {
            if (cart[item].name === name) {
                cart[item].count++;
                return;
            }
        }
        var item = new Item(name, price, count);
        cart.push(item);
    }


    // Clear cart
    obj.clearCart = function () {
        cart = [];
    }

    obj.totalCount = function () {
        var totalCount = 0;
        for (var item in cart) {
            totalCount += cart[item].count;
        }
        return totalCount;
    }
function item(name, price, count) {
    this.name = name;
    this.price = price;
    this.count = count;
}

    obj.totalCart = function () {
        var totalCart = 0;
        for (var item in cart) {
            totalCart += cart[item].price * cart[item].count;
        }
        return Number(totalCart.toFixed(2));
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

    obj.listCart = function () {
        var cartCopy = [];
        for (i in cart) {
            item = cart[i];
            itemCopy = {};
            for (p in item) {
                itemCopy[p] = item[p];

            }
            cartCopy.push(itemCopy)
        }
        return cartCopy;
let or = document.querySelector(".orderNow");
or.addEventListener("click", function () {
    for (i = 0; i < counter; i++) {
        document.querySelector(".show-cart").deleteTFoot();
    }

    return obj;
})();


document.querySelector('.add-to-cart').addEventListener('click', function () {
    var name = this.document.getAttribute("data-name");
    var price = parseInt(this.document.getAttribute("data-price"));
    shoppingCart.addItemToCart(name, price, 1);
    displayCart();
    cart = [];
    counter = 0;
    totalCart = 0;
    var nweRow = document
        .querySelector(".show-cart")
        .appendChild(document.createElement("tfoot"));
    nweRow.className = "receipt";
    document.querySelector(".cartCount").innerHTML = counter;
    document.querySelector(".total-cart").innerHTML = totalCart;
});


function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for (var i in cartArray) {
        output += "<tr>"
            + "<td>" + cartArray[i].name + "</td>"
            + "<td>" + cartArray[i].price + "</td>"
            + "</tr>";
    }
    document.querySelector('.show-cart').innerHTML(output);
    document.querySelector('.total-cart').innerHTML = shoppingCart.totalCart();
    document.querySelector('.cartCount').innerHTML = shoppingCart.totalCount();
}


function plusItem() {
    ++i;
    document.getElementById("itemNum").innerHTML = i;
@@ -106,10 +83,6 @@ function addToCart() {
    document.getElementById("itemNum").innerHTML = i;
}

function add() {
    cartCounter++;
    document.querySelector('.cartCount').textContent = cartCounter;
}

function countChars(obj) {
    var maxLength = 500;
}
