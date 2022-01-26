<section id="banner">
  <div class="container">
    <div class="banner_main_heading">
      <h1>Visit 0ur Creative Marketplace</h1>
       <p style="padding-bottom: 10px; font-size:18px; color:rgba(20, 33, 61, .65)">Get various creative assets at low cost</p>
    </div>

    <div class="row">
      <div class="offset-lg-1 col-lg-10 col-sm-12 col-md-12 offset-xl-2 col-xl-8">
        <div class="search_box">

          <form 
            action="{{ route('shop') }}" 
            class="setting_form search_field autocomplete" 
            method="post" 
            id="profile_form" 
            enctype="multipart/form-data"
          >
            {{ csrf_field() }}
            <input 
              id="myInput" 
              class="search_input" 
              type="text" 
              name="product_item" 
              placeholder="Search items"
              autocomplete="off"
            >
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>

        </div>
      </div>
    </div>

    <div class="banner_example">
      <h6>Examples: WordPress, Business card, PHP</h6>
    </div>
  </div>
</section>

<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          /*close any already open lists of autocompleted values*/
          closeAllLists();

          if (!val) { return false;}

          currentFocus = -1;

          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");

          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);

          /*for each item in the array...*/
          for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
                  /*insert the value for the autocomplete text field:*/
                  inp.value = this.getElementsByTagName("input")[0].value;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
      });

      /* execute a function presses a key on the keyboard: */
      inp.addEventListener("keydown", function(e) {
          var x = document.getElementById(this.id + "autocomplete-list");
          if (x) x = x.getElementsByTagName("div");
          if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (x) x[currentFocus].click();
            }
          }
      });

      function addActive(x) {
        /* a function to classify an item as "active": */
        if (!x) return false;
        /* start by removing the "active" class on all items: */
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /* add class "autocomplete-active": */
        x[currentFocus].classList.add("autocomplete-active");
      }

      function removeActive(x) {
        /* a function to remove the "active" class from all autocomplete items: */
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }

      function closeAllLists(elmnt) {
        /* close all autocomplete lists in the document,
        except the one passed as an argument: */
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }

      /* execute a function when someone clicks in the document: */
      document.addEventListener("click", function (e) {
        closeAllLists(e.target);
      });
    }

    /* An array containing all the country names in the world: */
    var s_items = ["Scripts", "Apps", "Themes", "Plugins", "Graphics", "Education", "Business", "PHP","JavaScript","CSS","Python","Java","Ruby","C & C++","C#","VB.NET","Android","Build Box","Construct 2","Cordova","Corona","Flutter","Ionic","iOS","React","Titanium","Unity","Xamarin","Drupal","Ghost","HTML","Joomla","Magento","Muse","MyBB","nopCommerce","OpenCart","Osclass","PrestaShop","Shopify","Tumblr","WooCommerce","WordPress","Magento","OsCommerce","X-Cart","User Interfaces","Game Graphic Assets","Icons","Logo Templates","Product Mockups","Print","Textures & Patterns","Web Elements","Business Plan Kit","Legal Agreements","Human Resources","Start a Business","Finance & Accounting","Sales & Marketing","Administration","Production & Operation","Assignment","Article","Biography","Case Study","Essay","Internship","Lecture","Application & Letter","Paragraph","Presentation","Report","Research","Resume","Term Paper","Thesis","Annual Report"];
    
    /* initiate the autocomplete function on the "myInput" element, and pass along the s_items array as possible autocomplete values:*/
    autocomplete(document.getElementById("myInput"), s_items);
  
  });
</script>