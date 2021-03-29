var i = 1;
var cart = 0;

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

function addToCart() {
    cart += i;
    document.getElementById("itemsNum").innerHTML = cart;
    i = 1;
    document.getElementById("itemNum").innerHTML = i;
}

function add() {
    cart++;
    document.querySelector('.cartCount').textContent = cart;
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

function addSandwich() {
    document.addEventListener("click", (evt) => {
        const flyoutElement = document.getElementById('addBtn');
        let targetElement = evt.target; // clicked element

        do {
            if (targetElement == flyoutElement) {
                return;
            }
            targetElement = targetElement.parentNode;
        } while (targetElement);
        window.location.href = 'detail.html';
    });
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
