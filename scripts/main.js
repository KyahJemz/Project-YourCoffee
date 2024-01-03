import { Helper } from "./helper.js";

console.log("Starting...");

Helper.ElementsArrayAddClickListener(document.querySelectorAll('.add-to-cart-btn'),addToCart);

function addToCart(event) {
    console.log(event.currentTarget.parentNode.dataset.itemid);
    const ItemId = event.currentTarget.parentNode.dataset.itemid;

    if (event.currentTarget.innerHTML === "Add To Cart") {
        event.currentTarget.innerHTML = "Remove From Cart";
        Helper.AddItemToCart(ItemId);
    } else {
        event.currentTarget.innerHTML = "Add To Cart";
        Helper.DeleteItemFromCart(ItemId);
    }
    console.log("Cart:", Helper.GetCartFromLocalStorage());
}
displayCart();
export function displayCart() {
    let x = 0;
    let y = '';
    if (document.getElementById("cart-list")) {
        const ListContainer = document.getElementById("cart-list");
        ListContainer.innerHTML = "";
        const Cart = Helper.GetCartFromLocalStorage();
        console.log(Cart);

        if (Cart.length > 0) {
            Cart.forEach(item => {
                const matchingItem = items.find(element => element['ItemId'] === item);
                if (matchingItem) {
                    x = x + Number(matchingItem['ItemPrice']);
                    y += ' [' + matchingItem['ItemName'] + '] ';
                    ListContainer.innerHTML += `
                        <li class="cart-item" data-itemid="${matchingItem['ItemId']}">
                            <div class="cart-item-details">
                                <span class="cart-item-name">${matchingItem['ItemName']}</span>
                                <span class="cart-item-price">₱${matchingItem['ItemPrice']}.00</span>
                            </div>
                            <button class="cart-item-remove">Remove</button>
                        </li>
                    `;
                }
            });
            document.getElementById('total-amount').innerHTML = x;
            document.getElementById('amount').value = x;
            document.getElementById('order').value = y;
            console.log("hello");
            Helper.ElementsArrayAddClickListener(document.querySelectorAll(".cart-item-remove"),removeFromCarts)
        } else {
            ListContainer.innerHTML += `
                <li class="cart-item" data-itemid="">
                    <div class="cart-item-details">
                        <span class="cart-item-name">No Items Selected</span>
                        <span class="cart-item-price">Select items form our menu page.</span>
                    </div>
                    <button class=""><a href="./home.php#menu">Go to menu</a></button>
                </li>
            `;
        }
        
    }
    
}


function removeFromCarts(event){
    console.log(event.currentTarget.parentNode.dataset.itemid);
    const ItemId = event.currentTarget.parentNode.dataset.itemid;

    Helper.DeleteItemFromCart(ItemId);
    displayCart();
}

Helper.ElementsAddClickListener(document.querySelector('.header-bar .container .toggle'), toggleMenuDisplay);

function toggleMenuDisplay() {
    const nav = document.querySelector('.nav-links');
    if (window.getComputedStyle(nav).display === 'none') {
        nav.style.display = 'block';
    } else {
        nav.style.display = 'none';
    }
}

Helper.ElementsAddClickListener(document.querySelector('.header-bar .container .tab'), removeMenu);

function removeMenu() {
    const nav = document.querySelector('.nav-links');
    nav.style.display = 'none';
}