import ProductsList from './products/products-list';

class App extends HTMLElement {
  connectedCallback() {
    const productsList = document.createElement('vm-products-list');
    setTimeout(() => {productsList.products = ['product1', 'product2']}, 1000);
    this.appendChild(productsList);

  }
}

window.customElements.define('vm-app', App);

export default App;
