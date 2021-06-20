import ProductsList from './products/products-list';
import 'bootstrap/dist/css/bootstrap.min.css';

class App extends HTMLElement {
  connectedCallback() {
    const productsList = document.createElement('vm-products-list');
    productsList.setAttribute('class', 'row');

    this.appendChild(productsList);

    fetch('/api/products')
      .then(response => response.json())
      .then(data => {
        productsList.products = data;
      })
      .catch((error) => {
        console.error('Error:', error);
      });
  }
}

window.customElements.define('vm-app', App);

export default App;
