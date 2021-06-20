class Product extends HTMLElement {
  constructor() {
    super();

    this._products = [];
  }

  connectedCallback() {
    this.render(this);

  }

  render(el) {
    const st = JSON.stringify(this._products);
    this.innerHTML = `<h1>${st}</h1>`;
  }

  set products(value) {
    this._products = value;

    this.render(this);
  }

  get products() {
    return this._products;
  }
}

window.customElements.define('vm-product', Product);

export default Products;
