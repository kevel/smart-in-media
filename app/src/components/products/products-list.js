import Product from './product';

class ProductsList extends HTMLElement {
  constructor() {
    super();

    this._products = [];
  }

  connectedCallback() {
    this.render(this);
  }

  render(el) {
    this.innerHTML = '';
    this.products.forEach((product) => {
      const productEl = document.createElement('vm-product');
      productEl.setAttribute('class', 'col-sm-4 col-md-3 mb-3');
      productEl.product = product;
      this.appendChild(productEl);
    });
  }

  set products(value) {
    this._products = value;

    this.render(this);
  }

  get products() {
    return this._products;
  }
}

window.customElements.define('vm-products-list', ProductsList);

export default ProductsList;
