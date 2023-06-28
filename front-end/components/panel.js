//const sidebar = document.querySelector('#sidebar');
//const content = document.querySelector('.content-data');

class Panel extends HTMLElement {
  constructor() {
    super();
    this.valueToActive = null;
    this.toInsert = null;
  }

  static get observeAttributes() {
    return ["valueToActive"];
  }

  attributeChangeCallback(nameAtr, oldValue, newValue) {
    switch (nameAtr) {
      case "valueToActive":
        this.valueToActive = newValue;
        break;
    }
  }

  async fetchData(toSearch) {
    try {
      const response = await fetch(
        `http://localhost/ApolT01-013/PHP_Docs/full-stackApp/back-end/${toSearch}`
      );
      const data = await response.json();
      return data;
    } catch (error) {
      console.error(error);
    }
  }

  async connectedCallback() {
    this.innerHTML = `<table class="table"><thead><tr>`;
    this.toInsert = await this.fetchData(this.valueToActive);
    var keys = Object.keys(chapter);
    keys.forEach((key) => {
      this.innerHTML +=`<th scope="col"> ${key} </th>`;
    })
    this.innerHTML += `</tr></thead><tbody><tr>`;
    this.toInsert.forEach((element) => {
    const values = Object.values(element);
    values.forEach((value) => {
      if(value.isInteger){
        this.innerHTML += `<th scope="row">${value}</th>`;

      }else{
        `<td>${value}</td>`
      }
    })
    this.innerHTML +=`</tr>`
    });
    this.innerHTML += `</tbody></table>`;
  }
}

window.customElements.define("panel-control", Panel);
