import template from './product.html';

class Product extends HTMLElement {
  constructor() {
    super();

    this._product = null;
  }

  connectedCallback() {
    this.render(this);

  }

  render(el) {
    this.innerHTML = '';
    if (!this.product) {
      return;
    }

    this.innerHTML = template
      .replace('{{product.title}}', this.product.title)
      .replace('{{product.price}}', this.product.price);
  }

  set product(value) {
    this._product = value;

    this.render(this);
  }

  get product() {
    return this._product;
  }
}

window.customElements.define('vm-product', Product);

export default Product;
