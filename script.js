function frozenFood() {
  //Changes the second tiered image to the Frozen Food sub-category.
  document.getElementById('product-node').src = 'images/frozenfood_.png';
  document.getElementById('product-node').useMap = '#frozen-food';
}

function freshFood() {
  //Changes the second tiered image to the Frozen Food sub-category.
  document.getElementById('product-node').src = 'images/freshfood_.png';
  document.getElementById('product-node').useMap = '#fresh-food';
}

function beverages() {
  //Changes the second tiered image to the Frozen Food sub-category.
  document.getElementById('product-node').src = 'images/beverages_.png';
  document.getElementById('product-node').useMap = '#beverages';
}

function homeHealth() {
  //Changes the second tiered image to the Frozen Food sub-category.
  document.getElementById('product-node').src = 'images/homehealth_.png';
  document.getElementById('product-node').useMap = '#home-health';
}

function petFood() {
  //Changes the second tiered image to the Frozen Food sub-category.
  document.getElementById('product-node').src = 'images/petfood_.png';
  document.getElementById('product-node').useMap = '#pet-food';
}

function hide() {
  document.getElementById('product-node').src = ' ';
}

function getData(id) {
  document.getElementById('product_id').value = id;
  document.getElementById('product-details').submit();
}
