// when document ready
document.addEventListener('DOMContentLoaded', function() {
    const url = "/index.php";

    // add click event for category
    let categories = document.getElementsByClassName('category-action');
    let i;
    for (i=0; i<categories.length; i++) {
        categories[i].addEventListener('click', ajaxRequest, false);
    }

    // add change event for sort select
    document.getElementById('sort').addEventListener('change', ajaxRequest, false);

    // ajax request function
   function ajaxRequest() {
       let request = new XMLHttpRequest();
       request.responseType =	"json";
       request.open("POST", url, true);
       request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
       request.addEventListener("readystatechange", () => {
           // replace products
           if (request.readyState === 4 && request.status === 200) {
               let products = request.response;
               let productList = document.getElementById('products');
               productList.innerHTML = "";
               for (i=0; i<products.length; i++) {
                    productList.innerHTML += "<li>" + products[i].name + ' ' + products[i].date + ' ' + products[i].price +
                        "<button type='button' class='btn btn-primary product-button'>Купить</button></li>";
               }
               addButtonEvent();
           }
       });

       let params= "";
       let radios = document.getElementsByName("category");
       for (i=0; i<radios.length; i++) {
           if (radios[i].checked) {
               params = "category_id=" + radios[i].id;
           }
       }

       let select = document.getElementById("sort");
       if (select.options[select.selectedIndex].value !== "default") {
           if (params === "") {
               params = "sort=" + select.options[select.selectedIndex].value;
           } else  {
               params += "&sort=" + select.options[select.selectedIndex].value;
           }
       }

       request.send(params);
       // add get params to url
       let uri = '/catalog?' + params;
       window.history.replaceState(null, null, uri);
    }

    // add click event for product button
   function addButtonEvent() {
       let productsButtons = document.getElementsByClassName('product-button');
       for (i=0; i<productsButtons.length; i++) {
           productsButtons[i].addEventListener('click', modalClick, false);
       }
   }

   addButtonEvent();

   // action on button click
   function modalClick() {
       $('.modal-body')[0].innerHTML = this.parentElement.firstChild.textContent;
       $("#productModal").modal('show');
   }

   // set filter and sorting after reloading page
   let queryString = window.location.search;
   let urlParams = new URLSearchParams(queryString);
   let category_id = urlParams.get('category_id');
   let sort = urlParams.get('sort');
   if (category_id) {
       document.getElementById(category_id).click();
   }
   if (sort) {
       document.getElementById("sort").value = sort;
       ajaxRequest();
   }
});
