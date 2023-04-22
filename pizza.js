// enums
class PizzaTypes {
  static Margarita = { 
    id: 'Margarita',
    name: 'Маргарита', 
    price: 500,
    caloric: 300
  };
  static Pepperoni = { 
    id: 'Pepperoni',
    name: 'Пепперони', 
    price: 800,
    caloric: 400
  };
  static Bavarian = { 
    id: 'Bavarian', 
    name: 'Баварская',
    price: 700,
    caloric: 450
  };
}

class PizzaSize {
  static Big = { 
    id: 'big',
    name: 'Большая', 
    price: 200,
    caloric: 200
  };
  static Small = {
    id: 'small',
    name: 'Маленькая',  
    price: 100,
    caloric: 100
  };
}

class PizzaTopping {
  static CreamyMozarella =  { 
    id: 'CreamyMozarella',
    name: 'Сливочная Моцарелла',  
    info: {
      big: {
        price: 100,
        caloric: 0
      },
      small: {
        price: 50,
        caloric: 0
      }
    }
  };
  static CheeseBoard =  { 
    id: 'CheeseBoard',
    name: 'Сырный борт',  
    info: {
      big: {
        price: 300,
        caloric: 50
      },
      small: {
        price: 150,
        caloric: 50
      }
    }
  };
  static CheddarAndParmesan =  { 
    id: 'CheddarAndParmesan',
    name: 'Чеддер и Пармизан',  
    info: {
      big: {
        price: 300,
        caloric: 50
      },
      small: {
        price: 150,
        caloric: 50
      }
    }
  };
}

class Pizza {

  #type;
  #size;
  #toppings;

  constructor(type, size, toppings) {
    this.#type = type;
    this.#size = size;
    if (toppings)
      this.#toppings = toppings.map(topping => this.#convertTopping(topping));
    else
      this.#toppings = [];
  }
  
  /**
   * Избавляемся от полей big и size в параметре topping
   * @param {{name: string, price: number, info: {big: {price: number, caloric: number}, small: {price: number, caloric: number}} }} topping - Начинка
   * @returns {{name: string, price: number, caloric: number}}
  */
  #convertTopping(topping) {
    return {
      id: topping.id,
      name: topping.name,
      price: topping.info[this.#size.id].price,
      caloric: topping.info[this.#size.id].caloric,
    }
  }

  /**
   * Добавление начинки
   * @param {{name: string, price: number, caloric: number}} topping - Начинка
   * @returns {Pizza}
  */
  addTopping(topping) {
    if (!this.#toppings.map(topping => topping.name).includes(topping.name))
      this.#toppings.push(this.#convertTopping(topping));
    return this;
  }
  
  /**
   * Убрать начинку
   * @param {{name: string, price: number, caloric: number}} topping - Начинка
   * @returns {Pizza}
  */
  removeTopping(topping) { 

    this.#toppings = this.#toppings.filter(t => t.id !== topping.id);

    return this;
  }

  /**
   * Получить список добавок
   * @returns {[{name: string, price: number, caloric: number}]}
  */
  getToppings() { 
    return this.#toppings;
  }

  setType(pizzaType) {
    this.#type = pizzaType;
  }

  /**
   * Получить тип пиццы
   * @returns {string}
  */
  getType() {
    return this.#type.name;
  }

  setSize(pizzaSize) {
    this.#size = pizzaSize;

    if(PizzaTopping[this.#toppings[0]?.id])
      this.#toppings = this.#toppings.map(topping => this.#convertTopping(PizzaTopping[topping?.id]));
  }

  /**
   * Получить размер пиццы
   * @returns {string}
  */
  getSize() {
    return this.#size;
  }

  /**
   * Получить цену пиццы
   * @returns {number}
  */
  calculatePrice() {
    return [this.#size, this.#type, ...this.#toppings]
    .reduce((acc, currValue) => acc += currValue.price, 0);
  }

  /**
   * Получить калорийность
   * @returns {number}
  */
  calculateCalories() {
    return [this.#size, this.#type, ...this.#toppings]
    .reduce((acc, currValue) => acc += currValue.caloric, 0);
  }
}
